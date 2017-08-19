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


<div class="container">
    <div class="row">
        <div class="col-md-8 no-padding">
            <article class="post col-md-12">
                <div class="content-img">
                    <img src="<?php echo base_url() . 'assets/uploads/files/' . $blog_post_single['imagelink']; ?>" class="img-responsive"  alt=""/>
                    <div class="shadow-left-big"></div>
                </div>
                <div class="post-info">
                    <h1 style="color: #0070b8;"><?php echo $blog_post_single['full_name'] ?></h1>
                    <?php echo $blog_post_single['description'] ?>
                </div>
            </article>
        </div>

        <div class="col-md-4 sidebar">
            <!--div class="side-widget">
                <h5><span>Services</span></h5>
                <ul class="category vertical menu" data-accordion-menu> 
                    <?php foreach($blog_menu_item as $print):?>                
                        <li><a href="<?php echo base_url() . 'blogs/detail/' . $print['url']; ?>"><?php echo $print['full_name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div-->

            <?php $this->view('oliver/blogs_sidemenu_cat'); ?>

            <div class="clear"></div>
            <div class="space60"></div>

            <div class="side-widget">
                <h5><span>Related Products</span></h5>
                <ul class="popular-products">
                    <?php foreach ($blog_related_products as $fvalue): ?>
                    <li>
                        <div class="product-thumbs">
                            <img src="<?php echo base_url() . 'assets/uploads/files/' . $fvalue['imageurl1']; ?>" alt=""/>
                        </div>

                        <div class="product-post-info">
                            <h5 style="background: none;"><a href="<?php echo base_url() . 'products/details/' . $fvalue['url']; ?>"><?php echo substr($fvalue['name'], 0, 25); ?> ...</a></h5>
                            <p>Category: <?php echo anchor('products/category/'.$fvalue['categories']['cid'], $fvalue['categories']['cname'] .' '); ?></p>
                        </div>
                    </li> 
                    <?php endforeach; ?>                   
                </ul>
            </div>

        </div>
    </div>
</div>
