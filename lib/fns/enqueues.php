<?php

namespace EleDevExtras\enqueues;

function enqueue_scripts(){
  // CSS Customizations
  $css_dir = ( stristr( site_url(), '.local' ) || SCRIPT_DEBUG )? 'css' : 'dist' ;
  wp_enqueue_style( 'elementor-developer-extras', plugin_dir_url( __FILE__ ) . '../' . $css_dir  . '/main.css', ['hello-elementor','elementor-frontend'], plugin_dir_path( __FILE__ ) . '../'. $css_dir .'/main.css' );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_scripts' );