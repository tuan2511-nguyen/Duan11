<?php
function insert_hoadon($hoa_don)
{
    $conn = pdo_get_connection();
    try {
        $conn->beginTransaction();
        $sql = "INSERT INTO hoadon (id_user, hoten, email, sdt, diachi, vanchuyen, thanhtoan, tonggia) VALUES (?, ?, ?, ?, ?, ?, ?,?)";
        pdo_execute($sql, $hoa_don['ID_User'], $hoa_don['Họ tên'], $hoa_don['Email'], $hoa_don['Số điện thoại'], $hoa_don['Địa chỉ'], $hoa_don['Phương thức vận chuyển'], $hoa_don['Phương thức thanh toán'], $hoa_don['Tổng giá']);
        $conn->commit();

        // Lấy ID hóa đơn cuối cùng
        $last_order_id = get_last_order_id($hoa_don);
        var_dump($last_order_id);
        return $last_order_id;
    } catch (PDOException $e) {
        // Nếu có lỗi, hủy bỏ giao dịch và xử lý lỗi
        $conn->rollBack();
        echo "Failed: " . $e->getMessage();
        return 0;
    }
}

function get_last_order_id($hoa_don)
{
    $conn = pdo_get_connection();
    $sql = "SELECT id_hd FROM hoadon WHERE id_user = ? AND hoten = ? AND email = ? AND sdt = ? AND diachi = ? AND vanchuyen = ? AND thanhtoan = ? ORDER BY id_hd DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$hoa_don['ID_User'], $hoa_don['Họ tên'], $hoa_don['Email'], $hoa_don['Số điện thoại'], $hoa_don['Địa chỉ'], $hoa_don['Phương thức vận chuyển'], $hoa_don['Phương thức thanh toán']]);
    $last_order_id = $stmt->fetchColumn();
    return $last_order_id;
}

function insert_cthd($chitiet_hoadon, $hoa_don_id)
{
    $conn = pdo_get_connection();
    try {
        $conn->beginTransaction();
        $sql = "INSERT INTO ct_hoadon (id_hd, id_sp,size,soluong,giaban) VALUES (?, ?, ?, ?, ?)";
        pdo_execute($sql, $hoa_don_id, $chitiet_hoadon['ID_SP'], $chitiet_hoadon['Size'], $chitiet_hoadon['So_luong'], $chitiet_hoadon['Gia_ban'],);
        $conn->commit();
    } catch (PDOException $e) {
        // Nếu có lỗi, hủy bỏ giao dịch và xử lý lỗi
        $conn->rollBack();
        echo "Failed: " . $e->getMessage();
    }
}
function clearCart()
{
    unset($_SESSION['cart']);
}

function loadall_hoadon($id_user){
    $sql = "SELECT * FROM hoadon JOIN ct_hoadon ON hoadon.id_hd = ct_hoadon.id_hd JOIN sanpham ON ct_hoadon.id_sp = sanpham.id_sp WHERE hoadon.id_user = ?";
    return pdo_query($sql, $id_user);
}

