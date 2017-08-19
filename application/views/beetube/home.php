            <!-- layerslider -->
            <section id="slider">
                <div id="full-slider-wrapper">
                    <div id="layerslider" style="width:100%;height:500px;">
                        <?php foreach ($front_slider as $value): ?>
                        <div class="ls-slide" data-ls="transition2d:1;timeshift:-1000;">
                            <img src="<?php echo base_url() . 'assets/uploads/edutech/' . $value['imagelink_lg']; ?>" class="ls-bg" alt="Slide background"/>
                            <?php if(!empty($value['header1'])){?><h3 class="ls-l" style="left:50px; top:135px; padding: 15px; color: #444444;font-size: 24px;font-family: 'Open Sans'; font-weight: bold; text-transform: uppercase;" data-ls="offsetxin:0;durationin:2500;delayin:500;durationout:750;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotateout:-90;transformoriginout:left bottom 0;"><?php echo $value['header1']; ?></h3><?php }?>
                            <?php if(!empty($value['header2'])){?><h1 class="ls-l" style="left: 63px; top:185px;background: #e96969;padding:0 10px; opacity: 1; color: #ffffff; font-size: 36px; font-family: 'Open Sans'; text-transform: uppercase; font-weight: bold;" data-ls="offsetxin:left;durationin:3000; delayin:800;durationout:850;rotatexin:90;rotatexout:-90;"><?php echo $value['header2']; ?></h1><?php }?>
                            <?php if(!empty($value['header3'])){?><p class="ls-l" style="font-weight:600;left:62px; top:250px; opacity: 1;width: 450px; color: #444; font-size: 14px; font-family: 'Open Sans';" data-ls="offsetyin:top;durationin:4000;rotateyin:90;rotateyout:-90;durationout:1050;"><?php echo $value['header3']; ?></p><?php }?>
                            <?php if(!empty($value['button_text'])){?><a href="<?php echo $value['button_href']; ?>" class="ls-l button" style="border-radius:4px;text-align:center;left:63px; top:315px;background: #444;color: #ffffff;font-family: 'Open Sans';font-size: 14px;display: inline-block; text-transform: uppercase; font-weight: bold;" data-ls="durationout:850;offsetxin:90;offsetxout:-90;duration:4200;fadein:true;fadeout:true;"><?php echo $value['button_text']; ?></a><?php }?>
                            <?php if(!empty($value['imagelink_sm_1'])){?><img class="ls-l" src="<?php echo base_url() . 'assets/uploads/edutech/' . $value['imagelink_sm_1']; ?>" alt="layer 1" style="top:55px; left:700px;" data-ls="offsetxin:right;durationin:3000; delayin:600;durationout:850;rotatexin:-90;rotatexout:90;"><?php }?>
                            <img class="ls-l ls-linkto-2" style="top:400px;left:50%;white-space: nowrap;" data-ls="offsetxin:-50;delayin:1000;rotatein:-40;offsetxout:-50;rotateout:-40;" src="<?php echo base_url(); ?>assets/beetube/images/sliderimages/left.png" alt="">
                            <img class="ls-l ls-linkto-2" style="top:400px;left:52%;white-space: nowrap;" data-ls="offsetxin:50;delayin:1000;offsetxout:50;" src="<?php echo base_url(); ?>assets/beetube/images/sliderimages/right.png" alt="">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section><!--end slider-->
            <!-- Premium Videos -->
            <section id="premium">
                
            </section><!-- End Premium Videos -->
            <!-- Category -->
            <section id="category">
                <div class="row secBg">
                    <div class="large-12 columns">
                        <div class="column row">
                            <div class="heading category-heading clearfix">
                                <div class="cat-head pull-left">
                                    <i class="fa fa-folder-open"></i>
                                    <h4>Categories</h4>
                                </div>
                            <div>
                                <div class="navText pull-right show-for-large">
                                    <a class="prev secondary-button"><i class="fa fa-angle-left"></i></a>
                                    <a class="next secondary-button"><i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- category carousel -->
                        <div id="owl-demo-cat" class="owl-carousel carousel" data-car-length="6" data-items="6" data-loop="true" data-nav="false" data-autoplay="true" data-autoplay-timeout="4000" data-auto-width="true" data-margin="10" data-dots="false">
                            <?php foreach ($edutech_side_category as $value): ?>
                            <div class="item-cat item thumb-border">
                                <figure class="premium-img">
                                    <img src="<?php echo base_url() . 'assets/uploads/edutech/' . $value['imagelink']; ?>" alt="carousel">
                                    <a href="<?php echo base_url() . 'edutech/videos/' . $value['eid']; ?>" class="hover-posts">
                                        <span><i class="fa fa-search"></i></span>
                                    </a>
                                </figure>
                                <h6><a href="<?php echo base_url() . 'edutech/videos/' . $value['eid']; ?>"><?php echo $value['ename']; ?></a></h6>
                            </div>
                            <?php endforeach; ?>
                        </div><!-- end carousel -->
                    </div>
                </div>
            </section><!-- End Category -->
            <!-- main content -->
            <section class="content">
                <!-- newest video -->
                <div class="main-heading">
                    <div class="row secBg padding-14">
                        <div class="medium-8 small-8 columns">
                            <div class="head-title">
                                <i class="fa fa-film"></i>
                                <h4>Featured Videos</h4>
                            </div>
                        </div>
                        <div class="medium-4 small-4 columns">
                            
                        </div>
                    </div>
                </div>
                <div class="row secBg">
                    <div class="large-12 columns">
                        <div class="row column head-text clearfix">
                            <p class="pull-left"><a href="<?php echo base_url() . 'edutech/videos/0'; ?>">All Videos : <span><?php echo $edutech_video_count; ?> Videos posted</span></a></p>
                            <div class="grid-system pull-right show-for-large">
                                <a class="secondary-button current grid-default" href="<?php echo base_url(); ?>assets/beetube/#"><i class="fa fa-th"></i></a>
                                <a class="secondary-button grid-medium" href="<?php echo base_url(); ?>assets/beetube/#"><i class="fa fa-th-large"></i></a>
                                <a class="secondary-button list" href="<?php echo base_url(); ?>assets/beetube/#"><i class="fa fa-th-list"></i></a>
                            </div>
                        </div>
                        <div class="tabs-content">
                            <div class="tab-container tab-content active" data-content="1">
                                <div class="row list-group">
                                    <?php foreach ($featured_videos as $value): ?>
                                    <div class="item large-3 medium-6 columns group-item-grid-default end">
                                        <div class="post thumb-border">
                                            <div class="post-thumb">
                                                <img src="<?php echo base_url() . 'assets/uploads/edutech/' . $value['thumblink']; ?>" alt="new video">
                                                <a href="<?php echo base_url() . 'edutech/details/' . $value['id']; ?>" class="hover-posts">
                                                    <span><i class="fa fa-play"></i>Watch Video</span>
                                                </a>
                                            </div>
                                            <div class="post-des">
                                                <h6><a href="<?php echo base_url() . 'edutech/details/' . $value['id']; ?>"><?php echo $value['name']; ?></a></h6>
                                                <div class="post-stats clearfix">
                                                    <p class="pull-left">
                                                        <i class="fa fa-clock-o"></i>
                                                        <span><?php echo $value['updatetime']; ?></span>
                                                    </p>
                                                    <p class="pull-left">
                                                        <i class="fa fa-eye"></i>
                                                        <span><?php echo $value['viewcount']; ?></span>
                                                    </p>
                                                </div>
                                                <div class="post-summary">
                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                                </div>
                                                <div class="post-button">
                                                    <a href="<?php echo base_url(); ?>assets/beetube/single-video-v2.html" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="tab-container tab-content" data-content="2">
                                <div class="row list-group">
                                    <div class="item large-3 medium-6 columns group-item-grid-default">
                                        <div class="post thumb-border">
                                            <div class="post-thumb">
                                                <img src="<?php echo base_url(); ?>assets/beetube/images/video-thumbnail/1.jpg" alt="new video">
                                                <a href="<?php echo base_url(); ?>assets/beetube/single-video-v2.html" class="hover-posts">
                                                    <span><i class="fa fa-play"></i>Watch Video</span>
                                                </a>
                                                <div class="video-stats clearfix">
                                                    <div class="thumb-stats pull-left">
                                                        <h6>HD</h6>
                                                    </div>
                                                    <div class="thumb-stats pull-left">
                                                        <i class="fa fa-heart"></i>
                                                        <span>506</span>
                                                    </div>
                                                    <div class="thumb-stats pull-right">
                                                        <span>05:56</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-des">
                                                <h6><a href="<?php echo base_url(); ?>assets/beetube/single-video-v2.html">There are many variations of passage.</a></h6>
                                                <div class="post-stats clearfix">
                                                    <p class="pull-left">
                                                        <i class="fa fa-user"></i>
                                                        <span><a href="<?php echo base_url(); ?>assets/beetube/#">admin</a></span>
                                                    </p>
                                                    <p class="pull-left">
                                                        <i class="fa fa-clock-o"></i>
                                                        <span>5 January 16</span>
                                                    </p>
                                                    <p class="pull-left">
                                                        <i class="fa fa-eye"></i>
                                                        <span>1,862K</span>
                                                    </p>
                                                </div>
                                                <div class="post-summary">
                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                                </div>
                                                <div class="post-button">
                                                    <a href="<?php echo base_url(); ?>assets/beetube/single-video-v2.html" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item large-3 medium-6 columns group-item-grid-default">
                                        <div class="post thumb-border">
                                            <div class="post-thumb">
                                                <img src="<?php echo base_url(); ?>assets/beetube/images/video-thumbnail/2.jpg" alt="new video">
                                                <a href="<?php echo base_url(); ?>assets/beetube/single-video-v2.html" class="hover-posts">
                                                    <span><i class="fa fa-play"></i>Watch Video</span>
                                                </a>
                                                <div class="video-stats clearfix">
                                                    <div class="thumb-stats pull-left">
                                                        <h6>HD</h6>
                                                    </div>
                                                    <div class="thumb-stats pull-left">
                                                        <i class="fa fa-heart"></i>
                                                        <span>506</span>
                                                    </div>
                                                    <div class="thumb-stats pull-right">
                                                        <span>05:56</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-des">
                                                <h6><a href="<?php echo base_url(); ?>assets/beetube/single-video-v2.html">There are many variations of passage.</a></h6>
                                                <div class="post-stats clearfix">
                                                    <p class="pull-left">
                                                        <i class="fa fa-user"></i>
                                                        <span><a href="<?php echo base_url(); ?>assets/beetube/#">admin</a></span>
                                                    </p>
                                                    <p class="pull-left">
                                                        <i class="fa fa-clock-o"></i>
                                                        <span>5 January 16</span>
                                                    </p>
                                                    <p class="pull-left">
                                                        <i class="fa fa-eye"></i>
                                                        <span>1,862K</span>
                                                    </p>
                                                </div>
                                                <div class="post-summary">
                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                                </div>
                                                <div class="post-button">
                                                    <a href="<?php echo base_url(); ?>assets/beetube/single-video-v2.html" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item large-3 medium-6 columns group-item-grid-default">
                                        <div class="post thumb-border">
                                            <div class="post-thumb">
                                                <img src="<?php echo base_url(); ?>assets/beetube/images/video-thumbnail/4.jpg" alt="new video">
                                                <a href="<?php echo base_url(); ?>assets/beetube/single-video-v2.html" class="hover-posts">
                                                    <span><i class="fa fa-play"></i>Watch Video</span>
                                                </a>
                                                <div class="video-stats clearfix">
                                                    <div class="thumb-stats pull-left">
                                                        <h6>HD</h6>
                                                    </div>
                                                    <div class="thumb-stats pull-left">
                                                        <i class="fa fa-heart"></i>
                                                        <span>506</span>
                                                    </div>
                                                    <div class="thumb-stats pull-right">
                                                        <span>05:56</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-des">
                                                <h6><a href="<?php echo base_url(); ?>assets/beetube/single-video-v2.html">There are many variations of passage.</a></h6>
                                                <div class="post-stats clearfix">
                                                    <p class="pull-left">
                                                        <i class="fa fa-user"></i>
                                                        <span><a href="<?php echo base_url(); ?>assets/beetube/#">admin</a></span>
                                                    </p>
                                                    <p class="pull-left">
                                                        <i class="fa fa-clock-o"></i>
                                                        <span>5 January 16</span>
                                                    </p>
                                                    <p class="pull-left">
                                                        <i class="fa fa-eye"></i>
                                                        <span>1,862K</span>
                                                    </p>
                                                </div>
                                                <div class="post-summary">
                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                                </div>
                                                <div class="post-button">
                                                    <a href="<?php echo base_url(); ?>assets/beetube/single-video-v2.html" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item large-3 medium-6 columns group-item-grid-default">
                                        <div class="post thumb-border">
                                            <div class="post-thumb">
                                                <img src="<?php echo base_url(); ?>assets/beetube/images/video-thumbnail/6.jpg" alt="new video">
                                                <a href="<?php echo base_url(); ?>assets/beetube/single-video-v2.html" class="hover-posts">
                                                    <span><i class="fa fa-play"></i>Watch Video</span>
                                                </a>
                                                <div class="video-stats clearfix">
                                                    <div class="thumb-stats pull-left">
                                                        <h6>HD</h6>
                                                    </div>
                                                    <div class="thumb-stats pull-left">
                                                        <i class="fa fa-heart"></i>
                                                        <span>506</span>
                                                    </div>
                                                    <div class="thumb-stats pull-right">
                                                        <span>05:56</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-des">
                                                <h6><a href="<?php echo base_url(); ?>assets/beetube/single-video-v2.html">There are many variations of passage.</a></h6>
                                                <div class="post-stats clearfix">
                                                    <p class="pull-left">
                                                        <i class="fa fa-user"></i>
                                                        <span><a href="<?php echo base_url(); ?>assets/beetube/#">admin</a></span>
                                                    </p>
                                                    <p class="pull-left">
                                                        <i class="fa fa-clock-o"></i>
                                                        <span>5 January 16</span>
                                                    </p>
                                                    <p class="pull-left">
                                                        <i class="fa fa-eye"></i>
                                                        <span>1,862K</span>
                                                    </p>
                                                </div>
                                                <div class="post-summary">
                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                                </div>
                                                <div class="post-button">
                                                    <a href="<?php echo base_url(); ?>assets/beetube/single-video-v2.html" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item large-3 medium-6 columns group-item-grid-default end">
                                        <div class="post thumb-border">
                                            <div class="post-thumb">
                                                <img src="<?php echo base_url(); ?>assets/beetube/images/video-thumbnail/8.jpg" alt="new video">
                                                <a href="<?php echo base_url(); ?>assets/beetube/single-video-v2.html" class="hover-posts">
                                                    <span><i class="fa fa-play"></i>Watch Video</span>
                                                </a>
                                                <div class="video-stats clearfix">
                                                    <div class="thumb-stats pull-left">
                                                        <h6>HD</h6>
                                                    </div>
                                                    <div class="thumb-stats pull-left">
                                                        <i class="fa fa-heart"></i>
                                                        <span>506</span>
                                                    </div>
                                                    <div class="thumb-stats pull-right">
                                                        <span>05:56</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-des">
                                                <h6><a href="<?php echo base_url(); ?>assets/beetube/single-video-v2.html">There are many variations of passage.</a></h6>
                                                <div class="post-stats clearfix">
                                                    <p class="pull-left">
                                                        <i class="fa fa-user"></i>
                                                        <span><a href="<?php echo base_url(); ?>assets/beetube/#">admin</a></span>
                                                    </p>
                                                    <p class="pull-left">
                                                        <i class="fa fa-clock-o"></i>
                                                        <span>5 January 16</span>
                                                    </p>
                                                    <p class="pull-left">
                                                        <i class="fa fa-eye"></i>
                                                        <span>1,862K</span>
                                                    </p>
                                                </div>
                                                <div class="post-summary">
                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                                </div>
                                                <div class="post-button">
                                                    <a href="<?php echo base_url(); ?>assets/beetube/single-video-v2.html" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center row-btn">
                            
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- movies -->
            <!-- End movie -->
            <!--div class="googleAdv text-center">
                <a href="<?php echo base_url(); ?>assets/beetube/#"><img src="<?php echo base_url(); ?>assets/beetube/images/goodleadv.png" alt="googel ads"></a>
            </div><!-- End ad Section -->
            