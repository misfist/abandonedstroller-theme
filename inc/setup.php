<?php
/**
 * Abandoned Stroller Template Tags
 *
 * @package Gridbox
 * @subpackage Abandoned_Stroller
 * @since 0.1.0
 */

/**
 * Set up Function
 *
 * @uses load_theme_textdomain()
 * @uses after_setup_theme hook
 */
function abandoned_stroller_setup() {
    load_theme_textdomain( 'abandoned-stroller', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'abandoned_stroller_setup' );

/**
 * Enqueue Override
 *
 * @uses wp_enqueue_style()
 * @uses wp_enqueue_scripts hook
 */
function gridbox_parent_theme_enqueue_styles() {
    wp_enqueue_style( 'gridbox-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'abandonedstroller-style',
        get_stylesheet_directory_uri() . '/dist/styles/style.min.css',
        array( 'gridbox-style' )
    );
    wp_enqueue_style( 'google-amarante-font', 'https://fonts.googleapis.com/css?family=Amarante' );
}
add_action( 'wp_enqueue_scripts', 'gridbox_parent_theme_enqueue_styles' );