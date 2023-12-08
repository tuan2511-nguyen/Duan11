<table>
    <thead>
        <tr>
            <th>

            </th>
            <th>
                Product
            </th>
            <th>
                Size
            </th>
            <th>
                Quantity
            </th>
            <th>
                Subtotal
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Lặp qua mỗi sản phẩm trong đơn hàng
        foreach ($dh as $sanpham) {
        ?>
            <tr>
                <td>
                    <div class="thumb_cart">
                        <img src="img/products/<?php echo $sanpham['img']; ?>" data-src="img/products/<?php echo $sanpham['img']; ?>" class="lazy" alt="Product Image">
                    </div>
                <td>
                    <span class="item_cart"><?php echo $sanpham['ten_sp']; ?></span>
                </td>
                </td>
                <td>
                    <strong><?php echo $sanpham['size']; ?></strong>
                </td>
                <td>
                    <div><?php echo $sanpham['soluong']; ?></div>
                </td>
                <td>
                    <strong>$<?php echo $sanpham['giaban'] * $sanpham['soluong']; ?></strong>
                </td>
            </tr>
        <?php
        }
        ?>
        <td colspan="3"></td>
        <td><strong>Total:</strong></td>
        <td> <strong><?php echo $dh[0]['tonggia']; ?>$</strong></td>
        </tr>
    </tbody>
</table>

<div class="row add_top_30 flex-sm-row-reverse cart_actions">

    <div class="col-sm-4 text-end">
        <button type="button" class="btn_1 gray"><a href="index.php?act=dsdh">Đơn Hàng</a></button>
    </div>
    <div class="col-sm-8">
        <ul class="ctdh" style="list-style: none; font-size: 20px; line-height: 30px;">
            <li>Địa chỉ giao hàng: <?php echo $dh[0]['diachi']; ?></li>
            <li>Phương thức thanh toán: <?php echo $dh[0]['thanhtoan']; ?></li>
            <li>Vận chuyển: <?php echo $dh[0]['vanchuyen']; ?></li>
            <li>Trạng thái: <?php echo $dh[0]['trangthai']; ?></li>
            <form action="index.php?act=capnhat_trangthai" method="post">
                <input type="hidden" name="id_hd" value="<?php echo $dh[0]['id_hd']; ?>">

                <label for="trangthai">Cập nhật trạng thái:</label>
                <select name="trangthai" id="trangthai">
                    <option value="" selected>---Chọn---</option>
                    <option value="Đã xác nhận">Đã xác nhận</option>
                    <option value="Đang giao hàng">Đang giao hàng</option>
                </select>

                <button type="submit" class="btn_1 gray">Cập nhật</button>
            </form>
        </ul>
    </div>
</div>