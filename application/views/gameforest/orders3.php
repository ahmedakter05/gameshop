<!-- wrapper -->
	<div id="wrapper">	
		<section class="bg-primary">
			<div class="container">
				<h3 class="color-white font-weight-300">Manage Orders</h3>
			</div>
		</section>
		<section class="border-bottom-1 border-grey-300 padding-top-10 padding-bottom-10">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo base_url()?>games/all">Game Shop</a></li>
							<li><a href="#">Orders</a></li>
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

						<?php $this->view('gameforest/side_menu_users'); ?>
						
						<?php $this->view('gameforest/menu_helpline'); ?>
						
					</div>
					
					<div class="col-md-9 col-sm-8">
						<div class="headline">
							<h4 class="no-padding-top">Manage Orders<small>Here you'll find all your order list below</small></h4>
							<!--div class="pull-right">
								
								<div class="dropdown">
									<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
									<ul class="dropdown-menu pull-right">
		                                <li><a href="#"><i class="fa fa-bar-chart-o"></i> View Cart</a></li>
		                                <li><a href="#"><i class="fa fa-sort-alpha-asc"></i> Wish List</a></li>
		                                <li class="divider"></li>
		                                <li><a href="forum-new.html"><i class="fa fa-plus"></i> Profiles</a></li>
		                            </ul>
								</div>
							</div-->
						</div>
						<div class="panel panel-default">
							<div class="panel-body">
								<table class="table">
									<thead>
										<tr>
											<th>Order No</th>
											<th>Date</th>
											<th Style="text-align: center;">Phone</th>
											<th Style="text-align: center;">Discount</th>
											<th Style="text-align: center;">Total Price</th>
											<th Style="text-align: center;">Status</th>
										</tr>
									</thead>
									<tbody>
										<?php $subtotal = '0'; $count = '1'; ?>
										<?php foreach($orders as $key => $value): ?>
										<tr>
											<td><a href="<?php echo base_url() . 'games/order_details/' . $value['orderno']; ?>"><b><?php echo $value['orderno']?></b></a></td>
											<?php 
												$odate = strtotime( $value['ordertime']);
												$odate = date( 'F d, Y', $odate ); 
										    ?>
											<td><?php echo $odate;?></td>
											<td Style="text-align: center;"><?php echo $value['phone']; ?></td>
											<td Style="text-align: center;"><?php echo number_format((float)$value['discount'], 2, '.', '');?>%</td>
											<td Style="text-align: center;">BDT <?php echo number_format((float)$value['totalprice'], 2);?></td>
											
											<td><div class="pull-right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-modal" disabled><?php echo $value['statusname']; ?></button></div></td>
											
										</tr>
										<?php endforeach; ?>
									</tbody>
									
								</table>
								
								
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