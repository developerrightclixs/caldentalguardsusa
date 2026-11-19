<?php
/**
 * Search form.
 *
 * @package CalGuardUSA
 */

defined( 'ABSPATH' ) || exit;
?>
<form role="search" method="get" class="form search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="field">
		<label class="screen-reader-text" for="cgu-s"><?php esc_html_e( 'Search for:', 'cal-guard-usa' ); ?></label>
		<input type="search" id="cgu-s" name="s" value="<?php echo esc_attr( get_search_query() ); ?>"
			placeholder="<?php esc_attr_e( 'Search…', 'cal-guard-usa' ); ?>">
	</div>
	<button type="submit" class="btn btn--block"><?php esc_html_e( 'Search', 'cal-guard-usa' ); ?></button>
</form>
