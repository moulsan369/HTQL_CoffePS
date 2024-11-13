<?php
session_start();

if (isset($_POST['id'], $_POST['note'])) {
    $maDoUong = $_POST['id'];
    $note = $_POST['note'];

    // Kiểm tra nếu phần tử $maDoUong đã tồn tại trong $_SESSION['order'] trước khi gán OrderNote
    if (isset($_SESSION['order'][$maDoUong])) {
        $_SESSION['order'][$maDoUong]['OrderNote'] = $note;
    } else {
        // Tạo mục mới nếu món uống chưa tồn tại
        $_SESSION['order'][$maDoUong] = [
            'OrderNote' => $note,
            'SoLuong' => 1  // Có thể thiết lập số lượng mặc định
        ];
    }
}
