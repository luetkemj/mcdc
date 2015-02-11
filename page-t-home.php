<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

      <div id="content">

        <div id="inner-content" class="wrap clearfix">
            
            <div id="main" class="clearfix" role="main">

              <?php if(get_field('home_page_features')): ?>
                <ul class="home-features">
                <?php while(the_repeater_field('home_page_features')):                       
                      $feature_link = (get_sub_field('link') ? get_sub_field('link') : get_sub_field('external_link'));
                      $feature_target = (get_sub_field('external_link') ? "target='_blank'" : null );
                      $feature_thumbnail = get_sub_field('thumbnail');
                      $feature_title = get_sub_field('title');
                      
                ?>
                    

                    <li><a href="<?php echo $feature_link; ?>" <?php echo $feature_target; ?>><img src="<?php echo $feature_thumbnail; ?>" alt="<?php echo $feature_title; ?>" title="<?php echo $feature_title ?>"/></a>
                <?php endwhile; ?>
                
                </ul>
             <?php endif; ?>




             <div class="module">
                <h2>MAKING</h2>
                <?php if(get_field('making_modules')): ?>
                <ul>
                <?php while(the_repeater_field('making_modules')): 
                  $module_page = get_sub_field('link');
                  $module_title = get_the_title($module_page);
                  $module_link = get_post_permalink($module_page);
                  $module_icon = get_field('icon', $module_page);
                  ?>
                  <li><a href="<?php echo $module_link; ?>"><img src="<?php echo $module_icon; ?>" alt="<?php echo $module_title; ?>" title="<?php echo $module_title; ?>"/><?php echo $module_title; ?></a></li>
                <?php endwhile; ?>
                
                </ul>
             <?php endif; ?>
             </div>

             <div class="module">
                <h2>DISTRIBUTION</h2>

                <?php if(get_field('distribution_modules')): ?>
                <ul>
                <?php while(the_repeater_field('distribution_modules')): 
                  $module_page = get_sub_field('link');
                  $module_title = get_the_title($module_page);
                  $module_link = get_post_permalink($module_page);
                  $module_icon = get_field('icon', $module_page);
                  ?>
                  <li><a href="<?php echo $module_link; ?>"><img src="<?php echo $module_icon; ?>" alt="<?php echo $module_title; ?>" title="<?php echo $module_title; ?>"/><?php echo $module_title; ?></a></li>
                <?php endwhile; ?>
                
                </ul>
             <?php endif; ?>
             </div>

             <div class="module">
                <h2>MORE...</h2>
                <?php if(get_field('more_modules')): ?>
                <ul>
                <?php while(the_repeater_field('more_modules')): 
                  $module_page = get_sub_field('link');
                  $module_title = get_the_title($module_page);
                  $module_link = get_post_permalink($module_page);
                  $module_icon = get_field('icon', $module_page);
                  ?>
                  <li><a href="<?php echo $module_link; ?>"><img src="<?php echo $module_icon; ?>" alt="<?php echo $module_title; ?>" title="<?php echo $module_title; ?>"/><?php echo $module_title; ?></a></li>
                <?php endwhile; ?>
                
                </ul>
             <?php endif; ?>
             </div>
            

            </div> <?php // end #main ?>

        </div> <?php // end #inner-content ?>

      </div> <?php // end #content ?>

<?php get_footer(); ?>