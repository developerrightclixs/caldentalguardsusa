<?php
/**
 * Default page template.
 *
 * When the page is built with Elementor the content is echoed bare, with no
 * theme wrapper — otherwise every Elementor section would be boxed inside the
 * theme's container and full-width sections could not reach the edges.
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
					<h1><?php the_title(); ?></h1>
				</header>

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
