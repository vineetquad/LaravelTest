<?php  
function andiPush($token, $header, $message, $badge, $section = 0, $keys = '', $emergency = 0)
{
	$token			=	$token;
	$message		=	$message;
	$badge			=	$badge;
	$apiKey = "AAAAHxq186Y:APA91bF0Q8FHrscNGk5h1PmYboO0TNfZKHCr5fj6iVmYxLYFBL-RwlQont2TxvKGDJbpcdIAL9XRHIdv6xEgfUDzGMf2bC3aAAZB6YbTDUj591JUx6cFUqdYPyFpn0iYAtMBhLtq4TIU";
	$url = 'https://fcm.googleapis.com/fcm/send';
	$fields = array(
		'registration_ids'  => array($token),
		'data'              => array("message" => $message, 'badge' => $badge, 'section' => $section, 'keys' => $keys, 'emergency' => $emergency)
	);
	//dump($fields);
	$headers = array(
		'Authorization: key=' . $apiKey,
		'Content-Type: application/json'
	);
	// Open connection
	$ch = curl_init();
	// Set the url, number of POST vars, POST data
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	$result = curl_exec($ch);
	curl_close($ch);
	$var = json_decode($result, true);
	//dump($var);
	return $var['success'];
}