<!-- wrapper -->
	<div id="wrapper">	
		<section class="bg-primary">
			<div class="container">
				<h3 class="color-white font-weight-300">Order Details</h3>
			</div>
		</section>
		<section class="border-bottom-1 border-grey-300 padding-top-10 padding-bottom-10">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo base_url()?>games/all">Game Shop</a></li>
							<li><a href="#">Order</a></li>
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
						<div class="headline">
							<?php 
								$odate = strtotime($orderinfo['ordertime']);
								$odate = date( 'F d, Y', $odate ); 
						    ?>
							<h4 class="no-padding-top">Order No: <?php echo $orderinfo['orderno']; ?> <small>Order Date: <?php echo $odate; ?></small></h4>
							<div class="pull-right">
								<a href="<?php echo base_url()?>games/manage_orders" class="btn btn-primary btn-icon-left"><i class="fa fa-comments"></i> Pay Later</a>
								<div class="dropdown">
									<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
									<ul class="dropdown-menu pull-right">
		                                <li><a href="#"><i class="fa fa-bar-chart-o"></i> View Cart</a></li>
		                                <li><a href="#"><i class="fa fa-sort-alpha-asc"></i> Wish List</a></li>
		                                <li class="divider"></li>
		                                <li><a href="forum-new.html"><i class="fa fa-plus"></i> Profiles</a></li>
		                            </ul>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-body">
								<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Product Name</th>
											<th Style="text-align: center;">Unit Price</th>
											<th Style="text-align: center;">Quantity</th>
											<th Style="text-align: center;">Discount</th>
											<th Style="text-align: center;">Total</th>
											
										</tr>
									</thead>
									<tbody>
										<?php $subtotal = '0'; $count = '1'; ?>
										<?php foreach($orderdetails as $key => $value): ?>
										<tr>
											<td><?php echo $count; $count++;?></td>
											<td><a href="<?php echo base_url() . 'games/view/' . $value['productid']; ?>"><b><?php echo $value['name']?></b></a></td>
											<td><?php echo number_format((float)$value['unitprice'], 2, '.', '');?>Tk</td>
											<td Style="text-align: center;"><?php echo $value['quantity']; ?></td>
											<td Style="text-align: center;"><?php echo number_format((float)$value['discount'], 2, '.', '');?>%</td>
											<td Style="text-align: center;"><?php echo number_format((float)$value['netpricewd'], 2, '.', '');?>Tk</td>
											
										</tr>
										<?php endforeach; ?>
									</tbody>
									<?php if(empty($cartproductslist)){?>
									<tr>
										<td></td>
										<td class="hidden-xs"></td>
										<td></td>  
										<td></td>                          
										<td><b>Sub Total:</b></td>
										
										<td Style="text-align: center;"><b><?php echo number_format((float)$orderinfo['totalprice'], 2, '.', '');?> Tk</b></td>
										
									</tr>
									<tr>
										<td></td>
										<td class="hidden-xs"></td>
										<td></td>  
										<td></td>                          
										<td><b>Overall Discount:</b></td>
										
										<td Style="text-align: center;"><b><?php echo number_format((float)$orderinfo['discount'], 2, '.', '');?> %</b></td>
										
									</tr>
									<?php } ?>
								</table>
							</div>
						</div>
						<br>
						<div class="panel panel-default">
							<div class="panel-body">

								<div class="col-md-7">
									<p><b>Add your Payment Below or call us at +8801977223351</b></p>
									<h5><?php echo '<span Style="color: #bb0b0b !important; font-weight: bold;">' . $message . '</span>';?></span></h5>
									
									<?php echo form_open_multipart('games/add_payments/' . $orderno);?>
										<div class="row">
											<div class="col-md-12">
												<table class="table">
												<div class="form-group">
													<tr>
														<td>
															<b>Total Payable: </b>
														</td>
														<td>
															<?php echo form_input($totalprice);?>
														</td>
													</tr>
												</div>
												<div class="form-group">
													<tr>
														<td style="width:200px;">
															<b>Payment Method: </b>
														</td>
														<td>
															<?php echo form_dropdown($paymentmode['name'], $paymentmode['options'], $paymentmode['value'], 'style="width:250px; margin: 5px 0px 5px 0px;"');?>
														</td>
													</tr>
												</div>
												<div class="form-group">
													<tr>
														<td>
															<b>Mobile/Account No: </b>
														</td>
														<td>
															<?php echo form_input($mobileno);?>
														</td>
													</tr>
												</div>
												<div class="form-group">
													<tr>
														<td>
															<b>TransID/Ref No: </b>
														</td>
														<td>
															<?php echo form_input($referenceno);?>
														</td>
													</tr>
												</div>

												<div class="form-group">
													<tr>
														<td>
															<b>Documents <small>(JPG, PNG, PDF)</small>: </b>
														</td>
														<td>
															<?php echo form_input($filename);?>
														</td>
													</tr>
												</div>
												
												<div class="form-group">
													<tr>
														<td>
															<b>Special Instructions: </b>
														</td>
														<td>
															<?php echo form_textarea($paymentdetails);?>
														</td>
													</tr>
												</div>
												<?php echo form_hidden($pid);?>
												</table>
											</div>
										</div>
										<div class="row">
											<div class="form-group" style="text-align:center;">						
												<?php echo form_submit('submit', '      ' . 'Add Payments' . '      ', 'class="btn btn-primary"');?>
											</div>
										</div>
									<?php echo form_close();?>
								</div>
								<div class="col-md-5">
									<div class="row">
										<div class="col-md-12" style="margin: 60px 20px; padding-left: 30px; border-left: thick double #7B7B7B;">
											<p><b>Payment Info</b></p>
											<?php echo $info['payment_info']['value']; ?>
										</div>
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