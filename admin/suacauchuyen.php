<?php include('../includes/mysqli_connect.php');?>
<?php include('../includes/functions.php');?>
<?php include('includes/header.php');?>
<?php include('includes/top-header.php');?>
<?php include('includes/left-sidebar.php');?>

<?php 
  // Kiem tra gia tri cua bien tid tu $_GET
  if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' =>1))){
    $tid = $_GET['id'];

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

      if($trimmed['tintuc_noidung']){
        $tinTucNoiDung = $trimmed['tintuc_noidung'];
      } 

      $tinTucHot = isset($trimmed['tintuc_hot']) ? 1 : 0;

      if(empty($errors)){ // kiểm tra nếu không có lỗi xảy ra, thì chèn dữ liệu vào database
        $query = "UPDATE tintuc SET tintuc_ten = ?, danhmuc_id = ?, tintuc_noidung = ?, tintuc_anh = ?, tintuc_hot = ? WHERE tintuc_id = ? LIMIT 1";
        $stmt = $dbc->prepare($query);

        //gan tham so cho cau lenh prepare
        $stmt->bind_param('sissii', $tinTucTen, $danhMuc, $tinTucNoiDung, $tinTucAnh, $tinTucHot, $tid);

        //cho chay cau lenh prepare
        $stmt->execute();

        if($stmt->affected_rows == 1){
          $messages = "<div class='alert alert-success alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Cập nhập thành công</div></div>";
        } else {
          $messages = "<div class='alert alert-success alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Cập nhập thành công</div></div>";
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
    $query = "SELECT * FROM cauchuyen WHERE cauchuyen_id = {$id}";
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

                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Tác giả *</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input name="cauchuyen_tacgia" tabindex="1" class="form-control" type="text" value="<?php if(isset($cauchuyens['cauchuyen_tacgia'])) echo strip_tags($cauchuyens['cauchuyen_tacgia']); ?>">
                    <?php 
                      if(isset($errors) && in_array('tacgia',$errors)) 
                      echo "
                        <ul class='parsley-errors-list filled'><li class='parsley-required'>Chưa nhập tác giả</li></ul>
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
                      <option>Chọn trạng thái</option>
                      <?php 
                        $query = "SELECT cauchuyen_trangthai FROM cauchuyen ORDER BY cauchuyen_trangthai ASC";
                        $stmt = $dbc->query($query) or die("Mysqli Error: $query ". $stmt->error());
                        if($stmt->num_rows > 0) {
                          while($trangthai = $stmt->fetch_array(MYSQLI_NUM)) {
                            $trangthai = array(0 => 'Chưa kiểm duyệt', 1 => 'kiểm duyệt');
                            foreach ($trangthai as $key => $value) {
                              echo "<option value='{$key}'";
                                if(isset($cauchuyens['cauchuyen_trangthai']) && ($cauchuyens['cauchuyen_trangthai'] == $key)) echo "selected='selected'";
                              echo ">{$value}</option>";
                            }
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