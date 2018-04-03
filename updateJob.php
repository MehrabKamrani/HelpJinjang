<?php

	session_start();
	$date = $_POST['date'];
	$time = $_POST['time'];
	$fee = $_POST['fee'];
	$status = $_POST['statusOptions'];
	$type = $_POST['typeOptions'];
	$notes = $_POST['notes'];
	$session_id = $_POST['session_id'];

	//Setting max number of participants if there is
	if (isset($_POST['maxParticipants'])) {
		$max_num_part = $_POST['maxParticipants'];
		}
	else {
		$max_num_part = 1;
		}

	$conn = new mysqli("localhost", "root","", "proteinshape");

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "UPDATE training_session SET session_date = '$date', session_time = '$time', fee = '$fee', max_num_part = '$max_num_part', status = '$status', type = '$type', notes = '$notes'
			WHERE session_id = '$session_id'";

	if($conn->query($sql) === TRUE) {
			$message = "Trainer details updated successfully";
			echo "<script type='text/javascript'>alert('$message');
			window.location.href = 'trainer_main.php';</script>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}


	$conn->close();

?>
