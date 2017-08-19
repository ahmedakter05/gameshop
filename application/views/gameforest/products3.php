
	<!-- /header -->
	
	<div class="modal-search">
		<div class="container">
			<input type="text" class="form-control" placeholder="Type to search...">
			<i class="fa fa-times close"></i>
		</div>
	</div><!-- /.modal-search -->
	
	<!-- wrapper -->
	<div id="wrapper">
		<section class="bg-primary">
			<div class="container">
				<h3 class="color-white font-weight-300">View Products</h3>
			</div>
		</section>
		<section class="border-bottom-1 border-grey-300 padding-top-10 padding-bottom-10">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo base_url()?>games/all">Game Shop</a></li>
							<li><a href="#">Category</a></li>

						</ol>	
					</div>
				</div>
			</div>
		</section>

		<!--section class="padding-top-25 no-padding-bottom border-bottom-1 border-grey-300">
			<div class="container">
				<div class="headline">
					<h4>View Games & Accessories</h4>
					
				</div>
			</div>
		</section-->
		<?php if(!empty($gameshop_sub_menu)){ ?>
		<section class="bg-white no-padding hidden-xs border-bottom-1 border-grey-300" style="height: 54px">
			<div class="tab-select sticky text-center">
				<div class="container">
					<ul class="nav nav-tabs">
						<!--li class="active"><a href="<?php echo base_url(); ?>games/goback"><i class="fa fa-reply-all"></i> Back</a></li-->
						<?php foreach ($gameshop_sub_menu as $value):?>
							<li><a href="<?php echo base_url() . 'games/category/' . $value['curl'];?>"><?php if(!empty($value['fontawesome'])){?><i class="<?php echo $value['fontawesome']; ?>"></i><?php } ?> <?php echo $value['cname']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</section>
		<?php } ?>
		<!--section class="bg-grey-50">
			<div class="container">
				<div class="row">
					<?php foreach ($products as $value): ?>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="card card-hover">
								<div class="card-img">
									<img src="<?php echo base_url() . 'assets/uploads/files/' . $value['imageurl1']; ?>" alt="<?php echo $value['name']; ?>">
									<div class="category"><span class="label <?php echo $random[array_rand($random)];?>">Price: <?php echo $value['price']; ?>TK</span></div>
									<div class="meta"><a href="<?php echo base_url() . 'games/addtocart/' . $value['url']; ?>"><i class="fa fa-shopping-bag" Style="color:black;"></i> <span Style="color:black; font-weight: bold;">Buy Now</span></a></div>
								</div>
								<div class="caption">
									<h3 class="card-title" Style="padding-bottom: 10px;"><a href="<?php echo base_url() . 'games/view/' . $value['url']; ?>"><?php echo substr($value['name'], 0, 15); ?> ...</a></h3>
									
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				
				<!--ul class="pagination margin-top-20">
					<li class="disabled"><a href="#">Previous</a></li>
					<li class="disabled"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">6</a></li>
					<li><a href="#">7</a></li>
					<li><a href="#">8</a></li>
					<li><a href="#">...</a></li>
					<li><a href="#">124</a></li>
					<li><a href="#">125</a></li>
					<li><a href="#">Next</a></li>
				</ul->
			</div>
		</section-->

		<section class="bg-grey-50">
			<div class="container">
				<div class="card-group">
					<div class="row">
						<?php foreach ($products as $value): ?>
						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
							<div class="card card-hover">
								<div class="card-img">
									<a href="<?php echo base_url() . 'games/view/' . $value['url']; ?>"><img style="height: 175px !important;" src="<?php echo base_url() . 'assets/uploads/files/' . $value['imageurl1']; ?>" alt="<?php echo $value['name']; ?>" alt="<?php echo $value['name']; ?>"></a>
									<!--div class="time" style="font-size: 13px; font-weight: bold; background: white;"><a href="<?php echo base_url() . 'games/addtocart/' . $value['url']; ?>" style="color: black !important;">Disc: <?php echo $value['discount']; ?>%</a></div-->
								</div>
								<div class="caption" style="padding: 20px 25px;">
									<h5 class="card-title" style="font-size: 12px;"><a href="<?php echo base_url() . 'games/view/' . $value['url']; ?>"><?php echo substr($value['name'], 0, 24); ?></a><div class="pull-right" style="color: #ffffff; background-color: #1A1B1D; padding: 3px 3px 1px 3px ; margin-bottom: 1px;">Disc: <?php echo $value['discount']; ?>%</div></h5>
									<ul>
										<li><i class="fa fa-shopping-cart"></i> <a href="<?php echo base_url() . 'games/addtocart/' . $value['url']; ?>">Add to Cart</a></li>
										<li>&nbsp;|</li>
										<div class="pull-right"><li><a href="<?php echo base_url() . 'games/view/' . $value['url']; ?>">BDT <?php echo number_format($value['price'], 2); ?></a></li></div>
									</ul>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				
				<!--ul class="pagination margin-top-20">
	                <li><a href="#"><span>&laquo;</span></a></li>
	                <li><a href="#">1</a></li>
	                <li class="active"><a href="#">2</a></li>
	                <li><a href="#">3</a></li>
	                <li><a href="#">4</a></li>
	                <li><a href="#">5</a></li>
	                <li><a href="#">...</a></li>
	                <li><a href="#">10</a></li>
	                <li><a href="#">11</a></li>
	                <li><a href="#"><span>&raquo;</span></a></li>
	            </ul-->     
			</div>
		</section>
	</div>
		<!-- /#wrapper -->
		
