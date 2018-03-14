<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WE-photographer</title>

    <!-- icon -->
    <link rel="icon" href="icon.ico">

    <!-- Google font: Oswald -->
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Lightbox CSS -->
    <link href="css/lightbox.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">


</head>

<body>

    <!-- Navigation -->
    <header id="navigation">
        <nav class="navbar navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="home.html"><img alt="Logo" src="logo.png" height="40"></a>

                </div>
                <!-- Collect the nav links for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav pull-right">
                        <li>
                            <a href="home.html">Home</a>
                        </li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li>
                            <a href="#blogs">Blogs</a>
                        </li>
                        <li>
                            <a href="#gadgets">New Gadgets</a>
                        </li>
                        <li>
                            <a href="#photos">Photos</a>
                        </li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
                <!-- End .navbar-collapse -->
            </div>
            <!-- End .container -->
        </nav>

    </header>
    
    <!-- Start Home Section -->
    <div id="myCarousel" class="carousel slide home">
        <!-- Full Page Image Background Carousel -->
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('carousel-photos/village-1510797_1280.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Village</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('carousel-photos/lost-places-1510592_1280.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Lost Places</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('carousel-photos/orphan-1139042_1280.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Orphan</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('carousel-photos/dancer-1489686_1280.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Dancer</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('carousel-photos/berries-1493905_1280.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Berries</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </div><!-- End Home Section -->

    <div id="about"><!-- About Section -->
        <div class="container">
            <div class="about-wrapper row">
                <aside class="about-img-section col-md-6 col-sm-4">
                    <img class="img-responsive about-img" src="images/about.jpg" alt="about photo">
                </aside>
                <div class="about-text-section col-md-6 col-sm-8">
                    <h1 class="about-title">WE-photographer</h1>
                    <p class="about-paragraph">
                        WE-photographers is a platform where the latest photography gadgets can be viewed. The website is been designed in such a way that passionate photographers can get inspired by photos from all over the world. A place where You can take a photo upload it to the website and hear the input of other photographers who are just as passionate as you. WE-photographers will also have a place for your photography related blogs. You can write a blog or just simply comment on one and share your input.
                    </p>
                    <p class="about-paragraph">
                        About the developers. We are a team of multinational developers who come from different backgrounds , speak different languages and defiantly have different cultures. This is why our work is very unique as we have different views from each member of our multinational team. Our audience are these people who are passionate about photography or just love tacking photos. WE-photographers be a place for all photo tacking lovers  who would like to keep up with the latest technology / gadgets in the photography world. Our website is not limited to professional photographers, It's there for public who love tacking photos.
                    </p>
                </div>
            </div> 
        </div>
    </div><!-- / About Section -->

    <div id="blogs"><!-- Blogs Section -->
        <div class="container">
            <header><h1 class="blogs-head">Latest Blogs</h1></header>
            <div class="row blogs-latest">
                <div class="col-md-4">
                    <img class="img-responsive img-thumbnail blogs-img" src="blogs-photos/tiger/t6.jpg" alt="blog photo">
                    <p class="blogs-description">
                        The ferocity of big cats is captured by cameras
                    </p>
                    <div class="blogs-link">
                        <a href="tiger.html">Read Full Blog</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <img class="img-responsive img-thumbnail blogs-img" src="blogs-photos/southKorea/k6.jpg" alt="blog photo">
                    <p class="blogs-description">
                        The stunning look of mirror-looking lakes and rivers of South Korea
                    </p>
                    <div class="blogs-link">
                        <a href="southKorea.html">Read Full Blog</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <img class="img-responsive img-thumbnail blogs-img" src="blogs-photos/owl/o4.jpg" alt="blog photo">
                    <p class="blogs-description">
                        The charming look of an adorable tiny owl
                    </p>
                    <div class="blogs-link">
                        <a href="owl.html">Read Full Blog</a>
                    </div>
                </div>
            </div>
            <footer>
                <h2 class="blogs-all"><a href="blogs.html">View All Blogs</a></h2>
            </footer>
        </div>
    </div><!-- / Blogs Section -->

    <div id="gadgets"><!-- Gadgets Section -->
        <div class="container">
            <header><h1 class="gadgets-head">Newest Gadgets</h1></header>
            <div class="row gadgets-latest">
                <div class="col-md-4">
                    <img class="img-responsive img-thumbnail gadgets-img" src="gadgets-photos/1.jpg" alt="gadget photo">
                    <p class="gadgets-description">
                        Syrp Genie Motion Control Time Lapse Device
                    </p>
                    <div class="gadgets-link">
                        <a href="gadget1.html">Read more</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <img class="img-responsive img-thumbnail gadgets-img" src="gadgets-photos/4.jpg" alt="gadget photo">
                    <p class="gadgets-description">
                        Vello FreeWave Stryker Lightning &amp; Motion Trigger
                    </p>
                    <div class="gadgets-link">
                        <a href="gadget4.html">Read more</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <img class="img-responsive img-thumbnail gadgets-img" src="gadgets-photos/3.jpg" alt="gadget photo">
                    <p class="gadgets-description">
                        Manfrotto Digital Director
                    </p>
                    <div class="gadgets-link">
                        <a href="gadget3.html">Read more</a>
                    </div>
                </div>
            </div>
            <footer>
                <h2 class="gadgets-all"><a href="gadgets.html">View All New Gadgets</a></h2>
            </footer>
        </div>
    </div><!-- / Gadgets Section -->

    <div id="photos"><!-- Photos Section -->
        <div class="container">
            <header><h1 class="photos-head">Popular Photos</h1></header>
            <div class="row photos-popular">
                <div class="col-md-6">
                    <a href="gallery-photos/karstenKettermann.jpg" data-lightbox="gallery" data-title="Taken by: Karsten Kettermann">
                        <img class="img-responsive img-thumbnail photos-img" alt='gallery photo' src="gallery-photos/karstenKettermann.jpg">
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="gallery-photos/jill.jpg" data-lightbox="gallery" data-title="Taken by: Jill">
                        <img class="img-responsive img-thumbnail photos-img" alt='gallery photo' src="gallery-photos/jill.jpg">
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="gallery-photos/bogitow.jpg" data-lightbox="gallery" data-title="Taken by: Bogitow">
                        <img class="img-responsive img-thumbnail photos-img" alt='gallery photo' src="gallery-photos/bogitow.jpg">
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="gallery-photos/devenath.jpg" data-lightbox="gallery" data-title="Taken by: Devenath">
                        <img class="img-responsive img-thumbnail photos-img" alt='gallery photo' src="gallery-photos/devenath.jpg">
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="gallery-photos/hBieser.jpg" data-lightbox="gallery" data-title="Taken by: H.Bieser">
                        <img class="img-responsive img-thumbnail photos-img" alt='gallery photo' src="gallery-photos/hBieser.jpg">
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="gallery-photos/skeeze.jpg" data-lightbox="gallery" data-title="Taken by: Skeeze">
                        <img class="img-responsive img-thumbnail photos-img" alt='gallery photo' src="gallery-photos/skeeze.jpg">
                    </a>
                </div>
            </div>
            <footer>
                <h2 class="photos-all"><a href="photos.html">View All Photos</a></h2>
            </footer>
        </div>
    </div><!-- / Photos Section -->

    <div id="contact"><!-- Contact Section -->
        <div class="container">
            <header><h1 class="contact-head">We'd Love to Hear from You!</h1></header>
            <div class="row">
                <aside class="contact-description col-md-5">
                    <div class="contact-aside-img-section">
                        <img class="img-responsive contact-aside-img" src="images/contact.jpg" alt="contact photo">
                    </div>
                    <p class="contact-description-text">Wherever you are in the world, know that we’re only a click away.
                    <p class="contact-description-text">For general inquiries</p>
                    <p class="contact-description-text">Contact us by emailing us at:</p>
                    <p class="contact-description-text">info@xxxxxxxx.xxx</p>
                    <p class="contact-description-text">At We-photographers we ensure that all photos are best quality and appropriate for users. Each photo on our website will go through screening process.</p>
                    <p class="contact-description-text">If you are photographer who wish to upload pictures to our website contact us by emailing us at:</p>
                    <p class="contact-description-text">admin@xxxxxxxx.xxx</p>
                    <p class="contact-description-text">We are exited to hearing from you!</p>
                </aside>
                <form class="contact-form col-offset-md-6 col-md-6">
                     <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <label for="name">Message</label>
                        <textarea class="form-control" rows="10" placeholder="Your Message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div><!-- / Contact Section -->

    <footer id="footer">
        <div class="container">
            <div class="footer-logo">
                <img alt="Logo" src="logo.png" height="60">
            </div>
            <ul class="footer-nav list-inline">
                <li>
                    <a href="home.html">Home</a>
                </li>
                <li>
                    <a href="#about">About</a>
                </li>
                <li>
                    <a href="#blogs">Blogs</a>
                </li>
                <li>
                    <a href="#gadgets">New Gadgets</a>
                </li>
                <li>
                    <a href="#photos">Photos</a>
                </li>
                <li>
                    <a href="#contact">Contact</a>
                </li>
            </ul>
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
            <p id="copyright">Copyright &copy; WE-photographer 2016</p>
        </div>
    </footer>




    <!-- jQuery -->
    <script src="js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Lightbox JavaScript -->
    <script src="js/lightbox.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
