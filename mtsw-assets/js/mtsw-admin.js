sg_mtsw_grid();
sg_mtsw_slider();
//Call to slider shortcode ganrater
function sg_mtsw_grid() {   
    var sg_main = "[mtsw-grid ";       
    var mtsw_grid_template = jQuery('#mtsw_grid_template').val();
    var mtsw_limit = jQuery('#mtsw_limit').val();
    var mtsw_grid = jQuery('#mtsw_grid').val();
    var grid_cat = jQuery('#grid_cat').val();
    var mtsw_grid_order = jQuery('#mtsw_grid_order').val();
    var mtsw_grid_orderby = jQuery('#mtsw_grid_orderby').val();
    var mtsw_popup_grid = jQuery('#mtsw_popup_grid').val();
    var mtsw_grid_content = jQuery('#mtsw_grid_content').val();
    var mtsw_grid_position = jQuery('#mtsw_grid_position').val(); 
     var mtsw_grid_social = jQuery('#mtsw_grid_social').val();    
 if (mtsw_grid_template == 'default-template') {} else { sg_main = sg_main + ' template="' + mtsw_grid_template + '"';}
 if (mtsw_grid == 'default-value') {} else { sg_main = sg_main + ' grid="' + mtsw_grid + '"';}
 if (mtsw_limit == '-1') {} else { sg_main = sg_main + ' limit="' + mtsw_limit + '"';}
 if (grid_cat == 'nocat') {} else { sg_main = sg_main + ' category="' + grid_cat + '"';}
 if (mtsw_grid_order == 'default-value') {} else { sg_main = sg_main + ' order="' + mtsw_grid_order + '"';}
 if (mtsw_grid_orderby == 'default-value') {} else { sg_main = sg_main + ' orderby="' + mtsw_grid_orderby + '"';}
 if (mtsw_popup_grid == 'default-value') {} else { sg_main = sg_main + ' popup="' + mtsw_popup_grid + '"';}
 if  (mtsw_grid_position == 'default-value') {} else { sg_main = sg_main + ' show_position="' + mtsw_grid_position + '"';}
 if  (mtsw_grid_social == 'default-value') {} else { sg_main = sg_main + ' show_social="' + mtsw_grid_social + '"';}
 if  (mtsw_grid_content == 'default-value') {} else { sg_main = sg_main + ' show_content="' + mtsw_grid_content + '"';}
    sg_main = sg_main + ']'; 
    jQuery("#mtsw_sg_grid_shortcode").text(sg_main);
    jQuery("#mtsw_sg_grid_shortcode_php").text("'"+sg_main+"'");}
function sg_mtsw_slider() {   
    var sg_main = "[mtsw-slider  ";       
    var mtsw_slider_design = jQuery('#mtsw_slider_design').val();
    var mtsw_slider_cell = jQuery('#mtsw_slider_cell').val();
    var mtsw_slider_limit = jQuery('#mtsw_slider_limit').val();
    var mtsw_slider_order = jQuery('#mtsw_slider_order').val();
    var mtsw_slider_orderby = jQuery('#mtsw_slider_orderby').val(); 
    var mtsw_cat = jQuery('#mtsw_cat').val(); slider_dots
    var slider_dots = jQuery('#slider_dots').val();
    var mtsw_slider_arrows = jQuery('#mtsw_slider_arrows').val();    
    var mtsw_slider_autoplay = jQuery('#mtsw_slider_autoplay').val();   
    var mtsw_slider_interval = jQuery('#mtsw_slider_interval').val(); 
    var mtsw_slider_scroll = jQuery('#mtsw_slider_scroll').val();   
    var  mtsw_slider_speed = jQuery('#mtsw_slider_speed').val();
    var  mtsw_slider_popup = jQuery('#mtsw_slider_popup').val(); 
    var  mtsw_slider_content = jQuery('#mtsw_slider_content').val();   
    var mtsw_slider_position = jQuery('#mtsw_slider_position').val();
    var mtsw_slider_social = jQuery('#mtsw_slider_social').val();    
if (mtsw_slider_design == 'default-template') {} else { sg_main = sg_main + ' template="' + mtsw_slider_design + '"';}
if (mtsw_slider_cell == '3') {} else { sg_main = sg_main + ' slides_column="' + mtsw_slider_cell + '"';} 
if (mtsw_slider_limit == '-1') {} else { sg_main = sg_main + ' limit="' + mtsw_slider_limit + '"';}
if (mtsw_slider_order == 'default-value') {} else { sg_main = sg_main + ' order="' + mtsw_slider_order + '"';}
if (mtsw_slider_orderby == 'default-value') {} else { sg_main = sg_main + ' orderby="' + mtsw_slider_orderby + '"';}
if (mtsw_cat == 'nocat') {} else { sg_main = sg_main + ' category="' + mtsw_cat + '"';}
if (slider_dots == 'default-value') {} else { sg_main = sg_main + ' bullet="' + slider_dots+ '"';}
if (mtsw_slider_arrows == 'default-value') {} else { sg_main = sg_main + ' arrows="' + mtsw_slider_arrows+ '"';}
if (mtsw_slider_autoplay == 'default-value') {} else { sg_main = sg_main + ' autoPlay="' + mtsw_slider_autoplay+ '"';} 
if (mtsw_slider_interval == '3000') {} else { sg_main = sg_main + ' interval="' + mtsw_slider_interval+ '"';}    
if (mtsw_slider_scroll == '1') {} else { sg_main = sg_main + ' scroll="' + mtsw_slider_scroll+ '"';} mtsw_slider_popup
if (mtsw_slider_speed == '300') {} else { sg_main = sg_main + ' speed="' + mtsw_slider_speed+ '"';}
if (mtsw_slider_popup == 'default-value') {} else { sg_main = sg_main + ' popup="' + mtsw_slider_popup+ '"';}
if (mtsw_slider_content == 'default-value') {} else { sg_main = sg_main + ' show-content="' + mtsw_slider_content+ '"';} 
if (mtsw_slider_position == 'default-value') {} else { sg_main = sg_main + ' show_position="' + mtsw_slider_position + '"';}
if (mtsw_slider_social == 'default-value') {} else { sg_main = sg_main + ' show_social="' + mtsw_slider_social + '"';}
   sg_main = sg_main + ']';
    jQuery("#mtsw_sg_slider_shortcode").text(sg_main);
    jQuery("#mtsw_sg_slider_shortcode_php").text("'"+sg_main+"'");
}