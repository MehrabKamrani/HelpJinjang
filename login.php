<?php
session_start();

$username = $_POST['login-username'];
$password = $_POST['login-password'];


$conn = new mysqli("localhost", "root","", "helpjinjang");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!empty($username) && !empty($password)) {

  $sql_jobseeker = "SELECT js_username, js_password from jobseeker WHERE js_username='$username' and js_password='$password'";
  $result_jobseeker = $conn->query($sql_jobseeker);

  $sql_client = "SELECT client_username, client_password from client WHERE client_username='$username' and client_password='$password'";
  $result_client = $conn->query($sql_client);



  while ($rs_jobseeker = $result_jobseeker->fetch_array()) {
     $_SESSION['session_username_jobseeker'] = $rs_jobseeker['js_username'];
     $_SESSION['session_password_jobseeker'] = $rs_jobseeker['js_password'];
 }

 while ($rs_client = $result_client->fetch_array()) {
    $_SESSION['session_username_client'] = $rs_client['client_username'];
    $_SESSION['session_password_client'] = $rs_client['client_password'];
}


if ($_SESSION['session_username_jobseeker'] == $username && $_SESSION['session_password_jobseeker']==$password) {
    $js_info = $conn->query("SELECT * FROM jobseeker WHERE js_username = '$username'");
    while ($row = $js_info->fetch_array()){
        $_SESSION['js_fullname'] = $row['js_fullname'];
        $_SESSION['js_username'] = $row['js_username'];
        $_SESSION['js_email'] = $row['js_email'];
        $_SESSION['js_phoneNo'] = $row['js_phoneNo'];
    }
    header("location: jobseeker_main.php");
}
else if ($_SESSION['session_username_client'] == $username && $_SESSION['session_password_client']==$password) {
    $cl_info = $conn->query("SELECT * FROM client WHERE client_username = '$username'");
    while ($row = $cl_info->fetch_array()){
        $_SESSION['cl_fullname'] = $row['client_fullname'];
        $_SESSION['cl_username'] = $row['client_username'];
        $_SESSION['cl_email'] = $row['client_email'];
        $_SESSION['cl_phoneNo'] = $row['client_phoneNo'];
    }
    header("location: client_main.php");
}
else{
 $message = "Wrong username or password";
 echo "<script type='text/javascript'>alert('$message'); 
window.location.href = 'loginPage.php';</script>";
}

} else{
  echo "<style type='text/css'>
			#login-username, #login-password{
  border-color: red;
}</style>";
echo "<script> var element = document.getElementById('login-form')
element.classList.add('animated');
element.classList.add('shake');</script>";
}

$conn->close();

?>