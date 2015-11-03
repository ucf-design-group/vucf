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
			<header>
				<section>
					<article class="action">
						<a href="http://ucf.collegiatelink.net/organization/vucf" target="_blank"><div class="button">Sign Up!</div></a>
						<a href="<?php echo site_url('/about/'); ?>"><div class="button">Learn More!</div></a>
					</article>
				</section>
				<nav class="main-menu full">
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
			</header>
<!-- HEADER END -->
