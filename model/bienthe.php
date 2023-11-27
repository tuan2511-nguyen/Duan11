<?php
    function insert_bienthesanpham($size, $soluong, $id_sp)
    {
        $sql = "insert into ct_sanpham(size,soluong,id_sp) values('$size','$soluong','$id_sp')";
        pdo_execute($sql);
    }
    function loadall_bienthesanpham($id_sp)
    {
        $sql = "select * from ct_sanpham where id_sp ='" . $id_sp . "'";
        $listbienthe = pdo_query($sql);
        return $listbienthe;
    }
    function load_ten_sanpham($id_sp){
    $sql = "select * from sanpham where id_sp=" . $id_sp;
    $sp = pdo_query_one($sql);
    extract($sp);
    return $ten_sp;
    }
?>