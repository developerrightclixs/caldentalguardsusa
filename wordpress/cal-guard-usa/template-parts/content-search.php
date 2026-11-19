<?php
/**
 * Post card used in listings.
 *
 * @package CalGuardUSA
 */

defined( 'ABSPATH' ) || exit;
?>
<article <?php post_class( 'post-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="post-card__media" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'medium_large' ); ?>
		</a>
	<?php endif; ?>

	<div class="post-card__body">
		<p class="eyebrow"><?php echo esc_html( get_the_date() ); ?></p>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
		<a class="tlink" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more', 'cal-guard-usa' ); ?></a>
	</div>
</article>
