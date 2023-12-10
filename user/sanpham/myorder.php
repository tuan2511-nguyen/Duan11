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
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Phương thức thanh toán</th>
                        <th>Tổng giá tiền</th>
                        <th>Trạng thái</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = 1;
                    $current_order_id = null;
                    $current_hd = null;

                    foreach ($hoadon as $hd) {
                        if ($hd['id_hd'] != $current_order_id) {
                            // Khi bắt đầu một đơn hàng mới, đóng hàng trước đó nếu có
                            if ($current_order_id !== null) {
                                echo '</td>
                                        <td>' . $current_hd['hoten'] . '</td>
                                        <td>' . $current_hd['thanhtoan'] . '</td>
                                        <td>' . $current_hd['tonggia'] . '$</td>
                                        <td>' . $current_hd['trangthai'] . '</td>
                                        <td>
                                            <button class="cancel-order" data-order-id="' . $current_hd['id_hd'] . '">Hủy đơn</button>
                                            <button class="ct-order" data-order-id="' . $current_hd['id_hd'] . '">Chi tiết</button> 
                                        </td>
                                    </tr>';
                            }

                            // Bắt đầu một hàng mới
                            echo '<tr>
                                    <td>' . $stt++ . '</td>
                                    <td>';
                            echo $hd['ma_hd'];
                            $current_order_id = $hd['id_hd'];
                        }
                        // Lưu thông tin chi tiết của đơn hàng hiện tại
                        $current_hd = $hd;
                    }

                    // Đóng hàng cuối cùng
                    if ($current_order_id !== null) {
                        echo '</td>
                                <td>' . $current_hd['hoten'] . '</td>
                                <td>' . $current_hd['thanhtoan'] . '</td>
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
			<div>
                <?php
                if ($current_page > 1 && $total_page > 1) {
                    echo '<li class="pagi"><a href="index.php?act=myorder&page=' . ($current_page - 1) . '">Prev</a> </li>';
                }
                for ($i = 1; $i <= $total_page; $i++) {

                    if ($i == $current_page) {
                        echo '<li class="pagi"><a>' . $i . '</a></li>';
                    } else {
                        echo '<li class="pagi"><a href="index.php?act=myorder&page=' . $i . '">' . $i . '</a></li>';
                    }
                }

                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1) {
                    echo '<li class="pagi"><a href="index.php?act=myorder&page=' . ($current_page + 1) . '">Next</a> </li>';
                }
                ?>
            </div>
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