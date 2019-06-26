<?php include('../includes/mysqli_connect.php');?>
<?php include('../includes/functions.php');?>
<?php 
session_start(); ?>

<html lang="vi"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/logo-fav.png">
    <title>Beagle</title>
    <link rel="stylesheet" href="assets/css/app.css" type="text/css">
  </head>
  <body class="be-splash-screen">
    <div class="be-wrapper be-login">


<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Bat dau xu ly form
        $errors = array();
        $trimmed = array_map('trim', $_POST);
        // Mac dinh cho cac truong nhap lieu la FALSE
        $name = $e = $p = $phone = FALSE;       

        if($trimmed['name']){
          $name = $trimmed['name'];
        } else {
          $errors[] = "name";
        }

        if($trimmed['email']){
          $e = $trimmed['email'];
        } else {
          $errors[] = "email";
        }
        
        if($trimmed['phone']){
          $phone = $trimmed['phone'];
        } else {
          $errors[] = "phone";
        }

        if($trimmed['address']){
          $address = $trimmed['address'];
        }
        
        if(preg_match('/^[\w\'.-]{4,20}$/', trim($_POST['password1']))) {
            if($_POST['password1'] == $_POST['password2']) {
                // Neu mat khau mot phu hop voi mat khau hai, thi luu vao csdl
                $p = $trimmed['password1'];
            } else {
                // Neu mat khau khong phu hop voi nhau
                $errors[] = "password not match";
            }
        } else {
            $errors[] = 'password';
        }
        
        if($name && $e && $p && $phone) {
            // Neu moi thu deu day du, truy van csdl
            $query = "SELECT id FROM user WHERE email = '{$e}'";
            $result = $dbc->query($query);
            confirm_query($result, $query);

            if($result->num_rows == 0) {
                // Luc nay email van con trong, cho phep nguoi dung dang ky
                
                // Chen gia tri vao CSDL
                $query = "INSERT INTO user (name, email, password, phone, address, active)
                    VALUES ('{$name}', '{$e}', '{$p}', '{$phone}', '{$address}', 0)";
                $result = $dbc->query($query);
                confirm_query($result, $query);
                
                if($dbc->affected_rows == 1) {
                  $messages = "<div class='alert alert-success alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Bạn đã đăng ký thành công. Vui lòng chờ quản trị viên phê duyệt tài khoản</div></div>";        
                } else {
                    $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Lỗi hệ thống</div></div>";
                }
                
            } else {
                // Email da ton tai, phai dang ky bang email khac.
                $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Địa chỉ email đã tồn tại. Vui lòng chọn email khác</div></div>";
            }
        } else {
            // Neu mot trong cac truong bi thieu gia tri
            $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Nhập đầy đủ các thông tin</div></div>";
        }
    }// END main IF
?>
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="splash-container">
            <div class="card card-border-color card-border-color-primary">
              <div class="card-header"><div class="logo">
                    <a href="<?php echo BASE_URL ?>"><span>LA</span>-adventure</a>
                  </div></div>
              <div class="card-body">
                <?php if(isset($messages)) {echo $messages;} ?>
                <form action="" method="post">
                  <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="* Tên hiển thị" autocomplete="off">
                    <?php 
                      if(isset($errors) && in_array('name',$errors)) 
                      echo "
                        <ul class='parsley-errors-list filled'><li class='parsley-required'>Chưa nhập tên</li></ul>
                      ";
                    ?>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="* E-mail" autocomplete="off">
                    <?php 
                      if(isset($errors) && in_array('email',$errors)) 
                      echo "
                        <ul class='parsley-errors-list filled'><li class='parsley-required'>Chưa nhập email</li></ul>
                      ";
                    ?>
                  </div>
                  <div class="form-group row signup-password">
                    <div class="col-6">
                      <input class="form-control" name="password1" id="pass1" type="password" placeholder="* Mật khẩu">
                      <?php 
                      if(isset($errors) && in_array('password',$errors)) 
                      echo "
                        <ul class='parsley-errors-list filled'><li class='parsley-required'>Chưa nhập mật khẩu</li></ul>
                      ";
                    ?>
                    </div>
                    <div class="col-6">
                      <input class="form-control" name="password2" type="password" placeholder="* Nhập lại mật khẩu">
                      <?php 
                        if(isset($errors) && in_array('password not match',$errors)) 
                        echo "
                          <ul class='parsley-errors-list filled'><li class='parsley-required'>Mật khẩu nhập lại không đúng</li></ul>
                        ";
                      ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="text" name="phone" placeholder="* Số điện thoại" >
                    <?php 
                      if(isset($errors) && in_array('phone',$errors)) 
                      echo "
                        <ul class='parsley-errors-list filled'><li class='parsley-required'>Chưa nhập số điện thoại</li></ul>
                      ";
                    ?>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="text" name="address" placeholder="Địa chỉ">
                  </div>
                  <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary btn-xl" type="submit">Đăng ký</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
</body>
</html>