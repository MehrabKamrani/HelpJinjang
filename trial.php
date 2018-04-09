<?php

$conn = new mysqli("localhost", "root","", "helpjinjang");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql_update_psw_cl = "UPDATE client SET client_password = 'uuuuuu'
WHERE client_username = 'sherlock23'";

$row_update_psw_cl = mysqli_query($conn, $sql_update_psw_cl) or die(mysqli_error($conn));

?>