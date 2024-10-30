jQuery(document).ready(function($) {
	$( '.mtsw-popup' ).each(function( index ) {		
		var popup_id   = $(this).attr('id');			
		if( typeof(popup_id) != 'undefined' ) {			
			jQuery('#'+popup_id).magnificPopup({					 					 
				mainClass: 'mfp-fade mtsw-popup-outter',
				delegate:'.mtsw-popup-icon',
				removalDelay: 160,
				preloader: false,
				type:'inline',
				fixedContentPos:false,
			});
		}
	});	
	$( '.mtsw-slider-slick' ).each(function( index ) {
		var slider_id   = $(this).attr('id');	
		var slider_conf = $.parseJSON( $(this).closest('.mtsw-slider-outter-wrap').find('.slider-conf-data').attr('data-conf'));	
		if( typeof( slider_id) != 'undefined' &&  slider_id != '' ) {
		jQuery('#'+ slider_id).slick({
			dots			: (slider_conf.dots) == "true" ? true : false,			
			arrows			: (slider_conf.arrows) == "true" ? true : false,
			speed			: parseInt(slider_conf.speed),
			autoplay		: (slider_conf.autoplay) == "true" ? true : false,
			autoplaySpeed	: parseInt(slider_conf.autoplay_interval),
			slidesToShow	: parseInt(slider_conf.slides_column),
			slidesToScroll	: parseInt(slider_conf.slides_scroll),
			infinite 		: true,
			prevArrow: "<div class='slick-prev'><i class='fa fa-angle-left'></i></div>",
            nextArrow: "<div class='slick-next'><i class='fa fa-angle-right'></i></div>",
			responsive 		: [{
				breakpoint 	: 1023,
				settings 	: {					
					slidesToShow 	: (parseInt(slider_conf.slides_column) > 3) ? 3 : parseInt(slider_conf.slides_column),
					slidesToScroll	: parseInt(slider_conf.slides_scroll),
				}
			},{
				breakpoint	: 767,
				settings	: {
					slidesToShow 	: (parseInt(slider_conf.slides_column) > 3) ? 3 : parseInt(slider_conf.slides_column),
					slidesToScroll	: parseInt(slider_conf.slides_scroll),				
				}
			},{
				breakpoint	: 639,
				settings	: {
					slidesToShow 	: 1,
					slidesToScroll 	: 1,					
				}
			},{
				breakpoint	: 479,
				settings	: {
					slidesToShow 	: 1,
					slidesToScroll 	: 1,					
				}
			},{
				breakpoint	: 319,
				settings	: {
					slidesToShow 	: 1,
					slidesToScroll 	: 1,					
				}
			}]			
		});
		}		
	});
});