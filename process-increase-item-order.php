<?php
$action = $_GET['action'];
$maDoUong = $_GET['id'];
session_start();
if ($action == 'incre') {
    $_SESSION['order'][$maDoUong]['SoLuong']++;
    header("location:menu.php");
    exit();
}
header("location:menu.php");