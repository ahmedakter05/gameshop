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
            <div class="col-md-12 no-padding">
                <h2 class="section-title" style="font-weight: 700; font-size: 1.50em;"><span><?php echo $servicetitle['title'];?></span></h2>
            </div>
            <?php foreach ($serviceinfo as $info): ?>
                <div class="col-md-12 no-padding clearfix media ">
                    <img class="pull-left" width="200px" src="<?php echo base_url() . 'assets/uploads/files/' . $info['imagelink']; ?>" alt=""/>
                    <h5 Style="margin-top: 0px; margin-bottom: 5px;"><?php echo $info['title'];?></h5>
                    <?php echo $info['description'];?>
                </div>
                <div class="space30"></div>
            <?php endforeach; ?>  
        </div>

        <div class="col-md-4 sidebar">
        	<div class="side-widget">
                <h5><span>Services</span></h5>
                <ul class="category vertical menu" data-accordion-menu>                        
                	<div class="<?php if($servicetitle['id'] == '1'){echo 'active cusact1';} ?>"><li><a href="<?php echo base_url() . 'services/page/1'; ?>">Solution</a></li></div>
                	<div class="<?php if($servicetitle['id'] == '2'){echo 'active cusact1';} ?>"><li><a href="<?php echo base_url() . 'services/page/2'; ?>">Installation</a></li></div>
                	<div class="<?php if($servicetitle['id'] == '3'){echo 'active cusact1';} ?>"><li><a href="<?php echo base_url() . 'services/page/3'; ?>">Maintenance</a></li></div>
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
            
        </div>
    </div>
</div>
<!-- Blogpost -->