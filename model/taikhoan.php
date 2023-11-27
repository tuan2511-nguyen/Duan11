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
    function update_taikhoan($id_user,$username,$pass,$email,$hoten,$diachi,$sdt){
        $sql="update user set id_user='".$id_user."', username='".$username."', pass='".$pass."',email='".$email."',hoten='".$hoten."',diachi='".$diachi."',sdt='".$sdt."' where id_user=".$id_user;
        pdo_execute($sql);
    }
    function loadall_taikhoan(){
        $sql="select * from user order by id_user asc";
        $listtaikhoan=pdo_query($sql);
        return $listtaikhoan;
    }
    function checkName($username){
        $sql = "SELECT * FROM user WHERE username='$username'";
        $check = pdo_query($sql);
        return $check > 0;
    }
?>