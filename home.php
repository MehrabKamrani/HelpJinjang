<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <!-- icon -->
    <link rel="icon" href="icon.ico" type="image/x-icon">

    <!-- Google font: Oswald -->
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Animate.css CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet">

    <!-- FontAwesome CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/home.css" rel="stylesheet">


</head>

<body>


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

                     <button type="button" class="btn btn-success" id="login-btn" name="login" onclick="location.href='loginPage.php';">Log In</button>

                     <button type="button" class="btn btn-primary" name="signup" onclick="location.href='signUp.php';">Sign Up</button>
                   </form>
                 </div>
                 <!-- End .navbar-collapse -->
             </div>
             <!-- End .container -->
         </nav>

     </header>


    <!-- Start Video Section -->
    <div class="fullscreen-bg">
          <div class="aboutUs">
              <h1 class="about-head text-center">HELPJinjang</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

          </div>
          <div class="go-down animated bounce infinite">
            <a href="#help-section" class="scroll-link" id="go-down-link">
                <i class="fa fa-angle-down fa-5x" aria-hidden="true"></i>
            </a>
        </div>
    </div><!-- End Video Section -->



    <div id="help-section"><!-- Help Section -->
        <div class="container">
            <header><h1 class="help-head text-center">How You Can Help?</h1></header>
            <div class="row helps">
                <div class="col-sm-4 col-xs-6 first-col hidden">
                    <a href=""><h3 class="help-title text-center">Volunteers</h3></a>
                    <img class="img-responsive help-img" src="images/volunteers.png" alt="Volunteers Photo">
                </div>
                <div class="col-sm-4 col-xs-6 second-col hidden">
                    <a href=""><h3 class="help-title text-center">Learning Materials</h3></a>
                    <img class="img-responsive help-img" src="images/learning-materials.png" alt="Learning Materials Photo">
                </div>
                <div class="col-sm-4 col-xs-6 third-col hidden">
                    <a href=""><h3 class="help-title text-center">School Supplies</h3></a>
                    <img class="img-responsive help-img" src="images/school-supplies.png" alt="School Supplies Photo">
                </div>
                <div class="col-sm-4 col-xs-6 fourth-col hidden">
                    <a href=""><h3 class="help-title text-center">Sponsor a Child</h3></a>
                    <img class="img-responsive help-img" src="images/sponsor.png" alt="Sponsor a Child Photo">
                </div>
                <div class="col-sm-4 col-xs-6 fifth-col hidden">
                    <a href=""><h3 class="help-title text-center">E-Business</h3></a>
                    <img class="img-responsive help-img" src="images/e-business.png" alt="E-Business Photo">
                </div>
                <div class="col-sm-4 col-xs-6 sixth-col hidden">
                    <a href=""><h3 class="help-title text-center">Donation</h3></a>
                    <img class="img-responsive help-img" src="images/donation.png" alt="Donation Photo">
                </div>
            </div>
        </div>
    </div><!-- / Help Section -->

    <?php include "footer.php"; ?>


    <!-- jQuery -->
    <script src="js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Costom JavaScript -->
    <script src="js/home.js"></script>


</body>

</html>
