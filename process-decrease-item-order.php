<?php
$action = $_GET['action'];
$maDoUong = $_GET['id'];
session_start();
if ($action == 'decre') {
    if ($_SESSION['order'][$maDoUong]['SoLuong'] === 1) {
        $_SESSION['order'][$maDoUong]['SoLuong'] = 1;
        header("location:menu.php");
        exit();
    }
    $_SESSION['order'][$maDoUong]['SoLuong']--;
    header("location:menu.php");
    exit();
}
header("location:menu.php");