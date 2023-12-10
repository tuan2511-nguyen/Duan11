<div class="admin-container">
    <aside class="admin-sidebar">
        <h2>Admin Panel</h2>
        <nav>
            <ul>
                <li><a href="index.php?act=add-danhmuc">Thêm Danh mục</a></li>
                <li>
                    <a href="index.php?act=add-sanpham">Thêm Sản phẩm</a>
                </li>
                <li><a href="index.php?act=dstk">QL Tài khoản</a></li>
                <li><a href="index.php?act=dsbl">QL Bình luận</a></li>
                <li><a href="index.php?act=dsdh" class="active">QL Đơn hàng</a></li>
                <li><a href="index.php?act=thongke">Thống kê</a></li>
            </ul>
        </nav>
    </aside>
    <main class="admin-content">
        <div class="box1">
            <a href="../index.php">
                <input type="button" value="Trở về trang bán hàng">
            </a>
        </div>
        <div class="box2">
            <h2 style="text-align: center;">Danh sách đơn hàng</h2>

            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
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
                    foreach ($listdh as $hd) {
                        if ($hd['id_hd'] != $current_order_id) {
                            if ($current_order_id !== null) {
                                echo '</td>
                                        <td>' . $current_hd['hoten'] . '</td> <!-- Add this line -->
                                        <td>' . $current_hd['thanhtoan'] . '</td>
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
                            echo ', ';
                        }
                        echo $hd['ten_sp'];
                        $current_hd = $hd;
                    }
                    if ($current_order_id !== null) {
                        echo '</td>
                                <td>' . $current_hd['hoten'] . '</td> <!-- Add this line -->
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
                    echo '<li class="pagi"><a href="index.php?act=dsdh&page=' . ($current_page - 1) . '">Prev</a> </li>';
                }
                for ($i = 1; $i <= $total_page; $i++) {

                    if ($i == $current_page) {
                        echo '<li class="pagi"><a>' . $i . '</a></li>';
                    } else {
                        echo '<li class="pagi"><a href="index.php?act=dsdh&page=' . $i . '">' . $i . '</a></li>';
                    }
                }

                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1) {
                    echo '<li class="pagi"><a href="index.php?act=dsdh&page=' . ($current_page + 1) . '">Next</a> </li>';
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
                        window.location.href = 'index.php?act=ctdh&id_hd=' + orderId;
                    });
                });
            </script>
            <br>
            <?php
            if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
            ?>
        </div>
    </main>
</div>