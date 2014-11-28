<?php 

function gallery_custom_init() {
  $labels = array(
    'name' => _x('Gallery', 'post type general name'),
    'singular_name' => _x('Gallery', 'post type singular name'),
    'add_new' => _x('Add New', 'gallery'),
    'add_new_item' => __('Add New Gallery'),
    'edit_item' => __('Edit Gallery'),
    'new_item' => __('New Gallery'),
    'all_items' => __('All Gallery'),
    'view_item' => __('View Gallery'),
    'search_items' => __('Search Gallery'),
    'not_found' =>  __('No gallery found'),
    'not_found_in_trash' => __('No gallery found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Galleries'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )
  ); 
  register_post_type('galleries',$args);
}
add_action( 'init', 'gallery_custom_init' );



//add filter to ensure the text Gallery, or gallery, is displayed when user updates a gallery 

function gallery_gallery_updated_messages( $messages ) {
  global $post, $post_ID;

  $messages['galleries'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('Gallery updated. <a href="%s">View gallery</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Gallery updated.'),
    /* translators: %s: date and time of the revision */
    5 => isset($_GET['revision']) ? sprintf( __('Gallery restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Gallery published. <a href="%s">View gallery</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Gallery saved.'),
    8 => sprintf( __('Gallery submitted. <a target="_blank" href="%s">Preview gallery</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Gallery scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview gallery</a>'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Gallery draft updated. <a target="_blank" href="%s">Preview gallery</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}
add_filter( 'post_updated_messages', 'gallery_gallery_updated_messages' );




//display contextual help for Books

function gallery_add_help_text( $contextual_help, $screen_id, $screen ) { 
  //$contextual_help .= var_dump( $screen ); // use this to help determine $screen->id
  if ( 'galleries' == $screen->id ) {
    $contextual_help =
      '<p>' . __('Things to remember when adding or editing a gallery:') . '</p>' .
      '<ul>' .
      '<li>' . __('Specify the correct genre such as Mystery, or Historic.') . '</li>' .
      '<li>' . __('Specify the correct writer of the gallery.  Remember that the Author module refers to you, the author of this gallery review.') . '</li>' .
      '</ul>' .
      '<p>' . __('If you want to schedule the gallery review to be published in the future:') . '</p>' .
      '<ul>' .
      '<li>' . __('Under the Publish module, click on the Edit link next to Publish.') . '</li>' .
      '<li>' . __('Change the date to the date to actual publish this article, then click on Ok.') . '</li>' .
      '</ul>' .
      '<p><strong>' . __('For more information:') . '</strong></p>' .
      '<p>' . __('<a href="http://codex.wordpress.org/Posts_Edit_SubPanel" target="_blank">Edit Posts Documentation</a>') . '</p>' .
      '<p>' . __('<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>') . '</p>' ;
  } elseif ( 'edit-gallery' == $screen->id ) {
    $contextual_help = 
      '<p>' . __('This is the help screen displaying the table of books blah blah blah.') . '</p>' ;
  }
  return $contextual_help;
}
add_action( 'contextual_help', 'gallery_add_help_text', 10, 3 );









//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_gallery_taxonomies', 0 );

//create taxonomy job-titles for the post type "gallery"
function create_gallery_taxonomies() 
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x( 'Gallery Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Gallery Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Gallery Categories' ),
    'all_items' => __( 'All Gallery Categories' ),
    'parent_item' => __( 'Parent Gallery Category' ),
    'parent_item_colon' => __( 'Parent Gallery Category:' ),
    'edit_item' => __( 'Edit Gallery Category' ), 
    'update_item' => __( 'Update Gallery Category' ),
    'add_new_item' => __( 'Add New Gallery Category' ),
    'new_item_name' => __( 'New Gallery Category Name' ),
    'menu_name' => __( 'Gallery Categories' ),
  );    

  register_taxonomy('gallerycats',array('galleries'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true
  ));


    // Add new taxonomy, make it non-hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Gallery Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Gallery Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Gallery Tags' ),
    'all_items' => __( 'All Gallery Tags' ),
    'parent_item' => __( 'Parent Gallery Tag' ),
    'parent_item_colon' => __( 'Parent Gallery Tag:' ),
    'edit_item' => __( 'Edit Gallery Tag' ), 
    'update_item' => __( 'Update Gallery Tag' ),
    'add_new_item' => __( 'Add New Gallery Tag' ),
    'new_item_name' => __( 'New Gallery Tag Name' ),
    'menu_name' => __( 'Gallery Tags' ),
  );    

  register_taxonomy('gallerytags',array('galleries'), array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true
  ));
}
