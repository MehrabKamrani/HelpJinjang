<?php
session_start();
$conn = new mysqli("localhost", "root","", "helpjinjang");


if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if(!isset($_SESSION['cl_username'])) {
	header("Location: home.php");
}
$username = $_SESSION['cl_username'];

// Update Upcoming posts to Current post when startdate passed today
$sql_select_upcoming_post = "SELECT * FROM job WHERE client_username = '$username' AND status = 'upcoming';";
if ($result_select_upcoming_post = $conn->query($sql_select_upcoming_post)) {
	$row_count_select_upcoming_post =mysqli_num_rows($result_select_upcoming_post);
	if ($row_count_select_upcoming_post>0) {
		$i = 1;
		while($row_update_upcoming_to_current=mysqli_fetch_assoc($result_select_upcoming_post)) {
			$jobID_update_upcoming_to_current[$i] = $row_update_upcoming_to_current['jobID'];
			$job_startDate_update_upcoming_to_current[$i] = $row_update_upcoming_to_current['startDate'];

			$today_datetime = new DateTime("today", new DateTimeZone('Asia/Kuala_Lumpur'));
			$job_startDate_datetime = new DateTime($job_startDate_update_upcoming_to_current[$i], new DateTimeZone('Asia/Kuala_Lumpur'));

			$sql_update_upcoming_to_current = "UPDATE job SET status='current' WHERE jobID = '$jobID_update_upcoming_to_current[$i]';";
			if ($job_startDate_datetime <= $today_datetime) {
				$conn->query($sql_update_upcoming_to_current);
			}
			$i++;
		}
	}
}

// Update Current posts to Passed post when enddate passed today
$sql_select_current_post = "SELECT * FROM job WHERE client_username = '$username' AND status = 'current';";
if ($result_select_current_post = $conn->query($sql_select_current_post)) {
	$row_count_select_current_post =mysqli_num_rows($result_select_current_post);
	if ($row_count_select_current_post>0) {
		$i = 1;
		while($row_update_current_to_passed=mysqli_fetch_assoc($result_select_current_post)) {
			$jobID_update_current_to_passed[$i] = $row_update_current_to_passed['jobID'];
			$job_endDate_update_current_to_passed[$i] = $row_update_current_to_passed['endDate'];

			$today_datetime = new DateTime("today", new DateTimeZone('Asia/Kuala_Lumpur'));
			$job_endDate_datetime = new DateTime($job_endDate_update_current_to_passed[$i], new DateTimeZone('Asia/Kuala_Lumpur'));

			$sql_update_current_to_passed = "UPDATE job SET status='passed' WHERE jobID = '$jobID_update_current_to_passed[$i]';";
			if ($job_endDate_datetime <= $today_datetime) {
				$conn->query($sql_update_current_to_passed);
			}
			$i++;
		}
	}
}

// Select upcoming posts
$sql_select_upcoming = "SELECT * FROM job WHERE client_username = '$username' AND status = 'upcoming'";
if ($result_select_upcoming = $conn->query($sql_select_upcoming)) {
	$row_count_select_upcoming =mysqli_num_rows($result_select_upcoming);
	if ($row_count_select_upcoming>0) {
		$i = 1;
		while($row_select_upcoming=mysqli_fetch_assoc($result_select_upcoming)) {
			$jobID_selected_upcoming[$i] = $row_select_upcoming['jobID'];
			$title_selected_upcoming[$i] = $row_select_upcoming['title'];
			$startDate_selected_upcoming[$i] = $row_select_upcoming['startDate'];
			$salary_selected_upcoming[$i] = $row_select_upcoming['salary'];
			$category_selected_upcoming[$i] = $row_select_upcoming['categoryName'];
			$i++;
		}
	}
} else {
	$row_count_select_upcoming = 0;
}

// Select current posts
$sql_select_current = "SELECT * FROM job WHERE client_username = '$username' AND status = 'current'";
if ($result_select_current = $conn->query($sql_select_current)) {
	$row_count_select_current =mysqli_num_rows($result_select_current);
	if ($row_count_select_current>0) {
		$i = 1;
		while($row_select_current=mysqli_fetch_assoc($result_select_current)) {
			$jobID_selected_current[$i] = $row_select_current['jobID'];
			$title_selected_current[$i] = $row_select_current['title'];
			$startDate_selected_current[$i] = $row_select_current['startDate'];
			$salary_selected_current[$i] = $row_select_current['salary'];
			$category_selected_current[$i] = $row_select_current['categoryName'];
			$i++;
		}
	}
} else {
	$row_count_select_current = 0;
}

