<?php include('../includes/mysqli_connect.php');?>
<?php include('../includes/functions.php');?>
<?php include('includes/header.php');?>
<?php include('includes/top-header.php');?>
<?php include('includes/left-sidebar.php');?>

<?php 
  if($_SERVER['REQUEST_METHOD'] == "POST"){ //Giá trị tồn tại, xử lý form

    $errors = array();
    $trimmed = array_map('trim', $_POST);

    if($trimmed['diadiem_ten']){
      $ten = $trimmed['diadiem_ten'];
    } else {
      $errors[] = "ten";
    }

    if(filter_var($trimmed['diadiem_vitri'], FILTER_VALIDATE_INT, array('min_range'=>1))) {
      $vitri = $trimmed['diadiem_vitri'];
    } else {
      $errors[] = "vitri";
    }

    if(empty($errors)){// kiểm tra nếu không có lỗi xảy ra, thì chèn dữ liệu vào database

      $query = "INSERT INTO danhmuc (diadiem_ten, diadiem_vitri, danhmuc_ngaytao) VALUES ('{$danhMucTen}', $danhMucViTri, NOW())";

      if($ins_stmt = $dbc->prepare($query)) {

        //cho chạy câu lệnh
        $ins_stmt->execute() or die("Lỗi mysqli: $query " . $ins_stmt->error());

        if($ins_stmt->affected_rows == 1){
          $messages = "<div class='alert alert-success alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Thêm mới thành công</div></div>";
        } else {
          $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Lỗi khi thêm mới</div></div>";
        }
      }
    } else {
      $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Nhập đầy đủ các thông tin</div></div>";
    }
  }

 ?>
<div class="be-content">
    <div class="main-content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-border-color card-border-color-primary">
            <div class="card-header card-header-divider">Thêm địa điểm</div>
            <div class="card-body">
              <?php if(isset($messages)) {echo $messages;} ?>
              <form action="" method="post">
                <div class="form-group row">
                  <label for="diadiem_ten" class="col-12 col-sm-3 col-form-label text-sm-right">Tên địa điểm *</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input name="diadiem_ten" tabindex="1" class="form-control" type="text" value="<?php if(isset($_POST['diadiem_ten'])) echo strip_tags($_POST['diadiem_ten']); ?>">
                    <?php 
                      if(isset($errors) && in_array('ten',$errors)) 
                      echo "
                        <ul class='parsley-errors-list filled'><li class='parsley-required'>Chưa nhập tên địa điểm</li></ul>
                      ";
                    ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="diadiem_vitri" class="col-12 col-sm-3 col-form-label text-sm-right">Vị trí *</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input name="diadiem_vitri" tabindex="2" class="form-control" type="text" value="<?php if(isset($_POST['diadiem_vitri'])) echo strip_tags($_POST['diadiem_vitri']); ?>">
                    <?php 
                      if(isset($errors) && in_array('danhMucViTri',$errors)) 
                      echo "
                        <ul class='parsley-errors-list filled'><li class='parsley-required'>Chưa nhập vị trí</li></ul>
                      ";
                    ?>
                  </div>
                </div>
                <div class="form-group row text-right">
                  <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                    <button class="btn btn-space btn-primary" tabindex="3" type="submit">Thêm mới</button>
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