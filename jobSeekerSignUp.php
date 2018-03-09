	<?php
	session_start();

	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['js_password'];
	$phoneNo = $_POST['phoneNo'];

	$_SESSION['fullname'] = $fullname;
	setcookie('fullname', $fullname, time() + 60 * 60);
	setcookie('email', $email, time() + 60 * 60);
	setcookie('username', $username, time() + 60 * 60);
	setcookie('phoneNo', $phoneNo, time() + 60 * 60);




	// Create connection
	$conn = new mysqli("localhost", "root","", "helpjinjang");

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 


	if (!empty($username) && !empty($password) && !empty($fullname) && !empty($email) && !empty($phoneNo)) {


	$sql = "INSERT INTO jobseeker (js_username, js_fullname, js_email, js_phoneNo, js_password)
	VALUES ('$username', '$fullname', '$email', '$phoneNo', '$password')";

	//Checking for duplicates
	$dupesql_username_cl = "SELECT * FROM client where (cl_username = '$username')";
	$dupesql_email_cl = "SELECT * FROM client where (cl_email = '$email')";
	$dupesql_username_js = "SELECT * FROM jobseeker where (js_username = '$username')";
	$dupesql_email_js = "SELECT * FROM jobseeker where (js_email = '$email')";


	$duperaw_username_cl = $conn->query($dupesql_username_cl);
	$duperaw_email_cl = $conn->query($dupesql_email_cl);
	$duperaw_username_js = $conn->query($dupesql_username_js);
	$duperaw_email_js = $conn->query($dupesql_email_js);


	if (mysqli_num_rows($duperaw_username_cl) > 0 || mysqli_num_rows($duperaw_username_js) > 0) {
		$message = "The username already exists";
		echo "<script type='text/javascript'>alert('$message'); 
			window.location.href = 'signUp.php';</script>";

	}
	else if(mysqli_num_rows($duperaw_email_cl) > 0 || mysqli_num_rows($duperaw_email_js) > 0){
		$message = "The email already exists";
		echo "<script type='text/javascript'>alert('$message'); 
				window.location.href = 'signUp.php';</script>";
	}

	else{

		if ($conn->query($sql) === TRUE) {
			$message = "New jobseeker created successfully";
			setcookie("fullname", "", time()-3600);
			setcookie("username", "", time()-3600);
			setcookie("email", "", time()-3600);
			setcookie("phoneNo", "", time()-3600);
			echo "<script type='text/javascript'>alert('$message');
			window.location.href = 'home.php';</script>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}

}
	else{
		$message = "Fill the required fields";
		echo "<script type='text/javascript'>alert('$message'); </script>";
	}


 $conn->close();


?>