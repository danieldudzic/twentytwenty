<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package twentytwenty
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function twentytwenty_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',

		'posts_per_page' => 2,
		'render'    => false,
		'wrapper'	=> false,
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Content Options.
	add_theme_support( 'jetpack-content-options', array(
		'post-details'    => array(
			'stylesheet' => 'twentytwenty-style',
			'date'       => '.post-date',
			'categories' => '.entry-categories',
			'tags'       => '.post-tags',
			'author'     => '.post-author',
		),
		'featured-images' => array(
			'archive'          => true,
			'post'             => true,
			'page'             => true,
			'fallback'         => false
		),
	) );

	// Social Menu
	add_theme_support( 'jetpack-social-menu', 'svg' );
}
add_action( 'after_setup_theme', 'twentytwenty_jetpack_setup' );

/**
 * Social menu
 */
function twentytwenty_social_menu() {
	if ( ! function_exists( 'jetpack_social_menu' ) ) {
		return;
	} else {
		jetpack_social_menu();
	}
}

/**
 * Custom function to check for a post thumbnail;
 * If Jetpack is not available, fall back to has_post_thumbnail()
 */
function twentytwenty_has_post_thumbnail( $post = null ) {
	if ( function_exists( 'jetpack_has_featured_image' ) ) {
		return jetpack_has_featured_image( $post );
	} else {
		return has_post_thumbnail( $post );
	}
}
