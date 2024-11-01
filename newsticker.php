<?php
/*
Plugin Name: WP-Newsticker
Plugin URI: http://www.iwebix.de/wp-newsticker-javascript-newsticker-for-wordpress/
Description: WP-Newsticker is a plugin to show your recent Posts sliding through your website!
Version: 2.0
Author: Dennis Nissle
Author URI: http://www.iwebix.de
*/

$wp_news_options_page = get_option('siteurl') . '/wp-admin/admin.php?page=wp-newsticker/options.php';

function wp_news_options_page() {
	
	add_options_page('WP-Newsticker Options', 'WP-Newsticker', 10, 'wp-newsticker/options.php');
	
}

add_action('admin_menu', 'wp_news_options_page');

function wp_news_add_content_scripts() {
	
	if ( !is_admin() ) {
		wp_register_script('jquery.newsticker', WP_PLUGIN_URL . '/wp-newsticker/scripts/jquery.newsticker.js', '', '' );
		wp_enqueue_script('jquery.newsticker');
	}
}

add_action('wp_enqueue_scripts', 'wp_news_add_content_scripts');

function wp_news_cut_content_feat($wp_news_text, $wp_news_chars, $wp_news_points = "...") {
	
	$wp_news_length = strlen($wp_news_text);
	
	if($wp_news_length <= $wp_news_chars) {
		
		return $wp_news_text;
	
	} else {
		
		return substr($wp_news_text, 0, $wp_news_chars)." ".$wp_news_points;
		
	}
	
}

function wp_news_insert_content($wp_news_atts, $wp_news_content = null) {
	
	include (ABSPATH . '/wp-content/plugins/wp-newsticker/news.php');
	
}

add_shortcode("newsticker", "wp_news_insert_content");

function wp_news_add_script() {
	
	$wp_news_slide_speed = get_option('wp_news_slide_speed');
        
        if(empty($wp_news_slide_speed)) {
                
                $wp_news_slide_speed = 40;
                
        }
	
	$script = '<script type="text/javascript">
	
		divScroller("scroll-h", "h", '.$wp_news_slide_speed.', 6000);
		 
	</script>';
	
	echo $script;
	
}

add_action('wp_footer', 'wp_news_add_script');

?>