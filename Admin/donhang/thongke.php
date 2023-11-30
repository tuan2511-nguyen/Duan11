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
                <li><a href="index.php?act=dsdh">QL Đơn hàng</a></li>
                <li><a href="index.php?act=thongke" class="active">Thống kê</a></li>
            </ul>
        </nav>
    </aside>
    <main class="admin-content">
        <div class="box1">
            <a href="../index.php">
                <input type="button" value="Trở về trang bán hàng">
            </a>
        </div>
        <br><br><br>
        <div class="box2">
            <div class="form12">
                <h3>Tổng doanh thu: <?= $doanhThu ?>$</h3>
            </div>
            <h4 style="text-align: center;">Danh sách sản phẩm bán chạy</h4>
            <table>
                <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng đã bán</th>
                    </tr>
                </thead>
                <?php
                $stt = 1;
                foreach ($listsp_bc as $spbc) {
                    extract($spbc);
                    echo '<tbody>
                                <tr>
                                    <td>' . $stt++ . '</td>
                                    <td>' . $ten_sp . '</td>
                                    <td>' . $So_luong_da_ban . '</td>
                                </tr>
                            </tbody>';
                }
                ?>
            </table>
            <!-- <?php
            if ($current_page > 1 && $total_page > 1) {
                echo '<li class="pagi"><a href="index.php?act=thongke&page=' . ($current_page - 1) . '">Prev</a> </li>';
            }
            for ($i = 1; $i <= $total_page; $i++) {

                if ($i == $current_page) {
                    echo '<li class="pagi"><a>' . $i . '</a></li>';
                } else {
                    echo '<li class="pagi"><a href="index.php?act=thongke&page=' . $i . '">' . $i . '</a></li>';
                }
            }

            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1) {
                echo '<li class="pagi"><a href="index.php?act=thongke&page=' . ($current_page + 1) . '">Next</a> </li>';
            }
            ?> -->
            <br><br><br><br>
            <br>
            <?php
            if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
            ?>
    </main>
</div>
</div>