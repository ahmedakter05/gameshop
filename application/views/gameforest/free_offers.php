<!-- wrapper -->
	<div id="wrapper">	
		<section class="bg-primary">
			<div class="container">
				<h3 class="color-white font-weight-300">Free Games</h3>
			</div>
		</section>
		<section class="border-bottom-1 border-grey-300 padding-10">
			<div class="container">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url()?>games/all">Game Shop</a></li>
					<li><a href="#">Downloads</a></li>
				</ol>	
			</div>
		</section>
		
		<section class="bg-grey-50 border-bottom-1 border-grey-300 padding-top-40 padding-bottom-40 padding-top-sm-30">
			<div class="container">
				
				<div class="row masonry">
					<?php foreach ($free_offers as $value): ?>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 post-grid">
						<div class="card card-hover">
							<div class="card-img">
								<a href="<?php echo base_url() . 'games/fview/' . $value['id']; ?>"><img style="height: 175px !important;" src="<?php echo base_url() . 'assets/uploads/files/' . $value['image']; ?>" alt="<?php echo $value['name']; ?>" alt="<?php echo $value['name']; ?>"></a>
								
							</div>
							<div class="caption" style="padding: 15px 20px;">
								<h4 class="card-title" style="font-size:1.0em;"><a href="<?php echo base_url() . 'games/fview/' . $value['id']; ?>"><?php echo $value['name']; ?></a></h4>
								
								<ul>
									<li><i class="fa fa-yelp"></i> <b>View: <?php echo $value['count']; ?></b></li>
									<div class="pull-right"><li><i class="fa fa-cloud-download"></i> <a class="downloadLink" href="<?php echo base_url() . 'games/fdownload/' . $value['id'] . '/'; ?>"><b>Download</b></a></li></div>
								</ul>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
					
				</div>
			</div>
		</section>
	</div>
	<!-- /#wrapper -->

	<script src="<?php echo base_url(); ?>assets/gameforest/plugins/jquery/jquery-3.1.0.min.js"></script>
	<!--script src="<?php echo base_url(); ?>assets/gameforest/plugins/bootstrap/js/bootstrap.min.js"></script-->
	<script src="<?php echo base_url(); ?>assets/gameforest/js/core.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/gameforest/plugins/masonry/imagesloaded.pkgd.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/gameforest/plugins/masonry/masonry.pkgd.min.js"></script>
	<script>
	(function($) {
	"use strict";
		var $container = $('.masonry');
		$($container).imagesLoaded( function(){
			$($container).masonry({
				itemSelector: '.post-grid', 
				columnWidth: '.post-grid'
			});
		});
	})(jQuery);
	</script>

	<script>
	$(".downloadLink").click(
	    function(e) {   
	        e.preventDefault();

	        //open download link in new page
	        window.open( $(this).attr("href") );

	        //redirect current page to success page
	        //window.location="www.example.com/success.html";
	        window.focus();
	    }
	);
	</script>