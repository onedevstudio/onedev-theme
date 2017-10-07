<?php

/**
 * Load site scripts.
 *
 * @since 1.0.0
 */

function theme_enqueue_scripts() {
    $template_url = get_template_directory_uri();
    $min = (THEME_ENV === 'production') ? '.min' : '';

    wp_enqueue_style( 'theme-main-style', get_stylesheet_uri(), array(), null, 'all' );

    if (!is_admin()) {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', "{$template_url}/assets/javascripts/vendor/jquery{$min}.js", false, null );
        wp_enqueue_script( 'jquery' );
    }

    wp_enqueue_script( 'theme-main-script', "{$template_url}/assets/javascripts/main{$min}.js", array(), null, true );

    // Load Thread comments WordPress script.
    if ( is_singular() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts', 1 );

/**
 * Theme custom stylesheet URI.
 *
 * @since  1.0.0
 *
 * @param  string $uri Default URI.
 * @param  string $dir Stylesheet directory URI.
 *
 * @return string New URI.
 */
function theme_stylesheet_uri( $uri, $dir ) {
    $min = (THEME_ENV === 'production') ? '.min' : '';
    return "{$dir}/assets/stylesheets/main{$min}.css";
}

add_filter( 'stylesheet_uri', 'theme_stylesheet_uri', 10, 2 );
