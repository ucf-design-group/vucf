<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

			<div class="content-area">
				<div class="main"> 
					<?php
					while (have_posts()) {
						the_post();
						get_template_part( 'content', 'page' );
					} ?>
				</div>

				<section class="general">
					<h1 style="font-family:kgsecondchances">contact VUCF</h1>
					<div><h2 class="phone">Phone: </h2><p><a href="tel:407-823-3318">(407) 823-3318</a></p></div>
					<div><h2 class="email">E-Mail: </h2><p><a href="mailto:vucf@ucf.edu">vucf@ucf.edu</a></p></div>
					<div><h2 class="location">Location: </h2><p>VUCF is located on the second floor of the Student Union inside the Office of Student Involvement, Room 208.</p></div>
					<div><h2 class="hours">Hours: </h2><p>Monday - Friday, 8am - 5pm</p></div>
				</section>

				<aside>
					<h1>connect with VUCF</h1>
						<div>
							<a class="button" href="<?php echo site_url('/volunteer/'); ?>">Want More Information?</a>
							<p>Schedule a consultation with a VUCF Board member to learn more about service opportunities that are related to your specific interests or needs.</p>
						</div>
						<div>
							<a class="button" href="<?php echo site_url('/need-volunteers/'); ?>">Need Volunteers?</a>
							<p>Spread the word about your organization or non-profit's upcoming service opportunities.</p>
						</div>
					<div>
						<a style="font-family:malam;margin-right:20px;" class="facebook" href="https://www.facebook.com/volunteerucf">Like us on Facebook</a>
						<a style="font-family:malam;" class="twitter" href="https://twitter.com/VolunteerUCF">Follow us on Twitter</a>
					</div>
				</aside>
				
				<section class="leadership">
					<h1>board of directors</h1>
<?php 				
					$leaderLoop = new WP_QUERY(array('post_type' => 'leadership', 'posts_per_page' => -1, 'orderby' => 'meta_value', 'order' => 'ASC', 'meta_key' => 'leader-form-order'));
					while ($leaderLoop->have_posts()) {
						$leaderLoop->the_post();
						$title = get_the_title();
						$content = get_the_content();
						$image = get_the_post_thumbnail($post->ID, 'small');
						$position = get_post_meta($post->ID, 'leader-form-position', true);
						$email = get_post_meta($post->ID, 'leader-form-email', true);
						$slug = $post->post_name;
?>
					<article class="leader" id="<?php echo $slug; ?>">
						<?php echo $image; ?>
						<h2><?php echo $title; ?></h2>
						<h3><?php echo $position; ?></h3>
						<p><?php echo $content; ?></p>
						<a class="email" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
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
@font-face {
 font-family: malam;
 src: url("<?php echo get_stylesheet_directory_uri(); ?>/resources/malam.eot") /* EOT file for IE */
}
@font-face {
 font-family: malam;
 src: url("<?php echo get_stylesheet_directory_uri(); ?>/resources/malam.ttf") /* TTF file for CSS3 browsers */
}
</style>
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<?php get_footer(); ?>