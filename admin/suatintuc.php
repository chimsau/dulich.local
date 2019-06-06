<?php include('../includes/mysqli_connect.php');?>
<?php include('../includes/functions.php');?>
<?php include('includes/header.php');?>
<?php include('includes/top-header.php');?>
<?php include('includes/left-sidebar.php');?>
<?php admin_access();?>
<?php 
  // Kiem tra gia tri cua bien tid tu $_GET
  if(isset($_GET['tid']) && filter_var($_GET['tid'], FILTER_VALIDATE_INT, array('min_range' =>1))){
    $tid = $_GET['tid'];

    // Neu tid ton tai, bat dau xu ly form
    if($_SERVER['REQUEST_METHOD'] == "POST"){ //Giá trị tồn tại, xử lý form
      $errors = array();
      $trimmed = array_map('trim', $_POST);

      if($trimmed['tintuc_ten']){
        $tinTucTen = $trimmed['tintuc_ten'];
      } else {
        $errors[] = "tinTucTen";
      }

      if(filter_var($trimmed['danhmuc'], FILTER_VALIDATE_INT, array('min_range'=>1))) {
        $danhMuc = $trimmed['danhmuc'];
      } else {
        $errors[] = "danhMuc";
      }
      if($trimmed['tintuc_mota']){
        $tinTucMoTa = $trimmed['tintuc_mota'];
      }
      if($trimmed['tintuc_noidung']){
        $tinTucNoiDung = $trimmed['tintuc_noidung'];
      } 

      $tinTucHot = isset($trimmed['tintuc_hot']) ? 1 : 0;

      if(isset($_FILES['file-2'])) {
        $renamed = NULL;
        // tao mot array, de kiem tra xem file upload co thuoc dang cho phep
        $allowed = array('image/jpeg', 'image/jpg', 'image/png', 'images/x-png');

        //kiem tra xem file upload co nam trong dinh dang cho phep
        if(in_array(strtolower($_FILES['file-2']['type']), $allowed)) {
          // Neu co trong dinh dang cho phep, tach lay phan mo rong
          $tmp = explode('.',  $_FILES['file-2']['name']);
          $ext = end($tmp);
          $renamed = uniqid(rand(),true).'.'."$ext";

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

        $tinTucAnh = is_null($renamed) ? $trimmed['tintuc_anh'] : $renamed;
      }

      

      if(empty($errors)){ // kiểm tra nếu không có lỗi xảy ra, thì chèn dữ liệu vào database
        $query = "UPDATE tintuc SET tintuc_ten = ?, danhmuc_id = ?, tintuc_mota = ?, tintuc_noidung = ?, tintuc_anh = ?, tintuc_hot = ? WHERE tintuc_id = ? LIMIT 1";
        $stmt = $dbc->prepare($query);

        //gan tham so cho cau lenh prepare
        $stmt->bind_param('sisssii', $tinTucTen, $danhMuc, $tinTucMoTa, $tinTucNoiDung, $tinTucAnh, $tinTucHot, $tid);

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
    redirect_to('admin/tintuc.php');
  }

 ?>
<div class="be-content">
  <?php 

  //truy van csdl lieu de do du lieu ra
    $query = "SELECT * FROM tintuc WHERE tintuc_id = {$tid}";
    if($stmt = $dbc->query($query)){
      if($stmt->num_rows == 1) {
        //neu du lieu ton tai trong database, dua du lieu thong qua TID vao, xuat du lieu ra ngoai trinh duyet
        $tinTucs = $stmt->fetch_array(MYSQLI_ASSOC);
      } else {
        //neu TID khong hop le, se khong hien thi danh muc
        $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Tin tức không tồn tại</div></div>";
      }
    }
   ?>
    <div class="main-content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-border-color card-border-color-primary">
            <div class="card-header card-header-divider">Sửa tin tức: <?php if(isset($tinTucs['tintuc_ten'])) echo $tinTucs['tintuc_ten']; ?></div>
            <div class="card-body">
              <?php if(isset($messages)) {echo $messages;} ?>
              <form enctype="multipart/form-data" action="" method="post">
                <div class="form-group row">

                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Tên tin tức *</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input name="tintuc_ten" tabindex="1" class="form-control" type="text" value="<?php if(isset($tinTucs['tintuc_ten'])) echo strip_tags($tinTucs['tintuc_ten']); ?>">
                    <?php 
                      if(isset($errors) && in_array('tinTucTen',$errors)) 
                      echo "
                        <ul class='parsley-errors-list filled'><li class='parsley-required'>Chưa nhập tên tin tức</li></ul>
                      ";
                    ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Danh mục *</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <select class="form-control" name="danhmuc">
                      <option>Chọn danh mục</option>
                      <?php 
                        $query = "SELECT danhmuc_id, danhmuc_ten FROM danhmuc ORDER BY danhmuc_vitri ASC";
                        $stmt = $dbc->query($query) or die("Mysqli Error: $query ". $stmt->error());
                        if($stmt->num_rows > 0) {
                          while($danhmucs = $stmt->fetch_array(MYSQLI_NUM)) {
                            echo "<option value='{$danhmucs[0]}'";
                              if(isset($tinTucs['danhmuc_id']) && ($tinTucs['danhmuc_id'] == $danhmucs[0])) echo "selected='selected'";
                            echo ">".$danhmucs[1]."</option>";
                          }
                        }
                       ?>
                    </select>
                    <?php 
                      if(isset($errors) && in_array('danhMuc',$errors)) 
                        echo "
                          <ul class='parsley-errors-list filled'><li class='parsley-required'>Chưa chọn danh mục</li></ul>
                        ";
                      ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Mô tả</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <textarea class="form-control" name="tintuc_mota"><?php if(isset($tinTucs['tintuc_mota'])) echo $tinTucs['tintuc_mota']; ?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Nội dung tin tức</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                      <textarea class="form-control" name="tintuc_noidung"><?php if(isset($tinTucs['tintuc_noidung'])) echo $tinTucs['tintuc_noidung']; ?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right" for="file-2">Ảnh đại diện</label>
                  <div class="col-12 col-sm-6">
                      <input class="inputfile" id="file-2" type="file" name="file-2">
                      <label class="btn-primary" for="file-2"> <i class="mdi mdi-upload"></i><span><?php echo(is_null($tinTucs['tintuc_anh'])) ? 'Browse files...' : trim($tinTucs['tintuc_anh']); ?></span></label>
                      <input name="tintuc_anh" class="d-none" type="text" value="<?php echo(is_null($tinTucs['tintuc_anh'])) ? NULL : trim($tinTucs['tintuc_anh']); ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-12 col-sm-8 col-lg-6 offset-sm-3">
                      <div class="be-checkbox custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="check1" name="tintuc_hot" <?php  if(isset($tinTucs['tintuc_hot']) && $tinTucs['tintuc_hot'] == 1) echo 'checked'; ?>>
                          <label class="custom-control-label" for="check1">Tin tức nổi bật</label>
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