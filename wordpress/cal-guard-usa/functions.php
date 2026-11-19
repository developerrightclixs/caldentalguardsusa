<?php
/**
 * Cal Guard USA — theme bootstrap.
 *
 * @package CalGuardUSA
 */

defined( 'ABSPATH' ) || exit;

define( 'CGU_VERSION', '1.0.0' );
define( 'CGU_DIR', get_template_directory() );
define( 'CGU_URI', get_template_directory_uri() );

require_once CGU_DIR . '/inc/setup.php';
require_once CGU_DIR . '/inc/enqueue.php';
require_once CGU_DIR . '/inc/template-tags.php';
require_once CGU_DIR . '/inc/customizer.php';
require_once CGU_DIR . '/inc/elementor.php';
