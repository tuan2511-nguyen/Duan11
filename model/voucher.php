<?php
function load_voucher($couponCode)
{
    $sql = "SELECT * FROM voucher WHERE ma_vc = '$couponCode'";
    return pdo_query_one($sql);
}
function mark_voucher_as_used($couponCode){
    $sql = "UPDATE voucher SET trangthai = 1 WHERE ma_vc = ?";
    return pdo_query_one($sql, $couponCode);
}