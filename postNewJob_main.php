<?php

$connect = mysqli_connect("localhost", "root","", "helpjinjang");

$query = "SELECT * FROM `category` ORDER BY `categoryName`";

$result = mysqli_query($connect, $query);


 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Post a New Job</title>

    <!-- icon -->
    <link rel="icon" href="icon.ico" type="image/x-icon">

    <!-- Google font: Oswald -->
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/postNewJob.css" rel="stylesheet">


</head>

<body>

  <!-- Navigation -->
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
					<a class="navbar-brand" href="client_main.php">HELPJinjang</a>

				</div>
				<!-- Collect the nav links for toggling -->
				<div class="collapse navbar-collapse" id="tr-mainNavbar">
					<p class="navbar-text navbar-right"><?php echo "Mehrab Kamrani"; ?></p>
					<a href="home.html" type="button" id="btn-logout" class="btn btn-default navbar-btn navbar-right">Log out</a>
				</div>
				<!-- End .navbar-collapse -->
			</div>
			<!-- End .container -->
		</nav>

	</header>
    <div class="container" id="new-job-section">
      <div class="row">


        <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 form-section">
          <h1 class="text-center" style="font-family: 'Oswald', sans-serif;">Post New Job</h1>

          <div class="form-content container-post-job-form">

              <form data-toggle="validator" class="form-horizontal" id="post-job-form" action="postNewJob.php" method="POST">
                  <fieldset>
                    <div class="form-group has-feedback">
                      <label class="control-label" for="title">Title</label>
                      <div class="controls">
                        <input type="text" id="title" name="title" class="form-control" maxlength="30" required>
                        <p class="help-block with-errors">Please provide the title</p>
                      </div>
                    </div>

                    <div class="form-group has-feedback">
                      <label class="control-label" for="startingDate">Starting Date</label>
                      <div class="controls">
                        <input type="date" id="startingDate" name="startingDate" class="form-control" data-min-error="Starting date must be tomorrow or later." required>
                        <p class="help-block with-errors">Please provide the starting date</p>
                      </div>
                    </div>

                    <div class="form-group has-feedback">
                      <label class="control-label" for="endingDate">Ending Date</label>
                      <div class="controls">
                        <input type="date" id="endingDate" name="endingDate" class="form-control" data-min-error="Starting date must be tomorrow or later." required>
                        <p class="help-block with-errors">Please provide the ending date</p>
                      </div>
                    </div>

                    <div class="form-group has-feedback">
                      <label class="control-label" for="startingTime">Starting Time</label>
                      <div class="controls">
                        <input type="time" id="startingTime" name="startingTime" class="form-control" required>
                        <p class="help-block with-errors">Please provide the starting time</p>
                      </div>
                    </div>

                    <div class="form-group has-feedback">
                      <label class="control-label" for="endingTime">Ending Time</label>
                      <div class="controls">
                        <input type="time" id="endingTime" name="endingTime" class="form-control" required>
                        <p class="help-block with-errors">Please provide the ending time</p>
                      </div>
                    </div>

                    <div class="form-group has-feedback">
                      <label class="control-label" for="salary">Salary</label>
                      <div class="controls">
                        <div class="input-group">
                          <span class="input-group-addon">RM</span>
                          <input type="number" min="1" id="salary" name="salary" class="form-control" required>
                          <span class="input-group-addon">.00</span>
                        </div>
                        <p class="help-block with-errors">Please provide the salary</p>
                      </div>
                    </div>

                    <div class="form-group has-feedback">
                      <label class="control-label" for="qtyOfJobSeekers">Number of Needed Jobseekers</label>
                      <div class="controls">
                          <input type="number" min="1" id="qtyOfJobSeekers" name="qtyOfJobSeekers" class="form-control" required>
                          <p class="help-block with-errors">Please provide the number of needed jobseekers</p>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="category">Category</label>
                      <div class="controls">
                        <select class="form-control" id="category" name="category" required>
                            <?php while($row = mysqli_fetch_array($result)):;?>
                            <option value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
                            <?php endwhile;?>
                        </select>
                        <p class="help-block with-errors">Please provide the category</p>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="address">Address</label>
                      <div class="controls">
                          <textarea class="form-control" id="address" name="address" rows="3" maxlength="200" required></textarea>
                          <p class="help-block with-errors">Please provide the address</p>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="description">Description</label>
                      <div class="controls">
                          <textarea class="form-control" id="description" name="description" rows="3" maxlength="500" required></textarea>
                          <p class="help-block with-errors">Please provide the descriptions</p>
                      </div>
                    </div>

                    <div class="controls">
                      <button type="reset" class="btn btn-reset btn-default">Reset</button>
                      <button type="submit" class="btn btn-submit btn-success pull-right">Post</button>
                    </div>
                  </fieldset>
                </form>
          </div>
        </div>
      </div>
    </div>
    <?php include "footer.php"; ?>

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
      document.getElementById("startingDate").setAttribute("min", today);
      document.getElementById("endingDate").setAttribute("min", today);

      $("#startingDate").change(function() {
        var startingDate = $("#startingDate").val();
        $("#endingDate").attr("min", startingDate);
        $("#endingDate").attr("data-min-error", "Ending date must be after starting date.");

      });


    });
    </script>


</body>

</html>
