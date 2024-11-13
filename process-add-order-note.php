<?php
require './connect.php';

if (isset($_POST['id'], $_POST['note'])) {
    $maDoUong = $_POST['id'];
    $note = $_POST['note'];

    // Lấy đơn hàng hiện tại và cập nhật ghi chú
    $sql = "UPDATE `ct_dondatnuoc` SET OrderNote = '$note' WHERE MaDoUong = '$maDoUong'";
    mysqli_query($connect, $sql);
}

// Trả về trang đơn hàng sau khi cập nhật
header("location:order.php");
exit;
?>
