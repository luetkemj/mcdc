<?php
function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { 
        	background-image:url('.get_bloginfo('template_url').'/img/login-page-logo.png) !important; 
        	background-size: 326px 64px !important;
        	width: 326px !important;
        	height: 93px !important;
        }
    </style>';
}
add_action('login_head', 'my_custom_login_logo');


function my_custom_login_logo_url(){
    return ( home_url() );
    }
add_filter('login_headerurl', 'my_custom_login_logo_url');

?>