<?php
session_start();
$conn = new mysqli("localhost", "root","", "helpjinjang");


if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if(!isset($_SESSION['cl_username']) && empty($_SESSION['cl_username'])) {
	//header("Location: home.php");
}
$username = "mehrab"; /* $_SESSION['cl_username'];*/

$sql_update_session_status = "SELECT * FROM training_session WHERE cl_username = '$username' AND status = 'Available';";
if ($result_update_session_status = $conn->query($sql_update_session_status)) {
	$row_count_update_session_status =mysqli_num_rows($result_update_session_status);

	if ($row_count_update_session_status>0) {
		$i = 1;
		while($row_update_session_status=mysqli_fetch_assoc($result_update_session_status)) {
			$session_id_update_session_status[$i] = $row_update_session_status['session_id'];
			$session_time_update_session_status[$i] = $row_update_session_status['session_time'];
			$session_date_update_session_status[$i] = $row_update_session_status['session_date'];

			$now = new DateTime("now", new DateTimeZone('Singapore'));

			$session_datetime = new DateTime($session_date_update_session_status[$i] . " " . $session_time_update_session_status[$i], new DateTimeZone('Singapore'));

			$sql_update_session_status = "UPDATE training_session SET status='Completed' WHERE session_id = '$session_id_update_session_status[$i]';";
			if ($session_datetime <= $now) {
				$conn->query($sql_update_session_status);
			}

			$i++;
		}
	}
}

$sql_available_session = "SELECT * FROM training_session WHERE cl_username = '$username' AND (status = 'Available' OR status = 'Full');";
if ($result_available_session = $conn->query($sql_available_session)) {
	$row_count_available_session =mysqli_num_rows($result_available_session);

	if ($row_count_available_session>0) {
		$i = 1;
		while($row_available_session=mysqli_fetch_assoc($result_available_session)) {
			$session_id_available_session[$i] = $row_available_session['session_id'];
			$title_available_session[$i] = $row_available_session['title'];
			$i++;
		}
	}
} else {
	$row_count_available_session = 0;
}

$sql_canceled_session = "SELECT * FROM training_session WHERE cl_username = '$username' AND status = 'Canceled';";
if ($result_canceled_session = $conn->query($sql_canceled_session)) {
	$row_count_canceled_session =mysqli_num_rows($result_canceled_session);

	if ($row_count_canceled_session>0) {
		$i = 1;
		while($row_canceled_session=mysqli_fetch_assoc($result_canceled_session)) {
			$session_id_canceled_session[$i] = $row_canceled_session['session_id'];
			$title_canceled_session[$i] = $row_canceled_session['title'];
			$i++;
		}
	}
} else {
	$row_count_canceled_session = 0;
}

$sql_completed_session = "SELECT * FROM training_session WHERE cl_username = '$username' AND status = 'Completed';";
if ($result_completed_session = $conn->query($sql_completed_session)) {
	$row_count_completed_session =mysqli_num_rows($result_completed_session);

	if ($row_count_completed_session>0) {
		$i = 1;
		while($row_completed_session=mysqli_fetch_assoc($result_completed_session)) {
			$session_id_completed_session[$i] = $row_completed_session['session_id'];
			$title_completed_session[$i] = $row_completed_session['title'];
			$i++;
		}
	}
} else {
	$row_count_completed_session = 0;
}


