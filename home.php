<?php /* Template Name: Home */ ?>

<?php get_header(); ?>
			<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

			<div class="content-area">
				
			<section class="updates">
					<div class="main"> 
						<h1 style="font-family: kgsecondchances;">mission statement</h1>
						<?php
						while (have_posts()) {
							the_post();
							get_template_part( 'content', 'page' );
						} ?>
					</div>
				</section>

				<section class="events">
					<div style="margin-left:100px" class="fb-page" data-href="https://www.facebook.com/volunteerucf/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/volunteerucf/"><a href="https://www.facebook.com/volunteerucf/">Volunteer UCF</a></blockquote></div></div>
				</section>
				

				<section class="otherPrograms">
					<h1 style="font-family: kgsecondchances;">our other programs</h1>
					<div style="margin-left:90px;margin-bottom:40px;">
						<a href="http://osi.ucf.edu/vucf/community-connector-program"><img style=" width: 320px;position: relative;bottom: -50px;margin-right: 430px;"src="<?php echo get_stylesheet_directory_uri(); ?>/resources/cclogo.png"></img></a>
						<a href="http://osi.ucf.edu/abp/"><img style="width:200px;"src="<?php echo get_stylesheet_directory_uri(); ?>/resources/ABP.png"></img></a>
					</div>
				</section>
				
				<section class="updates">
					<h1>updates</h1>
<?php 					
					$updateLoop = new WP_QUERY(array('post_type' => 'updates', 'posts_per_page' => 3, 'orderby' => 'date', 'order' => 'DESC', 'meta_key' => 'updates-form-expiration', 'meta_value' => time(), 'meta_compare' => '>='));
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
								<div style="font-family:kgsecondchances;" class="day"><?php echo date('d', $date); ?></div>
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