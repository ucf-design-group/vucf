<?php /* Template Name: Opportunities */ ?>

<?php

// Handle a request to narrow events by category

$query_args = array('post_type' => 'opportunities', 'posts_per_page' => 20, 'orderby' => 'date', 'order' => 'ASC', 'meta_key' => 'opp-form-end', 'meta_value' => time(), 'meta_compare' => '>=');

?>

<?php get_header(); ?>

			<div class="content-area">
				<div class="main"> 
					<?php
					while (have_posts()) {
						the_post();
						get_template_part( 'content', 'page' );
					} ?>
				</div>

				<section class="events">

<?php 					
					$eventLoop = new WP_QUERY($query_args);
					while ($eventLoop->have_posts()) {
						$eventLoop->the_post();

						$title = get_the_title();
						$content = get_the_content();

						$start = get_post_meta($post->ID, 'opp-form-start', true);
						$end = get_post_meta($post->ID, 'opp-form-end', true);

						$location = get_post_meta($post->ID, 'opp-form-loc', true);
						$contact = get_post_meta($post->ID, 'opp-form-contact', true);
						$url = get_post_meta($post->ID, 'opp-form-url', true);
						$notes = get_post_meta($post->ID, 'opp-form-notes', true);

						if ($end == "none")
							$dates = date('l F jS, g:ia', $start);
						else if (date('F j', $start) == date('F j', $end))
							$dates = date('l F jS, g:ia', $start) . " - " . date('g:ia', $end);
						else
							$dates = date('F jS, g:ia', $start) . " to " . date('F jS, g:ia', $end);

						if ($location == "") $location = false;
						if ($contact == "") $contact = false;
						if ($url == "") $url = false;
						if ($notes == "") $notes = false;
?>
					<article class="event">
						<h2><a href="#">
							<div class="date">
								<div class="month"><?php echo date('M', $start); ?></div>
								<div class="day"><?php echo date('d', $start); ?></div>
							</div><?php echo $title; ?>
						</a></h2>
						<div class="event-toggle">
							<div class="event-main">
								<p><?php echo $content; ?></p>
							</div>

							<div class="details">
<?php
						if ($location || $contact || $url || $notes) {
							if ($location) {
?>
								<p class="location"><em>Location:</em> <?php echo $location; ?></p>
<?php
							}
?>
<?php
							if ($contact) {
?>
								<p class="contact"><em>Contact:</em> <a href="mailto:<?php echo $contact; ?>"><?php echo $contact; ?></a></p>
<?php
							}
?>
<?php
							if ($url) {
?>
								<p class="url"><em>Website:</em> <a href="<?php echo $url; ?>"><?php echo $url; ?></a></p>
<?php
							}
?>
<?php
							if ($notes) {
?>
								<p class="notes"><em>More Information:</em> <?php echo $notes; ?></p>
<?php
							}
						}
?>
							</div>

						</div>
						<p class="dates"><?php echo $dates; ?></p>

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