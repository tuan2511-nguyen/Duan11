<?php
if(isset($sp)){
	if (is_array($sp)) {
		extract($sp);
		$hinh = $img_path . $img;
	}
}else{
	
}
?>
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
			<h1>Cart page</h1>
		</div>
		<!-- /page_header -->
		<table class="table table-striped cart-list">
			<thead>
				<tr>
					<th>
						Product
					</th>
					<th>
						Price
					</th>
					<th>
						Quantity
					</th>
					<th>
						Subtotal
					</th>
					<th>

					</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
					foreach ($_SESSION['cart'] as $item) {
						echo '<tr data-id="' . $item['id_sp'] . '">
								<td>
									<div class="thumb_cart">
										<img src="'.$hinh.'" class="lazy" alt="Ảnh">
									</div>
									<span class="item_cart">' . $item['ten_sp'] . ' (Size: ' . $item['size'] . ')</span>
								</td>
								<td id="price_' . $item['id_sp'] . '">
									<strong>$' . $item['gia_khuyenmai'] . '</strong>
								</td>
								<td>
								<form action="index.php?act=update" method="post" class="update-form">
									<input type="hidden" name="id_sp" value="' . $item['id_sp'] . '">
									<div >
									<input type="number" value="' . $item['soluong'] . '" class="qty2" name="quantity_' . $item['id_sp'] . '" oninput="updateQuantity(this)" min="1" max="20" style="margin-right:160px; width: 50px; height: 40px; background-color:white">
									</div>
								</form>

								</td>
								<td id="total_' . $item['id_sp'] . '">
									<strong>$' . ($item['gia_khuyenmai'] * $item['soluong']) . '</strong>
								</td>
								<td class="options">
									<a href="index.php?act=remove&id_sp=' . $item['id_sp'] . '"><i class="ti-trash"></i></a>
								</td>
							</tr>';
					}
				} else {
					echo "<h3 style='text-align:center;'>Your cart is empty!</h3>";
				}
				?>
			</tbody>
		</table>

		<div class="row add_top_30 flex-sm-row-reverse cart_actions">
			<div class="col-sm-4 text-end">
				<button type="button" class="btn_1 gray"><a href="index.php?act=danhmuc">Update Cart</a></button>
			</div>
			<div class="col-sm-8">
				<div class="apply-coupon">
					<form action="index.php?act=apply_coupon" method="post">
						<div class="form-group">
							<div class="row g-2">
								<div class="col-md-6">
									<input type="text" name="coupon-code" placeholder="Promo code" class="form-control">
								</div>
								<div class="col-md-4">
									<button type="submit" class="btn_1 outline">Apply Coupon</button>
								</div>
							</div>
						</div>
					</form>
					<?php
					if (isset($thongbao) && ($thongbao != "")) {
						echo $thongbao;
					}
					?>
				</div>

			</div>
		</div>
		<!-- /cart_actions -->

	</div>
	<!-- /container -->

	<div class="box_cart">
		<div class="container">
			<div class="row justify-content-end">
				<div class="col-xl-4 col-lg-4 col-md-6">
					<!-- Trong trang hiện tại hoặc trang giỏ hàng -->
					<ul>
						<li>
							<span>Subtotal</span> $<?php echo number_format($total, 2); ?>
						</li>
						<?php
						// Kiểm tra giỏ hàng có sản phẩm không để quyết định hiển thị phí vận chuyển và giảm giá
						if (!empty($_SESSION['cart'])) {
							echo '<li>
									<span>Shipping</span> $7.00
								</li>';
							if (isset($_POST['coupon-code'])&& $couponInfo) {
								echo '<li>
										<span>Discount</span> -$' . number_format($discount, 2) . '
									</li>';

								echo '<li>
										<span>Total</span> $' . number_format($discountedTotal + 7, 2) . '
									</li>';
							} else {
								// Nếu không có mã giảm giá, hiển thị tổng giá không giảm giá
								echo '<li>
										<span>Total</span> $' . number_format($total + 7, 2) . '
									</li>';
							}
						} else {
							// Nếu giỏ hàng trống, hiển thị thông báo hoặc thực hiện hành động khác
							echo '<li>
									<span>Total</span> $' . number_format($total, 2) . '
								</li>';
						}
						?>
					</ul>

					<?php
					if (isset($_SESSION['username'])) {
						// Kiểm tra nếu giỏ hàng không trống
						if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
							// Nếu đã đăng nhập và giỏ hàng không trống, chuyển hướng đến trang thanh toán
							echo '<a href="index.php?act=thanhtoan" class="btn_1 full-width cart">Proceed to Checkout</a>';
							exit();
						} else {
							// Nếu giỏ hàng trống, hiển thị thông báo hoặc thực hiện hành động khác
							echo '<p>Your cart is empty. Please add items to your cart before proceeding to checkout.</p>';
							echo '<a href="index.php?act=danhmuc" class="btn_1 full-width cart">Mua Hàng</a>';
						}
					} else {
						echo '<a href="index.php?act=dangnhap" class="btn_1 full-width cart">Proceed to Checkout</a>';
					}
					?>

				</div>
			</div>
		</div>
	</div>

	<!-- /box_cart -->
	<script>
		function updateQuantity(inputElement) {
			// Lấy giá trị hiện tại của input
			var currentValue = inputElement.value;

			// Chuyển đổi giá trị thành số nguyên
			var intValue = parseInt(currentValue, 10);

			// Kiểm tra giới hạn tối đa
			if (intValue > 20) {
				// Nếu vượt quá giới hạn, đặt giá trị mới là 20
				inputElement.value = 20;
			}
		}

		function updateQuantity(element, operation) {
			var input = element.parentElement.querySelector('input[type="text"]');
			var currentQuantity = parseInt(input.value);
			if (operation === 'plus') {
				input.value = currentQuantity + 1;
			} else if (operation === 'minus' && currentQuantity > 1) {
				input.value = currentQuantity - 1;
			}
			updateTotalPrice(input);

			// Create a new AJAX request
			var xhr = new XMLHttpRequest();
			xhr.open('POST', 'index.php?act=update', true);
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

			// Add the callback function
			xhr.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					// The request completed successfully
					console.log('AJAX request successful: ', this.responseText);
				}
			};

			// Send the request with the product id and new quantity
			xhr.send('id_sp=' + encodeURIComponent(input.name.split('_')[1]) + '&quantity_' + input.name.split('_')[1] + '=' + encodeURIComponent(input.value));
		}

		function updateTotalPrice(element) {
			var quantity = parseInt(element.value);
			var row = element.closest('tr');
			var priceElement = row.querySelector('td[id^="price_"]');
			var totalElement = row.querySelector('td[id^="total_"]');
			var price = parseFloat(priceElement.textContent.replace('$', ''));
			var total = (price * quantity).toFixed(2);
			totalElement.textContent = '$' + total;
		}


		document.addEventListener('input', function(event) {
			// Check if the input element belongs to the class "qty2"
			if (event.target && event.target.classList.contains('qty2')) {
				updateTotalPrice(event.target);
			}
		});
	</script>



</main>
<!--/main-->