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

$sql_update_session_status = "SELECT * FROM training_session WHERE cl_username = '$username' AND status = 'upcoming';";
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

			$sql_update_session_status = "UPDATE training_session SET status='current' WHERE session_id = '$session_id_update_session_status[$i]';";
			if ($session_datetime <= $now) {
				$conn->query($sql_update_session_status);
			}

			$i++;
		}
	}
}

$sql_upcoming_session = "SELECT * FROM training_session WHERE cl_username = '$username' AND (status = 'upcoming' OR status = 'Full');";
if ($result_upcoming_session = $conn->query($sql_upcoming_session)) {
	$row_count_upcoming_session =mysqli_num_rows($result_upcoming_session);

	if ($row_count_upcoming_session>0) {
		$i = 1;
		while($row_upcoming_session=mysqli_fetch_assoc($result_upcoming_session)) {
			$session_id_upcoming_session[$i] = $row_upcoming_session['session_id'];
			$title_upcoming_session[$i] = $row_upcoming_session['title'];
			$i++;
		}
	}
} else {
	$row_count_upcoming_session = 0;
}

$sql_past_session = "SELECT * FROM training_session WHERE cl_username = '$username' AND status = 'past';";
if ($result_past_session = $conn->query($sql_past_session)) {
	$row_count_past_session =mysqli_num_rows($result_past_session);

	if ($row_count_past_session>0) {
		$i = 1;
		while($row_past_session=mysqli_fetch_assoc($result_past_session)) {
			$session_id_past_session[$i] = $row_past_session['session_id'];
			$title_past_session[$i] = $row_past_session['title'];
			$i++;
		}
	}
} else {
	$row_count_past_session = 0;
}

$sql_current_session = "SELECT * FROM training_session WHERE cl_username = '$username' AND status = 'current';";
if ($result_current_session = $conn->query($sql_current_session)) {
	$row_count_current_session =mysqli_num_rows($result_current_session);

	if ($row_count_current_session>0) {
		$i = 1;
		while($row_current_session=mysqli_fetch_assoc($result_current_session)) {
			$session_id_current_session[$i] = $row_current_session['session_id'];
			$title_current_session[$i] = $row_current_session['title'];
			$i++;
		}
	}
} else {
	$row_count_current_session = 0;
}


