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
			<h1>My Account</h1>
		</div>
		<!-- /page_header -->
		<div  class="div1">
			<?php
				if(isset($_SESSION['username'])&&($_SESSION['username'])){
					extract(($_SESSION['username']));
				}
			?>
			<form action="index.php?act=edit-taikhoan" method="POST">
				<div class="form1">
				<label for="username">Username:</label>
				<input type="text" id="username" name="username" value="<?=$username?>" required><br>

				<label for="password">Password:</label>
				<input type="password" id="password" name="pass" value="<?=$pass?>"><br>

				<label for="email">Email:</label>
				<input type="email" id="email" name="email" value="<?=$email?>" required><br>

				<label for="fullname">Full Name:</label>
				<input type="text" id="fullname" name="hoten" value="<?=$hoten?>" required><br>

				<label for="address">Address:</label>
				<input type="text" id="address" name="diachi" value="<?=$diachi?>" required><br>

				<label for="phone">Phone:</label>
				<input type="tel" id="phone" name="sdt" value="<?=$sdt?>" required><br>

				<div class="form3">
					<input type="hidden" name="id_user" value="<?=$id_user?>">
					<input type="submit" name="thaydoi" value="Thay đổi ">
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
	</div>
	<!-- /container -->
</main>
<!--/main-->