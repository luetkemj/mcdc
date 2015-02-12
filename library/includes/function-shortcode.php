<?php
/**
 * Shortcode
 * @author luetkemj - luetkemj@vcu.edu
 */

function lmj_slideshow() {
  $slides = get_post_meta( get_the_ID(), 'page-slides', true ); 
  	if ($slides){

  		echo "<div class='lmj-slideshow'>";
  			lmj_flexslider();
  		echo "</div>";
 	}
}
add_shortcode( 'slideshow', 'lmj_slideshow' );


