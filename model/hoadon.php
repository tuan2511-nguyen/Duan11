<?php
function insert_hoadon($hoa_don)
{
    $conn = pdo_get_connection();
    try {
        $conn->beginTransaction();
        $sql = "INSERT INTO hoadon (id_user, hoten, email, sdt, diachi, vanchuyen, thanhtoan, tonggia, ma_hd) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)";
        pdo_execute($sql, $hoa_don['ID_User'], $hoa_don['Họ tên'], $hoa_don['Email'], $hoa_don['Số điện thoại'], $hoa_don['Địa chỉ'], $hoa_don['Phương thức vận chuyển'], $hoa_don['Phương thức thanh toán'], $hoa_don['Tổng giá'], $hoa_don['Mã đơn hàng']);
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
    unset( $_SESSION['discount']);
    unset($_SESSION['cart']);
    unset( $_SESSION['discountedTotal']);
}

function loadall_hoadon($id_user)
{
    $sql = "SELECT * FROM hoadon JOIN ct_hoadon ON hoadon.id_hd = ct_hoadon.id_hd JOIN sanpham ON ct_hoadon.id_sp = sanpham.id_sp WHERE hoadon.id_user = ?  ORDER BY hoadon.id_hd DESC ";
    return pdo_query($sql, $id_user);
}
function get_total_hd()
{
    $sql = "SELECT COUNT(*) as total FROM hoadon";
    return pdo_query_value($sql);
}
function loadall_hoadon_all($start, $limit)
{
    $sql = "SELECT * FROM hoadon 
            JOIN ct_hoadon ON hoadon.id_hd = ct_hoadon.id_hd 
            JOIN sanpham ON ct_hoadon.id_sp = sanpham.id_sp 
            ORDER BY hoadon.id_hd DESC LIMIT $start, $limit";
    return pdo_query($sql);
}

function xacthuc_dh($id_hd)
{
    $sql = "UPDATE hoadon SET trangthai = 'Đã xác nhận' WHERE id_hd = ?";
    return pdo_execute($sql, $id_hd);
}
function huy_dh($id_hd)
{
    $sql = "UPDATE hoadon SET trangthai = 'Đã hủy' WHERE id_hd = ?";
    return pdo_execute($sql, $id_hd);
}
function capnhat_trangthai_hoadon($id_hd, $trangthai_moi)
{
    // Viết mã SQL để cập nhật trạng thái trong bảng hoadon
    $sql = "UPDATE hoadon SET trangthai = ? WHERE id_hd = ?";
    pdo_execute($sql, $trangthai_moi, $id_hd);
}
function doanhthu()
{
    $sql = "SELECT SUM(tonggia) AS doanh_thu FROM hoadon WHERE trangthai = 'Đã xác nhận'";
    return pdo_query($sql);
}
function dssp_bc()
{
    $sql = "SELECT sp.ten_sp, SUM(cthd.soluong) AS So_luong_da_ban
    FROM ct_hoadon cthd
    JOIN sanpham sp ON cthd.id_sp = sp.id_sp
    JOIN hoadon hd ON cthd.id_hd = hd.id_hd
    WHERE hd.trangthai = 'Đã xác nhận'
    GROUP BY cthd.id_sp
    ORDER BY So_luong_da_ban DESC
    ";
    return pdo_query($sql);
}

function donhang()
{
    $sql = "SELECT * FROM hoadon WHERE trangthai = 'Đã xác nhận'";
    return pdo_query($sql);
}
function loadone_hoadon($id_hd)
{
    $sql = "SELECT * FROM hoadon 
            JOIN ct_hoadon ON hoadon.id_hd = ct_hoadon.id_hd 
            JOIN sanpham ON ct_hoadon.id_sp = sanpham.id_sp 
            WHERE hoadon.id_hd = ?
            ORDER BY hoadon.id_hd DESC";
    return pdo_query($sql, $id_hd);
}

