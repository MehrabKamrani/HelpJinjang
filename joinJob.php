<?php
session_start();

$conn = new mysqli("localhost", "root", "", "helpjinjang");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$username = $_SESSION['js_username'];

$job_id = $_POST['jobID'];

$sql_insert_jsForJob = "INSERT INTO js_job (js_username, jobID) VALUES ('$username', '$job_id')";
if ($conn->query($sql_insert_jsForJob) === TRUE) {


  $sql_count_jsForJob = "SELECT COUNT(jobID) FROM js_job WHERE jobID = $job_id";
  if ($result = $conn->query($sql_count_jsForJob)) {
    $row=mysqli_fetch_assoc($result);
    $numOfParticipant = $row['COUNT(jobID)'];

    $sql_check_availablity = "SELECT qtyOfJobSeekers FROM job WHERE jobID = $job_id";
    if ($result = $conn->query($sql_check_availablity)) {
      $row=mysqli_fetch_assoc($result);
      $qtyOfJobSeekers = $row['qtyOfJobSeekers'];

      if ($numOfParticipant==$qtyOfJobSeekers) {
        $sql_update_availablity = "UPDATE job SET isAvailable=0 WHERE jobID = $job_id";
        $conn->query($sql_update_availablity);
      }
    }
  }


  $message = "You have joined this job successfully.";
  echo "<script type='text/javascript'>alert('$message');
  window.location.href = 'jobseekerPage.php';
  </script>";


}else {
  echo "try again";
}






?>
