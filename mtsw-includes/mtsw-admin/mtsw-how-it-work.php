<?php
/**
 * Designs and Plugins Feed
 *
 * @package modern-team-showcase-with-widget
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
// Action to add menu
add_action('admin_menu', 'mtsw_register_design_page');
/**
 * Register plugin design page in admin menu
 * 
 * @package modern-team-showcase-with-widget
 * @since 1.0.0
 */
function mtsw_register_design_page() {
	add_submenu_page( 'edit.php?post_type='.MTSW_POST_TYPE, __('How it works, our plugins and offers', 'modern-team-showcase-with-widget'), __('Help and shortcode Generator', 'modern-team-showcase-with-widget'), 'manage_options', 'mtsw-designs', 'mtsw_designs_page' );
}
/**
 * Function to display plugin design HTML
 * 
 * @package modern-team-showcase-with-widget
 * @since 1.0.0
 */
function mtsw_designs_page() {
	$wpoh_admin_tabs = mtsw_help_tabs();
	$active_tab 	= isset($_GET['tab']) ? mtsw_sanitize_clean($_GET['tab']) : 'help-for-you';
?>		
	<div class="wrap rtsw-wrap">
		<h2 class="nav-tab-wrapper">
			<?php
			foreach ($wpoh_admin_tabs as $tab_key => $tab_val) {
				$tab_name	= $tab_val['name'];
				$active_cls = ($tab_key == $active_tab) ? 'nav-tab-active' : '';
				$tab_link 	= add_query_arg( array( 'post_type' => MTSW_POST_TYPE, 'page' => 'mtsw-designs', 'tab' => $tab_key), admin_url('edit.php') );
			?>
			<a class="nav-tab <?php echo $active_cls; ?>" href="<?php echo $tab_link; ?>"><?php echo $tab_name; ?></a>
			<?php } ?>
		</h2>		
		<div class="rtsw-tab-cnt-wrp">
		<?php
			if( isset($active_tab) && $active_tab == 'help-for-you' ) {
				mtsw_work_page();
			}
			if( isset($active_tab) && $active_tab == 'grid-shortcode' ) {
				mtsw_grid_shortcode();
			}
			if( isset($active_tab) && $active_tab == 'slider-shortcode' ) {
				mtsw_slider_shortcode();
			}
			if( isset($active_tab) && $active_tab == 'hire-wpexpert' ) {
				echo  mtsw_get_plugin_design('hire-wpexpert');
			}			
		?>
		</div><!-- end .rtsw-tab-cnt-wrp -->
	</div><!-- end .rtsw-wrap -->
<?php
}
/**
 * Function to get plugin feed tabs
 *
 * @package modern-team-showcase-with-widget
 * @since 1.0.0
 */
function mtsw_help_tabs() {
	$wpoh_admin_tabs = array(
						'help-for-you' 	=> array('name' => __('Help For You', 'modern-team-showcase-with-widget'),),
						'grid-shortcode' 	=> array('name' => __('Grid shortcode Generator', 'modern-team-showcase-with-widget'),),
		                'slider-shortcode' => array('name' => __('Slider shortcode Generator', 'modern-team-showcase-with-widget'),),
		                'hire-wpexpert' 	=> array(
													'name'				=> __('For Quick Help ', 'modern-team-showcase-with-widget'),
													'url'				=> 'https://wponlinehelp.com/wordpress-help/help-offers.php',
													'offer_key'		=> 'wpoh_offers_feed',
													'offer_time'	=> 98400,
												)
					);
	return $wpoh_admin_tabs;
}
/**
 * Function to get 'How It Works' HTML
 *
 * @package modern-team-showcase-with-widget
 * @since 1.0.0
 */
