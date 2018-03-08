	<?php
	session_start();

	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['js_password'];
	$_SESSION['fullname'] = $fullname;
	setcookie('fullname', $fullname, time() + 60 * 60);
	setcookie('email', $email, time() + 60 * 60);
	setcookie('username', $username, time() + 60 * 60);



	// Create connection
	$conn = new mysqli("localhost", "root","", "helpjinjang");

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 


	if (!empty($username) && !empty($password) && !empty($fullname) && !empty($email) && !empty($level)) {


	$sql = "INSERT INTO member (fullname, username, email, password, level)
	VALUES ('$fullname', '$username', '$email', '$password', '$level')";

	//Checking for duplicates
	$dupesql_username_tr = "SELECT * FROM trainer where (username = '$username')";
	$dupesql_email_tr = "SELECT * FROM trainer where (email = '$email')";
	$dupesql_username_mem = "SELECT * FROM member where (username = '$username')";
	$dupesql_email_mem = "SELECT * FROM member where (email = '$email')";


	$duperaw_username_tr = $conn->query($dupesql_username_tr);
	$duperaw_email_tr = $conn->query($dupesql_email_tr);
	$duperaw_username_mem = $conn->query($dupesql_username_mem);
	$duperaw_email_mem = $conn->query($dupesql_email_mem);


	if (mysqli_num_rows($duperaw_username_tr) > 0 || mysqli_num_rows($duperaw_username_mem) > 0) {
		$message = "The username already exists";
		echo "<script type='text/javascript'>alert('$message'); 
			window.location.href = 'signUp.php';</script>";

	}
	else if(mysqli_num_rows($duperaw_email_tr) > 0 || mysqli_num_rows($duperaw_email_mem) > 0){
		$message = "The email already exists";
		echo "<script type='text/javascript'>alert('$message'); 
				window.location.href = 'signUp.php';</script>";
	}

	else{

		if ($conn->query($sql) === TRUE) {
			$message = "New member created successfully";
			setcookie("fullname", "", time()-3600);
			setcookie("username", "", time()-3600);
			setcookie("email", "", time()-3600);
			echo "<script type='text/javascript'>alert('$message');
			window.location.href = 'member_main.php';</script>";
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