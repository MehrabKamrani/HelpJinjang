<?php

session_start();
		// Create connection
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['js_password'];
$phoneNo = $_POST['phoneNo'];
$username = $_SESSION['js_username'];


$conn = new mysqli("localhost", "root","", "helpjinjang");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE jobseeker SET js_fullname = '$fullname', js_email = '$email', js_password = '$password', js_phoneNo = '$phoneNo'
WHERE js_username = '$username'";







	// Compare the entered email with assigned one

$assigned_sql_email_js = "SELECT js_email FROM jobseeker where js_username = 'legolas'";
$assigned_row_email_js = mysqli_query($conn, $assigned_sql_email_js) or die(mysqli_error($conn));
$result = mysqli_fetch_assoc($assigned_row_email_js);

$assigned_email = $result['js_email'];

if ($assigned_email != $email) {
	$dupesql_email_cl = "SELECT * FROM client where (client_email = '$email')";
	$dupesql_email_js = "SELECT * FROM jobseeker where (js_email = '$email') and js_username != '$username'";

	$duperaw_email_cl = $conn->query($dupesql_email_cl);
	$duperaw_email_js = $conn->query($dupesql_email_js);


	if(mysqli_num_rows($duperaw_email_cl) > 0 || mysqli_num_rows($duperaw_email_js) > 0){
		$message = "The email already exists";
		echo "<script type='text/javascript'>alert('$message'); 
		window.location.href = 'updateJobSeekerPage.php';</script>";
	}
	else{
		if($conn->query($sql) === TRUE) {
			$message = "JobSeeker details updated successfully";
			$_SESSION['js_fullname'] = $fullname;
			$_SESSION['js_email'] = $email;
			$_SESSION['js_phoneNo'] = $phoneNo;
			echo "<script type='text/javascript'>alert('$message');
			window.location.href = 'jobSeekerPage.php';
			</script>";
		}else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}
}
else
{
	if($conn->query($sql) === TRUE) {
			$message = "JobSeeker details updated successfully";
			$_SESSION['js_fullname'] = $fullname;
			$_SESSION['js_email'] = $email;
			$_SESSION['js_phoneNo'] = $phoneNo;
			echo "<script type='text/javascript'>alert('$message');
			window.location.href = 'jobSeekerPage.php';
			</script>";
		}else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}

$conn->close();


?>