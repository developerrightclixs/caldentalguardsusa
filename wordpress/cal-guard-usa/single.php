<?php
/**
 * Single post.
 *
 * @package CalGuardUSA
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	if ( cgu_is_elementor_page() ) {
		the_content();
	} else {
		?>
		<article <?php post_class( 'section' ); ?>>
			<div class="wrap wrap--narrow">
				<header class="section-head">
					<p class="eyebrow"><?php echo esc_html( get_the_date() ); ?></p>
					<h1><?php the_title(); ?></h1>
					<?php cgu_entry_meta(); ?>
				</header>

				<?php if ( has_post_thumbnail() ) : ?>
					<figure class="entry__thumb"><?php the_post_thumbnail( 'large' ); ?></figure>
				<?php endif; ?>

				<div class="entry__content">
					<?php
					the_content();
					wp_link_pages(
						array(
							'before' => '<div class="page-links">',
							'after'  => '</div>',
						)
					);
					?>
				</div>
			</div>
		</article>
		<?php
	}

	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

endwhile;

get_footer();
