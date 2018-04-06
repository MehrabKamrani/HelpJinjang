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

// Compare the entered email with assigned one
$assigned_sql_email_cl = "SELECT client_email FROM client where client_username = '$username'";
$assigned_row_email_cl = mysqli_query($conn, $assigned_sql_email_cl) or die(mysqli_error($conn));
$result = mysqli_fetch_assoc($assigned_row_email_cl);

$assigned_email = $result['client_email'];


//Only if email is different with already assigned one check others
if ($assigned_email != $email) {
	$dupesql_email_cl = "SELECT * FROM client where (client_email = '$email') and client_username != '$username'";
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

}else
{
	if($conn->query($sql) === TRUE) {
			$message = "Client details updated successfully";
			$_SESSION['cl_fullname'] = $fullname;
			$_SESSION['cl_email'] = $email;
			$_SESSION['cl_phoneNo'] = $phoneNo;
			echo "<script type='text/javascript'>alert('$message');
			window.location.href = 'clientPage.php';
			</script>";
		}else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}

$conn->close();


?>