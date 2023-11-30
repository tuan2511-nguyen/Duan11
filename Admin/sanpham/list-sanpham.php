<div class="admin-container">
    <aside class="admin-sidebar">
        <h2>Admin Panel</h2>
        <nav>
            <ul>
                <li><a href="index.php?act=add-danhmuc" >Thêm Danh mục</a></li>
                <li>
                            <a href="index.php?act=add-sanpham" class="active">Thêm Sản phẩm</a>
                        </li>
                <li><a href="index.php?act=dstk">QL Tài khoản</a></li>
                <li><a href="index.php?act=dsbl">QL Bình luận</a></li>
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
        <h2 style="text-align: center;">Danh sách sản phẩm</h2>
        <form action="index.php?act=list-sanpham" method="post" class="add-product-form">
            <div class="form12">
                <select id="productSize" name="iddm" required>
                    <option value="0" selected>Tất cả</option>
                    <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            echo '<option value="'.$id_dm.'">'.$ten_dm.'</option>';
                        }
                    ?>
                </select>
                <input type="submit" name="listok" value="OK">
            </div>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Mã loại</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình</th>
                    <th>Giá</th>
                    <th>Giá khuyến mãi</th>
                    <th>Mô tả</th>
                    <th class="action-column">Chức năng</th>
                </tr>
            </thead>
            <?php
                foreach ($listsp as $sp){
                    extract($sp);
                    $suasp="index.php?act=suasp&id_sp=".$id_sp;
                    $xoasp="index.php?act=xoasp&id_sp=".$id_sp;
                    $bienthe="index.php?act=bienthe&id_sp=".$id_sp;
                    $hinhpath="../upload/".$img;
                    if(is_file($hinhpath)){
                        $hinh="<img src='".$hinhpath."' height='80px'>";
                    }else{
                        $hinh="no photo";
                    }
                    echo '<tbody> 
                            <tr>
                                <td>'.$id_dm.'</td>
                                <td>'.$ten_sp.'</td>
                                <td>'.$hinh.'</td>
                                <td>'.$gia_goc.'</td>
                                <td>'.$gia_khuyenmai.'</td>
                                <td>'.$mota.'</td>
                                <td class="action-column">
                                    <a href="'.$bienthe.'"> <button class="edit-button">Biến thể</button> </a>
                                    <a href="'.$suasp.'"> <button class="edit-button">Sửa</button> </a>
                                    <a href="'.$xoasp.'"> <button class="delete-button">Xóa</button> </a>
                                </td>
                            </tr>
                        </tbody>';
            }
            ?>
        </table>
        <?php
            if ($current_page > 1 && $total_page > 1){
            echo '<li class="pagi"><a href="index.php?act=list-sanpham&page='.($current_page-1).'">Prev</a> </li>';
            }
            for ($i = 1; $i <= $total_page; $i++){
                
                if ($i == $current_page){
                    echo '<li class="pagi"><a>'.$i.'</a></li>';
                }
                else{
                    echo '<li class="pagi"><a href="index.php?act=list-sanpham&page='.$i.'">'.$i.'</a></li>';
                }
            }

            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<li class="pagi"><a href="index.php?act=list-sanpham&page='.($current_page+1).'">Next</a> </li>';
            }
        ?>
        <br><br><br><br>
        <div>
            <a href="index.php?act=add-sanpham"  class="form">
                <input type="button" value="Thêm Sản phẩm">
            </a>
        </div>
        <br>
        <?php
            if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
        ?>
    </main>
    </div>
</div>
