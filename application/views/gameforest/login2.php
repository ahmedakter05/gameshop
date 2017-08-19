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
							<li><a href="#">Login</a></li>
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
						<?php $this->view('gameforest/side_menu_users'); ?>
						<?php $this->view('gameforest/menu_helpline'); ?>
						
					</div>
					
					<div class="col-md-9 col-sm-8">
						
					<div class="panel panel-default">
						<div class="panel-body">
							
							<!--div class="col-lg-6 col-md-6 col-sm-6">
								<div class="panel-body" style="margin-left: 25px;">	

								<h5 Style="background-color: #bb0b0b; text-align: center;"><?php echo '<span Style="color: #ffffff !important;">' . $message . '</span>';?></span></h5>					
									<?php echo form_open("games/login");?>

                                    <div class="row-form">
                                        <div class="span12"><?php echo lang('login_identity_label', 'identity');?> &nbsp; &nbsp;<?php echo form_input($identity);?></div>
                                    </div>
                                    <br>
                                    <div class="row-form">
                                        <div class="span12"><?php echo lang('login_password_label', 'password');?> &nbsp; &nbsp;<?php echo form_input($password);?></div>
                                    </div>
                                    <br>
                                    <div class="row-form">
                                        <div class="span12"><?php echo lang('login_remember_label', 'remember');?> &nbsp;&nbsp;&nbsp;<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"', 'display="none"');?></div>
                                    </div>	
                                   
                                    <div class="row-form">
                                        <div class="span12">
                                            <div class="toolbar bottom tar" style="float: right; margin-right: 60px;">
                                                <div class="btn-group">
                                                <?php echo form_submit('submit', '      ' . lang('login_submit_btn') . '      ', 'class="btn btn-info btn-outline" style="float: right;"');?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
	                                
                                    <?php echo form_close();?>
								</div>
							</div-->

							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-bottom-sm-30" style="padding-top: 20px;">
								
								
								<div class="headline">
									<h4 class="no-padding-top">Signin <small>If you're not registered yet, please Signup </small></h4>
									<div class="pull-right" style="padding-bottom: 0px;">
										<a href="<?php echo base_url()?>games/register" class="btn btn-primary btn-success btn-icon-left"><i class="fa fa-pencil-square-o"></i> Register</a>
									</div>
								</div>
								<h5 Style="background-color: #bb0b0b; text-align: center;"><?php echo '<span Style="color: #ffffff !important;">' . $message . '</span>';?></span></h5>					
								<?php echo form_open("games/login");?>
								<div class="form-group">
									<?php echo form_input($identity);?>
								</div>
								
								<div class="form-group">
									<?php echo form_input($password);?>
								</div>

								<div class="row-form">
                                    <div class="span12"><?php echo lang('login_remember_label', 'remember');?> &nbsp;&nbsp;&nbsp;<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"', 'display="none"');?></div>
                                </div>	

								<div class="row-form">
                                    <div class="span12">
                                        <div class="toolbar bottom tar" style="float: right; margin-right: 0px;">
                                            <div class="btn-group">
                                            <?php echo form_submit('submit', '      ' . lang('login_submit_btn') . '      ', 'class="btn btn-primary btn-icon-left" style="float: right;"');?>
                                            </div>
                                        </div>
                                    </div>
                           		</div>
                           		<?php echo form_close();?>
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