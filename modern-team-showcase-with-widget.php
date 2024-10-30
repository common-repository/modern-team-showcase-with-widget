<?php
/**
 * Plugin Name: Modern Team Showcase with Widget
 * Plugin URI: https://wponlinehelp.com/plugins/
 * Text Domain: modern-team-showcase-with-widget
 * Domain Path: /languages/
 * Description: Simple to use Modern Team Showcase with Widget plugin works with Slider, Grid also with widget using shortcode. 
 * Author: parechpachani007
 * Version: 1.0
 * Author URI: https://wponlinehelp.com/
 *
 * @package WordPress
 * @author parechpachani
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
 * Basic plugin definitions
 * 
 * @package Modern Team Showcase with Widget
 * @since 1.0
 */
if( !defined( 'MTSW_VERSION' ) ) {
	define( 'MTSW_VERSION', '1.0' ); // Version of plugin
}
if( !defined( 'MTSW_DIR' ) ) {
	define( 'MTSW_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( !defined( 'MTSW_URL' ) ) {
	define( 'MTSW_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}
if( !defined( 'MTSW_POST_TYPE' ) ) {
	define( 'MTSW_POST_TYPE', 'our-teams' ); // Plugin post type 'post'
}
if( !defined( 'MTSW_CAT' ) ) {
	define( 'MTSW_CAT', 'our-teams-cat' ); // Plugin category
}
add_action('plugins_loaded', 'mtsw_load_textdomain');
function mtsw_load_textdomain() {
	load_plugin_textdomain( 'modern-team-showcase-with-widget', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
} 

 /* Function For Manage Post Category Shortcode Columns
 * 
 * @package Modern Team Showcase with Widget
 * @since 1.1
 */	
add_filter("manage_our-teams-cat_custom_column", 'mtsw_teams_columns', 10, 3);
add_filter("manage_edit-our-teams-cat_columns", 'mtsw_category_manage_columns'); 
function mtsw_category_manage_columns($theme_columns) {
    $new_columns = array(
            'cb' => '<input type="checkbox" />',
            'name' => __('Name'),
            'post_shortcode' => __( 'Category Shortcode', 'modern-team-showcase-with-widget' ),
            'slug' => __('Slug'),
            'posts' => __('Posts')
			);
    return $new_columns;
}
function mtsw_teams_columns($out, $column_name, $theme_id) {
    $theme = get_term($theme_id, 'category');
    switch ($column_name) {      
        case 'title':
            echo get_the_title();
        break;
        case 'post_shortcode':
		echo '[mtsw-slider  cat="' . $theme_id. '"]<br />';
		echo '[mtsw-grid  cat="' . $theme_id. '"]';		
        break;
        default:
            break;
    }
    return $out; 
}	
// Function file
require_once( MTSW_DIR . '/mtsw-includes/mtsw-function.php' );

// Function file
require_once( MTSW_DIR . '/mtsw-includes/mtsw-post-types.php' );
// Script Fils
require_once( MTSW_DIR . '/mtsw-includes/mtsw-script.php' );
// Shortcodes
require_once( MTSW_DIR . '/mtsw-includes/mtsw-shortcodes/mtsw-slider.php' );
require_once( MTSW_DIR . '/mtsw-includes/mtsw-shortcodes/mtsw-grid.php' );
// Widgets class
require_once( MTSW_DIR . '/mtsw-widget/mtsw-widget.php' );
// How it work file, Load admin files
if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
	require_once( MTSW_DIR . '/mtsw-includes/mtsw-admin/mtsw-how-it-work.php' );
	require_once( MTSW_DIR . '/mtsw-includes/mtsw-admin/mtsw-team-meta-fields.php' );

}