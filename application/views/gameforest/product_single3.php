<!-- wrapper -->
	<div id="wrapper">	
		<section class="bg-primary">
			<div class="container">
				<h3 class="color-white font-weight-300">View Product</h3>
			</div>
		</section>
		<section class="bg-grey-50 border-bottom-1 border-grey-300 padding-10">
			<div class="container">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url()?>games/all">Game Shop</a></li>
					<li><a href="<?php echo base_url() . 'games/category/' . $product['curl']; ?>"><?= @$product['cname'] ?></a></li>
					<li><a href="#"><?= @$product['name'] ?></a></li>
				</ol>	
			</div>
		</section>
		
		<section class="padding-top-50 padding-bottom-50 padding-top-sm-30">
			<div class="container">
				<div class="row sidebar">
					<div class="col-md-9 leftside">
						<div class="post post-single">
							<div class="post-header post-author">
								
								<div class="post-title">
									<h2><a href="#"><?= @$product['name'] ?></a></h2>
									<ul class="post-meta">
										<li><a href="#"><i class="fa fa-align-left"></i> <?= @$product['cname'] ?></a></li>
										<li><i class="fa fa-calendar-o"></i> April 13, 2016</li>
									</ul>
								</div>
							</div>
							
							<div id="post-carousel" class="carousel slide post-thumbnail" data-ride="carousel">
								<ol class="carousel-indicators">
									<?php if(!empty($product['imageurl1'])){?><li data-target="#post-carousel" data-slide-to="0" class="active"></li><?php } ?>
									<?php if(!empty($product['imageurl2'])){?><li data-target="#post-carousel" data-slide-to="1"></li><?php } ?>
									<?php if(!empty($product['imageurl3'])){?><li data-target="#post-carousel" data-slide-to="2"></li><?php } ?>
									<?php if(!empty($product['imageurl4'])){?><li data-target="#post-carousel" data-slide-to="3"></li><?php } ?>
								</ol>
								<div class="carousel-inner">
									<?php if(!empty($product['imageurl1'])){?>
									<div class="item active">
										<img src="<?php echo base_url() . 'assets/uploads/files/' . $product['imageurl1'];?>" alt="">
									</div>
									<?php } ?>
									<?php if(!empty($product['imageurl2'])){?>
									<div class="item">
										<img src="<?php echo base_url() . 'assets/uploads/files/' . $product['imageurl2'];?>" alt="">
									</div>
									<?php } ?>
									<?php if(!empty($product['imageurl3'])){?>
									<div class="item">
										<img src="<?php echo base_url() . 'assets/uploads/files/' . $product['imageurl3'];?>" alt="">
									</div>
									<?php } ?>
									<?php if(!empty($product['imageurl4'])){?>
									<div class="item">
										<img src="<?php echo base_url() . 'assets/uploads/files/' . $product['imageurl4'];?>" alt="">
									</div>
									<?php } ?>
								</div>
							</div>
							
							<?php echo $product['description'];?>	
							
						</div>
							
						
					</div>
					
					<div class="col-md-3 rightside">
						
						<div class="widget">
							<div class="panel panel-default">
								<div class="panel-heading">Product Details</div>
								<div class="panel-body">
									<ul class="panel-list ">
										<li><b><p class="progress-label">Price: <span><?php echo $product['price'];?>TK</span></p></b></li>
										<li><b><p class="progress-label">Discount: <span><?php echo $product['discount'];?>%</span></p></b></li>
										<li><b><p class="progress-label">Total: <span><?php if($product['discount']=='0'){$tdisc='0';} else {$tdisc=$product['discount']*$product['price']/'100';}$total = ($product['price'] - $tdisc); echo $total;?>TK</span></p></b></li>
										<li><b>
											
												<form class="form-label" action="<?=site_url('games/addtocart/' . $product['url']);?>" method="get">
													<p class="progress-label"> Quantity:<span><input type="text" class="form-control" style="height: 30px; width: 50px;" name="q" id="thread" placeholder="1"></span>
													<div class="text-center"><button type="submit" class="btn btn-block btn-primary margin-top-40 btn-shadow" style="">Add to Cart</button></div>
												</form>
											</p>
										</b></li>
									</ul>
								</div>
							</div>
						</div>

						<div class="widget widget-list">
							<div class="title">Related Games</div>
							<ul>
								<?php foreach ($related_products as $value): ?>
									<?php if(!($value['name'] == $product['name'])){?>
									<li>
										<a href="<?php echo base_url(); ?>assets/gameforest/#" class="thumb" Style="width:80px;"><img src="<?php echo base_url() . 'assets/uploads/files/' . $value['imageurl1'];?>" alt=""></a>
										<div class="widget-list-meta"  Style="width:60%;">
											<h4 class="widget-list-title"><b><a href="<?php echo base_url() . 'games/view/' . $value['url'];?>"><?php echo substr($value['name'], 0, 58); ?></a></b></h4>
											<p><i class="fa fa-bars"></i> <b>Category:</b> <a href="<?php echo base_url() . 'games/category/' . $value['curl'];?>"><?php echo $value['cname']; ?></a></p>
										</div>
									</li>
									<?php } ?>
								<?php endforeach; ?>
							</ul>
						</div>
						
						

						
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- Javascript -->