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
            <?php foreach($blogpost as $value):?>
            <article class="post col-md-12">
                <div class="post-thumb">
                    <img src="<?php echo base_url() . 'assets/uploads/files/' . $value['imagelink']; ?>" class="img-responsive"  alt=""/>
                    <div class="shadow-left-big"></div>
                </div>

                <div class="post-info">
                    <h4><a href="<?php echo base_url() . 'blogs/detail/' . $value['url'] ?>"><?php echo $value['full_name'] ?></a></h4>
                    <p><?php echo $value['summary'] ?></p>
                </div>

                <div class="post-meta">
                    
                    <div class="meta-right">
                        <div class="meta-info">
                            <span>Products Category&nbsp;:&nbsp;&nbsp;<a href="<?php echo base_url() . 'products/query/' . $value['tagsname'] ?>"><?php echo $value['tagstitle'] ?></a></span>
                        </div>
                        <div class="post-more">
                                <a href="<?php echo base_url() . 'blogs/detail/' . $value['url'] ?>">View More &rarr;</a>
                        </div>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
        </div>

        <div class="col-md-4 sidebar">
            
            <?php $this->view('oliver/blogs_sidemenu_cat'); ?>

            <div class="clear"></div>
            <div class="space60"></div>

            <div class="side-widget">
                <h5><span>Related Products</span></h5>
                <ul class="popular-products">
                    <?php foreach ($featured_products as $fvalue): ?>
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
