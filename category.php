<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div class="twocol first">&nbsp;</div>

						<div id="main" class="eightcol clearfix" role="main">

							<?php get_search_form(); ?>		

<?php
// main category header info and breadcrumbs
?>

								<header class="article-header">
								<?php	
									// build category breadcrumbs
									$ancestors = array_reverse( get_ancestors(get_cat_ID(single_cat_title("", false)), 'category') );
									$cat_parent_and_cat = '';
									if($ancestors) {
									    foreach($ancestors as $cat) {               
									         $catlink = get_category_link($cat);
									         $catname = get_cat_name($cat);
									         $cat_parent_and_cat .= '<a href="' . $catlink . '">' . $catname . '</a>' . ' / ' ;
									    }
									}
								?>	
									<p class="categories"><?php echo $cat_parent_and_cat; ?></p>
									<h1 class="h2 post-title"><?php single_cat_title(); ?></h1>
									<?php echo category_description(); ?>
								</header> <?php // end article header ?>


<div class="list">
								<?php
								// get the primary archive category
								$archive_category = get_query_var('cat');

								// get list of direct children of primary archive category
								$args = array(
									'type'                     => 'post',
									'child_of'                 => '',
									'parent'                   => $archive_category,
									'orderby'                  => 'name',
									'order'                    => 'ASC',
									'hide_empty'               => 1,
									'hierarchical'             => 1,
									'exclude'                  => '',
									'include'                  => '',
									'number'                   => '',
									'taxonomy'                 => 'category',
									'pad_counts'               => false 

								); 

								$categories = get_categories( $args ); 

								// check if there are children	
								if ($categories){
									// We have kids! build the lists to dig deeper	
									// build a list of all cats
									foreach ($categories as $cat) {

									 	$cat_link = get_category_link( $cat->term_id );
										echo "<h3 class='cat'><span class='litter'>[{$cat->count}]</span> <a href='{$cat_link}'>{$cat->name}</a></h3>";
									 
									 // get list of kittens	
									 	$args = array(
											'type'                     => 'post',
											'child_of'                 => '',
											'parent'                   => $cat->term_id,
											'orderby'                  => 'name',
											'order'                    => 'ASC',
											'hide_empty'               => 1,
											'hierarchical'             => 1,
											'exclude'                  => '',
											'include'                  => '',
											'number'                   => '',
											'taxonomy'                 => 'category',
											'pad_counts'               => false 
										); 

										$kittens = get_categories( $args );

									// build list of kittens
										if ($kittens){

											echo "<ul class='kittens'>";
												foreach ( $kittens as $kitten ){
													$kitten_link = get_category_link( $kitten->term_id );

													echo "<li class='kitten'><span class='litter'>[{$kitten->count}]</span> <a href='{$kitten_link}'>{$kitten->name}</a></li>";
												}
											echo "</ul>";
										} else {

										$kargs = array(
											'cat' => $cat->term_id
										);

										$the_query = new WP_Query( $kargs );

										// The Loop
										if ( $the_query->have_posts() ) :

										echo "<ul class='kittens'>";

										while ( $the_query->have_posts() ) : $the_query->the_post(); 
										?>
												
											<li class='kitten'><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></li>

										<?php		
										endwhile;
										echo "</ul>";
										endif;

										// Reset Post Data
										wp_reset_postdata();
										}

									}
								} else {

									// No children - time to loop!
									if (have_posts()) : while (have_posts()) : the_post(); ?>

									<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

										<header class="article-header">
											<p class="categories">
												<?php echo get_hierarchical_category_list(); ?>
											</p>

											<h1 class="h2 post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
											<p class="byline vcard"><?php
												printf( __( '<time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')));
											?> <span class="author"><?php echo get_formatted_makers(); ?></span></p>

										</header> <?php // end article header ?>

										<div class="featured-image">
											<?php if ( has_post_thumbnail() ) { 
				  								?>
				  								<a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>"/>
				  								<?php
				  									the_post_thumbnail('bones-thumb-704');
												?>
												</a>
												<?php
												} 
											?>
										</div>
										<section class="entry-content">
											<?php the_content(); ?>
										</section> <?php // end article section ?>

										<footer class="article-footer clear">

										</footer> <?php // end article footer ?>

									</article> <?php // end article ?>

									<?php endwhile; ?>

											<?php if ( function_exists( 'bones_page_navi' ) ) { ?>
												<?php bones_page_navi(); ?>
											<?php } else { ?>
												<nav class="wp-prev-next">
													<ul class="clearfix">
														<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
														<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
													</ul>
												</nav>
											<?php } ?>

									<?php else : ?>

											<article id="post-not-found" class="hentry clearfix">
												<header class="article-header">
												</header>
												<section class="entry-content">
												</section>
												<footer class="article-footer">
												</footer>
											</article>

									<?php endif;
								}
?>
</div>

						</div> <?php // end #main ?>

						
						<div class="twocol last">&nbsp;</div>

								</div> <?php // end #inner-content ?>

			</div> <?php // end #content ?>

<?php get_footer(); ?>