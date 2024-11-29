<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap');
  </style>
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/styles.css">
  <link rel="stylesheet" href="./assets/css/booking.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="./assets/js/booking.js"></script>
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
      <div class="header">
        <div class="header-title">
          <h1>CHỌN SỐ BÀN</h1>
        </div>
        <div class="search-area">
          <input type="text" placeholder="Tìm kiếm" />
          <i><img class="search-icon" src="assets/images/icon/icon_search.png" /></i>
        </div>
      </div>
      <div class="content">
        <div class="wrapper">
          <div class="table">
            <h2 class="table-name">1</h2>
          </div>
          <div class="table">
            <h2 class="table-name">2</h2>
          </div>
          <div class="table">
            <h2 class="table-name">3</h2>
          </div>
          <div class="table">
            <h2 class="table-name">4</h2>
          </div>
          <div class="table">
            <h2 class="table-name">5</h2>
          </div>
          <div class="table">
            <h2 class="table-name">6</h2>
          </div>
          <div class="table">
            <h2 class="table-name">7</h2>
          </div>
          <div class="table">
            <h2 class="table-name">8</h2>
          </div>
          <div class="table">
            <h2 class="table-name">9</h2>
          </div>
          <div class="table">
            <h2 class="table-name">10</h2>
          </div>
          <div class="table">
            <h2 class="table-name">11</h2>
          </div>
          <div class="table">
            <h2 class="table-name">12</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="detail">
      <div class="detail-header">
        <h1 class="detail-title">ĐƠN ORDER</h1>
        <h3 class="detail-table-name">Số bàn:</h3>
      </div>
      <div class="detail-content">
        <div class="order-area">
          <div class="order-empty">
            <img class="empty-icon" src="assets/images/icon/icon_box iso.png" />
            <h3 class="empty-text">Chưa có món nào</h3>
          </div>
        </div>
        <div class="order-button-area">
        <a href="menu.php" class="order-button">Tiếp tục</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>