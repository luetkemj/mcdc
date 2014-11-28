<?php
/* =============================================================================
   EMBED META-BOX PLUGIN BY RILWIS
   ========================================================================== */
// Re-define meta box path and URL
define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/library/includes/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( TEMPLATEPATH . '/library/includes/meta-box' ) );
// For child themes use STYLESHEETPATH below:
// define( 'RWMB_DIR', trailingslashit( STYLESHEETPATH . '/includes/meta-box' ) );
// Include the meta box script
require_once RWMB_DIR . 'meta-box.php';
require_once 'meta-box/metaboxes.php';