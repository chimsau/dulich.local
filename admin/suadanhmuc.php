<?php include('../includes/mysqli_connect.php');?>
<?php include('../includes/functions.php');?>
<?php include('includes/header.php');?>
<?php include('includes/top-header.php');?>
<?php include('includes/left-sidebar.php');?>

<?php 
  //xac nhan bien GET ton tai va thuoc loai du lieu cho phep
  if(isset($_GET['cid']) && filter_var($_GET['cid'], FILTER_VALIDATE_INT, array('min_range' =>1))){
    $cid = $_GET['cid'];

    if($_SERVER['REQUEST_METHOD'] == "POST"){ //Giá trị tồn tại, xử lý form

      $errors = array();
      $trimmed = array_map('trim', $_POST);

      if($trimmed['danhmuc_ten']){
        $danhMucTen = $trimmed['danhmuc_ten'];
      } else {
        $errors[] = "danhMucTen";
      }

      if(filter_var($trimmed['danhmuc_vitri'], FILTER_VALIDATE_INT, array('min_range'=>1))) {
        $danhMucViTri = $trimmed['danhmuc_vitri'];
      } else {
        $errors[] = "danhMucViTri";
      }

      if(empty($errors)){// kiểm tra nếu không có lỗi xảy ra, thì chèn dữ liệu vào database
        $query = "UPDATE danhmuc SET danhmuc_ten = ?, danhmuc_vitri = ? WHERE danhmuc_id = ? LIMIT 1";
        if($upd_stmt = $dbc->prepare($query)) {

          //gan tham so
          $upd_stmt->bind_param('sii', $danhMucTen, $danhMucViTri, $cid);

          //cho chay cau lenh
          $upd_stmt->execute() or die("Mysqli Error: $query ". $upd_stmt->error());

          if($upd_stmt->affected_rows == 1){
            $messages = "<div class='alert alert-success alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Cập nhập thành công</div></div>";
          } else {
            $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Lỗi khi cập nhập</div></div>";
          }
        }
      } else {
        $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Nhập đầy đủ các thông tin</div></div>";
      }
    }
  } else {
    redirect_to('admin/danhmuc.php');
  }

 ?>
<div class="be-content">
  <?php 
    $query = "SELECT danhmuc_ten, danhmuc_vitri FROM danhmuc WHERE danhmuc_id = {$cid}";
    if($stmt = $dbc->query($query)){
      if($stmt->num_rows == 1) {
        //neu danh muc ton tai trong database, dua du lieu thong qua CID vao, xuat du lieu ra ngoai trinh duyet
        list($danhMucTen, $danhMucViTri) = $stmt->fetch_array(MYSQLI_NUM);
      } else {
        //neu CID khong hop le, se khong hien thi danh muc
        $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Danh mục không tồn tại</div></div>";
      }
    }
   ?>
    <div class="main-content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-border-color card-border-color-primary">
            <div class="card-header card-header-divider">Sửa danh mục: <?php if(isset($danhMucTen)) echo $danhMucTen; ?></div>
            <div class="card-body">
              <?php if(isset($messages)) {echo $messages;} ?>
              <form action="" method="post">
                <div class="form-group row">
                  <label for="danhmuc_ten" class="col-12 col-sm-3 col-form-label text-sm-right">Tên danh mục</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input name="danhmuc_ten" tabindex="1" class="form-control" type="text" value="<?php if(isset($danhMucTen)) echo $danhMucTen; ?>" placeholder="Nhập tên danh mục">
                    <?php 
                      if(isset($errors) && in_array('danhMucTen',$errors)) 
                      echo "
                        <ul class='parsley-errors-list filled'><li class='parsley-required'>Nhập tên danh mục</li></ul>
                      ";
                    ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="danhmuc_vitri" class="col-12 col-sm-3 col-form-label text-sm-right">Vị trí</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <select name="danhmuc_vitri" tabindex='2' class="form-control">
                      <?php
                          $query = "SELECT count(danhmuc_id) AS count FROM danhmuc";
                          $stmt = $dbc->query($query);
                          if($stmt->num_rows == 1) {
                            list($num) = $stmt->fetch_array(MYSQLI_NUM);
                            for($i=1; $i<=$num+1; $i++) { // Tao vong for de ra option, cong them 1 gia tri cho vi tri
                              echo "<option value='{$i}'";
                                  if(isset($danhMucViTri) && ($danhMucViTri == $i)) echo "selected='selected'";
                              echo ">".$i."</otption>";
                            }
                          }
                      ?>
                    </select>
                    <?php 
                      if(isset($errors) && in_array('danhMucViTri',$errors)) 
                      echo "
                        <ul class='parsley-errors-list filled'><li class='parsley-required'>Nhập vị trí</li></ul>
                      ";
                    ?>
                  </div>
                </div>
                <div class="form-group row text-right">
                  <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                    <button class="btn btn-space btn-primary" tabindex="3" type="submit">Cập nhập</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<?php include('includes/right-sidebar.php');?>
<?php include('includes/footer.php');?>