$sql_find_all_sessions = "SELECT session_id FROM training_session WHERE cl_username = '$username' AND status = 'current';";
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
							<button type="button" class="navbar-toggle" data-toggle = "collapse" data-target="#cl-mainNavbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#">HELPJinjang</a>

						</div>
						<!-- Collect the nav links for toggling -->
						<div class="collapse navbar-collapse" id="cl-mainNavbar">
							<ul class="nav navbar-nav">
								<li><a href="#" id="upcoming-button">Upcoming</a></li>
								<li><a href="#" id="current-button">Current</a></li>
								<li><a href="#" id="past-button">Past</a></li>
							</ul>
							<p class="navbar-text navbar-right"><?php /*echo $_SESSION['cl_username'];*/ echo "mehrab"; ?></p>
							<a href="logout.php" type="button" id="btn-logout" class="btn btn-default navbar-btn navbar-right">Log out</a>
						</div>
						<!-- End .navbar-collapse -->
					</div>
					<!-- End .container -->
				</nav>

			</header>

			<div class="container main-container">
				<div class="alert alert-success alert-dismissable" id="welcome-message" style="position: fixed; z-index:1000;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
					Welcome <strong><?php /*echo $_SESSION['cl_fullname'];*/ echo "Mehrab Kamrani"; ?></strong>, you have loged in successfully.
				</div>

				<div class="row">


					<div class="col-sm-3 sidebar">
							<h3 class="sidebar-title"><?php /*echo $_SESSION['cl_username']; */ echo "mehrab";?></h3>
						<div class="sidebar-detail">
							<dl>
								<dt>Full Name</dt>
								<dd><?php echo /*$_SESSION['cl_fullname'];*/ "Mehrab Kamrani"; ?></dd><br>
								<dt>Email</dt>
								<dd><?php echo /*$_SESSION['cl_email'];*/ "mk.zizou@gmail.com"; ?></dd><br>
								<dt>Phone Number</dt>
								<dd><?php echo /*$_SESSION['cl_speciality'];*/ "01111703767"; ?></dd><br>


								<!-- Update button-->
								<dt><a href="updateProfile.html" role="button" class="btn btn-default myBtn">Update Profile</a></dt>
							</dl>
						</div>
					</div>


					<div class="col-sm-9 main-section">
						<div class="row">
							<div class="col-sm-12">

								<!-- Start upcoming Section -->
								<div  id="upcoming" class="row">
									<div class="main-section-category-title col-xs-12 text-center">
										<h1>Upcoming Job Posts</h1>
									</div>

									<div class="container-upcoming-posts">
										<?php
								// Loop through the results from the database
										for ($i = 1; $i <=$row_count_upcoming_session; $i++) {
											echo
											"<div class='col-sm-3'>
											<a class='getModal' href='#' id='$session_id_upcoming_session[$i]' data-toggle='modal' data-target='#modalupcoming'>
											<div class='center-box animated fadeInUp' data-text='$title_upcoming_session[$i]'></div>
											</a>

											</div>";
										}
										?>

										<div class="job-panel col-sm-6 col-md-4 animated fadeInUp">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-header-title">Job Title</h3>
												</div>
												<table class="table job-panel-table">
													<tbody>
														<tr>
															<th>Start on</th>
															<td>12/04/2018</td>
														</tr>
														<tr>
															<th>Salary</th>
															<td>RM400</td>
														</tr>
														<tr>
															<th>Category</th>
															<td>Cooking</td>
														</tr>
													</tbody>
												</table>
												<a href="#"><div class="panel-footer text-center">View Details</div></a>
											</div>
										</div>

										<div class="job-panel col-sm-6 col-md-4 animated fadeInUp">
											<div class="panel panel-default create-job-panel">
												<div class="panel-heading">
													<h3 class="panel-header-title">Create New Post</h3>
												</div>
												<a href="postNewJob_main.php" id="create_session">
													<div class="panel-body">
															<i class="fa fa-plus" aria-hidden="true" style="font-size: 100px;"></i>
													</div>
												</a>
											</div>
										</div>

										</div>
									</div>
								</div><!-- End upcoming Section -->

								<!-- Start current Section -->
								<div  id="current" class="row" style="display:none">
									<div class="main-section-category-title col-xs-12 text-center">
										<h1>Current Job Posts</h1>
									</div>
									<?php
							// Loop through the results from the database
									for ($i = 1; $i <=$row_count_current_session; $i++) {
										echo
										"<div class='col-sm-3'>
										<a class='getModal' href='#' id='$session_id_current_session[$i]' data-toggle='modal' data-target='#modalupcoming'>
										<div class='center-box animated fadeInUp' data-text='$title_current_session[$i]'></div>
										</a>

										</div>";
									}
									?>
								</div><!-- End current Section -->

								<!-- Start past Section -->
								<div  id="past" class="row" style="display:none">
									<div class="main-section-category-title col-xs-12 text-center">
										<h1>Past Job Posts</h1>
									</div>
									<?php
							// Loop through the results from the database
									for ($i = 1; $i <=$row_count_past_session; $i++) {
										echo
										"<div class='col-sm-3'>
										<a class='getModal' href='#' id='$session_id_past_session[$i]' data-toggle='modal' data-target='#modalupcoming'>
										<div class='center-box animated fadeInUp' data-text='$title_past_session[$i]'></div>
										</a>

										</div>";
									}
									?>
								</div>
								<!-- End Cancelled Section -->

							</div>

							<!--Start Modal for Session-->
							<div id="modalupcoming" class="modal fade" role="dialog">
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

			<?php include "footer.php"; ?>


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
								if(result.status == "current") {
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
