<?php
/**
 * @author luetkemj - luetkemj@gmail.com
 * @uses option tree embeded plugin > includes/option-tree
 * This file is for building metaboxes with the option tree API
 * Demo available optiontree/assets/theme-mode/demo-meta-boxes.php
 */


/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types
 * in demo-theme-options.php.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */

/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'custom_meta_boxes' );


function custom_meta_boxes() {

  //   // display metaboxes based on page template
  //   $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  //   $template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
  // // check for a template type
  // // if ($template_file == 'page-t-home.php') {
   
  // // }





  $page_meta_box = array(
    'id'        => 'post-meta-box',
    'title'     => 'Post Options',
    'desc'      => '',
    'pages'     => array( 'post' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(

      array(
        'label'       => 'Makers',
        'id'          => 'makers_post_type_checkbox',
        'type'        => 'custom-post-type-checkbox',
        'desc'        => 'Check off all those involved in this post. If someone does not exist create a Bio for them in the Makers post type, publish it, and refresh this page.',
        'std'         => '',
        'rows'        => '',
        'post_type'   => 'custom_type_maker',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => ''
      ),
    )
  );
  
ot_register_meta_box( $page_meta_box );







  $makers_meta_box = array(
    'id'        => 'post-meta-box',
    'title'     => 'Post Options',
    'desc'      => '',
    'pages'     => array( 'custom_type_maker' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(

      array(
        'label'       => 'Last Name',
        'id'          => 'maker_last_name',
        'type'        => 'text',
        'desc'        => 'Last name for alphabetization purposes',
      ),
    )
  );
  
ot_register_meta_box( $makers_meta_box );
}