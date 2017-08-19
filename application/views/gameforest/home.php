
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/flexslider/css/flexslider.css" type="text/css" media="screen" />
<script src="<?php echo base_url(); ?>assets/flexslider/js/modernizr.js"></script>
<!-- wrapper --> 
	<div id="wrapper">	
		<div id="full-carousel" class="ken-burns carousel slide full-carousel carousel-fade" data-ride="carousel">
			<ol class="carousel-indicators">
				<?php $c = '0'; ?> 
				<?php foreach ($slider as $value): ?>
				<li data-target="#full-carousel" data-slide-to="<?php echo $c++; ?>" class="active"></li>
				<?php endforeach; ?>
			</ol>
			<div class="carousel-inner">
				<?php $c = '0'; ?> 
				<?php foreach ($slider as $value): ?>
				<div class="item<?php if ($c == '0'){ echo ' active inactiveUntilOnLoad'; $c++;}?>">
					<img src="<?php echo base_url() . 'assets/uploads/files/' . $value['imagebg']; ?>" alt="<?php echo $value['name'];?>">
					<div class="container">
						<div class="carousel-caption">
							<h1 data-animation="animated animate1 bounceInDown"><?php echo $value['title'];?></h1>
							<p data-animation="animated animate7 fadeInUp"><?php echo $value['details'];?></p>
							<?php if(!empty($value['button_href']) && !empty($value['button_text'])){ ?>
								<a href="<?php echo $value['button_href'];?>" data-toggle="modal" class="btn btn-primary btn-shadow btn-sm" style="padding: 8px 15px !important;" data-animation="animated animate10 fadeIn"><?php echo $value['button_text'];?></a>
							<?php }?>
						</div>		
					</div>
				</div>
				<?php endforeach; ?>			
				<a class="left carousel-control" href="<?php echo base_url(); ?>assets/gameforest/#full-carousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				</a>
				<a class="right carousel-control" href="<?php echo base_url(); ?>assets/gameforest/#full-carousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				</a>
			</div>
		</div>
		
		<!--section class="bg-white no-padding hidden-xs border-bottom-1 border-grey-300" style="height: 54px">
			<div class="tab-select text-center sticky">
				<div class="container">
					<ul class="nav nav-tabs">
						<?php foreach ($gameshop_tags_menu as $value): ?>
						<li><a href="<?php echo base_url() . 'games/query/' . $value['tagsname']; ?>"><?php echo $value['tagstitle'];?></a></li>
						<?php endforeach; ?>	
						<!--li class="active"><a href="#"><i class="fa fa-star"></i> Puzzle</a></li>
						<li><a href="#"><i class="fa fa-pencil"></i> Strategic</a></li>
						<li><a href="#"><i class="fa fa-image"></i> XBOX</a></li>
						<li><a href="#"><i class="fa fa-video-camera"></i> PS4</a></li>
						<li><a href="#"><i class="fa fa-quote-left"></i> PC</a></li->
					</ul>
				</div>
			</div>
		</section-->
		<!------------------------------- Games ------------------------------>
		<section class="bg-grey-50" style="padding-bottom: 0px !important;">
			<div class="container">
				<div class="card-group">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="title outline">
								<h4><i class="fa fa-gamepad"></i> Latest Games</h4>
								<p>Get your Favourite games with special offer & 100% Original License.</p>
							</div>
						</div>
					</div>
					<div class="row">
						<?php foreach ($home_latest_games as $value): ?>
						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
							<div class="card card-hover">
								<div class="card-img">
									<a href="videos-single.html"><img src="<?php echo base_url() . 'assets/uploads/files/' . $value['imageurl1']; ?>" alt="<?php echo $value['name']; ?>" alt="<?php echo $value['name']; ?>"></a>
									<!--div class="time" style="font-size: 13px; font-weight: bold; background: white;"><a href="<?php echo base_url() . 'games/addtocart/' . $value['url']; ?>" style="color: black !important;">Disc: <?php echo $value['discount']; ?>%</a></div-->
								</div>
								<div class="caption" style="padding: 20px 25px;">
									<h5 class="card-title" style="font-size: 12px;"><a href="<?php echo base_url() . 'games/view/' . $value['url']; ?>"><?php echo substr($value['name'], 0, 24); ?></a><div class="pull-right">Disc: <?php echo $value['discount']; ?>%</div></h5>
									<ul>
										<li><i class="fa fa-shopping-cart"></i> <a href="<?php echo base_url() . 'games/addtocart/' . $value['url']; ?>">Add to Cart</a></li>
										<li>&nbsp;|</li>
										<div class="pull-right"><li><i class="fa fa-money"></i> <a href="">BDT <?php echo number_format($value['price'], 2); ?></a></li></div>
									</ul>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="text-center"><a href="<?php echo base_url(); ?>games/category/games" class="btn btn-primary btn-shadow btn-icon-right margin-top-10 margin-bottom-20">More Games <i class="fa fa-angle-right"></i></a></div>
			</div>
		</section>

		<!------------------------------- Accessories ------------------------------>
		<section class="bg-grey-50" style="padding-bottom: 0px !important;">
			<div class="container">
				<div class="card-group">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="title outline">
								<h4><i class="fa fa-usb"></i> Quality Accessories</h4>
								<p>Decorate your gaming world with top accessories from us.</p>
							</div>
						</div>
					</div>
					<div class="row">
						<?php foreach ($home_latest_accessories as $value): ?>
						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
							<div class="card card-hover">
								<div class="card-img">
									<a href="videos-single.html"><img src="<?php echo base_url() . 'assets/uploads/files/' . $value['imageurl1']; ?>" alt="<?php echo $value['name']; ?>" alt="<?php echo $value['name']; ?>"></a>
									<!--div class="time" style="font-size: 13px; font-weight: bold; background: white;"><a href="<?php echo base_url() . 'games/addtocart/' . $value['url']; ?>" style="color: black !important;">Disc: <?php echo $value['discount']; ?>%</a></div-->
								</div>
								<div class="caption" style="padding: 20px 25px;">
									<h5 class="card-title" style="font-size: 12px;"><a href="<?php echo base_url() . 'games/view/' . $value['url']; ?>"><?php echo substr($value['name'], 0, 24); ?></a><div class="pull-right">Disc: <?php echo $value['discount']; ?>%</div></h5>
									<ul>
										<li><i class="fa fa-shopping-cart"></i> <a href="<?php echo base_url() . 'games/addtocart/' . $value['url']; ?>">Add to Cart</a></li>
										<li>&nbsp;|</li>
										<div class="pull-right"><li><i class="fa fa-money"></i> <a href="">BDT <?php echo number_format($value['price'], 2); ?></a></li></div>
									</ul>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="text-center"><a href="<?php echo base_url(); ?>games/category/accessories" class="btn btn-primary btn-shadow btn-icon-right margin-top-10 margin-bottom-20">More Accessories <i class="fa fa-angle-right"></i></a></div>
			</div>
		</section>

		<!------------------------------- Toys ------------------------------>
		<section class="bg-grey-50" style="padding-bottom: 0px !important;">
			<div class="container">
				<div class="card-group">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="title outline">
								<h4><i class="fa fa-slideshare"></i> Smart Toys</h4>
								<p>Get your Favourite games for PC, PS4, XBOX, etc. 100% Original License games.</p>
							</div>
						</div>
					</div>
					<div class="row">
						<?php foreach ($home_latest_toys as $value): ?>
						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
							<div class="card card-hover">
								<div class="card-img">
									<a href="videos-single.html"><img src="<?php echo base_url() . 'assets/uploads/files/' . $value['imageurl1']; ?>" alt="<?php echo $value['name']; ?>" alt="<?php echo $value['name']; ?>"></a>
									<!--div class="time" style="font-size: 13px; font-weight: bold; background: white;"><a href="<?php echo base_url() . 'games/addtocart/' . $value['url']; ?>" style="color: black !important;">Disc: <?php echo $value['discount']; ?>%</a></div-->
								</div>
								<div class="caption" style="padding: 20px 25px;">
									<h5 class="card-title" style="font-size: 12px;"><a href="<?php echo base_url() . 'games/view/' . $value['url']; ?>"><?php echo substr($value['name'], 0, 24); ?></a><div class="pull-right">Disc: <?php echo $value['discount']; ?>%</div></h5>
									<ul>
										<li><i class="fa fa-shopping-cart"></i> <a href="<?php echo base_url() . 'games/addtocart/' . $value['url']; ?>">Add to Cart</a></li>
										<li>&nbsp;|</li>
										<div class="pull-right"><li><i class="fa fa-money"></i> <a href="">BDT <?php echo number_format($value['price'], 2); ?></a></li></div>
									</ul>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="text-center"><a href="<?php echo base_url(); ?>games/category/toys" class="btn btn-primary btn-shadow btn-icon-right margin-top-10 margin-bottom-20">More Toys <i class="fa fa-angle-right"></i></a></div>
				<br>
			</div>
		</section>

		<!------------------------------- Accessories ------------------------------>
		<!--section>	
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="title outline">
							<h4><i class="fa fa-star"></i> Consoles & Accessories</h4>
							<p>Original Consoles and Accesories with warranty</p>
						</div>
					</div>
				</div>
				<div class="row slider">
					<div class="owl-carousel">
						<?php foreach ($home_latest_accessories as $value): ?>
							<div class="card card-list">
								<div class="card-img" style="padding: 5px;">
									<img src="<?php echo base_url() . 'assets/uploads/files/' . $value['imageurl1']; ?>" alt="<?php echo $value['name']; ?>">
									<span class="label label-success"><?php echo $value['discount']; ?>%</span>
								</div>
								<div class="caption">
									<h4 class="card-title"><a href="<?php echo base_url() . 'games/view/' . $value['url']; ?>"><?php echo substr($value['name'], 0, 25); ?></a></h4>
								</div>
							</div> 
						<?php endforeach; ?>
					</div>
					<a href="<?php echo base_url(); ?>assets/gameforest/#" class="prev"><i class="fa fa-angle-left"></i></a>
					<a href="<?php echo base_url(); ?>assets/gameforest/#" class="next"><i class="fa fa-angle-right"></i></a>
				</div>
			</div>
		</section-->
			
		<!--div class="background-image margin-top-40" style="background-image: url(<?php echo base_url(); ?>assets/gameforest/img/youtube/maxresdefault.jpg);">
			<span class="background-overlay"></span>
			<div class="container">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/IsDX_LiJT7E?rel=0&amp;showinfo=0" allowfullscreen></iframe>
				</div>
			</div>
		</div-->
			
		<section class="bg-primary promo">
			<div class="container">
				<h2>Draw your gaming world with us</h2>
				<a href="<?php echo base_url(); ?>games/all" target="_self" class="btn btn-white btn-outline">Purchase Now<i class="fa fa-shopping-cart margin-left-10"></i></a>
			</div>
		</section>
	</div>
	<!-- /#wrapper -->