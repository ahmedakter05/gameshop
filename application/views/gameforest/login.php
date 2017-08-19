<!-- wrapper -->
	<div id="wrapper">	
		<section class="hero hero-panel" style="background-image: url(<?php echo base_url(); ?>assets/gameforest/img/cover/cover-register.jpg);">
			<div class="hero-bg"></div>
			<div class="container relative">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-8 col-xs-12 pull-none margin-auto">
						<div class="panel panel-default panel-login">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-users"></i> Login to GameShop</h3>
								</br>
								<h5 Style="background-color: #bb0b0b; text-align: center;"><?php echo '<span Style="color: #ffffff !important;">' . $message . '</span>';?></span></h5>
							</div>
							<div class="panel-body">						
								<?php echo form_open("admin/cp/signin");?>

                                    <div class="row-form">
                                        <div class="span3"><?php echo lang('login_identity_label', 'identity');?></div>
                                        <div class="span9"><?php echo form_input($identity);?></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span3"><?php echo lang('login_password_label', 'password');?></div>
                                        <div class="span9"><?php echo form_input($password);?></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span3"><?php echo lang('login_remember_label', 'remember');?></div>
                                        <div class="span6"><?php echo form_checkbox('remember', '1', TRUE, 'id="remember"', 'display="none"');?></div>
                                        <div class="span3">
                                            <div class="toolbar bottom tar">
                                                <div class="btn-group">
                                                <?php echo form_submit('submit', lang('login_submit_btn'));?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                
                                    <?php echo form_close();?>
							</div>
							<div class="panel-footer">
								Already have an account? <a href="<?php echo base_url(); ?>admin/cp/signup">Sign Up Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- /#wrapper -->
	
	