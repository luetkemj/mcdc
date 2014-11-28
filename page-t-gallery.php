<?php
/*
Template Name: Gallery
*/
?>

<?php get_header(); ?>

			<?php 
			// get current page id
			  $current_page = $post->ID;
			// get array of filtered blogs set in OT theme options
			  $filtered_blogs = ot_get_option( 'gallery_pages', array() );
	  
			// Loop through filtered blogs array looking for an id match to the current page
			  foreach ($filtered_blogs as $filtered_blog){
				// if match found
			    if ($filtered_blog['page_select'] == $current_page ){

				// create variable for filtered blog category includes set in OT theme options      
				    $category_includes = '';
				// fill variable with cat ids set in OT theme options
	  				if ($filtered_blog['category_checkbox']) {
		  				foreach ($filtered_blog['category_checkbox'] as $category_include) 
		  					// Somthing here is breaking when you havemultiple categories. You get the proper cats from this section but it only works in args if you hard code them in. Passing in variable does not see to work.
		  					$category_includes .= $category_include.',';
		  					// echo $category_includes;
		  			}
			    } else { 
			    }
			  }

			?>

			<div id="content" class="id-content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol first clearfix" role="main">

							<?php get_search_form(); ?>		

								<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">
									
									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

								</header>

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
								</section>
<?php


							$args = array( 
							  'post_type' => 'galleries',

								'tax_query' => array(                     //(array) - use taxonomy parameters (available with Version 3.1).
							    'relation' => 'OR',                      //(string) - Possible values are 'AND' or 'OR' and is the equivalent of ruuning a JOIN for each taxonomy
							      array(
							        'taxonomy' => 'gallerycats',                //(string) - Taxonomy.
							        'field' => 'id',                    //(string) - Select taxonomy term by ('id' or 'slug')
							        'terms' => array( $category_includes ),    //(int/string/array) - Taxonomy term(s).
							        'include_children' => false,           //(bool) - Whether or not to include children for hierarchical taxonomies. Defaults to true.
							        'operator' => 'IN'                    //(string) - Operator to test. Possible values are 'IN', 'NOT IN', 'AND'.
							      )
							    ),

							  'paged' => $paged
							);
							$temp = $wp_query; 
							$wp_query = null;  
							$wp_query = new WP_Query( $args );
 


							?>
	



								<ul id="filterGallery" class="clearfix">
									<li id="random-names">Random</li>
									<li id="show-names">Name</li>
									<li id="hide-names">Photos</li>
								</ul>
							
							<?php
							  if ($wp_query->have_posts()) : ?> 
									<section class="gallery inner-wrapper clearfix" itemprop="gallery">
							<?php			
							  while ($wp_query->have_posts()) : $wp_query->the_post(); 
							
							  $slides = get_post_meta( get_the_ID(), 'slides', true );

							if ( $slides ){	
								$slidecount = count($slides);
								$thumbnail = 0;

								$post_id = get_the_ID();
								$post_title = get_the_title();

								echo "<div class='gallery-photo nohover'>";
								  foreach ($slides as $slide){
								  	if( $thumbnail == 0 ){
								  	
								  		if ($slide[other]){
								  			echo "<a href='{$slide[other]}' data-lightbox-gallery='gallery{$post_id}' title='{$slide[caption]}'>";
								  		} else {
								  			echo "<a href='{$slide[image]}' data-lightbox-gallery='gallery{$post_id}' title='{$slide[caption]}'>";
								  		}
								  		
											// Using custom_get_attachment_id function from functions.php
								  			$id = custom_get_attachment_id( $slide['image'] );
								  			// $src is output as an array of the image url, width, height, and them a number I don't understand. Regardless url is at [0]
									        $src = wp_get_attachment_image_src( $id, 'bones-thumb-236' );
								  		echo "
												<img src='{$src[0]}' alt='{$post_title}'>
												<div class='gallery-photo-caption'>{$post_title}</div>
											</a>";
								  		$thumbnail = 1;

								  		if ( $slidecount > 1 ){
								  			echo "<ul>";
								  		}
								  	} else {
								  			echo "<li>";
										  		if ($slide[other]){
										  			echo "<a href='{$slide[other]}' data-lightbox-gallery='gallery{$post_id}' title='{$slide[caption]}'>";
										  		} else {
										  			echo "<a href='{$slide[image]}' data-lightbox-gallery='gallery{$post_id}' title='{$slide[caption]}'>";
										  		}													
												echo "</a>
											</li>";
								  	}
								  }	
								  	if ( $slidecount > 1 ){
								  		echo "</ul>";
								  	}
								echo "</div>";	
							}
							?>
							
								
							<?php endwhile; ?>
								
								</section>

							<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php 

							$wp_query = null; 
						    $wp_query = $temp;  // Reset

							endif;

							// Reset Post Data
							wp_reset_postdata();

							?>
							</article>
						</div>

				</div>

			</div>

<?php get_footer(); ?>
