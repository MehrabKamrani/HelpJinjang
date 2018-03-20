<?php

	session_start();
		// Create connection
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$password = $_POST['cl_password'];
	$phoneNo = $_POST['phoneNo'];
	$username = $_SESSION['cl_username'];


	$conn = new mysqli("localhost", "root","", "helpjinjang");

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "UPDATE client SET client_fullname = '$fullname', client_email = '$email', client_password = '$password', client_phoneNo = '$phoneNo'
			WHERE client_username = '$username'";

	$dupesql_email_cl = "SELECT * FROM client where (client_email = '$email')";
	$dupesql_email_js = "SELECT * FROM jobseeker where (js_email = '$email')";


	$duperaw_email_cl = $conn->query($dupesql_email_cl);
	$duperaw_email_js = $conn->query($dupesql_email_js);


 if(mysqli_num_rows($duperaw_email_cl) > 0 || mysqli_num_rows($duperaw_email_js) > 0){
		$message = "The email already exists";
		echo "<script type='text/javascript'>alert('$message'); 
				window.location.href = 'updateClientPage.php';</script>";
	}

	else{
		if($conn->query($sql) === TRUE) {
			$message = "Client details updated successfully";
			$_SESSION['cl_fullname'] = $fullname;
			$_SESSION['cl_email'] = $email;
			$_SESSION['cl_phoneNo'] = $phoneNo;
			echo "<script type='text/javascript'>alert('$message');
			window.location.href = 'clientPage.php';</script>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

$conn->close();


?>