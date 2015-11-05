<?php /* Template Name: About */ ?>

<?php get_header(); ?>

			<div class="content-area">
				<div class="main"> 
					<?php
					while (have_posts()) {
						the_post();
						get_template_part( 'content', 'page' );
					} ?>
				</div>
				<section class="interests">
					<h1>areas of interest</h1>
<?php 					
					$interestLoop = new WP_QUERY(array('post_type' => 'interests', 'posts_per_page' => -1, 'orderby' => 'name', 'order' => 'ASC'));
					while ($interestLoop->have_posts()) {
						$interestLoop->the_post();
						$title = get_the_title();
						$content = get_the_content();
						$slug = $post->post_name;
						$link = site_url("/contact/#") . $slug;
?>
					<article class="interest">

						<a href="<?php echo $link; ?>">
							<h2>
								<div class="icon <?php echo $slug; ?>"></div>
								<?php echo $title; ?>
							</h2>
						</a>
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
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<?php get_footer(); ?>