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
			<nav class="main-menu full">
			<header>
				<section>
					<a href="http://osi.ucf.edu/vucf"><img style="margin-right:100px;"src="<?php echo get_stylesheet_directory_uri(); ?>/resources/logo.png"></img></a>
					<div id = "slider" style="width:250px;height:250px;">
<?php
					if(is_page('Home')){
							$featuresLoop = new WP_QUERY(array('post_type' => 'featured', 'posts_per_page' => -1, 'orderby' =>'meta_value', 'order' => 'ASC'));
							$i = 1;
							while ($featuresLoop->have_posts()) {
								$featuresLoop->the_post();
								$title = get_the_title();
								$content = get_the_content();
								$image = get_the_post_thumbnail($post->ID, 'medium');
?>
								<div id = 'image<?php echo $i ?>' style = "display:none;" >
								<?php echo $image; ?>
								<div class = 'imTitle'> <?php echo $title; ?> </div>
								<div class = 'imContent'> <?php echo $content; ?> </div>
								</div>
<?php
            					$i++;
							}

						}
?>
					</div>
					<article style="width:500px;"class="action">
						<div>
							<div id="signup" class="signup">Sign Up!</div>
							<div id="about" class="about">Learn More!</div>
							<div id="facebook" class="facebook"><img style="width:50px;" src="<?php echo get_stylesheet_directory_uri(); ?>/resources/facebook.png"></img>Like us on Facebook!</div>
							<div id="twitter" class="twitter"><img style="width:50px;" src="<?php echo get_stylesheet_directory_uri(); ?>/resources/twitter.png"></img>Follow us on Twitter!</div>
						</div>
					</article>
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
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/jquery-2.1.4.min.js"></script>
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


//POPULATE ARRAY OF IMAGES THRU PHP
//DISPLAY IMAGES WITH THESE FUNCTIONS
//MAY HAVE TO EDIT WHAT HAS BEEN DONE IN ABOVE HTML
/*function changeImage()
{
    var img = document.getElementById("img");
    img.src = images[x];
    x++;

    if(x >= images.length){
        x = 0;
    } 

    fadeImg(img, 100, true);
    setTimeout("changeImage()", 30000);
}

function fadeImg(el, val, fade){
    if(fade === true){
        val--;
    }else{
        val ++;
    }

    if(val > 0 && val < 100){
        el.style.opacity = val / 100;
        setTimeout(function(){fadeImg(el, val, fade);}, 10);
    }
}

var images = [],
x = 0;

images[0] = "image1.jpg";
images[1] = "image2.jpg";
images[2] = "image3.jpg";
setTimeout("changeImage()", 30000);*/

</script>
			</header>
<!-- HEADER END -->
