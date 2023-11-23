<div class="admin-container">
            <aside class="admin-sidebar">
                <h2>Admin Panel</h2>
                <nav>
                    <ul>
                        <li><a href="index.php?act=add-danhmuc">Thêm Danh mục</a></li>
                        <li>
                            <a href="index.php?act=add-sanpham" class="active">Thêm Sản phẩm</a>
                                <ul class="submenu">
                                    <li><a href="#">Thêm CT Sản phẩm</a></li>
                                </ul>
                        </li>
                        <li><a href="index.php?act=dstk">QL Tài khoản</a></li>
                        <li><a href="index.php?act=dsbl">QL Bình luận</a></li>
                        <li><a href="index.php?act=thongke">Thống kê</a></li>
                    </ul>
                </nav>
            </aside>
            <main class="admin-content">
                <!-- Nội dung trang được thay đổi tại đây -->
                <h1 style="text-align: center;">Trang Thêm Sản phẩm</h1>
                <!-- Nội dung của trang "Thêm Sản Phẩm" -->
                <form action="index.php?act=add-sanpham" method="post" enctype="multipart/form-data" class="add-product-form">
                    <div class="form1">
                        <label for="productSize">Danh mục:</label>
                            <select id="productSize" name="iddm" required>
                                <?php
                                    foreach ($listdanhmuc as $danhmuc) {
                                        extract($danhmuc);
                                        echo '<option value="'.$id_dm.'">'.$ten_dm.'</option>';
                                    }
                                ?>
                            </select>

                        <label for="productName">Tên Sản Phẩm:</label>
                        <input type="text" id="productName" name="tensp" required>

                        <label for="productName">Hình Sản Phẩm:</label>
                        <input type="file" id="productName" name="hinh" multiple required>

                        <label for="productPrice">Giá:</label>
                        <input type="text" id="productPrice" name="giasp" required>

                        <label for="productPrice">Giá khuyến mãi:</label>
                        <input type="text" id="productPrice" name="giakm" required>

                        <label for="productDescription">Mô Tả:</label>
                        <textarea id="productDescription" name="mota" rows="4" required></textarea>

                    </div>
                    <div class="form2">
                        <input type="submit" name="themmoi" value="Thêm Sản phẩm">
                        <a href="index.php?act=list-sanpham" class="button"><input type="button" value="Danh sách"></a>
                    </div>
                    <?php
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>

                </form>
            </main>
</div>