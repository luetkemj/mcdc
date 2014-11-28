<?php 
/**
 * @author luetkemj - luetkemj@gmail.com
 * @uses meta-box plugin by rilwis > includes/meta-box
 * This file initializes flexslider and must be included in the footer for flexslider to function.
 * You must also have the meta-box plugin embedded and setup to use pluploads
 */


// Check for slides as added by met-box plugin with plupload metabox using vcuarts_plupload as key

// global $post;
$slides = get_post_meta( get_the_ID(), 'page-slides', true ); 
$postid = get_the_ID();

// if no slides present just return and do nothing
if ( !$slides ) { return; }
  
  else {
// setup variable to hold vimeoAPI strings
  $vimeoAPI = '';
// setup variable to hold froogaloop init strings for callback in flexslider init
  $fCallBack = '';

// Loop through slides and build $vimeoAPI and $fCallBack strings  
  foreach ( $slides as $slide )
  {
    if ( $slide['text_vimeo'] ){
      $vimeoAPI .= "var player{$slide['text_vimeo']} = document.getElementById('player_{$slide['text_vimeo']}'); \$f(player{$slide['text_vimeo']}).addEvent('ready', ready); ";
      $fCallBack .= "\$f(player{$slide['text_vimeo']}).api('pause');";
    }
    else {}
  }

?>

  <script type="text/javascript">

  jQuery(document).ready(function() { 
    var $ = jQuery; 
      
      $(window).load(function(){  

        <?php 
        // if $vimeoAPI contains a string then we have videos and should output the strings required to setup the variables required.
          if ($vimeoAPI){
                echo $vimeoAPI; 

        // Videos have been confirmed so we setup froogaloop.js
        ?>      

            function addEvent(element, eventName, callback) {
              (element.addEventListener) ? element.addEventListener(eventName, callback, false) : element.attachEvent(eventName, callback, false);
            }
            
            function ready(player_id) {
              var froogaloop = $f(player_id);
            
              froogaloop.addEvent('play', function(data) {
                $('.flexslider').flexslider("pause");
              });
              
              froogaloop.addEvent('pause', function(data) {
                $('.flexslider').flexslider("play");
              });
            }

        <?php 
          }
        ?>
      
        // Call fitVid before FlexSlider initializes, so the proper initial height can be retrieved.
        $(".flexslider.id<?php echo $postid;?>")
          .fitVids()
          .flexslider({
            <?php if ( is_home ){ echo 'slideshow: false,'; } ?>
            animation: "slide",
            useCSS: false,
            animationLoop: true,
            smoothHeight: true,
            start: function(slider){
              $('.loading').hide();
            },
            before: function(slider){         
              <?php 
                // Checking again if videos are actually present. If they are we output the callback strings built above  
                if ( $fCallBack ) { echo $fCallBack; }
              ?>
            }
        });

      });
    });
  </script>

<?php
}
?>