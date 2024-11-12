<?php
session_start();
require 'connect.php';
$sqlCountOrder = "SELECT * FROM donorder ORDER BY MaDon DESC LIMIT 1";
$result = mysqli_query($connect,$sqlCountOrder);
$numOrder = mysqli_fetch_assoc($result);
preg_match('/\d+/', $numOrder['MaDon'], $numbersArray);
$number = $numbersArray[0];
$number++;
$ORD_ID = "D".sprintf("%04d",$number);

// insert order
$soBan = $_SESSION['tableNumber'];
$currentDateTime = date('Y-m-d H:i:s');
$sql = "INSERT INTO `donorder` VALUES('$ORD_ID','$soBan','$currentDateTime','Chưa pha chế')";
mysqli_query($connect,$sql);

// insert ct order
foreach ($_SESSION['order'] as $each) {
    $MaDoUong = $each['MaDoUong'];
    $SoLuong = $each['SoLuong'];
    $orderNote = $each['OrderNote'];
    $sql = "INSERT INTO `ctdonorder` VALUES('$ORD_ID','$MaDoUong','$SoLuong','$orderNote')";
    mysqli_query($connect,$sql);
}

unset($_SESSION['order']);
unset($_SESSION['tableNumber']);
header("location:booking.php");