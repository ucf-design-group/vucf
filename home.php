<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

			<div class="content-area">
				<div class="main"> 
					<h1 style="font-family: kgsecondchances;">mission statement</h1>
					<?php
					while (have_posts()) {
						the_post();
						get_template_part( 'content', 'page' );
					} ?>
				</div>

				<section class="otherPrograms">
					<h1 style="font-family: kgsecondchances;">our other programs</h1>
					<div style="text-align:center;margin-bottom:40px;">
						<a href="http://osi.ucf.edu/knightsgiveback"><img style="margin-right:60px;"src="<?php echo get_stylesheet_directory_uri(); ?>/resources/KGB.png"></img></a>
						<a href="http://osi.ucf.edu/abp/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/resources/ABP.png"></img></a>
					</div>
				</section>
				
				<section class="updates">
					<h1>updates</h1>
<?php 					
					$updateLoop = new WP_QUERY(array('post_type' => 'updates', 'posts_per_page' => 2, 'orderby' => 'date', 'order' => 'DESC', 'meta_key' => 'updates-form-expiration', 'meta_value' => time(), 'meta_compare' => '>='));
					while ($updateLoop->have_posts()) {
						$updateLoop->the_post();
						$title = get_the_title();
						$excerpt = get_the_excerpt();
						$content = ($excerpt == "") ? get_the_content() : $excerpt;
?>
					<article class="update">
						<h2><?php echo $title; ?></h2>
						<p><?php echo $content; ?></p>
						<p><a href="<?php echo site_url('/blog/'); ?>">Read More</a></p>
					</article>
<?php
					}
?>
				</section>

				<section class="events">
					<h1>upcoming events</h1>
<?php 					
					$eventLoop = new WP_QUERY(array('post_type' => 'osi-events', 'posts_per_page' => 2, 'orderby' => 'meta_value', 'order' => 'ASC', 'meta_key' => 'oe-form-start', 'meta_value' => time(), 'meta_compare' => '>='));
					while ($eventLoop->have_posts()) {
						$eventLoop->the_post();
						$title = get_the_title();
						$content = get_the_content();
						$date = get_post_meta($post->ID, 'oe-form-start', true);
?>
					<article class="event">
						<h2>
							<div class="date">
								<div class="month"><?php echo date('M', $date); ?></div>
								<div class="day"><?php echo date('d', $date); ?></div>
							</div>
							<?php echo $title; ?>
						</h2>
						<p><?php echo $content; ?></p>
						<p><a href="<?php echo site_url('/calendar/'); ?>">Read More</a></p>
					</article>
<?php
					}
?>
				</section>

				<p class="disclaimer">Volunteer UCF will often meet at the UCF Orlando Campus Lake Claire Pavilion before departing to the location where the service event will happen.  At this meeting point participants can choose to offer a ride to other participants or can choose to accept such offers of a ride.  VUCF does not prescreen drivers, and we do not vouch for their vehicles or driving abilities.  Transportation to and from the event is arranged on your own and at your own risk.  VUCF takes no responsibility with regard to the travel arrangements of participants.</p>
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