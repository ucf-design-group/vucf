<?php /* Template Name: Calendar */ ?>

<?php

// Handle a request to narrow events by category

$query_args = array('post_type' => 'osi-events', 'posts_per_page' => 10, 'orderby' => 'meta_value', 'order' => 'ASC', 'meta_key' => 'oe-form-start', 'meta_value' => time(), 'meta_compare' => '>=');

if (isset($_POST['calendar-form-submit']) && $_POST['calendar-form-submit'] === "View Events")
	$query_args['category_name'] = $_POST['calendar-form-cat'];

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

				<aside>
					<p><a href="#individual-info" class="toggle" id="individual-expand">+ How individual student volunteers sign up for events through Knight Connect:</a></p>
					<div class="toggle" id="individual-info">
						<h3>Step 1: Join KnightConnect</h3>
						<ul>
							<li>Visit the following website: <a href="www.ucf.edu/knightconnect">www.ucf.edu/knightconnect</a></li>
							<li>Click the “Log On” button located on the top right hand corner of the page</li>
							<li>Log in using your PID and myUCF password</li>
							<li>You may be asked to set up a personal profile before proceeding</li>
							<li>Click on “Campus Links” and scroll down to Volunteer UCF</li>
							<li>Individuals must “join” the organization(s) they are volunteering for, like Volunteer UCF before proceeding</li>
						</ul>
						<h3>Step 2: Signing up for an event</h3>
						<ul>
							<li>To sign up for an event, click the “Events” button on the left hand side of the page</li>
							<li>Search and click on the event you are looking for</li>
							<li>You will RSVP for the event on the right hand side of the page and then click the RSVP button when you are done to confirm</li>
						</ul>
					</div>
					<p><a href="#rso-info" class="toggle" id="rso-expand">+ How UCF Registered Student Organization (RSO) and students log Service Hours through Knight Connect:</a></p>
					<div class="toggle" id="rso-info">
						<ul>
							<li>Visit the following website: <a href="www.ucf.edu/knightconnect">www.ucf.edu/knightconnect</a></li>
							<li>Click the “Log On” button located on the top right hand corner of the page</li>
							<li>Log in using your PID and myUCF password</li>
							<li>You may be asked to set up a personal profile before proceeding</li>
							<li>Click on “Organizations” and scroll down until you find your organization</li>
							<li>Individuals must “join” the organization before proceeding</li>
						</ul>
						<h3>Individual Students:</h3>
						<ul>
							<li>Click on “Service Hours” on the left hand side of the RSO Knight Connect Page</li>
							<li>Record a new entry including your name, date, description, and number of hours, then submit</li>
							<li>Please note that your submission of service hours will be pending until approved by the Registered Student Organization of which you served with</li>
						</ul>
						<h3>RSO Leaders:</h3>
						<ul>
							<li>As the administrator (President, VP, Secretary, etc.), you will simply type in the name of the member of your organization that you are recording hours for within each new entry including members’ name, date, description, and number of hours, then submit</li>
							<li>As an administrator recording service hours for the members of your organization, once the hours have been submitted for any given student, it will automatically be approved</li>
						</ul>
					</div>
				</aside>

				<section class="events">
					<h1>upcoming events</h1>

					<form action="<?php echo site_url('/calendar/'); ?>" method="post">
						<p><label for="calendar-form-cat">Choose a Social Interest to narrow the list of events:</label></p>
						<p><select name="calendar-form-cat" id="calendar-form-cat">
<?php
						$categories = get_categories(array('type' => 'post'));

						foreach ($categories as $category) {
							$value = $category->slug;
							$name = $category->cat_name;
?>
							<option value="<?php echo $value; ?>"><?php echo $name; ?></option>
<?php
						}
?>
						</select>
						<input type="submit" name="calendar-form-submit" value="View Events"></p>
					</form>

<?php 					
					$eventLoop = new WP_QUERY($query_args);
					while ($eventLoop->have_posts()) {
						$eventLoop->the_post();

						$title = get_the_title();
						$content = get_the_content();

						$start = get_post_meta($post->ID, 'oe-form-start', true);
						$end = get_post_meta($post->ID, 'oe-form-end', true);

						$location = get_post_meta($post->ID, 'oe-form-loc', true);
						$contact = get_post_meta($post->ID, 'oe-form-contact', true);
						$url = get_post_meta($post->ID, 'oe-form-url', true);
						$notes = get_post_meta($post->ID, 'oe-form-notes', true);

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
						<h2>
							<div class="date">
								<div class="month"><?php echo date('M', $start); ?></div>
								<div class="day"><?php echo date('d', $start); ?></div>
							</div>
							<?php echo $title; ?>
						</h2>
						<div class="event-main">
							<p><?php echo $content; ?></p>
						</div>
<?php
					if ($location || $contact || $url || $notes) {
?>
						<div class="details">
							<p class="dates"><?php echo $dates; ?></p>
<?php
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
?>
						</div>
<?php
					}
?>
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
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<?php get_footer(); ?>