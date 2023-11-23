<?php
    if(is_array($dm)){
        extract($dm);

    }
?>
<div class="admin-container">
            <aside class="admin-sidebar">
                <h2>Admin Panel</h2>
                <nav>
                    <ul>
                        <li><a href="index.php?act=add-danhmuc" class="active">Thêm Danh mục</a></li>
                        <li>
                            <a href="index.php?act=add-sanpham">Thêm Sản phẩm</a>
                                <ul class="submenu">
                                    <li><a href="#">Thêm CT Sản phẩm</a></li>
                                </ul>
                        </li>
                        <li><a href="index.php?act=dstk">QL Tài khoản</a></li>
                        <li><a href="index.php?act=dsbl">QL Bình luận</a></li>
                        <li><a href="#index.php?act=thongke">Thống kê</a></li>
                    </ul>
                </nav>
            </aside>
            <main class="admin-content">
                <!-- Nội dung trang được thay đổi tại đây -->
                <h1 style="text-align: center;">Trang Cập Nhật Danh mục</h1>
                <!-- Nội dung của trang "Thêm Sản Phẩm" -->
                <form action="index.php?act=update-danhmuc" method="post" class="add-product-form">
                    <div class="form1">
                        <label for="productName">Tên Danh mục:</label>
                        <input type="text" name="ten_dm" value="<?php if(isset($ten_dm)&&($ten_dm!="")) echo $ten_dm;?>" required>
                    </div>
                    <div class="form2">
                        <input type="hidden" name="id_dm" value="<?php if(isset($id_dm)&&($id_dm>0)) echo $id_dm;?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <a href="index.php?act=list-danhmuc" class="button"><input type="button" value="Danh sách"></a>
                    </div>
                    <?php
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>

                </form>
            </main>
</div>