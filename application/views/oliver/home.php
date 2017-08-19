<?php //var_dump($whoweare);?>
<!-- Slider -->
 <div class="fullwidthbanner-container" >
	<div class="fullwidthbanner">
		<ul>
			<?php foreach ($slider as $print): ?>
				<?php if(!empty($print->imagelink_lg)){ ?>
				<li data-transition="random" data-slotamount="7" data-masterspeed="1000">
					<img src="<?php echo base_url() . 'assets/uploads/slider/' . $print->imagelink_lg; ?>" alt="slide" data-fullwidthcentering="true">
					<?php if(!empty($print->imagelink_sm_1)){?>
						<div class="tp-caption large_black sfr" data-x="450" data-y="0" data-speed="1500" data-start="600" data-easing="easeInOutBack">
							<img src="<?php echo base_url() . $print->imagelink_sm_1; ?>" alt="" >
						</div>
					<?php };?>
					<div class="tp-caption large_black sfr carousel-caption-inner" data-x="30" data-y="80" data-speed="1100" data-start="1100" data-easing="easeInOutBack">
						<h3><?php echo $print->title; ?></h3>
					</div>
					<div class="tp-caption large_black sfr carousel-caption-inner" data-x="30" data-y="196" data-speed="1100" data-start="1400" data-easing="easeInOutBack">
						<p><?php echo $print->details; ?></p>
					</div>
					<?php if(!empty($print->button_text)){?>
					<div class="tp-caption lfb carousel-caption-inner" data-x="450" data-y="398" data-speed="1300" data-start="1700" data-easing="easeInOutBack">
						<a href="<?php echo $print->button_href; ?>"><button type="button" class="button-blue" ><?php echo $print->button_text; ?></button></a>
					</div>
					<?php };?>
				</li>
				<?php } ?>
			<?php endforeach; ?>

		</ul>
	</div>
</div>
<!-- Slider -->
<div class="space20"></div>
<!-- Clients -->
<div class="container home-works">
	<div class="row">
      	<div class="col-lg-12">
			<h2 class="section-title"><span>&nbsp;&nbsp;Principles</span></h2>
      	</div>
		<div id="client-content" class="owl-carousel">
			<?php foreach ($clienticon as $print): ?>
			<div class="item client-content" Style="padding: 10px !important;">
				<img src="<?php echo base_url() . 'assets/uploads/icon/' . $print->iconlink; ?>" alt="<?php echo $print->alttext; ?>"/>
			</div>
			<?php endforeach; ?>			
		</div>
	</div>
</div>
<!-- Clients -->

<!-- Services -->
<div class="section" Style="padding: 40px 0;">
	<div class="container">
		<!--div class="col-lg-12">
			<h2 class="section-title"><span>Why TechFocus?</span></h2>
      	</div-->
		<?php foreach ($whyus as $print): ?>
			<div class="col-lg-4 col-md-4">
				<div class="services">
					<div class="shadow-right"></div>
					<span class="service-ico1" Style="background:#1B9CFF url(<?php echo base_url() . 'assets/uploads/icon/' . $print->iconlink; ?>) no-repeat center center;"></span>
			            <h3><?php echo $print->title; ?></h3>
			            <?php echo $print->details; ?>	
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<!-- Services -->
<div class="space10"></div>
<!-- Recent Projects - Carousel -->
<div class="container home-works">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="section-title"><span>Recent Products</span></h2>
		</div>

		<div id="owl-example" class="owl-carousel">
			<?php foreach ($recent_products as $fvalue): ?>
			<div class="item works-content">
				<div class="works-overlay">
			      	<a href="<?php echo base_url() . 'products/details/' . $fvalue['url']; ?>"><img class="img-responsive" src="<?php echo base_url() . 'assets/uploads/files/' . $fvalue['imageurl1']; ?>" alt=""/></a>
					<div>
						
					</div>
				</div>
				<h4 Style="font-size: 13px !important; padding-bottom: 20px !important;"><a href="<?php echo base_url() . 'products/details/' . $fvalue['url']; ?>" Style="color: #2e2e2e;"><?php echo substr($fvalue['name'], 0, 25); ?> ...</a> <span Style="margin-bottom: 5px;"><?php echo anchor('products/category/'.$fvalue['categories']['curl'], $fvalue['categories']['cname'] .' '); ?></span></h4>
			</div>
		<?php endforeach; ?>

		</div>
	</div>
