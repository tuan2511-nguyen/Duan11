

		<main>
			<div class="header-video">
				<div id="hero_video">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-start">
								<div class="col-lg-6">
									<div class="slide-text white">
										<h3>Armor Air<br>Max 720 Sage Low</h3>
										<p>Limited items available at this price</p>
										<a class="btn_1" onclick="window.location.href='index.php?act=danhmuc';" role="button">Shop Now</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<img src="img/video_fix.png" alt="" class="header-video--media" data-video-src="video/intro" data-teaser-source="video/intro" data-provider="" data-video-width="1920" data-video-height="960">
			</div>
			<!-- /header-video -->

			<div class="feat">
				<div class="container">
					<ul>
						<li>
							<div class="box">
								<i class="ti-gift"></i>
								<div class="justify-content-center">
									<h3>Free Shipping</h3>
									<p>For all oders over $99</p>
								</div>
							</div>
						</li>
						<li>
							<div class="box">
								<i class="ti-wallet"></i>
								<div class="justify-content-center">
									<h3>Secure Payment</h3>
									<p>100% secure payment</p>
								</div>
							</div>
						</li>
						<li>
							<div class="box">
								<i class="ti-headphone-alt"></i>
								<div class="justify-content-center">
									<h3>24/7 Support</h3>
									<p>Online top support</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<!--/feat-->

			<div class="container margin_60_35">
				<div class="row small-gutters categories_grid">
					<div class="col-sm-12 col-md-6">
						<a href="index.php?act=danhmuc" >
							<img src="img/brands/Adidas-Logo-1991.jpg" alt="" class="img-fluid lazy">
							<div class="wrapper">
								<h2>Adidas</h2>
								<p>115 Products</p>
							</div>
						</a>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="row small-gutters mt-md-0 mt-sm-2">
							<div class="col-sm-6">
								<a href="listing-grid-1-full.html">
									<img src="img/brands/tải xuống (1).png" class="img-fluid lazy">
									<div class="wrapper">
										<h2>MLB</h2>
										<p>150 Products</p>
									</div>
								</a>
							</div>
							<div class="col-sm-6">
								<a href="listing-grid-1-full.html">
									<img src="img/brands/tải xuống.png" class="img-fluid lazy">
									<div class="wrapper">
										<h2>Nike</h2>
										<p>90 Products</p>
									</div>
								</a>
							</div>
							<div class="col-sm-12 mt-sm-2">
								<a href="listing-grid-1-full.html">
									<img src="img/brands/33b0ccc2706f56fb337bd2bc51b3217c.jpg" class="img-fluid lazy">
									<div class="wrapper">
										<h2>Vans</h2>
										<p>120 Products</p>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<!--/categories_grid-->
			</div>
			<!-- /container -->

			<hr class="mb-0">

			<div class="container margin_60_35">
				<div class="main_title mb-4">
					<h2>New Arrival</h2>
					<span>Products</span>
					<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
				</div>
				<div class="isotope_filter">
					<ul>
						<li><a href="#0" id="all" data-filter="*">All</a></li>
						<li><a href="#0" id="popular" data-filter=".popular">Popular</a></li>
						<li><a href="#0" id="sale" data-filter=".sale">Sale</a></li>
					</ul>
				</div>
				<div class="isotope-wrapper">
					<div class="row small-gutters">
						<?php
						foreach ($spnew as $sp) {
							extract($sp);
							$linksp = "index.php?act=ct_sanpham&id_sp=" . $id_sp;
							$hinh = $img_path . $img;
							$linksp = "index.php?act=ct_sanpham&id_sp=" . $id_sp;
							echo '<div class="col-6 col-md-4 col-xl-3 isotope-item sale">
							<div class="grid_item">
								<figure> 
									<span class="ribbon off">-30%</span>
									<a href="' . $linksp . '">
										<img class="img-fluid lazy" src="'. $hinh .'">
									</a>
									<div data-countdown="2019/05/15" class="countdown"></div>
								</figure>
								<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
								<a href="product-detail-1.html">
									<h3>' . $ten_sp . '</h3>
								</a>
								<div class="price_box">
									<span class="new_price">' . $gia_khuyenmai . '</span>
									<span class="old_price">' . $gia_goc . '</span>
								</div>
								<ul>
									<li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
									<li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
									<li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
								</ul>
							</div>
							<!-- /grid_item -->
						</div>';
						}
						?>
					</div>
				</div>
				<!-- /isotope-wrapper -->
			</div>
			<!-- /container -->

			<div class="featured lazy" data-bg="url(img/featured_home.jpg)">
				<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
					<div class="container margin_60">
						<div class="row justify-content-center justify-content-md-start">
							<div class="col-lg-6 wow" data-wow-offset="150">
								<h3>Armor<br>Air Color 720</h3>
								<p>Lightweight cushioning and durable support with a Phylon midsole</p>
								<div class="feat_text_block">
									<div class="price_box">
										<span class="new_price">$90.00</span>
										<span class="old_price">$170.00</span>
									</div>
									<a class="btn_1" onclick="window.location.href='index.php?act=danhmuc';" role="button">Shop Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /featured -->

			<div class="bg_gray">
				<div class="container margin_30">
					<div id="brands" class="owl-carousel owl-theme">
						<div class="item">
							<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_1.png" alt="" class="owl-lazy"></a>
						</div><!-- /item -->
						<div class="item">
							<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_2.png" alt="" class="owl-lazy"></a>
						</div><!-- /item -->
						<div class="item">
							<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_3.png" alt="" class="owl-lazy"></a>
						</div><!-- /item -->
						<div class="item">
							<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_4.png" alt="" class="owl-lazy"></a>
						</div><!-- /item -->
						<div class="item">
							<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_5.png" alt="" class="owl-lazy"></a>
						</div><!-- /item -->
						<div class="item">
							<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_6.png" alt="" class="owl-lazy"></a>
						</div><!-- /item -->
					</div><!-- /carousel -->
				</div><!-- /container -->
			</div>
			<!-- /bg_gray -->

			<div class="container margin_60_35">
				<div class="main_title">
					<h2>Latest News</h2>
					<span>Blog</span>
					<p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<a class="box_news" href="blog.html">
							<figure>
								<img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-1.jpg" alt="" width="400" height="266" class="lazy">
								<figcaption><strong>28</strong>Dec</figcaption>
							</figure>
							<ul>
								<li>by Mark Twain</li>
								<li>20.11.2017</li>
							</ul>
							<h4>Pri oportere scribentur eu</h4>
							<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
						</a>
					</div>
					<!-- /box_news -->
					<div class="col-lg-6">
						<a class="box_news" href="blog.html">
							<figure>
								<img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-2.jpg" alt="" width="400" height="266" class="lazy">
								<figcaption><strong>28</strong>Dec</figcaption>
							</figure>
							<ul>
								<li>By Jhon Doe</li>
								<li>20.11.2017</li>
							</ul>
							<h4>Duo eius postea suscipit ad</h4>
							<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
						</a>
					</div>
					<!-- /box_news -->
					<div class="col-lg-6">
						<a class="box_news" href="blog.html">
							<figure>
								<img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-3.jpg" alt="" width="400" height="266" class="lazy">
								<figcaption><strong>28</strong>Dec</figcaption>
							</figure>
							<ul>
								<li>By Luca Robinson</li>
								<li>20.11.2017</li>
							</ul>
							<h4>Elitr mandamus cu has</h4>
							<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
						</a>
					</div>
					<!-- /box_news -->
					<div class="col-lg-6">
						<a class="box_news" href="blog.html">
							<figure>
								<img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-4.jpg" alt="" width="400" height="266" class="lazy">
								<figcaption><strong>28</strong>Dec</figcaption>
							</figure>
							<ul>
								<li>By Paula Rodrigez</li>
								<li>20.11.2017</li>
							</ul>
							<h4>Id est adhuc ignota delenit</h4>
							<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
						</a>
					</div>
					<!-- /box_news -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->

		</main>
		<!-- /main -->