<?php
function load_voucher($couponCode)
{
    $sql = "SELECT * FROM voucher WHERE ma_vc = '$couponCode'";
    return pdo_query_one($sql);
}
