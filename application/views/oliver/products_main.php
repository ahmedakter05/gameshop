<?php //var_dump($sub_category); ?>
<?php //var_dump($featured_products); ?>
<link href="<?php echo base_url(); ?>assets/tfl1/js/rs-plugin/css/settings.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/tfl1/js/flexslider/flexslider.css" rel="stylesheet">
<link rel="Stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/tfl1/css/jquery_ui.css" /> 
<link rel="Stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/tfl1/css/superTabs.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/tfl1/css/isotope.css">

<script src="<?php echo base_url(); ?>assets/foundation/js/jquery.min.js"></script>
<!-- this will include every plugin and utility required by Foundation -->
<script src="<?php echo base_url(); ?>assets/foundation/js/foundation.min.js"></script>

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
                <h5><span> Categories: <a href="<?php if(!empty($category_intro['parent']['name'])) { echo base_url() . 'products/category/' .  $category_intro['parentid']; ?>" Style="font-size: 13px;" ><?php echo $category_intro['parent']['name']; } else {echo '#">';}?></a></span></h5>
                <ul class="category vertical menu" data-accordion-menu>                        
                        <?php if (!empty($new_category)) { ?>
                            <?php foreach ($new_category as $print): ?>
                                <div class='<?php if($cid==$print["id"]){ echo "/*active*/cusact1";} ?>'>
                                    <li><a  <?php if($print['id'] == $cid){ echo 'Style="color:#1c9dfb;"';}?> href="<?php echo base_url() . 'products/category/' . $print['url']; ?>"><?php echo $print['name']; ?></a></li>
                                        <?php if ((!empty($print['sub_categories']) && ($print['id'] == $root)) /*|| (!empty($print['sub_categories']) && ($print['parent_id'] == $print['root']))*/){?>
                                        <ul class="sub-category menu vertical nested">
                                            <?php foreach ($print['sub_categories'] as $value): ?>
                                            <li><a <?php if($value['id'] == $cid){ echo 'Style="color:#1c9dfb;"';}?> href="<?php echo base_url() . 'products/category/' . $value['url']; ?>"><?php echo $value['name']; ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <?php } ?>
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
                <h5><span>Featured Products</span></h5>
                <ul class="popular-products">
                    <?php foreach ($featured_products as $fvalue): ?>
                    <li>
                        <div class="product-thumbs">
                            <img src="<?php echo base_url() . 'assets/uploads/files/' . $fvalue['imageurl1']; ?>" alt=""/>
                        </div>

                        <div class="product-post-info">
                            <h5 style="background: none;"><a href="<?php echo base_url() . 'products/details/' . $fvalue['url']; ?>"><?php echo substr($fvalue['name'], 0, 25); ?> ...</a></h5>
                            <p>Category: <?php if(!empty($fvalue['categories']['cname'])){ echo anchor('products/category/'.$fvalue['categories']['curl'], $fvalue['categories']['cname'] .' ');} ?></p>
                        </div>
                    </li> 
                    <?php endforeach; ?>                   
                </ul>
            </div>

            <div class="clear"></div>
            <div class="space60"></div>
        </div>
        <div class="col-md-8">
            <nav id='topnav' class='customnav1'>
                <ul class="top-menu">
                    <?php if(!empty($sub_category) && ($cid >= '11')){ ?>
                    <?php foreach ($sub_category as $value): ?>
                    <li class='customnav1'>
                        <a href='<?php echo base_url() . "products/category/" . $value['url']; ?>'><span><?php echo $value['name']; ?></span></a>
                    </li>
                    <?php endforeach; ?>
                    <?php } else if(!empty($opt_category) && ($cid >= '11') && ($pid >= '11')){ ?>
                    <?php foreach ($opt_category as $value): ?>
                    <li class='<?php if($value['id'] == $cid){echo 'active';}?> customnav1'>
                        <a href='<?php echo base_url() . "products/category/" . $value['url']; ?>'><span><?php echo $value['name']; ?></span></a>
                    </li>
                    <?php endforeach; ?>
                    <?php } ?>
                </ul>
            </nav>
            
            <?php if (!empty($category_intro)){?>
            <article class="post col-md-12" Style="margin-bottom: 10px;">
              <!--<?php if(!empty($message)){?>
                <div class="error-wrap">
                    <h4><span>*</span>Ooops!!!</h4>
                    <div class="space10"></div>
                    <p><?php echo  $message; ?></p>
                    </div>
                </div>
              <?php } ?>-->
              <?php if(!empty($category_intro['imageurl1'])){ ?>
              <div class="post-thumb">
                  <div id="post-slider" class="flexslider">
                      <ul class="slides">
                          <li><img src="<?php echo base_url() . 'assets/uploads/files/' . $category_intro['imageurl1']; ?>" alt=""/></li>
                      </ul>
                  </div> 
                  <div class="shadow-left-big"></div>
              </div>
              <?php } ?>
              <div class="post-info">
                  <h3><a href=""><?php echo $category_intro['cname']; ?></a></h3>
                  <p><?php if(!empty($category_intro['cinfo'])){ echo $category_intro['cinfo'];} ?></p>
              </div>
              <?php if(!empty($category_intro['parent']['name'])) { ?>
              <div class="post-meta">
                  <div class="meta-right">
                  <div class="meta-info">
                      <span><b>Parent: <a href="<?php if(!empty($category_intro['parent']['name'])) { echo base_url() . 'products/category/' .  $category_intro['parentid']; ?>"><?php echo $category_intro['parent']['name']; } else {echo '#">';}?></a></b></span>
                  </div>
                  <div class="post-more">
                      
                  </div>
                  </div>
              </div>
              <?php } ?>
            </article>
            <?php } ?>

            <!--div class="col-md-12 no-padding">
                <h2 class="section-title"><span>Products</span></h2>
            </div-->

            <!--div class="col-lg-12 no-padding">                
                <div class="tab-content">
                    <?php foreach ($products1 as $value): ?>
                    <div class="tab-pane fade active in clearfix media">
                        <div class="col-lg-3"> 
                            <img class="pull-left" src="<?php echo base_url() . 'assets/uploads/files/' . $value['imageurl1']; ?>" width="100%" alt=""/>
                        </div>
                        <div class="col-lg-9"> 
                            <h5 Style="margin-top: 0px !important;"> <?php echo anchor('products/details/'.$value['id'], $value['name'] .' '); ?> </h5>
                            <p><?php $content = $value['details'];
                            //echo "$content";
                            $contentarr=explode(' ', $content); 
                            $i = '1';
                            foreach ($contentarr as $content) {
                                if ($i <= '50'){
                                    echo " " . $content;
                                    $i++;
                                }
                            }
                        //echo '&nbsp;&nbsp;&nbsp;' . anchor('products/details/'.$value['id'], 'View More');
                        ?></p>
                        </div>
                    </div>
                    <br></br>
                    <?php endforeach; ?>
                </div>
            </div>
            </br-->
            <!--div class="col-lg-12 no-padding">                
                <div class="tab-content">
                    <?php foreach ($products1 as $kv){ ?>
                        <?php foreach ($kv as $value): ?>
                        <div class="tab-pane fade active in clearfix media">
                            <img class="pull-left" src="<?php echo base_url() . 'assets/uploads/files/' . $value['imageurl1']; ?>" width="20%" alt=""/>
                            <h5 Style="margin-top: 0px !important;"> <?php echo anchor('products/details/'.$value['id'], $value['name'] .' '); ?> </h5>
                            <p><?php $content = $value['details'];
                            //echo "$content";
                            $contentarr=explode(' ', $content); 
                            $i = '1';
                            foreach ($contentarr as $content) {
                                if ($i <= '50'){
                                    echo " " . $content;
                                    $i++;
                                }
                            }
                            echo '&nbsp;&nbsp;&nbsp;' . anchor('products/details/'.$value['id'], 'View More');
                            
                            ?></p>
                        </div>
                        </br>
                        <?php endforeach; ?>
                    <?php } ?>
                </div>
            </div-->

            <div class="portfolio-inner nport pwside">
                    <div id="folio" class="isotope col-md-12 no-padding">
                        <?php $count = '1'; ?>
                        <?php foreach ($products1 as $print): ?>
                        <div class="folio-item col-md-4 no-padding isotope-item web">
                            <div class="item works-content">
                                <div class="works-overlay">
                                    <a href="<?php echo base_url() . 'products/details/' . $print['url']?>"><img class="img-responsive" src="<?php echo base_url() . 'assets/uploads/files/' . $print['imageurl1']; ?>" alt="<?php echo $print['name']; ?> "/></a>
                                    <div>
                                        <div class="shadow-left"></div>
                                            
                                    </div>
                                </div>
                                <h4><?php echo anchor('products/details/'.$print['url'], substr($print['name'], 0, 35) .' '); ?><!-- <span><?php foreach ($print['categories'] as $category){ echo anchor('products/category/'.$category['categoryid'], $category['categoryname'].' '); }; ?></span>--></h4>
                            </div>
                        </div>
                        <?php if($count>'3'){ ?>
                        <h4></h4>
                        <?php $count='1';} else {$count++;}  ?>
                        <?php endforeach; ?>
                    </div>
                </div>

            
  
     <!--<div class="space20"></div>
        <ul class="pagination pull-left">
            <li><a href="#">Prev</a></li>
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li class="active"><a href="#">Next</a></li>
        </ul>-->
     <div class="space50"></div>
        </div>
        
        <!-- Sidebar -->
        
    </div>
</div>
<!-- Portfolio content -->

<div class="space60"></div>