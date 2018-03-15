<?php
session_start();
$client_username = $_SESSION["cl_username"];
$title = $_POST['title'];
$startDate = $_POST['startingDate'];
$endDate = $_POST['endingDate'];
$startTime = $_POST['startingTime'];
$endTime = $_POST['endingTime'];
$salary = $_POST['salary'];
$qtyOfJobSeekers = $_POST['qtyOfJobSeekers'];
$categoryName = $_POST['category'];
$address = $_POST['address'];
$description = $_POST['description'];
$status = "upcoming";
$isAvailable = "TRUE";

$conn = new mysqli("localhost", "root","", "helpjinjang");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO job (title, startDate, endDate, startTime, endTime, salary, description, address, categoryName, client_username, status, isAvailable, qtyOfJobSeekers) VALUES
('$title', '$startDate', '$endDate', '$startTime', '$endTime', '$salary', '$description', '$address', '$categoryName', '$client_username', '$status', '$isAvailable', '$qtyOfJobSeekers')";

if ($conn->query($sql) === TRUE) {
  $message = "New Job is Posted Successfully";
	echo "<script type='text/javascript'>alert('$message');
	window.location.href = 'client_main.php';
	</script>";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
