<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Ansonika">
	<title>Allaia | Bootstrap eCommerce Template - ThemeForest</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

	<!-- GOOGLE WEB FONT -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

	<!-- BASE CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<!-- SPECIFIC CSS -->
	<link href="css/listing.css" rel="stylesheet">
	<link href="css/product_page.css" rel="stylesheet">
	<link href="css/home_1.css" rel="stylesheet">
	<link href="css/leave_review.css" rel="stylesheet">
	<link href="css/faq.css" rel="stylesheet">
	<link href="css/contact.css" rel="stylesheet">
	<link href="css/checkout.css" rel="stylesheet">
	<link href="css/cart.css" rel="stylesheet">
	<link href="css/blog.css" rel="stylesheet">
	<link href="css/account.css" rel="stylesheet">
	<link href="css/about.css" rel="stylesheet">
	<link href="css/error_track.css" rel="stylesheet">


	<!-- YOUR CUSTOM CSS -->
	<link href="css/custom.css" rel="stylesheet">

	<link rel="stylesheet" href="css/admin-styles.css">
</head>

<body>

	<div id="page">

		<header class="version_2">
			<div class="layer"></div><!-- Mobile menu overlay mask -->
			<div class="main_header Sticky">
				<div class="container">
					<div class="row small-gutters">
						<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
							<div id="logo">
								<a href="index.php"><img src="img/logo_black.svg" alt="" width="100" height="35"></a>
							</div>
						</div>
						<nav class="col-xl-6 col-lg-7">
							<a class="open_close" href="javascript:void(0);">
								<div class="hamburger hamburger--spin">
									<div class="hamburger-box">
										<div class="hamburger-inner"></div>
									</div>
								</div>
							</a>
							<!-- Mobile menu button -->
							<div class="main-menu">
								<div id="header_menu">
									<a href="index.html"><img src="img/logo_black.svg" alt="" width="100" height="35"></a>
									<a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
								</div>
								<ul>
									<li class="">
										<a href="index.php" class="">Home</a>
									</li>
									<li class="">
										<a href="javascript:void(0);" class="" onclick="window.location.href='index.php?act=danhmuc';">Sản phẩm</a>
									</li>
									<li class="">
										<a href="javascript:void(0);" class="">Extra Pages</a>
									</li>
									<li>
										<a href="blog.html">Blog</a>
									</li>
									<li>
										<a href="#0">Buy Template</a>
									</li>
								</ul>
							</div>
							<!--/main-menu -->
						</nav>
						<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-end">
							<ul class="top_tools">
								<li>
									<div class="dropdown dropdown-cart">
										<a href="cart.html" class="cart_bt"><strong>2</strong></a>
										<div class="dropdown-menu">
											<ul>
												<li>
													<a href="product-detail-1.html">
														<figure><img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/thumb/1.jpg" alt="" width="50" height="50" class="lazy"></figure>
														<strong><span>1x Armor Air x Fear</span>$90.00</strong>
													</a>
													<a href="#0" class="action"><i class="ti-trash"></i></a>
												</li>
												<li>
													<a href="product-detail-1.html">
														<figure><img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/thumb/2.jpg" alt="" width="50" height="50" class="lazy"></figure>
														<strong><span>1x Armor Okwahn II</span>$110.00</strong>
													</a>
													<a href="0" class="action"><i class="ti-trash"></i></a>
												</li>
											</ul>
											<div class="total_drop">
												<div class="clearfix"><strong>Total</strong><span>$200.00</span></div>
												<a href="cart.html" class="btn_1 outline">View Cart</a><a href="checkout.html" class="btn_1">Checkout</a>
											</div>
										</div>
									</div>
									<!-- /dropdown-cart-->
								</li>
								<li>
									<div class="dropdown dropdown-access">
										<a href="index.php?act=dangky" class="access_link"><span>Account</span></a>
										<div class="dropdown-menu">
										<?php
                                            if (isset($_SESSION['username'])) {
                                                extract($_SESSION['username']);
                                            ?>
                                                <h4>Xin chào <?= $username ?></h4><br>
												<ul>
													<li>
														<a href="index.php?act=update-taikhoan"><i class="ti-user"></i> My Profile</a>
													</li>
													<?php if($vaitro=="admin") { ?>
													<li>
														<a href="admin/index.php"><i class="ti-user"></i> Admin</a>
													</li>
													<?php } ?>
												</ul>

                                            <?php
                                            } else {
                                            ?>
                                                <a href="index.php?act=dangky" class="btn_1">Sign In or Sign Up</a>
                                            <?php
                                            }
                                            ?>
											<ul>
												<li>
													<a href="track-order.html"><i class="ti-truck"></i>Track your Order</a>
												</li>
												<li>
													<a href="account.html"><i class="ti-package"></i>My Orders</a>
												</li>
												<li>
													<a href="index.php?act=logout"><i class="ti-help-alt"></i>Đăng xuất</a>
												</li>
											</ul>
										</div>
									</div>
									<!-- /dropdown-access-->
								</li>
								<li>
									<a href="javascript:void(0);" class="search_panel"><span>Search</span></a>
								</li>

							</ul>
						</div>
					</div>
					<!-- /row -->
				</div>
			</div>
			<!-- /main_header -->
		</header>
		<!-- /header -->
		<div class="top_panel">
			<div class="container header_panel">
				<a href="#0" class="btn_close_top_panel"><i class="ti-close"></i></a>
				<small>What are you looking for?</small>
			</div>
			<!-- /header_panel -->

			<div class="container">
				<div class="search-input">
					<form action="index.php?act=danhmuc" method="POST">
						<input type="text" placeholder="Search over 10.000 products..." name="kw">
						<input type="submit" name="timkiem" id="" value="Tìm kiếm">
					</form>
				</div>
			</div>
			<!-- /related -->
		</div>
		<!-- /search_panel -->