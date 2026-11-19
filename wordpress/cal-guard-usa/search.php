<?php
/**
 * Search results.
 *
 * @package CalGuardUSA
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<section class="page-hero">
	<div class="wrap wrap--narrow">
		<p class="eyebrow"><?php esc_html_e( 'Search results', 'cal-guard-usa' ); ?></p>
		<h1><?php echo esc_html( get_search_query() ); ?></h1>
	</div>
</section>

<section class="section">
	<div class="wrap">
		<?php if ( have_posts() ) : ?>
			<div class="post-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'search' );
				endwhile;
				?>
			</div>
			<?php cgu_pagination(); ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
