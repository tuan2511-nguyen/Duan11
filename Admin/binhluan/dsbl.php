<div class="admin-container">
    <aside class="admin-sidebar">
        <h2>Admin Panel</h2>
        <nav>
            <ul>
                <li><a href="index.php?act=add-danhmuc">Thêm Danh mục</a></li>
                <li>
                            <a href="index.php?act=add-sanpham">Thêm Sản phẩm</a>
                        </li>
                <li><a href="index.php?act=dstk" >QL Tài khoản</a></li>
                <li><a href="index.php?act=dsbl"  class="active">QL Bình luận</a></li>
                <li><a href="#index.php?act=thongke">Thống kê</a></li>
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
                    foreach ($listbinhluan as $binhluan){
                        extract($binhluan);
                        $suabl="index.php?act=suabl&id_bl=".$id_bl;
                        $xoabl="index.php?act=xoabl&id_bl=".$id_bl;

                        echo '<tbody>
                                <tr>
                                    <td>'.$id_bl.'</td>
                                    <td>'.$ten_sp.'</td>
                                    <td>'.$username.'</td>
                                    <td>'.$noidung.'</td>
                                    <td>'.$ngaydang.'</td>
                                    <!--
                                    <td class="action-column">
                                        <a href=""> <button class="edit-button">Sửa</button> </a>
                                        <a href=""> <button class="delete-button">Xóa</button> </a>
                                    </td>-->
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
                            if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                        ?>
        </div>            
    </main>
</div>

