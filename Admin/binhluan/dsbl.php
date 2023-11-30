<div class="admin-container">
    <aside class="admin-sidebar">
        <h2>Admin Panel</h2>
        <nav>
            <ul>
<<<<<<< Updated upstream
                <li><a href="index.php?act=add-danhmuc" >Thêm Danh mục</a></li>
=======
                <li><a href="index.php?act=add-danhmuc">Thêm Danh mục</a></li>
>>>>>>> Stashed changes
                <li>
                            <a href="index.php?act=add-sanpham">Thêm Sản phẩm</a>
                        </li>
                <li><a href="index.php?act=dstk" >QL Tài khoản</a></li>
<<<<<<< Updated upstream
                <li><a href="index.php?act=dsbl" class="active">QL Bình luận</a></li>
=======
                <li><a href="index.php?act=dsbl"  class="active">QL Bình luận</a></li>
>>>>>>> Stashed changes
                <li><a href="#index.php?act=thongke">Thống kê</a></li>
            </ul>
        </nav>
    </aside>
    <main class="admin-content">
<<<<<<< Updated upstream
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
=======
        <h2 style="text-align: center;">Danh sách bình luận</h2>

        <table>
            <thead>
                <tr>
                    <th>Mã bình luận</th>
                    <th>Mã sản phẩm</th>
                    <th>Mã tài khoản</th>
                    <th>Nội dung</th>
                    <th>Ngày đăng</th>
                    <!--<th class="action-column">Chức năng</th>-->
                </tr> 
            </thead>
            <?php
                foreach ($listbl as $bl){
                    extract($bl);
                    $suatk="index.php?act=suatk&id_user=".$id_user;
                    $xoatk="index.php?act=xoatk&id_user=".$id_user;

                    echo '<tbody>
                            <tr>
                                <td>'.$id_bl.'</td>
                                <td>'.$id_sp.'</td>
                                <td>'.$id_user.'</td>
                                <td>'.$noidung.'</td>
                                <td>'.$ngaydang.'</td>
                                <!-- <td class="action-column">
                                    <a href="'.$suatk.'"> <button class="edit-button">Sửa</button> </a>
                                    <a href="'.$xoatk.'"> <button class="delete-button">Xóa</button> </a>
                                </td> -->
                            </tr>
                        </tbody>';
                }
            ?>
        </table>
        <?php
            if ($current_page > 1 && $total_page > 1){
            echo '<li class="pagi"><a href="index.php?act=list-danhmuc&page='.($current_page-1).'">Prev</a> </li>';
            }
            for ($i = 1; $i <= $total_page; $i++){
                
                if ($i == $current_page){
                    echo '<li class="pagi"><a>'.$i.'</a></li>';
                }
                else{
                    echo '<li class="pagi"><a href="index.php?act=list-danhmuc&page='.$i.'">'.$i.'</a></li>';
                }
            }

            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<li class="pagi"><a href="index.php?act=list-danhmuc&page='.($current_page+1).'">Next</a> </li>';
            }
        ?>
        <br><br><br><br>
        <div><!--
            <a href="index.php?act=add-danhmuc"  class="form">
                <input type="button" value="Thêm Danh mục">
            </a>-->
        </div>
        <br>
        <?php
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>
                    
>>>>>>> Stashed changes
    </main>
</div>

