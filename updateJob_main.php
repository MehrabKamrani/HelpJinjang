<?php
  $conn = new mysqli("localhost", "root", "", "proteinshape");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $session_id = $_POST['session_id'];

  $sql = "SELECT * FROM training_session WHERE session_id = '$session_id'";

  if ($result = $conn->query($sql)) {
    $row=mysqli_fetch_assoc($result);


    $time_arr = explode(':', $row['session_time']);
    $time = $time_arr[0] . ':' . $time_arr[1];


    if ($row['max_num_part'] == 1) {
      $session_type_grpOrPrs = 'Personal';
    } else {
      $session_type_grpOrPrs = 'Group';
    }

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
					<a class="navbar-brand" href="trainer.html">ProteinShape</a>

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

          <div class="form-header-title"><?php echo $row['title'] . " (" . "$session_type_grpOrPrs" . " Session)"; ?></div>

          <div class="form-content">
            <form data-toggle="validator" class="form-horizontal" id="update-session-form" action="updateSession.php" method="POST">
                <fieldset>

                  <!-- Start Date -->
                  <div class="form-group has-feedback">
                    <label class="control-label" for="date">Start Date</label>
                    <div class="controls">
                      <input type="date" id="start_date" name="start_date" value="<?php echo $row['session_date']; ?>" class="form-control" data-min-error="Date must be tomorrow or later." required>
                      <p class="help-block with-errors">Please provide the date</p>
                    </div>
                  </div>

                  <!-- End Date -->
                   <div class="form-group has-feedback">
                    <label class="control-label" for="date">End Date</label>
                    <div class="controls">
                      <input type="date" id="end_date" name="end_date" value="<?php echo $row['session_date']; ?>" class="form-control" data-min-error="Date must be tomorrow or later." required>
                      <p class="help-block with-errors">Please provide the date</p>
                    </div>
                  </div>

                  <!-- Start Time -->
                  <div class="form-group has-feedback">
                    <label class="control-label" for="time">Start Time</label>
                    <div class="controls">
                      <input type="time" id="start_time" name="start_time" value="<?php echo $time ?>" class="form-control" required>
                      <p class="help-block with-errors">Please provide the time</p>
                    </div>
                  </div>

                  <!-- End Time -->
                  <div class="form-group has-feedback">
                    <label class="control-label" for="time">End Time</label>
                    <div class="controls">
                      <input type="time" id="end_time" name="end_time" value="<?php echo $time ?>" class="form-control" required>
                      <p class="help-block with-errors">Please provide the time</p>
                    </div>
                  </div>

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

                  <div id="participants-section" class="form-group has-feedback">
                    <label class="control-label" for="maxParticipants">Number of Needed Jobseekers</label>
                    <div class="controls">
                        <input type="number" min="1" id="maxJobseekers" name="maxJobseekers"  value="<?php echo $row['max_num_part']; ?>" class="form-control" required>
                        <p class="help-block with-errors">Please provide the number of Jobseekers needed</p>
                    </div>
                  </div>


                  <div class="form-group">
                      <label class="control-label" for="description">Description</label>
                      <div class="controls">
                            <textarea class="form-control" id="description" name="description" rows="3" maxlength="500" value="<?php echo $row['max_num_part']; ?>" required></textarea>
                          <p class="help-block with-errors">Please provide the descriptions</p>
                      </div>
                    </div>

                  
                    <div class="controls">
                      <input class="hidden" id="session-id" name="session_id" value="">
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
      document.getElementById("date").setAttribute("min", today);

      if("<?php echo $session_type_grpOrPrs; ?>" == 'Personal'){
        $('#participants-section').remove();
      }

      var type = "<?php echo $row['type']; ?>";
      if(type == 'Dance'){
        $('#dance').attr('checked', true);
        $('#mma').attr('checked', false);
        $('#sport').attr('checked', false);
      } else if(type == 'MMA'){
        $('#dance').attr('checked', false);
        $('#mma').attr('checked', true);
        $('#sport').attr('checked', false);
      } else{
        $('#dance').attr('checked', false);
        $('#mma').attr('checked', false);
        $('#sport').attr('checked', true);
      }

      var status = "<?php echo $row['status']; ?>";
      if(status == 'Available'){
        $('#available').attr('checked', true);
        $('#canceled').attr('checked', false);
      } else{
        $('#available').attr('checked', false);
        $('#canceled').attr('checked', true);
      }

      $('#session-id').attr('value', <?php echo $row['session_id']; ?>);

    });

    </script>


</body>

</html>
