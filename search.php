
<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div class="twocol first">&nbsp;</div>

						<div id="main" class="eightcol clearfix" role="main">
							<h1 class="archive-title"><span><?php _e( 'Search Results for:', 'bonestheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

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
									<?php the_excerpt(); ?>
								</section> <?php // end article section ?>

								<footer class="article-footer clear">

									
									<p class="comments"><a href="<?php comments_link(); ?>"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a></p>
									
									<p class="tags"><?php the_tags( '<span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?></p>

								</footer> <?php // end article footer ?>

								<?php // comments_template(); // uncomment if you want to use them ?>

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
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <?php // end #main ?>
						<div class="twocol last">&nbsp;</div>

				</div> <?php // end #inner-content ?>

			</div> <?php // end #content ?>

<?php get_footer(); ?>

