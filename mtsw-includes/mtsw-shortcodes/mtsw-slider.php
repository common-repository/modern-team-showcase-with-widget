<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
function mtsw_team_showcase_slider( $atts, $content = null ){
	// setup the query
	extract(shortcode_atts(array(
		"limit"				=> -1,	
		"category"			=> '',		
		"template"			=> 'template-1',
		"slides_column" 	=> 3,
		"slides_scroll" 	=> 1,
		"bullet"				=> 'true',
		"arrows"			=> 'true',
		"autoplay"			=> 'false',
		"autoplay_interval" => 3000,
		"speed" 			=> 300,
		"popup" 			=> 'true',
		'order'				=> 'DESC',
		'orderby'			=> 'date',
		'show_content'   => 'true',
		'show_position'     =>'true',
		'show_social'       => 'true',
	), $atts, 'wp-team-slider'));
	$shortcode_designs 	= mtsw_templates();
	$popup_no 			= mtsw_get_fix();
	$limit 				= !empty($limit) 					? $limit 						: -1;	
	$category 			= (!empty($category)) 				? explode(',', $category) 		: '';	
	$template 			= ($template && (array_key_exists(trim($template), $shortcode_designs))) ? trim($template) : 'template-1';	
	$teampopup 			= ( $popup == 'false' ) 			? 'false' 						: 'true';
	$dots 				= ( $bullet == 'false' ) 			? 'false' 						: 'true';
	$arrows 			= ( $arrows == 'false' ) 			? 'false' 						: 'true';
	$autoplay 			= ( $autoplay == 'false' ) 			? 'false' 						: 'true';
	$autoplay_interval 	= (!empty($autoplay_interval)) 		? $autoplay_interval 			: 3000;
	$speed 				= (!empty($speed)) 					? $speed 						: 300;	
	$slides_column 		= !empty($slides_column) 			? $slides_column 				: 3;
	$slides_scroll 		= !empty($slides_scroll) 			? $slides_scroll 				: 1;
	$order 				= ( strtolower( $order ) == 'asc' ) ? 'ASC' 						: 'DESC';
	$orderby 			= ( !empty( $orderby ) )			? $orderby						: 'date';
	$popup		        = ($teampopup == "true") 			? 'mtsw-popup'			        : '';
	// Popup Configuration
	$slider_conf = compact('slides_column', 'slides_scroll', 'dots', 'arrows', 'autoplay', 'autoplay_interval', 'speed'  );		
	// Shortcode file
	$design_template_path 	= MTSW_DIR . '/mtsw-templates/slider/template-1.php';
	$design_template 		= (file_exists($design_template_path)) ? $design_template_path : '';	
	// Enqueus required script
	wp_enqueue_script( 'wpoh-slick-js' );
	wp_enqueue_script( 'wpoh-magnific-js' );
	wp_enqueue_script( 'mtsw-public-script' );	
	$popup_html		= '';	
	ob_start();		
	// defualt variables
	$post_type 		= MTSW_POST_TYPE;
	$popup_html		= '';
	// Post argument
	$args = array ( 
		'post_type'      => $post_type, 
		'orderby'        => $orderby, 
		'order'          => $order,
		'posts_per_page' => $limit,  
	); 	
 	// taxonomy query
	if($category != ""){
        $args['tax_query'] = array( array( 'taxonomy' => MTSW_CAT, 'field' => 'term_id', 'terms' => $category) );
    }
    // wp Query
	$query = new WP_Query($args);
		global $post;
		// WP Query
		$post_count = $query->post_count;
		$count 		= 0;
		$i 			= 1;
		// wp query condition
		if ( $query->have_posts() ) { ?>
			<div class="mtsw-slider-outter-wrap">
				<div id="wp-mtsw-slider-<?php echo $popup_no; ?>" class="mtsw-inner-wrap mtsw-slider-slick <?php echo $popup; ?> <?php echo $template; ?>">		  
					<?php
					while ( $query->have_posts() ) : $query->the_post();
						$count++;
						$css_class="team-slider";
						$class = '';
						$i;
						 $team_avtar 		= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                    	 $member_position 	= get_post_meta($post->ID, '_member_position', true); 
	                     $facebook_url 		= get_post_meta($post->ID, '_facebook_url', true);
	                     $likdin_url 		= get_post_meta($post->ID, '_likdin_url', true);
	                     $insta_url 		= get_post_meta($post->ID, '_insta_url', true);
	                     $twitter_url 		= get_post_meta($post->ID, '_twitter_url', true);
	                     $google_url 		= get_post_meta($post->ID, '_google_url', true);
	                     $youtube_url 		= get_post_meta($post->ID, '_youtube_url', true); 
						// Include shortcode html file
						if( $design_template ) {
							include( $design_template );
						}
						// Include Popup html file
						if($teampopup == "true") {
							ob_start();
							include(MTSW_DIR. '/mtsw-templates/mtsw-lightbox/lightbox-tempalte-1.php');
							$popup_html .= ob_get_clean();
						}					
					$i++;
					endwhile; 
					 ?>
				</div>
				<?php echo $popup_html; // Print Popup HTML ?>
				<div class="slider-conf-data" data-conf="<?php echo htmlspecialchars(json_encode($slider_conf)); ?>"></div>	
			</div>	
	    <?php  
		wp_reset_postdata(); 
	    return ob_get_clean();
	}
}
// slider shortcode action
add_shortcode( 'mtsw-slider', 'mtsw_team_showcase_slider' );