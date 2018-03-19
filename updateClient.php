  <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Update Profile</title>

    <!-- icon -->
    <link rel="icon" href="icon.ico" type="image/x-icon">

    <!-- Google font: Oswald -->
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/updateProfile.css" rel="stylesheet">


</head>
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
        <p class="navbar-text navbar-right">Michael Jackson</p>
        <a href="home.html" type="button" id="btn-logout" class="btn btn-default navbar-btn navbar-right">Log out</a>
      </div>
      <!-- End .navbar-collapse -->
    </div>
    <!-- End .container -->
  </nav>

</header>
<body>

    <div class="container" id="update-profile-section">
      <div class="row">
        <div class="col-sm-6 form-section">
          <h1 class="text-center" style="font-family: 'Oswald', sans-serif;">Update Your Profile</h1>


          <div class="form-content">

            <div id="update-trainer">
              <form data-toggle="validator" class="form-horizontal" id="update-trainer-form" action="updateProfile.php" method="POST">
                  <fieldset>
                    <div class="form-group has-feedback">
                      <label class="control-label" for="fullname">Full Name</label>
                      <div class="controls">
                        <input type="text" id="fullname" name="fullname" class="form-control" required>
                        <p class="help-block with-errors">Please provide your full name</p>
                      </div>
                    </div>


                    <div class="form-group has-feedback ">
                      <label class="control-label" for="email">E-mail</label>
                      <div class="controls">
                        <input type="email" id="email" name="email" class="form-control" required>
                        <p class="help-block with-errors">Please provide your E-mail (email@example.com)</p>
                      </div>
                    </div>

                    <div class="form-group has-feedback">
                       <label class="control-label" for="tr_password">Password</label>
                      <div class="controls">
                        <input type="password" data-minlength="6" id="tr_password" name="tr_password" class="form-control" data-error="Password should be at least 6 characters" required>
                        <p class="help-block with-errors">Please provide your password</p>
                      </div>
                    </div>

                    <div class="form-group has-feedback">
                      <label class="control-label" for="tr_password_confirm">Password (Confirm)</label>
                      <div class="controls">
                        <input type="password" id="tr_password_confirm" data-match="#tr_password" data-match-error="Whoops, these don't match" name="tr_password_confirm" class="form-control" required>
                        <p class="help-block with-errors">Please confirm password</p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="specialityOptions">Speciality</label>
                      <div class="controls">
                        <label class="radio-inline">
                          <input type="radio" name="specialityOptions" checked id="dance" value="Dance"> Dance
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="specialityOptions" id="mma" value="MMA"> MMA
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="specialityOptions" id="sport" value="Sport"> Sport
                        </label>
                        <p class="help-block">Please select your speciality</p>
                      </div>
                    </div>

                    </div>

                      <div class="controls">
                        <button type="reset" class="btn btn-reset btn-default">Reset</button>
                        <button type="submit" class="btn btn-submit btn-success pull-right">Update</button>
                      </div>
                  </fieldset>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer id="footer">
        <div class="container text-center">
            <div class="footer-logo">
                <h1 style="font-family: 'Oswald', sans-serif; color:white;">ProteInshape</h1>
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
            <p id="copyright">Copyright &copy; ProteInshape 2017</p>
        </div>
    </footer>


    <!-- jQuery -->
    <script src="js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!--Validator -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>


</body>

</html>
