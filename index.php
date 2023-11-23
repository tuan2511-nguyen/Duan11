<?php
    include "model/pdo.php";
    include "model/sanpham.php";
    include "user/header.php";
    include "global.php";
    $spnew=loadall_sanpham_home(); 

    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch ($act) {
        }
    }else{
        include "user/home.php";
    }
    include "user/footer.php";
?>