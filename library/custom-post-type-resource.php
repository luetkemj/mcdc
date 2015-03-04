<?php
/* Bones Resource Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

// // Flush your rewrite rules
function bones_flush_rewrite_rules_resource() {
	flush_rewrite_rules();
}

// let's create the function for the custom type
function custom_post_resource() { 
	// creating (registering) the custom type 
	register_post_type( 'resource', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Resources', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Resource', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Resources', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Resource', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Resources', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Resource', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Resource', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Resources', 'bonestheme' ), /* Search Resource Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the Resource type', 'bonestheme' ), /* Resource Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'resource', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'resource', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'revisions')
		) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type( 'category', 'resource' );
	/* this adds your post tags to your custom post type */
	// register_taxonomy_for_object_type( 'post_tag', 'resource' );
	
}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_resource');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
	register_taxonomy( 'module', 
		array('resource'), /* if you change the name of register_post_type( 'resource', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Modules', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Module', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Modules', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Modules', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Module', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Module:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Module', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Module', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Module', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Module Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'module' ),
		)
	);
	
?>
