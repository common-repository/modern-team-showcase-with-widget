=== Modern Team Showcase with Widget ===
Contributors: pareshpachani007
Tags: post slider, members profiles, team showcase, our team showcase, company team, team members, our team, showcase, staff member grid, team, team builder, Team Member, Team Member Showcase slider, team member showcasing, team members, team plugin wordpress, team showcase, teams, wp, wp team, team free, team profile, team carousel, shortcodes
Requires at least: 3.5
Tested up to: 5.5.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Modern Team showcase makes it easy to create and mange a team showcase with slider, grid(columns), widget for sidebar it on your WordPress website. 
== Description ==
Modern Team Showcase with Widget plugin works with Slider, Grid also with widget. Our Team Showcase allows you to easily create and display profiles of your team members & staff to display on your website. So display team members with profile pictures, links to social networks and their individual bio on Wordpress Website. 

 
Also works with Gutenberg shortcode block. 

= Here is the Modern Team Showcase with Widget shortcode example =

**Main shortcode:**
 
<code>[mtsw-slider]</code>
<code>[mtsw-grid]</code>

= FEATURES OF THIS PLUGIN =
* No Need Coding Skills. 
* You can easily show/hide and customize every field.
* Easy to add.
* Display Social Icons.
* Popup lightbox for more information.
* Also work with Gutenberg shortcode block.
* Shortcode Generator.
* Create multiple Slider & Grid using category.
* Beautiful, minimalist & light-weight.
* Add unlimited team members in slider & Grid.
* No any settings for this plugin.
* No extra code and files.
* Fully SEO Friendly. 
* Touch, swipe or tap on iOS, Android or any other touch devices with on/off option.

**To create team showcase with 5 Design Template:**

= Common Shortcode Paramaters for Grid And Slider =
* **Team Member Limit:**
limit="-1" ( i.e. Set number of team member show on your website, default value is "-1" it mean all. Option: any number).
* **Display by category:**
category="category_ID" (i.e. Set multiple member groups  by  using category ID. Option: Category ID).
* **Design Template:**
template="template-1" (i.e. Set the design template for team showcase slider, grid and widget. Option: template-1, template-2, upto 5).
* **Popup lightbox** :
show_author="false"(To display Author name.Option: "true" OR "false").
* **Set team Member Order** :
order="ASC"(Set team member order with option: DESC, ASC.).
* **Set team Member Orderby** :
orderby="rand"(Set team member orderby with option: name, ID, author, date, title, rand.).
* **Show Content** :
show_content ="false" (To display Member Content with Option: "true" OR "false").
* **Show Position** :
show_position="false"(To display Member Position with Option: "true" OR "false").
* **Show Social** :
show_social="false"(To display Member Social Icon with Option: "true" OR "false").
= For Grid only Shortcode Paramaters =
* **grid** :
grid="3"(To Set columns with Post Option of columns: 1,2,3,4,5,6.).
= For Slider only Shortcode Paramaters =
* **Set slider Scroll** :
slides_scroll="3" (i.e. To set how many slider scroll to the slider at a time.  Option: any number).
* **Set slider Columns** :
slides_column="3" (i.e. To set slider column Option: 2,5,4 etc.).
* **Pagination bullat** :
bullat="false" (i.e. To display slider slide pagination bullets. Option:  "true" OR "false").
* **Left Right Arrows:** 
arrows="false" (i.e. To display slider previous and next arrows. Option:  "true" OR "false").
* **Autoplay:**
autoplay="false"(i.e. To  move slide automatically in slider. Option:  "true" OR "false"). 
* **Autoplay interval:**
autoplay_interval="1000" (i.e. To set interval time between two slide in Millisecond).
* **Slide speed:**
speed="3000" (i.e. To set slider slide moving speed in Millisecond).

= How to install : = 

== Installation ==

1. Upload the 'modern-team-showcase-with-widget' folder to the '/wp-content/plugins/' directory.
2. Activate the "Modern Team Showcase With Widget" list plugin through the 'Plugins' menu in WordPress.
3. Add this short code where you want to display Team member in slider and grid(Columns).
4. This plugin works with Team Member Grid(Columns) view.
5. This plugin works with Team Member Slider view.

<code>[mtsw-slider]</code>
<code>[mtsw-grid]</code>

= How it Works with PHP Template code =

<code><?php echo do_shortcode('[mtsw-slider]'); ?> </code>

If you want to display Team member in Grid(Columns) view then use below template code.

<code><?php echo do_shortcode('[mtsw-grid]'); ?> </code>

== Screenshots ==
1. How to Add New Team member.
2. All Team Member.
3. Create Team Member with Groups.
4. How Shortcode works with Gutenberg shortcode block.

== Changelog ==

= 1.0 =
* Initial release.