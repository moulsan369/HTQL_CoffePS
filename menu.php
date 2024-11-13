<?php
require 'connect.php';

// Lấy dữ liệu đơn hàng từ `POST`
$orderItems = $_POST['orderItems'] ?? []; // Lấy danh sách các món hàng, mặc định là mảng trống
$tableNumber = $_GET['tableNumber'] ?? null; // Lấy số bàn từ `GET`

// Kiểm tra nếu không có đơn hàng nào
$check = empty($orderItems);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/styles.css" />
    <link rel="stylesheet" href="./assets/css/menu.css" />
    <title>Menu</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap");
    </style>
</head>
<body>
<div class="root">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <a><img src="./assets/images/logo/logo.png" alt="Logo"/></a>
        </div>
        <div class="list-menu">
            <a href="#"><div class="menu-item choosing"><img src="./assets/images/icon/🦆 icon _bookmark book_.png" alt="Bookmark"/></div></a>
            <a href="bartending.php"><div class="menu-item"><img src="./assets/images/icon/🦆 icon _clutery_.png" alt="Bartending"/></div></a>
            <a href="edit-menu.php"><div class="menu-item"><img src="./assets/images/icon/icon_edit pencil.png" alt="Edit Menu"/></div></a>
            <a href="setting.php"><div class="menu-item"><img src="./assets/images/icon/icon_settings.png" alt="Settings"/></div></a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main">
        <div class="header-navbar">
            <div class="header">
                <h1 class="header-title">MENU</h1>
                <div class="search-area">
                    <input type="text" placeholder="Tìm kiếm" />
                    <img class="search-icon" src="assets/images/icon/icon_search.png" alt="Search"/>
                </div>
            </div>
            <div class="navbar">
                <div class="list-nav-item">
                    <div class="nav-item nav-choosing"><h6>Coffee</h6></div>
                    <div class="nav-item"><h6>Trà</h6></div>
                    <div class="nav-item"><h6>Trà sữa</h6></div>
                    <div class="nav-item"><h6>Khác</h6></div>
                </div>
            </div>
        </div>
        
        <!-- Menu Items -->
        <div class="content">
            <div class="menu-wrapper">
                <?php 
                $sql = "SELECT * FROM `douong`";
                $result = mysqli_query($connect, $sql);
                foreach ($result as $each): 
                ?>
                <!-- Form để thêm món vào orderItems -->
                <form action="" method="post">
                    <input type="hidden" name="orderItems[<?php echo $each['MaDoUong']; ?>][MaDoUong]" value="<?php echo $each['MaDoUong']; ?>">
                    <input type="hidden" name="orderItems[<?php echo $each['MaDoUong']; ?>][TenDoUong]" value="<?php echo $each['TenDoUong']; ?>">
                    <input type="hidden" name="orderItems[<?php echo $each['MaDoUong']; ?>][DonGia]" value="<?php echo $each['DonGia']; ?>">
                    <input type="hidden" name="orderItems[<?php echo $each['MaDoUong']; ?>][SoLuong]" value="1">
                    <input type="hidden" name="tableNumber" value="<?php echo $tableNumber; ?>">

                    <button type="submit" style="border: none; background: none;">
                        <div class="menu">
                            <img class="menu-image" src="assets/images/images/<?php echo $each['LinkAnh']; ?>" alt="Menu Image"/>
                            <h6 class="menu-name"><?php echo $each['TenDoUong']; ?></h6>
                            <h6 class="menu-price"><?php echo $each['DonGia']; ?></h6>
                        </div>
                    </button>
                </form>
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <!-- Order Details -->
    <div class="detail">
        <div class="detail-header">
            <h1 class="detail-title">ĐƠN ORDER</h1>
            <h3 class="detail-table-name">Số bàn: 
                <?php
                if ($tableNumber) {
                    echo $tableNumber;
                    echo '<a style="margin-left: 10px;" href="booking.php">Chọn bàn</a>';
                } else {
                    echo '<a style="margin-left: 10px;" href="booking.php">Chọn bàn</a>';
                }
                ?>
            </h3>
        </div>
        
        <!-- Order Items -->
        <div class="detail-content">
            <div class="order-area">
                <div class="order">
                    <?php if (!$check): ?>
                        <?php foreach ($orderItems as $MaDoUong => $each): ?>
                        <div class="order-detail">
                            <span class="ma-do-uong" style="display: none"><?php echo $each['MaDoUong']; ?></span>
                            <div class="order-item">
                                  <?php if (!empty($each['LinkAnh'])): ?>
                                      <!-- Nếu có ảnh thì hiển thị ảnh từ LinkAnh -->
                                      <img class="order-image" src="./assets/images/images/<?php echo $each['LinkAnh']; ?>" alt="Order Image"/>
                                  <?php else: ?>
                                      <!-- Nếu không có ảnh thì hiển thị ảnh mặc định -->
                                      <img class="order-image" src="./assets/images/photo.png" alt="Default Image"/>
                                  <?php endif; ?>
                                  <h6 class="order-name"><?php echo $each['TenDoUong']; ?></h6>
                                  <div class="order-quantity">
                                      <h6 class="quantity-text"><?php echo $each['SoLuong']; ?></h6>
                                  </div>
                              </div>

                            <div class="order-note-rm">
                                <div class="order-note-area">
                                    <input class="note" type="text" name="orderItems[<?php echo $MaDoUong; ?>][OrderNote]" placeholder="Ghi chú" style="background-color: #424851; width: 100%; border: none; color: white" value="<?php echo $each['OrderNote'] ?? ''; ?>">
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Submit Order Button -->
            <div class="order-button-area">
                <form action="process-add-order.php" method="post">
                    <input type="hidden" name="tableNumber" value="<?php echo $tableNumber; ?>">
                    <?php foreach ($orderItems as $item): ?>
                        <input type="hidden" name="orderItems[]" value="<?php echo htmlentities(json_encode($item)); ?>">
                    <?php endforeach; ?>
                    <button type="submit" class="order-button">Gửi đơn</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
