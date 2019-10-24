<?php
/**
 * Plugin Name:     Elementor Developer Extras
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     Developer tools for working with WordPress sites built with Elementor.
 * Author:          Michael Wender
 * Author URI:      https://mwender.com
 * Text Domain:     elementor-developer-extras
 * Domain Path:     /languages
 * Version:         0.2.0
 *
 * @package         ElementorDeveloperExtras
 */

// Include required files
require_once( 'lib/fns/enqueues.php' );
require_once( 'lib/fns/shortcodes.php' );

/**
 * Enhanced error logging
 *
 * @param      string  $message  The message
 */
function uber_log( $message = null ){
  static $counter = 1;

  $bt = debug_backtrace();
  $caller = array_shift( $bt );

  if( 1 == $counter )
    error_log( "\n\n" . str_repeat('-', 25 ) . ' STARTING DEBUG [' . date('h:i:sa', current_time('timestamp') ) . '] ' . str_repeat('-', 25 ) . "\n\n" );
  error_log( $counter . '. ' . basename( $caller['file'] ) . '::' . $caller['line'] . ' ' . $message );
  $counter++;
}
