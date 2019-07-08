<?php $title = "Sửa Câu chuyện"; ?>
<?php include('../includes/mysqli_connect.php');?>
<?php include('../includes/functions.php');?>
<?php include('includes/header.php');?>
<?php include('includes/top-header.php');?>
<?php include('includes/left-sidebar.php');?>
<?php editor_access();?>

<?php 
  // Kiem tra gia tri cua bien tid tu $_GET
  if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' =>1))){
    $id = $_GET['id'];

    // Neu tid ton tai, bat dau xu ly form

  if($_SERVER['REQUEST_METHOD'] == "POST"){ //Giá trị tồn tại, xử lý form
    $errors = array();
    $trimmed = array_map('trim', $_POST);

    if($trimmed['cauchuyen_tieude']){
      $tieude = $trimmed['cauchuyen_tieude'];
    } else {
      $errors[] = "tieude";
    }

    if($trimmed['cauchuyen_noidung']){
      $noidung = $trimmed['cauchuyen_noidung'];
    } else {
      $errors[] = "noidung";
    }

    $trangthai = $trimmed['cauchuyen_trangthai'];

    $hot = isset($trimmed['hot']) ? 1 : 0;

    if(empty($errors)){ // kiểm tra nếu không có lỗi xảy ra, thì chèn dữ liệu vào database
      $query = "UPDATE cauchuyen SET cauchuyen_tieude = ?, cauchuyen_noidung = ?, cauchuyen_trangthai = ?, cauchuyen_hot = ? WHERE id = ? LIMIT 1";
      $stmt = $dbc->prepare($query);

      //gan tham so cho cau lenh prepare
      $stmt->bind_param('ssiii', $tieude, $noidung, $trangthai, $hot, $id);

      //cho chay cau lenh prepare
      $stmt->execute();

      if($stmt->affected_rows == 1){
        $messages = "<div class='alert alert-success alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Cập nhập câu chuyện thành công</div></div>";
      } else {
        $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Chưa cập nhập thêm gì</div></div>";
      }
      
    } else {
      $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Nhập đầy đủ các thông tin</div></div>";
    }
  }

  } else {
    //Neu tid khong ton tai, thi redirect
    redirect_to('admin/cauchuyen.php');
  }

 ?>
<div class="be-content">
  <?php 

  //truy van csdl lieu de do du lieu ra
    $query = "SELECT * FROM cauchuyen WHERE id = {$id}";
    if($stmt = $dbc->query($query)){
      if($stmt->num_rows == 1) {
        //neu du lieu ton tai trong database, dua du lieu thong qua TID vao, xuat du lieu ra ngoai trinh duyet
        $cauchuyens = $stmt->fetch_array(MYSQLI_ASSOC);
      } else {
        //neu TID khong hop le, se khong hien thi danh muc
        $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Câu chuyện không tồn tại</div></div>";
      }
    }
   ?>
    <div class="main-content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-border-color card-border-color-primary">
            <div class="card-header card-header-divider">Sửa Câu chuyện: <?php if(isset($cauchuyens['cauchuyen_tieude'])) echo $cauchuyens['cauchuyen_tieude']; ?></div>
            <div class="card-body">
              <?php if(isset($messages)) {echo $messages;} ?>
              <form enctype="multipart/form-data" action="" method="post">
                <div class="form-group row">

                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Tiêu đề *</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input name="cauchuyen_tieude" tabindex="1" class="form-control" type="text" value="<?php if(isset($cauchuyens['cauchuyen_tieude'])) echo strip_tags($cauchuyens['cauchuyen_tieude']); ?>">
                    <?php 
                      if(isset($errors) && in_array('tieude',$errors)) 
                      echo "
                        <ul class='parsley-errors-list filled'><li class='parsley-required'>Chưa nhập tiêu đề</li></ul>
                      ";
                    ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Nội dung *</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                      <textarea class="form-control" name="cauchuyen_noidung"><?php if(isset($cauchuyens['cauchuyen_noidung'])) echo $cauchuyens['cauchuyen_noidung']; ?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Trạng thái *</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <select class="form-control" name="cauchuyen_trangthai">
                      <?php 
                        $query = "SELECT cauchuyen_trangthai FROM cauchuyen WHERE id = {$id} ORDER BY cauchuyen_trangthai ASC";
                        $stmt = $dbc->query($query);
                        if($stmt->num_rows == 1) {
                          $trangthais = $stmt->fetch_array(MYSQLI_NUM);
                          $trangthai = array('0' => 'Chưa kiểm duyệt', '1' => 'Kiểm duyệt');
                          foreach ($trangthai as $key => $value) {
                            echo "<option value='{$key}' ";
                              if($key == $trangthais[0]) echo "selected='selected'";
                            echo ">{$value}</option>";
                          }
                        } 
                       ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-12 col-sm-8 col-lg-6 offset-sm-3">
                      <div class="be-checkbox custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="check1" name="hot" <?php  if(isset($cauchuyens['cauchuyen_hot']) && $cauchuyens['cauchuyen_hot'] == 1) echo 'checked'; ?>>
                          <label class="custom-control-label" for="check1">Câu chuyện nổi bật</label>
                      </div>
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