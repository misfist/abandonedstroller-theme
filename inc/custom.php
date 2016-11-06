<?php
/**
 * Abandoned Stroller Custom Functions
 *
 * @package Gridbox
 * @subpackage Abandoned_Stroller
 * @since 0.1.0
 */


/**
 * Remove Parent Theme Footer Action
 */
function abandoned_stroller_footer_override() {
    remove_action( 'gridbox_footer_text', 'gridbox_footer_text' );
}
add_action( 'wp_head', 'abandoned_stroller_footer_override' );
