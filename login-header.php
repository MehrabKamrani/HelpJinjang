<?php
// Start the session
session_start();
?>
<!-- Navigation -->
<!-- Custom CSS -->
<link href="css/home.css" rel="stylesheet">
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

               <!-- Start If. Check if the Client is signed in -->
            <?php if(!empty($_SESSION['cl_username'])) : ?>
                <!-- If Client signed in put his fullname -->
                <form class="navbar-form-user navbar-right" action="" method="POST" id="login-form">
                    <p class="navbar-text navbar-right"> <a href="clientPage.php"><?php echo $_SESSION['cl_fullname'];?></a></p>
                </form>

            <?php else: ?>
                <!-- If he is not signed in put Buttons -->
                <form class="navbar-form navbar-right" action="" method="POST" id="login-form">
                    <button type="button" class="btn btn-success" id="login-btn" name="login" onclick="location.href='loginPage.php';">Log In</button>

                    <button type="button" class="btn btn-primary" name="signup" onclick="location.href='signUp.php';">Sign Up</button>
            <?php endif; ?>
            <!-- End if -->

            </form>
        </div>
        <!-- End .navbar-collapse -->
    </div>
    <!-- End .container -->
</nav>

</header>
