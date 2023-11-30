<div class="admin-container">
    <aside class="admin-sidebar">
        <h2>Admin Panel</h2>
        <nav>
            <ul>
                <li><a href="index.php?act=add-danhmuc">Thêm Danh mục</a></li>
                <li>
                    <a href="index.php?act=add-sanpham">Thêm Sản phẩm</a>
                </li>
                <li><a href="index.php?act=dstk" class="active">QL Tài khoản</a></li>
                <li><a href="index.php?act=dsbl">QL Bình luận</a></li>
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
            <h2 style="text-align: center;">Danh sách tài khoản</h2>

            <table>
                <thead>
                    <tr>
                        <th>Mã user</th>
                        <th>Username</th>
                        <th>Pas</th>
                        <th>Email</th>
                        <th>Fullname</th>
                        <th>SĐT</th>
                        <th>Địa chỉ</th>
                        <th>Vai trò</th>
                        <th class="action-column">Chức năng</th>
                        <!--
                        <th class="action-column">Chức năng</th>-->
                    </tr>
                </thead>
                <?php
                foreach ($listtaikhoan as $taikhoan) {
                    extract($taikhoan);
                    $suauser = "index.php?act=suauser&id_user=" . $id_user;
                    $xoauser = "index.php?act=xoauser&id_user=" . $id_user;

                    echo '<tbody>
                                <tr>
                                    <td>' . $id_user . '</td>
                                    <td>' . $username . '</td>
                                    <td>' . $pass . '</td>
                                    <td>' . $email . '</td>
                                    <td>' . $hoten . '</td>
                                    <td>' . $sdt . '</td>
                                    <td>' . $diachi . '</td>
                                    <td>' . $vaitro . '</td>
                                    <td class="action-column">
                                        <a href="' . $suauser . '"> <button class="edit-button">Sửa</button> </a>
                                        <a href="' . $xoauser . '"> <button class="delete-button">Xóa</button> </a>
                                    </td>
                                </tr>
                            </tbody>';
                }
                ?>
            </table>
            <div><!--
                <a href="index.php?act=add-danhmuc"  class="form">
                    <input type="button" value="Thêm Danh mục">
                </a>-->
            </div>
            <br>
            <?php
            if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
            ?>
        </div>
    </main>
</div>