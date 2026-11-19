<?php
/**
 * Template helpers.
 *
 * @package CalGuardUSA
 */

defined( 'ABSPATH' ) || exit;

/**
 * Site logo — custom logo if set, otherwise the bundled Cal Guard badge.
 */
function cgu_logo() {
	if ( has_custom_logo() ) {
		the_custom_logo();
		return;
	}
	?>
	<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img class="logo__img"
			src="<?php echo esc_url( CGU_URI . '/assets/img/logo-mark.png' ); ?>"
			alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
			width="400" height="320">
	</a>
	<?php
}

/**
 * Resolve the header CTA destination.
 *
 * @return string
 */
function cgu_cta_url() {
	$url = cgu_opt( 'cgu_cta_url' );

	if ( $url ) {
		return $url;
	}

	$page = get_page_by_title( 'Find a Provider' );

	if ( $page ) {
		return get_permalink( $page );
	}

	return home_url( '/' );
}

/**
 * Strip a phone number down to a tel: href.
 *
 * @param string $phone Display number.
 * @return string
 */
function cgu_tel( $phone ) {
	$digits = preg_replace( '/[^0-9+]/', '', (string) $phone );

	if ( '' === $digits ) {
		return '';
	}

	if ( '+' !== substr( $digits, 0, 1 ) && 10 === strlen( $digits ) ) {
		$digits = '+1' . $digits;
	}

	return 'tel:' . $digits;
}

/**
 * Inline icon set, so the markup doesn't depend on an icon font or plugin.
 *
 * @param string $name Icon slug.
 * @return string Inline SVG.
 */
function cgu_icon( $name ) {
	$open  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">';
	$close = '</svg>';

	$paths = array(
		'phone' => '<path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.2a2 2 0 0 1 2.1-.5c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2Z"/>',
		'mail'  => '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/>',
		'pin'   => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
		'check' => '<path d="M20 6 9 17l-5-5"/>',
	);

	if ( ! isset( $paths[ $name ] ) ) {
		return '';
	}

	return $open . $paths[ $name ] . $close;
}

/**
 * Allow-list for the inline SVG above when echoed through wp_kses.
 *
 * @return array
 */
function cgu_svg_allowed() {
	return array(
		'svg'    => array(
			'viewbox'          => true,
			'fill'             => true,
			'stroke'           => true,
			'stroke-width'     => true,
			'stroke-linecap'   => true,
			'stroke-linejoin'  => true,
			'aria-hidden'      => true,
			'focusable'        => true,
			'class'            => true,
		),
		'path'   => array( 'd' => true, 'fill' => true, 'class' => true ),
		'rect'   => array( 'x' => true, 'y' => true, 'width' => true, 'height' => true, 'rx' => true ),
		'circle' => array( 'cx' => true, 'cy' => true, 'r' => true, 'fill' => true ),
	);
}

/**
 * Post meta line for blog listings.
 */
function cgu_entry_meta() {
	printf(
		'<p class="entry__meta"><time datetime="%1$s">%2$s</time> &nbsp;·&nbsp; %3$s</p>',
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() ),
		esc_html( get_the_author() )
	);
}

/**
 * Pagination styled to the theme.
 */
function cgu_pagination() {
	the_posts_pagination(
		array(
			'mid_size'  => 1,
			'prev_text' => esc_html__( 'Previous', 'cal-guard-usa' ),
			'next_text' => esc_html__( 'Next', 'cal-guard-usa' ),
		)
	);
}
