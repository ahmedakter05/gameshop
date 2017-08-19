<?php 
	//var_dump($gameshop_menu_cart);
	$quantity = '0';
	foreach ($gameshop_menu_cart as $value) {
		//$quantity = $quantity + $value['quantity'] ;
		$quantity = $quantity + '1' ;
	}
 ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from gameforest.yakuzi.eu/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Mar 2017 03:59:05 GMT -->
<head>
	<!-- META -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="description" content="Purchase original games for PC, XBOX, PS4 & other consoles from us. Your one stop destination for all kind of original games, consoles & accessories.">
	<meta name="author" content="gamersbd Ltd.">
	<meta name="robots" content="index,follow">
	
	<title>GamersBD</title>
	
	<!-- FAVICON -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/gameforest/img/favicon.ico">
	
	<!-- CORE CSS -->
	<link href="<?php echo base_url(); ?>assets/gameforest/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/gameforest/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'> 
    
	<!-- PLUGINS -->
	<link href="<?php echo base_url(); ?>assets/gameforest/plugins/animate/animate.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/gameforest/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

	<!-- THEME CSS -->
	<link href="<?php echo base_url(); ?>assets/gameforest/css/theme.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/gameforest/css/custom.css" rel="stylesheet">
</head>

<body class="fixed-header">
	<header>
		<div class="container">
			<span class="bar hide"></span>
			<a href="<?php echo base_url(); ?>games/" class="logo"><img src="<?php echo base_url(); ?>assets/gameforest/img/logo.png" alt=""></a>
			<nav>
				<div class="nav-control">
					<ul>
						<li>
							<a href="<?php echo base_url(); ?>" class="dropdown-toggle">Home</a>
						</li>
						
						<li class="dropdown">
							<a href="<?php echo base_url(); ?>games/all" class="dropdown-toggle">Games</a>
							<ul class="dropdown-menu default">
								<?php foreach ($gameshop_products_menu_games as $value):?>
								<li class="dropdown-submenu">
									<a href="<?php echo base_url() . 'games/category/' . $value['curl'];?>"><?php echo $value['cname']?></a>
									<?php if (!empty($value['sub_categories'])){?>
										<ul class="dropdown-menu">
											<?php foreach ($value['sub_categories'] as $value2):?>
											<li><a href="<?php echo base_url() . 'games/category/' . $value2['curl'];?>"><?php echo $value2['cname']?></a></li>
											<?php endforeach; ?>		
										</ul>
										<?php } ?>
								</li>
								<?php endforeach; ?>								
							</ul>
						</li>
						<li class="dropdown">
							<a href="<?php echo base_url(); ?>games/category/cards" class="dropdown-toggle">Cards</a>
							<ul class="dropdown-menu default">
								<?php foreach ($gameshop_products_menu_cards as $value):?>
								<li class="dropdown-submenu">
									<a href="<?php echo base_url() . 'games/category/' . $value['curl'];?>"><?php echo $value['cname']?></a>
									<?php if (!empty($value['sub_categories'])){?>
										<ul class="dropdown-menu">
											<?php foreach ($value['sub_categories'] as $value2):?>
											<li><a href="<?php echo base_url() . 'games/category/' . $value2['curl'];?>"><?php echo $value2['cname']?></a></li>
											<?php endforeach; ?>		
										</ul>
										<?php } ?>
								</li>
								<?php endforeach; ?>								
							</ul>
						</li>
						<li class="dropdown">
							<a href="<?php echo base_url(); ?>games/category/accessories" class="dropdown-toggle">Accessories</a>
							<ul class="dropdown-menu default">
								<?php foreach ($gameshop_products_menu_accessories as $value):?>
								<li class="dropdown-submenu">
									<a href="<?php echo base_url() . 'games/category/' . $value['curl'];?>"><?php echo $value['cname']?></a>
									<?php if (!empty($value['sub_categories'])){?>
										<ul class="dropdown-menu">
											<?php foreach ($value['sub_categories'] as $value2):?>
											<li><a href="<?php echo base_url() . 'games/category/' . $value2['curl'];?>"><?php echo $value2['cname']?></a></li>
											<?php endforeach; ?>		
										</ul>
										<?php } ?>
								</li>
								<?php endforeach; ?>								
							</ul>
						</li>

						<li class="dropdown">
							<a href="<?php echo base_url(); ?>games/category/toys" class="dropdown-toggle">Toys</a>
							<ul class="dropdown-menu default">
								<?php foreach ($gameshop_products_menu_toys as $value):?>
								<li class="dropdown-submenu">
									<a href="<?php echo base_url() . 'games/category/' . $value['curl'];?>"><?php echo $value['cname']?></a>
									<?php if (!empty($value['sub_categories'])){?>
										<ul class="dropdown-menu">
											<?php foreach ($value['sub_categories'] as $value2):?>
											<li><a href="<?php echo base_url() . 'games/category/' . $value2['curl'];?>"><?php echo $value2['cname']?></a></li>
											<?php endforeach; ?>		
										</ul>
										<?php } ?>
								</li>
								<?php endforeach; ?>								
							</ul>
						</li>

						<li class="dropdown mega-dropdown">
							<a href="<?php echo base_url(); ?>games">| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Featured Item</a>
							<!--ul class="dropdown-menu mega-dropdown-menu category">
								<?php foreach ($gameshop_menu_latest_games as $value): ?>
								<li class="col-md-3">
									<a href="<?php echo base_url() . 'games/view/' . $value['url']; ?>">
										<img src="<?php echo base_url() . 'assets/uploads/files/' . $value['imageurl1']; ?>" alt="<?php echo $value['name']; ?>">
										<div class="caption">
											<span class="label <?php echo $random[array_rand($random)];?>"><?php echo $value['categories']['cname']; ?></span>
											<h3><?php echo substr($value['name'], 0, 25); ?></h3>
											
										</div>
									</a>
								</li>
								<?php endforeach; ?>
							</ul-->
							<ul class="dropdown-menu mega-dropdown-menu category">
								<?php foreach ($gameshop_menu_featured_items as $value): ?>
								<li class="col-md-3">
									<a href="<?php echo $value['link']; ?>">
										<img src="<?php echo base_url() . 'assets/uploads/gameshop/' . $value['image']; ?>" alt="<?php echo $value['name']; ?>">
										<div class="caption" style="text-align: center !important;">
											
											<h3><?php echo substr($value['name'], 0, 25); ?></h3>
											
										</div>
									</a>
								</li>
								<?php endforeach; ?>
							</ul>
						</li>

						<li>
							<a href="<?php echo base_url(); ?>games/free_offers" class="dropdown-toggle">Free Games</a>
						</li>
						
						<!--li><a href="<?php echo base_url(); ?>assets/gameforest/gallery.html">Gallery</a></li>
						<li><a href="<?php echo base_url(); ?>assets/gameforest/contact.html">Cart (0)</a></li-->
					</ul>
				</div>
			</nav>
			<div class="nav-right">
				<?php if(!empty($userdata['uid'])){?>
				<div class="nav-profile dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><?php echo $userdata['first_name'] . ' ' . $userdata['last_name'];?></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url(); ?>games/edit_profile"><i class="fa fa-user"></i> Change Profile</a></li>
						<li><a href="<?php echo base_url(); ?>games/manage_orders"><i class="fa fa-gamepad"></i> Order History</a></li>
						<!--li><a href="<?php echo base_url(); ?>games/buylist"><i class="fa fa-gear"></i> Settings</a></li-->
						<li class="divider"></li>
						<li><a href="<?php echo base_url(); ?>admin/cp/signout"><i class="fa fa-power-off"></i> Sign Out</a></li>
					</ul>
				</div>
				<?php } else { ?>
				<div class="nav-profile">
					<a href="<?php echo base_url(); ?>games/login"> Signin </a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url(); ?>games/edit_profile"><i class="fa fa-user"></i> Register</a></li>
					</ul>
				</div>
				<?php } ?>
				<div class="nav-dropdown dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i> Cart &nbsp;&nbsp;<span class="label label-danger"><?php echo $quantity; ?></span></a>
					<ul class="dropdown-menu">
						<li class="dropdown-header"><i class="fa fa-bell"></i> You added <?php echo $quantity; ?> things in cart</li>
						<?php $c = '1';?>
						<?php foreach ($gameshop_menu_cart as $value): ?>
						<li><a href="<?php echo base_url() . 'games/view/' . $value['url']; ?>"><?php echo $c . '.  ' . substr($value['name'], 0, 20); ?> <span class="label label-success"><?php echo ($value['price'] * $value['quantity']) . 'Tk'; ?></span></a></li>
						<?php $c++; if($c >= '6'){break;} // add +1 for desire value?> 
						<?php endforeach; ?>
						<li class="dropdown-footer"><a href="<?php echo base_url(); ?>games/cart">View Cart</a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<!-- /header -->
	


	
	<?php echo $output;?>
	
	
	<!-- footer -->
	<footer>
		
		
		<div class="footer-bottom">
			<div class="container">	
				<ul class="list-inline">
					<li><a href="<?php echo base_url(); ?>assets/gameforest/#" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="Follow us on Twitter"><i class="fa fa-twitter"></i></a></li>
					<li><a href="<?php echo base_url(); ?>assets/gameforest/#" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="Follow us on Facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a href="<?php echo base_url(); ?>assets/gameforest/#" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="Follow us on Google"><i class="fa fa-google-plus"></i></a></li>
					<li><a href="<?php echo base_url(); ?>assets/gameforest/#" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="Follow us on Steam"><i class="fa fa-steam"></i></a></li>
				</ul>
				Developer - NGEN IT Ltd, &nbsp; &copy; 2017 GamersBD.
			</div>
		</div>
	</footer>	
	<!-- /.footer -->
	
	
	
	<!-- Javascript -->
	<script src="<?php echo base_url(); ?>assets/gameforest/plugins/jquery/jquery-3.1.0.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/gameforest/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/gameforest/js/core.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/gameforest/plugins/owl-carousel/owl.carousel.min.js"></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/jscustom.js'></script>
	<script>
	(function($) {
	"use strict";
		var owl = $(".owl-carousel");
			 
		owl.owlCarousel({
			items : 4, //4 items above 1000px browser width
			itemsDesktop : [1000,3], //3 items between 1000px and 0
			itemsTablet: [600,1], //1 items between 600 and 0
			itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
		});
			 
		$(".next").click(function(){
			owl.trigger('owl.next');
			return false;
		})
		$(".prev").click(function(){
			owl.trigger('owl.prev');
			return false;
		})
	})(jQuery);
	</script>
</body>

<!-- Mirrored from gameforest.yakuzi.eu/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Mar 2017 03:59:05 GMT -->
</html>