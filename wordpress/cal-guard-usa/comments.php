<?php
/**
 * Comments.
 *
 * @package CalGuardUSA
 */

defined( 'ABSPATH' ) || exit;

if ( post_password_required() ) {
	return;
}
?>
<section class="section section--tight">
	<div class="wrap wrap--narrow comments">

		<?php if ( have_comments() ) : ?>
			<h2 class="comments__title">
				<?php
				printf(
					/* translators: %s: comment count */
					esc_html( _n( '%s comment', '%s comments', get_comments_number(), 'cal-guard-usa' ) ),
					esc_html( number_format_i18n( get_comments_number() ) )
				);
				?>
			</h2>

			<ol class="comment-list">
				<?php
				wp_list_comments(
					array(
						'style'      => 'ol',
						'short_ping' => true,
						'avatar_size' => 48,
					)
				);
				?>
			</ol>

			<?php the_comments_pagination(); ?>
		<?php endif; ?>

		<?php
		comment_form(
			array(
				'class_submit'  => 'btn',
				'title_reply'   => esc_html__( 'Leave a comment', 'cal-guard-usa' ),
				'comment_field' => '<div class="field"><label for="comment">' . esc_html__( 'Comment', 'cal-guard-usa' ) . '</label><textarea id="comment" name="comment" required></textarea></div>',
			)
		);
		?>

	</div>
</section>
