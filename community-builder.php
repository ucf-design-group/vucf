<?php /* Template Name: community-builder */ ?>

<?php get_header(); ?>

			<div class="content-area">
				<div class="main"> 
					<img style="width:200px;"src="<?php echo get_stylesheet_directory_uri(); ?>/resources/cclogo.png"></img>
					<p style="float:right;margin-right:650px;line-height:120px;font-size:24px;font-style:italic;">Where Community Becomes Unity</p>
				</div>
				<section class="general">
					<?php
					while (have_posts()) {
						the_post();
						get_template_part( 'content', 'page' );
					} ?>
				</section>
				<aside>
					<h1>community connectors</h1>
				</aside>
			</div>
<style type="text/css">
@font-face {
 font-family: kgsecondchances;
 src: url("<?php echo get_stylesheet_directory_uri(); ?>/resources/KGSecondChancesSketch.eot") /* EOT file for IE */
}
@font-face {
 font-family: kgsecondchances;
 src: url("<?php echo get_stylesheet_directory_uri(); ?>/resources/KGSecondChancesSketch.ttf") /* TTF file for CSS3 browsers */
}
</style>
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<?php get_footer(); ?>