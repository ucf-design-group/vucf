<?php

define('NO_SUBMIT', 0);

define('EMPTY_ORGNAME', 1);
define('EMPTY_EVENTNAME', 2);
define('EMPTY_DATE', 3);
define('EMPTY_LOC', 4);
define('EMPTY_DESC', 5);

define('EMPTY_USERSNAME', 6);
define('EMPTY_USERPHONE', 7);
define('EMPTY_USEREMAILADDRESS', 8);

define('INVAL_EMAIL', 9);
define('SUCCESS', 10);
define('FAILURE', 11);
define('INVAL_CAPTCHA', 12);

$status = NO_SUBMIT;

if (isset($_POST['needvolunteers']) && $_POST['needvolunteers'] == 'Submit')
	$status = sendMail();

//var_dump(error_get_last());
//var_dump($_POST);

function sendMail() {

	ini_set("SMTP", "ucfsmtp1.mail.ucf.edu");

	if (!isset($_POST['orgname']) || $_POST['orgname'] == '')
		return EMPTY_ORGNAME;
	else if (!isset($_POST['eventname']) || $_POST['eventname'] == '')
		return EMPTY_EVENTNAME;
	else if (!isset($_POST['eventdate']) || $_POST['eventdate'] == '')
		return EMPTY_DATE;
	else if (!isset($_POST['eventlocation']) || $_POST['eventlocation'] == '')
		return EMPTY_LOC;
	else if (!isset($_POST['eventdescription']) || $_POST['eventdescription'] == '')
		return EMPTY_DESC;

	else if (!isset($_POST['usersname']) || $_POST['usersname'] == '')
		return EMPTY_USERSNAME;
	else if (!isset($_POST['useremailaddress']) || $_POST['useremailaddress'] == '')
		return EMPTY_USEREMAILADDRESS;
	else if (!isset($_POST['userphonenumber']) || $_POST['userphonenumber'] == '')
		return EMPTY_USERPHONE;

	if (!filter_var($_POST['useremailaddress'], FILTER_VALIDATE_EMAIL))
		return INVAL_EMAIL;


	$recipient = "vucf_assistant@ucf.edu";
	$subject = "Organization Submission: " . $_POST['orgname'];
	$message = "The following information was submitted using the Need Volunteers form on the VUCF website:\n\n";
	$message .= "About the sender:\n";
	$message .= "    Organization: " . $_POST['orgname'] . "\n";
	$message .= "    Contact: " . $_POST['usersname'] . "\n";
	$message .= "    E-mail: " . $_POST['useremailaddress'] . "\n";
	$message .= "    Phone: " . $_POST['userphonenumber'] . "\n";
	$message .= "    Fax: " . $_POST['userfaxnumber'] . "\n";
	$message .= "    Website: " . $_POST['userwebsite'] . "\n\n";

	$message .= "Additional Information:\n";
	$message .= "    " . $_POST['additionalinfo'] . "\n\n";

	$message .= "Event Information:\n";
	$message .= "    Name: " . $_POST['eventname'] . "\n";
	$message .= "    Date: " . $_POST['eventdate'] . "\n";
	$message .= "    Location: " . $_POST['eventlocation'] . "\n\n";

	$message .= "Event Description:\n";
	$message .= "    " . $_POST['eventdescription'] . "\n\n";

	$message .= "[If you have trouble with these emails, contact AJ at Design Group.]";
	$header = "From: Volunteer UCF Website <vucf@ucf.edu>";

	if (mail($recipient, $subject, $message, $header))
		return SUCCESS;
	else
		return FAILURE;
}

$message = null;

switch ($status) {
		
	case EMPTY_ORGNAME:
		$message = "Please provide the name of your organization.";
		break;
	case EMPTY_EVENTNAME:
		$message = "Please provide the name of the event.";
		break;
	case EMPTY_DATE:
		$message = "Please provide a proposed date for the event.";
		break;
	case EMPTY_LOC:
		$message = "Please provide at least a general idea of where the event will take place.";
		break;
	case EMPTY_DESC:
		$message = "Please describe the event.";
		break;
	case EMPTY_USERSNAME:
		$message = "Please provide your name.";
		break;
	case EMPTY_USERPHONE:
		$message = "Please provide your phone number.";
		break;
	case EMPTY_USEREMAILADDRESS:
		$message = "Please provide your email.";
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

$orgname = '';
$eventname = '';
$eventdate = '';
$eventlocation = '';
$eventdescription = '';

$usersname = '';
$useremailaddress = '';
$userphonenumber = '';
$userfaxnumber = '';
$userwebsite = '';
$additionalinfo = '';

if ($status != SUCCESS && $status != NO_SUBMIT) {

	$orgname = isset($_POST['orgname']) ? $_POST['orgname'] : '';
	$eventname = isset($_POST['eventname']) ? $_POST['eventname'] : '';
	$eventdate = isset($_POST['eventdate']) ? $_POST['eventdate'] : '';
	$eventlocation = isset($_POST['eventlocation']) ? $_POST['eventlocation'] : '';
	$eventdescription = isset($_POST['eventdescription']) ? $_POST['eventdescription'] : '';

	$usersname = isset($_POST['usersname']) ? $_POST['usersname'] : '';
	$useremailaddress = isset($_POST['useremailaddress']) ? $_POST['useremailaddress'] : '';
	$userphonenumber = isset($_POST['userphonenumber']) ? $_POST['userphonenumber'] : '';
	$userfaxnumber = isset($_POST['userfaxnumber']) ? $_POST['userfaxnumber'] : '';
	$userwebsite = isset($_POST['userwebsite']) ? $_POST['userwebsite'] : '';
	$additionalinfo = isset($_POST['additionalinfo']) ? $_POST['additionalinfo'] : '';

}

?>