<?php $title = "Sửa user"; ?>
<?php include('../includes/mysqli_connect.php');?>
<?php include('../includes/functions.php');?>
<?php include('includes/header.php');?>
<?php include('includes/top-header.php');?>
<?php include('includes/left-sidebar.php');?>
<?php editor_access();?>
<?php 
  // Kiem tra gia tri cua bien id tu $_GET
  if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' =>1))){
    $id = $_GET['id'];

    // Neu id ton tai, bat dau xu ly form
    if($_SERVER['REQUEST_METHOD'] == "POST"){ //Giá trị tồn tại, xử lý form
      $errors = array();
      $trimmed = array_map('trim', $_POST);

      if($trimmed['name']){
        $name = $trimmed['name'];
      } else {
        $errors[] = "name";
      }

      if($trimmed['email']){
        $email = $trimmed['email'];
      } else {
        $errors[] = "email";
      }

      if($trimmed['password']){
        $password = $trimmed['password'];
      } else {
        $errors[] = "password";
      }

      $role = isset($trimmed['role']) ? $trimmed['role'] : 0;

      if($trimmed['phone']) {
        $phone = $trimmed['phone'];
      } else {
        $errors[] = "phone";
      }

      $active = isset($trimmed['active']) ? NULL : 0;
       
      if($trimmed['address']){
        $address = $trimmed['address'];
      }
      
      if(empty($errors)){ // kiểm tra nếu không có lỗi xảy ra, thì chèn dữ liệu vào database
        $query = "UPDATE user SET name = ?, email = ?, password = ?, role = ?, phone = ?, address = ?, active = ? WHERE id = ? LIMIT 1";
        $stmt = $dbc->prepare($query);

        //gan tham so cho cau lenh prepare
        $stmt->bind_param('sssisssi', $name, $email, $password, $role, $phone, $address, $active, $id);

        //cho chay cau lenh prepare
        $stmt->execute();
        confirm_query($stmt, $query);
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
    //Neu id khong ton tai, thi redirect
    redirect_to('admin/tintuc.php');
  }

 ?>
<div class="be-content">
  <?php 

  //truy van csdl lieu de do du lieu ra
    $query = "SELECT * FROM user WHERE id = {$id}";
    if($stmt = $dbc->query($query)){
      if($stmt->num_rows == 1) {
        //neu du lieu ton tai trong database, dua du lieu thong qua id vao, xuat du lieu ra ngoai trinh duyet
        $users = $stmt->fetch_array(MYSQLI_ASSOC);
      } else {
        //neu id khong hop le, se khong hien thi danh muc
        $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>User không tồn tại</div></div>";
      }
    }
   ?>
    <div class="main-content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-border-color card-border-color-primary">
            <div class="card-header card-header-divider">Sửa user: <?php if(isset($users['name'])) echo $users['name']; ?></div>
            <div class="card-body">
              <?php if(isset($messages)) {echo $messages;} ?>
              <form enctype="multipart/form-data" action="" method="post">

                <div class="form-group row">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Tên hiển thị *</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input name="name" tabindex="1" class="form-control" type="text" value="<?php if(isset($users['name'])) echo strip_tags($users['name']); ?>">
                    <?php 
                      if(isset($errors) && in_array('name',$errors)) 
                      echo "
                        <ul class='parsley-errors-list filled'><li class='parsley-required'>Chưa nhập tên</li></ul>
                      ";
                    ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Email *</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input name="email" tabindex="1" class="form-control" type="email" value="<?php if(isset($users['email'])) echo strip_tags($users['email']); ?>">
                    <?php 
                      if(isset($errors) && in_array('email',$errors)) 
                      echo "
                        <ul class='parsley-errors-list filled'><li class='parsley-required'>Chưa nhập email</li></ul>
                      ";
                    ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Password *</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input name="password" tabindex="1" class="form-control" type="text" value="<?php if(isset($users['password'])) echo strip_tags($users['password']); ?>">
                    <?php 
                      if(isset($errors) && in_array('password',$errors)) 
                      echo "
                        <ul class='parsley-errors-list filled'><li class='parsley-required'>Chưa nhập password</li></ul>
                      ";
                    ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Quyền hạng *</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <select class="form-control" name="role">
                      <option value="0">Người dùng</option>
                      <option value="1">Biên tập</option>
                      <option value="2">Root</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Số điện thoại *</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input name="phone" tabindex="1" class="form-control" type="text" value="<?php if(isset($users['phone'])) echo strip_tags($users['phone']); ?>">
                    <?php 
                      if(isset($errors) && in_array('phone',$errors)) 
                      echo "
                        <ul class='parsley-errors-list filled'><li class='parsley-required'>Chưa nhập Số điện thoại</li></ul>
                      ";
                    ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Địa chỉ</label>
                  <div class="col-12 col-sm-8 col-lg-6">
                    <input name="address" tabindex="1" class="form-control" type="text" value="<?php if(isset($users['address'])) echo strip_tags($users['address']); ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-12 col-sm-8 col-lg-6 offset-sm-3">
                      <div class="be-checkbox custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="check1" name="active" <?php echo (is_null($users['active']) ? 'checked' : '')?>>
                          <label class="custom-control-label" for="check1">Phê duyệt</label>
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
<script>
  $(document).ready(function() {
    functions.remove_user();
  });
</script>
<?php include('includes/right-sidebar.php');?>
<?php include('includes/footer.php');?>