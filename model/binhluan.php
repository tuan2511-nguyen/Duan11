<?php
function insert_binhluan($noidung, $id_user, $id_sp, $ngaydang, $rating)
{
    $sql = "INSERT INTO `binhluan` (`id_sp`, `id_user`, `noidung`, `rating`, `ngaydang`) VALUES ('$id_sp','$id_user', '$noidung', '$rating', '$ngaydang')";
    pdo_execute($sql);
}
function loadall_binhluan($id_sp)
{
    $sql = "SELECT bl.*, u.hoten FROM binhluan bl";
    $sql .= " INNER JOIN user u ON bl.id_user = u.id_user";
    if ($id_sp > 0) $sql .= " WHERE bl.id_sp = '" . $id_sp . "'";
    $sql .= " ORDER BY bl.id_bl DESC";
    $sql .= " LIMIT 4";
    $listbl = pdo_query($sql);
    return $listbl;
}
function load_binhluan($start, $limit)
{
    $sql = "SELECT 
        binhluan.id_bl,
        binhluan.id_sp,
        binhluan.id_user,
        binhluan.noidung,
        binhluan.ngaydang,
        sanpham.ten_sp,
        user.username
    FROM 
        binhluan
    INNER JOIN 
        sanpham ON binhluan.id_sp = sanpham.id_sp
    INNER JOIN 
        user ON binhluan.id_user = user.id_user
    ORDER BY 
        binhluan.id_bl ASC  LIMIT $start, $limit;
    ";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}
function loadall_bl()
{
    $sql = "select * from binhluan order by id_bl asc";
    $listbl = pdo_query($sql);
    return $listbl;
}
function delete_bl($id_bl)
{
    $sql = "DELETE FROM binhluan WHERE id_bl=? ";
    pdo_execute($sql, $id_bl);
}
