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
				<aside style="float: right;
    margin-right: 100px;
    position: relative;
    text-align: right;
    bottom: 375px;">
					<h1>community connectors</h1>
<?php
							$leaderLoop = new WP_QUERY(array('post_type' => 'comcon', 'posts_per_page' => -1, 'orderby' =>'meta_value', 'order' => 'ASC'));
							$i = 1;
							while ($leaderLoop->have_posts()) {
								$leaderLoop->the_post();
								$title = get_the_title();
								$content = get_the_content();
								$image = get_the_post_thumbnail($post->ID, 'medium');
								$major = get_post_meta($post->ID, 'comcon-form-major', true);
								$position = get_post_meta($post->ID, 'comcon-form-position', true);
								$email = get_post_meta($post->ID, 'comcon-form-email', true);
?>	
									<div style="margin-bottom:-100px">
										<?php echo $image; ?>
										<div class = "nameBox" style="    width: 300px;
    position: relative;
    right: 50px;
    bottom: 200px;">
											<h3><?php echo $title;?></h3>
											<p style="font-size:14px;"><?php echo $content; ?></p>
										</div>
									</div>
									<div>
									<p style="    font-size: 16px;
    margin-top: 1px;
    position: relative;
    width: 300px;
    bottom: 200px;
    right: 50px;"><?php echo $position; ?> - <?php echo $major; ?></p>
									</div>


<?php 					
								$i++;
							}
?>
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