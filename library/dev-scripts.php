<?php
/*
Our development scripts function for grunt stuff
Should be in .gitignore
---------------------------------------------------------------------
get_development_scripts() tests our environment with are_we_live()
@returns the appropriate scripts if local

use [grunt sync] to get ports for the last three scripts
*/
function get_development_scripts(){

  if ( !are_we_live() ){
    return "
    <script src='//localhost:35729/livereload.js'></script> ";

  }

}

 ?>
