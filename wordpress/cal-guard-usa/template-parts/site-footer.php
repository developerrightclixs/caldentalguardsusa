<?php
/**
 * Default site footer — used when Elementor Theme Builder has no footer
 * template for this page.
 *
 * @package CalGuardUSA
 */

defined( 'ABSPATH' ) || exit;

$cgu_phone = cgu_opt( 'cgu_phone' );
$cgu_email = cgu_opt( 'cgu_email' );
?>
<footer class="site-footer">
	<div class="wrap">
		<div class="footer__grid footer">

			<div class="footer__about">
				<?php cgu_logo(); ?>
				<?php if ( cgu_opt( 'cgu_footer_blurb' ) ) : ?>
					<p><?php echo wp_kses_post( cgu_opt( 'cgu_footer_blurb' ) ); ?></p>
				<?php endif; ?>
			</div>

			<div>
				<h4><?php esc_html_e( 'Explore', 'cal-guard-usa' ); ?></h4>
				<?php
				if ( has_nav_menu( 'footer_explore' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'footer_explore',
							'container'      => false,
							'depth'          => 1,
							'fallback_cb'    => false,
						)
					);
				}
				?>
			</div>

			<div>
				<h4><?php esc_html_e( 'Legal', 'cal-guard-usa' ); ?></h4>
				<?php
				if ( has_nav_menu( 'footer_legal' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'footer_legal',
							'container'      => false,
							'depth'          => 1,
							'fallback_cb'    => false,
						)
					);
				}
				?>
			</div>

			<div>
				<h4><?php esc_html_e( 'Contact Us', 'cal-guard-usa' ); ?></h4>
				<ul class="footer__contact">
					<?php if ( $cgu_email ) : ?>
						<li>
							<?php echo wp_kses( cgu_icon( 'mail' ), cgu_svg_allowed() ); ?>
							<a href="mailto:<?php echo esc_attr( $cgu_email ); ?>"><?php echo esc_html( $cgu_email ); ?></a>
						</li>
					<?php endif; ?>

					<?php if ( $cgu_phone ) : ?>
						<li>
							<?php echo wp_kses( cgu_icon( 'phone' ), cgu_svg_allowed() ); ?>
							<a href="<?php echo esc_url( cgu_tel( $cgu_phone ) ); ?>"><?php echo esc_html( $cgu_phone ); ?></a>
						</li>
					<?php endif; ?>

					<?php if ( cgu_opt( 'cgu_location' ) ) : ?>
						<li>
							<?php echo wp_kses( cgu_icon( 'pin' ), cgu_svg_allowed() ); ?>
							<span><?php echo esc_html( cgu_opt( 'cgu_location' ) ); ?></span>
						</li>
					<?php endif; ?>
				</ul>
			</div>

		</div>

		<div class="footer__bottom">
			<p>
				<?php
				printf(
					/* translators: 1: year, 2: site name */
					esc_html__( '© %1$s %2$s. All rights reserved.', 'cal-guard-usa' ),
					esc_html( gmdate( 'Y' ) ),
					esc_html( get_bloginfo( 'name' ) )
				);
				?>
			</p>
			<?php
			if ( has_nav_menu( 'footer_legal' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'footer_legal',
						'container'      => 'nav',
						'depth'          => 1,
						'fallback_cb'    => false,
					)
				);
			}
			?>
		</div>
	</div>
</footer>