</div>
<!-- Recent Projects - Carousel -->
<div class="space10"></div>
<!-- Hot Games --1>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="section-title"><span>Hot Games &amp; Accessories</span></h2>
		</div>
		<div class="col-md-12">
			<div class="col-md-12 no-padding">
				<div class="row">
					<div class="col-md-2">
						<div class="product-content">
							<img class="img-responsive" src="http://placehold.it/870x1016" alt=""/>
							<div class="product-info">
								<div class="product-info-inner1">
									<ul class="ratings">
										<li><div class="on"></div></li>
										<li><div class="on"></div></li>
										<li><div class="off"></div></li>
									</ul>
									<span class="p-price">$500</span>
								</div>
		
								<div class="product-info-inner2">
									<div class="p-title">Coubter Strike : GO<span><a href="#">More</a></span></div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-2">
						<div class="product-content">
							<img class="img-responsive" src="http://placehold.it/870x1016" alt=""/>
							<div class="product-info">
								<div class="product-info-inner1">
									<ul class="ratings">
										<li><div class="on"></div></li>
										<li><div class="on"></div></li>
										<li><div class="off"></div></li>
									</ul>
									<span class="p-price">$500</span>
								</div>
		
								<div class="product-info-inner2">
									<div class="p-title">Coubter Strike : GO<span><a href="#">More</a></span></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="product-content">
							<img class="img-responsive" src="http://placehold.it/870x1016" alt=""/>
							<div class="product-info">
								<div class="product-info-inner1">
									<ul class="ratings">
										<li><div class="on"></div></li>
										<li><div class="on"></div></li>
										<li><div class="off"></div></li>
									</ul>
									<span class="p-price">$500</span>
								</div>
		
								<div class="product-info-inner2">
									<div class="p-title">Coubter Strike : GO<span><a href="#">More</a></span></div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-2">
						<div class="product-content">
							<img class="img-responsive" src="http://placehold.it/870x1016" alt=""/>
							<div class="product-info">
								<div class="product-info-inner1">
									<ul class="ratings">
										<li><div class="on"></div></li>
										<li><div class="on"></div></li>
										<li><div class="off"></div></li>
									</ul>
									<span class="p-price">$500</span>
								</div>
		
								<div class="product-info-inner2">
									<div class="p-title">Coubter Strike : GO<span><a href="#">More</a></span></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="product-content">
							<img class="img-responsive" src="http://placehold.it/870x1016" alt=""/>
							<div class="product-info">
								<div class="product-info-inner1">
									<ul class="ratings">
										<li><div class="on"></div></li>
										<li><div class="on"></div></li>
										<li><div class="off"></div></li>
									</ul>
									<span class="p-price">$500</span>
								</div>
		
								<div class="product-info-inner2">
									<div class="p-title">Coubter Strike : GO<span><a href="#">More</a></span></div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-2">
						<div class="product-content">
							<img class="img-responsive" src="http://placehold.it/870x1016" alt=""/>
							<div class="product-info">
								<div class="product-info-inner1">
									<ul class="ratings">
										<li><div class="on"></div></li>
										<li><div class="on"></div></li>
										<li><div class="off"></div></li>
									</ul>
									<span class="p-price">$500</span>
								</div>
		
								<div class="product-info-inner2">
									<div class="p-title">Coubter Strike : GO<span><a href="#">More</a></span></div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
	</div>
</div>


<!-- Hot Games -->

<?php //var_dump("whoweare")  ?>

<div class="section" style="padding-top: 30px;">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="col-lg-12 no-padding">
					<h2 class="section-title"><span>What we do</span></h2>
				</div>

				<div class="akordeon">
					
					<?php foreach ($whatwedo as $print): ?>
						<div class="akordeon-item">
							<div class="akordeon-item-head first">
								<div class="akordeon-item-head-container">
									<div class="akordeon-heading"><?php echo $print->title; ?></div>
								</div>
							</div>
							<div class="akordeon-item-body">
								<div class="akordeon-item-content">
									<?php echo $print->description; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="col-lg-6 about-home">
		      	<div class="col-lg-12 no-padding">
			            <h2 class="section-title"><span><?php echo $whoweare['name']; ?></span></h2>
				</div>
				
					<div class="col-lg-12 no-padding clearfix media ">
						<img class="pull-left" src="<?php echo base_url() . 'assets/uploads/files/' . $whoweare['imagelink']; ?>" alt=""/>
						<?php echo $whoweare['details']; ?>
					</div>
					<?php if(!empty($whoweare['specialtext'])){ ?>
					<div class="white-panel" Style="margin-top: 0 !important;">
						<?php echo $whoweare['specialtext']; ?>
					</div>
					<?php } ?>
				
			</div>
		</div>
	</div>
</div>
</div>


