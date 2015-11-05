<?php /* Template Name: Need Vols */

include_once(ABSPATH . "wp-content/themes/vucf/resources/needvol.php");

get_header(); ?>

			<div class="content-area">
				<div class="main"> 
					<?php
					while (have_posts()) {
						the_post();
						get_template_part( 'content', 'page' );
					} ?>
				</div>
				
				<section class="form">
					<form action="<?php echo site_url('/need-volunteers/') ?>" method="POST">
						<h1>Need Volunteers?</h1>
<?php
						if ($message) {
?>
						<p id="alert"><?php echo $message; ?></p>
<?php
						}
?>
						<fieldset class="eventinfo">
							<legend>Event Information:</legend>
							<label for="orgname">Name of Organization:</label>
							<input type="text" name="orgname" value="<?php echo $orgname; ?>"><br>
							<label for="eventname">Event Name:</label>
							<input type="text" name="eventname" value="<?php echo $eventname; ?>"><br>
							<label for="eventdate">Event Date:</label>
							<input type="text" name="eventdate" value="<?php echo $eventdate; ?>"><br>
							<label for="eventlocation">Event Location:</label>
							<input type="text" name="eventlocation" value="<?php echo $eventlocation; ?>"><br>
							<label for="eventdescription" class="textarea">Event Description:</label><br>
							<textarea name="eventdescription" id="eventdescription"><?php echo $eventdescription; ?></textarea><br>
						</fieldset>

						<fieldset class="contact">
							<legend>Contact Information:</legend>
							<label for="usersname">Organization Contact:</label>
							<input type="text" name="usersname" value="<?php echo $usersname; ?>"><br>
							
							<label for="useremailaddress">E-Mail:</label>
							<input type="email" name="useremailaddress" value="<?php echo $useremailaddress; ?>"><br>
							
							<label for="userphonenumber">Phone:</label>
							<input type="tel" name="userphonenumber" value="<?php echo $userphonenumber; ?>"><br>
							
							<label for="userfaxnumber">Fax:</label>
							<input type="tel" name="userfaxnumber" value="<?php echo $userfaxnumber; ?>"><br>
							
							<label for="userwebsite">Website:</label>
							<input type="url" name="userwebsite" value="<?php echo $userwebsite; ?>"><br>

							<label for="additionalinfo" class="textarea">Additional Information:</label><br>
							<textarea name="additionalinfo" id="additionalinfo"><?php echo $additionalinfo; ?></textarea><br>
						</fieldset>

						<input type="submit" name="needvolunteers" class="button" value="Submit">
						<input type="reset" class="button" value="Reset">
					</form>
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