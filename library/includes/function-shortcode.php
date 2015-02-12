<?php
// comma seperated values:
// [legend keys="mc,v,d"]
// possible values: mc,a,d,t,v,s,1,2,3,4
function mcdc_legend_shortcode( $atts, $content = null ) {
  $a = shortcode_atts( array(
    'keys' => ''
  ), $atts );
  $keys = $a['keys'];
  $keys = explode(",", $keys);

  foreach( $keys as $key ){
    $legend .= '<i class="key key-'.$key.'"></i>';
  }
  return $legend;
}
add_shortcode( 'legend', 'mcdc_legend_shortcode' );