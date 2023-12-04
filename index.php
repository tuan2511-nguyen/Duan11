<?php
session_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/taikhoan.php";
include "model/binhluan.php";
include "model/hoadon.php";
include "user/header.php";
include "global.php";

$spnew = loadall_sanpham_home();

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "danhmuc":
            if (isset($_POST['kw']) && $_POST['kw'] !== "") {
                $kw = $_POST['kw'];
            } else {
                $kw = "";
            }

            $selectedCategories = isset($_POST['danhmuc']) ? $_POST['danhmuc'] : [];
            $selectedPriceRanges = isset($_POST['price_range']) ? $_POST['price_range'] : [];
            $whereConditions = [];

            $categoryCondition = addCategoryCondition($selectedCategories);
            if ($categoryCondition !== "") {
                $whereConditions[] = $categoryCondition;
            }
            $priceCondition = addPriceCondition($selectedPriceRanges);
            if ($priceCondition !== "") {
                $whereConditions[] = $priceCondition;
            }


            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 9;
            $total_records = get_total_products($kw, $whereConditions); // Truyền điều kiện tìm kiếm vào get_total_products
            $total_records = intval($total_records);
            $total_page = ceil($total_records / $limit);
            if ($current_page > $total_page) {
                $current_page = $total_page;
            } else if ($current_page < 1) {
                $current_page = 1;
            }
            $start = ($current_page - 1) * $limit;

            // Tải sản phẩm với điều kiện tìm kiếm
            $dssp = load_sanpham($start, $limit, $kw, $whereConditions);
            $danhmuc = loadall_danhmuc();
            include "user/sanpham/danhmuc.php";
            break;
        case 'ct_sanpham':
            if (isset($_GET['id_sp']) && ($_GET['id_sp'] > 0)) {
                $id_sp = $_GET['id_sp'];
                $ctsp = load_spct($id_sp);
                $bienthe = load_bienthe($id_sp);
                $load_random = load_random();
                $listbl = loadall_binhluan($id_sp);
                $sp=loadone_sanpham($id_sp);
            }

            include "user/sanpham/ctsp.php";
            break;
        case 'binhluan':
            if (isset($_GET['id_sp']) && ($_GET['id_sp'] > 0)) {
                $id_sp = $_GET['id_sp'];
                $ctsp = load_spct($id_sp);
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $rating = $_POST["rating"];
                $noidung  = $_POST['noidung'];
                $id_user = $_SESSION['username']['id_user'];
                $ngaydang = date('d/m/Y');
                insert_binhluan($noidung, $id_user, $id_sp, $ngaydang, $rating);
                echo '<script>window.location.href = "index.php?act=ct_sanpham&id_sp=' . $id_sp . '";</script>';
                exit();
            }
            include "user/binhluan/binhluan.php";
            break;
        case 'viewcart':
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id_sp = $_POST['id_sp'];
                $ten_sp = $_POST['ten_sp'];
                $gia_khuyenmai = $_POST['gia_khuyenmai'];
                $soluong = intval($_POST['soluong']); // Ép kiểu dữ liệu về int
                $size = $_POST['size'];
                $sp=loadone_sanpham($id_sp);

                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = array();
                }
                $product_id = $id_sp . '_' . $size; // Tạo ID sản phẩm duy nhất

                if (!isset($_SESSION['cart'][$product_id])) {
                    $_SESSION['cart'][$product_id] = array(
                        "id_sp" => $id_sp,
                        "ten_sp" => $ten_sp,
                        "gia_khuyenmai" => $gia_khuyenmai,
                        "soluong" => $soluong,
                        "size" => $size
                    );
                } else {
                    $_SESSION['cart'][$product_id]['soluong'] += $soluong;
                }
            }


            $total = 0;
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                foreach ($_SESSION['cart'] as $item) {
                    $total += $item['gia_khuyenmai'] * $item['soluong'];
                }
            }


            include "user/sanpham/cart.php";
            break;
        case "update":
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_sp']) && isset($_POST['quantity_' . $_POST['id_sp']])) {
                $product_id = $_POST['id_sp'];
                $quantity = $_POST['quantity_' . $product_id];

                // Update the quantity in the cart
                foreach ($_SESSION['cart'] as $key => $product) {
                    if ($product['id_sp'] == $product_id) {
                        $_SESSION['cart'][$key]['soluong'] = $quantity;
                        break;
                    }
                }
            }



            $total = 0;
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                foreach ($_SESSION['cart'] as $item) {
                    $total += $item['gia_khuyenmai'] * $item['soluong'];
                }
            }

            include "user/sanpham/cart.php";
            break;
        case 'remove':
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if ($_GET['act'] == 'remove') {
                    $id_sp = $_GET['id_sp'];

                    foreach ($_SESSION['cart'] as $key => $product) {
                        if ($product['id_sp'] == $id_sp) {
                            unset($_SESSION['cart'][$key]);
                            echo '<script>window.location.href = "index.php?act=viewcart";</script>';
                            break;
                        }
                    }
                }
            }
            include "user/sanpham/cart.php";
            break;

        case 'thanhtoan':
            if (isset($_SESSION['username']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                // var_dump($_SESSION['username']);
                // var_dump($_SESSION['cart']);
                $user = $_SESSION['username'];
                $cart = $_SESSION['cart'];
                $tong_gia = 0;
                foreach ($cart as $san_pham) {
                    $tong_gia += $san_pham['gia_khuyenmai'] * $san_pham['soluong'];
                }
                if (isset($_POST['btn_save']) && ($_POST['btn_save'])) {
                    $diachi = $_POST['diachi'];
                    $vanchuyen = $_POST['vanchuyen'];
                    $thanhtoan = $_POST['thanhtoan'];
                    $hoa_don = array(
                        'ID_User' => $user['id_user'],
                        'Họ tên' => $user['hoten'],
                        'Email' => $user['email'],
                        'Số điện thoại' => $user['sdt'],
                        'Địa chỉ' => $diachi,
                        'Phương thức vận chuyển' => $vanchuyen, // Phương thức vận chuyển, người dùng cần chọn trong quá trình thanh toán
                        'Phương thức thanh toán' => $thanhtoan, // Phương thức thanh toán, người dùng cần chọn trong quá trình thanh toán
                        'Tổng giá' => $tong_gia,
                    );
                    $hoa_don_id = insert_hoadon($hoa_don);
                    foreach ($cart as $san_pham) {
                        $chi_tiet_hoa_don = array(
                            'ID_HD' => $hoa_don_id,
                            'ID_SP' => $san_pham['id_sp'],
                            'Size' => $san_pham['size'],
                            'So_luong' => $san_pham['soluong'],
                            'Gia_ban' => $san_pham['gia_khuyenmai']
                        );
                        insert_cthd($chi_tiet_hoa_don, $hoa_don_id);
                    }
                    clearCart();
                    echo '<script>window.location.href = "index.php?act=confirm";</script>';
                }
            }
            include "user/sanpham/thanhtoan.php";
            break;
        case 'confirm':
            include "user/sanpham/confirm.php";
            break;
        case 'myorder':
            if(isset($_SESSION['username'])){
                $id_user = $_SESSION['username']['id_user'];
                $hoadon = loadall_hoadon($id_user);
            }
            include "user/sanpham/myorder.php";
            break;
        case 'dangky':

            if (isset($_POST['btn_register']) && ($_POST['btn_register'])) {
                $username = $_POST['username'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $hoten = $_POST['hoten'];
                $sdt = $_POST['sdt'];
                $diachi = $_POST['diachi'];

                // Kiểm tra xem tất cả các trường có trống không
                if (empty($username) || empty($pass) || empty($email) || empty($hoten) || empty($sdt) || empty($diachi)) {
                    $thongbao = "<div class='notification'>Tất cả các trường đều phải được điền.</div>";
                } else {
                    // Validate username
                    if (strlen($username) < 6 || !preg_match('/^[a-zA-Z0-9]+$/', $username)) {
                        $thongbao = "<div class='notification'>Tên đăng nhập không hợp lệ. Phải có ít nhất 6 kí tự và chỉ chấp nhận chữ cái và số.</div>";
                    } else {
                        // Validate password
                        if (strlen($pass) < 6) {
                            $thongbao = "<div class='notification'>Mật khẩu phải có ít nhất 6 kí tự.</div>";
                        } else {
                            // Thực hiện các kiểm tra khác ở đây, ví dụ như kiểm tra định dạng email
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                $thongbao = "<div class='notification'>Email không hợp lệ.</div>";
                            } else { 
                                // Check if the username is already taken
                                if (checkName($username) > 0) {
                                    $thongbao = "<div class='notification'>Tên đăng nhập đã tồn tại. Vui lòng chọn một tên đăng nhập khác.</div>";
                                } else {
                                    // Nếu tất cả các kiểm tra đều thành công, thì tiếp tục đăng ký
                                    insert_taikhoan($username, $pass, $email, $hoten, $sdt, $diachi);
                                    $thongbao = "<div class='notification'>Đăng ký thành công. Vui lòng đăng nhập</div>";
                                }
                            }
                        }
                    }
                }
            }


            include "user/taikhoan/taikhoan.php";
            break;

        case 'dangnhap':
            if (isset($_POST['btn_login']) && ($_POST['btn_login'])) {
                $user = $_POST['username'];
                $pass = $_POST['pass'];

                // Kiểm tra xem tên người dùng và mật khẩu có trống không
                if (empty($user) || empty($pass)) {
                    $thongbao1 = "Tên người dùng và mật khẩu không được để trống.";
                } else {
                    $checkUser = check_user($user, $pass);
                    if (is_array($checkUser)) {
                        $_SESSION['username'] = $checkUser;
                        echo '<script>window.location.href = "index.php";</script>';
                    } else {
                        $thongbao1 = "Tài khoản không tồn tại. Vui lòng kiểm tra hoặc đăng ký.";
                    }
                }
            }

            include "user/taikhoan/taikhoan.php";
            break;
        case 'edit-taikhoan':
            if(isset($_POST['thaydoi'])&&($_POST['thaydoi'])){
                $id_user=$_POST['id_user'];
                $username=$_POST['username'];
                $pass=$_POST['pass'];
                $email=$_POST['email'];
                $hoten=$_POST['hoten'];
                $diachi=$_POST['diachi'];
                $sdt=$_POST['sdt'];
                update_taikhoan1($id_user,$username,$pass,$email,$hoten,$diachi,$sdt);
                $thongbao="Cập nhật thành công";
                session_unset();
            }
            include "user/taikhoan/edit-taikhoan.php";
            break;
        case 'logout':
            session_unset();
            echo '<script>window.location.href = "index.php";</script>';
            break;
        default:
            include "user/home.php";
            break;
    }
} else {
    include "user/home.php";
}
include "user/footer.php";
?>