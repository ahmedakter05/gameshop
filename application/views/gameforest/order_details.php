<style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }
    
    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
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

						<?php $this->view('gameforest/side_menu_users'); ?>

						<?php $this->view('gameforest/menu_helpline'); ?>
						
					</div>
					
					<div class="col-md-9 col-sm-8">
						<div class="headline">
							<?php 
								$odate = strtotime($orderinfo['ordertime']);
								$odate = date( 'F d, Y', $odate ); 
						    ?>
							<h4 class="no-padding-top">Order No: <?php echo $orderinfo['orderno']; ?> <small>Order Date: <?php echo $odate; ?></small>
								<small>Order Status: <b><?php echo $orderinfo['statusname']; ?></b></small></h4>
							<div class="pull-right">
								<?php if(!empty($paymentdetails)){ ?>
								<a href="<?php echo base_url()?>games/manage_orders" class="btn btn-primary btn-icon-left"><i class="fa fa-comments"></i> Manage Orders</a>
								<?php } else { ?>
								<a href="<?php echo base_url() . 'games/add_payments/' . $orderinfo['orderno'];?>" class="btn btn-primary btn-icon-left"><i class="fa fa-comments"></i> Add Payment</a>
								<?php } ?>
								
								<!--div class="dropdown">
									<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
									<ul class="dropdown-menu pull-right">
		                                <li><a href="<?php echo base_url()?>games/cart"><i class="fa fa-bar-chart-o"></i> View Cart</a></li>
		                                <li><a href="<?php echo base_url()?>games/manage_orders"><i class="fa fa-sort-alpha-asc"></i> Manage Orders</a></li>
		                                <li class="divider"></li>
		                                <li><a href="<?php echo base_url()?>games/edit_profile"><i class="fa fa-plus"></i> View Profile</a></li>
		                            </ul>
								</div-->
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
											<td>BDT <?php echo number_format($value['unitprice'], 2);?></td>
											<td Style="text-align: center;"><?php echo $value['quantity']; ?>x</td>
											<td Style="text-align: center;"><?php echo number_format((float)$value['discount'], 2, '.', '');?>%</td>
											<td Style="text-align: center;">BDT <?php echo number_format($value['netpricewd'], 2);?></td>
											
										</tr>
										<?php endforeach; ?>
									</tbody>
									<?php if(empty($cartproductslist)){?>
									<tr>
										<td></td>
										<td class="hidden-xs"></td>
										<td></td>  
										<td></td>                          
										<td><b>Total Cost:</b></td>
										
										<td Style="text-align: center;"><b>BDT <?php echo number_format($orderinfo['totalprice'], 2);?></b></td>
										
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
						<?php if(!empty($paymentdetails)){?>
						<br>
						<div class="panel panel-default">
							<div class="panel-body">

								<div class="invoice-box">
							        <table cellpadding="0" cellspacing="0">
										<tr class="heading">
							                <td>
							                    Payments
							                </td>
							                	
							                <td>
							                    Amounts
							                </td>
							            </tr>
							            
							            <tr class="details">
							                <td>
							                    Paid
							                </td>
							                
							                <td>
							                    BDT <?php echo number_format((float)$paymentdetails['amount'], 2);?>
							                </td>
							            </tr>
							            
							            <tr class="heading">
							                <td>
							                   Payment Info
							                </td>
							                
							                <td>
							                    Details
							                </td>
							            </tr>
							            
							            <tr class="item">
							                <td>
							                    Payment Date
							                </td>
							                <?php 
												$pdate = strtotime( $paymentdetails['paymentdate']);
												$pdate = date( 'F d, Y', $pdate ); 
										    ?>
							                <td>
							                    <?php echo $pdate; ?>
							                </td>
							            </tr>
							            <tr class="item">
							                <td>
							                    Payment Mode
							                </td>
							                
							                <td>
							                    <?php echo $paymentdetails['paymodename']; ?>
							                </td>
							            </tr>
							            
							            <tr class="item">
							                <td>
							                    Mobile/ Account No.
							                </td>
							                
							                <td>
							                    <?php echo $paymentdetails['mobileaccount']; ?>
							                </td>
							            </tr>
							            
							            <tr class="item">
							                <td>
							                    Reference No.
							                </td>
							                
							                <td>
							                    <?php echo $paymentdetails['referenceno']; ?>
							                </td>
							            </tr>
							            <tr class="item">
							                <td>
							                    Documents
							                </td>
							                
							                <td>
							                    <a href="<?php echo base_url() . 'assets/gameforest/paymentdocs/' . $paymentdetails['documents']; ?>" target="_blank"><b><?php echo 'View'; ?></b></a>
							                </td>
							            </tr>
							            <tr class="item">
							                <td>
							                    Remarks
							                </td>
							                
							                <td>
							                    <div style="color: #2776DC; font-weight: bold;"><?php echo $orderinfo['statusname']; ?></div>
							                </td>
							            </tr>
							            
							            <tr class="total">
							                <td><br><b>Special Instruction: <small><?php echo $paymentdetails['paymentdetails']; ?></small></b></td>
							            </tr>
							        </table>
							    </div>

							</div>
						</div>
						<?php } else { ?>
						<br>
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<br>
									<div class="panel panel-danger">
										<div class="panel-heading">
											<h3 class="panel-title">Payments Due</h3>
										</div>
										<div class="panel-body">
											<h4 Style="text-align: center; line-height: 2.0em;"><?php echo '<span Style="color: #E74C3C !important;">' . 'Hello Sir, your payment is still due, please complete the payment to get your products soon <br> Thank You.' . '</span>';?></span></h4>
											<a href="<?php echo base_url() . 'games/add_payments/' . $orderinfo['orderno'];?>" class="btn btn-danger btn-icon-left"><i class="fa fa-comments"></i> Add Payment</a>
										</div>
									</div>
									<br>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-4" style="padding-left: 20px;">
									
								</div>
							</div>
						</div>
						<?php } ?>


						<?php if(!empty($licenseinfo)){?>
						<br>
						<div class="panel panel-default">
							<div class="panel-body">

								<div class="invoice-box">
							        <table cellpadding="0" cellspacing="0">
										<tr class="heading">
							                <td>
							                    Product Name
							                </td>
							                
							                <td>
							                    Action
							                </td>

							            </tr>
							            <?php foreach($licenseinfo as $value):?>
							            <tr class="list">
							                <td>
							                    <?php echo $value['name'];?>
							                </td>

							                <td>
							                    <a href="<?php echo base_url() . 'games/view_licenses/' . $value['orderno'] . '/' . $value['productid'];?>" class="btn btn-primary btn-sm">View More <i class="fa fa-share-square-o"></i></a>
							                </td>
							            </tr>
							            <?php endforeach; ?>
							            
							            
							        </table>
							    </div>

							</div>
						</div>
						<?php } else { ?>
						<br>
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<br>
									<div class="panel panel-success">
										<div class="panel-heading">
											<h3 class="panel-title">No License Available</h3>
										</div>
										<div class="panel-body">
											<h4 Style="text-align: center; line-height: 2.0em;"><?php echo '<span Style="color: #0E9A49 !important;">' . 'Hello Sir, No license is available is right now. <br> Thank You.' . '</span>';?></span></h4>
										</div>
									</div>
									<br>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-4" style="padding-left: 20px;">
									
								</div>
							</div>
						</div>
						<?php } ?>



					</div>
				</div>
			</div>
		</section>
		
		
	</div>
	<!-- /#wrapper -->