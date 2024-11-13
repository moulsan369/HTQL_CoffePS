<?php
session_start();
require 'connect.php';

// Lấy mã đơn đặt nước mới nhất và tăng lên một đơn vị
$sqlCountOrder = "SELECT * FROM dondatnuoc ORDER BY MaDon DESC LIMIT 1";
$result = mysqli_query($connect, $sqlCountOrder);
$numOrder = mysqli_fetch_assoc($result);
preg_match('/\d+/', $numOrder['MaDon'], $numbersArray);
$number = $numbersArray[0];
$number++;
$ORD_ID = "D" . sprintf("%04d", $number);

// Lấy dữ liệu đơn hàng từ POST
$soBan = $_POST['tableNumber'];
$currentDateTime = date('Y-m-d H:i:s');

// Thêm đơn đặt nước
$sql = "INSERT INTO `dondatnuoc` VALUES('$ORD_ID', '$soBan', '$currentDateTime', 'Chưa pha chế')";
mysqli_query($connect, $sql);

// Thêm chi tiết đơn đặt nước
$orderItems = $_POST['orderItems']; // Là mảng chứa các chuỗi JSON
foreach ($orderItems as $itemJson) {
    // Giải mã JSON thành mảng
    $each = json_decode($itemJson, true);

    // Kiểm tra nếu giải mã thành công
    if ($each !== null) {
        $MaDoUong = $each['MaDoUong'];
        $SoLuong = $each['SoLuong'];
        $orderNote = $each['OrderNote'];
        
        // Thêm chi tiết vào cơ sở dữ liệu
        $sql = "INSERT INTO `ct_dondatnuoc` VALUES('$ORD_ID', '$MaDoUong', '$SoLuong', '$orderNote')";
        mysqli_query($connect, $sql);
    }
}

// Chuyển hướng sau khi hoàn tất
header("location:booking.php");
exit;
?>
