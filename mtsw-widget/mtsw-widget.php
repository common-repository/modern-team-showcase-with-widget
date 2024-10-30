<?php
/**
 * Teamshowcase Widget Class
 *
 * manage teamshowcase widget functionality of plugin
 *
 * @package Modern Team showcase with widget
 * @since 1.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
function mtsw_teamshowcase_widget() {
    register_widget( 'mtsw_teamshowcases_widget' );
}
// Action to register widget
add_action( 'widgets_init', 'mtsw_teamshowcase_widget' );
class mtsw_teamshowcases_widget extends WP_Widget {    
    var $defaults;
    /**
     * Sets up a new widget instance.
     *
     * @package Modern Team showcase with widget
     * @since 1.0
     */
    function __construct() {
        $widget_section = array( 'classname' => 'widget_mtsw_teamshowcase_slider', 'description' => __( 'Display Team Member on your site.', 'modern-team-showcase-with-widget' ) );
        parent::__construct( 'mtsw_teamshowcase_slider', __( 'WP team showcase Slider', 'modern-team-showcase-with-widget' ), $widget_section );
        $this->defaults = array(
            'limit'             => 20,
            'category'          => '',
            'title'             => __( 'Team showcase Slider', 'modern-team-showcase-with-widget' ),
            'slides_column'     => 1,
            'slides_scroll'     => 1,             
            'dots'              => "true",
            'arrows'            => "true",
            'autoplay'          => "true",
            'autoplayInterval'  => 3000,
            'speed'             => 300,
            'order'             => 'DESC',
            'orderby'           => 'date',
            'popup'              => 'true',
            'show_content'        => 'true',
            'show_position'        => 'true',
            'show_social'       => 'true',
        );
    }
    /**
     * Handles updating settings for the current widget instance.
     *
     * @package Modern Team showcase with widget
     * @since 1.0
     */
    function update ( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title']              = sanitize_text_field( $new_instance['title'] );
        $instance['limit']              = intval( $new_instance['limit'] );       
        $instance['slides_column']      = intval( $new_instance['slides_column'] );
        $instance['slides_scroll']      = intval( $new_instance['slides_scroll'] );
        $instance['category']           = intval( $new_instance['category'] );
        $instance['orderby']            = $new_instance['orderby'];
        $instance['order']              = $new_instance['order'];       
        $instance['template']             = $new_instance['template'];
        $instance['dots']               = $new_instance['dots'];
        $instance['arrows']             = $new_instance['arrows'];
        $instance['popup']               = $new_instance['popup'];
        $instance['autoplay']           = $new_instance['autoplay'];
        $instance['autoplayInterval']   = intval( $new_instance['autoplayInterval'] );
        $instance['speed']              = intval( $new_instance['speed'] );
        $instance['show_position']         = !empty($new_instance['show_position']) ? 1 : 0;
        $instance['show_social']        = !empty($new_instance['show_social']) ? 1 : 0;        
        return $instance;
    }
    /**
     * Outputs the settings form for the widget.
     *
     * @package Modern Team showcase with widget
     * @since 1.0
     */
    function form( $instance ) {
        $instance       = wp_parse_args( (array) $instance, $this->defaults );
        $mtsw_templates   = mtsw_templates();
    ?>
        <!-- Widget Title: Text Input -->
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'modern-team-showcase-with-widget' ); ?>:</label>
            <input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>"  value="<?php echo esc_attr($instance['title']); ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" />
        </p>
        <!-- Widget Order By: Select Input -->
        <p>
            <label for="<?php echo $this->get_field_id( 'template' ); ?>"><?php _e( 'Design Template', 'modern-team-showcase-with-widget' ); ?>:</label>
            <select name="<?php echo $this->get_field_name( 'template' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'template' ); ?>">
                <?php if( !empty($mtsw_templates) ) {
                    foreach ( $mtsw_templates as $k => $v ) { ?>
                        <option value="<?php echo $k; ?>"<?php selected( $instance['template'], $k ); ?>><?php echo $v; ?></option>
                <?php } } ?>
            </select><br/>
            <em><?php _e('Select Design template.', 'modern-team-showcase-with-widget'); ?></em>
        </p>
        <!-- Widget Limit: Text Input -->
        <p>
            <label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php _e( 'Limit', 'modern-team-showcase-with-widget' ); ?>:</label>
            <input type="number" name="<?php echo $this->get_field_name( 'limit' ); ?>"  value="<?php echo $instance['limit']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'limit' ); ?>" min="-1" />
        </p>
        <!-- Widget Order: Design Style -->
         <p>
            <label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php _e( 'Order By:', 'modern-team-showcase-with-widget' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'orderby' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'orderby' ); ?>">
                <option value="date" <?php selected( $instance['orderby'], 'date' ); ?>><?php _e( 'Date', 'modern-team-showcase-with-widget' ); ?></option>
                <option value="modified" <?php selected( $instance['orderby'], 'modified' ); ?>><?php _e( 'Modified Date', 'modern-team-showcase-with-widget' ); ?></option>
                <option value="ID" <?php selected( $instance['orderby'], 'ID' ); ?>><?php _e( 'ID', 'modern-team-showcase-with-widget' ); ?></option>
                <option value="author" <?php selected( $instance['orderby'], 'author' ); ?>><?php _e( 'Author', 'modern-team-showcase-with-widget' ); ?></option>
                <option value="title" <?php selected( $instance['orderby'], 'title' ); ?>><?php _e( 'Title', 'modern-team-showcase-with-widget' ); ?></option>
                <option value="name" <?php selected( $instance['orderby'], 'name' ); ?>><?php _e( 'Testimonial URL Slug', 'modern-team-showcase-with-widget' ); ?></option>
                <option value="rand" <?php selected( $instance['orderby'], 'rand' ); ?>><?php _e( 'Random', 'modern-team-showcase-with-widget' ); ?></option>
                <option value="menu_order" <?php selected( $instance['orderby'], 'menu_order' ); ?>><?php _e( 'Menu Order', 'modern-team-showcase-with-widget' ); ?></option>
            </select>
        </p>
        <!-- Widget Order: Select Input -->
        <p>
            <label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php _e( 'Order', 'modern-team-showcase-with-widget' ); ?>:</label>
            <select name="<?php echo $this->get_field_name( 'order' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'order' ); ?>">
                <option value="ASC" <?php selected( $instance['order'], 'asc' ); ?>><?php _e( 'Ascending', 'modern-team-showcase-with-widget' ); ?></option>
                <option value="DESC" <?php selected( $instance['order'], 'desc' ); ?>><?php _e( 'Descending', 'modern-team-showcase-with-widget' ); ?></option>
            </select>
        </p>
        <!-- Widget Category: Select Input -->
        <p>
            <label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Category', 'modern-team-showcase-with-widget' ); ?>:</label>
            <?php
                $dropdown_args = array(
                    'hide_empty'        => 0, 
                    'taxonomy'          => MTSW_CAT,
                    'class'             => 'widefat',
                    'show_option_all'   => __( 'All', 'modern-team-showcase-with-widget' ),
                    'id'                => $this->get_field_id( 'category' ),
                    'name'              => $this->get_field_name( 'category' ),
                    'selected'          => $instance['category']
                );
                wp_dropdown_categories( $dropdown_args );
            ?>
        </p>
        <!-- Widget ID:  col to scroll -->
        <p>
            <label for="<?php echo $this->get_field_id( 'slides_scroll' ); ?>"><?php _e( 'Slides to Scroll', 'modern-team-showcase-with-widget' ); ?>:</label>
            <input type="number" name="<?php echo $this->get_field_name( 'slides_scroll' ); ?>"  value="<?php echo $instance['slides_scroll']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'slides_scroll' ); ?>" min="1" />
        </p>
        <!-- Widget Select Dots -->
        <p>
            <label for="<?php echo $this->get_field_id( 'dots' ); ?>"><?php _e( 'Dots', 'modern-team-showcase-with-widget' ); ?>:</label>
            <select name="<?php echo $this->get_field_name( 'dots' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'dots' ); ?>">
                <option value="true" <?php selected( $instance['dots'], 'true' ); ?>><?php _e( 'True', 'modern-team-showcase-with-widget' ); ?></option>
                <option value="false" <?php selected( $instance['dots'], 'false' ); ?>><?php _e( 'False', 'modern-team-showcase-with-widget' ); ?></option>
            </select>
        </p>
        <!-- Widget Order: Select Arrows -->
        <p>
            <label for="<?php echo $this->get_field_id( 'arrows' ); ?>"><?php _e( 'Arrows', 'modern-team-showcase-with-widget' ); ?>:</label>
            <select name="<?php echo $this->get_field_name( 'arrows' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'arrows' ); ?>">
                <option value="true" <?php selected( $instance['arrows'], 'true' ); ?>><?php _e( 'True', 'modern-team-showcase-with-widget' ); ?></option>
                <option value="false" <?php selected( $instance['arrows'], 'false' ); ?>><?php _e( 'False', 'modern-team-showcase-with-widget' ); ?></option>
            </select>
        </p>
        <!-- Widget Popup -->
        <p>
            <label for="<?php echo $this->get_field_id( 'popup' ); ?>"><?php _e( 'Popup', 'modern-team-showcase-with-widget' ); ?>:</label>
            <select name="<?php echo $this->get_field_name( 'popup' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'popup' ); ?>">
                <option value="true" <?php selected( $instance['popup'], 'true' ); ?>><?php _e( 'True', 'modern-team-showcase-with-widget' ); ?></option>
                <option value="false" <?php selected( $instance['popup'], 'false' ); ?>><?php _e( 'False', 'modern-team-showcase-with-widget' ); ?></option>
            </select>
        </p>
       
        <!-- Widget Autoplay -->
        <p>
            <label for="<?php echo $this->get_field_id( 'autoplay' ); ?>"><?php _e( 'Auto Play', 'modern-team-showcase-with-widget' ); ?>:</label>
            <select name="<?php echo $this->get_field_name( 'autoplay' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'autoplay' ); ?>">
                <option value="true" <?php selected( $instance['autoplay'], 'true' ); ?>><?php _e( 'True', 'modern-team-showcase-with-widget' ); ?></option>
                <option value="false" <?php selected( $instance['autoplay'], 'false' ); ?>><?php _e( 'False', 'modern-team-showcase-with-widget' ); ?></option>
            </select>
        </p>
        <!-- Widget   AutoplayInterval -->
        <p>
            <label for="<?php echo $this->get_field_id( 'autoplayInterval' ); ?>"><?php _e( 'Autoplay Interval', 'modern-team-showcase-with-widget' ); ?>:</label>
            <input type="number" name="<?php echo $this->get_field_name( 'autoplayInterval' ); ?>"  value="<?php echo $instance['autoplayInterval']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'autoplayInterval' ); ?>" min="0" />
        </p>
        <!-- Widget Speed -->
        <p>
            <label for="<?php echo $this->get_field_id( 'speed' ); ?>"><?php _e( 'Speed', 'modern-team-showcase-with-widget' ); ?>:</label>
            <input type="number" name="<?php echo $this->get_field_name( 'speed' ); ?>"  value="<?php echo $instance['speed']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'speed' ); ?>" min="0" />
        </p>
        <!-- Widget Show title Checkbox Input -->
        <p>
            <input id="<?php echo $this->get_field_id( 'show_position' ); ?>" name="<?php echo $this->get_field_name( 'show_position' ); ?>" type="checkbox" value="1" <?php checked($instance['show_position'], 1); ?> />
            <label for="<?php echo $this->get_field_id( 'show_position' ); ?>"><?php _e( 'Display Position', 'modern-team-showcase-with-widget' ); ?></label>
        </p>
        <!-- Widget Rating Checkbox Input -->
        <p>
            <input id="<?php echo $this->get_field_id( 'show_social' ); ?>" name="<?php echo $this->get_field_name( 'show_social' ); ?>" type="checkbox" value="1" <?php checked($instance['show_social'], 1); ?> />
            <label for="<?php echo $this->get_field_id( 'show_social' ); ?>"><?php _e( 'Display Social', 'modern-team-showcase-with-widget' ); ?></label>
        </p>
    <?php
        } // End form()    
    /**
    * Outputs the content for the current widget instance.
    *
    * @package Modern Team showcase with widget
    * @since 1.0
    */
    function widget( $args, $instance ) {
        $design_template  = mtsw_templates();
        $instance = wp_parse_args( (array) $instance, $this->defaults );
        extract( $args, EXTR_SKIP );
        $title              = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
        $limit              = !empty($instance['limit'])                    ? $instance['limit']                    : '5';
        $cat                = (!empty($instance['category']))               ? explode(',',$instance['category'])    : '';
        $template             = ($instance['template'] && (array_key_exists(trim($instance['template']), $design_template))) ? trim($instance['template'])    : 'template-1';        
        $slides_column      = !empty($instance['slides_column'])            ? $instance['slides_column']            : '1';
        $slides_scroll      = !empty($instance['slides_scroll'])            ? $instance['slides_scroll']            : '1';
        $dots               = ($instance['dots'] == 'true' )                ? 'true'                                : 'false';
        $arrows             = ($instance['arrows'] == 'true' )              ? 'true'                                : 'false';
        $autoplay           = ($instance['autoplay'] == 'true' )            ? 'true'                                : 'false';
        $autoplay_interval  = !empty($instance['autoplayInterval'])         ? $instance['autoplayInterval']         : '2000';
        $speed              = !empty($instance['speed'])                    ? $instance['speed']                    : '300';
        $teampopup          = ( $popup == 'false' )             ? 'false'                       : 'true';
        $popup              = ($teampopup == "true")            ? 'mtsw-popup'                  : '';
        $order              = (strtolower($instance['order']) == 'asc' )    ? 'ASC'                                 : 'DESC'; 
        $orderby            = !empty($instance['orderby'])                  ? $instance['orderby']                  : 'post_date';        
        $show_position         = ($instance['show_position'] == 1 )               ? 'true'                                : 'false';
        $show_social        = ($instance['show_social'] == 1 )              ? 'true'                                : 'false';       
        // Slider Configuration
        $slider_conf = compact('slides_column', 'slides_scroll', 'dots', 'arrows', 'autoplay', 'autoplay_interval', 'speed');
        // Shortcode File
        $design_template_path   = MTSW_DIR . '/mtsw-templates/slider/template-1.php';
        $design_template        = (file_exists($design_template_path)) ? $design_template_path : ''; 
       // Enqueus required script
    wp_enqueue_script( 'wpoh-slick-js' );
    wp_enqueue_script( 'wpoh-magnific-js' );
    wp_enqueue_script( 'mtsw-public-script' );
    $popup_html     = '';
    ob_start(); 
        // Taking some globals
        global $post;
        // Taking some variables
        $class  = '';
        $popup_no = mtsw_get_fix();
        // Query Parameter
        $args = array (
            'post_type'             => MTSW_POST_TYPE,
            'post_status'           => array( 'publish' ),
            'posts_per_page'        => $limit,
            'order'                 => $order,
            'orderby'               => $orderby,
            'ignore_sticky_posts'   => true,
        );
        // Category Parameter
        if($cat != "") {
            $args['tax_query'] = array(
                                    array(
                                        'taxonomy'  => MTSW_CAT,
                                        'field'     => 'term_id',
                                        'terms'     => $cat
                                    ));
        }
        // WP Query
        $query = new WP_Query($args);
        echo $before_widget;
        if ( $title ) {
            echo $before_title . $title . $after_title;
        }
        // If post is there
        if( $query->have_posts() ) {
    ?>
       <div class="mtsw-slider-outter-wrap">
                <div id="wp-mtsw-slider-<?php echo $popup_no; ?>" class="mtsw-inner-wrap mtsw-slider-slick <?php echo $popup; ?> <?php echo $template; ?>">                     
                    <?php while ( $query->have_posts() ) : $query->the_post();                        
                        $count++;
                        $css_class="team-slider";
                        $class = '';
                        $i;
                         $team_avtar        = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                         $member_position   = get_post_meta($post->ID, '_member_position', true); 
                         $facebook_url      = get_post_meta($post->ID, '_facebook_url', true);
                         $likdin_url        = get_post_meta($post->ID, '_likdin_url', true);
                         $insta_url         = get_post_meta($post->ID, '_insta_url', true);
                         $twitter_url       = get_post_meta($post->ID, '_twitter_url', true);
                         $google_url        = get_post_meta($post->ID, '_google_url', true);
                         $youtube_url       = get_post_meta($post->ID, '_youtube_url', true); 
                        // Include shortcode html file
                        if( $design_template ) {
                            include( $design_template_path );
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
        } // End of have_post()
        wp_reset_query(); // Reset WP Query
        echo $after_widget;
    }
}