<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Manage update messages and Plugins info for WAD in default WordPress plugins list.
 */
class WAD_Updating_Manager {
	/**
	 * The plugin current version
	 *
	 * @var string
	 */
	private $current_version;

	/**
	 * The plugin remote update path
	 *
	 * @var string
	 */
	private $update_path;

	/**
	 * Plugin Slug (plugin_directory/plugin_file.php)
	 *
	 * @var string
	 */
	private $plugin_slug;

	/**
	 * Plugin name (plugin_file)
	 *
	 * @var string
	 */
	private $slug;
	/**
	 * Link to download VC.
	 *
	 * @var string
	 */
	private $url = '';
	/**
	 * Initialize a new instance of the WordPress Auto-Update class
	 *
	 * @param string $current_version
	 * @param string $update_path
	 * @param string $plugin_slug
	 */
	function __construct( $current_version, $update_path, $plugin_slug ) {
		// Set the class public variables
		$this->current_version = $current_version;
		$this->update_path     = $update_path;
		$this->plugin_slug     = $plugin_slug;

		$t          = explode( '/', $plugin_slug );
		$this->slug = str_replace( '.php', '', $t[1] );

		// define the alternative API for updating checking
		add_filter( 'pre_set_site_transient_update_plugins', array( &$this, 'check_update' ) );

		// Define the alternative response for information checking
		add_filter( 'plugins_api', array( &$this, 'check_info' ), 10, 3 );

		add_action( 'in_plugin_update_message-' . WAD_MAIN_FILE, array( &$this, 'addUpgradeMessageLink' ) );
	}

	/**
	 * Get the value of current_version
	 */
	public function get_current_version() {
		return $this->current_version;
	}

	/**
	 * Set the value of current_version
	 *
	 * @return  void
	 */
	public function set_current_version( $current_version ) {
		$this->current_version = $current_version;
	}

	/**
	 * Get the value of update_path
	 */
	public function get_update_path() {
		return $this->update_path;
	}

	/**
	 * Set the value of update_path
	 *
	 * @return  void
	 */
	public function set_update_path( $update_path ) {
		$this->update_path = $update_path;
	}

	/**
	 * Get the value of plugin_slug
	 */
	public function get_plugin_slug() {
		return $this->plugin_slug;
	}

	/**
	 * Set the value of plugin_slug
	 *
	 * @return  void
	 */
	public function set_plugin_slug( $plugin_slug ) {
		$this->plugin_slug = $plugin_slug;
	}

	/**
	 * Get the value of slug
	 */
	public function get_slug() {
		 return $this->slug;
	}

	/**
	 * Set the value of slug
	 *
	 * @return  void
	 */
	public function set_slug( $slug ) {
		$this->slug = $slug;
	}

	/**
	 * Get the value of url
	 */
	public function get_url() {
		return $this->url;
	}

	/**
	 * Set the value of url
	 *
	 * @return  void
	 */
	public function set_url( $url ) {
		$this->url = $url;
	}

	/**
	 * Add our self-hosted autoupdate plugin to the filter transient
	 *
	 * @param $transient
	 * @return object $ transient
	 */
	public function check_update( $transient ) {

		if ( empty( $transient->checked ) ) {
			return $transient;
		}

		// Get the remote version
		$remote_version = $this->getRemote_version();
				$plugin = new Wad();

		// If a newer version is available, add the update
		if ( version_compare( $this->get_current_version(), $remote_version, '<' ) ) {
			$plugin_admin     = new WAD_Admin( 'wad', $plugin->get_version() );
			$obj              = new stdClass();
			$obj->slug        = $this->get_slug();
			$obj->new_version = $remote_version;
			$obj->url         = ''; // $this->update_path;
			$obj->package     = ''; // $this->update_path;
			$obj->name        = $plugin_admin->get_updater()->get_title();
			$transient->response[ $this->get_plugin_slug() ] = $obj;
		}

		return $transient;
	}

