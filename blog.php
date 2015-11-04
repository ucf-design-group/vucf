<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>

			<div class="content-area">
				<div class="main"> 
					<?php
					while (have_posts()) {
						the_post();
						get_template_part( 'content', 'page' );
					} ?>
				</div>
				<section class="updates">
					<h1>updates</h1>
<?php 					
					$updateLoop = new WP_QUERY(array('post_type' => 'updates', 'posts_per_page' => 5, 'orderby' => 'date', 'order' => 'DESC'));
					while ($updateLoop->have_posts()) {
						$updateLoop->the_post();
						$title = get_the_title();
						$date = get_the_date('F j, Y');
						$content = get_the_content();
?>
					<article class="update">
						<h2><?php echo $title; ?></h2>
						<h3><?php echo $date; ?></h3>
						<p><?php echo $content; ?></p>
					</article>
<?php
					}
?>
				</section>
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

<?php get_footer(); ?>