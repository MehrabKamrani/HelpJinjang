<?php

$email = $_POST['email'];
// Create connection
$conn = new mysqli("localhost", "root","", "helpjinjang");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 


	// The message
$message = "Your function is working. Yeeeey!";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");

$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Send
mail($email, 'Password recovery', $message, $headers);

?>


