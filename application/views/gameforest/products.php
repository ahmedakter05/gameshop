
	<!-- /header -->
	
	<div class="modal-search">
		<div class="container">
			<input type="text" class="form-control" placeholder="Type to search...">
			<i class="fa fa-times close"></i>
		</div>
	</div><!-- /.modal-search -->
	
	<!-- wrapper -->
	<div id="wrapper">
		<section class="hero height-350 hero-game" style="background-image: url(<?php echo base_url(); ?>assets/gameforest/img/cover/cover-game.jpg);">
			<div class="hero-bg"></div>
			<div class="container">
				<div class="page-header">
					<div class="page-title">Uncharted 4: A Thief’s End</div>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url(); ?>assets/gameforest/index-2.html" class="no-padding-left">Home</a></li>
						<li><a href="<?php echo base_url(); ?>assets/gameforest/#">Games</a></li>
						<li class="active">Games Post</li>
					</ol>	
					
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
						<li class="active"><a href="<?php echo base_url(); ?>assets/gameforest/#"><i class="fa fa-reply-all"></i> Back</a></li>
						<?php foreach ($gameshop_sub_menu as $value):?>
							<li><a href="<?php echo base_url() . 'games/category/' . $value['curl'];?>"><?php if(!empty($value['fontawesome'])){?><i class="<?php echo $value['fontawesome']; ?>"></i><?php } ?> <?php echo $value['cname']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</section>
		<?php } ?>
		<section class="bg-grey-50">
			<div class="container">
				<div class="row">
					<?php foreach ($products as $value): ?>
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<div class="card card-hover">
								<div class="card-img">
									<img src="<?php echo base_url() . 'assets/uploads/files/' . $value['imageurl1']; ?>" alt="<?php echo $value['name']; ?>">
									<div class="category"><span class="label <?php echo $random[array_rand($random)];?>">Price: <?php echo $value['price']; ?>TK</span></div>
									<div class="meta"><a href="<?php echo base_url() . 'games/addtocart/' . $value['url']; ?>"><i class="fa fa-shopping-bag" Style="color:black;"></i> <span Style="color:black; font-weight: bold;">Buy Now</span></a></div>
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
				</ul-->
			</div>
		</section>
	</div>
	<!-- /#wrapper -->
	
