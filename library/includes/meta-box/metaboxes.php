<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'vcuarts_';

global $meta_boxes;

$meta_boxes = array();

// 1st meta box
$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'standard',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Standard Fields', 'rwmb' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'custom_type_people' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	// List of meta fields
	'fields' => array(
			
		array(
			'name' => __( 'CV', 'rwmb' ),
			'id'   => "{$prefix}wysiwyg_cv",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => false,
			'std'  => __( '', 'rwmb' ),

			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
		array(
			'name' => __( 'Publications', 'rwmb' ),
			'id'   => "{$prefix}wysiwyg_publications",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => false,
			'std'  => __( '', 'rwmb' ),

			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
		array(
			'name' => __( 'Press', 'rwmb' ),
			'id'   => "{$prefix}wysiwyg_press",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => false,
			'std'  => __( '', 'rwmb' ),

			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
		array(
			'name' => __( 'Video and Podcasts', 'rwmb' ),
			'id'   => "{$prefix}wysiwyg_media",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => false,
			'std'  => __( '', 'rwmb' ),

			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
				'quicktags' => false
			),
		),
		array(
			'name' => __( 'Talks', 'rwmb' ),
			'id'   => "{$prefix}wysiwyg_talks",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => false,
			'std'  => __( '', 'rwmb' ),

			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
		array(
			'name' => __( 'Testimonials', 'rwmb' ),
			'id'   => "{$prefix}wysiwyg_testimonials",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => false,
			'std'  => __( '', 'rwmb' ),

			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
	)
);


/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function vcuarts_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'vcuarts_register_meta_boxes' );
