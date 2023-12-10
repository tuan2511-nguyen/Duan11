<?php
if (is_array($sp)) {
    extract($sp);
    $hinh = $img_path . $img;
}
?>
<main>
    <div class="container margin_30">
        <div class="row">
            <div class="col-md-6">
                <div class="all">
                    <div class="slider">
                        <div class="owl-carousel owl-theme main"> 
                            <div style="background-image: url(<?=$hinh?>);" class="item-box"></div>
                            <div style="background-image: url(img/products/shoes/2.jpg);" class="item-box"></div>
                            <div style="background-image: url(img/products/shoes/3.jpg);" class="item-box"></div>
                            <div style="background-image: url(img/products/shoes/4.jpg);" class="item-box"></div>
                            <div style="background-image: url(img/products/shoes/5.jpg);" class="item-box"></div>
                            <div style="background-image: url(img/products/shoes/6.jpg);" class="item-box"></div>
                        </div>
                        <div class="left nonl"><i class="ti-angle-left"></i></div>
                        <div class="right"><i class="ti-angle-right"></i></div>
                    </div>
                    <div class="slider-two">
                        <div class="owl-carousel owl-theme thumbs">
                            <div style="background-image: url(img/products/shoes/1.jpg);" class="item active"></div>
                            <div style="background-image: url(img/products/shoes/2.jpg);" class="item"></div>
                            <div style="background-image: url(img/products/shoes/3.jpg);" class="item"></div>
                            <div style="background-image: url(img/products/shoes/4.jpg);" class="item"></div>
                            <div style="background-image: url(img/products/shoes/5.jpg);" class="item"></div>
                            <div style="background-image: url(img/products/shoes/6.jpg);" class="item"></div>
                        </div>
                        <div class="left-t nonl-t"></div>
                        <div class="right-t"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Category</a></li>
                        <li>Page active</li>
                    </ul>
                </div>
                <!-- /page_header -->
                <form action="index.php?act=viewcart" method="post">
                    <div class="prod_info">
                        <h1><?php echo $ctsp['ten_sp']  ?></h1>
                        <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4 reviews</em></span>
                        <div class="prod_options">
                            <div class="row">
                                <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Size</strong>  <a href="#0" data-bs-toggle="modal" data-bs-target="#size-modal"><i class="ti-help-alt"></i></a></label>
                                <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                    <div class="custom-select-form">
                                        <select class="wide" id="size" name="size">
                                            <?php
                                            foreach ($bienthe as $size) {
                                                echo "<option value=\"{$size['size']}\">{$size['size']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Số lượng</strong></label>
                                <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                    <div class="numbers-row">
                                        <input type="number" value="1" id="quantity_1" class="qty2" name="soluong" oninput="validateQuantity(this)" maxlength="2">
                                        <div>
                                            <?php
                                            if (isset($thongbao) && ($thongbao != "")) {
                                                echo $thongbao;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-5 col-md-6">
                                <div class="price_main"><span class="new_price"><?php echo $ctsp['gia_khuyenmai'] ?>₫</span><span class="percentage">-20%</span> <span class="old_price"><?php echo $ctsp['gia_goc'] ?>₫</span></div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="hidden" name="id_sp" value="<?= $ctsp['id_sp'] ?>">
                                <input type="hidden" name="ten_sp" value="<?= $ctsp['ten_sp'] ?>">
                                <input type="hidden" name="gia_khuyenmai" value="<?= $ctsp['gia_khuyenmai'] ?>">
                                <div class="btn_add_to_cart"><input type="submit" class="btn_1" value="Thêm vào giỏ hàng"></div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- /prod_info -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

    <div class="tabs_product">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab" role="tab">Mô tả</a>
                </li>
                <li class="nav-item">
                    <a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab" role="tab">Bình luận</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /tabs_product -->
    <div class="tab_content_wrapper">
        <div class="container">
            <div class="tab-content" role="tablist">
                <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                    <div class="card-header" role="tab" id="heading-A">
                        <h5 class="mb-0">
                            <a class="collapsed" data-bs-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
                                Description
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <?php echo $ctsp['mota'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /TAB A -->
                <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                    <div class="card-header" role="tab" id="heading-B">
                        <h5 class="mb-0">
                            <a class="collapsed" data-bs-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
                                Reviews
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <?php
                                foreach ($listbl as $bl) {
                                    extract($bl);
                                    echo '<div class="col-lg-6">
                                        <div class="review_content">
                                            <div class="clearfix add_bottom_10">
                                                <span class="rating">';
                                    for ($i = 1; $i <= $rating; $i++) {
                                        echo '<i class="icon-star"></i>';
                                    }
                                    echo '<em>' . $rating . '.0/5.0</em></span>
                                                <em>' . $ngaydang . '</em>
                                            </div>
                                            <h4>"' . $hoten . '"</h4>
                                            <p>' . $noidung . '</p>
                                        </div>
                                    </div>';
                                }
                                ?>
                            </div>
                            <!-- /row -->
                            <?php
                            if (isset($_SESSION['username'])) {
                                extract($_SESSION['username']);
                            ?>
                                <p class="text-end"><a href="index.php?act=binhluan&id_sp=<?= $ctsp['id_sp'] ?>" class="btn_1">Bình luận</a></p>
                            <?php
                            } else {
                            ?>
                                <h4>Đăng nhập để bình luận</h4><br>
                            <?php
                            }
                            ?>

                        </div>
                        <!-- /card-body -->
                    </div>
                </div>
                <!-- /tab B -->
            </div>
            <!-- /tab-content -->
        </div>
        <!-- /container -->
    </div>
    <!-- /tab_content_wrapper -->

    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Giày</h2>
            <span>Products</span>
            <p>Có thể bạn sẽ thích.</p>
        </div>
        <div class="owl-carousel owl-theme products_carousel">
            <?php
            foreach ($load_random as $sp_random) {
                extract($sp_random);
                $linksp = "index.php?act=ct_sanpham&id_sp=" . $sp_random['id_sp'];
                $hinh = $img_path . $img;
                echo '
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
						';
            }
            ?>
        </div>
        <!-- /products_carousel -->
    </div>
    <!-- /container -->

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
    <script>
        function validateQuantity(input) {
            var max = 20;
            var value = parseInt(input.value);

            if (isNaN(value) || value < 1) {
                input.value = 1;
            } else if (value > max) {
                input.value = max;
            }
        }
    </script>

</main>