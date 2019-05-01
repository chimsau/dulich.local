<?php include('../includes/mysqli_connect.php');?>
<?php include('../includes/functions.php');?>
<?php include('includes/header.php');?>
<?php include('includes/top-header.php');?>
<?php include('includes/left-sidebar.php');?>
<?php admin_access();?>
<?php 
  // Kiem tra gia tri cua bien tid tu $_GET
  if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' =>1))){
    $id = $_GET['id'];

    // Neu tid ton tai, bat dau xu ly form
    if($_SERVER['REQUEST_METHOD'] == "POST"){ //Giá trị tồn tại, xử lý form
      $errors = array();
    $trimmed = array_map('trim', $_POST);

    if($trimmed['diadiem_ten']){
      $ten = $trimmed['diadiem_ten'];
    } else {
      $errors[] = "ten";
    }

    if(isset($_FILES['file-2'])) {
      $renamed = NULL;
      // tao mot array, de kiem tra xem file upload co thuoc dang cho phep
      $allowed = array('image/jpeg', 'image/jpg', 'image/png', 'images/x-png');

      //kiem tra xem file upload co nam trong dinh dang cho phep
      if(in_array(strtolower($_FILES['file-2']['type']), $allowed)) {
        // Neu co trong dinh dang cho phep, tach lay phan mo rong
        $ext = end(explode('.', $_FILES['file-2']['name']));
        $renamed = uniqid(rand(), true).'.'."$ext";

        if(!move_uploaded_file($_FILES['file-2']['tmp_name'], "uploads/images/".$renamed)) {
          $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Lỗi server</div></div>";
        }
      } else {
        //File upload không thuộc định dạng cho phép
        $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Không đúng định dạng ảnh</div></div>";
      }

      if(isset($_FILES['file-2']['tmp_name']) && is_file($_FILES['file-2']['tmp_name']) && file_exists($_FILES['file-2']['tmp_name'])) {
        unlink($_FILES['file-2']['tmp_name']);
      }

      $anh = is_null($renamed) ? $trimmed['diadiem_anh'] : $renamed;
    }

    if(filter_var($trimmed['diadiem_vitri'], FILTER_VALIDATE_INT, array('min_range'=>1))) {
      $vitri = $trimmed['diadiem_vitri'];
    } else {
      $errors[] = "vitri";
    }

      

      if(empty($errors)){ // kiểm tra nếu không có lỗi xảy ra, thì chèn dữ liệu vào database
        $query = "UPDATE diadiem SET diadiem_ten = ?, diadiem_anh = ?, diadiem_vitri = ? WHERE diadiem_id = ? LIMIT 1";
        $stmt = $dbc->prepare($query);

        //gan tham so cho cau lenh prepare
        $stmt->bind_param('ssii', $ten, $anh, $vitri, $id);

        //cho chay cau lenh prepare
        $stmt->execute();

        if($stmt->affected_rows == 1){
          $messages = "<div class='alert alert-success alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Cập nhập thành công</div></div>";
        } else {
          $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Chưa cập nhập thêm gì</div></div>";
        }
        
      } else {
        $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Nhập đầy đủ các thông tin</div></div>";
      }
    }
  } else {
    //Neu tid khong ton tai, thi redirect
    redirect_to('admin/diadiem.php');
  }

 ?>
<div class="be-content">
  <?php 
  //truy van csdl lieu de do du lieu ra
    $query = "SELECT * FROM diadiem WHERE diadiem_id = {$id}";
    if($stmt = $dbc->query($query)){
      if($stmt->num_rows == 1) {
        //neu du lieu ton tai trong database, dua du lieu thong qua TID vao, xuat du lieu ra ngoai trinh duyet
        $diadiem = $stmt->fetch_array(MYSQLI_ASSOC);
      } else {
        //neu TID khong hop le, se khong hien thi danh muc
        $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Địa điểm không tồn tại</div></div>";
      }
    }
   ?>
    <div class="main-content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-border-color card-border-color-primary">
            <div class="card-header card-header-divider">Sửa địa điểm: <?php if(isset($diadiem['diadiem_ten'])) echo $diadiem['diadiem_ten']; ?></div>
            <div class="card-body">
              <?php if(isset($messages)) {echo $messages;} ?>
              <form enctype="multipart/form-data" action="" method="post">
                <div class="form-group row">
                  <label for="diadiem_ten" class="col-12 col-sm-3 col-form-label text-sm-right">Tên địa điểm *</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input name="diadiem_ten" tabindex="1" class="form-control" type="text" value="<?php if(isset($diadiem['diadiem_ten'])) echo strip_tags($diadiem['diadiem_ten']); ?>">
                    <?php 
                      if(isset($errors) && in_array('ten',$errors)) 
                      echo "
                        <ul class='parsley-errors-list filled'><li class='parsley-required'>Chưa nhập tên địa điểm</li></ul>
                      ";
                    ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right" for="file-2">Ảnh đại diện</label>
                  <div class="col-12 col-sm-6">
                      <input class="inputfile" id="file-2" type="file" name="file-2">
                      <label class="btn-primary" for="file-2"> <i class="mdi mdi-upload"></i><span><?php echo(is_null($diadiem['diadiem_anh'])) ? 'Browse files...' : trim($diadiem['diadiem_anh']); ?></span></label>
                      <input name="diadiem_anh" class="d-none" type="text" value="<?php echo(is_null($diadiem['diadiem_anh'])) ? NULL : trim($diadiem['diadiem_anh']); ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="diadiem_vitri" class="col-12 col-sm-3 col-form-label text-sm-right">Vị trí *</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input name="diadiem_vitri" tabindex="2" class="form-control" type="text" value="<?php if(isset($diadiem['diadiem_vitri'])) echo strip_tags($diadiem['diadiem_vitri']); ?>">
                    <?php 
                      if(isset($errors) && in_array('vitri',$errors)) 
                      echo "
                        <ul class='parsley-errors-list filled'><li class='parsley-required'>Chưa nhập vị trí</li></ul>
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