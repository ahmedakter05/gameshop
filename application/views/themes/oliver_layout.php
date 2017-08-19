<?php //var_dump($contacts); ?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="<?php echo $metainfo['0']['name']; ?>" content="<?php echo $metainfo['0']['content']; ?>">
	<meta name="<?php echo $metainfo['1']['name']; ?>" content="<?php echo $metainfo['1']['content']; ?>">
	<meta name="<?php echo $metainfo['3']['name']; ?>" content="<?php echo $metainfo['3']['content']; ?>">
   <meta name="<?php echo $metainfo['4']['name']; ?>" content="<?php echo $metainfo['4']['content']; ?>">

	<title><?php echo $metainfo['2']['content']; ?></title>

	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicons -->
	<link rel="shortcut icon" href="<?php echo base_url() . 'assets/uploads/files/' . $metainfo['5']['imagelink']; ?>">
	<link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/tfl1/img/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>assets/tfl1/img/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>assets/tfl1/img/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>assets/tfl1/img/apple-touch-icon-144x144.png">

	<!-- Web Fonts  -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100italic,100,300,300italic,400italic,500,700,700italic,900italic,900,500italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,700,600italic,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Arimo:400,700' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
	<script src="<?php echo base_url(); ?>assets/tfl1/js/libs/respond.min.js"></script>
	<![endif]-->

	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url(); ?>assets/tfl1/css/bootstrap.css" rel="stylesheet">

	<!-- FontAwesome icons CSS -->
	<link href="<?php echo base_url(); ?>assets/tfl1/font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<!-- Theme Styles CSS-->
	<link href="<?php echo base_url(); ?>assets/tfl1/css/styles.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/tfl1/css/accordion.css">
	<link href="<?php echo base_url(); ?>assets/tfl1/js/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/tfl1/js/owl-carousel/owl.theme.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/tfl1/js/rs-plugin/css/settings.css" rel="stylesheet" />

	<!--[if lt IE 9]>
	<script src="<?php echo base_url(); ?>js/libs/html5.js"></script>
	<![endif]-->

</head>
<body>
<div class="body">

<!-- Top-wrap -->
<div class="top-wrap">
	<div class="container top-wrap-inner">
		<div class="col-md-12">
			<div class="top-login">
				<a href="<?php echo base_url(); ?>admin/cp/login">Login</a>
			</div>
			<a href=to:sales@techfocusltd.com> 
				<div class="top-cart"><?php echo $metainfo['7']['content']; ?></div>
			</a>
		</div>
	</div>
</div>
<!-- Top-wrap -->

