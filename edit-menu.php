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
  <link rel="stylesheet" href="./assets/css/menu.css">
  <link rel="stylesheet" href="./assets/css/edit-menu.css">


  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="./assets/js/edit-menu.js"></script>
</head>

<?php 

// kết nối CSDL
  include("connect.php");
  $connect = mysqli_connect('localhost','root','','htqlcp_nhom05');
  mysqli_set_charset($connect,'utf8');

  // truy vấn đồ uống
  $strTruyvan = "SELECT * FROM douong";   
  $resurlt = mysqli_query($connect,$strTruyvan);

  // thêm đồ uống
  if(isset($_POST['create'])){
    $ten = $_POST['tendouong'];
    $gia = $_POST['gia'];

    // đưa ảnh vào thư mục và lưu tên hình ảnh vào database
    $LinkAnh = $_FILES['LinkAnh'];
    $tenLinkAnh = $_FILES['LinkAnh']['name'];
    $target_dir = realpath("./assets/images/images/");
    // cấp quyền ghi cho người dùng để lưu được ảnh vào thư mục
    chmod($target_dir, 0777);
    $target_file = $target_dir . '/' . basename($LinkAnh['name']);
    move_uploaded_file($LinkAnh['tmp_name'], $target_file);

    // nếu id không điền thì hãy để tự động tăng, database đã tạo rồi nên id ở đây sẽ được tạo bằng code
    $layid = "SELECT count(*) FROM douong";
    $kqlayid = mysqli_query($connect, $layid);
    if ($kqlayid) {
        $cotid = mysqli_fetch_array($kqlayid, MYSQLI_ASSOC);
        $count = $cotid['count(*)'];
        $id = "DO" . strval($count);
    }

    // thêm đồ uống và load lại trang
    if (createDoUong($id, $ten, $gia, $tenLinkAnh, $connect)) {
      header("Location: edit-menu.php");
      exit;
    }   
  }

  // xóa đồ uống và load lại trang
  if(isset($_POST['delete'])){
    $id = $_POST['delete'];
    if (xoaDoUong($id, $connect)) {
      header("Location: edit-menu.php");
      exit;
    }   
  }

  // sửa đồ uống
  if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $ten = $_POST['tendouong'];
    $gia = $_POST['gia'];

    // đưa ảnh vào thư mục và lưu tên hình ảnh vào database
    if(isset($_FILES['LinkAnh']) && $_FILES['LinkAnh']['name'] != ''){
      $LinkAnh = $_FILES['LinkAnh'];
      $tenLinkAnh = $_FILES['LinkAnh']['name'];
      $target_dir = realpath("./assets/images/images/");
      // cấp quyền ghi cho người dùng để lưu được ảnh vào thư mục
      chmod($target_dir, 0777);
      $target_file = $target_dir . '/' . basename($LinkAnh['name']);
      move_uploaded_file($LinkAnh['tmp_name'], $target_file);
    }
    else{
      $sqlanh = "SELECT LinkAnh FROM douong WHERE MADOUONG = '$id'";
      $LinkAnh = mysqli_query($connect, $sqlanh);
      $row = mysqli_fetch_assoc($LinkAnh);
      $tenLinkAnh = $row['LinkAnh'];

    }
    
    if (editDoUong($id, $ten, $gia, $tenLinkAnh, $connect)) {
      header("Location: edit-menu.php");
      exit;
    }   
  }

  // sửa đồ uống
  if(isset($_POST['edit'])){
    $id = $_POST['edit'];
    if (xoaDoUong($id, $connect)) {
      header("Location: edit-menu.php");
      exit;
    }   
  }

  function xoaDoUong($MADOUONG, $connect) {
    $sql = "DELETE FROM `douong` WHERE `MADOUONG` = '$MADOUONG'";
    $tb = mysqli_query($connect, $sql);
    if ($tb) {
      return true;
    } else {
      return false;
    }
  }

  function createDoUong($MADOUONG, $TENDOUONG, $DONGIA, $LinkAnh, $connect){
    $sql = "INSERT INTO `douong`(`MADOUONG`, `TENDOUONG`, `DONGIA`,`LinkAnh`) VALUES ('$MADOUONG','$TENDOUONG','$DONGIA','$LinkAnh')";
    $tb  = mysqli_query($connect,$sql);
    return true;
  }

  function editDoUong($MADOUONG, $TENDOUONG, $DONGIA, $LinkAnh, $connect){
    $sql = "UPDATE `douong`
      SET `TENDOUONG` = '$TENDOUONG', `DONGIA`= '$DONGIA', `LinkAnh`='$LinkAnh'
      WHERE `MADOUONG` = '$MADOUONG'";
    $tb  = mysqli_query($connect,$sql);
    return true;
  }

