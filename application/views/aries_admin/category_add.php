           <div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-arrow-right"></span>
                    </div>
                    <h1><?php echo lang('add_client_heading');?> <small><?php echo lang('add_client_subheading');?></small></h1>
                </div>
                
				
				<div class="row-fluid">
				
					<div class="span2"></div>
				
                    <div class="span8">
						<div class="block">
                            <div class="head red">
                                <h5><?php echo $message;?></h5>
							</div>
						</div>
						
						<div class="data-fluid">
						
							<?php echo form_open("admins/add/category");?>
							
							<div class="row-form">
								<div class="span3">Category Name</div>
								<div class="span9"><?php echo form_input($category_name);?></div>
							</div>
							<div class="row-form">
								<div class="span3">Parent Name</div>
								<div class="span9"><?php echo form_input($parent_name);?></div>
							</div>
							<div class="row-form">
								<div class="span3">Category Info</div>
								<div class="span9"><?php echo form_input($category_info);?></div>
							</div>
							<div class="row-form">
								<div class="span3">Image Link</div>
								<div class="span9"><?php echo form_input($imgurl1);?></div>
							</div>
							

							<br></div></br>

						  	<p align="right"><?php echo form_reset('reset', 'Reset'); echo '        |       '; echo form_submit('submit', 'Submit');?></p>

						<?php echo form_close();?>

						
						</div>
                    </div>
					
                	<div class="span2"></div>
				
				</div>

				<div class="row-fluid">
                    <br></br><br></br><br></br><br></br><br></br>

                </div>

            </div>
  