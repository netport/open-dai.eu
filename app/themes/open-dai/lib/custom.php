<?php

/**
 * WPML options
 */
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);

/**
 * Add buttons and controls to TinyMCE
 **/
function mce_mce_buttons_2( $orig ) {
    array_unshift($orig, 'styleselect');
    return $orig;
}
add_filter( 'mce_buttons_2', 'mce_mce_buttons_2' );


/**
 * Add style formats to TineMCE styleselect
 */
function mce_style_formats( $init_array ) {
  $init_array['style_formats'] = json_encode(array(
    array(
      'title' => __('Lead', 'opendai'),
      'classes' => 'lead',
      'block' => 'p',
    )
  ));
  return $init_array;
}
add_filter( 'tiny_mce_before_init', 'mce_style_formats' );


/**
 * Admin UI
 */

// Remove the theme editor from admin
function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'remove_editor_menu', 1);

/**
 * Disable updates from admin
 */

// Theme
remove_action( 'load-update-core.php', 'wp_update_themes' );
add_filter( 'pre_site_transient_update_themes', create_function( '$a', "return null;" ) );
wp_clear_scheduled_hook( 'wp_update_themes' );

// Plugin
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
wp_clear_scheduled_hook( 'wp_update_plugins' );

// Core
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );
wp_clear_scheduled_hook( 'wp_version_check' );


/**
 * URL rewrites
 */

if (!is_multisite() && !is_child_theme()) {
  if (current_theme_supports('rewrites')) {
    add_action('generate_rewrite_rules', 'add_asset_rewrites');
  }
}

// Assets
function add_asset_rewrites($content) {
  global $wp_rewrite;
  $new_non_wp_rules = array(
    'assets/img/(.*)'      => THEME_PATH . '/assets/img/$1',
    'assets/fonts/(.*)'      => THEME_PATH . '/assets/fonts/$1',
  );
  $wp_rewrite->non_wp_rules = array_merge($wp_rewrite->non_wp_rules, $new_non_wp_rules);
  return $content;
}
