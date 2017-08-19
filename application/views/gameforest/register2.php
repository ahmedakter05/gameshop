<!-- wrapper -->
	<div id="wrapper">	
		<section class="bg-primary">
			<div class="container">
				<h3 class="color-white font-weight-300">Registration</h3>
			</div>
		</section>
		<section class="border-bottom-1 border-grey-300 padding-top-10 padding-bottom-10">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo base_url()?>games/all">Game Shop</a></li>
							<li><a href="#">Register</a></li>
						</ol>	
					</div>
				</div>
			</div>
		</section>

		
		
		<section class="bg-grey-50 padding-top-60 padding-top-sm-30">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-4 hidden-xs">
						<?php if(!empty($gameshop_menu_cart)){?>
						<div class="widget">
							<div class="panel panel-default">
								<div class="panel-heading">Cart</div>
								<div class="panel-body no-padding">
									<ul class="panel-list-bordered">
										<?php $c = '1';?>
										<?php foreach ($gameshop_menu_cart as $value1): ?>
											<li><a href="<?php echo base_url() . 'games/view/' . $value1['url']; ?>"><?php echo $c . '.&nbsp;' . substr($value1['name'], 0, 25); ?> ...&nbsp;&nbsp;&nbsp;<?php echo $value1['quantity'] . 'x'; ?></a></li>
										<?php $c++; if($c >= '6'){break;} // add +1 for desire value?> 
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
						<?php } ?>

						<?php $this->view('gameforest/menu_helpline'); ?>
						
					</div>
					
					<div class="col-md-9 col-sm-8">
					
					<div class="panel panel-default">
							<div class="panel-body">
								<div class="headline">
									<h4 class="no-padding-top">User Registration <small>Please register right now</small></h4>
									<div class="pull-right">
										<a href="<?php echo base_url()?>games/login" class="btn btn-primary btn-icon-left"><i class="fa fa-comments"></i> Login</a>
										
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="panel-body" style="margin-left: 50px;">	

									<h5 Style="background-color: #bb0b0b; text-align: center;"><?php echo '<span Style="color: #ffffff !important;">' . $message . '</span>';?></span></h5>					
										<?php echo form_open("games/register");?>
	                                    <div class="row-form">
	                                        <div class="span12"><?php echo lang('create_user_fname_label', 'first_name');?></div>
                                                      <div class="span9"><?php echo form_input($first_name);?></div>
	                                    </div>
	                                    <br>
	                                    <div class="row-form">
	                                        <div class="span12"><?php echo lang('create_user_lname_label', 'last_name');?></div>
                                                      <div class="span9"><?php echo form_input($last_name);?></div>
	                                    </div>
	                                    <br>
	                                    <div class="row-form">
	                                        <div class="span12"><?php echo lang('create_user_uname_label', 'user_name');?></div>
                                                      <div class="span9"><?php echo form_input($user_name);?></div>
	                                    </div>
	                                    <br>
	                                    <div class="row-form">
	                                        <div class="span12"><?php echo lang('create_user_email_label', 'email');?></div>
                                                      <div class="span9"><?php echo form_input($email);?></div>
	                                    </div>
	                                    <br>
	                                    <div class="row-form">
	                                        <div class="span12" style="font-weight: 500; margin-bottom: 10px;"><?php echo 'Mobile No:';?></div>
                                                      <div class="span9"><?php echo form_input($mobile);?></div>
	                                    </div>
	                                    <br>
	                                    <div class="row-form">
	                                        <div class="span12"><?php echo lang('create_user_password_label', 'password');?></div>
                                                      <div class="span9"><?php echo form_input($password);?></div>
	                                    </div>
	                                    <br>
	                                    <div class="row-form">
	                                        <div class="span12"><?php echo lang('create_user_password_confirm_label', 'password_confirm');?></div>
                                                      <div class="span9"><?php echo form_input($password_confirm);?></div>
	                                    </div>
	                                    <br>

									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="panel-body" style="margin-left: 25px;">	
										
	                                    <div class="row-form">
	                                        <div class="span12" style="font-weight: 500; margin-bottom: 10px;"><?php echo 'Date of Birth:';?></div>
                                                      <div class="span9"><?php echo form_input($dateofbirth);?></div>
	                                    </div>
	                                    <br>
	                                    <div class="row-form">
	                                        <div class="span12" style="font-weight: 500; margin-bottom: 10px;"><?php echo 'Address:';?></div>
                                                      <div class="span9"><?php echo form_textarea($address);?></div>
	                                    </div>
	                                    <br>
	                                    <div class="row-form">
	                                        <div class="span12" style="font-weight: 500; margin: -12px 0 10px 0;"><?php echo 'Area:';?></div>
                                                      <div class="span9"><?php echo form_input($area);?></div>
	                                    </div>
	                                    <br>
	                                    <div class="row-form">
	                                        <div class="span12" style="font-weight: 500; margin-bottom: 10px;"><?php echo 'Zip Code:';?></div>
                                                      <div class="span9"><?php echo form_input($zip);?></div>
	                                    </div>
	                                    <br>
	                                    <div class="row-form">
	                                        <div class="span12" style="font-weight: 500; margin-bottom: 10px;"><?php echo 'City';?></div>
                                                      <div class="span9"><?php echo form_input($city);?></div>
	                                    </div>
	                                    <br>
	                                    <div class="row-form">
	                                        <div class="span12" style="font-weight: 500; margin-bottom: 10px;"><?php echo 'Country:';?></div>
                                                      <div class="span9"><?php echo form_input($country);?></div>
	                                    </div>
	                                    <br>

	                                   
	                                    <div class="row-form">
	                                        <div class="span12" style="font-weight: 500; margin-bottom: 10px;">
	                                            <div class="toolbar bottom tar" style="float: left; margin-right: 60px;">
	                                                <div class="btn-group">
	                                                <?php echo form_submit('submit', '      ' . lang('create_user_submit_btn') . '      ', 'class="btn btn-info btn-outline" style="float: right;"');?>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
		                                
	                                    <?php echo form_close();?>
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