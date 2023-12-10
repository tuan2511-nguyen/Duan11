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
                <li><a href="index.php?act=dsbl" class="active">QL Bình luận</a></li>
                <li><a href="index.php?act=dsdh">QL Đơn hàng</a></li>
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
            <h2 style="text-align: center;">Danh sách bình luận</h2>

            <table>
                <thead>
                    <tr>
                        <th>Mã bình luận</th>
                        <th>Tên sản phẩm</th>
                        <th>Tên tài khoản</th>
                        <th>Nội dung</th>
                        <th>Ngày đăng</th>
                        <!--
                        <th class="action-column">Chức năng</th>-->
                    </tr>
                </thead>
                <?php
                foreach ($listbinhluan as $binhluan) {
                    extract($binhluan);
                    $xoabl = "index.php?act=xoa_bl&id_bl=" . $id_bl;
                    echo '<tbody>
                                <tr>
                                    <td>' . $id_bl . '</td>
                                    <td>' . $ten_sp . '</td>
                                    <td>' . $username . '</td>
                                    <td>' . $noidung . '</td>
                                    <td>' . $ngaydang . '</td>
                                    <td class="action-column">
                                        <a href="' . $xoabl . '"> <button class="delete-button">Xóa</button> </a>
                                </tr>
                            </tbody>';
                }
                ?>
            </table>
            <div>
                <?php
                if ($current_page > 1 && $total_page > 1) {
                    echo '<li class="pagi"><a href="index.php?act=list-sanpham&page=' . ($current_page - 1) . '">Prev</a> </li>';
                }
                for ($i = 1; $i <= $total_page; $i++) {

                    if ($i == $current_page) {
                        echo '<li class="pagi"><a>' . $i . '</a></li>';
                    } else {
                        echo '<li class="pagi"><a href="index.php?act=list-sanpham&page=' . $i . '">' . $i . '</a></li>';
                    }
                }

                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1) {
                    echo '<li class="pagi"><a href="index.php?act=list-sanpham&page=' . ($current_page + 1) . '">Next</a> </li>';
                }
                ?>
            </div>
            <br>
            <?php
            if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
            ?>
        </div>
    </main>
</div>