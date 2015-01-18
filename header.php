<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<!-- <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png"> -->
		<!-- <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png"> -->
		
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		
		<?php // or, set /favicon.ico for IE10 win ?>
		<!-- <meta name="msapplication-TileColor" content="#f01d4f"> -->
		<!-- <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png"> -->

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono|Droid+Serif:400,700,400italic,700italic|Montserrat:400,700' rel='stylesheet' type='text/css'>

<!-- butter -->
		<?php wp_head(); ?>
<!-- bread -->
	</head>

<?php 
$background_image = get_field('background_image', 'option'); 
if ( $background_image ) {
	$background_style = "style='background-image:url(".$background_image.");'";
}
?>

	<body <?php body_class(); echo $background_style; ?> >

		<div id="container">

			<header class="header" role="banner" >

				<div id="inner-header" class="clearfix">

					<div class="container-logo gradient">

					<nav role="navigation" class="topnav">
						<button class="topnavbtn lsf">menu</button>
						<?php bones_top_nav(); ?>
					</nav>

						<div class="logo">
							<a class="image-replacement" href="<?php echo home_url(); ?>" rel="nofollow">makingcomics.com</a>
						</div>
					</div>

				</div> <?php // end #inner-header ?>
			</header> <?php // end header ?>
