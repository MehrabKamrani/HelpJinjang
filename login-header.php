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
                    <div class="form-group">
                      <input type="text" placeholder="Username" class="form-control" id="login-username" name="login-username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" placeholder="Password" class="form-control" id="login-password" name="login-password" required>
                    </div>
                    <button type="submit" class="btn btn-success" id="login-btn" name="submit">Login</button>
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

		$sql_member = "SELECT username, password from member WHERE username='$username' and password='$password'";
		$result_member = $conn->query($sql_member);

        $sql_trainer = "SELECT username, password from trainer WHERE username='$username' and password='$password'";
        $result_trainer = $conn->query($sql_trainer);



		while ($rs_member = $result_member->fetch_array()) {
			$_SESSION['session_username_member'] = $rs_member['username'];
			$_SESSION['session_password_member'] = $rs_member['password'];
		}

        while ($rs_trainer = $result_trainer->fetch_array()) {
            $_SESSION['session_username_trainer'] = $rs_trainer['username'];
            $_SESSION['session_password_trainer'] = $rs_trainer['password'];
        }


		if ($_SESSION['session_username_member'] == $username && $_SESSION['session_password_member']==$password) {
            $me_info = $conn->query("SELECT * FROM member WHERE username = '$username'");
            while ($row = $me_info->fetch_array()){
                $_SESSION['me_fullname'] = $row['fullname'];
                $_SESSION['me_username'] = $row['username'];
                $_SESSION['me_email'] = $row['email'];
                $_SESSION['me_level'] = $row['level'];
            }
			header("location: member_main.php");
		}
        else if ($_SESSION['session_username_trainer'] == $username && $_SESSION['session_password_trainer']==$password) {
            $tr_info = $conn->query("SELECT * FROM trainer WHERE username = '$username'");
            while ($row = $tr_info->fetch_array()){
                $_SESSION['tr_fullname'] = $row['fullname'];
                $_SESSION['tr_username'] = $row['username'];
                $_SESSION['tr_email'] = $row['email'];
                $_SESSION['tr_speciality'] = $row['speciality'];
            }
            header("location: trainer_main.php");
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
