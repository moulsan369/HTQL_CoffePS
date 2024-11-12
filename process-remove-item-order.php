<?php
session_start();
$maDoUong = $_POST['id'];
unset($_SESSION['order'][$maDoUong]);