<link href="<?php echo base_url(); ?>assets/tfl1/js/magnific-popup/mpopup.css" rel="stylesheet"/> 
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/tfl1/css/jquery-ui.css">
<link href="<?php echo base_url(); ?>assets/tfl1/js/flexslider/flexslider.css" rel="stylesheet" />

<!-- Page-head -->
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Product Details</h3>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb">
                    <li>You are here:</li>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Products</a></li>
                    <li class="active">Details</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Page-head -->

<div class="space60"></div>

<div class="container shop-content">
	<div class="row">

		<div class="col-md-6">
			
						<div id="thumb-slider" class="flexslider singimg1">
							<ul class="slides">
								<?php if(!empty($singleproduct['product']['imageurl1'])){ ?><li data-thumb="<?php echo base_url() . 'assets/uploads/files/' . $singleproduct['product']['imageurl1']; ?>"><img src="<?php echo base_url() . 'assets/uploads/files/' . $singleproduct['product']['imageurl1']; ?>" alt=""/></li> <?php }?>
								<?php if(!empty($singleproduct['product']['imageurl2'])){ ?><li data-thumb="<?php echo base_url() . 'assets/uploads/files/' . $singleproduct['product']['imageurl2']; ?>"><img src="<?php echo base_url() . 'assets/uploads/files/' . $singleproduct['product']['imageurl2']; ?>" alt=""/></li> <?php }?>
								<?php if(!empty($singleproduct['product']['imageurl3'])){ ?><li data-thumb="<?php echo base_url() . 'assets/uploads/files/' . $singleproduct['product']['imageurl3']; ?>"><img src="<?php echo base_url() . 'assets/uploads/files/' . $singleproduct['product']['imageurl3']; ?>" alt=""/></li> <?php }?>
								<?php if(!empty($singleproduct['product']['imageurl4'])){ ?><li data-thumb="<?php echo base_url() . 'assets/uploads/files/' . $singleproduct['product']['imageurl4']; ?>"><img src="<?php echo base_url() . 'assets/uploads/files/' . $singleproduct['product']['imageurl4']; ?>" alt=""/></li> <?php }?>
							</ul>
						</div>

			
		</div>

		<div class="col-md-6">
	
			<div class="product_details">
				<div class="product_title"><?php echo $singleproduct['product']['name']; ?></div>
				<div class="product_price"><h4><?php echo anchor('products/category/'.$singleproduct['product']['categoryurl'], $singleproduct['product']['categoryname'].' '); ?></h4></div>
				<div class="line-sep"></div>

				<?php echo $singleproduct['product']['details']; ?>

				<p Style="margin-bottom: 0px;"><strong> Key Features: </strong></p>
					<?php if (!empty($singleproduct['product']['keyfeatures'])) { $features = explode("|", $singleproduct['product']['keyfeatures']);?>
					<ul class="product-meta" Style="margin-top: 0px;">
					<?php foreach($features as $value): ?>
						<li><?php echo $value; ?></li>
					<?php endforeach; ?>
					</ul>
					<?php } ?>

				<ul class="product-meta">
					<li><b>SKU: </b><?php echo $singleproduct['product']['code']; ?></li>
					<li><b>Tags: </b><a href="<?php echo base_url() . 'products/tag/' . $singleproduct['product']['tags']; ?>"><?php echo $singleproduct['product']['tags']; ?></a>.</li>
				</ul>

				

			</div>


		</div>

	</div>

	<div class="space30"></div>

	<div class="row">
		<div class="col-md-12 no-padding">
	            <div class="col-md-12 no-padding">
	                <h2 class="section-title"><span>Extended Details</span></h2>
	            </div>
	            <div class="col-md-12 no-padding">
	                <ul id="myTab" class="nav nav-tabs">
	                    <li class="active"><a href="#tab1" data-toggle="tab">Description</a></li>
	                    <li class=""><a href="#tab2" data-toggle="tab">Specification</a></li>
	                    <!--li class=""><a href="#tab3" data-toggle="tab">Reviews</a></li-->
	                </ul>
	                <div id="myTabContent" class="tab-content">
	                    <div class="tab-pane fade active in clearfix media .sindesprod" id="tab1">
						    <?php echo $singleproduct['product']['description']; ?>
	                    </div>
	                    <div class="tab-pane fade clearfix media .sindesprod" id="tab2">
							<?php echo $singleproduct['product']['specification']; ?>
	                    </div>
	                    <!--div class="tab-pane fade clearfix media .sindesprod" id="tab3">
							<?php echo $singleproduct['product']['review']; ?>
	                    </div-->
	                </div>
	            </div>
	    
	    </div>
	</div>
</div>

<div class="space60"></div>



</div>
</div>
