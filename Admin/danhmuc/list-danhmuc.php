<div class="admin-container">
    <aside class="admin-sidebar">
        <h2>Admin Panel</h2>
        <nav>
            <ul>
                <li><a href="index.php?act=add-danhmuc" class="active">Thêm Danh mục</a></li>
                <li>
                            <a href="index.php?act=add-sanpham">Thêm Sản phẩm</a>
                        </li>
                <li><a href="index.php?act=dstk">QL Tài khoản</a></li>
                <li><a href="index.php?act=dsbl">QL Bình luận</a></li>
                <li><a href="#index.php?act=thongke">Thống kê</a></li>
            </ul>
        </nav>
    </aside>
    <main class="admin-content">
<<<<<<< Updated upstream
        <div class="box1">
        <a href="../index.php">
                <input type="button" value="Trở về trang bán hàng">
=======
        <h2 style="text-align: center;">Danh sách danh mục</h2>

        <table>
            <thead>
                <tr>
                    <th>Mã loại</th>
                    <th>Tên loại</th>
                    <th class="action-column">Chức năng</th>
                </tr> 
            </thead>
            <?php
                foreach ($listdm as $dm){
                    extract($dm);
                    $suadm="index.php?act=suadm&id_dm=".$id_dm;
                    $xoadm="index.php?act=xoadm&id_dm=".$id_dm;

                    echo '<tbody>
                            <tr>
                                <td>'.$id_dm.'</td>
                                <td>'.$ten_dm.'</td>
                                <td class="action-column">
                                    <a href="'.$suadm.'"> <button class="edit-button">Sửa</button> </a>
                                    <a href="'.$xoadm.'"> <button class="delete-button">Xóa</button> </a>
                                </td>
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
        <div>
            <a href="index.php?act=add-danhmuc"  class="form">
                <input type="button" value="Thêm Danh mục">
>>>>>>> Stashed changes
            </a>
        </div>
        <div class="box2">
            <h2 style="text-align: center;">Danh sách danh mục</h2>

            <table>
                <thead>
                    <tr>
                        <th>Mã loại</th>
                        <th>Tên loại</th>
                        <th class="action-column">Chức năng</th>
                    </tr>
                </thead>
                <?php
                    foreach ($listdm as $dm){
                        extract($dm);
                        $suadm="index.php?act=suadm&id_dm=".$id_dm;
                        $xoadm="index.php?act=xoadm&id_dm=".$id_dm;

                        echo '<tbody>
                                <tr>
                                    <td>'.$id_dm.'</td>
                                    <td>'.$ten_dm.'</td>
                                    <td class="action-column">
                                        <a href="'.$suadm.'"> <button class="edit-button">Sửa</button> </a>
                                        <a href="'.$xoadm.'"> <button class="delete-button">Xóa</button> </a>
                                    </td>
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
            <div>
                <a href="index.php?act=add-danhmuc"  class="form">
                    <input type="button" value="Thêm Danh mục">
                </a>
            </div>
            <br>
            <?php
                            if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                        ?>
        </div>               
    </main>
</div>

