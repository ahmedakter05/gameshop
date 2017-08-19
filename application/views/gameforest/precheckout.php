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
		
		<section class="elements">
			<div class="container">
				<h3>Cart Contents</h3>
				<p>For purchase, go to Buy Now</p>
				
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="panel-body">						
										<?php echo form_open("games/precheck");?>

	                                    <div class="row-form">
	                                        <div class="span3"><?php echo lang('login_identity_label', 'identity');?></div>
	                                        <div class="span9"><?php echo form_input($identity, "style='width=100px;'");?></div>
	                                    </div>
	                                    <br>
	                                    <div class="row-form">
	                                        <div class="span3"><?php echo lang('login_password_label', 'password');?></div>
	                                        <div class="span9"><?php echo form_input($password);?></div>
	                                    </div>
	                                    <br>
	                                    <div class="row-form">
	                                        <div class="span3"><?php echo lang('login_remember_label', 'remember');?></div>
	                                        <div class="span6"><?php echo form_checkbox('remember', '1', TRUE, 'id="remember"', 'display="none"');?></div>
	                                        <div class="span3">
	                                            <div class="toolbar bottom tar">
	                                                <div class="btn-group">
	                                                <?php echo form_submit('submit', lang('login_submit_btn') . '    ', 'class="btn btn-info btn-outline"');?>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
		                                
	                                    <?php echo form_close();?>
							</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-4" style="padding-left: 20px;">
									<button type="button" class="btn btn-info btn-outline">Register</button>
									<button type="button" class="btn btn-success btn-outline">Checkout as Guest</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
	</div>
	<!-- /#wrapper -->