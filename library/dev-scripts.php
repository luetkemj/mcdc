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
    <script src='//localhost:35729/livereload.js'></script> 
<script src='//172.22.218.116:3000/socket.io/socket.io.js'></script>
<script>var ___socket___ = io.connect('http://172.22.218.116:3000');</script>
<script src='//172.22.218.116:3001/client/browser-sync-client.0.8.2.js'></script>";

  }

}

 ?>