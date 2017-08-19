<?php //var_dump($activepage); ?>
<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from beetube.me/html-template/home-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Feb 2017 09:41:45 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="<?php echo $metainfo['0']['name']; ?>" content="<?php echo $metainfo['0']['content']; ?>">
    <meta name="<?php echo $metainfo['1']['name']; ?>" content="<?php echo $metainfo['1']['content']; ?>">
    <meta name="<?php echo $metainfo['3']['name']; ?>" content="<?php echo $metainfo['3']['content']; ?>">
    <meta name="<?php echo $metainfo['4']['name']; ?>" content="<?php echo $metainfo['4']['content']; ?>">

    <title><?php echo $metainfo['2']['content']; ?></title>

    <link rel="shortcut icon" href="<?php echo base_url() . 'assets/uploads/edutech/' . $metainfo['5']['imagelink']; ?>">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/beetube/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/beetube/css/theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/beetube/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/beetube/layerslider/css/layerslider.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/beetube/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/beetube/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/beetube/css/responsive.css">
</head>
<body>
<div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <!--header-->
        <div class="off-canvas position-left light-off-menu" id="offCanvas-responsive" data-off-canvas>
            <div class="off-menu-close">
                <h3>Menu</h3>
                <span data-toggle="offCanvas-responsive"><i class="fa fa-times"></i></span>
            </div>
            <ul class="vertical menu off-menu" data-responsive-menu="drilldown">
                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-arrow-left"></i>TechFocus</a></li>
                <li><a href="<?php echo base_url(); ?>edutech/index"><i class="fa fa-home"></i>EduTech</a></li>
                <li><a href="<?php echo base_url(); ?>edutech/videos"><i class="fa fa-th"></i>Videos</a></li>
                <li><a href="<?php echo base_url(); ?>edutech/about"><i class="fa fa-user"></i>about</a></li>
                <li><a href="<?php echo base_url(); ?>contactus"><i class="fa fa-envelope"></i>contact</a></li>
            </ul>
            <div class="responsive-search">
                <form method="post">
                    <div class="input-group">
                        <input class="input-group-field" type="text" placeholder="search Here">
                        <div class="input-group-button">
                            <button type="submit" name="search"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="off-social">
                <h6>Get Socialize</h6>
                <a href="<?php echo base_url(); ?>assets/beetube/#"><i class="fa fa-facebook"></i></a>
                <a href="<?php echo base_url(); ?>assets/beetube/#"><i class="fa fa-twitter"></i></a>
                <a href="<?php echo base_url(); ?>assets/beetube/#"><i class="fa fa-google-plus"></i></a>
                <a href="<?php echo base_url(); ?>assets/beetube/#"><i class="fa fa-instagram"></i></a>
                <a href="<?php echo base_url(); ?>assets/beetube/#"><i class="fa fa-vimeo"></i></a>
                <a href="<?php echo base_url(); ?>assets/beetube/#"><i class="fa fa-youtube"></i></a>
            </div>
            <div class="top-button">
                <ul class="menu">
                    <li>
                        <a href="<?php echo base_url(); ?>assets/beetube/submit-post.html">upload Video</a>
                    </li>
                    <li class="dropdown-login">
                        <a href="<?php echo base_url(); ?>assets/beetube/login.html">login/Register</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="off-canvas-content" data-off-canvas-content>
            <header>
                <!-- Top -->
                <!-- End Top -->
                <!--Navber-->
                <section id="navBar">
                    <nav class="sticky-container" data-sticky-container>
                        <div class="sticky topnav" data-sticky data-top-anchor="navBar" data-btm-anchor="footer-bottom:bottom" data-margin-top="0" data-margin-bottom="0" style="width: 100%; background: #fff;" data-sticky-on="large">
                            <div class="row">
                                <div class="large-12 columns">
                                <div class="title-bar" data-responsive-toggle="beNav" data-hide-for="large">
                                    <button class="menu-icon" type="button" data-toggle="offCanvas-responsive"></button>
                                    <div class="title-bar-title"><img src="<?php echo base_url() . 'assets/uploads/edutech/' . $metainfo['6']['imagelink']; ?>" alt="logo"></div>
                                </div>

                                <div class="top-bar show-for-large" id="beNav" style="width: 100%;">
                                    <div class="top-bar-left">
                                        <ul class="menu">
                                            <li class="menu-text">
                                                <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url() . 'assets/uploads/edutech/' . $metainfo['6']['imagelink']; ?>" alt="logo"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="top-bar-right search-btn">
                                        <ul class="menu">
                                            <li class="search">
                                                <i class="fa fa-search"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="top-bar-right">
                                        <ul class="menu vertical medium-horizontal" data-responsive-menu="drilldown medium-dropdown">
                                            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-arrow-left"></i>TechFocus</a></li>
                                            <li class="<?php echo (isset($activepage) ? ($activepage=='EduTech Home' ? 'active' : '') : '');?>">
                                                <a href="<?php echo base_url(); ?>edutech/index"><i class="fa fa-home"></i>EduTech</a>
                                            </li>
                                            <li class="<?php echo (isset($activepage) ? ($activepage=='EduTech Videos' ? 'active' : '') : '');?>"><a href="<?php echo base_url(); ?>edutech/videos"><i class="fa fa-th"></i>Videos</a></li>
                                            <li class="<?php echo (isset($activepage) ? ($activepage=='EduTech About' ? 'active' : '') : '');?>"><a href="<?php echo base_url(); ?>edutech/about"><i class="fa fa-user"></i>about</a></li>
                                            <li class="<?php echo (isset($activepage) ? ($activepage=='EduTech Contact' ? 'active' : '') : '');?>"><a href="<?php echo base_url(); ?>contactus"><i class="fa fa-envelope"></i>contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div id="search-bar" class="clearfix search-bar-light">
                                <form method="post">
                                    <div class="search-input float-left">
                                        <input type="search" name="search" placeholder="Seach Here your video">
                                    </div>
                                    <div class="search-btn float-right text-right">
                                        <button class="button" name="search" type="submit">search now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </nav>
                </section>
            </header><!-- End Header -->
            
		
			<?php echo $output;?>
			
            <!-- footer -->
            <footer>
                <a href="<?php echo base_url(); ?>assets/beetube/#" id="back-to-top" title="Back to top"><i class="fa fa-angle-double-up"></i></a>
            </footer><!-- footer -->
            <div id="footer-bottom">
                
                <div class="btm-footer-text text-center">
                    <p>2016 © EduTech all right Reserved.</p>
                </div>
            </div>
        </div><!--end off canvas content-->
    </div><!--end off canvas wrapper inner-->
</div><!--end off canvas wrapper-->
<!-- script files -->
<script src="<?php echo base_url(); ?>assets/beetube/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/beetube/bower_components/what-input/what-input.js"></script>
<script src="<?php echo base_url(); ?>assets/beetube/bower_components/foundation-sites/dist/foundation.js"></script>
<script src="<?php echo base_url(); ?>assets/beetube/js/jquery.showmore.src.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/beetube/js/app.js"></script>
<script src="<?php echo base_url(); ?>assets/beetube/layerslider/js/greensock.js" type="text/javascript"></script>
<!-- LayerSlider script files -->
<script src="<?php echo base_url(); ?>assets/beetube/layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/beetube/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/beetube/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/beetube/js/inewsticker.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/beetube/js/jquery.kyco.easyshare.js" type="text/javascript"></script>
</body>

<!-- Mirrored from beetube.me/html-template/home-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Feb 2017 09:41:45 GMT -->
</html>