	/**
	 * Add our self-hosted description to the filter
	 *
	 * @param boolean $false
	 * @param array   $action
	 * @param object  $arg
	 * @return bool|object
	 */
	public function check_info( $false, $action, $arg ) {
		if ( isset( $arg->slug ) && $arg->slug === $this->get_slug() ) {
			$information   = self::wad_load_xml_from_url( $this->get_update_path() );
			$array_pattern = array(
				'/^([\*\s])*(\d\d\.\d\d\.\d\d\d\d[^\n]*)/m',
				'/^\n+|^[\t\s]*\n+/m',
				'/\n/',
			);
			$array_replace = array(
				'<h4>$2</h4>',
				'</div><div>',
				'</div><div>',
			);

						$formatted_info               = new stdClass();
						$plugin                       = new Wad();
						$plugin_admin                 = new WAD_Admin( 'wad', $plugin->get_version() );
						$formatted_info->name         = $plugin_admin->get_updater()->get_title();
						$formatted_info->slug         = 'wad.php';
						$formatted_info->plugin_name  = 'wad.php';
						$formatted_info->new_version  = "$information->latest";
						$formatted_info->last_updated = $information->lastupdated;
						$formatted_info->sections     = array(
							'description' => 'Manage your shop discounts like a pro.',
							'changelog'   => '<div>' . preg_replace( $array_pattern, $array_replace, $information->changelog ) . '</div>',
						);
						// $information->name = $plugin_admin->get_updater()->title;
						// $information->changelog = '<div>xxx' . preg_replace( $array_pattern, $array_replace, $information->changelog ) . '</div>';
						return $formatted_info;
		}
		return $false;
	}

	/**
	 * Return the remote version
	 *
	 * @return string $remote_version
	 */
	public function getRemote_version() {
			$information = self::wad_load_xml_from_url( $this->get_update_path() );
		if ( $information ) {
			return "$information->latest";
			   return "$information->latest";
			return "$information->latest";
		} else {
			return false;
			   return false;
			return false;
		}
	}

	/**
	 * Return the status of the plugin licensing
	 *
	 * @return boolean $remote_license
	 */
	public function getRemote_license() {
		$request = wp_remote_post( $this->get_update_path(), array( 'body' => array( 'action' => 'license' ) ) );
		if ( ! is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) === 200 ) {
			return $request['body'];
		}
		return false;
	}
	/**
	 * Shows message on Wp plugins page with a link for updating from envato.
	 */
	public function addUpgradeMessageLink() {
			$options = get_option( 'wad-options' );
			echo '<style type="text/css" media="all">tr#wpbakery-visual-composer + tr.plugin-update-tr a.thickbox + em { display: none; }</style>';
		if ( isset( $options['purchase-code'] ) && $options['purchase-code'] != '' ) {
				echo '<a href="' . wp_nonce_url( admin_url( 'update.php?action=upgrade-plugin&plugin=' . WAD_MAIN_FILE ), 'upgrade-plugin_' . WAD_MAIN_FILE ) . '">' . __( 'Update Woocommerce All Discounts now.', 'wad' ) . '</a>';
		} else {
			$url = admin_url( 'admin.php?page=wad-manage-settings' );
			echo ' <a href="' . $url . '">' . __( 'A license key is needed to update this plugin.', 'wad' ) . '</a>';
		}
	}

	private static function wad_load_xml_from_url( $url ) {
		if ( function_exists( 'curl_init' ) ) {
			$ch = curl_init( $url );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch, CURLOPT_HEADER, 0 );
			curl_setopt( $ch, CURLOPT_TIMEOUT, 10 );
			$notifier_data = curl_exec( $ch );
			curl_close( $ch );
		}
		if ( ! $notifier_data ) {
			$notifier_data = file_get_contents( $url );
		}
		if ( $notifier_data ) {
			if ( strpos( (string) $notifier_data, '<notifier>' ) === false ) {
				$notifier_data = '<?xml version="1.0" encoding="UTF-8"?><notifier><latest>1.0</latest><changelog></changelog></notifier>';
			}
		}
		$xml = simplexml_load_string( $notifier_data );
		return $xml;
	}
}
