<?php 

// template name: Features

get_header(); ?>

      <div id="content">

      <?php 
        $banner_primary_image = wp_get_attachment_image_src(get_field('banner_primary_image'), 'full');
        $banner_secondary_image = wp_get_attachment_image_src(get_field('banner_secondary_image'), 'full');
        $banner_secondary_text = get_field('banner_secondary_text');
        $feature_sidebar = get_field('feature_sidebar');
      ?>
  <div class="wrap">
      <div class="feature-banners clearfix">
        <div class="primary">
          <img src="<?php echo $banner_primary_image[0]; ?>" alt="<?php echo get_the_title(get_field('image_test')) ?>" />
        </div>
        
        <div class="secondary clearfix">
          <img src="<?php echo $banner_secondary_image[0]; ?>" alt="<?php echo get_the_title(get_field('image_test')) ?>" />

          <?php echo $banner_secondary_text; ?>
        </div>

      </div>

        <div id="inner-content" class="clearfix">        

            <div id="main" class="clearfix" role="main">  

            <?php
              $feature_category = get_field('feature_category');

              $temp = $wp_query; 
              $wp_query = null; 
              $wp_query = new WP_Query(); 
              
              $args = array(
                    'post_type' => array( 'post' ),
                    'cat' => $feature_category, 
                    'paged' => $paged
                  );

              $wp_query->query($args); 


              if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); 
                  global $more;
                  $more = 0;
                ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

                <header class="article-header">
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
                  <?php the_content('read more&raquo;'); ?>
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

              <?php 
                $wp_query = null; 
                $wp_query = $temp;  // Reset
              ?>


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

            <div class="sidebar feature">
              <?php echo $feature_sidebar; ?>
            </div>
        
          </div> <?php // end #inner-content ?>
        </div> <?php // end .wrap ?>

      </div> <?php // end #content ?>

<?php get_footer(); ?>
