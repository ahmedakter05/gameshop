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
					
					<button type="button" class="btn btn-warning btn-shadow" style="float: right;" onClick="window.location.reload()" <?php if(empty($gameshop_menu_cart)){ echo 'disabled';}?> ><i class="fa fa-calculator">&nbsp;&nbsp;Recalculate</i></button>
					
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
											<th Style="text-align: center;">Total Price</th>
											<th Style="text-align: center;">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $subtotal = '0'; $count = '1'; ?>
										<?php foreach($cartproductslist as $key => $value): ?>
										<tr>
											<?php echo form_open("games/cart_action/quantity/". $value['sid'], array('name' => 'myform' . $key, 'id' => 'formid' . $key));?>
											<td><?php echo $count; $count++;?></td>
											<td class="hidden-xs"><a href="<?php echo base_url() . 'games/view/' . $value['url']; ?>"><b><?php echo $value['name']?></b></a> </br> <span style="font-size: 11px"><b>Category: <a href="<?php echo base_url() . 'games/category/' . $value['curl']; ?>"><?php echo $value['cname']?></a></b></span></td>
											<!--td Style="text-align: center;"><?php echo form_input($quantity[$key]);?>&nbsp;x  <?php echo form_submit('submit', 'Apply'); ?></td-->
											<td Style="text-align: center;"><input type="text" class="form-control" style="height: 30px; width: 50px; margin-left: 70px;" name="<?php echo $quantity[$key]['name'];?>" value="<?php echo $quantity[$key]['value'];?>" id="<?php echo $quantity[$key]['id'];?>" style="width:30px; text-align:center;" onchange="myFunction(this.value, <?= $value['sid'] ?>)"></td><?php echo form_close();?>
											<td Style="text-align: center;">BDT <?php echo number_format($value['price'], 2);?></td>
											<td Style="text-align: center;"><?php echo $value['discount']?>%</td>
											<td Style="text-align: center;"><?php if($value['discount']=='0'){$tdisc='0';} else {$tdisc=$value['discount']*$value['price']/'100';} $total = ($value['price'] - $tdisc); $total = $total * $value['productquantity']; $subtotal = $subtotal + $total; echo  'BDT ' . number_format($total, 2);?></td>
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

										<td></td>
										<td Style="text-align: center;"><b>Total Cost:</b></td>
										<td Style="text-align: center;"><b>BDT <?php echo number_format($subtotal, 2); $subtotal = '0'; ?></b></td>

										<td Style="text-align: center;">
											
											<div class="pull-right" style="padding-top: 5px;"><a href="<?php echo base_url() . 'games/precheck'; ?>"><button class="btn btn-success btn-md" data-toggle="tooltip">Checkout&nbsp;&nbsp;<i class="fa fa-shopping-cart"></i></button></a></div>
											
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
		<p id="txtHinta"> </p>
	</div>
	<!-- /#wrapper -->
<script>
	function myFunction(str1, str2) {
	    if (str1 == "") {
	        document.getElementById("txtHint").innerHTML = "";
	        return;
	    } else { 
	        if (window.XMLHttpRequest) {
	            // code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp = new XMLHttpRequest();
	        } else {
	            // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }
	        xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	                document.getElementById("txtHint").innerHTML = this.responseText;
	            }
	        };
	        xmlhttp.open("GET","<?php echo base_url()?>games/update_cart_quantity?q="+str1+'sp'+str2,true);
	        xmlhttp.send();
	    }
	}
	</script>