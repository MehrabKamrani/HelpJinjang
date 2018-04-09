<?php
  session_start();
  $conn = new mysqli("localhost", "root", "", "helpjinjang");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $jobID = $_POST['jobID'];
//  $jobID = '1';

  $sql = "SELECT * FROM job WHERE jobID = '$jobID'";

  if ($result = $conn->query($sql)) {
    $row=mysqli_fetch_assoc($result);

 }

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Update Job</title>

    <!-- icon -->
    <link rel="icon" href="icon.ico" type="image/x-icon">

    <!-- Google font: Oswald -->
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/updateJob.css" rel="stylesheet">


</head>

<body>

  <header>
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
					<a class="navbar-brand" href="home.php">HELPJinjang</a>

				</div>
				<!-- Collect the nav links for toggling -->
				<div class="collapse navbar-collapse" id="tr-mainNavbar">
					<p class="navbar-text navbar-right"><?php echo $_SESSION['cl_username'];?></p>
					<a href="logout.php" type="button" id="btn-logout" class="btn btn-default navbar-btn navbar-right">Log out</a>
				</div>
				<!-- End .navbar-collapse -->
			</div>
			<!-- End .container -->
		</nav>

	</header>

    <div class="container" id="update-session-section">
      <div class="row">


        <div id="update-session" class="col-sm-6 col-sm-offset-3 form-section">
          <h1 class="text-center" style="font-family: 'Oswald', sans-serif;">Update Job</h1>

           <!-- Display Title of the Job -->
          <div class="form-header-title"><?php echo $row['title'] ?></div>

          <div class="form-content">
            <form data-toggle="validator" class="form-horizontal" id="update-session-form" action="updateJob.php" method="POST">
                <fieldset>

                  <!-- Start Date -->
                  <div class="form-group has-feedback">
                    <label class="control-label" for="date">Start Date</label>
                    <div class="controls">
                      <input type="date" id="start_date" name="start_date" value="<?php echo $row['startDate']; ?>" class="form-control" data-min-error="Date must be tomorrow or later." required>
                      <p class="help-block with-errors">Please provide the date</p>
                    </div>
                  </div>

                  <!-- End Date -->
                   <div class="form-group has-feedback">
                    <label class="control-label" for="date">End Date</label>
                    <div class="controls">
                      <input type="date" id="end_date" name="end_date" value="<?php echo $row['endDate']; ?>" class="form-control" data-min-error="Date must be tomorrow or later." required>
                      <p class="help-block with-errors">Please provide the date</p>
                    </div>
                  </div>

                  <!-- Start Time -->
                  <div class="form-group has-feedback">
                    <label class="control-label" for="time">Start Time</label>
                    <div class="controls">
                      <input type="time" id="start_time" name="start_time" value="<?php echo $row['startTime'] ?>" class="form-control" required>
                      <p class="help-block with-errors">Please provide the time</p>
                    </div>
                  </div>

                  <!-- End Time -->
                  <div class="form-group has-feedback">
                    <label class="control-label" for="time">End Time</label>
                    <div class="controls">
                      <input type="time" id="end_time" name="end_time" value="<?php echo $row['endTime'] ?>" class="form-control" required>
                      <p class="help-block with-errors">Please provide the time</p>
                    </div>
                  </div>

                  <!-- Salary -->
                  <div class="form-group has-feedback">
                    <label class="control-label" for="fee">Salary</label>
                    <div class="controls">
                      <div class="input-group">
                        <span class="input-group-addon">RM</span>
                        <input type="number" min="1" id="salary" name="salary" value="<?php echo $row['salary']; ?>" class="form-control" required>
                        <span class="input-group-addon">.00</span>
                      </div>
                      <p class="help-block with-errors">Please provide the salary</p>
                    </div>
                  </div>


                  <!-- Number of jobseekers -->
                  <div id="participants-section" class="form-group has-feedback">
                    <label class="control-label" for="maxJobseekers">Number of Needed Jobseekers</label>
                    <div class="controls">
                        <input type="number" min="1" id="maxJobseekers" name="maxJobseekers"  value="<?php echo $row['qtyOfJobSeekers']; ?>" class="form-control" required>
                        <p class="help-block with-errors">Please provide the number of Jobseekers needed</p>
                    </div>
                  </div>


                  <!-- description -->
                  <div class="form-group">
                      <label class="control-label" for="description">Description</label>
                      <div class="controls">
                            <textarea class="form-control" id="description" name="description" rows="3" maxlength="500" required> <?php echo $row['description']; ?></textarea>
                          <p class="help-block with-errors">Please provide the descriptions</p>
                      </div>
                    </div>

                  
                    <div class="controls">
                      <input class="hidden" id="jobID" name="jobID" value="<?php echo $jobID; ?>">
                      <button type="reset" class="btn btn-reset btn-default">Reset</button>
                      <button type="submit" class="btn btn-submit btn-success pull-right">Update</button>
                    </div>
                </fieldset>
              </form>
          </div>
        </div>
      </div>
    </div>
   <?php include "footer.php" ?>




    <!-- jQuery -->
    <script src="js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Validator -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>

    <script>
    $( document ).ready(function() {
      var today = new Date();
      var dd = today.getDate()+1; //Tomorrow and onward
      var mm = today.getMonth()+1; //January is 0!
      var yyyy = today.getFullYear();
      if(dd<10)
        dd='0'+dd
      if(mm<10)
        mm='0'+mm

      today = yyyy+'-'+mm+'-'+dd;
      var startingDate = $("#start_date").val();
      document.getElementById("start_date").setAttribute("min", today);
      document.getElementById("end_date").setAttribute("min", startingDate);
     $("#end_date").attr("data-min-error", "Ending date must be after starting date.");


        /*$("#start_date").change(function() {
        var startingDate = $("#start_date").val();
        $("#end_date").attr("min", startingDate);
        $("#end_date").attr("data-min-error", "Ending date must be after starting date.");

      });*/


    });

    </script>


</body>

</html>
