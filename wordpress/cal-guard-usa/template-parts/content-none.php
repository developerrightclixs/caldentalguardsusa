<?php
/**
 * Empty state.
 *
 * @package CalGuardUSA
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="center">
	<h2><?php esc_html_e( 'Nothing here yet', 'cal-guard-usa' ); ?></h2>
	<p class="lede"><?php esc_html_e( 'No posts matched. Try a different search.', 'cal-guard-usa' ); ?></p>
	<div style="max-width:420px;margin:1.5rem auto 0"><?php get_search_form(); ?></div>
</div>
