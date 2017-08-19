<!-- wrapper -->
	<div id="wrapper">	
		<section class="bg-primary">
			<div class="container">
				<h3 class="color-white font-weight-300">Cart</h3>
			</div>
		</section>
		<section class="border-bottom-1 border-grey-300 padding-top-10 padding-bottom-10">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo base_url()?>games/all">Game Shop</a></li>
							<li><a href="#">Cart</a></li>
						</ol>	
					</div>
				</div>
			</div>
		</section>

		<?php $this->view('gameforest/menu_shop'); ?>
		
		<section class="bg-grey-50 padding-top-60 padding-top-sm-30">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-4 hidden-xs">
						<div class="widget">
							<div class="panel panel-default">
								<div class="panel-heading">About me</div>
								<div class="panel-body">
									I am a frontend developer & designer. Love to create awesome designs and unique websites.
									<ul class="panel-list margin-top-25">
										<li><i class="fa fa-clock-o"></i> Joined December 2009</li>
										<li><i class="fa fa-map-marker"></i> United Kingdom</li>
										<li><i class="fa fa-chain-broken"></i> Gameforest</li>
									</ul>
								</div>
							</div>
						</div>
						
						<div class="widget">
							<div class="panel panel-default">
								<div class="panel-heading">Navigation</div>
								<div class="panel-body no-padding">
									<ul class="panel-list-bordered">
										<li><a href="<?php echo base_url(); ?>assets/gameforest/#"><i class="fa fa-gamepad"></i> Games (4)</a></li>
										<li><a href="<?php echo base_url(); ?>assets/gameforest/#"><i class="fa fa-film"></i> Videos (2)</a></li>
										<li><a href="<?php echo base_url(); ?>assets/gameforest/#"><i class="fa fa-picture-o"></i> Galleries (3)</a></li>
										<li><a href="<?php echo base_url(); ?>assets/gameforest/#"><i class="fa fa-calendar-o"></i> Events</a></li>
										<li><a href="<?php echo base_url(); ?>assets/gameforest/#"><i class="fa fa-users"></i> Groups (1)</a></li>
									</ul>
								</div>
							</div>
						</div>
						
						<div class="widget widget-friends">
							<div class="panel panel-default">
								<div class="panel-heading">Friends (34)</div>
								<div class="panel-body">
									<ul>
										<li><a href="<?php echo base_url(); ?>assets/gameforest/#" data-toggle="tooltip" title="Orb"><img src="<?php echo base_url(); ?>assets/gameforest/img/user/avatar2.jpg" alt=""></a></li>
										<li><a href="<?php echo base_url(); ?>assets/gameforest/#" data-toggle="tooltip" title="Patrick"><img src="<?php echo base_url(); ?>assets/gameforest/img/user/avatar3.jpg" alt=""></a></li>
										<li><a href="<?php echo base_url(); ?>assets/gameforest/#" data-toggle="tooltip" title="John"><img src="<?php echo base_url(); ?>assets/gameforest/img/user/avatar4.jpg" alt=""></a></li>
										<li><a href="<?php echo base_url(); ?>assets/gameforest/#" data-toggle="tooltip" title="Michael"><img src="<?php echo base_url(); ?>assets/gameforest/img/user/avatar5.jpg" alt=""></a></li>
									</ul>
								</div>
							</div>
						</div>
						
						<div class="widget widget-list">
							<div class="panel panel-default">
								<div class="panel-heading bold">Recent Feeds</div>
								<div class="panel-body">
									<ul>
										<li>
											<a href="<?php echo base_url(); ?>assets/gameforest/#" class="thumb"><img src="<?php echo base_url(); ?>assets/gameforest/img/blog/xs/1.jpg" alt=""></a>
											<div class="widget-list-meta">
												<h4 class="widget-list-title"><a href="<?php echo base_url(); ?>assets/gameforest/#">Overwatch Closed Beta</a></h4>
												<p><i class="fa fa-clock-o"></i> September 15, 2016</p>
											</div>
										</li>
										<li>
											<a href="<?php echo base_url(); ?>assets/gameforest/#" class="thumb"><img src="<?php echo base_url(); ?>assets/gameforest/img/blog/xs/2.jpg" alt=""></a>
											<div class="widget-list-meta">
												<h4 class="widget-list-title"><a href="<?php echo base_url(); ?>assets/gameforest/#">Blood and Gore</a></h4>
												<p><i class="fa fa-clock-o"></i> September 13, 2016</p>
											</div>
										</li>
										<li>
											<a href="<?php echo base_url(); ?>assets/gameforest/#" class="thumb"><img src="<?php echo base_url(); ?>assets/gameforest/img/blog/xs/3.jpg" alt=""></a>
											<div class="widget-list-meta">
												<h4 class="widget-list-title"><a href="<?php echo base_url(); ?>assets/gameforest/#">Warner Bros. Interactive</a></h4>
												<p><i class="fa fa-clock-o"></i> September 12, 2016</p>
											</div>
										</li>
										<li>
											<a href="<?php echo base_url(); ?>assets/gameforest/#" class="thumb"><img src="<?php echo base_url(); ?>assets/gameforest/img/blog/xs/4.jpg" alt=""></a>
											<div class="widget-list-meta">
												<h4 class="widget-list-title"><a href="<?php echo base_url(); ?>assets/gameforest/#">Sharks Don't Sleep</a></h4>
												<p><i class="fa fa-clock-o"></i> September 11, 2016</p>
											</div>
										</li>
										<li>
											<a href="<?php echo base_url(); ?>assets/gameforest/#" class="thumb"><img src="<?php echo base_url(); ?>assets/gameforest/img/blog/xs/5.jpg" alt=""></a>
											<div class="widget-list-meta">
												<h4 class="widget-list-title"><a href="<?php echo base_url(); ?>assets/gameforest/#">GTA 5 Reaches 5 Million</a></h4>
												<p><i class="fa fa-clock-o"></i> September 10, 2016</p>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-9 col-sm-8">
						<div class="panel panel-default margin-bottom-40">
							<div class="panel-body">
								<div class="form-group">
									<textarea class="form-control" rows="4" placeholder="What's in your head?..."></textarea>
								</div>
								<div class="btn-group pull-left">
									<a href="<?php echo base_url(); ?>assets/gameforest/#" class="btn btn-link btn-icon-left no-padding-left"><i class="fa fa-image"></i> Image</a>
									<a href="<?php echo base_url(); ?>assets/gameforest/#" class="btn btn-link btn-icon-left"><i class="fa fa-film"></i> Video</a>
									<a href="<?php echo base_url(); ?>assets/gameforest/#" class="btn btn-link btn-icon-left"><i class="fa fa-map-marker"></i> Location</a>
								</div>
								<button type="submit" class="btn btn-primary btn-icon-left pull-right"><i class="fa fa-edit"></i> Submit</button>
							</div>
						</div>
						
						<div class="panel panel-default panel-post">
							<div class="panel-body">
								<div class="post">
									<div class="post-header post-author">
										<a href="<?php echo base_url(); ?>assets/gameforest/#" class="author" data-toggle="tooltip" title="YAKUZI"><img src="<?php echo base_url(); ?>assets/gameforest/img/user/avatar.jpg" alt=""></a>
										<div class="post-title">
											<h3><a href="<?php echo base_url(); ?>assets/gameforest/#">Deadpool Gets the Movie He Deserves</a></h3>
											<ul class="post-meta">
												<li><i class="fa fa-calendar-o"></i> April 13, 2016</li>
												<li><a href="<?php echo base_url(); ?>assets/gameforest/#">#hashtag</a>, <a href="<?php echo base_url(); ?>assets/gameforest/#">#witcher 3</a></li>
											</ul>
										</div>
									</div>
									Etiam et sollicitudin elit. Sed ultrices aliquet dui, eu aliquet metus sodales sit amet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis porttitor varius pulvinar. Vivamus efficitur vulputate imperdiet.
								</div>
							</div>
							<div class="panel-footer">
								<ul class="post-action">
									<li><a href="<?php echo base_url(); ?>assets/gameforest/#"><i class="fa fa-heart"></i> like (5)</a></li>
									<li><a href="<?php echo base_url(); ?>assets/gameforest/#"><i class="fa fa-comments"></i> Comments</a></li>
									<li><a href="<?php echo base_url(); ?>assets/gameforest/#"><i class="fa fa-reply"></i> share</a></li>
								</ul>
							</div>
						</div>
						
						<div class="panel panel-default panel-post">
							<div class="panel-body">
								<div class="post">
									<div class="post-header post-author">
										<a href="<?php echo base_url(); ?>assets/gameforest/#" class="author" data-toggle="tooltip" title="YAKUZI"><img src="<?php echo base_url(); ?>assets/gameforest/img/user/avatar.jpg" alt=""></a>
										<div class="post-title">
											<h3><a href="<?php echo base_url(); ?>assets/gameforest/#">Official Mirror’s Edge Catalyst Trailer</a></h3>
											<ul class="post-meta">
												<li><i class="fa fa-calendar-o"></i> April 13, 2016</li>
												<li><a href="<?php echo base_url(); ?>assets/gameforest/#">#hashtag</a>, <a href="<?php echo base_url(); ?>assets/gameforest/#">#witcher 3</a></li>
											</ul>
										</div>
									</div>
									
									<div class="post-thumbnail">
										<div class="embed-responsive embed-responsive-16by9">
											<iframe class="embed-responsive-item" src="<?php echo base_url(); ?>assets/gameforest/https://www.youtube.com/embed/IsDX_LiJT7E?rel=0&amp;showinfo=0" allowfullscreen></iframe>
										</div>
									</div>
										
									Etiam et sollicitudin elit. Sed ultrices aliquet dui, eu aliquet metus sodales sit amet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis porttitor varius pulvinar. Vivamus efficitur vulputate imperdiet.
								</div>
							</div>
							<div class="panel-footer">
								<ul class="post-action">
									<li><a href="<?php echo base_url(); ?>assets/gameforest/#" class="active"><i class="fa fa-heart"></i> you like it (7)</a></li>
									<li><a href="<?php echo base_url(); ?>assets/gameforest/#"><i class="fa fa-comments"></i> Comments</a></li>
									<li><a href="<?php echo base_url(); ?>assets/gameforest/#"><i class="fa fa-reply"></i> share</a></li>
								</ul>
							</div>
						</div>
						
						<h4 class="page-header text-center no-padding"><i class="fa fa-clock-o"></i> February, 2016</h4>
						<div class="panel panel-default panel-post">
							<div class="panel-body">
								<div class="post">
									<div class="post-header post-author">
										<a href="<?php echo base_url(); ?>assets/gameforest/#" class="author" data-toggle="tooltip" title="YAKUZI"><img src="<?php echo base_url(); ?>assets/gameforest/img/user/avatar.jpg" alt=""></a>
										<div class="post-title">
											<h3><a href="<?php echo base_url(); ?>assets/gameforest/#">The Witcher 3 is Game of the Year</a></h3>
											<ul class="post-meta">
												<li><i class="fa fa-calendar-o"></i> April 13, 2016</li>
												<li><a href="<?php echo base_url(); ?>assets/gameforest/#">#hashtag</a>, <a href="<?php echo base_url(); ?>assets/gameforest/#">#witcher 3</a></li>
											</ul>
										</div>
									</div>
									Etiam et sollicitudin elit. Sed ultrices aliquet dui, eu aliquet metus sodales sit amet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis porttitor varius pulvinar. Vivamus efficitur vulputate imperdiet.
								</div>
							</div>
							<div class="panel-footer">
								<ul class="post-action">
									<li><a href="<?php echo base_url(); ?>assets/gameforest/#"><i class="fa fa-heart"></i> like (5)</a></li>
									<li><a href="<?php echo base_url(); ?>assets/gameforest/#"><i class="fa fa-comments"></i> Comments</a></li>
									<li><a href="<?php echo base_url(); ?>assets/gameforest/#"><i class="fa fa-reply"></i> share</a></li>
								</ul>
							</div>
						</div>
						
						<center><a href="<?php echo base_url(); ?>assets/gameforest/#" class="btn btn-primary btn-lg btn-shadow btn-rounded">Show More</a></center>
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- /#wrapper -->
	
	
	
	<!-- Javascript -->
	<script>
	(function($) {
	"use strict";
		$(window).scroll(function(){
			if ($(this).scrollTop() > 300) {
				$('body').addClass('fixed-tab');
			} else {
				$('body').removeClass('fixed-tab');
			}
		});
	})(jQuery);
	</script>