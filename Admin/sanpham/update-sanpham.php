<?php
    if(is_array($sanpham)){
        extract($sanpham);

    }
    $hinhpath="../upload/".$img;
    if(is_file($hinhpath)){
        $hinh="<img src='".$hinhpath."' height='80px'>";
    }else{
        $hinh="no photo";
    }
?>
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
                <!-- Nội dung trang được thay đổi tại đây -->
                <h1 style="text-align: center;">Trang Cập Nhật Sản phẩm</h1>
                <!-- Nội dung của trang "Thêm Sản Phẩm" -->
                <form action="index.php?act=update-sanpham" method="post" enctype="multipart/form-data" class="add-product-form">
                    <div class="form1">
                        <label for="productName">Danh mục:</label>
                        <select id="productSize" name="iddm" required>
                            <option value="0" selected>Tất cả</option>
                            <?php
                                foreach ($listdanhmuc as $danhmuc) {
                                    extract($danhmuc);
                                    if($id_dm==$id_dm) $s="selected"; else $s="";
                                    echo '<option value="'.$id_dm.'" '.$s.'>'.$ten_dm.'</option>';
                                    
                                }
                            ?>
                        </select>

                        <label for="productName">Tên Sản Phẩm:</label>
                        <input type="text" id="productName" name="tensp" value="<?=$ten_sp?>" required>

                        <label for="productName">Hình Sản Phẩm:</label>
                        <input type="file" id="productName" multiple name="hinh"><?=$hinh?>

                        <label for="productPrice">Giá:</label>
                        <input type="text" id="productPrice" name="giasp" value="<?=$gia_goc?>" required>

                        <label for="productPrice">Giá khuyến mãi:</label>
                        <input type="text" id="productPrice" name="giakm" value="<?=$gia_khuyenmai?>" required>
                        
                        <label for="productDescription">Mô Tả:</label>
                        <textarea id="productDescription" name="mota" rows="4" required><?=$mota?></textarea>
                        
                    </div>
                    <div class="form2">
                        <input type="hidden" name="id_sp" value="<?php if(isset($id_sp)&&($id_sp>0)) echo $id_sp;?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <a href="index.php?act=list-sanpham" class="button"><input type="button" value="Danh sách"></a>
                    </div>
                </form>
            </main>
</div>