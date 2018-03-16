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
<?php include "login-header.php";?> 

<body>


    <!-- Start Video Section -->
    <div class="fullscreen-bg">
          <div class="aboutUs">
              <h1 class="about-head text-center">Impact a life, transform a community</h1>
              <p> ACTS Global Networking (AGN) is a non-profit organization mainly focusing on education and social concern activities. One of the community activities that it has been involved in over the past fourteen years is its “street ministry” where the organization reaches out and helps the hurting and neglected children and youth in Jinjang. AGN has been extending support, counselling and meeting the material needs of this needful community for over fourteen years.  <button type="button" class="btn btn-default"  name="login" onclick="location.href='aboutUs.php';">More</button></p>

              <br>


              <p> The children in Jinjang Utara have been growing up in a poverty stricken environment. Some were abandoned by their parents or are neglected in an environment of abject poverty. Jonathan Ambalagan and Mary Ramamoothy started the community work and have been reaching out to the children of Jinjang Utara for the past 17 years.                                             <button type="button" class="btn btn-default"  name="login" onclick="location.href='info.php';">More</button></p>

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
                    <a href="howCanHelp.html#volunteers"><h3 class="help-title text-center">Volunteers</h3></a>
                    <img class="img-responsive help-img" src="images/volunteers.png" alt="Volunteers Photo">
                </div>
                <div class="col-sm-4 col-xs-6 second-col hidden">
                    <a href="howCanHelp.html#learningMaterials"><h3 class="help-title text-center">Learning Materials</h3></a>
                    <img class="img-responsive help-img" src="images/learning-materials.png" alt="Learning Materials Photo">
                </div>
                <div class="col-sm-4 col-xs-6 third-col hidden">
                    <a href="howCanHelp.html#schoolSupplies"><h3 class="help-title text-center">School Supplies</h3></a>
                    <img class="img-responsive help-img" src="images/school-supplies.png" alt="School Supplies Photo">
                </div>
                <div class="col-sm-4 col-xs-6 fourth-col hidden">
                    <a href="howCanHelp.html#sponsorChild"><h3 class="help-title text-center">Sponsor a Child</h3></a>
                    <img class="img-responsive help-img" src="images/sponsor.png" alt="Sponsor a Child Photo">
                </div>
                <div class="col-sm-4 col-xs-6 fifth-col hidden">
                    <a href="howCanHelp.html#e-business"><h3 class="help-title text-center">E-Business</h3></a>
                    <img class="img-responsive help-img" src="images/e-business.png" alt="E-Business Photo">
                </div>
                <div class="col-sm-4 col-xs-6 sixth-col hidden">
                    <a href="howCanHelp.html#donation"><h3 class="help-title text-center">Donation</h3></a>
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
