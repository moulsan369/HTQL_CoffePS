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
    <link rel="stylesheet" href="./assets/css/edit-menu.css" />

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="./assets/js/edit-menu.js"></script>
  </head>

  <body>
    <div class="root">
      <div class="sidebar">
        <div class="logo">
          <a><img src="./assets/images/logo/logo.png" /></a>
        </div>
        <div class="list-menu">
          <a href="menu.php">
            <div class="menu-item">
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
          <a href="#">
            <div class="menu-item choosing">
              <img src="./assets/images/icon/icon_settings.png" />
            </div>
          </a>
        </div>
      </div>
      <div class="main">
        <div class="header-navbar">
          <div class="header">
            <div class="header-title">
              <h1>CÀI ĐẶT</h1>
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
              <div class="nav-item"></div>
              <div class="nav-item">
                <h6>Chưa có trong phiên bản học này!</h6>
              </div>
              <div class="nav-item"></div>
              <div class="nav-item"></div>
            </div>
          </div>
        </div>
        <div class="content"></div>
      </div>
      <div class="detail"></div>
    </div>
  </body>
</html>
