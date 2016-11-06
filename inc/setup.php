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
 * Register sidebars
 * @return void
 */
function abandoned_stroller_register_sidebars() {
    register_sidebar( array(
        'name' => __( 'Footer', 'abandoned-stroller' ),
        'id' => 'sidebar-footer',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'abandoned_stroller_register_sidebars' );

/**
 * Enqueue Override
 *
 * @uses wp_enqueue_style()
 * @uses wp_enqueue_scripts hook
 */
function gridbox_parent_theme_enqueue_styles() {
    wp_enqueue_style( 'google-amarante-font', 'https://fonts.googleapis.com/css?family=Amarante' );
    wp_enqueue_style( 'gridbox-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'abandonedstroller-style',
        get_stylesheet_directory_uri() . '/dist/styles/style.min.css',
        array( 'gridbox-style' )
    );
}
add_action( 'wp_enqueue_scripts', 'gridbox_parent_theme_enqueue_styles' );

/**
 * Dequeue Parent Fonts
 *
 * @uses wp_denqueue_style()
 * @uses wp_enqueue_scripts hook
 */
function gridbox_parent_theme_denqueue_styles() {
    wp_dequeue_script( 'gridbox-default-fonts' );
    wp_deregister_style( 'gridbox-default-fonts' );
}
add_action( 'wp_enqueue_scripts', 'gridbox_parent_theme_denqueue_styles', 20 );

