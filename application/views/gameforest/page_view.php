<!-- wrapper -->
	<div id="wrapper">	
		<section class="bg-primary">
			<div class="container">
				<h3 class="color-white font-weight-300"><?php echo $pagedata['name']; ?></h3>
			</div>
		</section>
		<section class="border-bottom-1 border-grey-300 padding-top-10 padding-bottom-10">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo base_url()?>games/all">Game Shop</a></li>
							<li><a href="#">Page</a></li>
						</ol>	
					</div>
				</div>
			</div>
		</section>

		<section class="bg-grey-50 padding-top-60 padding-top-sm-30">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-4 hidden-xs">
						<?php if(!empty($userdata['uid'])){?>
						<?php $this->view('gameforest/sidemenu_profile'); ?>
						<?php } ?>
						
						<?php $this->view('gameforest/menu_helpline'); ?>
						
					</div>
					
					<div class="col-md-9 col-sm-8">
						<div class="post post-single">
							<div class="post-header">
								<div class="post-title">
									<h2><a href="#"><?php echo $pagedata['name']; ?></a></h2>
									<ul class="post-meta">
										<li><i class="fa fa-calendar-o"></i>Published: <?php echo $pagedata['updatetime']; ?></li>
									</ul>
								</div>
							</div>
							
							<?php echo $pagedata['details']; ?>
							
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