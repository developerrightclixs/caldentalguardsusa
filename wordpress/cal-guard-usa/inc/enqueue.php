<?php
/**
 * Styles and scripts.
 *
 * @package CalGuardUSA
 */

defined( 'ABSPATH' ) || exit;

/**
 * Front-end assets.
 */
function cgu_enqueue_assets() {
	// Google Fonts. Filterable so the client can switch to Elementor's own
	// font manager (or self-hosted fonts) without editing the theme.
	if ( apply_filters( 'cgu_load_google_fonts', true ) ) {
		wp_enqueue_style(
			'cgu-fonts',
			'https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400..900;1,400..900&family=Manrope:wght@200..800&display=swap',
			array(),
			null // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion -- Google serves its own cache headers.
		);
	}

	wp_enqueue_style(
		'cgu-theme',
		CGU_URI . '/assets/css/theme.css',
		array(),
		CGU_VERSION
	);

	// style.css holds only the theme header, but WordPress.org and several
	// plugins expect it present in the queue.
	wp_enqueue_style( 'cgu-style', get_stylesheet_uri(), array( 'cgu-theme' ), CGU_VERSION );

	wp_enqueue_script(
		'cgu-main',
		CGU_URI . '/assets/js/main.js',
		array(),
		CGU_VERSION,
		true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cgu_enqueue_assets' );

/**
 * Preconnect to the font CDN so the first paint isn't waiting on DNS.
 *
 * @param array  $urls           Existing hints.
 * @param string $relation_type  Hint type.
 * @return array
 */
function cgu_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type && apply_filters( 'cgu_load_google_fonts', true ) ) {
		$urls[] = array( 'href' => 'https://fonts.googleapis.com' );
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'cgu_resource_hints', 10, 2 );

/**
 * Give the block editor the same type and colour as the front end.
 */
function cgu_editor_assets() {
	add_editor_style( 'assets/css/theme.css' );
}
add_action( 'after_setup_theme', 'cgu_editor_assets' );
