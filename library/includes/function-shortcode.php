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


// [bartag foo="foo-value"]
function ica_level( $atts, $content = null ) {
	extract( shortcode_atts( array(
		
	), $atts ) );

	return "<div class='gradient'>{$content}</div>";
}
add_shortcode( 'gradient', 'ica_level' );