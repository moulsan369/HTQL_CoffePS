<?php
session_start();
$maDoUong = $_POST['id'];
$note = $_POST['note'];
$_SESSION['order'][$maDoUong]['OrderNote'] = $note;