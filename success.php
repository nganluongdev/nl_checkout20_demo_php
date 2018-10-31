<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>payment success</title>
</head>
<?php
include 'config.php';
include 'lib/nganluong.class.php';
if (isset($_GET['payment_id'])) {
    // Lấy các tham số để chuyển sang Ngânlượng thanh toán:

    $transaction_info = $_GET['transaction_info'];
    $order_code = $_GET['order_code'];
    $price = $_GET['price'];
    $payment_id = $_GET['payment_id'];
    $payment_type = $_GET['payment_type'];
    $error_text = $_GET['error_text'];
    $secure_code = $_GET['secure_code'];
    //Khai báo đối tượng của lớp NL_Checkout
    $nl = new NL_Checkout();
    $nl->merchant_site_code = MERCHANT_ID;
    $nl->secure_pass = MERCHANT_PASS;
    //Tạo link thanh toán đến nganluong.vn
    $checkpay = $nl->verifyPaymentUrl($transaction_info, $order_code, $price, $payment_id, $payment_type, $error_text, $secure_code);

    if ($checkpay) {
        echo 'Payment success: <pre>';
        // bạn viết code vào đây để cung cấp sản phẩm cho người mua
        print_r($_GET);
    } else {
        echo "payment failed";
    }

}
?>

