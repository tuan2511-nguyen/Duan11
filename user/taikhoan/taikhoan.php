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
			<h1>Sign In or Create an Account</h1>
		</div>
		<!-- /page_header -->
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="client">Already Client</h3>
					<form action="index.php?act=dangnhap" method="POST">
						<div class="form_container">
							<div class="form-group">
								<input type="text" class="form-control" name="username" placeholder="Username*">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="pass"  value="" placeholder="Password*">
							</div>
							<div class="clearfix add_bottom_15">
								<div class="checkboxes float-start">
									<label class="container_check">Remember me
										<input type="checkbox">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="float-end"><a id="forgot" href="javascript:void(0);">Lost Password?</a>
								</div>
							</div>
							<div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width" name="btn_login">
							</div>
							<?php
							if (isset($thongbao) && ($thongbao != "")) {
								echo $thongbao;
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
				<div class="row">
					<div class="col-md-6 d-none d-lg-block">
						<ul class="list_ok">
							<li>Find Locations</li>
							<li>Quality Location check</li>
							<li>Data Protection</li>
						</ul>
					</div>
					<div class="col-md-6 d-none d-lg-block">
						<ul class="list_ok">
							<li>Secure Payments</li>
							<li>H24 Support</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client">New Client</h3> <small class="float-right pt-2">* Required
						Fields</small>
					<form action="index.php?act=dangky" method="POST">
						<div class="form_container">
							<div class="form-group">
								<input type="text" class="form-control" name="username" placeholder="Username*">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="pass" value="" placeholder="Password*">
							</div>
							<div class="form-group">
								<input type="email" class="form-control" name="email" placeholder="Email*">
							</div>
							<hr>
							<div class="private box">
								<div class="row no-gutters">
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Full Name*" name="hoten">
										</div>
									</div>
								</div>
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
							</div>
							<!-- /private -->
							<hr>
							<div class="text-center"><input type="submit" value="Register" class="btn_1 full-width" name="btn_register">
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