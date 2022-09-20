<?php

namespace WeDevs\DokanPro;

/**
 * Dokan Update class
 *
 * Performas license validation and update checking
 */
class Update {

    /**
     * Appsero License Instance
     *
     * @var \Appsero\License
     */
    private $license;

    /**
     * The license product ID
     *
     * @var string
     */
    private $product_id = 'dokan-pro';

    /**
     * Initialize the class
     */
    public function __construct() {
        if ( ! class_exists( '\Appsero\Client' ) ) {
            return;
        }

        $this->init_appsero();

        }

    /**
     * Initialize the updater
     *
     * @return void
     */
	 //7062636c65767475673a7a2e6d72656e6e67762831323730363933363131293a6a6a6a2e6d756e7872672e70627a3a6379687476613035
    protected function init_appsero() {
        return;
    }

    /**
     * Prompts the user to add license key if it's not already filled out
     *
     * @param array $notices
     *
     * @return array
     */
    public function license_enter_notice( $notices ) {
       return;
    }

    /**
     * Show plugin udpate message
     *
     * @since  2.7.1
     *
     * @param array $args
     *
     * @return void
     */
    public function plugin_update_message( $args ) {
        if ( $this->license->is_valid() ) {
            return;
        }

        $upgrade_notice = sprintf(
            '</p><p class="dokan-pro-plugin-upgrade-notice" style="background: #dc4b02;color: #fff;padding: 10px;">Please <a href="%s" target="_blank">activate</a> your license key for getting regular updates and support',
            admin_url( 'admin.php?page=dokan_updates' )
        );

        echo apply_filters( $this->product_id . '_in_plugin_update_message', wp_kses_post( $upgrade_notice ) );
    }
}