<!-- Header -->
<header>
   <div class="container">
      <div class="col-md-12">
         <!-- Logo -->
         <div class="col-md-2">
            <h1 class="logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url() . 'assets/uploads/files/' . $metainfo['6']['imagelink']; ?>" alt=""/></a></h1>
         </div>
         
        <!-- Navmenu -->
         <div class="col-md-8">
            <nav id='topnav'>
               <ul class="top-menu">
                  <li class='<?php echo (isset($activepage) ? ($activepage=='Home' ? 'active' : '') : '');?> has-sub'>
                     <a href='<?php echo base_url(); ?>'><span>Home</span></a>
                  </li>
                  <li class='<?php echo (isset($activepage) ? ($activepage=='Products' ? 'active' : '') : '');?> has-sub-full'>
                     <a href='<?php echo base_url() . "products/index"; ?>'<span>Products</span></a>
                     <ul class="full-sub">
                        <li class="col-md-3">
                           <ul>
                              <a href="<?php echo base_url() . 'products/index' ; ?>"><li class="sub-head">Category</li></a>
                              <?php $i=1; ?>
                              <?php foreach ($products_category as $print): ?>
                              <li><a href="<?php echo base_url() . 'products/category/' . $print['url']; ?>"><?php echo $print['name']; ?></a></li>
                              <?php if($i==6) break; $i++;?>
                              <?php endforeach; ?>
                           </ul>
                        </li>
                        <li class="col-md-3">
                           <ul>
                              <a href="<?php echo base_url() . 'blogs/index' ; ?>"><li class="sub-head">Technology</li></a>
                              <?php $i=1; ?>
                              <?php foreach ($blog_menu_item as $print): ?>
                              <li><a href="<?php echo base_url() . 'blogs/detail/' . $print['url']; ?>"><?php echo $print['full_name']; ?></a></li>
                              <?php if($i==6) break; $i++;?>
                              <?php endforeach; ?>
                           </ul>
                        </li>
                        <li class="col-md-3">
                           <ul>
                              <a href="<?php echo base_url() . 'products/index' ; ?>"><li class="sub-head">Industry</li></a>
                              <?php $i=1; ?>
                              <?php foreach ($products_industry as $print): ?>
                              <li><a href="<?php echo base_url() . 'products/query/' . $print['tagsname']; ?>"><?php echo $print['tagstitle']; ?></a></li>
                              <?php if($i==6) break; $i++;?>
                              <?php endforeach; ?>
                           </ul>
                        </li>
                        <li class="col-md-3">
                           <ul>
                              <div class="col-lg-12 no-padding clearfix media" Style="padding-left: 10px;">
                                 <img class="pull-left" src="<?php echo base_url() . 'assets/uploads/files/' . $metainfo['8']['imagelink']; ?>" alt=""/>
                                 <p><?php echo $metainfo['8']['content']; ?></p>
                              </div>
                           </ul>
                        </li>
                     </ul>
                  </li>
                  <li class='<?php echo (isset($activepage) ? ($activepage=='Services' ? 'active' : '') : '');?> has-sub'>
                     <a href='<?php echo base_url() . "services"; ?>'><span>Services</span></a>
                     <ul>
                        <li>
                           <a class="nav-sub" href='<?php echo base_url() . "services/page/1"; ?>'><span>Solution</span></a>
                        </li>
                        <li>
                           <a href='<?php echo base_url() . "services/page/2"; ?>'><span>Installation</span></a>
                        </li>
                        <li><a href='<?php echo base_url() . "services/page/3"; ?>'><span>Maintenance</span></a></li>
                     </ul>
                  </li>
                  <li class="<?php echo (isset($activepage) ? ($activepage=='New Features' ? 'active' : '') : '');?> has-sub">
                       <a href='#'><span>New Features</span></a>
                       <ul>
                         <li><a href="<?php echo base_url(); ?>edutech/index">EduTech</a></li>
                         <li><a href="<?php echo base_url(); ?>games">Gameshop</a></li>
                       </ul>
                  </li>
                  
                  <li class="<?php echo (isset($activepage) ? ($activepage=='Contact Us' ? 'active' : '') : '');?>">
                     <a href='<?php echo base_url() . "contactus"; ?>'><span>Contact</span></a>
                  </li>
               </ul>
            </nav>
         </div>
         <div class="col-md-2">
            <nav id='topnav'>
               <ul class="">
                  <li>
                     <button onclick="location.href ='./games';" type="button" class="btn btn-info">GameShop</button>
                  </li>
               </ul>
            </nav>
         </div>

	<!-- Search -->
	<div class="head-search">
		<form id="header-search">
			<input type="search" name="s" id="s" placeholder="Search">
		</form>
	</div>

      </div>
   </div>
</header>
<!-- Header -->


<?php echo $output;?>


<!-- Social wrap -->
<div class="social">
   <div class="container">
      <div class="row">
         <div class="col-md-4">
            <p>Stay connected with our social network</p>
         </div>

         <div class="col-md-8">
            <ul class="social-info">
               <?php foreach ($socialshare as $print): ?>
                  <li><a href="<?php echo $print->href; ?>" target="_blank"><span><i class="<?php echo $print->class_ref; ?>"></i></span><?php echo $print->title; ?></a></li>
               <?php endforeach; ?>        
            </ul>
         </div>
      </div>
   </div>
