<?php
/**
 * Elementor integration.
 *
 * Two things matter for a theme to be genuinely "Elementor friendly":
 *
 * 1. Register Theme Builder locations, so Elementor Pro can take over the
 *    header, footer, single and archive without the theme fighting it.
 * 2. Get out of the way. The theme must not impose its own container width or
 *    padding on content that Elementor is laying out — otherwise every section
 *    the client builds is boxed inside the theme's wrapper.
 *
 * @package CalGuardUSA
 */

defined( 'ABSPATH' ) || exit;

/**
 * Is Elementor active?
 *
 * @return bool
 */
function cgu_elementor_active() {
	return did_action( 'elementor/loaded' ) > 0;
}

/**
 * Is Elementor Pro (and therefore Theme Builder) active?
 *
 * @return bool
 */
function cgu_elementor_pro_active() {
	return defined( 'ELEMENTOR_PRO_VERSION' );
}

/**
 * Was this page built with Elementor?
 *
 * @param int|null $post_id Optional post ID.
 * @return bool
 */
function cgu_is_elementor_page( $post_id = null ) {
	if ( ! cgu_elementor_active() ) {
		return false;
	}

	$post_id = $post_id ? $post_id : get_the_ID();

	if ( ! $post_id ) {
		return false;
	}

	$documents = \Elementor\Plugin::$instance->documents;

	if ( ! $documents ) {
		return false;
	}

	$document = $documents->get( $post_id );

	return $document && $document->is_built_with_elementor();
}

/**
 * Register Theme Builder locations.
 *
 * Without this, Elementor Pro shows "your theme does not have support for
 * Theme Builder" and header/footer templates silently do nothing.
 *
 * @param \ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $manager Location manager.
 */
function cgu_register_elementor_locations( $manager ) {
	$manager->register_all_core_location();
}
add_action( 'elementor/theme/register_locations', 'cgu_register_elementor_locations' );

/**
 * Declare support for Elementor's own feature flags.
 */
function cgu_elementor_theme_support() {
	add_theme_support( 'elementor' );
	// Opt into Elementor's optimised DOM output rather than the legacy markup.
	add_theme_support( 'elementor-default-fonts' );
	add_theme_support( 'elementor-default-colors' );
}
add_action( 'after_setup_theme', 'cgu_elementor_theme_support' );

/**
 * Render an Elementor Theme Builder location, or fall back to the theme's own
 * template part.
 *
 * @param string $location  Elementor location slug (header/footer).
 * @param string $fallback  Template part slug to use when no location exists.
 * @return void
 */
function cgu_do_location( $location, $fallback ) {
	if ( cgu_elementor_pro_active() && function_exists( 'elementor_theme_do_location' ) ) {
		// Returns true when a Theme Builder template handled it.
		if ( elementor_theme_do_location( $location ) ) {
			return;
		}
	}

	get_template_part( 'template-parts/' . $fallback );
}

/**
 * Elementor's editor needs to know which selector wraps post content so
 * "Edit with Elementor" previews match the front end.
 *
 * @param array $settings Editor settings.
 * @return array
 */
function cgu_elementor_editor_settings( $settings ) {
	$settings['cgu_version'] = CGU_VERSION;
	return $settings;
}
add_filter( 'elementor/editor/localize_settings', 'cgu_elementor_editor_settings' );

/**
 * Admin notice if Elementor isn't installed — this theme is built around it.
 */
function cgu_elementor_missing_notice() {
	if ( cgu_elementor_active() || ! current_user_can( 'activate_plugins' ) ) {
		return;
	}

	$screen = get_current_screen();

	if ( $screen && 'themes' !== $screen->id && 'dashboard' !== $screen->id ) {
		return;
	}

	printf(
		'<div class="notice notice-warning"><p>%s</p></div>',
		esc_html__( 'The Cal Guard USA theme is designed to be edited with Elementor. The theme works without it, but page building will be limited to the block editor.', 'cal-guard-usa' )
	);
}
add_action( 'admin_notices', 'cgu_elementor_missing_notice' );
