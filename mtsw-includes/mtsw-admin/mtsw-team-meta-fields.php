<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}	
add_action( 'admin_menu', 'mtsw_meta_box_setup');
add_action( 'save_post','mtsw_meta_box_save');
	function mtsw_meta_box_setup () {
		add_meta_box( 'team-details', __( 'Members Details', 'modern-team-showcase-with-widget' ), 'mtsw_meta_box_content' , 'our-teams', 'normal', 'high' );
	}
	function mtsw_meta_box_content () {
		global $post_id;
		$values = get_post_custom( $post_id );
		$mtsw_field_data = mtsw_get_custom_values_settings();
		$mtsw_html = '';
		$mtsw_html .= wp_nonce_field( 'mtsw_meta_box_save', 'wp_mtsw_noonce' );
		if ( 0 < count( $mtsw_field_data ) ) {
			$mtsw_html .= '<table class="form-table">' . "\n";
			$mtsw_html .= '<tbody>' . "\n";
			foreach ( $mtsw_field_data as $d => $v ) {
				$data = $v['default'];
				if ( isset( $values['_' . $d] ) && isset( $values['_' . $d][0] ) ) {
					$data = $values['_' . $d][0];
				}
				$mtsw_html .= '<tr valign="top"><th scope="row"><label for="' . mtsw_esc_attr( $d ) . '">' . $v['name'] . '</label></th><td><input name="' . mtsw_esc_attr( $d ) . '" type="text" id="' . mtsw_esc_attr( $d ) . '" class="regular-text" value="' . mtsw_esc_attr( $data ) . '" />' . "\n";
				$mtsw_html .= '<p class="description">' . $v['description'] . '</p>' . "\n";
				$mtsw_html .= '</td><tr/>' . "\n";
			}
			$mtsw_html .= '</tbody>' . "\n";
			$mtsw_html .= '</table>' . "\n";
		}
		echo $mtsw_html;
	}
	function mtsw_meta_box_save ( $post_id ) {
		global $post, $messages;
		// Verify
		if ( ( get_post_type( $post_id) != 'our-teams' ) ) {
			return $post_id;
		}
		if ( ! isset( $_POST['wp_mtsw_noonce'] ) ) {
		return $post_id;
	}
		if ( ! wp_verify_nonce( $_POST['wp_mtsw_noonce'], 'mtsw_meta_box_save' ) ) {
			return $post_id;
		  }
			if ( 'page' == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return $post_id;
				}
			} else {
				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return $post_id;
				}
			}
		$mtsw_field_data = mtsw_get_custom_values_settings();
		$values = array_keys( $mtsw_field_data );
		foreach ( $values as $v ) {
			${$v} = strip_tags(trim($_POST[$v]));			
			if ( 'url' == $mtsw_field_data[$v]['type'] ) {
				${$v} = esc_url( ${$v} );
			}
			if ( get_post_meta( $post_id, '_' . $v ) == '' ) {				

				add_post_meta( $post_id, '_' . $v, ${$v}, true );
			} elseif( ${$v} != get_post_meta( $post_id, '_' . $v, true ) ) {
				update_post_meta( $post_id, '_' . $v, ${$v} );
			} elseif ( ${$v} == '' ) {
				delete_post_meta( $post_id, '_' . $v, get_post_meta( $post_id, '_' . $v, true ) );
			}
		}
	}
	function mtsw_get_custom_values_settings () {
		$values = array();
		$values['member_position'] = array(
		    'name' => __( 'Member Position', 'modern-team-showcase-with-widget' ),
		    'description' => __( '' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);	
		return $values;
	}
	add_action( 'admin_menu', 'mtsw_meta_box_setup_social');
	add_action( 'save_post','mtsw_meta_box_social_save');
	function mtsw_meta_box_setup_social () {
		add_meta_box( 'team-details-social', __( 'Social Details', 'modern-team-showcase-with-widget' ), 'mtsw_meta_box_content_social' , 'our-teams', 'normal', 'high' );
	}
	function mtsw_meta_box_content_social () {
		global $post_id;
		$values = get_post_custom( $post_id );
		$mtsw_field_data = mtsw_custom_values_settings_social();
		$mtsw_html = '';
		$mtsw_html .= wp_nonce_field( 'mtsw_meta_box_social_save', 'mtsw_social_noonce' );
		if ( 0 < count( $mtsw_field_data ) ) {
			$mtsw_html .= '<table class="form-table">' . "\n";
			$mtsw_html .= '<tbody>' . "\n";
			foreach ( $mtsw_field_data as $d => $v ) {
				$data = $v['default'];
				if ( isset( $values['_' . $d] ) && isset( $values['_' . $d][0] ) ) {
					$data = $values['_' . $d][0];
				}
				$mtsw_html .= '<tr valign="top"><th scope="row"><label for="' . mtsw_esc_attr( $d ) . '">' . $v['name'] . '</label></th><td><input name="' . mtsw_esc_attr( $d ) . '" type="URL" id="' . mtsw_esc_attr( $d ) . '" class="regular-text" value="' . mtsw_esc_attr( $data ) . '" />' . "\n";
				$mtsw_html .= '<p class="description">' . $v['description'] . '</p>' . "\n";
				$mtsw_html .= '</td><tr/>' . "\n";
			}
			$mtsw_html .= '</tbody>' . "\n";
			$mtsw_html .= '</table>' . "\n";
		}
		echo $mtsw_html;
	}
	function mtsw_meta_box_social_save ( $post_id ) {
		global $post, $messages;
		// Verify
		if ( ( get_post_type( $post_id) != 'our-teams' ) ) {
			return $post_id;
		}
		if ( ! isset( $_POST['mtsw_social_noonce'] ) ) {
		return $post_id;
	}
		if ( ! wp_verify_nonce( $_POST['mtsw_social_noonce'], 'mtsw_meta_box_social_save' ) ) {
			return $post_id;
		  }
			if ( 'page' == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return $post_id;
				}
			} else {
				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return $post_id;
				}
			}
		$mtsw_field_data = mtsw_custom_values_settings_social();
		$values = array_keys( $mtsw_field_data );
		foreach ( $values as $f ) {
			${$f} = strip_tags(trim($_POST[$f]));			
			if ( 'url' == $mtsw_field_data[$f]['type'] ) {
				${$f} = esc_url( ${$f} );
			}
			if ( get_post_meta( $post_id, '_' . $f ) == '' ) {
				add_post_meta( $post_id, '_' . $f, ${$f}, true );
			} elseif( ${$f} != get_post_meta( $post_id, '_' . $f, true ) ) {
				update_post_meta( $post_id, '_' . $f, ${$f} );
			} elseif ( ${$f} == '' ) {
				delete_post_meta( $post_id, '_' . $f, get_post_meta( $post_id, '_' . $f, true ) );
			}
		}
	}
	function mtsw_custom_values_settings_social () {
		$values = array();		
		$values['facebook_url'] = array(
		    'name' => __( 'Facebook URL', 'modern-team-showcase-with-widget' ),
		    'description' => __( 'https://www.facebook.com' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);
		$values['likdin_url'] = array(
		    'name' => __( 'Linkedin URL', 'modern-team-showcase-with-widget' ),
		    'description' => __( 'https://www.linkedin.com' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);
		$values['insta_url'] = array(
		    'name' => __( 'Instagram URL', 'modern-team-showcase-with-widget' ),
		    'description' => __( 'https://www.instagram.com' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);
		$values['twitter_url'] = array(
		    'name' => __( 'Twitter URL', 'modern-team-showcase-with-widget' ),
		    'description' => __( 'https://www.twitter.com' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);
		$values['google_url'] = array(
		    'name' => __( 'Google URL', 'modern-team-showcase-with-widget' ),
		    'description' => __( 'https://www.google.com' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);
		$values['youtube_url'] = array(
		    'name' => __( 'Youtube URL', 'modern-team-showcase-with-widget' ),
		    'description' => __( 'https://www.youtube.com' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);
		return $values;
	}