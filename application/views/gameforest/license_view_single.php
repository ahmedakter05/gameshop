<!-- wrapper -->
	<div id="wrapper">	
		<section class="bg-primary">
			<div class="container">
				<h3 class="color-white font-weight-300">License Info</h3>
			</div>
		</section>
		<section class="border-bottom-1 border-grey-300 padding-top-10 padding-bottom-10">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo base_url()?>games/all">Game Shop</a></li>
							<li><a href="#">License</a></li>
						</ol>	
					</div>
				</div>
			</div>
		</section>

		<section class="bg-grey-50 padding-top-60 padding-top-sm-30">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-4 hidden-xs">
						
						<?php $this->view('gameforest/sidemenu_profile'); ?>
						
						<?php $this->view('gameforest/menu_helpline'); ?>
						
					</div>
					
					<div class="col-md-9 col-sm-8">
						

						<div class="panel panel-default">
							<div class="panel-body">

								<div class="post post-single">
									<div class="post-header">
										<div class="post-title">
											<h2><a href="#"><?php echo $licenseinfo['name'];?></a></h2>
										</div>
									</div>
									All the license info Attached below. For further query, Contact us.
									<blockquote>
										<p>License id: <?php echo $licenseinfo['licenseid'];?></p>
										<p>License Info: <?php //echo $licenseinfo['licenseinfo'];?></p>
										<p>License Key: <b><?php echo $licenseinfo['licensekey'];?></b></p>
										<p>Download Link: <b><a href="<?php echo $licenseinfo['downloadlinks'];?>">Click Here !!!</a></b></p>
										<p>Download Info: <?php echo $licenseinfo['downloadinfo'];?></p>
										<p>Username: <?php echo $licenseinfo['username'];?></p>
										<p>Password: <?php echo $licenseinfo['password'];?></p>
										<p>Issue Date: <?php //echo $licenseinfo['expiration'];?></p>
										<p>Expiry Date: <b><?php echo $licenseinfo['expiration'];?></b></p>

									</blockquote>
											
									<p>Thank You for being with us, Buy more games and get promotional offer more.</p>
									<a href="<?php echo base_url() . 'games/order_details/' . $licenseinfo['orderno'];?>" class="btn btn-primary btn-sm">Go Back</a>
										
									
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	</div>
	<!-- /#wrapper -->

	<div class="modal fade bs-modal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Payment Details</h4>
				</div>
				<div class="modal-body">
					<p><b>Mobile No: <?php echo $payment_data['mobileno'];?></b></p>
					<p><b>Reference No: <?php echo $payment_data['referenceno'];?></b></p>
					<p><b>Delivery Address: <?php echo $payment_data['billingaddress'];?></b></p>
					<p><b>Comments: <?php echo $payment_data['paymentdetails'];?></b></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
					
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>