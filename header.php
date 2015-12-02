<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv="X-UA-Compatible" content="chrome=1" />
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/ie.css">
		<![endif]-->
		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
		<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/jquery.bxslider.js"></script>
	</head>
<?php
	global $post;
	if ($post && $post->post_type == "page")
		$body_class = 'class="page-' . $post->post_name . '"';
	else if ($post && $post->post_type != "")
		$body_class = ($post->post_type != 'post') ? 'class="post-' . $post->post_type . '"' : 'class="post-default"';
	else
		$body_class = "";
?>
	<body <?php echo $body_class; ?>>
		<div class="page">
			<nav class="main-menu full">
			<header>
				<section>
					<a href="http://osi.ucf.edu/vucf"><img style="margin-right:100px;"src="<?php echo get_stylesheet_directory_uri(); ?>/resources/logo.png"></img></a>
					<div style="width:500px;"class="action">
						<div>
							<div id="signup" class="signup">Sign Up!</div>
							<div id="about" class="about">Learn More!</div>
							<div id="facebook" class="facebook"><img style="width:50px;" src="<?php echo get_stylesheet_directory_uri(); ?>/resources/facebook.png"></img>Like us on Facebook!</div>
							<div id="twitter" class="twitter"><img style="width:50px;" src="<?php echo get_stylesheet_directory_uri(); ?>/resources/twitter.png"></img>Follow us on Twitter!</div>
						</div>
					</div>
<?php
					if(is_page('Home')){
							?><div class="slideContainer"><?php
							echo do_shortcode('[advps-slideshow optset="1"]');
							?></div><?php
						}
?>

					
				</section>
					<div class="screen-reader-text skip-link"><a href="#UPDATE ME" title="Skip to content">Skip to content</a></div>
					<div class="compact-menu">
						<a class="menu-toggle" href="#">Tap for Menu</a>
					</div>
					<ul>
<?php
							$current_ID = $post ? $post->ID : -1;

							$navQuery = array('post_type' => 'page', 'post_status' => 'publish', 'posts_per_page' => -1, 'meta_key' => 'page-form-order', 'orderby' => 'meta_value', 'order' => 'ASC');
							$navLoop = new WP_Query($navQuery);

							while ($navLoop->have_posts()) {

								$navLoop->the_post();

								$name = get_the_title();
								$link = get_permalink();
								$nav_li_class = (get_the_ID() == $current_ID) ? ' class="current" ' : '';

								if (get_post_meta($post->ID, 'page-form-visible', true) == 'show') {
							
?><li<?php echo $nav_li_class; ?>>
						<a style = "font-family:malam; letter-spacing:2px; font-size:25px;" href="<?php echo $link; ?>"><?php echo $name; ?></a>
						</li><?php
	 							}
							} ?>

					</ul>
				</nav>
<style type="text/css">
@font-face {
 font-family: malam;
 src: url("<?php echo get_stylesheet_directory_uri(); ?>/resources/malam.eot") /* EOT file for IE */
}
@font-face {
 font-family: malam;
 src: url("<?php echo get_stylesheet_directory_uri(); ?>/resources/malam.ttf") /* TTF file for CSS3 browsers */
}
</style>
<script type="text/javascript">
$(document).ready(function() {
    $("#signup").on("click", function() {
        window.open("http://ucf.collegiatelink.net/organization/vucf");
    });
    $("#about").on("click", function() {
        window.open("<?php echo site_url('/about/'); ?>");
    });
    $("#facebook").on("click", function() {
        window.open("https://www.facebook.com/volunteerucf/");
    });
    $("#twitter").on("click", function() {
        window.open("<?php echo site_url('/about/'); ?>");
    });
});
</script>
			</header>
<!-- HEADER END -->
