<?php
/*
This is the custom post type post template.
If you edit the post type name, you've got
to change the name of this template to
reflect that name change.

i.e. if your custom post type is called
register_post_type( 'bookmarks',
then your single template should be
single-bookmarks.php

*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">


						<div id="main" class="eightcol clearfix" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

								<header class="article-header">

									<h1 class="single-title custom-post-type-title"><?php the_title(); ?></h1>

								</header> <?php // end article header ?>

								<section class="entry-content clearfix">

									<?php the_content(); ?>



									<?php 

$maker_name = get_the_title();
$makerID = get_the_id();

// echo $makerID;

$args = array(
		'post_type' => array( 'post' ),
		'posts_per_page' => -1
	);

$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) :

	echo "<h5 class='clear'>Made by {$maker_name}:</h5>";
	echo "<ul>";
while ( $the_query->have_posts() ) : $the_query->the_post();

	$makers = get_post_meta( get_the_ID(), 'makers_post_type_checkbox', true );
	foreach ( $makers as $maker ){
		if ( $makerID == $maker ){
			?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php
		}
	}


endwhile;
	echo "</ul>";
endif;

// Reset Post Data
wp_reset_postdata();


									?>

								</section> <?php // end article section ?>

								<footer class="article-footer">

								</footer> <?php // end article footer ?>

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
												<p><?php _e( 'This is the error message in the single-custom_type.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <?php // end #main ?>
		

				</div> <?php // end #inner-content ?>

			</div> <?php // end #content ?>

<?php get_footer(); ?>
