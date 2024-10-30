<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
function get_mtsw_team_showcase( $atts, $content = null ) {
	// setup the query
	extract(shortcode_atts(array(
			"limit"		=> -1,
			"category"	=> '',
			"template"	=> 'template-1',
			"grid"		=> 3,
			"popup"		=> 'true',
			'order'		=> 'DESC',
			'orderby'	=> 'date',
		    'show_content'   => 'true',
		    'show_position'     =>'true',
		    'show_social'       => 'true',

	), $atts, 'wp-team'));
	$shortcode_templates 	= mtsw_templates();
	$popup_no 			= mtsw_get_fix();
	$limit 				= !empty($limit) 					? $limit 						: -1;
	$category 			= (!empty($category)) 				? explode(',', $category) 		: '';
	$template 			= ($template && (array_key_exists(trim($template), $shortcode_templates))) ? trim($template) : 'template-1';
	$grid 			    = !empty($grid) 					? $grid 						: 3;
	$order 				= ( strtolower( $order ) == 'asc' ) ? 'ASC' 						: 'DESC';
	$orderby 			= ( !empty( $orderby ) )			? $orderby						: 'date';
	$teampopup 			= ( $popup == 'false' ) 			? 'false' 						: 'true';
	$popup		= ($teampopup == "true") 			? 'mtsw-popup'			: '';
	// Popup Configuration
	$popup_id	= mtsw_get_fix();
	$popup_conf	= compact('teampopup');	
	// Shortcode template file
	$template_file_path 	= MTSW_DIR . '/mtsw-templates/grid/template-1.php';
	$template_file 		= (file_exists($template_file_path)) ? $template_file_path : '';
	// Enqueus required script
	wp_enqueue_script( 'wpoh-magnific-js' );
	wp_enqueue_script( 'mtsw-public-script' );
	ob_start();
	//defualt variable 
	$post_type 		= MTSW_POST_TYPE;
	// argument wp query
	$args = array ( 
	'post_type'      => $post_type,
	'orderby'        => $orderby,
	'order'          => $order,
	'posts_per_page' => $limit,
	);
	if($category != ""){
		$args['tax_query'] = array( array( 'taxonomy' => MTSW_CAT, 'field' => 'term_id', 'terms' => $category) );
    }
    // Wp Query
	$query = new WP_Query($args);	
	global $post;
	$post_count = $query->post_count;
		$count = 0;		 
		$i = 1;
		if ( $query->have_posts() ) { ?> 
		  
			<div class="mtsw-grid-outter-wrap <?php echo $popup; ?> " id="wp-mtsw-slider-<?php echo $popup_no; ?>">
		  		<div class="mtsw-inner-wrap  <?php echo $template; ?>">
					<?php  				  
						while ( $query->have_posts() ) : $query->the_post();            	
			            	$count++;   
			             $team_avtar 		= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                    	 $member_position 	= get_post_meta($post->ID, '_member_position', true); 
	                     $facebook_url 		= get_post_meta($post->ID, '_facebook_url', true);
	                     $likdin_url 		= get_post_meta($post->ID, '_likdin_url', true);
	                     $insta_url 		= get_post_meta($post->ID, '_insta_url', true);
	                     $twitter_url 		= get_post_meta($post->ID, '_twitter_url', true);
	                     $google_url 		= get_post_meta($post->ID, '_google_url', true);
	                     $youtube_url 		= get_post_meta($post->ID, '_youtube_url', true);
			            	// first class and last class
			            	$css_class	="team-grid";
			            	if( $count % $grid == 1 ){
								$css_class .= ' first';
							} elseif ( $count == $grid ) {
								$count = 0;
								$css_class .= ' last';
							}
							// Grid class variables
							if ( is_numeric( $grid ) ) {					
								if($grid == 1){
									$cell = 12;
								}
								else if($grid == 2){
									$cell = 6;
								}
								else if($grid == 3){
									$cell = 4;	
								}
								else if($grid == 4){
									$cell = 3;
								}
								 else{
			                        $cell = $grid;
			                    }
								$class = 'wp-cell-'.$cell.' wpcell';
							}
							// Include shortcode html file
							if( $template_file ) {
								include( $template_file );
							}
							//Popup file  
							if($teampopup == "true") {								
								include(MTSW_DIR. '/mtsw-templates/mtsw-lightbox/lightbox-tempalte-1.php');
							}
							$i++;
			            endwhile; 
					?>
				</div><!-- end .wp_teamshowcase_grid -->						
			</div><!-- end .wp-tsas-wrp -->
		<?php	}        
    wp_reset_postdata(); 
	return ob_get_clean();
}
// grid shortcode action
add_shortcode('mtsw-grid','get_mtsw_team_showcase');