<?php 
// Template Name: Module
?>

<?php get_header(); ?>

      <div id="content">

        <div id="inner-content" class="wrap clearfix">

            <div id="main" class="eightcol clearfix" role="main">
             

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                <header class="article-header">

                  <p class="categories"><?php
                  printf( __( '%1$s', 'bonestheme' ), get_the_category_list(' / ') );
                  ?></p>

                  <h1 class="h2 post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <p class="byline vcard"></p>

                </header> <?php // end article header ?>

                <section class="entry-content clearfix" itemprop="articleBody">
                  <div class="colone">
                    <?php the_field('column_one'); ?>
                  </div>
                  <div class="coltwo">
                    <?php the_field('column_two'); ?>
                  </div>
                  <div class="colthree">
                    <?php the_field('column_three'); ?>
                  </div>
                </section> <?php // end article section ?>



                <footer class="article-footer">

                </footer>

                <?php //comments_template(); ?>

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
