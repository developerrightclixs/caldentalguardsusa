<?php
/**
 * Template Name: Full Width (no container)
 * Template Post Type: page, post
 *
 * Header and footer stay; the content area gets no theme wrapper at all, so
 * Elementor sections can run edge to edge. This is the template to use for
 * every page rebuilt in Elementor.
 *
 * @package CalGuardUSA
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();
	the_content();
endwhile;

get_footer();
