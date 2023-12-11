

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
									<h3>Miễn phí vận chuyển</h3>
									<p>Cho tất cả các đơn hàng</p>
								</div>
							</div>
						</li>
						<li>
							<div class="box">
								<i class="ti-wallet"></i>
								<div class="justify-content-center">
									<h3>Thanh toán an toàn</h3>
									<p>Thanh toán an toàn 100%</p>
								</div>
							</div>
						</li>
						<li>
							<div class="box">
								<i class="ti-headphone-alt"></i>
								<div class="justify-content-center">
									<h3>Hỗ trợ 24/7</h3>
									<p>Hỗ trợ trực tuyến hàng đầu</p>
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
					<h2>Sản phẩm mới</h2>
					<span>Products</span>
					<p>Mẫu giày mới nhất 2023 với giá cực tốt.</p>
				</div>
				<div class="isotope_filter">
					<ul>
						<!-- <li><a href="#0" id="all" data-filter="*">All</a></li>
						<li><a href="#0" id="popular" data-filter=".popular">Popular</a></li>
						<li><a href="#0" id="sale" data-filter=".sale">Sale</a></li> -->
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
									<span class="new_price">' . $gia_khuyenmai . '₫</span> 
									<span class="old_price">' . $gia_goc . '₫</span>
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

			<div class="featured lazy" data-bg="url(img/brands/banner_ADIDAS.webp)">
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
					<h2>Tin tức mới nhất</h2>
					<span>Blog</span>
					<p></p>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<a class="box_news" href="">
							<figure>
								<img src="upload/Thiet-ke-chua-co-ten-2023-12-10T162548.980.png" alt="" width="400" height="266" class="lazy">
								<figcaption><strong>20</strong>11</figcaption>
							</figure>
							<ul>
								<li>by Mark Twain</li>
								<li>20.11.2023</li>
							</ul>
							<h4>Điểm qua 8 đôi Air Jordan Retro được phát hành trước năm 2024</h4>
							<p>Điều có thể gây nhầm lẫn với các đợt phát hành giày sneaker, vì có vẻ như giày sneaker đang giảm giá mỗi ngày. Nhưng Authentic Shoes đã....</p>
						</a>
					</div>
					<!-- /box_news -->
					<div class="col-lg-6">
						<a class="box_news" href="blog.html">
							<figure>
								<img src="upload/Thiet-ke-chua-co-ten-2023-12-08T173933.351.png" alt="" width="400" height="266" class="lazy">
								<figcaption><strong>28</strong>11</figcaption>
							</figure>
							<ul>
								<li>By Jhon Doe</li>
								<li>28.11.2023</li>
							</ul>
							<h4>6 đôi sneaker bạn nên thêm vào “rotation” của mình năm 2024</h4>
							<p>Các thương hiệu giày sneaker trên toàn cầu hiện đang hoàn thiện lịch phát hành của họ cho nửa đầu năm 2024 và đang có rất nhiều áp lực.....</p>
						</a>
					</div>
					<!-- /box_news -->
					<div class="col-lg-6">
						<a class="box_news" href="blog.html">
							<figure>
								<img src="upload/Thiet-ke-chua-co-ten-2023-12-08T170830.245.png" alt="" width="400" height="266" class="lazy">
								<figcaption><strong>20</strong>12</figcaption>
							</figure>
							<ul>
								<li>By Luca Robinson</li>
								<li>20.12.2023</li>
							</ul>
							<h4>Đâu là những đôi sneaker chủ đề Giáng sinh tốt nhất mọi thời đại?</h4>
							<p>It’s begging to look a lot like Christmas”, và bạn biết điều đó có nghĩa là gì không? Đã đến lúc bắt đầu chọn những đôi giày thể thao theo....</p>
						</a>
					</div>
					<!-- /box_news -->
					<div class="col-lg-6">
						<a class="box_news" href="blog.html">
							<figure>
								<img src="upload/Thiet-ke-chua-co-ten-2023-12-05T145036.905.png" alt="" width="400" height="266" class="lazy">
								<figcaption><strong>28</strong>12</figcaption>
							</figure>
							<ul>
								<li>By Paula Rodrigez</li>
								<li>28.12.2023</li>
							</ul>
							<h4>Stussy x Nike: 23 năm lịch sử hợp tác đình đám (Phần 2)</h4>
							<p>Hơn 20 năm hợp tác, Stussy và Nike đã liên tục gây ấn tượng với những người đam mê sneaker bởi các siêu phẩm của họ. Ở phần 2 của....</p>
						</a>
					</div>
					<!-- /box_news -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->

		</main>
		<!-- /main -->