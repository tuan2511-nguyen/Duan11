<?php
    if(is_array($sanpham)){
        extract($sanpham);

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
                <h1 style="text-align: center;">Trang Thêm biến thể Sản phẩm</h1>
                <!-- Nội dung của trang "Thêm Sản Phẩm" -->
                <form action="index.php?act=bienthe-sanpham" method="post" class="add-product-form">
                    <div class="form1">
                        <label for="productName">Tên Sản Phẩm:</label>
                        <input type="text" id="productName" name="tensp" value="<?=$ten_sp?>" required>

                        <label for="productColor">Màu Sắc:</label>
                        <input type="text" id="productColor" name="mausac" required>

                        <label for="productSize">Size:</label>
                        <select id="productSize" name="size" required>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                        </select> <br><br>

                        <label for="productQuantity">Số Lượng:</label>
                        <input type="number" id="productQuantity" name="soluong" required>

                    </div>
                    <div class="form2">
                        <input type="hidden" name="id_sp" value="<?php if(isset($id_sp)&&($id_sp>0)) echo $id_sp;?>">
                        <input type="submit" name="them" value="Thêm">
                        <a href="index.php?act=list-sanpham" class="button"><input type="button" value="Danh sách"></a>
                    </div>
                    <?php
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>

                </form>
            </main>
</div>