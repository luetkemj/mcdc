<?php 
// Template Name: Module
?>

<?php get_header(); ?>

      <div id="content">

        <div id="inner-content" class="wrap clearfix">

            <div id="main" class="eightcol clearfix" role="main">
             

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                <header class="article-header module-header">

                  

                  <div class="icon">
                    <img src="<?php the_field('icon'); ?>"/>
                  </div>
                  <h1 class="h2 post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                  <div class="description"><?php the_field('description'); ?></div>
                  </h1>
                
                </header> <?php // end article header ?>


 <section class="entry-content clearfix" itemprop="articleBody">





<?php if( get_field( 'wpjson_url', $post->ID ) ){ ?>

  <div ng-app="benson">
    <div ng-controller="MainController">

      Sort by:
      <button class="button" ng-click="sortbyTitle()">Title</button>
      <button class="button" ng-click="sortbyPriority()">Priority</button>
      <br>
      Search By:
      <input ng-model="searchText.title">

<div class="cf"></div>

      <div class="colone">
        <p ng-repeat="resource in data | orderBy:resourceSortOrder | filter:searchText">
          <a 
            ng-show="resource.meta.content_owner"
            href="{{resource.meta.external_link}}" 
            target="{{resource.meta.external_link ? '_blank' : '_self'}}">
            

            <i ng-repeat="priority in resource.meta.priority" class="key {{priority}}"></i>
            <i ng-repeat="owner in resource.meta.content_owner" class="key {{owner}}"></i>
            <i ng-repeat="cost in resource.meta.cost" class="key {{cost}}"></i>
            
            {{resource.title}}
          </a>
        </p>
      </div>

      <div class="coltwo">
        <p ng-repeat="resource in data | orderBy:resourceSortOrder | filter:searchText">
          <a 
            ng-hide="resource.meta.content_owner"
            href="{{resource.meta.external_link}}" 
            target="{{resource.meta.external_link ? '_blank' : '_self'}}">
            

            <i ng-repeat="priority in resource.meta.priority" class="key {{priority}}"></i>
            <i ng-repeat="owner in resource.meta.content_owner" class="key {{owner}}"></i>
            <i ng-repeat="cost in resource.meta.cost" class="key {{cost}}"></i>
            
            {{resource.title}}
          </a>
        </p>
      </div>

      <div class="colthree">
        <img class="alignnone size-full wp-image-4664" alt="FWEB4" src="http://www.makingcomics.com/rd/wp/wp-content/uploads/2015/02/FWEB4.jpg" width="241" height="267" />
        
        <a title="Submit Your Links" href="http://www.makingcomics.com/rd/submit-links/" target="_blank"><img class="alignnone size-full wp-image-4756" alt="submit2" src="http://www.makingcomics.com/rd/wp/wp-content/uploads/2015/02/submit2.jpg" width="241" height="45" /></a>
        
        <a title="Edit Content" href="http://www.makingcomics.com/rd/edit-content/"><img class="alignnone size-full wp-image-4757" alt="editbutton2" src="http://www.makingcomics.com/rd/wp/wp-content/uploads/2015/02/editbutton2.jpg" width="241" height="45" /></a>
      </div>





    </div>
  </div>

<?php } else { ?>


  <div class="colone">
    <?php the_field('column_one'); ?>
  </div>
  <div class="coltwo">
    <?php the_field('column_two'); ?>
  </div>
  
  <div class="colthree">
    <img class="alignnone size-full wp-image-4664" alt="FWEB4" src="http://www.makingcomics.com/rd/wp/wp-content/uploads/2015/02/FWEB4.jpg" width="241" height="267" />
    
    <a title="Submit Your Links" href="http://www.makingcomics.com/rd/submit-links/" target="_blank"><img class="alignnone size-full wp-image-4756" alt="submit2" src="http://www.makingcomics.com/rd/wp/wp-content/uploads/2015/02/submit2.jpg" width="241" height="45" /></a>
    
    <a title="Edit Content" href="http://www.makingcomics.com/rd/edit-content/"><img class="alignnone size-full wp-image-4757" alt="editbutton2" src="http://www.makingcomics.com/rd/wp/wp-content/uploads/2015/02/editbutton2.jpg" width="241" height="45" /></a>
    

    <?php the_field('column_three'); ?>
  </div>

<?php } ?>

               

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
