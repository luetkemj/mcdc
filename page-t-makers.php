<?php
/*
Template Name: Makers
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">
						
					<div class="twocol first">&nbsp;</div>

						<div id="main" class="eightcol clearfix" role="main">

							<?php get_search_form(); ?>		
					
					<header class="article-header">

						<h1 class="page-title">
							<?php the_title(); ?>
						</h1>
					
					</header>

						<br/>
						<br/>

<?php
						  $temp = $wp_query; 
						  $wp_query = null; 
						  $wp_query = new WP_Query(); 
						  
						  $args = array(
						  			'post_type' => array( 'custom_type_maker' ),
						  			'meta_key' => 'maker_last_name',
						  			'orderby' => 'meta_value',
						  			// 'orderby' => 'name',
						  			'order' => 'ASC'
						  		);

						  $wp_query->query($args); 


						  if ($wp_query->have_posts()) : ?>
						    
							<ul>

						    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

								<li>
									<!-- <h5> -->
										<a href="<?php the_permalink(); ?>" alt="permalink to the bio of <?php the_title();?>">
										 	<?php the_title(); ?>
										</a>
									<!-- </h5> -->
								</li>	

							<?php endwhile; else : ?>

							  <?php 
							    $wp_query = null; 
							    $wp_query = $temp;  // Reset
							  ?>
								
							</ul>

							<?php endif; ?>

						</div> <?php // end #main ?>

						

				</div> <?php // end #inner-content ?>

			<div class="twocol last">&nbsp;</div>


			</div> <?php // end #content ?>

<?php get_footer(); ?>