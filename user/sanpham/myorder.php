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
					<th>
						STT
					</th>
					<th>
						Tên sản phẩm
					</th>
					<th>
						Phương thức thanh toán
					</th>
					<th>
						Tổng giá tiền
					</th>
					<th>
						Trạng thái
					</th>
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
							echo '</td>
									<td>' . $current_hd['thanhtoan'] . '</td>
									<td>' . $current_hd['tonggia'] . '$</td>
									<td>' . $current_hd['trangthai'] . '</td>
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
					echo '</td>
							<td>' . $current_hd['thanhtoan'] . '</td>
							<td>' . $current_hd['tonggia'] . '$</td>
							<td>' . $current_hd['trangthai'] . '</td>
						</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
	<!-- /cart_actions -->

	</div>
	<!-- /container -->
</main>
<br><br><br><br><br><br><br>
<!--/main-->