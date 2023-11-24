<?php
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "header.php";


    if(isset($_GET['act'])){
        $act=$_GET['act'];
        switch ($act) {
            case 'add-danhmuc':
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $ten_dm=$_POST['ten_dm'];
                    insert_danhmuc($ten_dm);
                    $thongbao="Thêm thành công";
                }
                include "danhmuc/add-danhmuc.php";
                break;
            case 'list-danhmuc':
                //$listdanhmuc=loadall_danhmuc();
                $page=getNumber();
                include "danhmuc/list-danhmuc.php";
                break;
            case 'xoadm':
                if(isset($_GET['id_dm'])&&($_GET['id_dm']>0)){
                    delete_danhmuc($_GET['id_dm']);
                    $thongbao="Xóa thành công";
                }
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list-danhmuc.php";
                break;
            case 'suadm';
                if(isset($_GET['id_dm'])&&($_GET['id_dm']>0)){
                    $dm=loadone_danhmuc($_GET['id_dm']);
                }
                include "danhmuc/update-danhmuc.php";
                break;
            case 'update-danhmuc':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $ten_dm=$_POST['ten_dm'];
                    $id_dm=$_POST['id_dm'];
                    update_danhmuc($id_dm,$ten_dm);
                    $thongbao="Cập nhật thành công";
                }
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list-danhmuc.php";
                break;
            /*sanpham */

            case 'add-sanpham':
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $iddm=$_POST['iddm'];
                    $tensp=$_POST['tensp'];
                    $giasp=$_POST['giasp'];
                    $giakm=$_POST['giakm'];
                    $mota=$_POST['mota'];
                    $hinh=$_FILES['hinh']['name'];
                    $target_dir="../upload/";
                    $target_file= $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                      } else {
                        //echo "Sorry, there was an error uploading your file.";
                      }
                    insert_sanpham($tensp,$giasp,$giakm,$mota,$hinh,$iddm);
                    $thongbao="Thêm thành công";
                }
                $listdanhmuc=loadall_danhmuc();
                include "sanpham/add-sanpham.php";
                break;
            case 'bienthe':
                if(isset($_GET['id_sp'])&&($_GET['id_sp']>0)){
                    $sanpham=loadone_sanpham($_GET['id_sp']);
                }
                $listsanpham=loadall_sanpham();
                include "sanpham/bienthe-sanpham.php";
                break;
            case 'bienthe-sanpham':
                if(isset($_POST['them'])&&($_POST['them'])){
                    if(isset($_POST['them'])&&($_POST['them'])){
                        $id_sp=$_POST['id_sp'];
                        $mausac=$_POST['mausac'];
                        $size=$_POST['size'];
                        $soluong=$_POST['soluong'];
                        insert_bienthesanpham($mausac,$size,$soluong,$id_sp);
                        $thongbao="Thêm thành công";
                    }
                }
                $listsanpham=loadall_sanpham();
                include "sanpham/list-sanpham.php";
                break;
            case 'list-sanpham':
                if(isset($_POST['listok'])&&($_POST['listok'])){
                    $iddm=$_POST['iddm'];
                }else{
                    $iddm=0;
                }
                $listdanhmuc=loadall_danhmuc();
                $listsanpham=loadall_sanpham($iddm);
                include "sanpham/list-sanpham.php";
                break;
            case 'xoasp':
                if(isset($_GET['id_sp'])&&($_GET['id_sp']>0)){
                    delete_sanpham($_GET['id_sp']);
                    $thongbao="Xóa thành công";
                }
                $listdanhmuc=loadall_danhmuc();
                $listsanpham=loadall_sanpham("",0);
                include "sanpham/list-sanpham.php";
                break;
            case 'suasp';
                if(isset($_GET['id_sp'])&&($_GET['id_sp']>0)){
                    $sanpham=loadone_sanpham($_GET['id_sp']);
                }
                $listdanhmuc=loadall_danhmuc();
                include "sanpham/update-sanpham.php";
                break;
            case 'update-sanpham':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $id_sp=$_POST['id_sp'];
                    $iddm=$_POST['iddm'];
                    $tensp=$_POST['tensp'];
                    $giasp=$_POST['giasp'];
                    $giakm=$_POST['giakm'];
                    $mota=$_POST['mota'];
                    $hinh=$_FILES['hinh']['name'];
                    $target_dir="../upload/";
                    $target_file= $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                      } else {
                        //echo "Sorry, there was an error uploading your file.";
                      }
                    update_sanpham($id_sp,$iddm,$tensp,$giasp,$giakm,$mota,$hinh);
                    $thongbao="Cập nhật thành công";
                }
                $listdanhmuc=loadall_danhmuc();
                $listsanpham=loadall_sanpham();
                include "sanpham/list-sanpham.php";
                break;
            default:
                include "home.php";
                break;
        }
    }else{
        include "home.php";
    }

    include "footer.php";


?>