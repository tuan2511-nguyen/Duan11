<main class="bg_gray">


	<form action="index.php?act=thanhtoan" method="post" class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Category</a></li>
					<li>Page active</li>
				</ul>
			</div>
			<h1>Sign In or Create an Account</h1>

		</div>
		<!-- /page_header -->
		<div class="row">

			<div class="col-lg-4 col-md-6">
				<div class="step first">
					<h3>1. User Info and Billing address</h3>
					<ul class="nav nav-tabs" id="tab_checkout" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true">Thông tin</a>
						</li>
					</ul>
					<div class="tab-content checkout">
						<div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
							<div class="form-group">
								<input type="text" class="form-control" name="hoten" placeholder="Username*" value="<?= $user['hoten'] ?>">
							</div>
							<div class="form-group">
								<input type="email" class="form-control" name="email" placeholder="Email*" value="<?= $user['email'] ?>">
							</div>
							<hr>
							<div class="private box">
								<div class="row no-gutters">
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Full Address*" name="diachi">
										</div>
									</div>
								</div>
								<div class="row no-gutters">
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Telephone *" name="sdt">
										</div>
									</div>
								</div>
								<hr>

							</div>
							<div class="form-group">
							</div>
							<div id="other_addr_c" class="pt-2">
							</div>
							<!-- /other_addr_c -->
						</div>
						<!-- /tab_1 -->
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="step middle payments">
					<h3>2. Payment and Shipping</h3>
					<ul>
						<li>
							<label class="container_radio">Credit Card
								<input type="radio" name="thanhtoan" value="Credit Card" checked>
								<span class="checkmark"></span>
							</label>
						</li>
						<li>
							<label class="container_radio">Paypal
								<input type="radio" name="thanhtoan" value="Paypal">
								<span class="checkmark"></span>
							</label>
						</li>
						<li>
							<label class="container_radio">Cash on delivery
								<input type="radio" name="thanhtoan" value="Cash on delivery">
								<span class="checkmark"></span>
							</label>
						</li>
						<li>
							<label class="container_radio">Bank Transfer
								<input type="radio" name="thanhtoan" value="Bank Transfer">
								<span class="checkmark"></span>
							</label>
						</li>
					</ul>
					<div class="payment_info d-none d-sm-block">
						<figure><img src="img/cards_all.svg" alt=""></figure>
					</div>

					<h6 class="pb-2">Shipping Method</h6>


					<ul>
						<li>
							<label class="container_radio">Standard shipping
								<input type="radio" name="vanchuyen" value="Standard shipping" checked>
								<span class="checkmark"></span>
							</label>
						</li>
						<li>
							<label class="container_radio">Express shipping
								<input type="radio" name="vanchuyen" value="Express shipping">
								<span class="checkmark"></span>
							</label>
						</li>

					</ul>

				</div>
			</div>

		</div>
		<div class="col-lg-4 col-md-6">
			<div class="step last">
				<h3>3. Order Summary</h3>
				<div class="box_general summary">
					<ul>
						<?php foreach ($cart as $san_pham) : ?>
							<li class="clearfix">
								<em><?= $san_pham['soluong'] ?>x <?= $san_pham['ten_sp'] ?></em>
								<span>$<?= $san_pham['gia_khuyenmai'] * $san_pham['soluong'] ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
					<ul>
						<li class="clearfix"><em><strong>Subtotal</strong></em> <span>$<?= number_format($tong_gia, 2) ?></span></li>
						<li class="clearfix"><em><strong>Shipping</strong></em> <span>$7</span></li>
					</ul>
					<div class="total clearfix">TOTAL <span>$<?= number_format($tong_gia + 7, 2) ?></span></div>

					<input type="submit" class="btn_1 full-width" value="Xác thực thông tin đơn hàng" name="btn_save">
					<?php
					if (isset($thongbao) && ($thongbao != "")) {
						echo $thongbao;
					}
					?>
				</div>
				<!-- /box_general -->
			</div>
			<!-- /step -->
		</div>
		<!-- /row -->
	</form>
	<!-- /container -->
</main>