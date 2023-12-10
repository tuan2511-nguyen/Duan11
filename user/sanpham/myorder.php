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
			<h1>Đơn Hàng</h1>
		</div>
		<!-- /page_header -->
		<table>
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên sản phẩm</th>
					<th>Phương thức thanh toán</th>
					<th>Tổng giá tiền</th>
					<th>Trạng thái</th>
					<th>Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$stt = 1;
				$current_order_id = null;
				$current_hd = null;
				foreach ($hoadon as $hd) {
					if ($hd['id_hd'] != $current_order_id) {
						// Nếu đây là một đơn hàng mới, kết thúc hàng hiện tại và bắt đầu một hàng mới
						if ($current_order_id !== null) {
							echo '<td>' . $current_hd['thanhtoan'] . '</td>
									<td>' . $current_hd['tonggia'] . '$</td>
									<td>' . $current_hd['trangthai'] . '</td>
									<td>
										<button class="cancel-order" data-order-id="' . $current_hd['id_hd'] . '">Hủy đơn</button>
										<button class="ct-order" data-order-id="' . $current_hd['id_hd'] . '">Chi tiết</button>
									</td>
								</tr>';
						}
						echo '<tr>
								<td>' . $stt++ . '</td>
								<td>';
						$current_order_id = $hd['id_hd'];
					} else {
						// Nếu đây là cùng một đơn hàng, thêm một dấu phẩy và một khoảng trắng trước tên sản phẩm
						echo ', ';
					}
					echo $hd['ten_sp'];
					$current_hd = $hd;
				}
				if ($current_order_id !== null) {
					echo '<td>' . $current_hd['thanhtoan'] . '</td>
							<td>' . $current_hd['tonggia'] . '$</td>
							<td>' . $current_hd['trangthai'] . '</td>
							<td>
								<button class="cancel-order" data-order-id="' . $current_hd['id_hd'] . '">Hủy đơn</button>
								<button class="ct-order" data-order-id="' . $current_hd['id_hd'] . '">Chi tiết</button>
							</td>
						</tr>';
				}
				?>
			</tbody>
		</table>
		<script>
			document.querySelectorAll('.cancel-order').forEach(function(button) {
				button.addEventListener('click', function() {
					var orderId = this.dataset.orderId;
					window.location.href = 'index.php?act=huy_dh&id_hd=' + orderId;
				});
			});
		</script>
		<script>
			document.querySelectorAll('.ct-order').forEach(function(button) {
				button.addEventListener('click', function() {
					var orderId = this.dataset.orderId;
					window.location.href = 'index.php?act=ct_order&id_hd=' + orderId;
				});
			});
		</script>
	</div>

	</div>
	<!-- /container -->
</main>
<br><br><br><br><br><br><br>
<!--/main-->