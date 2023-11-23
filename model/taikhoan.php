<?php
    function insert_taikhoan($username,$pass,$email,$hoten,$sdt,$diachi){
        $sql = "INSERT INTO user(username,pass,email,hoten,sdt,diachi) VALUES ('$username','$pass','$email','$hoten','$sdt','$diachi')";
        pdo_execute($sql);
    }
    function check_user($user,$pass){
        $sql = "SELECT * FROM user WHERE username='".$user."'AND pass='".$pass."'";
        $kq = pdo_query_one($sql);
        return $kq;
    }
?>