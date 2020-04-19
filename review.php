<?php
/**
 * Plugin Name: WP Reviews
 * Description: Best Review Plugin. Customer reviews powered with shortcode to display both grid reviews and slider reviews.
 * Plugin URI: https://www.abnercalapiz.com/plugins/wp-reviews
 * Author: Abner Calapiz
 * Version: 1.0
 * Author URI: https://www.abnercalapiz.com/
 */
 
// styles & scripts here
add_action( 'wp_enqueue_scripts', 'custom_wprl_review_scripts' );
function custom_wprl_review_scripts() {
    wp_enqueue_style( 'style', plugins_url('/style.css', __FILE__) );
    wp_register_script( 'custom-isotope', plugins_url('/js/isotope.min.js', __FILE__) );
    wp_register_script( 'custom-isotope-packery', plugins_url('/js/packery-mode.min.js', __FILE__) );
    wp_register_script( 'custom-flexslider', plugins_url('/js/jquery.flexslider-min.js', __FILE__) );
    wp_register_script( 'review-script', plugins_url('/js/review-script.js', __FILE__) );
    wp_register_script( 'review-grid-script', plugins_url('/js/review-grid-script.js', __FILE__) );
    wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/f793ca9eb4.js');
}

function custom_wprl_theme_setup() {
  add_image_size( 'review-thumb', 70, 70, true );
}
add_action( 'after_setup_theme', 'custom_wprl_theme_setup' );

require_once( 'includes/posttypes.php' );
require_once( 'includes/metabox.php' );
require_once( 'includes/shortcodes.php' );

// Theme update checker
include( 'includes/plugin-update-checker-master/plugin-update-checker.php' );
$serverUrl = 'https://www.abnercalapiz.com';
$customPluginUpdateChecker = Puc_v4_Factory::buildUpdateChecker( $serverUrl .'/plugin_updater.json', __FILE__, 'wp-reviews' );