</div>
<!-- Social wrap -->
<!-- Footer -->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-12 no-padding">

				<!-- Footer - About -->
				<div class="col-md-3 footer-widget">
					<h6><span><?php echo $footerinfo['0']['name']; ?></span></h6>
					<P><?php echo $footerinfo['0']['content1']; ?></P>
					<div class="newsletter">
						<form>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Email goes here..."/>
								<span class="input-group-btn">
									<button class="btn btn-default" type="button">Subscribe</button>
								</span>
							</div>
						</form>
					</div>
				</div>

				<!-- Footer - Recent Tweets -->
				<div class="col-md-3 footer-widget">
					<h6><span>Latest News</span></h6> <div id="tweets" class="tweet"></div>
				</div>

            <!-- Footer - Tags -->
            <div class="col-md-3 footer-widget">
               <h6><span>Top Links</span></h6>

               <ul class="footervmenu" Style="color: #a0a0a0 !important; list-style-type: none; padding-left: 10px;">     
                  <?php echo $footerinfo['1']['content1']; ?>
               </ul>
      
            </div>

				<!-- Footer - Flickrfeed -->
				<div class="col-md-3 footer-widget">
					<h6 Style="margin-bottom: 3px !important;"><span>Contacts</span></h6>
					<ul id="contact" class="thumbs">
                  <div class="contact-info">
                   <div class="space25"></div>
                   <p><b>Address:</b> <?php echo $contacts['0']['description']; ?></p>
                   <div class="space20"></div>
                   <p><b>Mobile:</b> <?php echo $contacts['1']['description']; ?></p>
                   <p><b>Email:</b> <?php echo $contacts['2']['description']; ?></p>
                  </div>
               </ul>
				</div>
			</div>
		</div>		
	</div>
</footer>
<!-- Footer -->

<!-- Footer - Copyright -->
<div class="footer-bottom">
	<a class="back-top" href="#"><i class="fa fa-chevron-up"></i></a>
	<div class="container">
		<div class="row-fluid">
			<div class="col-md-6">
				<p><?php echo $footerinfo['2']['content2'] . ' ';?><a href="<?php echo $footerinfo['2']['link']; ?>" target="blank"><?php echo $footerinfo['2']['content1']; ?></a></p>
			</div>
			<div class="col-md-6">
				<!--ul class="top-contact">
					<li><i class="fa fa-phone"></i> <?php echo $footerinfo['3']['content1']; ?></li>
					<li><i class="fa fa-envelope"></i> <?php echo $footerinfo['4']['content1']; ?></li>
				</ul-->
			</div>
		</div>
	</div>
</div>
<!-- Footer - Copyright -->
</div>

<!-- JavaScript -->
<script src="<?php echo base_url(); ?>assets/tfl1/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/tfl1/js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script src="<?php echo base_url(); ?>assets/tfl1/js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?php echo base_url(); ?>assets/tfl1/js/rs-plugin/rs.home.js"></script>
<script src="<?php echo base_url(); ?>assets/tfl1/js/superTabs.js"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script src="<?php echo base_url(); ?>assets/tfl1/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/tfl1/js/flexslider/jquery.flexslider.js"></script>
<script src="<?php echo base_url(); ?>assets/tfl1/js/owl-carousel/owl.carousel.js"></script>
<script src="<?php echo base_url(); ?>assets/tfl1/js/jquery.akordeon.js"></script>
<script src="<?php echo base_url(); ?>assets/tfl1/js/jflickrfeed.min.js"></script>
<script src="<?php echo base_url(); ?>assets/tfl1/js/tab.js"></script>
<script src="<?php echo base_url(); ?>assets/tfl1/js/jquery.isotope.min.js"></script>
<script src="<?php echo base_url(); ?>assets/tfl1/js/jquery.mobilemenu.js"></script>
<script src="<?php echo base_url(); ?>assets/tfl1/js/magnific-popup/jquery.magnific-popup.js"></script> 
<script src="<?php echo base_url(); ?>assets/tfl1/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/tfl1/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/tfl1/tfeed/jquery.tweet.js"></script>

</body>
</html>