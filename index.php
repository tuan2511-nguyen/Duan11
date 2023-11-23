<?php
session_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/taikhoan.php";
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
            $dssp = load_sanpham($start, $limit, $kw,$whereConditions);
            $danhmuc = loadall_danhmuc();
            include "user/sanpham/danhmuc.php";
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
                if (empty($username) || empty($pass) || empty($email) || empty($hoten) || empty($sdt) || empty($address)) {
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
                                // Nếu tất cả các kiểm tra đều thành công, thì tiếp tục đăng ký
                                insert_taikhoan($username, $pass, $email, $hoten, $sdt, $address);
                                $thongbao = "<div class='notification'>Đăng ký thành công. Vui lòng đăng nhập</div>";
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
                    $thongbao = "Tên người dùng và mật khẩu không được để trống.";
                } else {
                    $checkUser = check_user($user, $pass);
                    if (is_array($checkUser)) {
                        $_SESSION['username'] = $checkUser;
                        echo '<script>window.location.href = "index.php";</script>';
                    } else {
                        $thongbao = "Tài khoản không tồn tại. Vui lòng kiểm tra hoặc đăng ký.";
                    }
                }
            }
            
            include "user/taikhoan/taikhoan.php";
            break;
        case 'logout':
            session_unset();
            echo '<script>window.location.href = "index.php";</script>';
            break;
    }
} else {
    include "user/home.php";
}
include "user/footer.php";
