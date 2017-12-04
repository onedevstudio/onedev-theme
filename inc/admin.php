<?php
/**
 * Odin admin functions.
 */

function theme_admin_files() {
  wp_enqueue_style( 'theme-admin-style', get_template_directory_uri() . '/assets/stylesheets/admin-style.css' );
  wp_enqueue_script( 'theme-admin', get_template_directory_uri() . '/assets/javascripts/admin-theme.js' );
}

add_action( 'admin_enqueue_scripts', 'theme_admin_files' );
add_action( 'login_enqueue_scripts', 'theme_admin_files' );

function theme_admin_add_editor_styles() {
  add_editor_style( get_template_directory_uri() . '/assets/stylesheets/editor-style.css' );
}
add_action( 'after_setup_theme', 'theme_admin_add_editor_styles' );

/**
 * Custom Footer.
 */
function odin_admin_footer() {
  echo date( 'Y' ) . ' - ' . get_bloginfo( 'name' );
}

add_filter( 'admin_footer_text', 'odin_admin_footer' );

/**
 * Custom logo URL.
 */
function odin_admin_logo_url() {
  return home_url();
}

add_filter( 'login_headerurl', 'odin_admin_logo_url' );

/**
 * Custom logo title.
 */
function odin_admin_logo_title() {
  return get_bloginfo( 'name' );
}

add_filter( 'login_headertitle', 'odin_admin_logo_title' );

/**
 * Remove widgets dashboard.
 */
function odin_admin_remove_dashboard_widgets() {
  // remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
  // remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );

  // Yoast's SEO Plugin Widget
  remove_meta_box( 'yoast_db_widget', 'dashboard', 'normal' );
}

add_action( 'wp_dashboard_setup', 'odin_admin_remove_dashboard_widgets' );

/**
 * Remove Welcome Panel.
 */
remove_action( 'welcome_panel', 'wp_welcome_panel' );
