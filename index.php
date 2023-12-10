<?php
session_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/taikhoan.php";
include "model/binhluan.php";
include "model/hoadon.php";
include "model/voucher.php";
include "model/vnpay.php";
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
                $sp = loadone_sanpham($id_sp);
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
                // $sp = loadone_sanpham($id_sp);

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
                $_SESSION['total'] = $total; // Lưu tổng vào session
            }


            include "user/sanpham/cart.php";
            break;
        case "update":
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_sp']) && isset($_POST['size']) && isset($_POST['quantity_' . $_POST['id_sp'] . '_' . $_POST['size']])) {
                $product_id = $_POST['id_sp'] . '_' . $_POST['size'];
                $quantity = $_POST['quantity_' . $product_id];

                // Update the quantity in the cart
                foreach ($_SESSION['cart'] as $key => $product) {
                    if ($key == $product_id) {
                        $_SESSION['cart'][$key]['soluong'] = $quantity;
                        break;
                    }
                }
            }

            // Tính toán giảm giá và cập nhật vào session
            $total = 0;
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                foreach ($_SESSION['cart'] as $item) {
                    $total += $item['gia_khuyenmai'] * $item['soluong'];
                }
                $_SESSION['total'] = $total;

                // Kiểm tra xem mã giảm giá có tồn tại không
                if (isset($_SESSION['discount'])) {
                    $discount = $_SESSION['discount'];
                    $discountedTotal = $total - $discount;
                    $_SESSION['discountedTotal'] = $discountedTotal;
                } else {
                    // Nếu không có mã giảm giá, giảm giá sẽ bằng 0
                    $_SESSION['discountedTotal'] = $total;
                }
            }

            include "user/sanpham/cart.php";
            break;

        case 'apply_coupon':
            // Lấy giá tiền từ session hoặc giá trị mặc định nếu không tồn tại
            $total = isset($_SESSION['total']) ? $_SESSION['total'] : 0;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['coupon-code'])) {
                    $couponCode = $_POST['coupon-code'];
                    $couponInfo = load_voucher($couponCode);

                    // Kiểm tra xem mã giảm giá có hợp lệ không
                    if ($couponInfo) {
                        // Kiểm tra xem mã giảm giá đã được sử dụng chưa
                        if (!$couponInfo['trangthai'] && strtotime($couponInfo['ngaybatdau']) < time()) {
                            // Mã giảm giá hợp lệ và chưa được sử dụng, tiến hành xử lý
                            extract($couponInfo);
                            $discount = intval($loaikhuyenmai);
                            $discountedTotal = $total - $discount;

                            // Cập nhật giá tiền mới sau khi áp dụng mã giảm giá vào session
                            $_SESSION['discount'] = $discount;
                            $_SESSION['discountedTotal'] = $discountedTotal;


                            // Đánh dấu mã giảm giá là đã sử dụng trong cơ sở dữ liệu
                            mark_voucher_as_used($couponCode);
                        } else {
                            // Mã giảm giá đã được sử dụng hoặc đã hết hạn, hiển thị thông báo tương ứng
                            if ($couponInfo['trangthai']) {
                                $thongbao = "Mã giảm giá đã được sử dụng.";
                            } else {
                                $thongbao = "Mã giảm giá đã hết hạn.";
                            }
                        }
                    } else {
                        // Mã giảm giá không hợp lệ, hiển thị thông báo
                        $thongbao = "Mã giảm giá không hợp lệ. Vui lòng kiểm tra lại.";
                    }
                }
            }

            include "user/sanpham/cart.php";
            break;
        case 'remove':
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if ($_GET['act'] == 'remove') {
                    $id_sp = $_GET['id_sp'];
                    $size = $_GET['size']; // Thêm dòng này để lấy kích thước

                    foreach ($_SESSION['cart'] as $key => $product) {
                        if ($product['id_sp'] == $id_sp && $product['size'] == $size) {
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
                $user = $_SESSION['username'];
                $cart = $_SESSION['cart'];
                $tong_gia = $_SESSION['total'];

                if (isset($_SESSION['discount'])) {
                    // Nếu tồn tại, gán giá trị cho $giamgia từ $_SESSION['discountedTotal']
                    $giamgia = $_SESSION['discount'];
                } else {
                    // Nếu không tồn tại, gán giá trị mặc định là 0 cho $giamgia
                    $giamgia = 0;
                }

                if (isset($_POST['btn_save']) && ($_POST['btn_save'])) {
                    $diachi = $_POST['diachi'];
                    $vanchuyen = $_POST['vanchuyen'];
                    $thanhtoan = $_POST['thanhtoan'];
                    $orderCode = 'G' . rand(1, 10000);
                    // Tính toán tổng giá với giảm giá
                    $tong_gia_sau_giam_gia = $tong_gia - $giamgia + 7;
                    if ($thanhtoan == 'Thanh toán khi nhận hàng') {

                        $hoa_don = array(
                            'ID_User' => $user['id_user'],
                            'Họ tên' => $user['hoten'],
                            'Email' => $user['email'],
                            'Số điện thoại' => $user['sdt'],
                            'Địa chỉ' => $diachi,
                            'Phương thức vận chuyển' => $vanchuyen,
                            'Phương thức thanh toán' => $thanhtoan,
                            'Tổng giá' => $tong_gia_sau_giam_gia, // Sử dụng giá tiền mới sau giảm giá
                            'Mã đơn hàng' => $orderCode
                        );

                        $hoa_don_id = insert_hoadon($hoa_don);

                        foreach ($cart as $san_pham) {
                            $chi_tiet_hoa_don = array(
                                'ID_HD' => $hoa_don_id,
                                'ID_SP' => $san_pham['id_sp'],
                                'Size' => $san_pham['size'],
                                'So_luong' => $san_pham['soluong'],
                                'Gia_ban' => $san_pham['gia_khuyenmai'],
                            );
                            insert_cthd($chi_tiet_hoa_don, $hoa_don_id);
                        }
                        clearCart();
                        echo '<script>window.location.href = "index.php?act=confirm";</script>';
                    } else if ($thanhtoan == 'vnpay') {
                        $vnp_TxnRef = $orderCode;
                        $vnp_Amount = $tong_gia_sau_giam_gia;
                        $vnp_Locale = "vn"; //Ngôn ngữ chuyển hướng thanh toán
                        $vnp_BankCode = "NCB"; //Mã phương thức thanh toán
                        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán
                        $inputData = array(
                            "vnp_Version" => "2.1.0",
                            "vnp_TmnCode" => $vnp_TmnCode,
                            "vnp_Amount" => $vnp_Amount * 100,
                            "vnp_Command" => "pay",
                            "vnp_CreateDate" => date('YmdHis'),
                            "vnp_CurrCode" => "VND",
                            "vnp_IpAddr" => $vnp_IpAddr,
                            "vnp_Locale" => $vnp_Locale,
                            "vnp_OrderInfo" => "Thanh toan GD: " . $vnp_TxnRef,
                            "vnp_OrderType" => "other",
                            "vnp_ReturnUrl" => $vnp_Returnurl,
                            "vnp_TxnRef" => $vnp_TxnRef,
                            "vnp_ExpireDate" => $expire
                        );
                        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                            $inputData['vnp_BankCode'] = $vnp_BankCode;
                        }
                        ksort($inputData);
                        $query = "";
                        $i = 0;
                        $hashdata = "";
                        foreach ($inputData as $key => $value) {
                            if ($i == 1) {
                                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                            } else {
                                $hashdata .= urlencode($key) . "=" . urlencode($value);
                                $i = 1;
                            }
                            $query .= urlencode($key) . "=" . urlencode($value) . '&';
                        }
                        $hoa_don = array(
                            'ID_User' => $user['id_user'],
                            'Họ tên' => $user['hoten'],
                            'Email' => $user['email'],
                            'Số điện thoại' => $user['sdt'],
                            'Địa chỉ' => $diachi,
                            'Phương thức vận chuyển' => $vanchuyen,
                            'Phương thức thanh toán' => $thanhtoan,
                            'Tổng giá' => $tong_gia_sau_giam_gia, // Sử dụng giá tiền mới sau giảm giá
                            'Mã đơn hàng' => $orderCode
                        );

                        $hoa_don_id = insert_hoadon($hoa_don);

                        foreach ($cart as $san_pham) {
                            $chi_tiet_hoa_don = array(
                                'ID_HD' => $hoa_don_id,
                                'ID_SP' => $san_pham['id_sp'],
                                'Size' => $san_pham['size'],
                                'So_luong' => $san_pham['soluong'],
                                'Gia_ban' => $san_pham['gia_khuyenmai'],
                            );
                            insert_cthd($chi_tiet_hoa_don, $hoa_don_id);
                        }
                        clearCart();
                        $vnp_Url = $vnp_Url . "?" . $query;
                        if (isset($vnp_HashSecret)) {
                            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                        }
                        echo '<script>window.location.href = "' . $vnp_Url . '";</script>';
                        die();
                    }
                }
            }
            include "user/sanpham/thanhtoan.php";
            break;

        case 'confirm':
            if (isset($_GET['vnp_Amount'])) {
                $_SESSION['code_cart'] = $_GET['vnp_TxnRef'];
                $vnp_Amount = $_GET['vnp_Amount'];
                $vnp_BankCode = $_GET['vnp_BankCode'];
                $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
                $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
                $vnp_PayDate = $_GET['vnp_PayDate'];
                $vnp_TmnCode = $_GET['vnp_TmnCode'];
                $vnp_CardType = $_GET['vnp_CardType'];
                $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
                $code_cart = $_SESSION['code_cart'];
                $insert_vnpay = insert_vnpay($vnp_Amount, $vnp_BankCode, $vnp_BankTranNo, $vnp_OrderInfo, $vnp_PayDate, $vnp_TmnCode, $vnp_CardType, $vnp_TransactionNo, $code_cart);
            }
            include "user/sanpham/confirm.php";
            break;
        case 'myorder':
            if (isset($_SESSION['username'])) {
                $id_user = $_SESSION['username']['id_user'];
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 10;
                $total_records = get_total_hd($id_user); // Truyền điều kiện tìm kiếm vào get_total_products
                $total_records = intval($total_records);
                $total_page = ceil($total_records / $limit);
                if ($current_page > $total_page) {
                    $current_page = $total_page;
                } else if ($current_page < 1) {
                    $current_page = 1;
                }
                $start = ($current_page - 1) * $limit;
                $hoadon = loadall_hoadon($id_user, $start, $limit);
            }
            include "user/sanpham/myorder.php";
            break;
        case 'huy_dh':
            if (isset($_GET['id_hd']) && ($_GET['id_hd'] > 0)) {
                huy_dh($_GET['id_hd']);
                echo '<script>window.location.href = "index.php?act=myorder";</script>';
            }
            if (isset($_SESSION['username'])) {
                $id_user = $_SESSION['username']['id_user'];
                $hoadon = loadall_hoadon($id_user,$start, $limit);
            }
            include "user/sanpham/myorder.php";
            break;
        case 'ct_order':
            if (isset($_GET['id_hd']) && ($_GET['id_hd'] > 0)) {
                $dh = loadone_hoadon($_GET['id_hd']);
            }
            include "user/sanpham/ctdh.php";
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
            if (isset($_POST['thaydoi']) && ($_POST['thaydoi'])) {
                $id_user = $_POST['id_user'];
                $username = $_POST['username'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $hoten = $_POST['hoten'];
                $diachi = $_POST['diachi'];
                $sdt = $_POST['sdt'];
                update_taikhoan1($id_user, $username, $pass, $email, $hoten, $diachi, $sdt);
                $thongbao = "Cập nhật thành công";
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
