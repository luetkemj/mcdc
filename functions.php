<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once( 'library/bones.php' ); // if you remove this, bones will break
/*
2. library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
require_once( 'library/custom-post-type-contributer.php' );
require_once( 'library/custom-post-type-resource.php' ); // you can disable this if you like
// require_once( 'library/custom-post-taxonomies.php' );

/*
3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
require_once( 'library/admin.php' ); // this comes turned off by default
/*
4. library/translation/translation.php
	- adding support for other languages
*/
// require_once( 'library/translation/translation.php' ); // this comes turned off by default

/*
5. library/includes/embed-meta-box-plugin.php
	- embed meta box classes and documentation
*/
// require_once('library/includes/embed-meta-box-plugin.php');
/*
6. library/includes/embed-option-tree.php
	- embed option tree for advanced theme options
// */
// require_once('library/includes/embed-option-tree.php');
// load_template( trailingslashit( get_template_directory() ) . 'library/includes/theme-options.php' );
// load_template( trailingslashit( get_template_directory() ) . 'library/includes/meta-boxes.php' );



// DEVELOPMENT SCRIPTS (.gitignore'd)
if ( !are_we_live() ){
  require_once( 'library/dev-scripts.php' );
}

require_once( 'library/includes/function-shortcode.php' );

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
add_image_size( 'bones-thumb-704', 704, 221, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'sidebar3',
		'name' => __( 'Sidebar 3', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'sidebar4',
		'name' => __( 'Sidebar 4', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<?php // custom gravatar call ?>
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<?php // end custom gravatar call ?>
				<?php printf(__( '<cite class="fn">%s</cite>', 'bonestheme' ), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>
				<?php edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __( 'Search for:', 'bonestheme' ) . '</label>
	<input type="text" placeholder="search..." value="' . get_search_query() . '" name="s" id="s" />
	<input type="submit" id="searchsubmit" class="lsf button" value="' . esc_attr__( 'search' ) .'" />
	</form>';
	return $form;
} // don't remove this bracket!








// Format makers for post headings
function get_formatted_makers(){
	$makers = get_post_meta( get_the_ID(), 'makers_post_type_checkbox', true );
	$all_makers = count($makers);
	$makers_count = 1;
	$makers_output = '&mdash; Made by ';

	if ( $makers ) {
		foreach ($makers as $maker) {
			$name = get_the_title($maker);
			$permalink = get_permalink($maker);
			if ($makers_count == 1){
				$makers_output .= "<a href=".$permalink." rel='bookmark' title='Bio for ".$name."'>".$name."</a>";
			} elseif( ($makers_count != 1) && ($makers_count < $all_makers) ) {
				$makers_output .= ", <a href=".$permalink." rel='bookmark' title='Bio for ".$name."'>".$name."</a>";
			} else {
				$makers_output .= " &amp; <a href=".$permalink." rel='bookmark' title='Bio for ".$name."'>".$name."</a>";
			}
			$makers_count++;
		}
	return $makers_output;
	}
}	





function get_hierarchical_category_list(){
	global $post;

	$categories = wp_get_post_categories( $post->ID, array('fields' => 'ids'));
	if($categories) {
	 	$sep = ' / ';
	 	$cat_ids = implode(',' , $categories);
	 	$cats = wp_list_categories('title_li=&style=none&echo=0&include='.$cat_ids);
	 	$cats = rtrim(trim(str_replace('<br />',  $sep, $cats)), $sep);
	 	return  $cats;
	}
	
}






// Filter for adding icon after posts
add_filter( 'the_content', 'mcdc_endsign', 10 );
/**
 * Add a icon to the beginning of every post page.
 *
 * @uses is_single()
 */
function mcdc_endsign( $content ) {

    if ( is_single() )
        // Add image to the beginning of each page
        $content .= '<a class="endsign image-replacement" href="'.home_url().'">makingcomics.com</a>';
        
    // Returns the content.
    return $content;
}





if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}



function are_we_live(){
  $current_server = $_SERVER['HTTP_HOST']; 

  if ( $current_server == 'makingcomics.com' ){
    return true;
  } else {
    return false;
  }
}



require_once('library/includes/acffields.php');








function wp_api_encode_acf($data,$post,$context){
	$data['meta'] = array_merge($data['meta'],get_fields($post['ID']));
	return $data;
}


function benson_cdata(){

	global $post;
	$site_url = get_home_url();
	$json_query = '/wp-json/posts?type=resource&filter[posts_per_page]=-1&filter[module]=';
  $module = get_field('module'); 
	$endpoint = $site_url . $json_query . $module->slug;

	echo "<script type='text/javascript'>
				//<![CDATA[
				var wpjson_url = '$endpoint';
				//]]>
				</script>";
}


if( function_exists('get_fields') ){
	add_filter('json_prepare_post', 'wp_api_encode_acf', 10, 3);

	add_action('wp_head', 'benson_cdata');
}


?>