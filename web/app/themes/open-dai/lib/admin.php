<?php

// Remove the theme editor
function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'remove_editor_menu', 1);

// Disable theme updates
// remove_action( 'load-update-core.php', 'wp_update_themes' );
// add_filter( 'pre_site_transient_update_themes', create_function( '$a', "return null;" ) );
// wp_clear_scheduled_hook( 'wp_update_themes' );

// Disable plugin updates
// remove_action( 'load-update-core.php', 'wp_update_plugins' );
// add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
// wp_clear_scheduled_hook( 'wp_update_plugins' );

// Disable core updates
// add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );
// wp_clear_scheduled_hook( 'wp_version_check' );

// Add buttons and controls to TinyMCE
function mce_mce_buttons_2( $orig ) {
    array_unshift($orig, 'styleselect');
    return $orig;
}
add_filter( 'mce_buttons_2', 'mce_mce_buttons_2' );

// Add style formats to TineMCE styleselect
function mce_style_formats( $init_array ) {
  $init_array['style_formats'] = json_encode(array(
    array(
      'title' => 'Lead paragraph',
      'classes' => 'lead',
      'block' => 'p',
    ),
    array(
      'title' => 'Small text',
      'inline' => 'small',
    )
  ));
  return $init_array;
}
add_filter( 'tiny_mce_before_init', 'mce_style_formats' );
