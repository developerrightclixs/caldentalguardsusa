<?php
/**
 * Default site header — used when Elementor Theme Builder has no header
 * template for this page.
 *
 * @package CalGuardUSA
 */

defined( 'ABSPATH' ) || exit;

$cgu_phone = cgu_opt( 'cgu_phone' );
$cgu_tel   = cgu_tel( $cgu_phone );
?>

<?php if ( cgu_opt( 'cgu_show_topbar' ) ) : ?>
<div class="topbar">
	<div class="wrap topbar__inner">
		<ul class="topbar__chips">
			<?php if ( cgu_opt( 'cgu_topbar_left' ) ) : ?>
				<li><span class="dot"></span><?php echo wp_kses_post( cgu_opt( 'cgu_topbar_left' ) ); ?></li>
			<?php endif; ?>
			<?php if ( cgu_opt( 'cgu_topbar_mid' ) ) : ?>
				<li><?php echo wp_kses( cgu_icon( 'pin' ), cgu_svg_allowed() ); ?><?php echo wp_kses_post( cgu_opt( 'cgu_topbar_mid' ) ); ?></li>
			<?php endif; ?>
		</ul>

		<ul class="topbar__chips topbar__chips--right">
			<?php if ( cgu_opt( 'cgu_topbar_right' ) ) : ?>
				<li><?php echo wp_kses( cgu_icon( 'check' ), cgu_svg_allowed() ); ?><?php echo wp_kses_post( cgu_opt( 'cgu_topbar_right' ) ); ?></li>
			<?php endif; ?>
			<?php if ( $cgu_phone ) : ?>
				<li>
					<a href="<?php echo esc_url( $cgu_tel ); ?>">
						<?php echo wp_kses( cgu_icon( 'phone' ), cgu_svg_allowed() ); ?><?php echo esc_html( $cgu_phone ); ?>
					</a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
</div>
<?php endif; ?>

<header class="site-header">
	<div class="wrap nav">

		<?php cgu_logo(); ?>

		<button class="nav__toggle" aria-expanded="false" aria-controls="primary-nav" aria-label="<?php esc_attr_e( 'Toggle menu', 'cal-guard-usa' ); ?>">
			<span></span><span></span><span></span>
		</button>

		<?php
		if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => 'nav',
					'container_class' => 'nav__links',
					'container_id'   => 'primary-nav',
					'menu_class'     => 'nav__menu',
					'depth'          => 2,
					'fallback_cb'    => false,
				)
			);
		} else {
			?>
			<nav class="nav__links" id="primary-nav">
				<?php
				wp_list_pages(
					array(
						'title_li' => '',
						'depth'    => 1,
						'number'   => 6,
					)
				);
				?>
			</nav>
			<?php
		}
		?>

		<div class="nav__cta">
			<?php if ( $cgu_phone ) : ?>
				<a class="nav__phone" href="<?php echo esc_url( $cgu_tel ); ?>">
					<?php echo wp_kses( cgu_icon( 'phone' ), cgu_svg_allowed() ); ?><?php echo esc_html( $cgu_phone ); ?>
				</a>
			<?php endif; ?>

			<?php if ( cgu_opt( 'cgu_cta_label' ) ) : ?>
				<a class="btn" href="<?php echo esc_url( cgu_cta_url() ); ?>">
					<?php echo esc_html( cgu_opt( 'cgu_cta_label' ) ); ?>
				</a>
			<?php endif; ?>
		</div>

	</div>
</header>
