<!-- wrapper -->
	<div id="wrapper">	
		<section class="bg-primary">
			<div class="container">
				<h3 class="color-white font-weight-300">Profile</h3>
			</div>
		</section>
		<section class="border-bottom-1 border-grey-300 padding-top-10 padding-bottom-10">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo base_url()?>games/all">Game Shop</a></li>
							<li><a href="#">Profile Page</a></li>
						</ol>	
					</div>
				</div>
			</div>
		</section>

		<section class="bg-grey-50 padding-top-60 padding-top-sm-30">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-4 hidden-xs">
						
						<?php $this->view('gameforest/side_menu_cart'); ?>
						<?php $this->view('gameforest/sidemenu_profile'); ?>
						<?php $this->view('gameforest/side_menu_users'); ?>
						<?php $this->view('gameforest/menu_helpline'); ?>
						
					</div>
					
					<div class="col-md-9 col-sm-8">
					
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="headline">
									<h4 class="no-padding-top">Profile <small>Please update your profile data</small></h4>
									
								</div>
								<h5 Style="background-color: #bb0b0b; text-align: center;"><?php echo '<span Style="color: #ffffff !important;">' . $message . '</span>';?></span></h5>					
								<?php echo form_open("games/edit_profile");?>
								<div class="panel panel-default margin-bottom-30">
									<div class="panel-body">
										<form class="form-label">
											<div class="col-lg-6 col-md-6 col-sm-6">
												<div class="form-group">
													<?php echo form_input($first_name);?>
												</div>
												<div class="form-group">
													<?php echo form_input($last_name);?>
												</div>
												
												<div class="form-group">
													<?php echo form_input($mobile);?>
												</div>
												
												<div class="form-group">
													<?php echo form_textarea($address);?>
												</div>
												
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6">
												
												<div class="form-group">
													<?php echo form_input($dateofbirth);?>
												</div>
												<div class="form-group">
													<?php echo form_input($area);?>
												</div>
												<div class="form-group">
													<?php echo form_input($city);?>
												</div>
												<div class="form-group">
													<?php echo form_input($zip);?>
												</div>
												<div class="form-group">
													<?php echo form_input($country);?>
												</div>
												<div class="pull-right">
													<div class="btn-group">
	                                                	<?php echo form_submit('submit', '      ' . 'Save Profile' . '      ', 'class="btn btn-success btn-icon-left" style="float: right;"');?>
	                                                </div>
												</div>
											</div>
											<?php echo form_close();?>
										</form>
									</div>
								</div>
				
								
								

								<div class="col-lg-3 col-md-3 col-sm-4" style="padding-left: 20px;">
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		
		
	</div>
<!-- /#wrapper -->