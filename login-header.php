<?php
// Start the session
session_start();
?>
 <!-- Navigation -->
    <header id="navigation">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-login-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">HELPJinjang</a>

                </div>
                <!-- Collect the nav links for toggling -->
                <div class="collapse navbar-collapse" id="navbar-login-collapse">
                  <form class="navbar-form navbar-right" action="" method="POST" id="login-form">
                    
                    <button type="button" class="btn btn-success" id="login-btn" name="login" onclick="location.href='loginPage.php';">Login</button>

                    <button type="button" class="btn" id="signup-btn" name="signup" onclick="location.href='signUp.php';">Sign up</button>
                  </form>
                </div>
                <!-- End .navbar-collapse -->
            </div>
            <!-- End .container -->
        </nav>

    </header>











<?php


if (isset($_POST['submit'])) {

	$username = $_POST['login-username'];
    $password = $_POST['login-password'];

      $conn = new mysqli("localhost", "root","", "helpjinjang");


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

	if (!empty($username) && !empty($password)) {

		$sql_jobseeker = "SELECT username, password from jobseeker WHERE username='$username' and password='$password'";
		$result_jobseeker = $conn->query($sql_jobseeker);

        $sql_client = "SELECT username, password from client WHERE username='$username' and password='$password'";
        $result_client = $conn->query($sql_client);



		while ($rs_jobseeker = $result_jobseeker->fetch_array()) {
			$_SESSION['session_username_jobseeker'] = $rs_jobseeker['username'];
			$_SESSION['session_password_jobseeker'] = $rs_jobseeker['password'];
		}

        while ($rs_client = $result_client->fetch_array()) {
            $_SESSION['session_username_client'] = $rs_client['username'];
            $_SESSION['session_password_client'] = $rs_client['password'];
        }


		if ($_SESSION['session_username_jobseeker'] == $username && $_SESSION['session_password_jobseeker']==$password) {
            $me_info = $conn->query("SELECT * FROM jobseeker WHERE username = '$username'");
            while ($row = $me_info->fetch_array()){
                $_SESSION['me_fullname'] = $row['fullname'];
                $_SESSION['me_username'] = $row['username'];
                $_SESSION['me_email'] = $row['email'];
                $_SESSION['me_level'] = $row['level'];
            }
			header("location: jobseeker_main.php");
		}
        else if ($_SESSION['session_username_client'] == $username && $_SESSION['session_password_client']==$password) {
            $tr_info = $conn->query("SELECT * FROM client WHERE username = '$username'");
            while ($row = $tr_info->fetch_array()){
                $_SESSION['tr_fullname'] = $row['fullname'];
                $_SESSION['tr_username'] = $row['username'];
                $_SESSION['tr_email'] = $row['email'];
                $_SESSION['tr_speciality'] = $row['speciality'];
            }
            header("location: client_main.php");
        }
		else{
			$message = "Wrong username or password";
            echo "<script type='text/javascript'>alert('$message'); </script>";
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
}



?>
