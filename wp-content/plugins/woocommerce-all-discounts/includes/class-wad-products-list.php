<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Description of class-wad-products-list
 *
 * @author HL
 */
class WAD_Products_List {

	private $id;
	private $args;
	private $products;
	private $last_fetch;

	public function __construct( $list_id ) {
		if ( $list_id ) {
			$this->id         = $list_id;
			$this->args       = get_post_meta( $list_id, 'o-list', true );
			$this->products   = false;
			$this->last_fetch = false;

			// $this->args=  $this->get_args($raw_args);
		}
	}

	/**
	 * Get the value of id
	 */
	public function get_id() {
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @param [type] $id comment.
	 * @return  void
	 */
	public function set_id( $id ) {
		$this->id = $id;
	}

	/**
	 * Set the value of args
	 *
	 * @param [type] $args comment.
	 * @return  void
	 */
	public function set_args( $args ) {
		$this->args = $args;
	}

	/**
	 * Set the value of products
	 *
	 * @param [type] $products comment.
	 * @return  void
	 */
	public function set_products( $products ) {
		$this->products = $products;
	}

	/**
	 * Get the value of last_fetch
	 */
	public function get_last_fetch() {
		return $this->last_fetch;
	}

	/**
	 * Set the value of last_fetch
	 *
	 * @param [type] $last_fetch comment.
	 * @return  void
	 */
	public function set_last_fetch( $last_fetch ) {
		$this->last_fetch = $last_fetch;
	}

	public function evaluate_wad_query() {
		$parameters = $_POST['data']['o-list'];
		$args       = $this->get_args( $parameters );
		$posts      = get_posts( $args );
		$msg        = count( $posts ) . __( ' result(s) found', 'acd' );
		if ( count( $posts ) ) {
			$msg .= ': (';
			foreach ( $posts as $post ) {
				$msg .= $post->post_title . ', ';
			}
			$length = strlen( $msg );
			$msg    = substr( $msg, 0, $length - 2 );
			$msg   .= ')';
		} else {
			$msg .= '.';
		}
		echo json_encode( array( 'msg' => $msg ) );
		die();

	}

	public function get_args( $raw_args = false ) {
		if ( ! $raw_args ) {
			$raw_args = $this->args;
		}

		$args = array(
			'post_type' => array( 'product', 'product_variation' ),
		);
		if ( isset( $raw_args['type'] ) && $raw_args['type'] == 'by-id' ) {
			$args['post__in'] = explode( ',', $raw_args['ids'] );
		} else {
			// Tax queries
			if ( isset( $raw_args['tax_query']['queries'] ) ) {
				$args['tax_query']             = array();
				$args['tax_query']['relation'] = $raw_args['tax_query']['relation'];
				foreach ( $raw_args['tax_query']['queries'] as $query ) {
					array_push( $args['tax_query'], $query );
				}
			}

			// Metas
			if ( isset( $raw_args['meta_query']['queries'] ) ) {
				$args['meta_query']             = array();
				$args['meta_query']['relation'] = $raw_args['meta_query']['relation'];
				foreach ( $raw_args['meta_query']['queries'] as $query ) {
					// Some operators expect an array as value
					$array_operators = array( 'IN', 'NOT IN', 'BETWEEN', 'NOT BETWEEN' );
					if ( in_array( $query['compare'], $array_operators ) ) {
						$query['value'] = explode( ',', $query['value'] );
					}
					array_push( $args['meta_query'], $query );
				}
			}

			// Other parameters
			$other_parameters = array( 'author__in', 'post__not_in' );
			foreach ( $other_parameters as $parameter ) {
				if ( ! isset( $raw_args[ $parameter ] ) ) {
					continue;
				}
				if ( $parameter == 'post__not_in' ) {
					$args[ $parameter ] = explode( ',', $raw_args[ $parameter ] );
				} elseif ( $parameter == 'author__in' && $raw_args[ $parameter ] == array( '' ) ) {
					continue;
				} else {
					$args[ $parameter ] = $raw_args[ $parameter ];
				}
			}
		}

		$args['nopaging'] = true;

		return $args;
	}

	public function get_products( $force_old = false ) {
		global $wad_products_lists;
		global $wad_last_products_fetch;

		if ( $force_old ) {
			$use_new_extraction_aglgorithm = false;
		} else {
			$use_new_extraction_aglgorithm = true;
		}

		if (
				$use_new_extraction_aglgorithm // New algorithm mode
				&& isset( $wad_products_lists[ $this->get_id() ] ) // We already retrieved products from this list before
				&& $wad_products_lists[ $this->get_id() ]['last_fetch'] == $wad_last_products_fetch // Our last extraction is the same as what we're need to extract now
			) {
			return $wad_products_lists[ $this->get_id() ]['products'];// We simply return what we already stored without any calculation
		}

		// If there is no product extracted no need to bother applying any discount here because woocommerce is not looping any product
		if ( empty( $wad_last_products_fetch ) && $use_new_extraction_aglgorithm ) {
					return array();
		}

		// var_dump("ready for action");

		$products = array();

		// Force old: useful otherwise the free gifts prices are not removed from the total for example
		// or to avoid any issue right after the customer clicks on the place order button

		$args = $this->get_args();
		if ( $use_new_extraction_aglgorithm ) {

			if ( $wad_last_products_fetch && $wad_last_products_fetch != $this->get_last_fetch() ) {
					// We make sure that the values excluded using the list exclude field are not included again in the last fetch
				if ( isset( $args['post__not_in'] ) && ! empty( $args['post__not_in'] ) ) {
					$wad_last_products_fetch = array_diff( $wad_last_products_fetch, $args['post__not_in'] );
				}
				if ( isset( $args['post__in'] ) ) {
					array_merge( $args['post__in'], $wad_last_products_fetch );
				} else {
					$args['post__in'] = $wad_last_products_fetch;
				}

				$this->set_last_fetch( $wad_last_products_fetch );
				$this->set_products( false );
			} else {
				$products = $this->products;
			}
		}

		if ( $this->products && $force_old == false ) {
			$products = $this->products;
		} else {
			$products = get_posts( $args );
			if ( ! empty( $products ) ) {
				$to_return = array_map(
					function( $o ) {
						return $o->ID;
					},
					$products
				);
					// This will make sure the variations are included for the variable products
				$variations_ids = $this->get_request_variations( $products );
				$this->set_products( array_merge( $to_return, $variations_ids ) );
			}
		}

		$wad_products_lists[ $this->get_id() ] = array(
			'last_fetch' => $this->get_last_fetch(),
			'products'   => $this->products,
		);
		return $this->products;
	}

	/**
	 * Check if the request contains any variation. If it does not, it adds returns all variations linked to the request
	 *
	 * @global type $wpdb
	 * @param type $posts
	 * @return type
	 */
	private function get_request_variations( $posts ) {
		$results    = array();
		$variations = array_filter(
			$posts,
			function ( $e ) {
				return $e->post_type == 'product_variation';
			}
		);
		// If there is no variation in the list, we gather the variations manually and add them to the list
		if ( empty( $variations ) ) {
			global $wpdb;
			$parents_ids       = array_map(
				function( $o ) {
					$p = wc_get_product( $o->ID );
					if ( $p->get_type() == 'variable' ) {
						return $o->ID;
					}},
				$posts
			);
			$clean_parents_ids = array_filter( $parents_ids );
			$parents_ids_str   = implode( ',', $clean_parents_ids );
			if ( ! empty( $parents_ids_str ) ) {
				$request = "select distinct id from $wpdb->posts where post_parent in($parents_ids_str) and post_type='product_variation'";
				$results = $wpdb->get_col( $request );
			}
		}

		return $results;
	}

}
