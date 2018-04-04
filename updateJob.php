<?php

	session_start();
	$startDate = $_POST['start_date'];
	$endDate = $_POST['end_date'];
	$startTime = $_POST['start_time'];
	$endTime = $_POST['end_time'];
	$salary = $_POST['salary'];
	$maxJobseekers = $_POST['maxJobseekers'];
	$description = $_POST['description'];
	$jobID = $_POST['jobID'];

	

	$conn = new mysqli("localhost", "root","", "helpjinjang");

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "UPDATE job SET startDate = '$startDate', endDate = '$endDate', startTime = '$startTime', endTime = '$endTime', salary = '$salary', qtyOfJobSeekers = '$maxJobseekers', description = '$description'
			WHERE jobID = '$jobID'";

	if($conn->query($sql) === TRUE) {
			$message = "Job details updated successfully";
			echo "<script type='text/javascript'>alert('$message');
			window.location.href = 'clientPage.php';</script>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}


	$conn->close();

?>
