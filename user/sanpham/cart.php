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
		<?php
		echo var_dump($_SESSION['cart']);
		?>
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
										<img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/1.jpg" class="lazy" alt="Ảnh">
									</div>
									<span class="item_cart">' . $item['ten_sp'] . ' (Size: ' . $item['size'] . ')</span>
								</td>
								<td id="price_' . $item['id_sp'] . '">
									<strong>$' . $item['gia_khuyenmai'] . '</strong>
								</td>
								<td>
								<form action="index.php?act=update" method="post" class="update-form">
									<input type="hidden" name="id_sp" value="' . $item['id_sp'] . '">
									<div class="numbers-row">
										<div class="dec button_inc" onclick="updateQuantity(this,minus)">-</div>
										<input type="text" value="' . $item['soluong'] . '" class="qty2" name="quantity_' . $item['id_sp'] . '" onclick="updateTotalPrice(this)">
										<div class="inc button_inc" onclick="updateQuantity(this, plus)">+</div>
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
				}
				?>
			</tbody>
		</table>

		<div class="row add_top_30 flex-sm-row-reverse cart_actions">
			<div class="col-sm-4 text-end">
				<button type="button" class="btn_1 gray">Update Cart</button>
			</div>
			<div class="col-sm-8">
				<div class="apply-coupon">
					<div class="form-group">
						<div class="row g-2">
							<div class="col-md-6"><input type="text" name="coupon-code" value="" placeholder="Promo code" class="form-control"></div>
							<div class="col-md-4"><button type="button" class="btn_1 outline">Apply Coupon</button></div>
						</div>
					</div>
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
					<ul>
						<li>
							<span>Subtotal</span> $<?php echo number_format($total, 2); ?>
						</li>
						<li>
							<span>Shipping</span> $7.00
						</li>
						<li>
							<span>Total</span> $<?php echo number_format($total + 7, 2); ?>
						</li>
					</ul>
					<a href="cart-2.html" class="btn_1 full-width cart">Proceed to Checkout</a>
				</div>
			</div>
		</div>
	</div>

	<!-- /box_cart -->
	<script>
		function updateTotalPrice(input) {
			const newQuantity = parseInt(input.value);
			const itemID = input.closest('tr').getAttribute('data-id');
			const price = parseFloat(document.getElementById('price_' + itemID).innerText.replace('$', ''));
			const newTotal = price * newQuantity;
			document.getElementById('total_' + itemID).innerHTML = '<strong>$' + newTotal.toFixed(2) + '</strong>';

			// Gọi hàm để cập nhật tổng tiền tổng cộng và gửi dữ liệu lên máy chủ
			updateOverallTotal(itemID, newQuantity);
		}


		function updateQuantity(element, operation) {
			const input = element.parentElement.querySelector('.qty2');
			let newQuantity = parseInt(input.value);

			if (operation === 'plus') {
				newQuantity += 1;
			} else if (operation === 'minus' && newQuantity > 1) {
				newQuantity -= 1;
			}

			input.value = newQuantity;
			updateTotalPrice(input);
		}


		function updateOverallTotal(itemID, newQuantity) {
			let overallTotal = 0;
			const totalElements = document.querySelectorAll('.item_gio_hang .tongtien');

			totalElements.forEach(totalElement => {
				const price = parseFloat(totalElement.textContent.replace('$', ''));
				overallTotal += price;
			});

			const overallTotalElement = document.querySelector('.tong_tien_cac_san_pham strong');
			overallTotalElement.textContent = '$' + overallTotal.toFixed(2);

			// Kiểm tra xem người dùng có đăng nhập hay không
			const isUserLoggedIn = <?php echo isset($_SESSION['username']) ? 'true' : 'false'; ?>;

			// Nếu người dùng đã đăng nhập, gửi thông tin cập nhật giỏ hàng lên máy chủ
			if (isUserLoggedIn) {
				updateCartOnServer(itemID, newQuantity);
			}
		}

		function updateCartOnServer(itemID, newQuantity) {
			// Gọi Ajax để gửi dữ liệu cập nhật lên máy chủ
			// Sử dụng fetch hoặc XMLHttpRequest để thực hiện yêu cầu POST đến máy chủ
			// Gửi các tham số như itemID và newQuantity
			fetch('index.php?act=update', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
					},
					body: JSON.stringify({
						itemID: itemID,
						newQuantity: newQuantity
					}),
				})
				.then(response => {
					if (!response.ok) {
						throw new Error('Network response was not ok');
					}
					// Xử lý phản hồi từ máy chủ nếu cần
				})
				.catch(error => {
					console.error('Fetch error:', error);
				});
		}
	</script>

</main>
<!--/main-->