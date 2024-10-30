<?php
if ( ! defined( 'ABSPATH' ) ) exit;
global $post;
?>
<div class="<?php echo $css_class.' '.$class;?>">
<div class="mtsw-teamshowcase-inner">
	<?php if ( has_post_thumbnail() ) { ?>
			<div class="mtsw-avtar">			
			<img src="<?php echo esc_url($team_avtar); ?>" alt="<?php the_title(); ?>" />
	<?php if($teampopup == 'true') { ?>
		<div class="mtsw-limk-outer">
			<a class="mtsw-popup-icon popup-modal" data-mfp-src="#popup-<?php echo $popup_no. '-' .$i; ?>" href="javascript:void(0);"><i class="fa fa-external-link" aria-hidden="true"></i></a>
			</div>
	<?php } ?>
	     <div class="member-overlay">
		<div class="member-name"><?php the_title(); ?></div>
		<?php if($member_position != '' && $show_position == "true"){ ?>
		<div class="member-position"> 
			 <?php echo $member_position;?>
		</div>	
		<?php } ?>
		</div>			
		</div>
		<?php } ?>	
	<div class="member-content">		
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
         if($content!="" && $show_content=="true") {
		   ?> 
		<div class="member-description"> 
		<p><?php echo $content; ?> </p>
		</div>
	<?php } ?>
		</div>	
</div>
</div>			