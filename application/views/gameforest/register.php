<!-- wrapper -->
	<div id="wrapper">	
		<section class="hero hero-panel" style="background-image: url(<?php echo base_url(); ?>assets/gameforest/img/cover/cover-register.jpg);">
			<div class="hero-bg"></div>
			<div class="container relative">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-8 col-xs-12 pull-none margin-auto">
						<div class="panel panel-default panel-login">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-users"></i> Register to Gameforest</h3>
							</div>
							<div class="panel-body">						
								<?php echo form_open("admin/cp/signup");?>
                                          
                                                <div class="form-group input-icon-left">
                                                      <div class="span3"><?php echo lang('create_user_uname_label', 'user_name');?></div>
                                                      <div class="span9"><?php echo form_input($user_name);?></div>
                                                </div>
                                                <div class="row-form">
                                                      <div class="span3"><?php echo lang('create_user_fname_label', 'first_name');?></div>
                                                      <div class="span9"><?php echo form_input($first_name);?></div>
                                                </div>
                                                <div class="form-group input-icon-left">
                                                      <div class="span3"><?php echo lang('create_user_lname_label', 'last_name');?></div>
                                                      <div class="span9"><?php echo form_input($last_name);?></div>
                                                </div>
                                                <div class="form-group input-icon-left">
                                                      <div class="span3"><?php echo lang('create_user_company_label', 'company');?></div>
                                                      <div class="span9"><?php echo form_input($company);?></div>
                                                </div>
                                               <div class="form-group input-icon-left">
                                                      <div class="span3"><?php echo lang('create_user_email_label', 'email');?></div>
                                                      <div class="span9"><?php echo form_input($email);?></div>
                                                </div>
                                                <div class="form-group input-icon-left">
                                                      <div class="span3"><?php echo lang('create_user_phone_label', 'phone');?></div>
                                                      <div class="span9"><?php echo form_input($phone);?></div>
                                                </div>
                                                <div class="form-group input-icon-left">
                                                      <div class="span3"><?php echo lang('create_user_password_label', 'password');?></div>
                                                      <div class="span9"><?php echo form_input($password);?></div>
                                                </div>
                                                <div class="form-group input-icon-left">
                                                      <div class="span3"><?php echo lang('create_user_password_confirm_label', 'password_confirm');?></div>
                                                      <div class="span9"><?php echo form_input($password_confirm);?></div>
                                                </div>
                                                </div>
                                                <p align="center" Style="padding-bottom: 30px; color: #000000;"><?php echo form_reset('reset', lang('client_add_reset_btn')); echo '        |       '; echo form_submit('submit', lang('create_user_submit_btn'));?></p>

                                          <?php echo form_close();?>
							</div>
							<div class="panel-footer">
								Already have an account? <a href="<?php echo base_url(); ?>admin/cp/signin">Sign In Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- /#wrapper -->
	
	