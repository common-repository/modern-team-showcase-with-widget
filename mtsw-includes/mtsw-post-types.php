<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Function for Plugin create custom post type
 * 
 * @package Modern Team Showcase with Widget
 * @since 1.1
 */
function mtsw_post_types() {
	$mtsw_labels =  apply_filters( 'simple_mtsw_labels', array(
		'name'                => 'Teams',
		'singular_name'       => 'Our Team',
		'add_new'             => __('Add New Member', 'modern-team-showcase-with-widget'),
		'add_new_item'        => __('Add New Member', 'modern-team-showcase-with-widget'),
		'edit_item'           => __('Edit Member', 'modern-team-showcase-with-widget'),
		'new_item'            => __('New Member', 'modern-team-showcase-with-widget'),
		'all_items'           => __('All Members', 'modern-team-showcase-with-widget'),
		'view_item'           => __('View Team Member', 'modern-team-showcase-with-widget'),
		'search_items'        => __('Search Team Member', 'modern-team-showcase-with-widget'),
		'not_found'           => __('No Team Member found', 'modern-team-showcase-with-widget'),
		'not_found_in_trash'  => __('No Team Member found in Trash', 'modern-team-showcase-with-widget'),
		'parent_item_colon'   => '',
		'menu_name'           => __('Our Team', 'modern-team-showcase-with-widget'),
		'exclude_from_search' => true
	) );
	$mtsw_args = array(
		'labels' 			=> $mtsw_labels,
		'public' 			=> false,
		'publicly_queryable'=> false,
		'show_ui' 			=> true,
		'show_in_menu' 		=> true,
		'query_var' 		=> false,
		'capability_type' 	=> 'post',
		'has_archive' 		=> false,
		'menu_icon'   		=> 'dashicons-businessman',
		'hierarchical' 		=> false,
		'supports' => array('title','thumbnail','editor')
	);
	register_post_type( MTSW_POST_TYPE, apply_filters( 'mtsw_post_type_args', $mtsw_args ) );
}
add_action('init', 'mtsw_post_types');
function mtsw_taxonomies() {
	$labels = array(
		'name'              => _x( 'Team Groups', 'modern-team-showcase-with-widget' ),
		'singular_name'     => _x( 'Category', 'modern-team-showcase-with-widget' ),
		'search_items'      => __( 'Search Member', 'modern-team-showcase-with-widget' ),
		'all_items'         => __( 'All Member', 'modern-team-showcase-with-widget' ),
		'parent_item'       => __( 'Parent Member', 'modern-team-showcase-with-widget' ),
		'parent_item_colon' => __( 'Parent Team:', 'modern-team-showcase-with-widget' ),
		'edit_item'         => __( 'Edit Member', 'modern-team-showcase-with-widget' ),
		'update_item'       => __( 'Update Member', 'modern-team-showcase-with-widget' ),
		'add_new_item'      => __( 'Add New Member', 'modern-team-showcase-with-widget' ),
		'new_item_name'     => __( 'New Member Name', 'modern-team-showcase-with-widget' ),
		'menu_name'         => __( 'Team Groups', 'modern-team-showcase-with-widget' ),
	);
	$args = array(
		'labels'            => $labels,
		'public'            => false,
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => false,
	);
	register_taxonomy( MTSW_CAT, array( MTSW_POST_TYPE ), $args );
}
/* Register Taxonomy */
add_action( 'init', 'mtsw_taxonomies');