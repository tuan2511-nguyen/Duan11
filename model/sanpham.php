<?php
function insert_sanpham($tensp, $giasp, $giakm, $mota, $hinh, $iddm)
{
    $sql = "insert into sanpham(ten_sp,gia_goc,gia_khuyenmai,mota,img,id_dm) values('$tensp','$giasp','$giakm','$mota','$hinh','$iddm')";
    pdo_execute($sql);
}
function delete_sanpham($id_sp)
{
    $sql = "delete from sanpham where id_sp=" . $id_sp;
    pdo_execute($sql);
}
function loadall_sanpham($iddm = 0)
{
    $sql = "select * from sanpham where 1";
    if ($iddm > 0) {
        $sql .= " and id_dm ='" . $iddm . "'"; 
    }
    $sql .= " order by id_dm asc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadone_sanpham($id_sp)
{
    $sql = "select * from sanpham where id_sp=" . $id_sp;
    $sanpham = pdo_query_one($sql);
    return $sanpham;
}
function update_sanpham($id_sp, $iddm, $tensp, $giasp, $giakm, $mota, $hinh)
{
    if ($hinh != "")
        $sql = "update sanpham set id_dm='" . $iddm . "',ten_sp='" . $tensp . "',gia_goc='" . $giasp . "',gia_khuyenmai='" . $giakm . "',mota='" . $mota . "',img='" . $hinh . "' where id_sp=" . $id_sp;
    else
        $sql = "update sanpham set id_dm='" . $iddm . "',ten_sp='" . $tensp . "',gia_goc='" . $giasp . "',gia_khuyenmai='" . $giakm . "',mota='" . $mota . "' where id_sp=" . $id_sp;
    pdo_execute($sql);
}
function loadall_sanpham_home()
{
    $sql = "select * from sanpham where 1 order by id_sp desc limit 0,8";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function load_sanpham($start, $limit, $kw = "", $whereConditions = []) {
    $sql = "SELECT * FROM sanpham";

    if ($kw !== "") {
        $whereConditions[] = "sanpham.ten_sp LIKE '%" . $kw . "%'";
    }

    // Thêm điều kiện WHERE nếu có
    if (!empty($whereConditions)) {
        $sql .= " WHERE " . implode(' AND ', $whereConditions);
    }

    $sql .= " LIMIT $start, $limit";

    $listsp = pdo_query($sql);
    return $listsp;
}
    function get_total_products(){
        $sql = "SELECT COUNT(*) as total FROM sanpham";
        return pdo_query_value($sql);
    }
    function load_sp($start, $limit, $iddm = 0){
        $sql = "select * from sanpham where 1";
        if ($iddm > 0) {
            $sql .= " and id_dm ='" . $iddm . "'";
        }
        $sql .= " LIMIT $start, $limit";
        $listsp = pdo_query($sql);
        return $listsp;
    }
    function get_total_sp(){
        $sql = "SELECT COUNT(*) as total FROM sanpham";
        return pdo_query_value($sql);
    }
//load-sản phẩm chi tiết
function load_spct($id_sp)
{
    $sql = "SELECT * FROM sanpham WHERE id_sp = $id_sp";
    return pdo_query_one($sql);
}
function load_bienthe($id_sp)
{
    $sql = "SELECT DISTINCT size FROM ct_sanpham WHERE id_sp = $id_sp";
    return pdo_query($sql);
}
function load_random(){
    $sql = "SELECT * FROM sanpham ORDER BY RAND() LIMIT 5";
    return pdo_query($sql);
}
function soLuong($id_sp, $size){
    $sql = "SELECT soluong FROM ct_sanpham WHERE id_sp = $id_sp AND size = $size";
    return pdo_query($sql);
}
?>