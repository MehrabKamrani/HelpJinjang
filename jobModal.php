<?php
  header("content-type:application/json");

  $conn = new mysqli("localhost", "root","", "helpjinjang");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $jobID = $_POST['jobID'];
  //$jobID = 1;

  $sql = "SELECT * FROM job WHERE jobID = '$jobID'";

  if ($result = $conn->query($sql)) {
    $row=mysqli_fetch_assoc($result);
    echo json_encode($row);
  }

  exit();
?>
