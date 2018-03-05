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


    <?php include "login-header.php"; ?>


    <!-- Start Video Section -->
    <div class="fullscreen-bg">
          <div class="aboutUs">
              <h1 class="about-head text-center">HELPJinjang</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <a class="btn btn-default pull-right" href="signUp.php" role="button">Sign up</a>
          </div>
          <div class="go-down animated bounce infinite">
            <a href="#service-section" class="scroll-link" id="go-down-link">
                <i class="fa fa-angle-down fa-5x" aria-hidden="true"></i>
            </a>
        </div>
    </div><!-- End Video Section -->



    <div id="service-section"><!-- Service Section -->
        <div class="container">
            <header><h1 class="service-head text-center">Our Classes</h1></header>
            <div class="row services">
                <div class="col-md-4 col-sm-8 first-col hidden">
                    <h2 class="service-title text-center">Dance</h2>
                    <img class="img-responsive service-img" src="https://unsplash.it/350/200" alt="Dance Photo">
                    <div class="service-description text-justify">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                </div>
                <div class="col-md-4 col-sm-8 second-col hidden">
                    <h2 class="service-title text-center">MMA</h2>
                    <img class="img-responsive service-img" src="https://unsplash.it/350/200" alt="MMA Photo">
                    <div class="service-description text-justify">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                </div>
                <div class="col-md-4 col-sm-8 third-col hidden">
                    <h2 class="service-title text-center">Sport</h2>
                    <img class="img-responsive service-img" src="https://unsplash.it/350/200" alt="Sport Photo">
                    <div class="service-description text-justify">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                </div>
            </div>
        </div>
    </div><!-- / Service Section -->

    <footer id="footer">
        <div class="container text-center">
            <div class="footer-logo">
                <h1 style="font-family: 'Oswald', sans-serif; color:white;">ProteinShape</h1>
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
            <p id="copyright">Copyright &copy; ProteinShape 2017</p>
        </div>
    </footer>




    <!-- jQuery -->
    <script src="js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Costom JavaScript -->
    <script src="js/home.js"></script>


</body>

</html>
