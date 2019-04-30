<?php include('../includes/mysqli_connect.php');?>
<?php include('../includes/functions.php');?>
<?php include('includes/header.php');?>
<?php include('includes/top-header.php');?>
<?php include('includes/left-sidebar.php');?>

<?php 
  // Kiem tra gia tri cua bien tid tu $_GET
  if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' =>1))){
    $id = $_GET['id'];

    // Neu tid ton tai, bat dau xu ly form
    if($_SERVER['REQUEST_METHOD'] == "POST"){ //Giá trị tồn tại, xử lý form
      $errors = array();
      $trimmed = array_map('trim', $_POST);

      if($trimmed['baiviet_diadiem_ten']){
        $ten = $trimmed['baiviet_diadiem_ten'];
      } else {
        $errors[] = "ten";
      }

      if(filter_var($trimmed['diadiem'], FILTER_VALIDATE_INT, array('min_range'=>1))) {
        $diadiem = $trimmed['diadiem'];
      } else {
        $errors[] = "diadiem";
      }

      if($trimmed['baiviet_diadiem_noidung']){
        $noidung = $trimmed['baiviet_diadiem_noidung'];
      } 

      $hot = isset($trimmed['baiviet_diadiem_hot']) ? 1 : 0;

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

        $anh = is_null($renamed) ? $trimmed['baiviet_diadiem_anh'] : $renamed;
      }

      

      if(empty($errors)){ // kiểm tra nếu không có lỗi xảy ra, thì chèn dữ liệu vào database
        $query = "UPDATE baiviet_diadiem SET baiviet_diadiem_ten = ?, diadiem_id = ?, baiviet_diadiem_noidung = ?, baiviet_diadiem_anh = ?, baiviet_diadiem_hot = ? WHERE baiviet_diadiem_id = ? LIMIT 1";
        $stmt = $dbc->prepare($query);

        //gan tham so cho cau lenh prepare
        $stmt->bind_param('sissii', $ten, $diadiem, $noidung, $anh, $hot, $id);

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
    redirect_to('admin/baivietdiadiem.php');
  }

 ?>
<div class="be-content">
  <?php 

  //truy van csdl lieu de do du lieu ra
    $query = "SELECT * FROM baiviet_diadiem WHERE baiviet_diadiem_id = {$id}";
    if($stmt = $dbc->query($query)){
      if($stmt->num_rows == 1) {
        //neu du lieu ton tai trong database, dua du lieu thong qua TID vao, xuat du lieu ra ngoai trinh duyet
        $baivietdiadiem = $stmt->fetch_array(MYSQLI_ASSOC);
      } else {
        //neu TID khong hop le, se khong hien thi danh muc
        $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Bài viết không tồn tại</div></div>";
      }
    }
   ?>
    <div class="main-content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-border-color card-border-color-primary">
            <div class="card-header card-header-divider">Sửa bài viết: <?php if(isset($baivietdiadiem['baiviet_diadiem_ten'])) echo $baivietdiadiem['baiviet_diadiem_ten']; ?></div>
            <div class="card-body">
              <?php if(isset($messages)) {echo $messages;} ?>
              <form enctype="multipart/form-data" action="" method="post">
                <div class="form-group row">

                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Tiểu đề *</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input name="baiviet_diadiem_ten" tabindex="1" class="form-control" type="text" value="<?php if(isset($baivietdiadiem['baiviet_diadiem_ten'])) echo strip_tags($baivietdiadiem['baiviet_diadiem_ten']); ?>">
                    <?php 
                      if(isset($errors) && in_array('ten',$errors)) 
                      echo "
                        <ul class='parsley-errors-list filled'><li class='parsley-required'>Chưa nhập tên tin tức</li></ul>
                      ";
                    ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Địa điểm *</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <select class="form-control" name="diadiem">
                      <option>Chọn địa điểm</option>
                      <?php 
                        $query = "SELECT diadiem_id, diadiem_ten FROM diadiem ORDER BY diadiem_id ASC";
                        $stmt = $dbc->query($query);
                        if($stmt->num_rows > 0) {
                          while($diadiem = $stmt->fetch_array(MYSQLI_NUM)) {
                            echo "<option value='{$diadiem[0]}'";
                              if(isset($baivietdiadiem['diadiem_id']) && ($baivietdiadiem['diadiem_id'] == $diadiem[0])) echo "selected='selected'";
                            echo ">".$diadiem[1]."</option>";
                          }
                        }
                       ?>
                    </select>
                    <?php 
                      if(isset($errors) && in_array('diadiem',$errors)) 
                        echo "
                          <ul class='parsley-errors-list filled'><li class='parsley-required'>Chưa chọn địa điểm</li></ul>
                        ";
                      ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Nội dung</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                      <textarea class="form-control" name="baiviet_diadiem_noidung"><?php if(isset($baivietdiadiem['baiviet_diadiem_noidung'])) echo $baivietdiadiem['baiviet_diadiem_noidung']; ?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right" for="file-2">Ảnh đại diện</label>
                  <div class="col-12 col-sm-6">
                      <input class="inputfile" id="file-2" type="file" name="file-2">
                      <label class="btn-primary" for="file-2"> <i class="mdi mdi-upload"></i><span><?php echo(is_null($baivietdiadiem['baiviet_diadiem_anh'])) ? 'Browse files...' : trim($baivietdiadiem['baiviet_diadiem_anh']); ?></span></label>
                      <input name="baiviet_diadiem_anh" class="d-none" type="text" value="<?php echo(is_null($baivietdiadiem['baiviet_diadiem_anh'])) ? NULL : trim($baivietdiadiem['baiviet_diadiem_anh']); ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-12 col-sm-8 col-lg-6 offset-sm-3">
                      <div class="be-checkbox custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="check1" name="baiviet_diadiem_hot" <?php  if(isset($baivietdiadiem['baiviet_diadiem_hot']) && $baivietdiadiem['baiviet_diadiem_hot'] == 1) echo 'checked'; ?>>
                          <label class="custom-control-label" for="check1">Bài viết nổi bật</label>
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