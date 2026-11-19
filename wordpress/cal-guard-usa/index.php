<?php
/**
 * Fallback template — blog index and any query without a more specific file.
 *
 * @package CalGuardUSA
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<section class="section">
	<div class="wrap">

		<?php if ( is_home() && ! is_front_page() ) : ?>
			<header class="section-head">
				<h1><?php single_post_title(); ?></h1>
			</header>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>
			<div class="post-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', get_post_type() );
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
