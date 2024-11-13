<?php
$maDoUong = $_GET['MaDoUong'];
session_start();
if (empty($_SESSION['order'][$maDoUong])) {
    require './connect.php';
    $sql = "SELECT * FROM `douong` WHERE MaDoUong = '$maDoUong'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $_SESSION['order'][$maDoUong]['MaDoUong'] = $maDoUong;
    $_SESSION['order'][$maDoUong]['TenDoUong'] = $each['TenDoUong'];
    $_SESSION['order'][$maDoUong]['DonGia'] = $each['DonGia'];
    $_SESSION['order'][$maDoUong]['LinkAnh'] = $each['LinkAnh'];
    $_SESSION['order'][$maDoUong]['SoLuong'] = 1;
}else {
    $_SESSION['order'][$maDoUong]['SoLuong']++;
}
header("location:menu.php");