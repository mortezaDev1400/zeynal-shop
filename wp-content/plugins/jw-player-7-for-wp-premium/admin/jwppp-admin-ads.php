<?php
/**
 * Ads options
 * @author ilGhera
 * @package jw-player-7-for-wp-premium/admin
 * @since 2.2.0
 */
?>
<div name="jwppp-ads" id="jwppp-ads" class="jwppp-admin" style="display: none;">
	<?php

	/*Active ads?*/
	$active_ads = sanitize_text_field( get_option( 'jwppp-active-ads' ) );
	if ( isset( $_POST['ads-sent'], $_POST['hidden-nonce-ads'] ) && wp_verify_nonce( $_POST['hidden-nonce-ads'], 'jwppp-nonce-ads' ) ) {
		$active_ads = isset( $_POST['jwppp-active-ads'] ) ? sanitize_text_field( wp_unslash( $_POST['jwppp-active-ads'] ) ) : 0;
		update_option( 'jwppp-active-ads', $active_ads );
	}

	/*Active ads var block*/
	$active_ads_var = sanitize_text_field( get_option( 'jwppp-active-ads-var' ) );

	/*If this option is activated, all the plugin ads options are hidden*/
	$hide = $active_ads_var ? ' style="display: none;"' : '';

	if ( isset( $_POST['ads-sent'] ) ) {
		$hide = isset( $_POST['jwppp-active-ads-var'] ) ? ' style="display: none;"' : '';
		$active_ads_var = isset( $_POST['jwppp-active-ads-var'] ) ? sanitize_text_field( wp_unslash( $_POST['jwppp-active-ads-var'] ) ) : 0;
		update_option( 'jwppp-active-ads-var', $active_ads_var );
	}

	/*Ads var block name*/
	$ads_var_name = sanitize_text_field( get_option( 'jwppp-ads-var-name' ) );
	if ( isset( $_POST['ads-sent'] ) ) {
		$ads_var_name = isset( $_POST['jwppp-ads-var-name'] ) ? sanitize_text_field( wp_unslash( $_POST['jwppp-ads-var-name'] ) ) : '';
		update_option( 'jwppp-ads-var-name', $ads_var_name );
	}

	/*Ads client*/
	$ads_client = sanitize_text_field( get_option( 'jwppp-ads-client' ) );
	if ( isset( $_POST['jwppp-ads-client'] ) ) {
		$ads_client = sanitize_text_field( wp_unslash( $_POST['jwppp-ads-client'] ) );
		update_option( 'jwppp-ads-client', $ads_client );
	}

	/*Ads tag*/
	$ads_tags = get_option( 'jwppp-ads-tag' );
	if ( isset( $_POST['hidden-total-tags'] ) ) {
		$ads_tags = array();
		for ( $i = 0; $i < sanitize_text_field( wp_unslash( $_POST['hidden-total-tags'] ) ); $i++ ) {
			if ( isset( $_POST[ 'jwppp-ads-tag-' . ( $i + 1 ) ], $_POST[ 'jwppp-ads-tag-label' . ( $i + 1 ) ] ) ) {
				$ads_tags[] = array(
					'label' => sanitize_text_field( wp_unslash( $_POST[ 'jwppp-ads-tag-label' . ( $i + 1 ) ] ) ),
					'url'   => esc_url_raw( wp_unslash( $_POST[ 'jwppp-ads-tag-' . ( $i + 1 ) ] ) ),
				);
			}
		}
		update_option( 'jwppp-ads-tag', $ads_tags );
	}

	/*Skipoffset*/
	$ads_skip = sanitize_text_field( get_option( 'jwppp-ads-skip' ) );
	if ( isset( $_POST['jwppp-ads-skip'] ) ) {
		$ads_skip = sanitize_text_field( wp_unslash( $_POST['jwppp-ads-skip'] ) );
		update_option( 'jwppp-ads-skip', $ads_skip );
	}

	/*Bidding*/
	$active_bidding = sanitize_text_field( get_option( 'jwppp-active-bidding' ) );
	if ( isset( $_POST['ads-sent'] ) ) {
		$active_bidding = isset( $_POST['jwppp-active-bidding'] ) ? sanitize_text_field( wp_unslash( $_POST['jwppp-active-bidding'] ) ) : 0;
		update_option( 'jwppp-active-bidding', $active_bidding );
	}

	/*Ad partners*/
	$ad_partners = get_option( 'jwppp-ad-partners' );

	if ( isset( $_POST['hidden-total-partners'] ) ) {
        
        $ad_partners = array();

		for ( $i = 0; $i < sanitize_text_field( wp_unslash( $_POST['hidden-total-partners'] ) ); $i++ ) {

            $partner = null;

            if ( isset( $_POST[ 'jwppp-ad-partner-' . ( $i + 1 ) ] ) ) {
                $partner = sanitize_text_field( wp_unslash( $_POST[ 'jwppp-ad-partner-' . ( $i + 1 ) ] ) ); 
                $ad_partners[ $i ]['name'] = $partner;
            }

            if ( $partner ) {

                if ( isset( $_POST[ 'jwppp-channel-id-' . ( $i + 1 ) ] ) ) {
                    $ad_partners[ $i ]['id'] = sanitize_text_field( wp_unslash( $_POST[ 'jwppp-channel-id-' . ( $i + 1 ) ] ) );
                }

                if ( isset( $_POST[ 'jwppp-del-domain-' . ( $i + 1 ) ] ) ) {
                    $ad_partners[ $i ]['delDomain'] = sanitize_text_field( wp_unslash( $_POST[ 'jwppp-del-domain-' . ( $i + 1 ) ] ) );
                }

                if ( isset( $_POST[ 'jwppp-site-id-' . ( $i + 1 ) ] ) ) {
                    $ad_partners[ $i ]['siteId'] = sanitize_text_field( wp_unslash( $_POST[ 'jwppp-site-id-' . ( $i + 1 ) ] ) );
                }

                if ( isset( $_POST[ 'jwppp-zone-id-' . ( $i + 1 ) ] ) ) {
                    $ad_partners[ $i ]['zoneId'] = sanitize_text_field( wp_unslash( $_POST[ 'jwppp-zone-id-' . ( $i + 1 ) ] ) );
                }

                if ( isset( $_POST[ 'jwppp-inv-code-' . ( $i + 1 ) ] ) ) {
                    $ad_partners[ $i ]['invCode'] = sanitize_text_field( wp_unslash( $_POST[ 'jwppp-inv-code-' . ( $i + 1 ) ] ) );
                }

                if ( isset( $_POST[ 'jwppp-member-id-' . ( $i + 1 ) ] ) ) {
                    $ad_partners[ $i ]['member'] = sanitize_text_field( wp_unslash( $_POST[ 'jwppp-member-id-' . ( $i + 1 ) ] ) );
                }

                if ( isset( $_POST[ 'jwppp-publisher-id-' . ( $i + 1 ) ] ) ) {
                    $ad_partners[ $i ]['publisherId'] = sanitize_text_field( wp_unslash( $_POST[ 'jwppp-publisher-id-' . ( $i + 1 ) ] ) );
                }
            }

        };

		update_option( 'jwppp-ad-partners', $ad_partners );

	}
    
	/*Mediation*/
	$mediation = sanitize_text_field( get_option( 'jwppp-mediation' ) );
	if ( isset( $_POST['jwppp-mediation'] ) ) {
		$mediation = sanitize_text_field( wp_unslash( $_POST['jwppp-mediation'] ) );
		update_option( 'jwppp-mediation', $mediation );
	}

	/*Floor price*/
	$floor_price = get_option( 'jwppp-floor-price' ) ? sanitize_text_field( get_option( 'jwppp-floor-price' ) ) : '10';
	if ( isset( $_POST['jwppp-floor-price'] ) ) {
		$floor_price = sanitize_text_field( wp_unslash( $_POST['jwppp-floor-price'] ) );
		update_option( 'jwppp-floor-price', $floor_price );
	}

	/*Range price*/
	$range_price_increment = get_option( 'jwppp-range-price-increment' ) ? sanitize_text_field( get_option( 'jwppp-range-price-increment' ) ) : '10';
	if ( isset( $_POST['jwppp-range-price-increment'] ) ) {
		$range_price_increment = sanitize_text_field( wp_unslash( $_POST['jwppp-range-price-increment'] ) );
		update_option( 'jwppp-range-price-increment', $range_price_increment );
	}
    
	$range_price_max = get_option( 'jwppp-range-price-max' ) ? sanitize_text_field( get_option( 'jwppp-range-price-max' ) ) : '10';
	if ( isset( $_POST['jwppp-range-price-max'] ) ) {
		$range_price_max = sanitize_text_field( wp_unslash( $_POST['jwppp-range-price-max'] ) );
		update_option( 'jwppp-range-price-max', $range_price_max );
	}

	$range_price_min = get_option( 'jwppp-range-price-min' ) ? sanitize_text_field( get_option( 'jwppp-range-price-min' ) ) : '10';
	if ( isset( $_POST['jwppp-range-price-min'] ) ) {
		$range_price_min = sanitize_text_field( wp_unslash( $_POST['jwppp-range-price-min'] ) );
		update_option( 'jwppp-range-price-min', $range_price_min );
	}
    
	/*GDPR*/
	$active_gdpr = sanitize_text_field( get_option( 'jwppp-active-gdpr' ) );
	if ( isset( $_POST['ads-sent'] ) ) {
		$active_gdpr = isset( $_POST['jwppp-active-gdpr'] ) ? sanitize_text_field( wp_unslash( $_POST['jwppp-active-gdpr'] ) ) : 0;
		update_option( 'jwppp-active-gdpr', $active_gdpr );
	}

	$gdpr_cmp_api = sanitize_text_field( get_option( 'jwppp-gdpr-cmp-api' ) );
	if ( isset( $_POST['ads-sent'] ) ) {
		$gdpr_cmp_api = isset( $_POST['jwppp-gdpr-cmp-api'] ) ? sanitize_text_field( wp_unslash( $_POST['jwppp-gdpr-cmp-api'] ) ) : 0;
		update_option( 'jwppp-gdpr-cmp-api', $gdpr_cmp_api );
	}

	$gdpr_timeout = get_option( 'jwppp-gdpr-timeout' ) ? sanitize_text_field( get_option( 'jwppp-gdpr-timeout' ) ) : 10000;
	if ( isset( $_POST['ads-sent'] ) ) {
		$gdpr_timeout = isset( $_POST['jwppp-gdpr-timeout'] ) ? sanitize_text_field( wp_unslash( $_POST['jwppp-gdpr-timeout'] ) ) : 0;
		update_option( 'jwppp-gdpr-timeout', $gdpr_timeout );
	}

	$default_gdpr_scope = sanitize_text_field( get_option( 'jwppp-default-gdpr-scope' ) );
	if ( isset( $_POST['ads-sent'] ) ) {
		$default_gdpr_scope = isset( $_POST['jwppp-default-gdpr-scope'] ) ? sanitize_text_field( wp_unslash( $_POST['jwppp-default-gdpr-scope'] ) ) : 0;
		update_option( 'jwppp-default-gdpr-scope', $default_gdpr_scope );
	}

	/*CCPA*/
	$active_ccpa = sanitize_text_field( get_option( 'jwppp-active-ccpa' ) );
	if ( isset( $_POST['ads-sent'] ) ) {
		$active_ccpa = isset( $_POST['jwppp-active-ccpa'] ) ? sanitize_text_field( wp_unslash( $_POST['jwppp-active-ccpa'] ) ) : 0;
		update_option( 'jwppp-active-ccpa', $active_ccpa );
	}

	$ccpa_cmp_api = sanitize_text_field( get_option( 'jwppp-ccpa-cmp-api' ) );
	if ( isset( $_POST['ads-sent'] ) ) {
		$ccpa_cmp_api = isset( $_POST['jwppp-ccpa-cmp-api'] ) ? sanitize_text_field( wp_unslash( $_POST['jwppp-ccpa-cmp-api'] ) ) : 0;
		update_option( 'jwppp-ccpa-cmp-api', $ccpa_cmp_api );
	}

	$ccpa_timeout = get_option( 'jwppp-ccpa-timeout' ) ? sanitize_text_field( get_option( 'jwppp-ccpa-timeout' ) ) : 10000;
	if ( isset( $_POST['ads-sent'] ) ) {
		$ccpa_timeout = isset( $_POST['jwppp-ccpa-timeout'] ) ? sanitize_text_field( wp_unslash( $_POST['jwppp-ccpa-timeout'] ) ) : 0;
		update_option( 'jwppp-ccpa-timeout', $ccpa_timeout );
	}

	/*Define the allowed tags for wp_kses*/
	$allowed_tags = array(
		'u' => [],
		'strong' => [],
		'a' => [
			'href'   => [],
			'target' => [],
		],
		'br' => [],
	);

	echo '<form id="jwppp-ads" name="jwppp-ads" method="post" action="">';
	echo '<table class="form-table">';

	/*Active ads?*/
	echo '<tr class="jwppp-active-ads">';
	echo '<th scope="row">' . esc_html( __( 'Active Video Ads', 'jwppp' ) ) . '</th>';
	echo '<td>';
	echo '<input type="checkbox" id="jwppp-active-ads" name="jwppp-active-ads" value="1"';
	echo ( 1 === intval( $active_ads ) ) ? ' checked="checked"' : '';
	echo ' />';
	echo '<p class="description">' . wp_kses( __( 'Add a <strong>Basic Preroll Video Ads</strong>', 'jwppp' ), $allowed_tags ) . '</p>';
	echo '<p class="description">' . wp_kses( __( 'This option is only available with the <u>JW Player Enterprise license</u> -- details <a href="https://www.jwplayer.com/pricing/" target="_blank">here</a> ', 'jwppp' ), $allowed_tags ) . '</p>';
	echo '<td>';
	echo '</tr>';

	/*Ads embed block variable*/
	echo '<tr class="ads-options ads-var-block activation">';
	echo '<th scope="row">' . esc_html( __( 'Ads Variable', 'jwppp' ) ) . '</th>';
	echo '<td>';
	echo '<input type="checkbox" id="jwppp-active-ads-var" name="jwppp-active-ads-var" value="1"';
	echo ( 1 === intval( $active_ads_var ) ) ? ' checked="checked"' : '';
	echo ' />';
	echo '<p class="description">' . esc_html( __( 'Use an advertising embed block variable', 'jwppp' ) ) . '</p>';
	echo '<td>';
	echo '</tr>';

	/*Ads variable's name*/
	echo '<tr class="ads-options ads-var-block"' . ( ! $active_ads_var ? ' style="display: none;"' : '' ) . '>';
	echo '<th scope="row">' . esc_html( __( 'Ads variable name', 'jwppp' ) ) . '</th>';
	echo '<td>';
	echo '<input type="text" class="regular-text" id="jwppp-ads-var-name" name="jwppp-ads-var-name" value="' . esc_attr( $ads_var_name ) . '" />';
	echo '<p class="description">' . esc_html( __( 'Add the name of the advertising variable.', 'jwppp' ) ) . '</p>';
	echo '<td>';
	echo '</tr>';

	/*Ads client*/
	echo '<tr class="ads-options"' . esc_attr( $hide ) . '>';
	echo '<th scope="row">' . esc_html( __( 'Ads Client' ) ) . '</th>';
	echo '<td>';
	echo '<select id="jwppp-ads-client" name="jwppp-ads-client" />';
	echo '<option name="googima" value="googima"';
	echo ( 'googima' === $ads_client ) ? ' selected="selected"' : '';
	echo '>Google IMA</option>';
	echo '<option name="vast" value="vast"';
	echo ( 'vast' === $ads_client ) ? ' selected="selected"' : '';
	echo '>Vast</option>';
	echo '</select>';
	echo '<p class="description">' . wp_kses( __( 'Select your ADS Client. More info <a href="https://support.jwplayer.com/customer/portal/articles/1431638-ad-formats-reference" target="_blank">here</a>' ), $allowed_tags ) . '</p>';
	echo '</td>';
	echo '</tr>';

	/*Ads tag*/

	/*Nonce*/
	$add_tag_nonce = wp_create_nonce( 'jwppp-nonce-add-tag' );
	wp_localize_script( 'jwppp-admin', 'addTag', array( 'nonce' => $add_tag_nonce ) );

	echo '<tr class="ads-options tag"' . esc_attr( $hide ) . '>';
	echo '<th scope="row">' . esc_html( __( 'Ad Tags', 'jwppp' ) ) . '</th>';
	echo '<td>';
	echo '<ul style="margin: 0;">';

	$total_tags = 1;
	if ( is_array( $ads_tags ) && ! empty( $ads_tags ) ) {
		for ( $i = 1; $i <= count( $ads_tags ); $i++ ) {
			jwppp_ads_tag( $i, $ads_tags[ $i - 1 ] );
		}
		$total_tags = count( $ads_tags );
	} elseif ( is_string( $ads_tags ) ) {
		jwppp_ads_tag( 1, $ads_tags );
	} else {
		jwppp_ads_tag( 1 );
	}

	echo '</ul>';
	echo '<input type="hidden" name="hidden-total-tags" class="hidden-total-tags" value="' . esc_attr( $total_tags ) . '" />';
	echo '<p class="description">' . esc_html( __( 'Ad tag URL | Ad Tag Name', 'jwppp' ) ) . '</p>';
	echo '</td>';
	echo '</tr>';

	/*Skipoffset*/
	echo '<tr class="ads-options"' . esc_attr( $hide ) . '>';
	echo '<th scope="row">' . esc_html( __( 'Ad Skipping', 'jwppp' ) ) . '</th>';
	echo '<td>';
	echo '<input type="number" min="0" step="1" class="small-text" id="jwppp-ads-skip" name="jwppp-ads-skip" value="' . esc_attr( $ads_skip ) . '" />';
	echo '<p class="description">' . esc_html( __( 'Total seconds viewers must watch an ad before being allowed to skip', 'jwppp' ) ) . '</p>';
	echo '</td>';
	echo '</tr>';

	/*Bidding*/
	echo '<tr class="ads-options jwppp-active-bidding"' . esc_attr( $hide ) . '>';
	echo '<th scope="row">' . esc_html( __( 'Player Bidding', 'jwppp' ) ) . '</th>';
	echo '<td>';
	echo '<input type="checkbox" id="jwppp-active-bidding" name="jwppp-active-bidding" value="1"';
	echo ( 1 === intval( $active_bidding ) ) ? ' checked="checked"' : '';
	echo ' />';
	echo '<span class="jwppp-check-label">' . esc_html( __( 'Enable Video Player Bidding', 'jwppp' ) ) . '</span>';
	echo '<p class="description">';
	echo wp_kses( __( 'All the benefits of Header Bidding are now built directly into your JW Player. With a simple one-click integration, you get access to quality demand at scale with reduced latency. SpotX is the leading video ad serving platform and gives publishers control, transparency and insights to maximize revenue.<br><a href="https://support.jwplayer.com/articles/how-to-setup-video-player-bidding" target="_blank">Contact SpotX to get started</a>', 'jwppp' ), $allowed_tags );
	echo '</p>';
	echo '</td>';
	echo '</tr>';

	echo '<tr class="ads-options bidding ad-partners"' . esc_attr( $hide ) . '>';
	echo '<th scope="row">' . esc_html( __( 'Ad partners', 'jwppp' ) ) . '</th>';
	echo '<td>';
	echo '<ul style="margin: 0;">';
    
	/*Nonce*/
	$add_partner_nonce = wp_create_nonce( 'jwppp-nonce-add-partner' );
	wp_localize_script( 'jwppp-admin', 'addPartner', array( 'nonce' => $add_partner_nonce ) );

	$total_partners = 1;
	if ( is_array( $ad_partners ) && ! empty( $ad_partners ) ) {
		for ( $i = 1; $i <= count( $ad_partners ); $i++ ) {
			jwppp_ad_partner( $i, $hide, $ad_partners[ $i - 1 ] );
		}
		$total_partners = count( $ad_partners );
	} else {
		jwppp_ad_partner( 1, $hide );
	}

	echo '</ul>';
	echo '<input type="hidden" name="hidden-total-partners" class="hidden-total-partners" value="' . esc_attr( $total_partners ) . '" />';
	echo '<p class="description">' . esc_html( __( 'Select your ad partners', 'jwppp' ) ) . '</p>';
	echo '</td>';
	echo '</tr>';

	/*Mediation*/
	echo '<tr class="ads-options bidding"' . esc_attr( $hide ) . '>';
	echo '<th scope="row">' . esc_html( __( 'Mediation', 'jwppp' ) ) . '</th>';
	echo '<td>';
	echo '<select id="jwppp-mediation" name="jwppp-mediation" />';

	echo '<option name="jwp" class="jwp" value="jwp"';
	echo ( 'jwp' === $mediation ) ? ' selected="selected"' : '';
	echo '>' . esc_html( __( 'JW Player', 'jwppp' ) ) . '</option>';


	echo '<option name="jwpdfp" class="jwpdfp" value="jwpdfp"';
	echo ( 'jwpdfp' === $mediation ) ? ' selected="selected"' : '';
	echo '>' . esc_html( __( 'JW Player + DFP', 'jwppp' ) ) . '</option>';


	echo '<option name="dfp" class="dfp" value="dfp"';
	echo ( 'dfp' === $mediation ) ? ' selected="selected"' : '';
	echo '>' . esc_html( __( 'Google Ad Manager', 'jwppp' ) ) . '</option>';


	echo '<option name="jwpspotx" value="jwpspotx"';
	echo ( 'jwpspotx' === $mediation ) ? ' selected="selected"' : '';
	echo '>' . esc_html( __( 'SpotX as Primary Adserver', 'jwppp' ) ) . '</option>';
	echo '</select>';
	echo '<p class="description">' . esc_html( __( 'Select mediation option', 'jwppp' ) ) . '</p>';
	echo '</td>';
	echo '</tr>';

	/*Floor price*/
	echo '<tr class="ads-options bidding floor-price"' . esc_attr( $hide ) . '>';
	echo '<th scope="row">' . esc_html( __( 'Floor Price', 'jwppp' ) ) . '</th>';
	echo '<td>';
	echo '<span class="currency">$</span>';
	echo '<input type="number" min="0" step="0.01" class="small-text" id="jwppp-floor-price" name="jwppp-floor-price" value="' . esc_attr( $floor_price ) . '" />';
	echo '<p class="description">' . esc_html( __( 'Set floor price', 'jwppp' ) ) . '</p>';
	echo '</td>';
	echo '</tr>';

	/*Price range*/
	echo '<tr class="ads-options bidding range-price"' . esc_attr( $hide ) . '>';
	echo '<th scope="row">' . esc_html( __( 'Price Range', 'jwppp' ) ) . '</th>';
	echo '<td>';
	echo '<span class="currency">$</span>';
	echo '<input type="number" min="0" step="0.01" class="small-text" id="jwppp-range-price-increment" name="jwppp-range-price-increment" value="' . esc_attr( $range_price_increment ) . '" />';
	echo '<p class="description">' . esc_html( __( 'Nearest increment to which a bid is rounded down, in bidding currency	', 'jwppp' ) ) . '</p>';
	echo '<span class="currency">$</span>';
	echo '<input type="number" min="0" step="0.01" class="small-text" id="jwppp-range-price-max" name="jwppp-range-price-max" value="' . esc_attr( $range_price_max ) . '" />';
	echo '<p class="description">' . esc_html( __( 'Maximum value of a price bucket, in bidding currency', 'jwppp' ) ) . '</p>';
	echo '<span class="currency">$</span>';
	echo '<input type="number" min="0" step="0.01" class="small-text" id="jwppp-range-price-min" name="jwppp-range-price-min" value="' . esc_attr( $range_price_min ) . '" />';
	echo '<p class="description">' . esc_html( __( 'Minimum value of a price bucket, in bidding currency', 'jwppp' ) ) . '</p>';
	echo '</td>';
	echo '</tr>';

    /*GDPR*/
	echo '<tr class="ads-options bidding gdpr"' . esc_attr( $hide ) . '>';
	echo '<th scope="row">' . esc_html( __( 'GDPR', 'jwppp' ) ) . '</th>';
	echo '<td>';
	echo '<input type="checkbox" id="jwppp-active-gdpr" name="jwppp-active-gdpr" value="1"';
	echo ( 1 === intval( $active_gdpr ) ) ? ' checked="checked"' : '';
	echo ' />';
	echo '<span class="jwppp-check-label">' . esc_html( __( 'Enable GDPR', 'jwppp' ) ) . '</span>';
	echo '<select id="jwppp-gdpr-cmp-api" class="gdpr" name="jwppp-gdpr-cmp-api" />';
	echo '<option name="iab" class="iab" value="iab"';
	echo ( 'iab' === $gdpr_cmp_api ) ? ' selected="selected"' : '';
	echo '>' . esc_html( __( 'IAB', 'jwppp' ) ) . '</option>';
	echo '<option name="static" class="static" value="static"';
	echo ( 'static' === $gdpr_cmp_api ) ? ' selected="selected"' : '';
	echo '>' . esc_html( __( 'Static', 'jwppp' ) ) . '</option>';
    echo '</select>';
	echo '<p class="description gdpr">' . esc_html( __( 'The CMP interface that is in use.', 'jwppp' ) ) . '</p>';
	echo '<input type="number" min="1000" step="100" class="small-text gdpr" id="jwppp-gdpr-timeout" name="jwppp-gdpr-timeout" value="' . esc_attr( $gdpr_timeout ) . '" />';
	echo '<p class="description gdpr">' . esc_html( __( 'Length of time (in milliseconds) to allow the CMP to obtain the GDPR consent string', 'jwppp' ) ) . '</p>';
	echo '<select id="jwppp-default-gdpr-scope" class="gdpr" name="jwppp-default-gdpr-scope" />';
	echo '<option name="false" class="false" value="0"';
	echo ( 0 === intval( $default_gdpr_scope ) ) ? ' selected="selected"' : '';
	echo '>' . esc_html( __( 'False', 'jwppp' ) ) . '</option>';
	echo '<option name="true" class="true" value="1"';
	echo ( 1 === intval( $default_gdpr_scope ) ) ? ' selected="selected"' : '';
	echo '>' . esc_html( __( 'True', 'jwppp' ) ) . '</option>';
    echo '</select>';
	echo '<p class="description gdpr">' . esc_html( __( 'Defines what the gdprApplies flag should be when the CMP doesn???t respond in time or the static data doesn???t supply.', 'jwppp' ) ) . '</p>';
	echo '</td>';
	echo '</tr>';

    /*CCPA*/
	echo '<tr class="ads-options bidding ccpa"' . esc_attr( $hide ) . '>';
	echo '<th scope="row">' . esc_html( __( 'CCPA', 'jwppp' ) ) . '</th>';
	echo '<td>';
	echo '<input type="checkbox" id="jwppp-active-ccpa" name="jwppp-active-ccpa" value="1"';
	echo ( 1 === intval( $active_ccpa ) ) ? ' checked="checked"' : '';
	echo ' />';
	echo '<span class="jwppp-check-label">' . esc_html( __( 'Enable CCPA', 'jwppp' ) ) . '</span>';
	echo '<select id="jwppp-ccpa-cmp-api" class="ccpa" name="jwppp-ccpa-cmp-api" />';
	echo '<option name="iab" class="iab" value="iab"';
	echo ( 'iab' === $ccpa_cmp_api ) ? ' selected="selected"' : '';
	echo '>' . esc_html( __( 'IAB', 'jwppp' ) ) . '</option>';
	echo '<option name="static" class="static" value="static"';
	echo ( 'static' === $ccpa_cmp_api ) ? ' selected="selected"' : '';
	echo '>' . esc_html( __( 'Static', 'jwppp' ) ) . '</option>';
    echo '</select>';
	echo '<p class="description ccpa">' . esc_html( __( 'The CMP interface that is in use.', 'jwppp' ) ) . '</p>';
	echo '<input type="number" min="1000" step="100" class="small-text ccpa" id="jwppp-ccpa-timeout" name="jwppp-ccpa-timeout" value="' . esc_attr( $ccpa_timeout ) . '" />';
	echo '<p class="description ccpa">' . esc_html( __( 'Length of time (in milliseconds) to allow the CMP to obtain the GDPR consent string', 'jwppp' ) ) . '</p>';
	echo '</td>';
	echo '</tr>';

	echo '</table>';

	/*Add nonce to the form*/
	wp_nonce_field( 'jwppp-nonce-ads', 'hidden-nonce-ads' );

	echo '<input type="hidden" name="ads-sent" value="1" />';
	echo '<input class="button button-primary" type="submit" id="submit" value="' . esc_attr( __( 'Save options', 'jwppp' ) ) . '" />';
	echo '</form>';
	?>
</div>
