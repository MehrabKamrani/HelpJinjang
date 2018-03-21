<?php
session_start();

$username = $_POST['login-username'];
$password = $_POST['login-password'];
$correct_username_js = '';
$correct_password_js = '';
$correct_username_cl = '';
$correct_password_cl = '';

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
     $correct_username_js = $rs_jobseeker['js_username'];
     $correct_password_js = $rs_jobseeker['js_password'];
 }

 while ($rs_client = $result_client->fetch_array()) {
    $correct_username_cl = $rs_client['client_username'];
    $correct_password_cl = $rs_client['client_password'];
}


if ($correct_username_js == $username && $correct_password_js==$password) {
    $message = "Job Seeker page is not available yet";
    echo "<script type='text/javascript'>alert('$message'); 
    window.location.href = 'loginPage.php';</script>";

/*//Comment it out until jobseeker page is done
    $js_info = $conn->query("SELECT * FROM jobseeker WHERE js_username = '$username'");
    while ($row = $js_info->fetch_array()){
        $_SESSION['js_fullname'] = $row['js_fullname'];
        $_SESSION['js_username'] = $row['js_username'];
        $_SESSION['js_email'] = $row['js_email'];
        $_SESSION['js_phoneNo'] = $row['js_phoneNo'];
    }
    header("location: jobseeker_main.php");
*/
}
else if ($correct_username_cl == $username && $correct_password_cl==$password) {
    $cl_info = $conn->query("SELECT * FROM client WHERE client_username = '$username'");
    while ($row = $cl_info->fetch_array()){
        $_SESSION['cl_fullname'] = $row['client_fullname'];
        $_SESSION['cl_username'] = $row['client_username'];
        $_SESSION['cl_email'] = $row['client_email'];
        $_SESSION['cl_phoneNo'] = $row['client_phoneNo'];
    }
    header("location: clientPage.php");
}
else{
 $message = "Wrong username or password";
 echo "<script type='text/javascript'>alert('$message');
      window.location.href = 'loginPage.php'</script>";
}

}
$conn->close();

?>