function mtsw_work_page() { ?>	
	<style type="text/css">
	  	.rtsw-shortcode-preview{background-color: #e7e7e7; font-weight: bold; padding: 2px 5px; display: inline-block; margin:0 0 2px 0;}
	</style>
	<div class="post-box-container">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-1">			
				<!--Help for you HTML -->
				<div id="post-body-content">
					<div class="metabox-holder">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox">
								
								<h3 class="hndle">
									<span><?php _e( 'Help for you - Display and shortcode', 'modern-team-showcase-with-widget' ); ?></span>
								</h3>								
								<div class="inside">
									<table class="form-table">
										<tbody>
											<tr>
												<th>
													<label><?php _e('Basic Step', 'modern-team-showcase-with-widget'); ?>:</label>
												</th>
												<td>
													<ul>
													<li><?php _e('Step-1. Go to "Our Team --> Add New".', 'modern-team-showcase-with-widget'); ?></li>
													<li><?php _e('Step-2. Add  Team title, description and images.', 'modern-team-showcase-with-widget'); ?></li>
														<li><?php _e('Step-3. Add Team Details like  Name, Team-position and Social details...', 'modern-team-showcase-with-widget'); ?></li>
														<li><?php _e('Step-4. Once added, press Publish button', 'modern-team-showcase-with-widget'); ?></li>
													</ul>
												</td>
											</tr>
											<tr>
												<th>
													<label><?php _e('How to used Shortcode', 'modern-team-showcase-with-widget'); ?>:</label>
												</th>
												<td>
													<ul>
														<li><?php _e('Step-1. Create a page like name with Our Team.', 'modern-team-showcase-with-widget'); ?></li>
														<li><?php _e('Step-2. Set shortcode as per your need and put in page text section.', 'modern-team-showcase-with-widget'); ?></li>
													</ul>
												</td>
											</tr>
											<tr>
												<th>
													<label><?php _e('All Shortcodes', 'modern-team-showcase-with-widget'); ?>:</label>
												</th>
												<td>
													<span class="rtsw-shortcode-preview">[mtsw-grid]</span> – <?php _e('Display in Grid with 5+ designs template.', 'modern-team-showcase-with-widget'); ?> <br />
													<span class="rtsw-shortcode-preview">[mtsw-slider]</span> – <?php _e('Display in Slider with 5+ designs template.', 'modern-team-showcase-with-widget'); ?> <br />
												</td>
											</tr>
											<tr>
												<th>
													<label><?php _e('Widget', 'modern-team-showcase-with-widget'); ?>:</label>
												</th>
												<td>
													<ul>
														<li><?php _e('Step-1. Go to Appearance --> Widget.', 'modern-team-showcase-with-widget'); ?></li>
														<li><?php _e('Step-2. Use WP team showcase Slider to display team member in widget area with slider.', 'modern-team-showcase-with-widget'); ?></li>
													</ul>												
												</td>
											</tr>
											<tr>
												<th>
													<label><?php _e('Need Any Help?', 'modern-team-showcase-with-widget'); ?></label>
												</th>
												<td>
																				
													<a  href="mailto:help@wponlinehelp.com">help@wponlinehelp.com</a><br/> <br/>
													<a class="button button-primary" href="http://demo.wponlinehelp.com/modern-team-showcase-with-widget-and-widget/" target="_blank"><?php _e('Live Demo', 'modern-team-showcase-with-widget'); ?></a>
													<a class="button button-primary" href="http://docs.wponlinehelp.com/docs-project/modern-team-showcase-with-widget-and-widget/" target="_blank"><?php _e('Documentation', 'modern-team-showcase-with-widget'); ?></a>
												</td>
											</tr>
										</tbody>
									</table>
								</div><!-- .inside -->
							</div><!-- #general -->
						</div><!-- .meta-box-sortables ui-sortable -->
					</div><!-- .metabox-holder -->
				</div><!-- #post-body-content -->
			</div><!-- #post-body -->
		</div><!-- #poststuff -->
	</div><!-- #post-box-container -->
<?php }
/**
 * 'plugin Grid Short code
 *
 * @package Modern Team Showcase with Widget
 * @since 1.0
 */
function mtsw_grid_shortcode() { ?>	
	<style type="text/css">
		.shortcode-bg{background-color: #f0f0f0;padding: 10px 5px;display: inline-block;margin: 0 0 5px 0;font-size: 16px;border-radius: 5px;	
		}
		.mtsw_shortcode_generator label{font-weight: 700; width: 100%; float: left;}
		.mtsw_shortcode_generator select{width: 100%;}
	</style>
	<div id="post-body-content">
		<div class="metabox-holder">
			<div class="meta-box-sortables ui-sortable">
				<div class="postbox">
					<h3 style="font-size: 18px;">
						<?php _e('Create Our Team Grid Shortcode :-', 'modern-team-showcase-with-widget') ?>
					</h3>
					<div class="inside">
						<table cellpadding="10" cellspacing="10">
							<tbody><tr><td valign="top">
								<div class="postbox" style="width:300px; height: 450px; overflow-x: scroll;">
								<form id="shortcode_generator" style="padding:20px;" class="mtsw_shortcode_generator">
										<p><label for="mtsw_grid_template"><?php _e('1) Select Design Template:', 'modern-team-showcase-with-widget'); ?></label>
										  	<?php $sg_tempalte = mtsw_templates() ?>
										  	<select id="mtsw_grid_template" name="mtsw_grid_template"
										  	onchange="sg_mtsw_grid()">
										  	<option value="default-template">Default Template</option>
										  	<?php  foreach ($sg_tempalte as $k): ?>
										  		<option value="<?php _e($k, 'modern-team-showcase-with-widget') ?>">
										  			<?php _e($k, 'modern-team-showcase-with-widget') ?>
										  		</option>
										  	<?php endforeach; ?>
										  </select>
										</p>
										<p><label for="mtsw_limit"><?php _e('2) Limit:', 'modern-team-showcase-with-widget'); ?></label>
						                    <input id="mtsw_limit" name="mtsw_limit" type="text" value="-1"
										      onchange="sg_mtsw_grid()">
										     <span class="howto"> <?php _e('( For all "-1" Enter any Numeric No. )', 'modern-team-showcase-with-widget'); ?></span>
										  </p>
										   <p><label for="mtsw_grid"><?php _e('3) Select Grid:', 'modern-team-showcase-with-widget'); ?></label>
								 	      <select id="mtsw_grid" name="mtsw_grids" onchange="sg_mtsw_grid()">
								 	      	<option value="default-value">Default Template</option>
										    <option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											</select>
								   </p>
								    	<p>
												<label for="mtsw_grid_order"><?php _e('4) Select Order:', 'modern-team-showcase-with-widget'); ?> 
												</label>
												<?php $mtsw_grid_order = mtsw_asc_desc() ?>
												<select id="mtsw_grid_order" name="mtsw_grid_order" onchange="sg_mtsw_grid()">
													<option value="default-value">No Need</option>
													<?php foreach ($mtsw_grid_order as $k): ?>
														<option value="<?php _e($k, 'modern-team-showcase-with-widget') ?>">
															<?php _e($k, 'modern-team-showcase-with-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
												<span class="howto">( Set  Ascending Order OR  Descending Order. )</span>
											</p>
							         <p>
												<label for="mtsw_grid_orderby"><?php _e('5) Select Order By:', 'modern-team-showcase-with-widget'); ?> 
												</label>
												<?php $mtsw_grid_orderby = mtsw_orderby() ?>
												<select id="mtsw_grid_orderby" name="mtsw_grid_orderby" onchange="sg_mtsw_grid()">
													<option value="default-value">No Need</option>
													<?php foreach ($mtsw_grid_orderby as $k): ?>
														<option value="<?php _e($k, 'modern-team-showcase-with-widget') ?>">
															<?php _e($k, 'modern-team-showcase-with-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
											</p>									
										<p>
											<label for="mtsw_cat">
												<?php _e('6) Select Category:', 'modern-team-showcase-with-widget') ?></label>
												<?php
												$args = array("post_type"=> "post", "post_status"=> "publish");
												$terms = get_terms(['taxonomy' => MTSW_CAT,$args]);   	      						
												 ?>
												<select id="grid_cat" name="mtsw_cat" onchange="sg_mtsw_grid()">
												   <option value="nocat">Default</option>
													<?php if ($terms!='') {
													foreach ($terms as $key => $value) { ?>
														<option value="<?php echo $value->term_id; ?>">
															<?php echo $value->name;  ?>
														</option>													
													<?php  } } ?>
												</select>
												<span class="howto"> ( By default All Testimonial. )</span>												
											</p>
                                        <p>							  
												<label for="mtsw_popup_grid"><?php _e('7) popup:', 'modern-team-showcase-with-widget'); ?> 
												</label>
												<?php $mtsw_popup_grid= mtsw_true_false() ?>
												<select id="mtsw_popup_grid" name="mtsw_popup_grid" onchange="sg_mtsw_grid()">
													<option value="default-value">No Need</option>
													<?php foreach ($mtsw_popup_grid as $k): ?>
														<option value="<?php _e($k, 'modern-team-showcase-with-widget') ?>">
															<?php _e($k, 'modern-team-showcase-with-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
									<p>							  
												<label for="mtsw_grid_content"><?php _e('8) show content:', 'modern-team-showcase-with-widget'); ?> 
												</label>
												<?php $mtsw_grid_content= mtsw_true_false() ?>
												<select id="mtsw_grid_content" name="mtsw_grid_content" onchange="sg_mtsw_grid()">
													<option value="default-value">No Need</option>
													<?php foreach ($mtsw_grid_content as $k): ?>
														<option value="<?php _e($k, 'modern-team-showcase-with-widget') ?>">
															<?php _e($k, 'modern-team-showcase-with-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
									 <p>
												<label for="mtsw_grid_position"><?php _e('9) Show position:', 'modern-team-showcase-with-widget'); ?> 
												</label>
												<?php $mtsw_grid_position = mtsw_true_false() ?>
												<select id="mtsw_grid_position" name="mtsw_grid_position" onchange="sg_mtsw_grid()">
													<option value="default-value">Default option</option>
													<?php foreach ($mtsw_grid_position as $k): ?>
														<option value="<?php _e($k, 'modern-team-showcase-with-widget') ?>">
															<?php _e($k, 'modern-team-showcase-with-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
									<p><label for="mtsw_grid_social"><?php _e('10) Show Social:', 'modern-team-showcase-with-widget'); ?> 
												</label>
												<?php $mtsw_grid_social = mtsw_true_false() ?>
												<select id="mtsw_grid_social" name="mtsw_grid_social" onchange="sg_mtsw_grid()">
													<option value="default-value">Default option</option>
													<?php foreach ($mtsw_grid_social as $k): ?>
														<option value="<?php _e($k, 'modern-team-showcase-with-widget') ?>">
															<?php _e($k, 'modern-team-showcase-with-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
										</form>
									</div>
								</td>
								<td valign="top"><h3><?php _e('Shortcode:', 'modern-team-showcase-with-widget'); ?></h3> 
									<p style="font-size: 16px;"><?php _e('Use this shortcode to display the Our Team Grid in your posts or pages! Just copy this piece of text and place it where you want it to display.', 'modern-team-showcase-with-widget'); ?> </p>
									<div id="mtsw_sg_grid_shortcode" style="margin:20px 0; padding: 10px;
									background: #e7e7e7;font-size: 16px;border-left: 4px solid #13b0c5;" >
								</div>
								<div style="margin:20px 0; padding: 10px;
								background: #e7e7e7;font-size: 16px;border-left: 4px solid #13b0c5;" >
								&lt;?php echo do_shortcode(<span id="mtsw_sg_grid_shortcode_php"></span>); ?&gt;
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div><!-- .inside -->
		<hr>
				</div>
			</div>
		</div>
	</div>			
<?php } 
/**
 * 'plugin Slider Short code Generater
 *
 * @package Modern Team Showcase with Widget
 * @since 1.0
 */
function mtsw_slider_shortcode() { ?>	
	<style type="text/css">
		.shortcode-bg{background-color: #f0f0f0;padding: 10px 5px;display: inline-block;margin: 0 0 5px 0;font-size: 16px;border-radius: 5px;}
		.mtsw_shortcode_generator label{font-weight: 700; width: 100%; float: left;}
		.mtsw_shortcode_generator select{width: 100%;}
	</style>
	<div id="post-body-content">
		<div class="metabox-holder">
			<div class="meta-box-sortables ui-sortable">
				<div class="postbox">
					<h3 style="font-size: 18px;">
						<?php _e('Create Our Team Slider Shortcode :-', 'modern-team-showcase-with-widget') ?>
					</h3>
					<div class="inside">
						<table cellpadding="10" cellspacing="10">
							<tbody><tr><td valign="top">
								<div class="postbox" style="width:300px; height: 450px; overflow-x: scroll;">
									<form id="shortcode_generator" style="padding:20px;" class="mtsw_shortcode_generator">
									 <p><label for="mtsw_slider_design"><?php _e('1) Select Design Template:', 'modern-team-showcase-with-widget'); ?></label>
										  	<?php $mtsw_slider_design = mtsw_templates() ?>
										  	<select id="mtsw_slider_design" name="mtsw_slider_design"
										  	onchange="sg_mtsw_slider()">
										  	<option value="default-template">Default Template</option>
										  	<?php  foreach ($mtsw_slider_design as $k): ?>
										  		<option value="<?php _e($k, 'modern-team-showcase-with-widget') ?>">
										  			<?php _e($k, 'modern-team-showcase-with-widget') ?>
										  		</option>
										  	<?php endforeach; ?>
										  </select> 
										</p>
										 <p><label for="mtsw_slider_limit"><?php _e('2) Set Slides Limit:', 'modern-team-showcase-with-widget'); ?></label>
											   	<input id="mtsw_slider_limit" name="mtsw_slider_limit" type="text" value="-1"
											   	onchange="sg_mtsw_slider()">
											   	<span class="howto"> <?php _e('( For all "-1" Enter any Numeric No. ) ', 'modern-team-showcase-with-widget'); ?></span>
										   </p>
										  	<p><label for="mtsw_slider_cell"><?php _e('3) Select Slider cell:', 'modern-team-showcase-with-widget'); ?></label>
						                    <input id="mtsw_slider_cell" name="mtsw_slider_cell" type="text" value="3"
										      onchange="sg_mtsw_slider()">
										      <span class="howto"> <?php _e('(Default Slider cell is 3)', 'modern-team-showcase-with-widget'); ?></span>
										  </p>
										 	<p>
												<label for="mtsw_slider_order"><?php _e('4) Select Order:', 'modern-team-showcase-with-widget'); ?> 
												</label>
												<?php $mtsw_slider_order = mtsw_asc_desc() ?>
												<select id="mtsw_slider_order" name="mtsw_slider_order" 
												     onchange="sg_mtsw_slider()">
													<option value="default-value">No Need</option>
													<?php foreach ($mtsw_slider_order as $k): ?>
														<option value="<?php _e($k, 'modern-team-showcase-with-widget') ?>">
															<?php _e($k, 'modern-team-showcase-with-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
												<span class="howto"> ( Set  Ascending Order OR  Descending Order. )</span>
											</p>
							         <p>
												<label for="mtsw_slider_orderby"><?php _e('5) Select Order By:', 'modern-team-showcase-with-widget'); ?> 
												</label>
												<?php $mtsw_slider_orderby = mtsw_orderby() ?>
												<select id="mtsw_slider_orderby" name="mtsw_slider_orderby" onchange="sg_mtsw_slider()">
													<option value="default-value">No Need</option>
													<?php foreach ($mtsw_slider_orderby as $k): ?>
														<option value="<?php _e($k, 'modern-team-showcase-with-widget') ?>">
															<?php _e($k, 'modern-team-showcase-with-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
											</p>										
										
										<p>
											<label for="mtsw_cat">
												<?php _e('6) Select Category:', 'modern-team-showcase-with-widget') ?></label>
												<?php
												$args = array("post_type"=> "post", "post_status"=> "publish");
												$terms = get_terms(['taxonomy' => MTSW_CAT,$args]);   	      						
												 ?>
												<select id="mtsw_cat" name="mtsw_cat" onchange="sg_mtsw_slider()">
												   <option value="nocat">All Category</option>
													<?php if ($terms!='') {
													foreach ($terms as $key => $value) { ?>
														<option value="<?php echo $value->term_id; ?>">
															<?php echo $value->name;  ?>
														</option>													
													<?php  } } ?>
												</select>
												<span class="howto"> ( By default All Testimonial. )</span>											
											</p>						
									<p>
												<label for="slider_dots"><?php _e('7) Dots:', 'modern-team-showcase-with-widget'); ?> 
												</label>
												<?php $slider_dots = mtsw_true_false() ?>
												<select id="slider_dots" name="mtsw_slider_dots" onchange="sg_mtsw_slider()">
													<option value="default-value">Default Value</option>
													<?php foreach ($slider_dots as $k): ?>
														<option value="<?php _e($k, 'modern-team-showcase-with-widget') ?>">
															<?php _e($k, 'modern-team-showcase-with-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
									<p>
												<label for="mtsw_slider_arrows"><?php _e('8) Display Arrows:', 'modern-team-showcase-with-widget'); ?> 
												</label>
												<?php $mtsw_slider_arrows = mtsw_true_false() ?>
												<select id="mtsw_slider_arrows" name="mtsw_slider_arrows" onchange="sg_mtsw_slider()">
													<option value="default-value">Default option</option>
													<?php foreach ($mtsw_slider_arrows as $k): ?>
														<option value="<?php _e($k, 'modern-team-showcase-with-widget') ?>">
															<?php _e($k, 'modern-team-showcase-with-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
									<p>
												<label for="mtsw_slider_autoplay"><?php _e('9) Set AutoPlay:', 'modern-team-showcase-with-widget'); ?> 
												</label>
												<?php $mtsw_slider_autoplay = mtsw_true_false() ?>
												<select id="mtsw_slider_autoplay" name="mtsw_slider_autoplay" onchange="sg_mtsw_slider()">
													<option value="default-value">Default option</option>
													<?php foreach ($mtsw_slider_autoplay as $k): ?>
														<option value="<?php _e($k, 'modern-team-showcase-with-widget') ?>">
															<?php _e($k, 'modern-team-showcase-with-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
									<p>
										<label for="mtsw_slider_scroll"><?php _e('10). Move(Scroll) team for each slide:', 'modern-team-showcase-with-widget'); ?></label>
						                    <input id="mtsw_slider_scroll" name="mtsw_slider_scroll" type="text" value="1"
										      onchange="sg_mtsw_slider()">
										      <span class="howto"> <?php _e('( Default value is "1" ).', 'modern-team-showcase-with-widget'); ?></span>
										  </p>
									  <p>
									<p>
										<label for="mtsw_slider_interwal"><?php _e('11) Moving Interval between Two Slides:', 'modern-team-showcase-with-widget'); ?> </label>
						                    <input id="mtsw_slider_interval" name="mtsw_slider_interval" value="3000" onchange="sg_mtsw_slider()" type="text">
										      <span class="howto"> ( Set Slides Moving Speed value in Milliseconds. Default value is 3000 ).</span>
										</p>
									<p>
										<label for="mtsw_slider_speed"><?php _e('12) Slides Moving Speed:', 'modern-team-showcase-with-widget');?> </label>
						                    <input id="mtsw_slider_speed" name="mtsw_slider_speed" value="300" onchange="sg_mtsw_slider()" type="text">
										      <span class="howto"> ( Set Slides Moving Speed value in Milliseconds. Default value is 300 ).</span>
										</p>
										 <p>
												<label for="mtsw_slider_popup"><?php _e('13) Show popup:', 'modern-team-showcase-with-widget'); ?> 
												</label>
												<?php $mtsw_slider_popup = mtsw_true_false() ?>
												<select id="mtsw_slider_popup" name="mtsw_slider_popup" onchange="sg_mtsw_slider()">
													<option value="default-value">Default option</option>
													<?php foreach ($mtsw_slider_popup as $k): ?>
														<option value="<?php _e($k, 'modern-team-showcase-with-widget') ?>">
															<?php _e($k, 'modern-team-showcase-with-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
									<p>
												<label for="mtsw_slider_content"><?php _e('14) Show content:', 'modern-team-showcase-with-widget'); ?> 
												</label>
												<?php $mtsw_slider_content = mtsw_true_false() ?>
												<select id="mtsw_slider_content" name="mtsw_slider_content" onchange="sg_mtsw_slider()">
													<option value="default-value">Default option</option>
													<?php foreach ($mtsw_slider_content as $k): ?>
														<option value="<?php _e($k, 'modern-team-showcase-with-widget') ?>">
															<?php _e($k, 'modern-team-showcase-with-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
									 <p>
												<label for="mtsw_slider_position"><?php _e('15) Show position:', 'modern-team-showcase-with-widget'); ?> 
												</label>
												<?php $mtsw_slider_position = mtsw_true_false() ?>
												<select id="mtsw_slider_position" name="mtsw_slider_position" onchange="sg_mtsw_slider()">
													<option value="default-value">Default option</option>
													<?php foreach ($mtsw_slider_position as $k): ?>
														<option value="<?php _e($k, 'modern-team-showcase-with-widget') ?>">
															<?php _e($k, 'modern-team-showcase-with-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
									 <p>
												<label for="mtsw_slider_social"><?php _e('16) Show Social:', 'modern-team-showcase-with-widget'); ?> 
												</label>
												<?php $mtsw_slider_social = mtsw_true_false() ?>
												<select id="mtsw_slider_social" name="mtsw_slider_social" onchange="sg_mtsw_slider()">
													<option value="default-value">Default option</option>
													<?php foreach ($mtsw_slider_social as $k): ?>
														<option value="<?php _e($k, 'modern-team-showcase-with-widget') ?>">
															<?php _e($k, 'modern-team-showcase-with-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
										</form>
									</div>
								</td>
							 <td valign="top"><h3><?php _e('Shortcode:', 'modern-team-showcase-with-widget'); ?></h3> 
									<p style="font-size: 16px;"><?php _e('Use this shortcode to display the Our Team Slider in your posts or pages! Just copy this piece of text and place it where you want it to display.', 'modern-team-showcase-with-widget'); ?> </p>
									<div id="mtsw_sg_slider_shortcode" style="margin:20px 0; padding: 10px;
									background: #e7e7e7;font-size: 16px;border-left: 4px solid #3E7CAA;" >
								</div>
								<div style="margin:20px 0; padding: 10px;
								background: #e7e7e7;font-size: 16px;border-left: 4px solid #3E7CAA;" >
								&lt;?php echo do_shortcode(<span id="mtsw_sg_slider_shortcode_php"></span>); ?&gt;
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div><!-- .inside -->
		<hr>
	</div>
	</div>
</div>
</div>			
<?php }
/**
 * Gets the plugin design part feed
 *
 * @package Video gallery and Player
 * @since 1.0.0
 */
function mtsw_get_plugin_design( $feed_type = '' ) {	
	$active_tab = isset($_GET['tab']) ? mtsw_sanitize_clean($_GET['tab']) : '';	
	// If tab is not set then return
	if( empty($active_tab) ) {
		return false;
	}
	// Taking some variables
	$wpoh_admin_tabs = mtsw_help_tabs();
	$offer_key 	= isset($wpoh_admin_tabs[$active_tab]['offer_key']) 	? $wpoh_admin_tabs[$active_tab]['offer_key'] 	: 'wppf_' . $active_tab;
	$url 			= isset($wpoh_admin_tabs[$active_tab]['url']) 			? $wpoh_admin_tabs[$active_tab]['url'] 				: '';
	$offer_time = isset($wpoh_admin_tabs[$active_tab]['offer_time']) ? $wpoh_admin_tabs[$active_tab]['offer_time'] 	: 172800;
    $offercache 			= get_transient( $offer_key );	
	if ($offercache !=" ") {		
		$feed 			= wp_remote_get( mtsw_clean_url($url));
		$response_code 	= wp_remote_retrieve_response_code( $feed );
		if ( ! is_wp_error( $feed ) && $response_code == 200 ) {
			if ( isset( $feed['body'] ) && strlen( $feed['body'] ) > 0 ) {
				$offercache = wp_remote_retrieve_body( $feed );
				set_transient( $offer_key, $offercache, $offer_time );
			}
		} else {
			$offercache = '<div class="error"><p>' . __( 'There was an error retrieving the data from the server. Please try again later.', 'html5-videogallery-plus-player' ) . '</div>';
		}
	}
	return $offercache;	
}