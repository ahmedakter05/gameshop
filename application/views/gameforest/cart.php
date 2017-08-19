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

		<?php //$this->view('gameforest/menu_shop'); ?>
		
		<section class="bg-grey-50 padding-top-60 padding-top-sm-30">
			<div class="container">
				<h3>Cart Contents</h3>
				<p>For purchase, go to Buy Now</p>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<a href="<?php echo base_url() . 'games/all'; ?>"><button type="button" class="btn btn-info btn-shadow">Contineue Shopping</button></a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					
					<a href="<?php echo base_url() . 'games/precheck'; ?>"><button type="button" class="btn btn-success btn-shadow" style="float: right;" <?php if(empty($gameshop_menu_cart)){ echo 'disabled';}?> >Proceed to Checkout</button></a>
					
				</div>
				<br>&nbsp;<br>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Product Name</th>
											<th Style="text-align: center;">Quantity</th>
											<th Style="text-align: center;">Unit Price</th>
											<th Style="text-align: center;">Discount</th>
											<th Style="text-align: center;">Total</th>
											<th Style="text-align: center;">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $subtotal = '0'; $count = '1'; ?>
										<?php foreach($cartproductslist as $key => $value): ?>
										<tr>
											<?php echo form_open("games/cart_action/quantity/". $value['sid']);?>
											<td><?php echo $count; $count++;?></td>
											<td class="hidden-xs"><a href="<?php echo base_url() . 'games/view/' . $value['url']; ?>"><b><?php echo $value['name']?></b></a> </br> <span style="font-size: 11px"><b>Category: <a href="<?php echo base_url() . 'games/category/' . $value['curl']; ?>"><?php echo $value['cname']?></a></b></span></td>
											<td Style="text-align: center;"><?php echo form_input($quantity[$key]);?>&nbsp;x  <?php echo form_submit('submit', 'Apply'); ?></td><?php echo form_close();?>
											<td Style="text-align: center;"><?php echo $value['price'];?>Tk</td>
											<td Style="text-align: center;"><?php echo $value['discount']?>%</td>
											<td Style="text-align: center;"><?php if($value['discount']=='0'){$tdisc='0';} else {$tdisc=$value['discount']*$value['price']/'100';} $total = ($value['price'] - $tdisc); $total = $total * $value['productquantity']; $subtotal = $subtotal + $total; echo $total;?>Tk</td>
											<td Style="text-align: center;">
												<a href="<?php echo base_url() . 'games/cart_action/delete/' . $value['sid']; ?>"><button class="btn btn-circle btn-sm" data-toggle="tooltip" title="delete"><i class="fa fa-trash"></i></button></a> 
											</td> 
											
										</tr>
										<?php endforeach; ?>
									</tbody>
									<?php if(!empty($cartproductslist)){?>
									<tr>
										<td></td>
										<td></td>
										<td class="hidden-xs"></td>

										<td><b>Sub Total:</b></td>
										<td></td>
										<td Style="text-align: center;"><b><?php echo $subtotal; $subtotal = '0'; ?>Tk</b></td>

										<td Style="text-align: center;">
											
											<a href="<?php echo base_url() . 'games/precheck'; ?>"><button class="btn btn-md" data-toggle="tooltip"><i class="fa fa-shopping-cart">&nbsp;Checkout</i></button></a>
											
										</td>                          
									</tr>
									<?php } ?>
								</table>
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
	</div>
	<!-- /#wrapper -->