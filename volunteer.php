<?php /* Template Name: Volunteer */

include_once(ABSPATH . "wp-content/themes/vucf/resources/wantvol.php");

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
					<form action="<?php echo site_url('/volunteer/'); ?>" method="POST">
						<h1>Student Volunteer Form</h1>
<?php
						if ($message) {
?>
						<p id="alert"><?php echo $message; ?></p>
<?php
						}
?>
						<fieldset class="contact">
							<legend>Student Information:</legend>
							<label for="usersname">Your Name:</label>
							<input type="text" name="usersname" value="<?php echo $usersname; ?>"><br>
							<label for="useremailaddress">E-Mail:</label>
							<input type="email" name="useremailaddress" value="<?php echo $useremailaddress; ?>"><br>
							<label for="userphonenumber">Phone:</label>
							<input type="tel" name="userphonenumber" value="<?php echo $userphonenumber; ?>"><br>
						</fieldset>

						<fieldset>
							<legend>Please select the top three social topics that interest you most:</legend>
							<table>
								<tr>
									<td class="radio-label">1st</td>
									<td class="radio-label">2nd</td>
									<td class="radio-label">3rd</td>
								</tr>
								<tr>
									<td><input type="radio" name="form-interests1" <?php echo $_POST["form-interests1"] == 'Animals' ? $checked : ''; ?> value="Animals"></td>
									<td><input type="radio" name="form-interests2" <?php echo $_POST["form-interests2"] == 'Animals' ? $checked : ''; ?> value="Animals"></td>
									<td><input type="radio" name="form-interests3" <?php echo $_POST["form-interests3"] == 'Animals' ? $checked : ''; ?> value="Animals"></td>
									<td>Animals</td>
								</tr>
								<tr>
									<td><input type="radio" name="form-interests1" <?php echo $_POST["form-interests1"] == 'Arts+Recreation' ? $checked : ''; ?> value="Arts+Recreation"></td>
									<td><input type="radio" name="form-interests2" <?php echo $_POST["form-interests2"] == 'Arts+Recreation' ? $checked : ''; ?> value="Arts+Recreation"></td>
									<td><input type="radio" name="form-interests3" <?php echo $_POST["form-interests3"] == 'Arts+Recreation' ? $checked : ''; ?> value="Arts+Recreation"></td>
									<td>Arts and Recreation</td>
								</tr>
								<tr>
									<td><input type="radio" name="form-interests1" <?php echo $_POST["form-interests1"] == 'Civic-Engagement' ? $checked : ''; ?> value="Civic-Engagement"></td>
									<td><input type="radio" name="form-interests2" <?php echo $_POST["form-interests2"] == 'Civic-Engagement' ? $checked : ''; ?> value="Civic-Engagement"></td>
									<td><input type="radio" name="form-interests3" <?php echo $_POST["form-interests3"] == 'Civic-Engagement' ? $checked : ''; ?> value="Civic-Engagement"></td>
									<td>Civic Engagement</td>
								</tr>
								<tr>
									<td><input type="radio" name="form-interests1" <?php echo $_POST["form-interests1"] == 'Different-Abilities' ? $checked : ''; ?> value="Different-Abilities"></td>
									<td><input type="radio" name="form-interests2" <?php echo $_POST["form-interests2"] == 'Different-Abilities' ? $checked : ''; ?> value="Different-Abilities"></td>
									<td><input type="radio" name="form-interests3" <?php echo $_POST["form-interests3"] == 'Different-Abilities' ? $checked : ''; ?> value="Different-Abilities"></td>
									<td>Different Abilities</td>
								</tr>
								<tr>
									<td><input type="radio" name="form-interests1" <?php echo $_POST["form-interests1"] == 'Domestic-Violence' ? $checked : ''; ?> value="Domestic-Violence"></td>
									<td><input type="radio" name="form-interests2" <?php echo $_POST["form-interests2"] == 'Domestic-Violence' ? $checked : ''; ?> value="Domestic-Violence"></td>
									<td><input type="radio" name="form-interests3" <?php echo $_POST["form-interests3"] == 'Domestic-Violence' ? $checked : ''; ?> value="Domestic-Violence"></td>
									<td>Domestic Violence</td>
								</tr>
								<tr>
									<td><input type="radio" name="form-interests1" <?php echo $_POST["form-interests1"] == 'Education+Literacy' ? $checked : ''; ?> value="Education+Literacy"></td>
									<td><input type="radio" name="form-interests2" <?php echo $_POST["form-interests2"] == 'Education+Literacy' ? $checked : ''; ?> value="Education+Literacy"></td>
									<td><input type="radio" name="form-interests3" <?php echo $_POST["form-interests3"] == 'Education+Literacy' ? $checked : ''; ?> value="Education+Literacy"></td>
									<td>Education and Literacy</td>
								</tr>
								<tr>
									<td><input type="radio" name="form-interests1" <?php echo $_POST["form-interests1"] == 'Elderly+Veterans' ? $checked : ''; ?> value="Elderly+Veterans"></td>
									<td><input type="radio" name="form-interests2" <?php echo $_POST["form-interests2"] == 'Elderly+Veterans' ? $checked : ''; ?> value="Elderly+Veterans"></td>
									<td><input type="radio" name="form-interests3" <?php echo $_POST["form-interests3"] == 'Elderly+Veterans' ? $checked : ''; ?> value="Elderly+Veterans"></td>
									<td>Elderly and Veterans</td>
								</tr>
								<tr>
									<td><input type="radio" name="form-interests1" <?php echo $_POST["form-interests1"] == 'Environment' ? $checked : ''; ?> value="Environment"></td>
									<td><input type="radio" name="form-interests2" <?php echo $_POST["form-interests2"] == 'Environment' ? $checked : ''; ?> value="Environment"></td>
									<td><input type="radio" name="form-interests3" <?php echo $_POST["form-interests3"] == 'Environment' ? $checked : ''; ?> value="Environment"></td>
									<td>Environment</td>
								</tr>
								<tr>
									<td><input type="radio" name="form-interests1" <?php echo $_POST["form-interests1"] == 'Health' ? $checked : ''; ?> value="Health"></td>
									<td><input type="radio" name="form-interests2" <?php echo $_POST["form-interests2"] == 'Health' ? $checked : ''; ?> value="Health"></td>
									<td><input type="radio" name="form-interests3" <?php echo $_POST["form-interests3"] == 'Health' ? $checked : ''; ?> value="Health"></td>
									<td>Health</td>
								</tr>
								<tr>
									<td><input type="radio" name="form-interests1" <?php echo $_POST["form-interests1"] == 'Hunger+Homelessness' ? $checked : ''; ?> value="Hunger+Homelessness"></td>
									<td><input type="radio" name="form-interests2" <?php echo $_POST["form-interests2"] == 'Hunger+Homelessness' ? $checked : ''; ?> value="Hunger+Homelessness"></td>
									<td><input type="radio" name="form-interests3" <?php echo $_POST["form-interests3"] == 'Hunger+Homelessness' ? $checked : ''; ?> value="Hunger+Homelessness"></td>
									<td>Hunger and Homelessness</td>
								</tr>
								<tr>
									<td><input type="radio" name="form-interests1" <?php echo $_POST["form-interests1"] == 'Save-8-Designate' ? $checked : ''; ?> value="Save-8-Designate"></td>
									<td><input type="radio" name="form-interests2" <?php echo $_POST["form-interests2"] == 'Save-8-Designate' ? $checked : ''; ?> value="Save-8-Designate"></td>
									<td><input type="radio" name="form-interests3" <?php echo $_POST["form-interests3"] == 'Save-8-Designate' ? $checked : ''; ?> value="Save-8-Designate"></td>
									<td>Save 8 Designate (Organ &amp; Tissue Donation Awareness)</td>
								</tr>
								<tr>
									<td><input type="radio" name="form-interests1" <?php echo $_POST["form-interests1"] == 'Youth+Mentoring' ? $checked : ''; ?> value="Youth+Mentoring"></td>
									<td><input type="radio" name="form-interests2" <?php echo $_POST["form-interests2"] == 'Youth+Mentoring' ? $checked : ''; ?> value="Youth+Mentoring"></td>
									<td><input type="radio" name="form-interests3" <?php echo $_POST["form-interests3"] == 'Youth+Mentoring' ? $checked : ''; ?> value="Youth+Mentoring"></td>
									<td>Youth and Mentoring</td>
								</tr>
							</table>
							<br>
							<label for="form-interest-other">Other Area: </label><input type="text" name="form-interest-other" id="form-interest-other" value="<?php echo $_POST['form-interest-other']; ?>">
						</fieldset>

						<fieldset>
							<legend>What type of commitment fits you?</legend>
							<input type="radio" name="commitment" id="form-radio-one" <?php echo $_POST['commitment'] == 'One Time' ? $checked : ''; ?> value="One Time"> <label for="form-radio-one">One Time Service</label><br>
							<input type="radio" name="commitment" id="form-radio-short" <?php echo $_POST['commitment'] == 'Short Term' ? $checked : ''; ?> value="Short Term"> <label for="form-radio-short">Short Term (fewer than 20 hours)</label><br>
							<input type="radio" name="commitment" id="form-radio-long" <?php echo $_POST['commitment'] == 'Long Term' ? $checked : ''; ?> value="Long Term"> <label for="form-radio-long">Long Term / Ongoing (more than 20 hours)</label><br>
						</fieldset>

						<fieldset class="communication">
							<legend>What is your preferred method of communication?</legend>
							<input type ="radio" name="form-communication" id="form-comm-office" <?php echo $_POST['form-communication'] == 'Office' ? $checked : ''; ?> value="Office"><label for ="form-comm-office">In office (Student Union 208)</label><br>
							<input type ="radio" name="form-communication" id="form-comm-phone" <?php echo $_POST['form-communication'] == 'Phone' ? $checked : ''; ?> value="Phone"><label for ="form-comm-phone">Via Phone Call</label><br>
							<input type ="radio" name="form-communication" id="form-comm-email" <?php echo $_POST['form-communication'] == 'Email' ? $checked : ''; ?>value="Email"><label for ="form-comm-email">Via Email with a list of community organization contacts</label><br>
						</fieldset>

						<fieldset class="meeting">
							<legend>Days / Times you are available for consultation:</legend>
							<input type="checkbox" name="form-day-monday" id="form-day-monday" <?php echo $chosenDays['monday'] ? $checked : ''; ?>>
							<label for="form-day-monday" class="daylabel">Monday</label>
							<label for="form-daytext-monday">Time</label>
							<input type="text" name="form-daytext-monday" value="<?php echo $chosenDays['monday'] ? $_POST['form-daytext-monday'] : ''; ?>"><br>

							<input type="checkbox" name="form-day-tuesday" id="form-day-tuesday" <?php echo $chosenDays['tuesday'] ? $checked : ''; ?>>
							<label for="form-day-tuesday" class="daylabel">Tuesday</label>
							<label for="form-daytext-tuesday">Time</label>
							<input type="text" name="form-daytext-tuesday" value="<?php echo $chosenDays['tuesday'] ? $_POST['form-daytext-tuesday'] : ''; ?>"><br>

							<input type="checkbox" name="form-day-wednesday" id="form-day-wednesday" <?php echo $chosenDays['wednesday'] ? $checked : ''; ?>>
							<label for="form-day-wednesday" class="daylabel">Wednesday</label>
							<label for="form-daytext-wednesday">Time</label>
							<input type="text" name="form-daytext-wednesday" value="<?php echo $chosenDays['wednesday'] ? $_POST['form-daytext-wednesday'] : ''; ?>"><br>

							<input type="checkbox" name="form-day-thursday" id="form-day-thursday" <?php echo $chosenDays['thursday'] ? $checked : ''; ?>>
							<label for="form-day-thursday" class="daylabel">Thursday</label>
							<label for="form-daytext-thursday">Time</label>
							<input type="text" name="form-daytext-thursday" value="<?php echo $chosenDays['thursday'] ? $_POST['form-daytext-thursday'] : ''; ?>"><br>

							<input type="checkbox" name="form-day-friday" id="form-day-friday" <?php echo $chosenDays['friday'] ? $checked : ''; ?>>
							<label for="form-day-friday" class="daylabel">Friday</label>
							<label for="form-daytext-friday">Time</label>
							<input type="text" name="form-daytext-friday" value="<?php echo $chosenDays['friday'] ? $_POST['form-daytext-friday'] : ''; ?>"><br>
						</fieldset>


						<fieldset class="transport">
							<legend>Do you need transportation to volunteer off-campus?</legend>
							<input type="radio" name="form-transport" id="form-transport-no" <?php echo $_POST['form-transport'] == "No" ? $checked : ''; ?> value="No"><label for="form-transport-no">No</label>
							<input type="radio" name="form-transport" id="form-transport-yes" <?php echo $_POST['form-transport'] == "Yes" ? $checked : ''; ?> value="Yes"><label for="form-transport-yes">Yes</label>
						</fieldset>

						<input type="submit" name="volunteer" class="button" value="Submit">
						<input type="reset" class="button" value="Reset">
					</form>
				</section>
			</div>

<?php get_footer(); ?>