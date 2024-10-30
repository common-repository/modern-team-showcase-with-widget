<?php
/**
 * Plugin All functions file
 *
 * @package Modern Team Showcase with Widget
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/**
 * Function to get constant number
 * 
 * @package Modern Team Showcase with Widget
 * @since 1.2.2
 */
function mtsw_get_fix() {
  static $fix = 0;
  $fix++;
  return $fix;
}
/**
 * Function to get shortcode designs
 * 
 * @package Modern Team Showcase with Widget
 * @since 1.2.5
 */
function mtsw_templates() {
    $design_arr = array(
        'template-1'  	=> __('template-1', 'modern-team-showcase-with-widget'),
        'template-2'  	=> __('template-2', 'modern-team-showcase-with-widget'),
        'template-3'  	=> __('template-3', 'modern-team-showcase-with-widget'),
        'template-4' 	=> __('template-4', 'modern-team-showcase-with-widget'),
        'template-5'    => __('template-5', 'modern-team-showcase-with-widget'),
                     
	);
	return apply_filters('mpsw_slider_designs', $design_arr );
}
/* Function to get shortcode Cell
 * 
 * @package Modern Team Showcase with Widget
 * @since 1.0
 */
function mtsw_grid() {
    $mtsw_grid = array(
        '1'    => __('1', 'modern-team-showcase-with-widget'),
        '2'    => __('2', 'modern-team-showcase-with-widget'),
        '3'    => __('3', 'modern-team-showcase-with-widget'),
        '4'    => __('4', 'modern-team-showcase-with-widget'),
        );  
    return apply_filters('sg_true_false', $mtsw_grid );
}
/* Function to get shortcode true false 
 * 
 * @package Modern Team Showcase with Widget
 * @since 1.0
 */
function mtsw_true_false() {
    $truefalse_arr = array(
        'true'    => __('true', 'modern-team-showcase-with-widget'),
        'false'    => __('false', 'modern-team-showcase-with-widget'),
       
        );  
    return apply_filters('sg_true_false', $truefalse_arr );
}
function mtsw_asc_desc() {
    $disp_title_arr = array(
        __('ASC', 'wp-responsive-testimonials-slider'),
        __('DESC', 'wp-responsive-testimonials-slider')
    );
    return apply_filters('lswr_designs', $disp_title_arr);
}
function mtsw_orderby() {
    $disp_title_arr = array(
        __('ID', 'wp-responsive-testimonials-slider'),
        __('author', 'wp-responsive-testimonials-slider'),
        __('title', 'wp-responsive-testimonials-slider'),
        __('name', 'wp-responsive-testimonials-slider'),
        __('rand', 'wp-responsive-testimonials-slider'),
        __('date', 'wp-responsive-testimonials-slider'),

    );
    return apply_filters('lswr_designs', $disp_title_arr);
}
/**
 * Function to add array after specific key
 * 
 * @package modern-team-showcase-with-widget
 * @since 1.2.5
 */
function mtsw_add_array(&$array, $value, $index, $from_last = false) {    
    if( is_array($array) && is_array($value) ) {
        if( $from_last ) {
            $total_count    = count($array);
            $index          = (!empty($total_count) && ($total_count > $index)) ? ($total_count-$index): $index;
        }        
        $split_arr  = array_splice($array, max(0, $index));
        $array      = array_merge( $array, $value, $split_arr);
    }    
    return $array;
}
// Manage conetnt limit
function mtsw_limit_words($string, $word_limit)
{
    if( !empty($string) ) {
        $content = strip_shortcodes( $string ); // Strip shortcodes
        $content = wp_trim_words( $string, $word_limit, '...' );
		return $content;
    }   
}
/**
 * Escape Tags & Slashes
 *
 * Handles escapping the slashes and tags
 *
 *  @package Recent Posts Widget Designer
 * @since 1.0
 */
function mtsw_esc_attr($data) {
    return esc_attr( $data );
}
/**
 * create Sanitize URL.
 * 
 * @package Modern Team Showcase with Widget
 * @since 1.0
 */
function mtsw_clean_url( $url ) {
    return esc_url_raw( trim($url) );
}
/**
 * Clean variables using sanitize text field. Arrays are cleaned recursively.
 * Non-scalar values are ignored.
 * 
 * @package Modern Team Showcase with Widget
 * @since 1.0
 */
function mtsw_sanitize_clean( $var ) {
    if ( is_array( $var ) ) {
        return array_map( 'mtsw_sanitize_clean', $var );
    } else {
        $data = is_scalar( $var ) ? sanitize_text_field( $var ) : $var;
        return wp_unslash($data);
    }
}