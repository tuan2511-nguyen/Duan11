<!-- /search_panel -->

<main class="bg_gray">

	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Category</a></li>
					<li>Page active</li>
				</ul>
			</div>
			<h1>Đăng nhập & Đăng ký tài khoản</h1>
		</div>
		<!-- /page_header -->
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="client">Đăng nhập</h3>
					<form action="index.php?act=dangnhap" method="POST">
						<div class="form_container">
							<div class="form-group">
								<input type="text" class="form-control" name="username" placeholder="Tên đăng nhập *">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="pass"  value="" placeholder="Mặt khẩu *">
							</div>
							<div class="clearfix add_bottom_15">
								<div class="checkboxes float-start">
									<label class="container_check">Remember me
										<input type="checkbox">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="float-end"><a id="forgot" href="javascript:void(0);">Quên mặt khẩu?</a>
								</div>
							</div>
							<div class="text-center"><input type="submit" value="Đăng nhập" class="btn_1 full-width" name="btn_login">
							</div>
							<?php
							if (isset($thongbao1) && ($thongbao1 != "")) {
								echo $thongbao1;
							}
							?>
							<div id="forgot_pw">
								<div class="form-group">
									<input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Type your email">
								</div>
								<p>A new password will be sent shortly.</p>
								<div class="text-center"><input type="submit" value="Reset Password" class="btn_1">
								</div>
							</div>
						</div>
					</form>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->

				<!-- /row -->
			</div>
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client">Đăng ký</h3> <small class="float-right pt-2">* Phần bắt buộc</small>
					<form action="index.php?act=dangky" method="POST">
						<div class="form_container">
							<div class="form-group">
								<input type="text" class="form-control" name="username" placeholder="Tên đăng nhập *">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="pass" value="" placeholder="Mặt khẩu ">
							</div>
							<div class="form-group">
								<input type="email" class="form-control" name="email" placeholder="Email *">
							</div>
							<hr>
							<div class="private box">
								<div class="row no-gutters">
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Họ tên *" name="hoten">
										</div>
									</div>
								</div>
								<div class="row no-gutters">
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Địa chỉ *" name="diachi">
										</div>
									</div>
								</div>
								<div class="row no-gutters">
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Số điện thoại *" name="sdt">
										</div>
									</div>
								</div>
							</div>
							<!-- /private -->
							<hr>
							<div class="text-center"><input type="submit" value="Đăng ký" class="btn_1 full-width" name="btn_register">
							</div>
							<?php
							if (isset($thongbao) && ($thongbao != "")) {
								echo $thongbao;
							}
							?>
						</div>
					</form>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</main>
<!--/main-->