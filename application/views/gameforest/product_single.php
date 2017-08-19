	<div class="modal-search">
		<div class="container">
			<input type="text" class="form-control" placeholder="Type to search...">
			<i class="fa fa-times close"></i>
		</div>
	</div><!-- /.modal-search -->
	
	<!-- wrapper -->
	<div id="wrapper">	
		<section class="hero height-350 hero-game" style="background-image: url(<?php echo base_url(); ?>assets/gameforest/img/cover/cover-review.jpg);">
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
				<div class="row sidebar">
					<div class="col-md-8 leftside">
						<div class="post post-single">
							<div class="post-header">
								<div class="post-title">
									<h2><a href="<?php echo base_url() . 'games/view/' . $product['url']; ?>"><?php echo $product['name'];?></a></h2>
									<ul class="post-meta">
										<li><i class="fa fa-calendar-o"></i> <?php echo $product['updatetime'];?></li>
										
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
					
					
					<div class="col-md-4 rightside">
						<div class="widget widget-game" style="background-image: url(<?php echo base_url() . 'assets/uploads/files/' . $product['imageurl1'];?>)">
							<div class="overlay">
								<div class="title"><?php echo $product['name'];?></div>
																
								<p class="progress-label">Price: <span><?php echo $product['price'];?>TK</span></p>
								<div class="progress progress-animation progress-xs">
									<div class="progress-bar progress-bar-success" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
								</div>
												
								<p class="progress-label">Discount: <span><?php echo $product['discount'];?>%</span></p>
								<div class="progress progress-animation progress-xs">
									<div class="progress-bar progress-bar-danger" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
								</div>
												
								<p class="progress-label">Total: <span><?php if($product['discount']=='0'){$tdisc='0';} else {$tdisc=$product['discount']*$product['price']/'100';}$total = ($product['price'] - $tdisc); echo $total;?>TK</span></p>
								<div class="progress progress-animation progress-xs no-margin-bottom">
									<div class="progress-bar progress-bar-warning" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
								</div>
								
								
								<div class="description">
									<?php echo $product['details']; ?>
									<a href="<?php echo base_url() . 'games/addtocart/' . $product['url']; ?>" class="btn btn-block btn-primary margin-top-40">Buy now <i class="fa fa-heart-o margin-left-10"></i></a>
								</div>
							</div>
						</div>
						
						<div class="widget widget-list">
							<div class="title">Recent Games</div>
							<ul>
								<?php foreach ($related_products as $value): ?>
									<li>
										<a href="<?php echo base_url(); ?>assets/gameforest/#" class="thumb" Style="width:80px;"><img src="<?php echo base_url() . 'assets/uploads/files/' . $value['imageurl1'];?>" alt=""></a>
										<div class="widget-list-meta"  Style="width:60%;">
											<h4 class="widget-list-title"><b><a href="<?php echo base_url() . 'games/view/' . $value['url'];?>"><?php echo substr($value['name'], 0, 58); ?></a></b></h4>
											<p><i class="fa fa-bars"></i> <b>Category:</b> <a href="<?php echo base_url() . 'games/category/' . $value['curl'];?>"><?php echo $value['cname']; ?></a></p>
										</div>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
						
						
					</div>
				</div>
			</div>
		</section>
		
		
		
	</div>
	<!-- /#wrapper -->
	
	<!-- Javascript -->
	
	<script src="<?php echo base_url(); ?>assets/gameforest/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/gameforest/plugins/easypiechart/jquery.easypiechart.min.js"></script>
	<script>
	(function($) {
	"use strict";
		var owl = $(".owl-carousel");
			 
		owl.owlCarousel({
			autoPlay: 3000,
			items : 1, //4 items above 1000px browser width
			itemsDesktop : [1000,3], //3 items between 1000px and 0
			itemsTablet: [600,1], //1 items between 600 and 0
			itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
		});
		
		$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) { 
			event.preventDefault(); 
			$(this).ekkoLightbox();
		}); 
		
		$(window).scroll(function(){
			if ($(this).scrollTop() > 400) {
				$('body').addClass('fixed-tab');
			} else {
				$('body').removeClass('fixed-tab');
			}
		});
		
		$('.chart').easyPieChart({
			easing: 'easeOutBounce',
			barColor: '#5eb404',
			trackColor: '#e3e3e3',
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
				}
		});

		setTimeout(function(){
			$('.progress-animation .progress-bar').each(function() {
				var me = $(this);
				var perc = me.attr("aria-valuenow");
				var current_perc = 0;
				var progress = setInterval(function() {
					if (current_perc>=perc) {
						clearInterval(progress);
					} else {
						current_perc +=1;
						me.css('width', (current_perc)+'%');
					}
				}, 0);
			});
		},0);
	})(jQuery);
	</script>