$sql_find_all_sessions = "SELECT session_id FROM training_session WHERE cl_username = '$username' AND status = 'Completed';";
if ($result_find_all_sessions = $conn->query($sql_find_all_sessions)) {
	$row_count_all_sessions =mysqli_num_rows($result_find_all_sessions);
	$total = [];
	if ($row_count_all_sessions>0) {
		$i = 1;
		$rating = [];
		while($row_count_all_sessions=mysqli_fetch_assoc($result_find_all_sessions)) {
			$rating[$i] = $row_count_all_sessions['session_id'];
			$i++;
		}
		for ($a = 1; $a <= count($rating); $a++){
			$current_session = $rating[$a];
			$sql_find_rating = "SELECT rating FROM rating WHERE session_id = '$current_session';";

			if ($result_find_rating = $conn->query($sql_find_rating)) {
				$row_find_rating =mysqli_num_rows($result_find_rating);
				if ($row_find_rating>0) {
					$i = 1;
					while($row_find_rating=mysqli_fetch_assoc($result_find_rating)) {
						$total[$i] = $row_find_rating['rating'];
						$i++;
					}
				}
			}
		}


	}
}




		?>

		<!DOCTYPE html>
		<html>
		<head>

			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<title>Client</title>

			<!-- icon -->
			<link rel="icon" href="icon.ico" type="image/x-icon">

			<!-- Google font: Oswald -->
			<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

			<!-- Bootstrap Core CSS -->
			<link href="css/bootstrap.min.css" rel="stylesheet">

			<!-- FontAwesome CSS -->
			<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

			<!-- Animate.css CSS -->
			<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet">

			<!-- Custom CSS -->
			<link href="css/client-jobseeker.css" rel="stylesheet">


		</head>
		<body>
			<header style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;">
				<nav class="navbar navbar-inverse navbar-fixed-top">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle = "collapse" data-target="#tr-mainNavbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#">HELPJinjang</a>

						</div>
						<!-- Collect the nav links for toggling -->
						<div class="collapse navbar-collapse" id="tr-mainNavbar">
							<ul class="nav navbar-nav">
								<li><a href="#" id="available-button">Available</a></li>
								<li><a href="#" id="completed-button">Completed</a></li>
								<li><a href="#" id="cancelled-button">Cancelled</a></li>
							</ul>
							<p class="navbar-text navbar-right"><?php /*echo $_SESSION['cl_fullname'];*/ echo "Mehrab Kamrani"; ?></p>
							<a href="logout.php" type="button" id="btn-logout" class="btn btn-default navbar-btn navbar-right">Log out</a>
						</div>
						<!-- End .navbar-collapse -->
					</div>
					<!-- End .container -->
				</nav>

			</header>

			<div class="container" style="width: 100%; padding-left: 0; padding-right: 0; margin-top:50px;">
				<div class="alert alert-success alert-dismissable" id="welcome-message" style="position: fixed; z-index:1000;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
					Welcome <strong><?php /*echo $_SESSION['cl_fullname'];*/ echo "Mehrab Kamrani"; ?></strong>, you have loged in successfully.
				</div>

				<div class="row" style="margin-left: 0; margin-right: 0;">


					<div class="col-xs-12 col-sm-2" style="padding: 0px; z-index: 2;">
						<div class="left-side-color">
							<div class="left-side-text">
								<p class="main-text"><?php /*echo $_SESSION['cl_username']; */ echo "Mehrab Kamrani";?></p>
							</div>
						</div>
						<div class="left-side-text">
							<dl>
								<dt>Name</dt>
								<dd><?php echo /*$_SESSION['cl_fullname'];*/ "Mehrab Kamrani"; ?></dd><br>
								<dt>Email</dt>
								<dd><?php echo /*$_SESSION['cl_email'];*/ "mk.zizou@gmail.com"; ?></dd><br>
								<dt>Speciality</dt>
								<dd><?php echo /*$_SESSION['cl_speciality'];*/ "Cooking"; ?></dd><br>


								<!-- Update button-->
								<dt><a href="updateProfile.html" role="button" class="btn btn-default myBtn">Update Profile</a></dt>
							</dl>
						</div>
					</div>


					<div class="col-xs-12 col-sm-10" style="padding: 0px;">
						<div class="row" style="margin:2% 2% 2% 1%;">
							<div class="col-xs-12 col-sm-12" style="padding: 0;">

								<!-- Start Available Section -->
								<div  id="available" class="row" style="margin:0;">
									<div  class="row" style="margin:0;">

										<?php
								// Loop through the results from the database
										for ($i = 1; $i <=$row_count_available_session; $i++) {
											echo
											"<div class='col-xs-12 col-sm-3 remove-padding'>
											<a class='getModal' href='#' id='$session_id_available_session[$i]' data-toggle='modal' data-target='#modalAvailable'>
											<div class='center-box animated fadeInUp' style='background-image: url(Photo/Jackson3.jpg);' data-text='$title_available_session[$i]'></div>
											</a>

											</div>";
										}
										?>

										<div class="col-xs-12 col-sm-3 remove-padding">
											<a href="newSession.html" id="create_session">
												<div class="center-box animated fadeInUp" style="text-align: center; box-shadow: none;" data-text="Create New Training Session">
													<i class="fa fa-plus" aria-hidden="true" style="font-size: 100px; margin-top: 150px;"></i>
												</div>
											</a>

										</div>
									</div>
								</div><!-- End Available Section -->

								<!-- Start Completed Section -->
								<div  id="completed" class="row" style="margin:0px; display:none">
									<?php
							// Loop through the results from the database
									for ($i = 1; $i <=$row_count_completed_session; $i++) {
										echo
										"<div class='col-xs-12 col-sm-3 remove-padding'>
										<a class='getModal' href='#' id='$session_id_completed_session[$i]' data-toggle='modal' data-target='#modalAvailable'>
										<div class='center-box animated fadeInUp' style='background-image: url(Photo/Jackson3.jpg);' data-text='$title_completed_session[$i]'></div>
										</a>

										</div>";
									}
									?>
								</div><!-- End Completed Section -->

								<!-- Start Cancelled Section -->
								<div  id="cancelled" class="row" style="margin:0px; display:none">
									<?php
							// Loop through the results from the database
									for ($i = 1; $i <=$row_count_canceled_session; $i++) {
										echo
										"<div class='col-xs-12 col-sm-3 remove-padding'>
										<a class='getModal' href='#' id='$session_id_canceled_session[$i]' data-toggle='modal' data-target='#modalAvailable'>
										<div class='center-box animated fadeInUp' style='background-image: url(Photo/Jackson3.jpg);' data-text='$title_canceled_session[$i]'></div>
										</a>

										</div>";
									}
									?>
								</div>
								<!-- End Cancelled Section -->

							</div>

							<!--Start Modal for Session-->
							<div id="modalAvailable" class="modal fade" role="dialog">
								<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title" id="session-title"></h4>
										</div>
										<div class="modal-body">
											<div class="modal-dl">
												<table class="table">

													<tr><th>Date:</th><td id="session-date"></td></tr>

													<tr><th>Time:</th><td id="session-time"></td></tr>

													<tr><th>Type:</th><td id="session-type"></td></tr>

													<tr><th id="session-participants-title">No of participants:</th><td id="session-participants"></td></tr>

													<tr><th>Status:</th><td id="session-status"></td></tr>

													<tr><th>Fee:</th><td id="session-fee"></td></tr>
												</table>

											</div>
										</div>
										<div class="modal-footer" id="footer_to_hide">
											<form action="updateSession_main.php" method="post">
												<input class="hidden" id="session-id" name="session_id" value="">
												<button type="submit" class="btn btn-default">Update</button>
											</form>
										</div>
									</div>

								</div>
							</div>
							<!--End Modal for Session-->



						</div>
					</div>
				</div>
			</div>
			<footer id="footer">
				<div class="container text-center">
					<div class="footer-logo">
						<h1 style="font-family: 'Oswald', sans-serif; color:white;">HELPJinjang</h1>
					</div>

					<hr>
					<ul class="footer-social list-inline">
						<li>
							<a href="https://facebook.com"><img alt="social icon" src="glyphs/fb.png"></a>
						</li>
						<li>
							<a href="https://instagram.com"><img alt="social icon" src="glyphs/in.png"></a>
						</li>
						<li>
							<a href="https://twitter.com"><img alt="social icon" src="glyphs/t.png"></a>
						</li>
						<li>
							<a href="https://plus.google.com"><img alt="social icon" src="glyphs/g.png"></a>
						</li>
					</ul>
					<p id="copyright">Copyright &copy; HELPJinjang 2017</p>
				</div>
			</footer>


			<!-- jQuery -->
			<script src="js/jquery-2.2.3.min.js"></script>

			<!-- Bootstrap Core JavaScript -->
			<script src="js/bootstrap.min.js"></script>

			<!-- Costom JavaScript -->
			<script src="js/client.js"></script>
			<script type="text/javascript">
				$(function(){

					$('.getModal').on('click', function(){
						var sessionId = $(this).attr('id');
						$.ajax({
							url: 'modal.php',
							type: 'POST',
							data: {'session_id':sessionId},
							success: function(result){
								if (result.max_num_part == 1) {
									$('#session-participants-title').css('display', 'none');
									$('#session-participants').css('display', 'none');
									result.session_type_grpOrPrs = 'Personal';
								} else {
									result.session_type_grpOrPrs = 'Group';
									$('#session-participants-title').css('display', 'table-cell');
									$('#session-participants').css('display', 'table-cell');

								}
								var time = result.session_time.split(":");
								time = time[0] + ":" + time[1];

								$('#session-id').attr('value', result.session_id);
								$('#session-title').html(result.title + " (" + result.session_type_grpOrPrs + " Session)");
								$('#session-date').html(result.session_date);
								$('#session-time').html(time);
								$('#session-type').html(result.type);
								$('#session-participants').html(result.max_num_part);
								$('#session-status').html(result.status);
								$('#session-fee').html(result.fee);
								if(result.status == "Completed") {
									$('#footer_to_hide').css("display", "none");
								} else{
									$('#footer_to_hide').css("display", "block");
								}

							},
							error: function(result){
								alert("error");
							}
						})
					});
				});



			</script>

		</body>
		</html>
