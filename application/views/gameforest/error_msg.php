<!-- wrapper -->
	<div id="wrapper">	
		<section class="bg-primary">
			<div class="container">
				<h3 class="color-white font-weight-300">Error</h3>
			</div>
		</section>
		<section class="border-bottom-1 border-grey-300 padding-top-10 padding-bottom-10">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo base_url()?>games/all">Game Shop</a></li>
							<li><a href="#">Error</a></li>
						</ol>	
					</div>
				</div>
			</div>
		</section>

		
		
		<section class="bg-grey-50 padding-top-60 padding-top-sm-30">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-4 hidden-xs">

						<?php $this->view('gameforest/menu_helpline'); ?>
						
					</div>
					
					<div class="col-md-9 col-sm-8">
						
					<div class="panel panel-default">
							<div class="panel-body">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<br><br>
									<div class="panel panel-danger">
										<div class="panel-heading">
											<h3 class="panel-title">Error Details</h3>
										</div>
										<div class="panel-body">
											<h4 Style="background-color: #E74C3C; text-align: center; line-height: 3.0em;"><?php echo '<span Style="color: #ffffff !important;">' . $message . '</span>';?></span></h4>
										</div>
									</div>
									<br><br><br>
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