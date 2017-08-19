<script>
function myFunction(theUrl) {
	document.getElementById("demo").style.color = "red";
}
</script>
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
								<a href="<?php echo $value['button_href'];?>" data-toggle="modal" class="btn btn-primary btn-lg btn-rounded" data-animation="animated animate10 fadeIn"><?php echo $value['button_text'];?></a>
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

		<section class="bg-grey-50 border-bottom-1 border-grey-200 relative">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="title outline">
							<h4><i class="fa fa-heart"></i> Latest Games</h4>
							<p>Get your Favourite games for PC, PS4, XBOX, etc. 100% Original License games with ID</p>
						</div>
					</div>
				</div>

				<div class="row">
					<?php foreach ($home_latest_games as $value): ?>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="card card-hover">
							<div class="card-img">
								<img src="<?php echo base_url() . 'assets/uploads/files/' . $value['imageurl1']; ?>" alt="<?php echo $value['name']; ?>">
								<div class="category"><span class="label <?php echo $random[array_rand($random)];?>">Price: <?php echo $value['price']; ?>TK</span></div>
								<div class="meta" id="demo">Check<a <?php //href="<?php echo base_url() . 'games/buy/' . $value['url']; ? >" ?>onclick="myFunction('<?php echo base_url() . 'games/checkajax';?>')"><i class="fa fa-shopping-bag" Style="color:black;"></i> <span Style="color:black; font-weight: bold;">Buy Now</span></a></div>
							</div>
							<div class="caption">
								<h3 class="card-title" Style="padding-bottom: 10px;"><a href="<?php echo base_url() . 'games/view/' . $value['url']; ?>"><?php echo substr($value['name'], 0, 25); ?> ...</a></h3>
								<?php $content = $value['details'];
		                            $contentarr=explode(' ', $content); 
		                            $i = '1';
		                            foreach ($contentarr as $content) {
		                                if ($i <= '18'){
		                                    echo " " . $content;
		                                    $i++;
		                                }
		                            } echo '  ...';
	                            ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
				</div>
				
				<div class="text-center"><a href="<?php echo base_url(); ?>games/all" class="btn btn-primary btn-lg btn-shadow btn-rounded btn-icon-right margin-top-10 margin-bottom-20">Show More <i class="fa fa-angle-right"></i></a></div>
			</div>
		</section>
				
		<section>	
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="title outline">
							<h4><i class="fa fa-star"></i> Consoles & Accessories</h4>
							<p>Best Consoles and Accesories Places</p>
						</div>
					</div>
				</div>
				<div class="row slider">
					<div class="owl-carousel">
						<?php foreach ($home_latest_accessories as $value): ?>
							<div class="card card-list">
								<div class="card-img">
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
		</section>
			
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
				<a href="<?php echo base_url(); ?>games/all" target="_blank" class="btn btn-white btn-outline">Purchase Now<i class="fa fa-shopping-cart margin-left-10"></i></a>
			</div>
		</section>
	</div>
	<!-- /#wrapper -->