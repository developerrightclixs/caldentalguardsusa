<?php
/**
 * 404.
 *
 * @package CalGuardUSA
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<section class="section cta">
	<div class="wrap wrap--narrow">
		<p class="eyebrow"><?php esc_html_e( 'Error 404', 'cal-guard-usa' ); ?></p>
		<h1><?php esc_html_e( 'That page took a hit', 'cal-guard-usa' ); ?></h1>
		<p class="lede center"><?php esc_html_e( 'The page you were after has moved or never existed. Try the search below, or head back to the home page.', 'cal-guard-usa' ); ?></p>

		<div style="max-width:420px;margin:1.75rem auto 0">
			<?php get_search_form(); ?>
		</div>

		<div class="btn-row">
			<a class="btn btn--lg" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php esc_html_e( 'Back to Home', 'cal-guard-usa' ); ?>
			</a>
		</div>
	</div>
</section>

<?php
get_footer();
