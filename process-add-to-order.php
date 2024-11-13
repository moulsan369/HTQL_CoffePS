<?php
require './connect.php';

// Lấy mã đồ uống từ GET
$MaDoUong = $_GET['MaDoUong'];

// Kiểm tra nếu món đã tồn tại trong đơn hàng, tăng số lượng nếu có
if (empty($_POST['orderItems'][$MaDoUong])) {
    $sql = "SELECT * FROM `douong` WHERE MaDoUong = '$MaDoUong'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result, MYSQLI_ASSOC);

    // Thêm đồ uống mới vào danh sách đơn hàng
    $_POST['orderItems'][$MaDoUong] = [
        'MaDoUong' => $MaDoUong,
        'TenDoUong' => $each['TenDoUong'],
        'DonGia' => $each['DonGia'],
        'LinkAnh' => $each['LinkAnh'],
        'SoLuong' => 1
    ];
} else {
    // Nếu đồ uống đã tồn tại trong đơn hàng, tăng số lượng
    $_POST['orderItems'][$MaDoUong]['SoLuong']++;
}

// Trả người dùng về trang menu sau khi cập nhật
header("location:menu.php");
exit;
?>
