<?php
/* Bones Maker Type Example
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

// Flush your rewrite rules
function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the custom type
function custom_post_maker() { 
	// creating (registering) the custom type 
	register_post_type( 'custom_type_maker', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Makers', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Maker', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Makers', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Maker', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Makers', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Maker', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Maker', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Makers', 'bonestheme' ), /* Search Maker Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the Maker type', 'bonestheme' ), /* Maker Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'maker', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'custom_type_maker', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'revisions')
		) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type( 'category', 'custom_type_maker' );
	/* this adds your post tags to your custom post type */
	// register_taxonomy_for_object_type( 'post_tag', 'custom_type_maker' );
	
}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_maker');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
	// register_taxonomy( 'custom_cat', 
	// 	array('custom_type_maker'), /* if you change the name of register_post_type( 'custom_type_maker', then you have to change this */
	// 	array('hierarchical' => true,     /* if this is true, it acts like categories */
	// 		'labels' => array(
	// 			'name' => __( 'Maker Categories', 'bonestheme' ), /* name of the custom taxonomy */
	// 			'singular_name' => __( 'Maker Category', 'bonestheme' ), /* single taxonomy name */
	// 			'search_items' =>  __( 'Search Maker Categories', 'bonestheme' ), /* search title for taxomony */
	// 			'all_items' => __( 'All Maker Categories', 'bonestheme' ), /* all title for taxonomies */
	// 			'parent_item' => __( 'Parent Maker Category', 'bonestheme' ), /* parent title for taxonomy */
	// 			'parent_item_colon' => __( 'Parent Maker Category:', 'bonestheme' ), /* parent taxonomy title */
	// 			'edit_item' => __( 'Edit Maker Category', 'bonestheme' ), /* edit custom taxonomy title */
	// 			'update_item' => __( 'Update Maker Category', 'bonestheme' ), /* update title for taxonomy */
	// 			'add_new_item' => __( 'Add New Maker Category', 'bonestheme' ), /* add new title for taxonomy */
	// 			'new_item_name' => __( 'New Maker Category Name', 'bonestheme' ) /* name title for taxonomy */
	// 		),
	// 		'show_admin_column' => true, 
	// 		'show_ui' => true,
	// 		'query_var' => true,
	// 		'rewrite' => array( 'slug' => 'custom-slug' ),
	// 	)
	// );
	
	// now let's add custom tags (these act like categories)
	// register_taxonomy( 'custom_tag', 
	// 	array('custom_type_maker'), /* if you change the name of register_post_type( 'custom_type_maker', then you have to change this */
	// 	array('hierarchical' => false,    /* if this is false, it acts like tags */
	// 		'labels' => array(
	// 			'name' => __( 'Maker Tags', 'bonestheme' ), /* name of the custom taxonomy */
	// 			'singular_name' => __( 'Maker Tag', 'bonestheme' ), /* single taxonomy name */
	// 			'search_items' =>  __( 'Search Maker Tags', 'bonestheme' ), /* search title for taxomony */
	// 			'all_items' => __( 'All Maker Tags', 'bonestheme' ), /* all title for taxonomies */
	// 			'parent_item' => __( 'Parent Maker Tag', 'bonestheme' ), /* parent title for taxonomy */
	// 			'parent_item_colon' => __( 'Parent Maker Tag:', 'bonestheme' ), /* parent taxonomy title */
	// 			'edit_item' => __( 'Edit Maker Tag', 'bonestheme' ), /* edit custom taxonomy title */
	// 			'update_item' => __( 'Update Maker Tag', 'bonestheme' ), /* update title for taxonomy */
	// 			'add_new_item' => __( 'Add New Maker Tag', 'bonestheme' ), /* add new title for taxonomy */
	// 			'new_item_name' => __( 'New Maker Tag Name', 'bonestheme' ) /* name title for taxonomy */
	// 		),
	// 		'show_admin_column' => true,
	// 		'show_ui' => true,
	// 		'query_var' => true,
	// 	)
	// );
	
	/*
		looking for custom meta boxes?
		check out this fantastic tool:
		https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
	*/
	

?>
