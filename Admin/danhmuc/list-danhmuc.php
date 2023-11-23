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
                foreach ($page as $pa){
                    extract($pa);
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
        <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
        <div>
            <a href="index.php?act=add-danhmuc"  class="form">
                <input type="button" value="Thêm Danh mục">
            </a>
        </div>
        <br>
        <?php
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>
                    
    </main>
</div>

