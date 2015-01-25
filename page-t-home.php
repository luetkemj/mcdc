<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

      <div id="content">

        <div id="inner-content" class="wrap clearfix">
            
            <div id="main" class="clearfix" role="main">

              <?php if(get_field('home_page_features', 'option')): ?>
                <ul class="home-features">
                <?php while(the_repeater_field('home_page_features', 'option')): ?>
                    <li><a href="<?php the_sub_field('link'); ?>"><img src="<?php the_sub_field('thumbnail'); ?>" alt="<?php the_sub_field('title'); ?>" title="<?php the_sub_field('title'); ?>"/></a>
                <?php endwhile; ?>
                
                </ul>
             <?php endif; ?>
            

            </div> <?php // end #main ?>

        </div> <?php // end #inner-content ?>

      </div> <?php // end #content ?>

<?php get_footer(); ?>