<?php

define('NO_SUBMIT', 0);
define('EMPTY_USERSNAME', 1);
define('EMPTY_USERPHONE', 2);
define('EMPTY_USEREMAILADDRESS', 3);
define('EMPTY_DAY', 4);
define('EMPTY_TIME', 5);
define('INVAL_EMAIL', 6);
define('SUCCESS', 7);
define('FAILURE', 8);
define('INVAL_CAPTCHA', 9);

$status = NO_SUBMIT;

if (isset($_POST['volunteer']) && $_POST['volunteer'] == 'Submit')
	$status = sendMail();

//var_dump(error_get_last());
// var_dump($_POST['form-communication']);

function sendMail() {

	ini_set("SMTP", "ucfsmtp1.mail.ucf.edu");

	if (!isset($_POST['usersname']) || $_POST['usersname'] == '')
		return EMPTY_USERSNAME;
	else if (!isset($_POST['useremailaddress']) || $_POST['useremailaddress'] == '')
		return EMPTY_USEREMAILADDRESS;
	else if (!isset($_POST['userphonenumber']) || $_POST['userphonenumber'] == '')
		return EMPTY_USERPHONE;
	if ((!isset($_POST['form-day-monday']) || $_POST['form-daytext-monday'] == '') && 
		(!isset($_POST['form-day-tuesday']) || $_POST['form-daytext-tuesday'] == '') && 
		(!isset($_POST['form-day-wednesday']) || $_POST['form-daytext-wednesday'] == '') && 
		(!isset($_POST['form-day-thursday']) || $_POST['form-daytext-thursday'] == '') && 
		(!isset($_POST['form-day-friday']) || $_POST['form-daytext-friday'] == ''))
		return EMPTY_DAY;
	if (!filter_var($_POST['useremailaddress'], FILTER_VALIDATE_EMAIL))
		return INVAL_EMAIL;


	$interests = "Selected Interest:  ";
	$area = isset($_POST['form-interests']) ? $_POST['form-interests'] : 'None';
	$area = str_replace("+", " and ", $area);
	$area = str_replace("-", " ", $area);
	$interests .= $area . "\n";


	$communication = isset($_POST['form-communication']) ? $_POST['form-communication'] : 'None Selected';


	$week = array("monday", "tuesday", "wednesday", "thursday", "friday");
	$available = "Availability:\n";
	foreach ($week as $day) {
		if (isset($_POST['form-day-' . $day]) && $_POST['form-daytext-' . $day] != '')
			$available .= "    " . ucwords($day) . ", " . $_POST['form-daytext-' . $day] . "\n";
	}


	$recipient = "vucf_assistant@ucf.edu";
	$subject = "Volunteer Submission: " . $_POST['usersname'];
	$message = "The following information was submitted using the Volunteer form on the VUCF website:\n\n";
	$message .= "From: " . $_POST['usersname'] . " <" . $_POST['userphonenumber'] . "> <" . $_POST['useremailaddress'] . ">" . "\n\n";
	
	$message .= $interests . "\n";
	$message .= "Level of Commitment: " . $_POST['commitment'] . "\n\n";
	$message .= "Preferred Method of Communication: " . $communication . "\n\n";
	$message .= $available . "\n";
	$message .= "Need Transportation: " . $_POST['form-transport'] . "\n\n";

	$message .= "[If you have trouble with these emails, contact AJ at Design Group.]";
	$header = "From: Volunteer UCF Website <vucf@ucf.edu>";

	if (mail($recipient, $subject, $message, $header))
		return SUCCESS;
	else
		return FAILURE;
}

$message = null;

switch ($status) {
	case EMPTY_USERSNAME:
		$message = "Please provide your name.";
		break;
	case EMPTY_USERPHONE:
		$message = "Please provide your phone number.";
		break;
	case EMPTY_USEREMAILADDRESS:
		$message = "Please provide your email.";
		break;
	case EMPTY_DAY:
		$message = "Please select at least one day and time.";
		break;
	case INVAL_EMAIL:
		$message = "Please provide a valid e-mail address.";
		break;
	case SUCCESS:
		$message = "Thank you!  Your information has been submitted.";
		break;
	case FAILURE:
		$message = "So sorry!  Your information could not be submitted.  We're working on this!";
		break;
}
if ($status != SUCCESS && $status != NO_SUBMIT) {
	$usersname = isset($_POST['usersname']) ? $_POST['usersname'] : '';
	$userphonenumber = isset($_POST['userphonenumber']) ? $_POST['userphonenumber'] : '';
	$useremailaddress = isset($_POST['useremailaddress']) ? $_POST['useremailaddress'] : '';

	$checked = "checked='checked'";

	$week = array("monday", "tuesday", "wednesday", "thursday", "friday");
	$chosenDays = array("monday" => false, 
		"tuesday" => false, 
		"wednesday" => false, 
		"thursday" => false, 
		"friday" => false);
	foreach ($week as $day)
		if (isset($_POST['form-day-' . $day]) && $_POST['form-daytext-' . $day] != '')
			$chosenDays[$day] = true;
		
}
else {
	$usersname = '';
	$userphonenumber = '';
	$useremailaddress = '';
	$chosenDays = array("monday" => false, 
		"tuesday" => false, 
		"wednesday" => false, 
		"thursday" => false, 
		"friday" => false);
	$checked = '';
}

?>