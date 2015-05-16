<?php
/*
Template Name: Content Guide
*/
?>



<?php get_header(); ?>

      <div id="content">

        <div id="inner-content" class="wrap clearfix">

            <div id="main" class="eightcol clearfix" role="main">        

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">


<?php if ( get_field('show_title') ){ ?>
                <header class="article-header">

                  <p class="categories"><?php
                  printf( __( '%1$s', 'bonestheme' ), get_the_category_list(' / ') );
                  ?></p>

                  <h1 class="h2 post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <p class="byline vcard"></p>

                </header> <?php // end article header ?>
<?php } ?>

                <section class="entry-content clearfix" itemprop="articleBody">
                  <?php the_content(); ?>
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


<?php 
$frontpage_id = get_option('page_on_front');
?>

              <div class="module">
                <h2>MAKING</h2>
                <?php if(get_field('making_modules', $frontpage_id)): ?>
                <ul>
                <?php while(the_repeater_field('making_modules', $frontpage_id)): 
                  $module_page = get_sub_field('link');
                  $module_title = get_the_title($module_page);
                  $module_link = get_post_permalink($module_page);
                  $module_icon = get_field('icon', $module_page);
                  $module_description = get_field('description', $module_page);
                  ?>
                  <li><a href="<?php echo $module_link; ?>"><img src="<?php echo $module_icon; ?>" alt="<?php echo $module_title; ?>" title="<?php echo $module_title; ?>"/><?php echo $module_title; ?></a>
                    <?php echo $module_description; ?>
                  </li>
                <?php endwhile; ?>
                
                </ul>
             <?php endif; ?>
             </div>

             <div class="module">
                <h2>DISTRIBUTION</h2>

                <?php if(get_field('distribution_modules', $frontpage_id)): ?>
                <ul>
                <?php while(the_repeater_field('distribution_modules', $frontpage_id)): 
                  $module_page = get_sub_field('link');
                  $module_title = get_the_title($module_page);
                  $module_link = get_post_permalink($module_page);
                  $module_icon = get_field('icon', $module_page);
                  $module_description = get_field('description', $module_page);
                  ?>
                  <li><a href="<?php echo $module_link; ?>"><img src="<?php echo $module_icon; ?>" alt="<?php echo $module_title; ?>" title="<?php echo $module_title; ?>"/><?php echo $module_title; ?></a>
                  <?php echo $module_description; ?>
                  </li>
                <?php endwhile; ?>
                
                </ul>
             <?php endif; ?>
             </div>

             <div class="module">
                <h2>MORE...</h2>
                <?php if(get_field('more_modules', $frontpage_id)): ?>
                <ul>
                <?php while(the_repeater_field('more_modules', $frontpage_id)): 
                  $module_page = get_sub_field('link');
                  $module_title = get_the_title($module_page);
                  $module_link = get_post_permalink($module_page);
                  $module_icon = get_field('icon', $module_page);
                  $module_description = get_field('description', $module_page);
                  ?>
                  <li><a href="<?php echo $module_link; ?>"><img src="<?php echo $module_icon; ?>" alt="<?php echo $module_title; ?>" title="<?php echo $module_title; ?>"/><?php echo $module_title; ?></a>
                  <?php echo $module_description; ?>
                  </li>
                <?php endwhile; ?>
                
                </ul>
             <?php endif; ?>
             </div>




          </div> <?php // end #main ?>
          
        </div> <?php // end #inner-content ?>

      </div> <?php // end #content ?>

<?php get_footer(); ?>
