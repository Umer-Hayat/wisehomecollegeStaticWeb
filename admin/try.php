<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'ACa63c1332ddc1771c834ee386253ba7b4';
$auth_token = '407e3c92de492256d730eb68a2376fca';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+18454434239";

$client = new Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+923178279876',
    array(
        'from' => $twilio_number,
        'body' => 'Your Fee is pending Kindly Pay your fee as soon as possible'
    )
);
echo "massege Send";
?>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form>
		<input type="text" name="massege">
		<input type="submit" name="submit">
	</form>
</body>
</html> -->