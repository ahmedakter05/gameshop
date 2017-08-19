<!-- wrapper -->
	<div id="wrapper">	
		
		<section class="border-bottom-1 border-grey-300 padding-top-10 padding-bottom-10">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo base_url()?>assets/gameforest/index-2.html">Home</a></li>
							<li><a href="<?php echo base_url()?>games/buylist">Your Orders</a></li>
							<li class="active">License</li>
						</ol>	
					</div>
				</div>
			</div>
		</section>
		
		<section class="elements bg-white">
			<div class="container">
				<h3>License Info</h3>
				<p>Gameforest is including custom widgets like post lists, game and game lists. You can use everywhere these widgets in the theme.</p>
				<div class="row margin-top-40">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="widget widget-game" style="background-image: url(<?php echo base_url()?>assets/gameforest/img/game/game-widget.jpg);">
							<div class="overlay">
								<div class="title"><?php echo substr($license_data['name'], 0, 42);?> ...</div>
								<div class="bold text-uppercase">Expiration Date</div>
								<?php $ledate = strtotime( $license_data['expiration'] );
								$ledate = date( 'F d, Y', $ledate ); ?>
								<span class="label label-primary"><?php echo $ledate;?></span>
								
								<div class="bold text-uppercase margin-top-30">License Key</div>
								<span class="font-size-13"><?php echo $license_data['licensekey'];?></span>
								<?php if (!empty($license_data['username'])) { ?>
								<div class="bold text-uppercase margin-top-10">Username</div>
								<span class="font-size-13"><?php echo $license_data['username'];?></span>
								<div class="bold text-uppercase margin-top-10">Password</div>
								<span class="font-size-13"><?php echo $license_data['password'];?></span>
								<?php } ?>
								<div class="bold text-uppercase margin-top-10">More Info</div>
								<div class="description" style="margin-top: 10px;">
									<?php echo $license_data['licenseinfo'];?>
									<a href="<?php echo base_url()?>games/buylist" class="btn btn-block btn-primary margin-top-20">Go Back <i class="fa fa-reply-all margin-left-10"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 margin-bottom-sm-30">
						<div class="widget widget-game" style="background-image: url(<?php echo base_url()?>assets/gameforest/img/game/review-widget.jpg);">
							<div class="overlay">
								<div class="title">Download Links</div>
								
								<div class="progress progress-animation progress-xs">
									<div class="progress-bar progress-bar-success" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
								</div>
								
								<div class="bold text-uppercase margin-top-40">Link - </div>
								<span class="font-size-13"><h4><a href="<?php echo $license_data['downloadlinks'];?>" style="color:#fff; padding-left: 100px;">Download</a></h4></span>
								
								
								<div class="bold text-uppercase margin-top-40">More Info</div>
								<div class="description" style="margin-top: 10px;">
									<?php echo $license_data['downloadinfo'];?>
									
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="widget widget-list">
							<div class="panel panel-default">
								<div class="panel-heading bold">Recent Games</div>
									<div class="panel-body">
										<ul>
											<?php foreach ($gameshop_latest_products as $value): ?>
											<li>
												<a href="#" class="thumb"><img src="<?php echo base_url() . 'assets/uploads/files/' . $value['imageurl1']; ?>" alt="<?php echo $value['name']; ?>"></a>
												<div class="widget-list-meta">
													<h4 class="widget-list-title"><a href="<?php echo base_url() . 'games/view/' . $value['url']; ?>"><?php echo substr($value['name'], 0, 30); ?> ...</a></h4>
													<p><i class="fa fa-bars"></i> <a href="<?php echo base_url() . 'games/category/' . $value['categories']['curl']; ?>"><?php echo $value['categories']['cname']?></a></p>
												</div>
											</li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
				</div>
			</div>
		</section>
		
		
	</div>
	<!-- /#wrapper -->

	<script src="<?php echo base_url()?>assets/gameforest/plugins/easypiechart/jquery.easypiechart.min.js"></script>
	<script>
	(function($) {
	"use strict";
		var config1 = {
			  "id": $('#twitter').data("twitter"),
			  "domId": 'twitter',
			  "maxTweets": 1,
			  "enableLinks": true
			};
			twitterFetcher.fetch(config1);
		
		$('.chart').easyPieChart({
			easing: 'easeOutBounce',
			barColor: '#5eb404',
			trackColor: '#e3e3e3',
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
				}
		});
	})(jQuery);
	</script>