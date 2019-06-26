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
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="assets/css/app.css" type="text/css">
  </head>
  <body class="be-splash-screen">
    <div class="be-wrapper be-login">


<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $errors = array();
  $trimmed = array_map('trim', $_POST);

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

  if(empty($errors)) {
      // Bat dau truy van CSDL de lay thong tin nguoi dung
      $query = "SELECT id, name, email, role FROM user WHERE (email = '{$email}' AND password = '$password') AND active IS NULL LIMIT 1";
      $stmt = $dbc->query($query);
      if($stmt->num_rows == 1) {
          session_regenerate_id();
          // Neu tim thay thong tin nguoi dung trong CSDL, se chuyen huong nguoi dung ve trang thich hop.
          list($id, $name, $email, $role) = $stmt->fetch_array(MYSQLI_NUM);
          $_SESSION['id'] = $id;
          $_SESSION['name'] = $name;
          $_SESSION['email'] = $email;
          $_SESSION['role'] = $role;
          if($_SESSION['role'] == 0) {
            redirect_to('index.php');
          } else {
            redirect_to('admin/index.php');
          }
      } else {
          $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Tài khoản và mật khẩu không đúng hoặc tài khoản chưa được kích hoạt</div></div>";
      }
  } else {
    $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Nhập thông tin</div></div>";
  }

} // END MAIN IF
?>
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="splash-container">
            <div class="card card-border-color card-border-color-primary">
              <div class="card-header">
                <!-- <img class="logo-img" src="assets/img/logo-xx.png" alt="logo" width="102" height="27"> -->
                  <div class="logo">
                    <a href="<?php echo BASE_URL ?>"><span>LA</span>-adventure</a>
                  </div>
                </div>
              <div class="card-body">
                <?php if(isset($messages)) {echo $messages;} ?>
                <form action="" method="post">
                  <div class="form-group">
                    <input class="form-control" id="email" name="email" type="text" placeholder="Email" autocomplete="off" value="<?php if(isset($_POST['username'])) echo strip_tags($_POST['email']); ?>">
                    <?php 
                      if(isset($errors) && in_array('email',$errors)) 
                      echo "
                        <ul class='parsley-errors-list filled'><li class='parsley-required'>Chưa nhập email</li></ul>
                      ";
                    ?>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="password" name="password" type="password" placeholder="Mật khẩu" value="<?php if(isset($_POST['password'])) echo strip_tags($_POST['password']); ?>">
                    <?php 
                      if(isset($errors) && in_array('password',$errors)) 
                      echo "
                        <ul class='parsley-errors-list filled'><li class='parsley-required'>Chưa nhập mật khẩu</li></ul>
                      ";
                    ?>
                  </div>
                  <!-- <div class="form-group row login-tools">
                    <div class="col-12 login-forgot-password"><a href="pages-forgot-password.html">Quên mật khẩu?</a></div>
                  </div> -->
                  <div class="form-group row login-submit">
                    <div class="col-6"><a class="btn btn-secondary btn-xl" href="signup.php">Đăng ký</a></div>
                    <div class="col-6"><button class="btn btn-primary btn-xl" type="submit" >Đăng nhập</button></div>
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