<?php
/**
 * Theme functions and definitions.
 *
 * @since 1.0.0
 */

$environment = ( defined('WP_DEBUG') && WP_DEBUG ) ? 'development' : 'production';

/**
 *  Definitions
 */
$the_theme = wp_get_theme();
define( 'THEME_ENV', $environment );
define( 'THEME_NAME', $the_theme['Name'] );
define( 'THEME_VERSION', $the_theme['Version'] );
define( 'THEME_FX', $the_theme['Name'] );
define( 'THEME_PATH', get_template_directory() );
define( 'THEME_URL', get_template_directory_uri() );
define( 'SITE_URL', get_bloginfo( 'url' ) );
define( 'UA', 'UA-XXXXXXXXX-X' );

require_once get_template_directory() . '/core/theme-setup.php';
require_once get_template_directory() . '/core/theme-enqueue-scripts.php';
require_once get_template_directory() . '/core/theme-cleanup.php';
