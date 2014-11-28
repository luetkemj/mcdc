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
		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?>>

		<div id="container">

<?php
	$header_bg_images = ot_get_option( 'header_image' ); 
	if ($header_bg_images){
		shuffle($header_bg_images);
	}
?>
			<header class="header" role="banner" <?php if ($header_bg_images){ ?>style="background-image:url(' <?php echo $header_bg_images[0]['image']; } ?>')">


<?php if ($header_bg_images[0]['artist']) { ?>			
	
	<div class="banner-credit">
	<?php if ($header_bg_images[0]['website']) { ?>	
		<a href="<?php echo  $header_bg_images[0]['website']; ?>" target="_blank">image credit: <?php echo  $header_bg_images[0]['artist']; ?><a>
	<?php } else { ?>	
		image credit: <?php echo  $header_bg_images[0]['artist']; ?>
	<?php } ?>
	</div>

<?php } ?>


				<div id="inner-header" class="clearfix">

					<?php // to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> ?>
					<div class="container-logo gradient">

					<nav role="navigation" class="topnav">
						<button class="topnavbtn lsf">menu</button>
						<?php bones_top_nav(); ?>
					</nav>

						<div class="wrap logo">
							<a class="image-replacement" href="<?php echo home_url(); ?>" rel="nofollow">makingcomics.com</a>
						</div>
					</div>
					<?php // if you'd like to use the site description you can un-comment it below ?>
					<?php // bloginfo('description'); ?>


					<nav role="navigation" class="mainnav">
						<button class="mainnavbtn lsf">menu</button>
						<?php bones_main_nav(); ?>
						<ul class="social">
							<li class="lsf"><a href="https://plus.google.com/+Makingcomics" target="_blank">Google+</a></li>
							<li class="lsf"><a href="https://www.facebook.com/makingcomics" target="_blank">Facebook</a></li>
							<li class="lsf"><a href="https://twitter.com/Making_Comics" target="_blank">Twitter</a></li>
							<li class="lsf"><a href="http://makingcomicsdotcom.tumblr.com/" target="_blank">Tumblr</a></li>
						</ul>
					</nav>

				</div> <?php // end #inner-header ?>
			</header> <?php // end header ?>
