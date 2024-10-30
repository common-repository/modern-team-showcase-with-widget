<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package Modern Team Showcase with Widget
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
class Mtsw_Script {	
	function __construct() {		
		// Action to add style at front side
		add_action( 'wp_enqueue_scripts', array($this, 'mtsw_front_style') );		
		// Action to add script at front side
		add_action( 'wp_enqueue_scripts', array($this, 'mtsw_front_script') );	
		add_action( 'admin_enqueue_scripts', array($this, 'wp_mtsw_admin_script'));		
	}
	/**
	 * Function to add style at front side
	 * 
	 * @package Modern Team Showcase with Widget
	 * @since 1.0.0
	 */
	function mtsw_front_style() { 		
		// Registring and enqueing slick slider css
		if( !wp_style_is( 'wpos-slick-style', 'registered' ) ) {
			wp_register_style( 'wpos-slick-style', MTSW_URL.'mtsw-assets/css/slick.css', array(), MTSW_VERSION );
			wp_enqueue_style( 'wpos-slick-style' );
		}
		 // Registring and enqueing magnific css
		if( !wp_style_is( 'wpoh-magnific-css', 'registered' ) ) {
			wp_register_style( 'wpoh-magnific-css', MTSW_URL.'mtsw-assets/css/magnific-popup.css', array(), MTSW_VERSION );
			wp_enqueue_style( 'wpoh-magnific-css');
		}  		
		// Registring and enqueing public css
		wp_register_style( 'mtsw-public-style', MTSW_URL.'mtsw-assets/css/mtsw-costum.css', array(), MTSW_VERSION );
		wp_enqueue_style( 'mtsw-public-style' );
		// Registring and enqueing public css
	   wp_register_style( 'wpoh-font-awesome', MTSW_URL.'mtsw-assets/css/font-awesome.min.css', array(), MTSW_VERSION );
		wp_enqueue_style( 'wpoh-font-awesome' );		
	}	
	/**
	 * Function to add script at front side
	 * 
	 * @package Modern Team Showcase with Widget
	 * @since 1.0.0
	 */
	function mtsw_front_script() {		
		// Registring slick slider script
		if( !wp_script_is( 'wpoh-slick-js', 'registered' ) ) {
			wp_register_script( 'wpoh-slick-js', MTSW_URL.'mtsw-assets/js/slick.min.js', array('jquery'), MTSW_VERSION, true );
		}
		if( !wp_script_is( 'wpoh-magnific-js', 'registered' ) ) {   
	    wp_register_script( 'wpoh-magnific-js', MTSW_URL.'mtsw-assets/js/magnific-popup.min.js', array('jquery'), MTSW_VERSION, true );	   
	    }		
		// Registring and enqueing public script
		wp_register_script( 'mtsw-public-script', MTSW_URL.'mtsw-assets/js/mtsw-public.js', array('jquery'), MTSW_VERSION, true );
		wp_localize_script( 'mtsw-public-script', 'Wppsac', array(
																	'is_mobile' => (wp_is_mobile()) ? 1 : 0,
																	'is_rtl' 	=> (is_rtl()) 		? 1 : 0
																	));
	}
	function wp_mtsw_admin_script() { 
        // Registring and enqueing admin css
        wp_register_script( 'mtsw-admin-script', MTSW_URL.'mtsw-assets/js/mtsw-admin.js', array('jquery'), MTSW_VERSION, true);
        wp_enqueue_script( 'mtsw-admin-script' );
        wp_register_style( 'admin-css', MTSW_URL.'mtsw-assets/css/mtsw-admin.css', array(), MTSW_VERSION );
        		wp_enqueue_style( 'admin-css' ); 		
}
}
$mtsw_script = new Mtsw_Script();