<?php //var_dump($products1); ?>
<?php// var_dump($products['1']['categories']['subcategory'] ); ?>
<link href="<?php echo base_url(); ?>assets/tfl1/js/rs-plugin/css/settings.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/tfl1/js/flexslider/flexslider.css" rel="stylesheet">
<link rel="Stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/tfl1/css/jquery_ui.css" /> 
<link rel="Stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/tfl1/css/superTabs.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/tfl1/css/isotope.css">
<style> .zoom-info { width: 107px; height:68px}.zoom-info a {margin:2px 4px;}</style>

<!-- Page-head -->
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Our Products</h3>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb">
                    <li>You are here:</li>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Products</a></li>
                    <li class="active">All</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Page-head -->
<div class="space80"></div>
<!-- Portfolio content -->
<div class="container">
    <div class="row">
        <div class="col-md-4 sidebar">
            <div class="side-widget">
                <h5><span><?php echo (!empty($category_intro)) ? anchor('products/test/'.$category_intro['parentid'], $category_intro['cname'] . ' - Up') : 'Top Category'; ?> </span></h5>
                <ul class="category">
                        
                        <?php if (!empty($new_category)) { ?>
                        <?php foreach ($new_category as $print): ?>
                            <div class='<?php if($cid==$print["id"]){ echo "active";} ?>'>
                                <li><a href="<?php echo base_url() . 'products/test/' . $print['id']; ?>"><?php echo $print['name']; ?></a></li>
                            </div>
                        <?php endforeach; ?>
                        <?php } else { ?>
                        <div class=''>
                                <p>No Sub Category Founds</p>
                        </div>
                        <?php } ?>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="space60"></div>
            <div class="side-widget">
                <h5><span>Testimonials</span></h5>
                <div id="quoteslider">
                    <div class="quote-wrap">
                        <h6>This is a theme for me</h6>
                        <p>Lorem ipsum dolor slo onsec  designs tueraliquet Morbi nec In Curabitur lreaoreet nisl lorem ipsum dolor slo onsec designs Morbi </p>
                        <div class="quote-author">
                            <div class="quote-author-img">
                                <img src="http://placehold.it/154x154" alt=""/>
                            </div>
                            <h5>Robert Smith <span class="dblock">Manager</span></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="space20"></div>
            <div class="side-widget">
                <h5><span>What we do</span></h5>
                <div class="akordeon">
                    <div class="akordeon-item">
                        <div class="akordeon-item-head first">
                            <div class="akordeon-item-head-container">
                                <div class="akordeon-heading">Many Features and Goodies</div>
                            </div>
                        </div>
                        <div class="akordeon-item-body">
                            <div class="akordeon-item-content">
                                <p>Lorem ipsum dolor slo onsec  tueraliquet Morbi nec In Curabitur lreaoreet nisl lorem in pellente e vidicus pannel . Lorem ipsum dolor slo onsec  tueraliquet Morbi nec In Curabitur lreaoreet nisl lorem in pellente nel lvidicus pannel</p>
                            </div>
                        </div>
                    </div>
                    <div class="akordeon-item">
                        <div class="akordeon-item-head">
                            <div class="akordeon-item-head-container">
                                <div class="akordeon-heading">Responsive Design</div>
                            </div>
                        </div>
                        <div class="akordeon-item-body">
                            <div class="akordeon-item-content">
                                <p>Lorem ipsum dolor slo onsec  tueraliquet Morbi nec In Curabitur lreaoreet nisl lorem in pellente e vidicus pannel . Lorem ipsum dolor slo onsec  tueraliquet Morbi nec In Curabitur lreaoreet nisl lorem in pellente nel lvidicus pannel</p>
                            </div>
                        </div>
                    </div>
                    <div class="akordeon-item">
                        <div class="akordeon-item-head">
                            <div class="akordeon-item-head-container">
                                <div class="akordeon-heading">Great Help and Support</div>
                            </div>
                        </div>
                        <div class="akordeon-item-body">
                            <div class="akordeon-item-content">
                                <p>Lorem ipsum dolor slo onsec  tueraliquet Morbi nec In Curabitur lreaoreet nisl lorem in pellente e vidicus pannel . Lorem ipsum dolor slo onsec  tueraliquet Morbi nec In Curabitur lreaoreet nisl lorem in pellente nel lvidicus pannel</p>
                            </div>
                        </div>
                    </div>
                    <div class="akordeon-item">
                        <div class="akordeon-item-head">
                            <div class="akordeon-item-head-container">
                                <div class="akordeon-heading">Lorem Ipsum Delikus Inirivus</div>
                            </div>
                        </div>
                        <div class="akordeon-item-body">
                            <div class="akordeon-item-content">
                                <p>Lorem ipsum dolor slo onsec  tueraliquet Morbi nec In Curabitur lreaoreet nisl lorem in pellente e vidicus pannel . Lorem ipsum dolor slo onsec  tueraliquet Morbi nec In Curabitur lreaoreet nisl lorem in pellente nel lvidicus pannel</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="space60"></div>
            <div class="side-widget">
                <h5><span>Blockquote</span></h5>
                <blockquote>
                    Sadintas velisur .Gorem ipsum dolor onsec nel tueraliquet  pannel impirus sadintas velisur moriaty novels. Vorem ipsum dolor slo onsec nel decidus tempus pastel novembus.
                </blockquote>
                <cite>John doe <span>Manager</span></cite>
            </div>
        </div>
        <div class="col-md-8">
            <?php if (!empty($category_intro)){?>
            <article class="post col-md-12">
              <?php if(!empty($message)){?>
                <div class="error-wrap">
                    <h4><span>*</span>Ooops!!!</h4>
                    <div class="space10"></div>
                    <p><?php echo  $message; ?></p>
                    </div>
                </div>
              <?php } ?>
              <div class="post-thumb">
                  <div id="post-slider" class="flexslider">
                      <ul class="slides">
                          <li><img src="<?php echo base_url() . $category_intro['imageurl1']; ?>" alt=""/></li>
                      </ul>
                  </div> 
                  <div class="shadow-left-big"></div>
              </div>

              <div class="post-info">
                  <h3><a href=""><?php echo $category_intro['cname']; ?></a></h3>
                  <p><?php echo $category_intro['cinfo']; ?></p>
              </div>

              <div class="post-meta">
                  <div class="meta-right">
                  <div class="meta-info">
                      <span><b>Parent: <a href="#"><?php //echo $parent; ?></a></b></span>
                  </div>
                  <div class="post-more">
                      
                  </div>
                  </div>
              </div>
            </article>
            <?php } ?>
            <div class="col-md-12 no-padding">
                <h2 class="section-title"><span>Products</span></h2>
            </div>
            
            <div id="portfolio">
                <div class="col-md-12 no-padding">
                    <!-- Start Filter 
                    <ul class="folio-filter xtra" data-option-key="filter" Style="visibility: hidden;">
                        <li><a class="selected" href="#filter" data-option-value="*"><span><i class="fa fa-th-large"></i></span>View all</a></li>
                        <li><a href="#filter" data-option-value=".web"><span><i class="fa fa-laptop"></i></span>Web</a></li>
                        <li><a href="#filter" data-option-value=".photos"><span><i class="fa fa-camera-retro"></i></span>Photos</a></li>
                        <li><a href="#filter" data-option-value=".design"><span><i class="fa fa-pencil-square-o"></i></span>Design</a></li>
                        <li><a href="#filter" data-option-value=".videos"><span><i class="fa fa-video-camera"></i></span>Video</a></li>
                    </ul>
                    <!-- End Filter -->
                </div>
                <div class="portfolio-inner nport pwside">
                    <div id="folio" class="isotope col-md-12 no-padding">
                        <?php foreach ($products1 as $print): ?>
                        <div class="folio-item col-md-4 no-padding isotope-item web">
                            <div class="item works-content">
                                <div class="works-overlay">
                                    <img class="img-responsive" src="<?php echo base_url() . $print['imageurl1']; ?>" alt=""/>
                                    <div>
                                        <div class="shadow-left"></div>
                                            <div class="zoom">
                                                <div class="zoom-info">
                                                    <br></br><br></br>
                                                    <?php echo anchor('products/details/'.$print['id'], 'View More'.' '); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4><?php echo anchor('products/details/'.$print['id'], $print['name'].' '); ?><!-- <span><?php foreach ($print['categories'] as $category){ echo anchor('products/category/'.$category['categoryid'], $category['categoryname'].' '); }; ?></span>--></h4>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
            </div>
  
     <div class="space20"></div>
        <ul class="pagination pull-left">
            <li><a href="#">Prev</a></li>
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li class="active"><a href="#">Next</a></li>
        </ul>
     <div class="space50"></div>
        </div>
        
        <!-- Sidebar -->
        
    </div>
</div>
<!-- Portfolio content -->

<div class="space60"></div>