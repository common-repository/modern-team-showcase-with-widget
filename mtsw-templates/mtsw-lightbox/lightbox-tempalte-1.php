<?php
if ( ! defined( 'ABSPATH' ) ) exit;
global $post;
?>
<div id="popup-<?php echo $popup_no. '-' .$i; ?>" class="mfp-hide white-popup-block mtsw-popup-outter">		
	<div class="mtsw-popup-inner ng-scope">					
		<div class="wp-cell-6 mtsw-member-img wpcell">
			<img src="<?php echo $team_avtar; ?>">
		</div>
		<div class="member-popup-info wp-cell-6 wpcell">
			<div class="mtsw-member-name"><?php the_title(); ?></div>							
			<?php if($member_position!= ''){ ?>
				<div class="mtsw-member-dept"> 
					<?php echo $member_position; ?>
				</div>
			<?php } ?>
			<?php  if(($facebook_url != '' || $likdin_url != '' || $insta_url!='' || $twitter_url != '' || $google_url != '' || $youtube_url='') &&
			$show_social == "true" ) { ?>
				<div class="member-social">
					<ul>
						<?php if($facebook_url != '') { ?>
							<li><a href="<?php echo esc_url($facebook_url); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li> <?php }
							if($likdin_url != '') { ?><li><a target="_blank" href="<?php echo esc_url($linkdin_url); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li> <?php } 
							if($insta_url != '') { ?><li><a target="_blank" href="<?php echo esc_url($insta_url); ?>"><i class="fa fa-instagram"></i></a></li> <?php } 
							if($twitter_url != '') { ?><li><a target="_blank" href="<?php echo esc_url($twitter_url); ?>"><i class="fa fa-twitter"></i></a></li> <?php } 
							if($google_url != '') { ?><li><a target="_blank" href="<?php echo esc_url($google_url); ?>"><i class="fa fa-google-plus"></i></a></li> <?php } 
							if($youtube_url != '') { ?><li><a target="_blank" href="<?php echo esc_url($youtube_url); ?>"><i class="fa fa-youtube-play"></i></a></li> <?php } ?>
						</ul>						
					</div>
				<?php } ?>			
			 <?php $content = get_the_content(); 
         if($content!="") {
		   ?> 
		<div class="member-description"> 
		<p><?php echo $content; ?> </p>
		</div>
	<?php } ?>			
		</div>
	</div>	
</div>