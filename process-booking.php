<?php
session_start();
$tableName = $_POST['table'];
$_SESSION['tableNumber'] = $tableName;
?>