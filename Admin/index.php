<?php
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/binhluan.php";
<<<<<<< Updated upstream
    include "../model/bienthe.php";
=======
>>>>>>> Stashed changes
    include "header.php";

 
    if(isset($_GET['act'])){
        $act=$_GET['act'];
        switch ($act) {
            case 'add-danhmuc':
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $ten_dm=$_POST['ten_dm'];
                    if (checkName1($ten_dm)) {
                        $thongbao = "Tên danh mục đã tồn tại";
                    } else {
                        insert_danhmuc($ten_dm);
                        $thongbao="Thêm thành công";
                    }
                }
                include "danhmuc/add-danhmuc.php";
                break;
            case 'list-danhmuc':
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 3;
                $total_records = get_total_dm(); // Truyền điều kiện tìm kiếm vào get_total_products
                $total_records = intval($total_records);
                $total_page = ceil($total_records / $limit);
                if ($current_page > $total_page) {
                    $current_page = $total_page;
                } else if ($current_page < 1) {
                    $current_page = 1;
                }
                $start = ($current_page - 1) * $limit;
                $listdm=load_dm($start, $limit);
                get_total_dm();
                include "danhmuc/list-danhmuc.php";
                break;
            case 'xoadm':
                if(isset($_GET['id_dm'])&&($_GET['id_dm']>0)){
                    delete_danhmuc($_GET['id_dm']);
                    $thongbao="Xóa thành công"; 
                }
                $listdm=loadall_danhmuc();
                include "danhmuc/list-danhmuc.php";
                echo '<script>window.location.href = "index.php?act=list-danhmuc";</script>';
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
                    echo '<script>window.location.href = "index.php?act=list-danhmuc";</script>';
                }
                $thongbao="Cập nhật thành công";
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
                    if (checkName2($tensp)) {
                        $thongbao = "Tên sản phẩm đã tồn tại";
                    } else {
                        insert_sanpham($tensp,$giasp,$giakm,$mota,$hinh,$iddm);
                        $thongbao="Thêm thành công";
                    }
                }
                $listdanhmuc=loadall_danhmuc();
                include "sanpham/add-sanpham.php";
                break;
            case 'bienthe':
                if(isset($_GET['id_sp'])&&($_GET['id_sp']>0)){
                    $sanpham=loadone_sanpham($_GET['id_sp']);
                    $listbienthe=loadall_bienthesanpham($_GET['id_sp']);
                }
                include "bienthe/bienthe-sanpham.php";
                break;
            case 'bienthe-sanpham':
                if(isset($_POST['them'])&&($_POST['them'])){
                    $id_sp=$_POST['id_sp'];
                    $size=$_POST['size'];
                    $soluong=$_POST['soluong'];
                    insert_bienthesanpham($size,$soluong,$id_sp);
                    $thongbao="Thêm thành công";
                    $sanpham=loadone_sanpham($id_sp);
                    $listbienthe=loadall_bienthesanpham($id_sp);
                }
                include "bienthe/bienthe-sanpham.php";
                break;
            case 'list-sanpham':
                if(isset($_POST['listok'])&&($_POST['listok'])){
                    $iddm=$_POST['iddm'];
                }else{
                    $iddm=0;
                }
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 3;
                $total_records = get_total_sp(); // Truyền điều kiện tìm kiếm vào get_total_products
                $total_records = intval($total_records);
                $total_page = ceil($total_records / $limit);
                if ($current_page > $total_page) {
                    $current_page = $total_page;
                } else if ($current_page < 1) {
                    $current_page = 1;
                }
                $start = ($current_page - 1) * $limit;
                $listsp=load_sp($start, $limit,$iddm);
                get_total_sp();
                $listdanhmuc=loadall_danhmuc();
                include "sanpham/list-sanpham.php";
                break;
            case 'xoasp':
                if(isset($_GET['id_sp'])&&($_GET['id_sp']>0)){
                    delete_sanpham($_GET['id_sp']);
                    echo '<script>window.location.href = "index.php?act=list-sanpham";</script>';
                    $thongbao="Xóa thành công";
                }
                $listdanhmuc=loadall_danhmuc();
                $listsp=loadall_sanpham("",0);
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
                    //
                    update_sanpham($id_sp,$iddm,$tensp,$giasp,$giakm,$mota,$hinh);
                    $thongbao="Cập nhật thành công";
                    echo '<script>window.location.href = "index.php?act=list-sanpham";</script>';
                  
                }
                
                $listdanhmuc=loadall_danhmuc();
                $listsanpham=loadall_sanpham();
                include "sanpham/list-sanpham.php";
                break;
            case 'dstk':
<<<<<<< Updated upstream
                $listtaikhoan=loadall_taikhoan();
                include "taikhoan/dstk.php";
                break;
            case 'xoauser':
                if(isset($_GET['id_user'])&&($_GET['id_user']>0)){
                    delete_taikhoan($_GET['id_user']);
                    $thongbao="Xóa thành công";
                }
                $listtaikhoan=loadall_taikhoan();
                include "taikhoan/dstk.php";
                break;
            case 'suauser';
                if(isset($_GET['id_user'])&&($_GET['id_user']>0)){
                    $taikhoan=loadone_taikhoan($_GET['id_user']);
                }
                include "taikhoan/update-taikhoan.php";
                break;
            case 'update-taikhoan':
                if(isset($_POST['thaydoi'])&&($_POST['thaydoi'])){
                    $id_user=$_POST['id_user'];
                    $username=$_POST['username'];
                    $pass=$_POST['pass'];
                    $vaitro=$_POST['vaitro'];
                    update_taikhoan($id_user,$username,$pass,$vaitro);
                    $thongbao="Cập nhật thành công";
                }
                $listtaikhoan=loadall_taikhoan();
                include "taikhoan/dstk.php";
                break;
            case 'dsbl':
                $listbinhluan=load_binhluan();
                include "binhluan/dsbl.php";
            break;
=======
                $listtaikhoan =loadall_taikhoan();
                include "taikhoan/dstk.php";
                break;
            case 'dsbl':
                $listbl =loadall_bl();
                include "binhluan/dsbl.php";
                break;
>>>>>>> Stashed changes
            default:
                include "home.php";
                break;
        }
    }else{
        include "home.php";
    }
    
?>