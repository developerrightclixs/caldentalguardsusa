<?php
/**
 * Theme supports, menus and image sizes.
 *
 * @package CalGuardUSA
 */

defined( 'ABSPATH' ) || exit;

/**
 * Core theme setup.
 */
function cgu_setup() {
	load_theme_textdomain( 'cal-guard-usa', CGU_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' )
	);

	// The badge is a tall shield, so give it room rather than a wide strip.
	add_theme_support(
		'custom-logo',
		array(
			'height'               => 320,
			'width'                => 400,
			'flex-height'          => true,
			'flex-width'           => true,
			'unlink-homepage-logo' => false,
		)
	);

	register_nav_menus(
		array(
			'primary'        => __( 'Primary (header)', 'cal-guard-usa' ),
			'footer_explore' => __( 'Footer — Explore', 'cal-guard-usa' ),
			'footer_legal'   => __( 'Footer — Legal', 'cal-guard-usa' ),
		)
	);

	// Elementor uses this to decide the content width of its default container.
	if ( ! isset( $GLOBALS['content_width'] ) ) {
		$GLOBALS['content_width'] = 1280;
	}
}
add_action( 'after_setup_theme', 'cgu_setup' );

/**
 * Widget areas. Kept minimal — Elementor handles most layout.
 */
function cgu_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'cal-guard-usa' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Shown on blog archives and single posts.', 'cal-guard-usa' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget__title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'cgu_widgets_init' );

/**
 * Body classes that the stylesheet hooks onto.
 *
 * @param array $classes Existing classes.
 * @return array
 */
function cgu_body_classes( $classes ) {
	if ( ! is_singular() ) {
		$classes[] = 'cgu-archive';
	}

	if ( is_page_template( 'page-templates/canvas.php' ) ) {
		$classes[] = 'cgu-canvas';
	}

	if ( cgu_is_elementor_page() ) {
		$classes[] = 'cgu-elementor-page';
	}

	return $classes;
}
add_filter( 'body_class', 'cgu_body_classes' );

/**
 * Let the client paste the client's own SVG/PNG logo without WP stripping it.
 *
 * @param array $mimes Allowed types.
 * @return array
 */
function cgu_allow_svg_upload( $mimes ) {
	if ( current_user_can( 'manage_options' ) ) {
		$mimes['svg'] = 'image/svg+xml';
	}
	return $mimes;
}
add_filter( 'upload_mimes', 'cgu_allow_svg_upload' );
