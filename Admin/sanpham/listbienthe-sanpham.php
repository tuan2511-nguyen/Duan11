
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
        <h2 style="text-align: center;">Danh sách Biến thể</h2>
        <form action="index.php?act=listbienthe-sanpham" method="post" class="add-product-form">
            <div class="form12">
                    <?php
                        foreach ($listsanpham as $sanpham) {
                            extract($sanpham);
                            $bienthe="index.php?act=bienthe&id_sp=".$id_sp;
                            echo '<h4>Sản phẩm: '.$ten_sp.'</h4>';
                        }
                    ?>
            </div>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Size</th>
                    <th>Màu sắc</th>
                    <!--<th class="action-column">Chức năng</th>-->
                </tr>
            </thead>
            <?php
                foreach ($listbienthe as $bienthe){
                    extract($bienthe);
                    $suasp="index.php?act=suasp&id_sp=".$id_sp;
                    $xoasp="index.php?act=xoasp&id_sp=".$id_sp;
                    $bienthe="index.php?act=bienthe&id_sp=".$id_sp;
                    echo '<tbody>
                            <tr>
                                <td>'.$id_sp.'</td>
                                <td>'.$size.'</td>
                                <td>'.$soluong.'</td>
                                <!--
                                <td class="action-column">
                                    <a href="'.$suasp.'"> <button class="edit-button">Sửa</button> </a>
                                    <a href="'.$xoasp.'"> <button class="delete-button">Xóa</button> </a>
                                </td>-->
                            </tr>
                        </tbody>';
            }
            ?>
        </table>
        <div>
            <?php
            echo'
            <a href="'.$bienthe.'"  class="form">
                <input type="button" value="Thêm Biến thể">
            </a>';
            ?>
        </div>
        <br>
        <?php
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>
    </main>
</div>
