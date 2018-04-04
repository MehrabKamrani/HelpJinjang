<?php
  header("content-type:application/json");

  $conn = new mysqli("localhost", "root","", "helpjinjang");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $jobID = $_POST['jobID'];
  //$jobID = 1;
  
  $sql = "SELECT job.jobID, title, startDate, endDate, startTime, endTime, salary, description, address, categoryName, qtyOfJobSeekers,status, count(js_job.jobID) as isAssigned FROM job, js_job WHERE job.jobID = '$jobID' AND job.jobID = js_job.jobID";

  if ($result = $conn->query($sql)) {
    $row=mysqli_fetch_assoc($result);
    echo json_encode($row);
  }

  exit();
?>
