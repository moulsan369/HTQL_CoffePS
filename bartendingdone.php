<?php

  $server="localhost";
  $username="root";
  $password="";
  $db="htqlcp_nhom05";
  
  $data=new mysqli($server,$username,$password,$db);

    $display="SELECT a.MADON,SOBAN,THOIGIANDAT,SUM(SOLUONG) as Tongsl,TRANGTHAI 
    FROM donorder a join ct_dondatnuoc b on a.MADON=b.MADON
    WHERE TRANGTHAI='Hoàn thành'
    GROUP BY a.MADON,SOBAN,THOIGIANDAT,TRANGTHAI";
    $result_display=$data->query($display);
   
?>
<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap');
  </style>
  <link rel="stylesheet" href="./assets/css/styles.css">
  <link rel="stylesheet" href="./assets/css/bartending.css">
</head>

<body>
  <div class="root">
    <div class="sidebar">
      <div class="logo">
        <a><img src="./assets/images/logo/logo.png" /></a>
      </div>
      <div class="list-menu">
        <a href="booking.php">
          <div class="menu-item">
            <img src="./assets/images/icon/🦆 icon _bookmark book_.png" />
          </div>
        </a>
        <a href="#">
          <div class="menu-item choosing">
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
            <h1>PHA CHẾ</h1>
          </div>
          <div class="search-area">
            <input type="text" placeholder="Tìm kiếm" />
            <i><img class="search-icon" src="assets/images/icon/icon_search.png" /></i>
          </div>
        </div>
        <div class="navbar">
          <div class="list-nav-item">
            <a href="bartending.php" class="nav-item">
              <h6>Đang đợi</h6>
            </a>
            <div class="nav-item nav-choosing">
              <h6>Hoàn thành</h6>
            </div>
            <a href="bartendingcancel.html" class="nav-item">
              <h6>Đã hủy</h6>
            </a>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="table-status">
            <table class="dark-table" cellspacing="0">
                <thead>
                    <tr>
                        <th style="border-radius: 10px 0px 0px 10px;">Tên bàn</th>
                        <th>Giờ vào</th>
                        <th>Số món</th>
                        <th style="border-radius: 0px 10px 10px 0px;">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                  if($result_display->num_rows>0){
                    while($row=$result_display->fetch_assoc()){
                      echo "<tr>";
                      echo "<td class='border-radius-left'>".$row["SOBAN"]."</td>";
                      echo "<td>".$row["THOIGIANDAT"]."</td>";
                      echo "<td>".$row["Tongsl"]."</td>";
                      echo "<td class='border-radius-right center-column'>
                            <div class='status-box done'>".$row["TRANGTHAI"].
              
                         "</div>
                     </td>";
                      echo "</tr>";
                      
                    }
                  }
                ?>
                </tbody>
            </table>
        </div>
      </div>
    </div>
    <div class="detail">
      <div class="detail-header">
        <h1 class="detail-title-2">XEM LẠI ĐƠN</h1>
        <div class="navbar detail-header-navbar">
            <div class="list-nav-item">
              <div class="nav-item detail-navbar nav-choosing">
                <h6>Bàn 1</h6>
              </div>
            </div>
        </div>
      </div>
      <div class="detail-content">
        <div class="order-area">
          <div class="order">
            <div class="order-detail">
              <div class="order-item">
                <img class="order-image" src="assets/images/images/Lovepik_com-401324250-coffee-cup1.png"/>
                <h6 class="order-name">Caramel Macchiato</h6>
                <div class="order-quantity">
                  <h6 class="quantity-text">x1</h6>
                </div>
              </div>
              <div class="order-note-rm">
                <div class="order-note-area">
                  <p class="order-note">Không có ghi chú</p>
                </div>
                <button class="outstock-btn">Hết món</button>
              </div>
            </div>
            <div class="order-detail">
              <div class="order-item">
                <img class="order-image" src="assets/images/images/Lovepik_com-401324250-coffee-cup1.png"/>
                <h6 class="order-name">Caramel Macchiato</h6>
                <div class="order-quantity">
                  <h6 class="quantity-text">x1</h6>
                </div>
              </div>
              <div class="order-note-rm">
                <div class="order-note-area">
                  <p class="order-note">Không có ghi chú</p>
                </div>
                <button class="outstock-btn">Hết món</button>
              </div>
            </div>
            <div class="order-detail">
              <div class="order-item">
                <img class="order-image" src="assets/images/images/Lovepik_com-401324250-coffee-cup1.png"/>
                <h6 class="order-name">Caramel Macchiato</h6>
                <div class="order-quantity">
                  <h6 class="quantity-text">x1</h6>
                </div>
              </div>
              <div class="order-note-rm">
                <div class="order-note-area">
                  <p class="order-note">Không có ghi chú</p>
                </div>
                <button class="outstock-btn">Hết món</button>
              </div>
            </div>
          </div>
        </div>
        <div class="bartending-btn-area">
          <button class="done-btn">Hoàn thành</button>
          <button class="cancel-btn">Hủy</button>
        </div>
      </div>
    </div>
  </div>
  <?php
    mysqli_close($data);
  ?>
</body>

</html>