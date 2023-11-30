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
<<<<<<< Updated upstream
    function update_taikhoan($id_user,$username,$pass,$vaitro){
        $sql="update user set id_user='".$id_user."', username='".$username."', pass='".$pass."',vaitro='".$vaitro."' where id_user=".$id_user;
        pdo_execute($sql);
    }
    function update_taikhoan1($id_user,$username,$pass,$email,$hoten,$diachi,$sdt){
        $sql="update user set id_user='".$id_user."', username='".$username."', pass='".$pass."',email='".$email."',hoten='".$hoten."',diachi='".$diachi."',sdt='".$sdt."' where id_user=".$id_user;
=======
    function update_taikhoan($id_user,$user,$pass,$email,$hoten,$diachi,$sdt){
        $sql="update user set id_user='".$id_user."', username='".$user."', pass='".$pass."',email='".$email."',hoten='".$hoten."',diachi='".$diachi."',sdt='".$sdt."' where id_user=".$id_user;
>>>>>>> Stashed changes
        pdo_execute($sql);
    }
    function loadall_taikhoan(){
        $sql="select * from user order by id_user asc";
        $listtaikhoan=pdo_query($sql);
        return $listtaikhoan;
    }
<<<<<<< Updated upstream
    function delete_taikhoan($id_user)
{
    $sql = "delete from user where id_user=" . $id_user;
    pdo_execute($sql);
}
function loadone_taikhoan($id_user)
{
    $sql = "select * from user where id_user=" . $id_user;
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}
    function checkName($username){
        $sql = "SELECT * FROM user WHERE username='$username'";
        $check = pdo_query($sql);
        return $check;
    }
    function loadone_tk($username){
        $sql = "SELECT * FROM user WHERE username=:username";
        $check = pdo_query_one($sql, array(':username' => $username));
        return $check;
    }
?>
=======
?>
>>>>>>> Stashed changes
