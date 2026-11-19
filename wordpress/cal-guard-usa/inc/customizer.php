<?php
/**
 * Customizer — the chrome the client needs to edit without touching code:
 * the utility bar, phone, email and header CTA.
 *
 * @package CalGuardUSA
 */

defined( 'ABSPATH' ) || exit;

/**
 * Theme defaults, in one place so templates and the Customizer agree.
 *
 * @return array
 */
function cgu_defaults() {
	return array(
		'cgu_phone'         => '(800) 963-5553',
		'cgu_email'         => 'Ian@caldentalusa.com',
		'cgu_location'      => 'California, USA',
		'cgu_topbar_left'   => 'Custom-fit, dental-lab crafted',
		'cgu_topbar_mid'    => 'Fitted through certified providers',
		'cgu_topbar_right'  => 'Perfect-fit guarantee',
		'cgu_cta_label'     => 'Get Fitted',
		'cgu_cta_url'       => '',
		'cgu_footer_blurb'  => 'Custom mouthguards engineered for protection, performance and a precise fit.',
		'cgu_show_topbar'   => true,
	);
}

/**
 * Get a theme option, falling back to the default.
 *
 * @param string $key Option key.
 * @return mixed
 */
function cgu_opt( $key ) {
	$defaults = cgu_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';

	return get_theme_mod( $key, $default );
}

/**
 * Register Customizer controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer instance.
 */
function cgu_customize_register( $wp_customize ) {

	$wp_customize->add_section(
		'cgu_brand',
		array(
			'title'       => __( 'Cal Guard — Contact & Top Bar', 'cal-guard-usa' ),
			'priority'    => 25,
			'description' => __( 'Used in the utility bar, header and footer across the whole site.', 'cal-guard-usa' ),
		)
	);

	$text_fields = array(
		'cgu_phone'        => __( 'Phone number', 'cal-guard-usa' ),
		'cgu_email'        => __( 'Email address', 'cal-guard-usa' ),
		'cgu_location'     => __( 'Location line', 'cal-guard-usa' ),
		'cgu_topbar_left'  => __( 'Top bar — first chip', 'cal-guard-usa' ),
		'cgu_topbar_mid'   => __( 'Top bar — second chip', 'cal-guard-usa' ),
		'cgu_topbar_right' => __( 'Top bar — right chip', 'cal-guard-usa' ),
		'cgu_cta_label'    => __( 'Header button label', 'cal-guard-usa' ),
		'cgu_footer_blurb' => __( 'Footer blurb', 'cal-guard-usa' ),
	);

	$defaults = cgu_defaults();

	foreach ( $text_fields as $key => $label ) {
		$wp_customize->add_setting(
			$key,
			array(
				'default'           => $defaults[ $key ],
				'sanitize_callback' => 'wp_kses_post',
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			$key,
			array(
				'label'   => $label,
				'section' => 'cgu_brand',
				'type'    => ( 'cgu_footer_blurb' === $key ) ? 'textarea' : 'text',
			)
		);
	}

	$wp_customize->add_setting(
		'cgu_cta_url',
		array(
			'default'           => $defaults['cgu_cta_url'],
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'cgu_cta_url',
		array(
			'label'       => __( 'Header button link', 'cal-guard-usa' ),
			'description' => __( 'Leave blank to link to the page titled "Find a Provider".', 'cal-guard-usa' ),
			'section'     => 'cgu_brand',
			'type'        => 'url',
		)
	);

	$wp_customize->add_setting(
		'cgu_show_topbar',
		array(
			'default'           => true,
			'sanitize_callback' => 'cgu_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'cgu_show_topbar',
		array(
			'label'   => __( 'Show the navy utility bar', 'cal-guard-usa' ),
			'section' => 'cgu_brand',
			'type'    => 'checkbox',
		)
	);
}
add_action( 'customize_register', 'cgu_customize_register' );

/**
 * Checkbox sanitiser.
 *
 * @param mixed $value Raw value.
 * @return bool
 */
function cgu_sanitize_checkbox( $value ) {
	return (bool) $value;
}
