 <?php
 session_start();
 if (empty($_SESSION['order'])) $check = true;
 else {
     $check = false;
     $order = $_SESSION['order'];
 }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap");
      @import url("https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap");
    </style>
    <link rel="stylesheet" href="./assets/css/styles.css" />
    <link rel="stylesheet" href="./assets/css/menu.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="./assets/js/menu.js"></script>

  </head>
  <body>
    <div class="root">
      <div class="sidebar">
        <div class="logo">
          <a><img src="./assets/images/logo/logo.png" /></a>
        </div>
        <div class="list-menu">
          <a href="#">
            <div class="menu-item choosing">
              <img src="./assets/images/icon/🦆 icon _bookmark book_.png" />
            </div>
          </a>
          <a href="bartending.php">
            <div class="menu-item">
              <img src="./assets/images/icon/🦆 icon _clutery_.png" />
            </div>
          </a>
          <a href="edit-menu.php">
            <div class="menu-item">
              <img src="./assets/images/icon/icon_edit pencil.png" />
            </div>
          </a>
          <a href="setting.php">
            <div class="menu-item">
              <img src="./assets/images/icon/icon_settings.png" />
            </div>
          </a>
        </div>
      </div>
      <div class="main">
        <div class="header-navbar">
          <div class="header">
            <div class="header-title">
              <h1>MENU</h1>
            </div>
            <div class="search-area">
              <input type="text" placeholder="Tìm kiếm" />
              <i
                ><img
                  class="search-icon"
                  src="assets/images/icon/icon_search.png"
              /></i>
            </div>
          </div>
          <div class="navbar">
            <div class="list-nav-item">
              <div class="nav-item nav-choosing">
                <h6>Coffee</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="content">
          <div class="menu-wrapper">
            <?php 
            require './connect.php';
            $sql = "SELECT * FROM `danhmucdouong`";
            $result = mysqli_query($connect, $sql);
            ?>
            <?php foreach ($result as $each): ?>
            <a href="process-add-to-order.php?MaDoUong=<?php echo $each['MaDoUong']?>">
                <div class="menu">
                    <img
                            class="menu-image"
                            src="assets/images/images/<?php echo $each['LinkAnh']?>"
                    />
                    <h6 class="menu-name"><?php echo $each['TenDoUong']?></h6>
                    <h6 class="menu-price"><?php echo $each['DonGia']?></h6>
                </div>
            </a>
            <?php endforeach ?>
          </div>
        </div>
      </div>
      <div class="detail">
        <div class="detail-header">
          <h1 class="detail-title">ĐƠN ORDER</h1>
          <h3 class="detail-table-name">Số bàn:
          <?php
          if (isset($_SESSION['tableNumber'])) {
              echo $_SESSION['tableNumber'];
              echo '<a style="margin-left: 10px;" href="booking.php">Chọn bàn</a>';
          } else { echo '<a style="margin-left: 10px;" href="booking.php">Chọn bàn</a>';}
          ?>
          </h3>
        </div>
        <div class="detail-content">
          <div class="order-area">
            <div class="order">

                <?php if ($check === true) {} else { ?>
                <?php foreach ($order as $MaDoUong => $each): ?>
              <div class="order-detail">
                  <span class="ma-do-uong" style="display: none"><?php echo $each['MaDoUong']?></span>
                <div class="order-item">
                  <img
                    class="order-image"
                    src="assets/images/images/<?php echo $each['LinkAnh']?>"
                  />
                  <h6 class="order-name"><?php echo $each['TenDoUong']?></h6>
                  <div class="order-quantity">
                      <a href="process-increase-item-order.php?action=incre&id=<?php echo $each['MaDoUong']?>"><button class="order-quantity-button">+</button></a>
                    <h6 class="quantity-text"><?php echo $_SESSION['order'][$MaDoUong]['SoLuong']?></h6>
                      <a href="process-decrease-item-order.php?action=decre&id=<?php echo $each['MaDoUong']?>"><button class="order-quantity-button">-</button></a>
                  </div>
                </div>
                <div class="order-note-rm">
                  <div class="order-note-area">
                      <input class="note" type="text" style="background-color: #424851; width: 100%; border: none; color: white">
                  </div>
                  <button class="rm-btn">
                    <i><img src="assets/images/icon/icon_trash.png" /></i>
                  </button>
                </div>
              </div>
                    <?php endforeach ?>
                <?php } ?>
            </div>
          </div>
          <div class="order-button-area">
              <a href="process-add-order.php"><button type="submit" class="order-button">Gửi đơn</button></a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
