<!--breadcrumbs-->
            <section id="breadcrumb">
                <div class="row">
                    <div class="large-12 columns">
                        <nav aria-label="You are here:" role="navigation">
                            <ul class="breadcrumbs">
                                <li><i class="fa fa-home"></i><a href="home-v1.html">Home</a></li>
                                <li>
                                    <span class="show-for-sr">Current: </span> categories
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
                        <section class="content content-with-sidebar">
                            <!-- newest video -->
                            <div class="main-heading removeMargin">
                                <div class="row secBg padding-14 removeBorderBottom">
                                    <div class="medium-8 small-8 columns">
                                        <div class="head-title">
                                            <i class="fa fa-film"></i>
                                            <h4>Entertainment</h4>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row secBg">
                                <div class="large-12 columns">
                                    <div class="row column head-text clearfix">
                                        <p class="pull-left"><a href="<?php echo base_url() . 'edutech/videos/0'; ?>">All Videos : <span><?php echo $edutech_video_count; ?> Videos posted</span></a></p>
                                        <!--div class="grid-system pull-right show-for-large">
                                            <a class="secondary-button grid-default" href="#"><i class="fa fa-th"></i></a>
                                            <a class="secondary-button current grid-medium" href="#"><i class="fa fa-th-large"></i></a>
                                            <a class="secondary-button list" href="#"><i class="fa fa-th-list"></i></a>
                                        </div-->
                                    </div>
                                    <div class="tabs-content" data-tabs-content="newVideos">
                                        <div class="tabs-panel is-active" id="new-all">
                                            <div class="row list-group">
                                                <?php foreach ($videos as $value): ?>
                                                    <div class="item large-4 medium-6 columns grid-medium end">
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
                                                                    <?php echo $value['summary']; ?>
                                                                </div>
                                                                <div class="post-button">
                                                                    <a href="<?php echo $value['id']; ?>" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="pagination">
                                        <a href="#" class="prev page-numbers">« Previous</a>
                                        <a href="#" class="page-numbers">1</a>
                                        <span class="page-numbers current">2</span>
                                        <a href="#" class="page-numbers">3</a>
                                        <a href="#" class="next page-numbers">Next »</a></div>
                                    </div>
                            </div>
                        </section>
                        <!-- ad Section -->
                        <div class="googleAdv">
                            
                        </div><!-- End ad Section -->
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
                                                            <h6><a href="<?php echo base_url() . 'edutech/details/' . $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></a></h6>
                                                            <p><i class="fa fa-clock-o"></i><span><?php echo $value['updatetime']; ?></span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div><!-- End Recent post videos -->

                                

                                <!-

                            </div>
                        </aside>
                    </div><!-- end sidebar -->
                </div>
            </section><!-- End Category Content-->