<?php
/**
 * Custom functions
 */

// Remove the theme editor from admin
function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'remove_editor_menu', 1);

//Disable Theme Updates
remove_action( 'load-update-core.php', 'wp_update_themes' );
add_filter( 'pre_site_transient_update_themes', create_function( '$a', "return null;" ) );
wp_clear_scheduled_hook( 'wp_update_themes' );

//Disable Plugin Updates
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
wp_clear_scheduled_hook( 'wp_update_plugins' );

//Disable Core Updates
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );
wp_clear_scheduled_hook( 'wp_version_check' );

// Asset URL rewrites
function add_asset_rewrites($content) {
  global $wp_rewrite;
  $new_non_wp_rules = array(
    'assets/img/(.*)'      => THEME_PATH . '/assets/img/$1',
    'assets/fonts/(.*)'      => THEME_PATH . '/assets/fonts/$1',
  );
  $wp_rewrite->non_wp_rules = array_merge($wp_rewrite->non_wp_rules, $new_non_wp_rules);
  return $content;
}

if (!is_multisite() && !is_child_theme()) {
  if (current_theme_supports('rewrites')) {
    add_action('generate_rewrite_rules', 'add_asset_rewrites');
  }
}
