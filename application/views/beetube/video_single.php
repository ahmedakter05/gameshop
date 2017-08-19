<!--breadcrumbs-->
            <section id="breadcrumb" class="breadMargin">
                <div class="row">
                    <div class="large-12 columns">
                        <nav aria-label="You are here:" role="navigation">
                            <ul class="breadcrumbs">
                                <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>assets/beetube/#">Home</a></li>
                                <li>
                                    <span class="show-for-sr">Current: </span> Videos
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </section><!--end breadcrumbs-->

            <section class="category-content">
                <div class="row">
                    <!-- left side content area -->
                    <div class="large-8 columns">
                        <div class="blog-post">
                            <div class="row secBg">
                                <div class="large-12 columns">
                                    <div class="blog-post-heading">
                                        <h3><a href="#"><?php echo $details['name']; ?> </a></h3>
                                        <p>
                                            <span><i class="fa fa-clock-o"></i><?php echo $details['updatetime']; ?></span>
                                            <span><i class="fa fa-eye"></i><?php echo $details['viewcount']; ?></span>
                                        </p>
                                    </div>
                                    <div class="blog-post-content">
                                        <div class="large-12 columns">
                                            <div class="flex-video widescreen">
                                                <iframe width="420" height="315" src="<?php echo $details['videolink']; ?>" allowfullscreen></iframe>
                                            </div>
                                        </div>

                                        <?php echo $details['description']; ?>
                                        <div class="blog-post-extras">
                                            <div class="categories extras">
                                                <button><i class="fa fa-folder-open"></i>Categories</button>
                                                <a href="<?php echo base_url() . 'edutech/videos/' . $details['eid']; ?>"><?php echo $details['ename']; ?></a>
                                            </div>
                                            
                                            <!--div class="social-share extras">
                                                <div class="post-like-btn clearfix">
                                                    <div class="easy-share" data-easyshare data-easyshare-http data-easyshare-url="http://joinwebs.com/">

                                                        <button class="float-left"><i class="fa fa-share-alt"></i>share</button>
                                                        <!-- Facebook --/>
                                                        <button class="removeBorder" data-easyshare-button="facebook">
                                                            <span class="fa fa-facebook"></span>
                                                        </button>

                                                        <!-- Twitter --/>
                                                        <button class="removeBorder" data-easyshare-button="twitter" data-easyshare-tweet-text="">
                                                            <span class="fa fa-twitter"></span>
                                                        </button>

                                                        <!-- Google+ --/>
                                                        <button class="removeBorder" data-easyshare-button="google">
                                                            <span class="fa fa-google-plus"></span>
                                                        </button>

                                                        <div data-easyshare-loader>Loading...</div>
                                                    </div>
                                                </div>
                                            </div-->
                                        </div>
                                        <!--div class="blog-pagination text-center">
                                            <a href="<?php echo base_url(); ?>assets/beetube/#"><i class="fa fa-long-arrow-left left-arrow"></i>previous post</a>
                                            <a href="<?php echo base_url(); ?>assets/beetube/#">next post<i class="fa fa-long-arrow-right right-arrow"></i></a>
                                        </div-->
                                    </div>
                                </div>
                            </div>
                        </div><!-- end blog post -->
                        
                    </div><!-- end left side content area -->
                    <!-- sidebar -->
                    <div class="large-4 columns">
                        <aside class="secBg sidebar">
                            <div class="row">
                                <!-- categories -->
                                <div class="large-12 medium-7 medium-centered columns">
                                    <div class="widgetBox clearfix">
                                        <div class="widgetTitle">
                                            <h5>Categories</h5>
                                        </div>
                                        <div class="widgetContent clearfix">
                                            <ul>
                                                <?php foreach ($edutech_side_category as $value): ?>
                                                <li class="cat-item"><a href="<?php echo base_url() . 'edutech/videos/' . $value['eid']; ?>"><?php echo $value['ename']; ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- End Categories -->
                                

                                <!-- slide video -->
                                <div class="large-12 medium-7 medium-centered columns">
                                    <section class="widgetBox">
                                        <div class="row">
                                            <div class="large-12 columns">
                                                <div class="column row">
                                                    <div class="heading category-heading clearfix">
                                                        <div class="cat-head pull-left">
                                                            <h4>Featured Videos</h4>
                                                        </div>
                                                        <div class="sidebar-video-nav">
                                                            <div class="navText pull-right">
                                                                <a class="prev secondary-button"><i class="fa fa-angle-left"></i></a>
                                                                <a class="next secondary-button"><i class="fa fa-angle-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- slide Videos-->
                                                <div id="owl-demo-video" class="owl-carousel carousel" data-car-length="1" data-items="1" data-loop="true" data-nav="false" data-autoplay="true" data-autoplay-timeout="3000" data-dots="false">
                                                    <?php foreach ($edutech_slide_videos as $value): ?>
                                                    <div class="item item-video thumb-border">
                                                        <figure class="premium-img">
                                                            <img src="<?php echo base_url() . 'assets/uploads/edutech/' . $value['thumblink']; ?>" alt="carousel">
                                                            <a href="<?php echo base_url() . 'edutech/details/' . $value['id']; ?>" class="hover-posts">
                                                                <span><i class="fa fa-play"></i></span>
                                                            </a>
                                                        </figure>
                                                        <div class="video-des">
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
                                                        </div>
                                                    </div>
                                                    <?php endforeach; ?>
                                                </div><!-- end carousel -->
                                            </div>
                                        </div>
                                    </section><!-- End Category -->
                                </div><!-- End slide video -->

                                <!-- Recent post videos -->
                                <div class="large-12 medium-7 medium-centered columns">
                                    <div class="widgetBox">
                                        <div class="widgetTitle">
                                            <h5>Recent post videos</h5>
                                        </div>
                                        <div class="widgetContent">
                                            <?php foreach ($edutech_slide_videos as $value): ?>
                                                <div class="media-object stack-for-small">
                                                    <div class="media-object-section">
                                                        <div class="recent-img">
                                                            <img src="<?php echo base_url() . 'assets/uploads/edutech/' . $value['thumblink']; ?>" alt="recent">
                                                            <a href="#" class="hover-posts">
                                                                <span><i class="fa fa-play"></i></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="media-object-section">
                                                        <div class="media-content">
                                                            <h6><a href="<?php echo base_url() . 'edutech/details/' . $value['id']; ?>"><?php echo $value['name']; ?></a></h6>
                                                            <p><i class="fa fa-clock-o"></i><span><?php echo $value['updatetime']; ?></span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div><!-- End Recent post videos -->

                            </div>
                        </aside>
                    </div><!-- end sidebar -->
                </div>
            </section><!-- End Category Content-->