<?php //var_dump($sub_category); ?>
<?php //var_dump($featured_products); ?>
<link href="<?php echo base_url(); ?>assets/tfl1/js/rs-plugin/css/settings.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/tfl1/js/flexslider/flexslider.css" rel="stylesheet">
<link rel="Stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/tfl1/css/jquery_ui.css" /> 
<link rel="Stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/tfl1/css/superTabs.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/tfl1/css/isotope.css">
<!--[if lt IE 9]>
<script src="js/libs/html5.js"></script>
<![endif]-->
<script src="<?php echo base_url(); ?>assets/foundation/js/jquery.min.js"></script>
<!-- this will include every plugin and utility required by Foundation -->
<script src="<?php echo base_url(); ?>assets/foundation/js/foundation.min.js"></script>
<style>.cta-box:before {border:none;}</style>

<!-- Blogpost -->
<div class="container">
    <div class="row">
        <div class="col-md-8 no-padding">
        	<?php foreach ($serviceinfo as $info): ?>
	            <article class="post col-md-12 pstyle2">
	                <div class="col-md-12 no-padding">
	                    <div class="row">
	                        <div class="col-md-6">
	                            <div Style="margin-bottom: 10px;">
	                                <img src="<?php echo base_url() . 'assets/uploads/files/' . $info['imagelink']; ?>" class="img-responsive"  alt=""/>
	                                
	                            </div>
	                        </div>
	                        <div class="col-md-6">
	                            <div class="post-info">
	                                <h4><a href="<?php echo base_url() . 'services/page/' . $info['id'];?>"><?php echo $info['title'];?></a></h4>
	                                <?php echo $info['description'];?>
	                            </div>
	                        </div>
	                        <div class="col-md-12 no-padding">
			                    <div class="post-meta">
			                        
			                        <div class="meta-right">
			                            <div class="post-more">
			                                <a href="<?php echo base_url() . 'services/page/' . $info['id'];?>">Read More &rarr;</a>
			                            </div>
			                        </div>
			                    </div>
			                </div>
	                    </div>
	                </div>
	            </article>
            <?php endforeach; ?>  
        </div>
        <div class="col-md-4 sidebar">
        	<div class="side-widget">
                <h5><span>Services</span></h5>
                <ul class="category vertical menu" data-accordion-menu>                        
                	<li><a href="<?php echo base_url() . 'services/page/1'; ?>">Solution</a></li>
                	<li><a href="<?php echo base_url() . 'services/page/2'; ?>">Installation</a></li>
                	<li><a href="<?php echo base_url() . 'services/page/3'; ?>">Maintenance</a></li>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="space60"></div>
            <div class="side-widget">
                <h5><span>Featured Products</span></h5>
                <ul class="popular-products">
                    <?php foreach ($featured_products as $fvalue): ?>
                    <li>
                        <div class="product-thumbs">
                            <img src="<?php echo base_url() . 'assets/uploads/files/' . $fvalue['imageurl1']; ?>" alt=""/>
                        </div>

                        <div class="product-post-info">
                            <h5 style="background: none;"><a href="<?php echo base_url() . 'products/details/' . $fvalue['url']; ?>"><?php echo substr($fvalue['name'], 0, 25); ?> ...</a></h5>
                            <p>Category: <?php echo anchor('products/category/'.$fvalue['categories']['curl'], $fvalue['categories']['cname'] .' '); ?></p>
                        </div>
                    </li> 
                    <?php endforeach; ?>                   
                </ul>
            </div>
            <div class="clear"></div>
            <div class="space60"></div>

            <div class="side-widget">
				<h5><span><?php echo $serviceothers['0']['title']; ?></span></h5>

				<div id="featured-shop" class="flexslider">
					<ul class="slides">
						<li>
							<div class="fproduct-info">
								<img src="<?php echo base_url() . 'assets/uploads/files/' . $serviceothers['0']['imagelink1']; ?>" alt=""/>

								<div class="fproduct-info-inner">
									<p></p>
								</div>
							</div>
						</li>
						<li>
							<div class="fproduct-info">
								<img src="<?php echo base_url() . 'assets/uploads/files/' . $serviceothers['0']['imagelink2']; ?>" alt=""/>

								<div class="fproduct-info-inner">
									<p></p>
								</div>
							</div>
						</li>
						<li>
							<div class="fproduct-info">
								<img src="<?php echo base_url() . 'assets/uploads/files/' . $serviceothers['0']['imagelink3']; ?>" alt=""/>

								<div class="fproduct-info-inner">
									<p></p>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>

            
            
        </div>
    </div>
</div>
<!-- Blogpost -->