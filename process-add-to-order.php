<?php
$maDoUong = $_GET['MADOUONG'];
session_start();
if (empty($_SESSION['order'][$maDoUong])) {
    require './connect.php';
    $sql = "SELECT * FROM `danhmucdouong` WHERE MaDoUong = '$maDoUong'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $_SESSION['order'][$maDoUong]['MADOUONG'] = $maDoUong;
    $_SESSION['order'][$maDoUong]['TENDOUONG'] = $each['TENDOUONG'];
    $_SESSION['order'][$maDoUong]['DONGIA'] = $each['DONGIA'];
    $_SESSION['order'][$maDoUong]['LinkAnh'] = $each['LinkAnh'];
    $_SESSION['order'][$maDoUong]['SOLUONG'] = 1;
}else {
    $_SESSION['order'][$maDoUong]['SOLUONG']++;
}
header("location:menu.php");