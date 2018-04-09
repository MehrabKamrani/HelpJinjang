<?php
session_start();


// Create connection
$conn = new mysqli("127.0.0.1", "k24tmxzc_umar", "@123456", "k24tmxzc_jingan");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

//Function to create random string password
function generateRandomString($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}


//Initialize variables
$newPassword = generateRandomString();
$email = $_POST["email"];
//$email = "astrid@gmail.com";

$sql_email_cl = "SELECT * FROM client where (client_email = '$email')";
$sql_email_js = "SELECT * FROM jobseeker where (js_email = '$email')";

$raw_email_cl = $conn->query($sql_email_cl);
$raw_email_js = $conn->query($sql_email_js);


if(mysqli_num_rows($raw_email_cl) > 0) //if the user is client
{	
	//Get username based on email
	$sql_username_cl = "SELECT client_username FROM client WHERE client_email = '$email'";
	$row_username_cl = mysqli_query($conn, $sql_username_cl) or die(mysqli_error($conn));
	$result = mysqli_fetch_assoc($row_username_cl);

	$username = $result['client_username'];
	//echo $username;

	//Get fullname for the message
	$sql_fullname_cl = "SELECT client_fullname FROM client WHERE client_username = '$username'";
	$row_fullname_cl = mysqli_query($conn, $sql_fullname_cl) or die(mysqli_error($conn));
	$result = mysqli_fetch_assoc($row_fullname_cl);

	$fullname = $result['client_fullname'];
	//echo $fullname;

	// Prepare the message
	$message = "Dear $fullname,\r\n\r\nYour new password is \"$newPassword\"";
	// In case any of our lines are larger than 70 characters, we should use wordwrap()
	$message = wordwrap($message, 70, "\r\n");
	//headers
	$headers = 'From: help@jinjang.com' . "\r\n" . $email;
	//Send 
	mail($email, 'Password Recovery', $message, $headers);

	$sql_update_psw_cl = "UPDATE client SET client_password = '$newPassword'
			WHERE client_username = '$username'";

	$row_update_psw_cl = mysqli_query($conn, $sql_update_psw_cl) or die(mysqli_error($conn));


	echo "<script type='text/javascript'>alert('New password has been sent to your email');
	</script>";


}else if(mysqli_num_rows($raw_email_js) > 0) //if the user is jobseeker
{
	//Get username based on email
	$sql_username_js = "SELECT js_username FROM jobseeker WHERE js_email = '$email'";
	$row_username_js = mysqli_query($conn, $sql_username_js) or die(mysqli_error($conn));
	$result = mysqli_fetch_assoc($row_username_js);

	$username = $result['js_username'];
	//echo $username;

	//Get fullname for the message
	$sql_fullname_js = "SELECT js_fullname FROM jobseeker WHERE js_username = '$username'";
	$row_fullname_js = mysqli_query($conn, $sql_fullname_js) or die(mysqli_error($conn));
	$result = mysqli_fetch_assoc($row_fullname_js);

	$fullname = $result['js_fullname'];
	//echo $fullname;
	// Prepare the message
	$message = "Dear $fullname,\r\n\r\nYour new password is \"$newPassword\"";
	// In case any of our lines are larger than 70 characters, we should use wordwrap()
	$message = wordwrap($message, 70, "\r\n");
	//header
	$headers = 'From: help@jinjang.com' . "\r\n" . $email;
	//Send 
	mail($email, 'Password Recovery', $message, $headers);

	$sql_update_psw_js = "UPDATE jobseeker SET js_password = '$newPassword'
			WHERE js_username = '$username'";

	$row_update_psw_js = mysqli_query($conn, $sql_update_psw_js) or die(mysqli_error($conn));

	echo "<script type='text/javascript'>alert('New password has been sent to your email');
	</script>";


}else //if email is not found in the system do ot send message, but alert a message
{
	echo "<script type='text/javascript'>alert('Email does not exist in our system');
	window.location.href = 'forgotPassword.php';</script>";
}


$conn->close();

?>
