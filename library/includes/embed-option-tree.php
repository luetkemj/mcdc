<?php
/* =============================================================================
   EMBED OPTION TREE
   ========================================================================== */
/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_true' );
add_filter( 'ot_theme_mode', '__return_true' );
// Re-define Option Tree path and URL
define( 'OT_DIR', trailingslashit( get_template_directory() . '/library/includes/option-tree' ) );
define( 'OT_URL', trailingslashit( get_template_directory_uri() . '/library/includes/option-tree' ) );
require_once( 'option-tree/ot-loader.php' );