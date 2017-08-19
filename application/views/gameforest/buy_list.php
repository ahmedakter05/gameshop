<!-- wrapper -->
	<div id="wrapper">	
		
		<section class="border-bottom-1 border-grey-300 padding-top-10 padding-bottom-10">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo base_url()?>games/all">Game Shop</a></li>
							<li><a href="<?php echo base_url()?>assets/gameforest/#">Purchase History</a></li>
						</ol>	
					</div>
				</div>
			</div>
		</section>
		
		<section class="elements">
			<div class="container">
				<h3>Purchase List</h3>
				<p>Here you'll get the list all of your purchased products till now</p>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Product Name</th>
											<th>Order Date</th>
											<th>Payment Amount</th>
											<th>Payment Status</th>
											<th>License Info</th>
											<th>Delivery Status</th>
										</tr>
									</thead>
									<tbody>
										<?php $subtotal = '0'; $count = '1'; ?>
										<?php foreach($buylist as $value): ?>
										<tr>
											<td><?php echo $count; $count++;?></td>
											<td class="hidden-xs"><b><?php echo $value['name']?></b></td>
											<?php $ledate = strtotime( $value['orderdate']);
												  $ledate = date( 'h:i:s A F d, Y', $ledate ); ?>
											<td width="130px"><?php echo $ledate; ?></td>
											<td><?php echo $value['amount']; ?>Tk</td>
											<td><a href="<?php echo base_url() . 'games/payments/' . $value['paymentid']; ?>"><?php if($value['paymentstatus'] == '0'){echo 'Pending';} elseif($value['paymentstatus'] == '1'){echo 'Processing';} elseif($value['paymentstatus'] == '2'){echo 'Complete';}?></a></td>
											<td><?php if(($value['licensestatus'] == '1')){ ?><a href="<?php echo base_url() . 'games/licenses/' . $value['licenseid']; ?>">View</a><?php } else { echo 'View';} ?></td>
											<td><?php if($value['deliverystatus'] == '0'){echo 'Pending';} elseif($value['paymentstatus'] == '1'){echo 'Processing';} elseif($value['paymentstatus'] == '2'){echo 'Completed';}?></td>
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