?>

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
        <a href="bartending.php">
          <div class="menu-item">
            <img src="./assets/images/icon/🦆 icon _clutery_.png" />
          </div>
        </a>
        <a href="#">
          <div class="menu-item choosing">
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
            <h1>CHỈNH SỬA MENU</h1>
          </div>
          <div class="search-area">
            <input type="text" placeholder="Tìm kiếm" />
            <i><img class="search-icon" src="assets/images/icon/icon_search.png" /></i>
          </div>
        </div>
        <div class="navbar">
          <div class="list-nav-item">
            <div class="nav-item nav-choosing">
              <h6>Coffee</h6>
            </div>
            <div class="nav-item">
              <h6>Trà</h6>
            </div>
            <div class="nav-item">
              <h6>Trà sữa</h6>
            </div>
            <div class="nav-item">
              <h6>Khác</h6>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="menu-wrapper">
          <?php 
          while($row=mysqli_fetch_array($resurlt)){ ?>
            <!-- thêm cái form vào đây thì mới xóa, sửa được -->
            <form method="post"> 
            <div class="menu">
              <span class="edit-menu"><i><img src="assets/images/icon/edit-icon.png" /></i></span>
              <!-- không được xóa bằng javascript -->
              <span class="remove-menu-1">
              <button type="submit" name="delete" style="position: absolute; top: 8px; left: 2px; width: 2px; height: 2px; background : none; border : none" value="<?php echo $row['MADOUONG'] ?>">
                  <img src="assets/images/icon/icon_trash_w.png" />
                </button>
              </span>

              <img class="menu-image" src="assets/images/images/<?php echo $row['LinkAnh'] ?>"/>
              <h6 class="menu-name"><?php echo $row['TENDOUONG'] ?></h6>
              <h6 class="menu-price"><?php echo $row['DONGIA'] ?></h6>
              <h6 class="menu-id" style="display:none"><?php echo $row['MADOUONG']?></h6>
            </div>
            </form>
          <?php }?>

        
          <div class="menu add-menu">
            <span class="add"><button style="background: none; border:none;"><img class="add" src="assets/images/icon/add-icon.png" /></button></span>
          </div>
        </div>
      </div>
    </div>



    <div class="detail">
      <div class="detail-header">
        <h1 class="detail-title">Thêm món</h1>
      </div>
      <div class="detail-content">
        <div class="form add-form">


          <!-- action nếu không biết điền gì thì để rỗng hoặc không điền, đừng để # -->
          <form method="post" action="" enctype="multipart/form-data">
            <div class="input-group">
              <label for="name">Tên món</label>
              <input type="text" id="name" name="tendouong">
            </div>
            <div class="input-group">
              <label for="price">Giá</label>
              <input type="number" id="price" name="gia">
              <span class="unit-text">Đồng</span>
            </div>
            <div class="input-group">
              <label for="image" class="form-label">Hình ảnh</label>
              <input id="image" type="file" name="LinkAnh">
            </div>
            <div class="submit">
              <button type="submit" value="Hoàn tất" class="submit-btn" name="create">Hoàn tất</button>
            </div>
          </form>
        </div>


        <div class="form edit-form">
          <form method="post" action="" enctype="multipart/form-data">

            <div class="input-group">
              <label for="id">Mã</label>
              <input type="text" id="edit-id" name="id" readonly>
            </div>

            <div class="input-group">
              <label for="name">Tên món</label>
              <input type="text" id="edit-name" name="tendouong" require>
            </div>
            <div class="input-group">
              <label for="price">Giá</label>
              <input type="number" id="edit-price" name="gia" require>
              <span class="unit-text">Đồng</span>
            </div>

            <div class="input-group">
              <label for="image" class="form-label">Hình ảnh</label>
              <input id="edit-image" type="file" name="LinkAnh" >
            </div>

            <div class="submit">
              <button type="submit" class="submit-btn" name="edit" >Sửa</button>
            </div>
          </form>


        </div>
      </div>
    </div>
  </div>
</body>

</html>