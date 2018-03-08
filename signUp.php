<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Sign Up</title>

  <!-- icon -->
  <link rel="icon" href="icon.ico" type="image/x-icon">

  <!-- Google font: Oswald -->
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/signUp.css" rel="stylesheet">


</head>

<body>

  <?php include "login-header.php"; ?>

</header>

<div class="container" id="signUp-section">
  <div class="row">


    <div class="col-sm-6 col-sm-offset-3 form-section">
      <h1 class="text-center" style="font-family: 'Oswald', sans-serif;">Create your account</h1>

      <ul class="nav nav-pills">
        <li class="active text-center"><a data-toggle="pill" href="#member" id="signUpMemberSection">Job Seeker</a></li>
        <li class="text-center"><a data-toggle="pill" href="#trainer" id="signUpTrainerSection">Client</a></li>
      </ul>

      <div class="tab-content form-content">
        <div id="member" class="tab-pane fade in active">
          <form data-toggle="validator" class="form-horizontal" id="member-form" action="member.php" method="POST">
            <fieldset>
              <div class="form-group has-feedback">
                <label class="control-label" for="fullname">Full Name</label>
                <div class="controls">
                  <input type="text" id="js_fullname" name="fullname" class="form-control" value="<?php echo $_COOKIE['fullname']; ?>" maxlength = "50" required>
                  <p class="help-block with-errors">Please provide your full name</p>
                </div>
              </div>

              <div class="form-group has-feedback">
                <label class="control-label" for="username">Username</label>
                <div class="controls">
                  <input type="text" pattern="^[_A-z0-9]{1,}$" maxlength="15" id="js_username" name="username" class="form-control" value="<?php echo $_COOKIE['username']; ?>" required>
                  <p class="help-block with-errors">Username can contain any letters or numbers, without spaces</p>
                </div>
              </div>

              <div class="form-group has-feedback ">
                <label class="control-label" for="email">E-mail</label>
                <div class="controls">
                  <input type="email" id="js_email" name="email" class="form-control" value="<?php echo $_COOKIE['email']; ?>" maxlength = "50" required>
                  <p class="help-block with-errors">Please provide your E-mail (email@example.com)</p>
                </div>
              </div>

              <!-- Add field for Phone Number -->
              <div class="form-group has-feedback ">
                <label class="control-label" for="tel">Phone No</label>
                <div class="controls">
                  <input type="tel" pattern="[0-9]{1,}" data-minlength="10"  id="js_tel" name="tel" class="form-control" value="<?php echo $_COOKIE['tel']; ?>" maxlength = "12" required>
                  <p class="help-block with-errors">Please provide your phone number (01112345678)</p>
                </div>
              </div>


              <div class="form-group has-feedback">
                <label class="control-label" for="mem_password">Password</label>
                <div class="controls">
                  <input type="password" data-minlength="6" id="mem_password" name="mem_password" class="form-control" data-error="Password should be at least 6 characters" maxlength = "50" required>
                  <p class="help-block with-errors">Please provide your password</p>
                </div>
              </div>

              <div class="form-group has-feedback">
                <label class="control-label" for="mem_password_confirm">Password (Confirm)</label>
                <div class="controls">
                  <input type="password" id="mem_password_confirm" data-match="#mem_password" data-match-error="Whoops, these don't match" name="mem_password_confirm" class="form-control" maxlength = "50" required>
                  <p class="help-block with-errors">Please confirm password</p>
                </div>
              </div>
            
              <div class="controls">
                <button type="reset" class="btn btn-reset btn-default">Reset</button>
                <button type="submit" class="btn btn-submit btn-success pull-right">Register</button>

              </div>
            </fieldset>
          </form>

        </div>
        <div id="trainer" class="tab-pane fade">
          <form data-toggle="validator" class="form-horizontal" id="trainer-form" action="trainer.php" method="POST">
            <fieldset>
              <div class="form-group has-feedback">
                <label class="control-label" for="cl_fullname">Full Name</label>
                <div class="controls">
                  <input type="text" id="fullname" name="fullname" class="form-control" value="<?php echo $_COOKIE['tr_fullname']; ?>" maxlength = "50" required>
                  <p class="help-block with-errors">Please provide your full name</p>
                </div>
              </div>

              <div class="form-group has-feedback">
                <label class="control-label" for="username">Username</label>
                <div class="controls">
                  <input type="text" pattern="^[_A-z0-9]{1,}$" maxlength="15" id="cl_username" name="username" class="form-control" value="<?php echo $_COOKIE['tr_username']; ?>" required>
                  <p class="help-block with-errors">Username can contain any letters or numbers, without spaces</p>
                </div>
              </div>

              <div class="form-group has-feedback ">
                <label class="control-label" for="email">E-mail</label>
                <div class="controls">
                  <input type="cl_email" id="email" name="email" class="form-control" value="<?php echo $_COOKIE['tr_email']; ?>" maxlength = "50" required>
                  <p class="help-block with-errors">Please provide your E-mail (email@example.com)</p>
                </div>
              </div>

              <!-- Add field for phone number -->
              <div class="form-group has-feedback ">
                <label class="control-label" for="tel">Phone No</label>
                <div class="controls">
                  <input type="tel" pattern="[0-9]{1,}" data-minlength="10" id="cl_tel" name="tel" class="form-control" value="<?php echo $_COOKIE['tel']; ?>" maxlength = "12" required>
                  <p class="help-block with-errors">Please provide your phone number (01112345678)</p>
                </div>
              </div>
              

              <div class="form-group has-feedback">
                <label class="control-label" for="tr_password">Password</label>
                <div class="controls">
                  <input type="password" data-minlength="6" id="tr_password" name="tr_password" class="form-control" data-error="Password should be at least 6 characters" maxlength = "50" required>
                  <p class="help-block with-errors">Please provide your password</p>
                </div>
              </div>

              <div class="form-group has-feedback">
                <label class="control-label" for="tr_password_confirm">Password (Confirm)</label>
                <div class="controls">
                  <input type="password" id="tr_password_confirm" data-match="#tr_password" data-match-error="Whoops, these don't match" name="tr_password_confirm" class="form-control" maxlength = "50" required>
                  <p class="help-block with-errors">Please confirm password</p>
                </div>
              </div>
             
              <div class="controls">
                <button type="reset" class="btn btn-reset btn-default">Reset</button>
                <button type="submit" class="btn btn-submit btn-success pull-right">Register</button>

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

<!-- Phone number validator -->
<script src="js/bootstrap-formhelpers-phone.js"></script>


<!--Validator -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>


</body>

</html>
