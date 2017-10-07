<?php

if ( ! function_exists( 'theme_setup' ) ) {

    /**
     * Setup theme features.
     *
     * @since 2.2.0
     */
    function theme_setup() {

        /**
         * Add support for multiple languages.
         */
        load_theme_textdomain( THEME_FX, get_template_directory() . '/languages' );

        /**
         * Register nav menus.
         */
        register_nav_menus(
            array(
                'main-menu' => __( 'Main Menu', THEME_FX )
            )
        );

        /*
         * Add post_thumbnails suport.
         */
        add_theme_support( 'post-thumbnails' );

        /**
         * Add feed link.
         */
        add_theme_support( 'automatic-feed-links' );

        /**
         * Support Custom Editor Style.
         */
        add_editor_style( 'assets/stylesheets/editor-style.css' );

        /**
         * Support The Excerpt on pages.
         */
        add_post_type_support( 'page', 'excerpt' );

        /**
         * Switch default core markup for search form, comment form, and comments to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption'
            )
        );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );
    }
}

add_action( 'after_setup_theme', 'theme_setup' );
