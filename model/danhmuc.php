<?php
    function insert_danhmuc($ten_dm){
        $sql="insert into danhmuc(ten_dm) values('$ten_dm')";
        pdo_execute($sql);
    }
    function delete_danhmuc($id_dm){
        $sql="delete from danhmuc where id_dm=".$id_dm;
        pdo_execute($sql);
    }
    function loadall_danhmuc(){
        $sql="select * from danhmuc order by id_dm asc";
        $listdanhmuc=pdo_query($sql);
        return $listdanhmuc;
    }
    function loadone_danhmuc($id_dm){
        $sql="select *from danhmuc where id_dm=".$id_dm;
        $dm=pdo_query_one($sql);
        return $dm;
    }
    function update_danhmuc($id_dm,$ten_dm){
        $sql="update danhmuc set ten_dm='".$ten_dm."' where id_dm=".$id_dm;
        pdo_execute($sql);
    }
    function getNumber(){
        if(isset($_GET['pages'])){
            $pages = $_GET['pages'];
        }else{
            $pages=1;
        }
        $row=3;
        $from=($pages-1) * $row;
        $sql="select * from danhmuc order by id_dm asc limit $from,$row";
        $page=pdo_query($sql);
        return $page;
    }
?>