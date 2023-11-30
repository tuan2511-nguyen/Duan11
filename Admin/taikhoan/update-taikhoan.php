<?php
    if(is_array($taikhoan)){
        extract($taikhoan);

    }
?>
<div class="admin-container">
    <aside class="admin-sidebar">
        <h2>Admin Panel</h2>
        <nav>
            <ul>
                <li><a href="index.php?act=add-danhmuc" >Thêm Danh mục</a></li>
                <li>
                    <a href="index.php?act=add-sanpham">Thêm Sản phẩm</a>
                </li>
                <li><a href="index.php?act=dstk"  class="active">QL Tài khoản</a></li>
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
        <div class="box21">
            <!-- Nội dung trang được thay đổi tại đây -->
            <h2 style="text-align: center;">Trang cập nhật tài khoản</h2>
            <!-- Nội dung của trang "Thêm Sản Phẩm" -->	
            <form action="index.php?act=update-taikhoan" method="POST" class="add-product-form" >
                <div class="form1">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?=$username?>" required><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="pass" value="<?=$pass?>"><br>

                <label for="phone">Vai trò:</label>
                <input type="tel" id="phone" name="vaitro" value="<?=$vaitro?>" required><br>

                <div class="form2">
                    <input type="hidden" name="id_user" value="<?php if(isset($id_user)&&($id_user>0)) echo $id_user;?>">
                    <input type="submit" name="thaydoi" value="Thay đổi ">
            </form>
        </div>
    </main>
</div>