// Select passed posts
$sql_select_passed = "SELECT * FROM job WHERE client_username = '$username' AND status = 'passed'";
if ($result_select_passed = $conn->query($sql_select_passed)) {
	$row_count_select_passed =mysqli_num_rows($result_select_passed);
	if ($row_count_select_passed>0) {
		$i = 1;
		while($row_select_passed=mysqli_fetch_assoc($result_select_passed)) {
			$jobID_selected_passed[$i] = $row_select_passed['jobID'];
			$title_selected_passed[$i] = $row_select_passed['title'];
			$startDate_selected_passed[$i] = $row_select_passed['startDate'];
			$salary_selected_passed[$i] = $row_select_passed['salary'];
			$category_selected_passed[$i] = $row_select_passed['categoryName'];
			$i++;
		}
	}
} else {
	$row_count_select_passed = 0;
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
							<a class="navbar-brand" href="home.php">HELPJinjang</a>

						</div>
						<!-- Collect the nav links for toggling -->
						<div class="collapse navbar-collapse" id="cl-mainNavbar">
							<ul class="nav navbar-nav">
								<li><a href="#" id="upcoming-button">Upcoming</a></li>
								<li><a href="#" id="current-button">Current</a></li>
								<li><a href="#" id="passed-button">Passed</a></li>
							</ul>
							<p class="navbar-text navbar-right"><?php echo $_SESSION['cl_username'];?></p>
							<a href="logout.php" type="button" id="btn-logout" class="btn btn-default navbar-btn navbar-right">Log out</a>
						</div>
						<!-- End .navbar-collapse -->
					</div>
					<!-- End .container -->
				</nav>

			</header>

			<div class="container main-container">
				<div class="alert alert-success alert-dismissable animated fadeInLeft" id="welcome-message" style="position: fixed; z-index:1000;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
					Welcome <strong><?php echo $_SESSION['cl_fullname']; ?></strong>, you have loged in successfully.
				</div>

				<div class="row">


					<div class="col-sm-3 sidebar">
							<h3 class="sidebar-title"><?php echo $_SESSION['cl_username']; ?></h3>
						<div class="sidebar-detail">
							<dl>
								<dt>Full Name</dt>
								<dd><?php echo $_SESSION['cl_fullname']; ?></dd><br>
								<dt>Email</dt>
								<dd><?php echo $_SESSION['cl_email']; ?></dd><br>
								<dt>Phone Number</dt>
								<dd><?php echo $_SESSION['cl_phoneNo']; ?></dd><br>


								<!-- Update button-->
								<dt><a href="updateClientPage.php" role="button" class="btn btn-default myBtn">Update Profile</a></dt>
							</dl>
						</div>
					</div>


					<div class="col-sm-9 main-section">

								<!-- Start upcoming Section -->
								<div  id="upcoming" class="row">
									<div class="main-section-category-title col-xs-12 text-center">
										<h1>Upcoming Job Posts</h1>
									</div>

									<div class="container-upcoming-posts">
										<?php
										for ($i = 1; $i <=$row_count_select_upcoming; $i++) {
											echo "<div id='$jobID_selected_upcoming[$i]' class='job-panel col-sm-6 col-md-4 animated fadeInUp'>
												<div class='panel panel-default'>
													<div class='panel-heading'>
														<h3 class='panel-header-title'>$title_selected_upcoming[$i]</h3>
													</div>
													<table class='table job-panel-table'>
														<tbody>
															<tr>
																<th>Start on</th>
																<td>$startDate_selected_upcoming[$i]</td>
															</tr>
															<tr>
																<th>Salary</th>
																<td>$salary_selected_upcoming[$i]</td>
															</tr>
															<tr>
																<th>Category</th>
																<td>$category_selected_upcoming[$i]</td>
															</tr>
														</tbody>
													</table>
													<a class='displayJobModal' href='' id='$jobID_selected_upcoming[$i]' data-toggle='modal' data-target='#jobModal'>
														<div class='panel-footer text-center' data-text='$title_selected_upcoming[$i]'>View Details</div>
													</a>
												</div>
											</div>";
										}
										?>


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

									</div><!-- container-upcoming-posts -->
								</div><!-- End upcoming Section -->

								<!-- Start current Section -->
								<div  id="current" class="row" style="display:none">
									<div class="main-section-category-title col-xs-12 text-center">
										<h1>Current Job Posts</h1>
									</div>
									<?php
									for ($i = 1; $i <=$row_count_select_current; $i++) {
										echo "<div id='$jobID_selected_current[$i]' class='job-panel col-sm-6 col-md-4 animated fadeInUp'>
											<div class='panel panel-default'>
												<div class='panel-heading'>
													<h3 class='panel-header-title'>$title_selected_current[$i]</h3>
												</div>
												<table class='table job-panel-table'>
													<tbody>
														<tr>
															<th>Started on</th>
															<td>$startDate_selected_current[$i]</td>
														</tr>
														<tr>
															<th>Salary</th>
															<td>$salary_selected_current[$i]</td>
														</tr>
														<tr>
															<th>Category</th>
															<td>$category_selected_current[$i]</td>
														</tr>
													</tbody>
												</table>
												<a class='displayJobModal' href='' id='$jobID_selected_current[$i]' data-toggle='modal' data-target='#jobModal'>
													<div class='panel-footer text-center' data-text='$title_selected_current[$i]'>View Details</div>
												</a>
											</div>
										</div>";
									}
									?>
								</div><!-- End current Section -->

								<!-- Start Passed Section -->
								<div  id="passed" class="row" style="display:none">
									<div class="main-section-category-title col-xs-12 text-center">
										<h1>Passed Job Posts</h1>
									</div>
									<?php
									for ($i = 1; $i <=$row_count_select_passed; $i++) {
										echo "<div id='$jobID_selected_passed[$i]' class='job-panel col-sm-6 col-md-4 animated fadeInUp'>
											<div class='panel panel-default'>
												<div class='panel-heading'>
													<h3 class='panel-header-title'>$title_selected_passed[$i]</h3>
												</div>
												<table class='table job-panel-table'>
													<tbody>
														<tr>
															<th>Started on</th>
															<td>$startDate_selected_passed[$i]</td>
														</tr>
														<tr>
															<th>Salary</th>
															<td>$salary_selected_passed[$i]</td>
														</tr>
														<tr>
															<th>Category</th>
															<td>$category_selected_passed[$i]</td>
														</tr>
													</tbody>
												</table>
												<a class='displayJobModal' href='' id='$jobID_selected_passed[$i]' data-toggle='modal' data-target='#jobModal'>
													<div class='panel-footer text-center' data-text='$title_selected_passed[$i]'>View Details</div>
												</a>
											</div>
										</div>";
									}
									?>
								</div>
								<!-- End Passed Section -->


							<!--Start Modal for Job-->
							<div id="jobModal" class="modal fade" role="dialog">
								<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h3 class="modal-title" id="job-title"></h3>
										</div>
										<div class="modal-body">
											<div class="modal-dl">
												<table class="table table-bordered table-striped">

													<tr><th>Starting Date:</th><td id="job-startDate"></td></tr>

													<tr><th>Ending Date:</th><td id="job-endDate"></td></tr>

													<tr><th>Starting Time:</th><td id="job-startTime"></td></tr>

													<tr><th>Ending Time:</th><td id="job-endTime"></td></tr>

													<tr><th>Salary:</th><td id="job-salary"></td></tr>

													<tr><th>Category:</th><td id="job-category"></td></tr>

													<tr><th>No. Needed Jobseekers:</th><td id="job-qtyOfJobSeekers"></td></tr>

													<tr><th>Description:</th><td id="job-description"></td></tr>

													<tr><th>Address:</th><td id="job-address"></td></tr>

												</table>

											</div>
										</div>
										<div class="modal-footer" id="footer_to_hide">
											<form action="updateSession_main.php" method="post">
												<input class="hidden" id="job-id" name="jobID" value="">
												<button type="submit" class="btn btn-default">Update</button>
											</form>
										</div>
									</div>

								</div>
							</div>
							<!--End Modal for Session-->



						</div><!-- col-sm-9 main-section -->
					</div><!-- row -->
				</div><!-- container main-container -->

			<?php include "footer.php"; ?>


			<!-- jQuery -->
			<script src="js/jquery-2.2.3.min.js"></script>

			<!-- Bootstrap Core JavaScript -->
			<script src="js/bootstrap.min.js"></script>

			<!-- Costom JavaScript -->
			<script src="js/client.js"></script>
			<script type="text/javascript">
				$(function(){

					$('.displayJobModal').on('click', function(){
						var jobID = $(this).attr('id');
						$.ajax({
							url: 'jobModal.php',
							type: 'POST',
							data: {'jobID':jobID},
							success: function(result){

								var startTime = result.startTime.split(":");
								startTime = startTime[0] + ":" + startTime[1];

								var endTime = result.endTime.split(":");
								endTime = endTime[0] + ":" + endTime[1];

								$('#job-id').attr('value', result.jobID);
								$('#job-title').html(result.title);
								$('#job-startDate').html(result.startDate);
								$('#job-endDate').html(result.endDate);
								$('#job-startTime').html(startTime);
								$('#job-endTime').html(endTime);
								$('#job-salary').html(result.salary);
								$('#job-qtyOfJobSeekers').html(result.qtyOfJobSeekers);
								$('#job-category').html(result.categoryName);
								$('#job-address').html(result.address);
								$('#job-description').html(result.description);
								if(result.status === "passed") {
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
