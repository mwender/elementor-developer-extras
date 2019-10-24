<?php

namespace EleDevExtras\shortcodes;

function example_shortcode( $atts ){
  $args = shortcode_atts( [
    'foo' => 'bar'
  ], $atts );

  return '<code>This is an example shortcode.</code>';
}
add_shortcode( 'example_shortcode', __NAMESPACE__ . '\\example_shortcode' );
