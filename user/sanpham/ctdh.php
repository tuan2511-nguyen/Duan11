<main class="bg_gray">
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Category</a></li>
                    <li>Page active</li>
                </ul>
            </div>
            <h1>Cart page</h1>
        </div>
        <!-- /page_header -->
        <table class="table table-striped cart-list">
            <thead>
                <tr>
                    <th>
                        Sản phẩm
                    </th>
                    <th>
                        Size
                    </th>
                    <th>
                        Số lượng
                    </th>
                    <th>
                        Tổng giá
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Lặp qua mỗi sản phẩm trong đơn hàng
                foreach ($dh as $sanpham) { 
                    extract($sanpham);
                    $hinh = $img_path . $img;
                ?>
                    <tr>
                        <td>
                            <div class="thumb_cart">
                                <img src="<?=$hinh?>" class="lazy" alt="Product Image">
                            </div>
                            <span class="item_cart"><?php echo $sanpham['ten_sp']; ?></span>
                        </td>
                        <td>
                            <strong><?php echo $sanpham['size']; ?></strong>
                        </td>
                        <td>
                            <div><?php echo $sanpham['soluong']; ?></div>
                        </td>
                        <td>
                            <strong><?php echo $sanpham['giaban'] * $sanpham['soluong']; ?>₫</strong>
                        </td>
                        <td class="options"></td>
                    </tr>
                <?php
                }
                ?>
                <td colspan="2"></td>
                <td><strong>Thành tiền:</strong></td>
                <td> <strong><?php echo $dh[0]['tonggia']; ?>₫</strong></td>
                <td></td>
                </tr>
            </tbody>
        </table>

        <div class="row add_top_30 flex-sm-row-reverse cart_actions">

            <div class="col-sm-4 text-end">
                <button type="button" class="btn_1 gray"><a href="index.php?act=myorder">Đơn Hàng</a></button>
            </div>
            <div class="col-sm-8">
                <ul class="ctdh" style="list-style: none; font-size: 20px; line-height: 30px;">
                    <li><strong>Địa chỉ giao hàng:</strong> <?php echo $dh[0]['diachi']; ?></li>
                    <li><strong>Phương thức thanh toán:</strong> <?php echo $dh[0]['thanhtoan']; ?></li>
                    <li><strong>Vận chuyển:</strong> <?php echo $dh[0]['vanchuyen']; ?></li>
                    <li><strong>Trạng thái:</strong> <?php echo $dh[0]['trangthai']; ?></li>
                </ul>
            </div>
        </div>
        <!-- /cart_actions -->

    </div>
    <!-- /container -->


</main>
<!--/main-->