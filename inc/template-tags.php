<?php
/**
 * Abandoned Stroller Template Tags
 *
 * @package Gridbox
 * @subpackage Abandoned_Stroller
 * @since 0.1.0
 */

/**
 * Display Post Category
 * Override parent theme `gridbox_meta_category` to display only if categories don't contain (int) 1 (assumed to be Uncategorized)
 * Add `<span class="icon"></span>` before "Contributed"
 *
 * @since 0.1.0
 *
 * @param void
 * @return {string}
 */
function gridbox_meta_category() {
    $categories = wp_get_post_categories( get_the_ID() );

    if( is_array( $categories ) && !in_array( 1, $categories )  ) {
        return '<span class="meta-category"> ' . str_replace( 'Contributed', '<span class="icon"></span> Contributed', get_the_category_list( ', ' ) ) . '</span>';
    }

    return;
} // gridbox_meta_category()

/**
 * Link Archive Thumbnail to Image
 * Override parent theme `gridbox_post_image` so thumbnail links to image instead of post
 *
 * @since 0.1.0
 *
 * @param {string} $size
 * @param {array} $attr
 * @return void
 */
function gridbox_post_image( $size = 'post-thumbnail', $attr = array() ) {

	if ( has_post_thumbnail() ) :

    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );

        if ( ! empty( $large_image_url[0] ) ) : ?>

            <a href="<?php echo esc_url( $large_image_url[0] ); ?>" rel="lightbox">
                <?php the_post_thumbnail( $size, $attr ); ?>
            </a>
        
        <?php endif;

	endif;

} // gridbox_post_image()