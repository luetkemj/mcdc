<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol clearfix" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">
									<p class="categories">
										<?php echo get_hierarchical_category_list(); ?>
									</p>

									<?php 

									$external_link = get_field('external_link');
									$post_object = get_field('mc_link');
									if( $post_object ): 
										// override $post
										$post = $post_object;
										setup_postdata( $post ); 

										$mc_link = get_the_permalink(); 

										wp_reset_postdata();
									endif; 

									$link_to_content = ( $external_link ) ? $external_link : $mc_link;
									?>

									<h1 class="h2 post-title">
										<a href="<?php echo $link_to_content; ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
											<?php the_title(); ?>
										</a>
									</h1>
									
								</header> <?php // end article header ?>

								<section class="entry-content clearfix" itemprop="articleBody">
									<br/>
									<p>source: <a href="<?php echo $link_to_content; ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
											<?php echo $link_to_content; ?>
										</a></p>

									<?php 
									$terms = get_the_terms( $post->ID, 'module');
									$site_url = site_url();
									$related_content = '<p>More content like this is indexed within the ';
									$count = 0;
									foreach ( $terms as $term ){

										if ($count == 0){
											$related_content .= '<a href="'.$site_url.'/'.$term->slug.'">'.$term->name.'</a>';
										} else {
											$related_content .= ', <a href="'.$site_url.'/'.$term->slug.'">'.$term->name.'</a>';
										}

										$count++;
									}

									if ( $count == 1 ){
										$related_content .= ' module.';
									} else {
										$related_content .= ' modules.';
									}

									$related_content .= '</p>';
									echo $related_content;	
									?>



									<p>The <a href="http://makingcomics.com/about/">MakingComics.com</a> project is aimed at promoting comic arts and graphic storytelling to a worldwide audience through the use of free and up to date learning materials. MakingComics.com has the bold goal of becoming the largest, and most useful, online repository of comic-making educational material. This will be achieved through active creation of new content, learning community facilitation, and our crowdsourced repository of comic-making resources from around the web.</p>
								</section> <?php // end article section ?>

								<footer class="article-footer">
									<p class="categories">
										<?php echo get_hierarchical_category_list(); ?>
									</p>
									<p class="tags"><?php the_tags( '<span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?></p>
									
									<?php if (function_exists('sharethis_button')) { sharethis_button(); } ?>

								</footer>

								<?php comments_template(); ?>

							</article> <?php // end article ?>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry clearfix">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
									</footer>
							</article>

						<?php endif; ?>

					</div> <?php // end #main ?>


				</div> <?php // end #inner-content ?>

			</div> <?php // end #content ?>

<?php get_footer(); ?>
