<!DOCTYPE html>
<html lang="en">
    <head>
        <title>KRISH LANDS : Best Lands in Sri lanka </title>
        <link href="<?php echo base_url(); ?>site/css/bootstrap.css" type="text/css" rel="stylesheet" media="all"><!-- Bootstrap stylesheet -->
        <link href="<?php echo base_url(); ?>site/css/style.css" rel="stylesheet" type="text/css" media="all" /><!-- stylesheet -->
        <link href="<?php echo base_url(); ?>site/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" /><!-- fontawesome -->  
        <!-- meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="krish lands , best lands in sri lanka , best lands" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //meta tags -->
        <!--fonts-->
        <link href="//fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <!--//fonts-->	
        <script type="text/javascript" src="<?php echo base_url(); ?>site/js/jquery-2.1.4.min.js"></script><!-- Required-js -->
        <script src="<?php echo base_url(); ?>site/js/bootstrap.min.js"></script><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- Include jQuery & Filterizr -->

        <script src="<?php echo base_url(); ?>site/js/jquery.filterizr.js"></script>
        <script src="<?php echo base_url(); ?>site/js/controls.js"></script>

        <!-- Kick off Filterizr -->
        <script type="text/javascript">
            $(function() {
                //Initialize filterizr with default options
                $('.filtr-container').filterizr();
            });
        </script>
        <!-- here stars scrolling icon -->
        <script type="text/javascript">
            $(document).ready(function() {
                /*
                 var defaults = {
                 containerID: 'toTop', // fading element id
                 containerHoverID: 'toTopHover', // fading element hover id
                 scrollSpeed: 1200,
                 easingType: 'linear' 
                 };
                 */

                $().UItoTop({easingType: 'easeOutQuart'});

            });
        </script>
        <!-- start-smoth-scrolling -->
        <script type="text/javascript" src="<?php echo base_url(); ?>site/js/move-top.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>site/js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                });
            });
        </script>
        <!-- start-smoth-scrolling -->
        <!-- //here ends scrolling icon -->
    </head>
    <body>
        <!-- header -->
        <header>
            <div class="container">
                <!-- nav -->
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="logo">
                                <h1><a href="<?php echo base_url(); ?>">KRISH LANDS</a></h1>
                            </div>	
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="active"><a href="properties">Properties</a></li>
                                <li><a href="blog">Blog</a></li>
                                <li><a href="contact">Contact</a></li>
                                <li><a href="about">About</a></li>
                                <li><a href="signin">Signin</a></li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container-fluid -->
                </nav> 
                <script src="<?php echo base_url(); ?>site/js/nav.js"></script><!-- nav-js --> 
                <!-- //nav -->
            </div>
        </header>
        <!-- //header -->
        <!-- breadcrumbs -->
        <div class="w3ls-inner-banner">
            <div class="container">
                <h2>LANDS</h2>
                <label></label>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //breadcrumbs -->

        <!-- main-content -->
        <div class="main-content">
            <!-- gallery -->
            <div class="gallery" id="gallery">
                <div class="container">
                    <div class="gallery_gds">
                        <ul class="simplefilter ">
                            <li class="active" data-filter="all">All</li>
                            <li data-filter="1">Commercial</li>
                            <li data-filter="2">Residential</li>
                            <li data-filter="3">Luxury</li>
                        </ul>   
                        <div class="filtr-container " style="padding: 0px; position: relative; height: 858px;">
                            <?php
                            foreach ($lands as $landlist) {
                                $this->Landsm->count_lands($landlist['id']);
                                ?>
                                <div class="col-md-4 col-ms-6 jm-item first filtr-item" data-category="1, 5" data-sort="Busy streets" style="opacity: 1; transform: scale(1) translate3d(0px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; transition: all 0.5s ease-out 0ms;">
                                    <div class="jm-item-wrapper">
                                        <div class="jm-item-image">
                                            <img src="<?php echo base_url(); ?>files/<?php echo $landlist['image'] ?>" alt="property" />
                                            <span class="jm-item-overlay"> </span>
                                            <div class="jm-item-button"><a href="property-details">View Details</a></div>
                                        </div>	
                                        <div class="jm-item-title">Rs.<?php echo $landlist['prize'] ?>/-</div>
                                        <a class="agile-its-property-title" href="property-details">Land at <?php echo $location[$landlist['location']] ?></a>
                                        </br>
                                        <p class="w3ls-p-text"><?php echo $landlist['address'] ?></p>
                                        <p class="w3ls-p-text"><?php echo $landlist['details'] ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>	
            </div>
            <!--//gallery-->
        </div>
        <!-- //main-content -->
        <!-- footer -->
        <?php
        $this->load->view('site/footer');
        ?>
        <!-- //footer -->
    </body>
</html>