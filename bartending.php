<?php

$server="localhost";
$username="root";
$password="";
$db="htqlcp_nhom05";

$data=new mysqli($server,$username,$password,$db);

$display="SELECT a.MaDon,SoBan,ThoiGianOrder,SUM(Soluong) as Tongsl,TrangThai 
FROM donorder a join ct_dondatnuoc b on a.MaDon=b.MaDon
WHERE TrangThai='Chưa pha chế' or TrangThai='Đang pha chế'
GROUP BY a.MaDon,SoBan,ThoiGianOrder,TrangThai";
$result_display=$data->query($display);


if(isset($_POST["agree"])){
  $update_pre="UPDATE donorder SET TrangThai='Đang pha chế'
  where MaDon=(SELECT MaDon from donorder where TrangThai='Chưa pha chế' LIMIT 1)";
  $result_upd_pre=$data->query($update_pre); 
  
}
unset($_POST["agree"]);

if(isset($_POST["done"])){
  $update_done="UPDATE donorder SET TrangThai='Hoàn thành'
  where MaDon=(SELECT MaDon from donorder where TrangThai='Đang pha chế' LIMIT 1)";
 
  $result_upd_done=$data->query($update_done);
 
}
$display="SELECT a.MaDon,SoBan,ThoiGianOrder,SUM(Soluong) as Tongsl,TrangThai 
FROM donorder a join ct_dondatnuoc b on a.MaDon=b.MaDon
WHERE TrangThai='Chưa pha chế' or TrangThai='Đang pha chế'
GROUP BY a.MaDon,SoBan,ThoiGianOrder,TrangThai";
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
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="./assets/js/bartending.js"></script>
</head>

<body>

  <div class="root">
    <div class="modal" id="modal">
      <div class="confirm-dialog">
        <h1 class="modal-title">THỰC HIỆN PHA CHẾ BÀN NÀY?</h1>
        <p class="modal-body">Bàn này sẽ được chuyển sang trang thái “Đang pha chế"</p>
        <div class="modal-footer">
          <form method="post" action="">
            <button type="button" id="close-modal" class="close-modal">Hủy</button>
            <button type="submit" class="modal-success" name="agree">Đồng Ý</button>
            
            
          </form>
        </div>
      </div>
    </div>
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
            <div class="nav-item nav-choosing">
              <h6>Đang đợi</h6>
            </div>
            <a href="bartendingdone.php" class="nav-item">
              <h6>Hoàn thành</h6>
            </a>
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
                        echo "<td class='border-radius-left'>".$row["SoBan"]."</td>";
                        echo "<td>".$row["ThoiGianOrder"]."</td>";
                        echo "<td>".$row["Tongsl"]."</td>";
                        echo "<td class='border-radius-right center-column'>
                              <div class='status-box unprepared'>".$row["TrangThai"].
                
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
    <?php
      $ma_upd="SELECT SoBan,TenDoUong,Soluong, GhiChu, LinkAnh
      from donorder a join ct_dondatnuoc b on a.MaDon=b.MaDon 
      join danhmucdouong c on b.MaDoUong=c.MaDoUong
      where a.MaDon =(SELECT MaDon from donorder where TrangThai='Đang pha chế' LIMIT 1)";

      $result_ma_upd=$data->query($ma_upd);

      $ban_upd="SELECT SoBan
      from donorder a join ct_dondatnuoc b on a.MaDon=b.MaDon 
      join danhmucdouong c on b.MaDoUong=c.MaDoUong
      where a.MaDon =(SELECT MaDon from donorder where TrangThai='Đang pha chế' LIMIT 1)";
      
      $result_ban_upd=$data->query($ban_upd);

      if (mysqli_num_rows($result_ban_upd) > 0) {
        while ($row0 = mysqli_fetch_assoc($result_ban_upd)) {
          echo "<div class='detail-header'>";
          echo "<h1 class='detail-title-2'>CHI TIẾT ĐƠN</h1>";
          echo "<div class='navbar detail-header-navbar'>";
            echo "<div class=list-nav-item'>";
              echo "<div class='nav-item detail-navbar nav-choosing'>";
                echo "<h6>Bàn" .$row0["SoBan"].
                "</h6>";
              echo "</div>";
            echo  "</div>";
          echo "</div>";
        echo "</div>";break;
        }
      }
      ?>
      <div class="detail-content">
        <div class="order-area">
          <div class="order">
        <?php
          if (mysqli_num_rows($result_ma_upd) > 0) {
            while ($row1 = mysqli_fetch_assoc($result_ma_upd)) {
              
                echo "<div class='order-detail'>";
                  echo "<div class='order-item'>";
                    echo "<img class='order-image' src='assets/images/images/".$row1["LinkAnh"]."'>";
                    echo "<h6 class='order-name'>".$row1["TenDoUong"]."</h6>";
                    echo "<div class='order-quantity'>";
                      echo "<h6 class='quantity-text'>x".$row1["Soluong"]."</h6>";
                    echo "</div>";
                  echo "</div>";
                  echo "<div class='order-note-rm'>";
                    echo "<div class='order-note-area'>";
                      echo "<p class='order-note'>".$row1["GhiChu"]."</p>";
                    echo "</div>";
                    echo "<button class='outstock-btn'>Hết món</button>";
                  echo "</div>";
                echo "</div>";
              
            }
          }
        ?>  
            </div>
          </div>
        </div>
        <?php
        
        ?>
        <div class="bartending-btn-area">
          <form action="#" method="post">
            <button type="submit" name="done" class="done-btn" >Hoàn thành</button>
            <button class="cancel-btn">Hủy</button>
          </form>
          
          
         
        </div>
      </div>
    </div>
  </div>
  <?php
    mysqli_close($data);
  ?>

</body>

</html>
