<?php
require 'init.php';

$user = array();
$user['visitorIP'] = getIP();
$user['identifier'] = $_COOKIE['_gap'];

//Execute query to Check if user has visited before by checking cookie (_gap) existed or ip address is same
$queryCheck = "SELECT * FROM visitorLogs WHERE visitorIP = '{$user['visitorIP']}' OR identifier = '{$user['identifier']}';";
if(!$conn->connect_errno)
{
	$runCheck = $conn->query($queryCheck);
	//If TRUE, Set 0 else SET 1. 0 -> Visited before, 1 -> Never visited.
	$checkLogs = ($runCheck->num_rows > 0 ? 0 : 1);
}
else
{
	die();
	//SET 0 to prevent code execution;
	$checkLogs = 0;
}

if ($checkLogs == 1)
{
	//Define all field name
	$uniqueIdentifier = getToken(rand(1,50));
	setCookieI("_gap", $uniqueIdentifier, 365, 1);
	$user['userReferrer'] = (isset($_COOKIE['ref']) ? $_COOKIE['ref'] : 'NoReferrer');
	$user['userReferral'] = (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'NoReferral');
	$user['date'] = getDateI();
	$user['time'] = getTime();
	$user['jsonSERVER'] = json_encode($_SERVER);
	$user['jsonCOOKIE'] = json_encode($_COOKIE);

	//FieldName
	$head = '';
	foreach ($user as $key => $value) {
		$head .= '`' . $key . (!each($user) ? '`' : '`, ');
	}
	//FieldValue
	$tail = '';
	foreach ($user as $key => $value) {
		$tail .= '\'' . $value . (!each($user) ? '\'' : '\', ');
	}
	//Combine FieldName & FieldName and Execute query
	$queryLogs = "INSERT INTO `visitorLogs` ($head) VALUES ($tail);";
	$runLogs = $conn->query($queryLogs);
}
// require 'main.config.php';