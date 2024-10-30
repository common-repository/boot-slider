<?php
/**
 * @package Advanced_Login_Form
 * @version 1.7.2
 */
/*
Plugin Name: Boot Slider
Plugin URI: https://wordpress.org/plugins/boot-slider
Description: It a awosome slider plugin. That use bootstrap 5 origianl coursel feature and make awosome customize with functional.
Author: Dipto Paul
Version: 1.0.1
Author URI: https://www.fiverr.com/bootstrapdiv
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // disable direct access
}

// Enable shortcodes in text widgets
add_filter('widget_text', 'do_shortcode');

// include post type
include(plugin_dir_path(__FILE__) . 'inc/bt_slider_type.php');

// include shortcode
include(plugin_dir_path(__FILE__) . 'inc/bt_slider_shortcode.php');

// Include files
function bt_slider_include(){
  wp_register_style('bootstrap', plugins_url( '/assets/css/bootstrap.min.css', __FILE__ ), array(), '5.0.2', 'all' );
  wp_register_style('btslider', plugins_url( '/assets/css/bt-slider.css', __FILE__ ), array(), '1.0.2', 'all' );
  wp_enqueue_style('bootstrap');
  wp_enqueue_style('btslider');

  wp_enqueue_script('bootstrap', plugins_url( '/assets/js/bootstrap.min.js' , __FILE__ ), array(), '5.0.2', 'all' );
}
add_action('wp_enqueue_scripts', 'bt_slider_include');
