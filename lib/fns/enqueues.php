<?php

namespace EleDevExtras\enqueues;

/**
 * Enqueues plugin CSS and removes the following:
 *
 * - Hello Elementor Theme styles
 * - WP Block Library Styles
 */
function enqueue_scripts(){
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'hello-elementor' );
  wp_dequeue_style( 'hello-elementor-theme-style' );
  wp_dequeue_style( 'elementor-frontend' );

  $css_dir = ( stristr( site_url(), '.local' ) || SCRIPT_DEBUG )? 'css' : 'dist' ;
  wp_enqueue_style( 'elementor-developer-extras', plugin_dir_url( __FILE__ ) . '../' . $css_dir  . '/main.css', null, filemtime( plugin_dir_path( __FILE__ ) . '../'. $css_dir .'/main.css' ) );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_scripts', 999 );

/**
 * Removes WordPress Emoji.
 */
function remove_wp_emoji(){
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');

  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
}
add_action( 'init', __NAMESPACE__ . '\\remove_wp_emoji' );
