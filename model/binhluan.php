<?php
    function insert_binhluan($noidung, $id_user, $id_sp, $ngaydang, $rating){
        $sql = "INSERT INTO `binhluan` (`id_sp`, `id_user`, `noidung`, `rating`, `ngaydang`) VALUES ('$id_sp','$id_user', '$noidung', '$rating', '$ngaydang')";
        pdo_execute($sql);
    }
    function loadall_binhluan($id_sp) {
        $sql = "SELECT bl.*, u.hoten FROM binhluan bl";
        $sql .= " INNER JOIN user u ON bl.id_user = u.id_user";
        if ($id_sp > 0) $sql .= " WHERE bl.id_sp = '".$id_sp."'";
        $sql .= " ORDER BY bl.id_bl DESC";
        $sql .= " LIMIT 4";
        $listbl = pdo_query($sql);
        return $listbl;
    }
    function load_binhluan(){
        $sql="select * from binhluan left join sanpham on binhluan.id_sp = sanpham.id_sp left join user on binhluan.id_user = user.id_user order by id_bl asc";
        $listbinhluan=pdo_query($sql);
        return $listbinhluan;
    } 
?>