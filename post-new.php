<?php include('includes/mysqli_connect.php');?>
<?php include('includes/functions.php');?>
<?php include('includes/header.php');?>

<?php 
  if($_SERVER['REQUEST_METHOD'] == "POST"){ //Giá trị tồn tại, xử lý form
    $errors = array();
    $trimmed = array_map('trim', $_POST);

    if($trimmed['cauchuyen_tieude']){
      $tieude = $trimmed['cauchuyen_tieude'];
    } else {
      $errors[] = "tieude";
    }

    if($trimmed['cauchuyen_tacgia']){
      $tacgia = $trimmed['cauchuyen_tacgia'];
    } else {
      $errors[] = "tacgia";
    }

    if($trimmed['cauchuyen_noidung']){
      $noidung = $trimmed['cauchuyen_noidung'];
    } else {
      $errors[] = "noidung";
    }

    if(empty($errors)){ // kiểm tra nếu không có lỗi xảy ra, thì chèn dữ liệu vào database

      $query = "INSERT INTO cauchuyen (cauchuyen_tieude, cauchuyen_tacgia, cauchuyen_noidung, cauchuyen_ngay, cauchuyen_trangthai) VALUES ( ?, ?, ?,NOW(), 0)";
      $stmt = $dbc->prepare($query);

      //gan tham so cho cau lenh prepare
      $stmt->bind_param('sss', $tieude, $tacgia, $noidung);

      //cho chay cau lenh prepare
      $stmt->execute();

      if($stmt->affected_rows == 1){
        $messages = "<div class='alert alert-success alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Cám ơn bạn đã chia sẻ câu chuyện</div></div>";
      } else {
        $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Lỗi khi thêm mới</div></div>";
      }
      
    } else {
      $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Nhập đầy đủ các thông tin</div></div>";
    }
  }

 ?>
  <main class="main py-5 bg-light" role="main">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="text-center">
            <h2>Nói về câu chuyện của bạn</h2>
            <hr>
            <?php if(isset($messages)) {echo $messages;} ?>
          </div>
          <form action="" method="post">
            <div class="form-group">
              <label for="title">Tiêu đề</label>
              <input type="text" class="form-control form-control-lg" id="title" name="cauchuyen_tieude" placeholder="Nhập tên tiêu đề" value="<?php if(isset($_POST['cauchuyen_tieude'])) echo strip_tags($_POST['cauchuyen_tieude']); ?>">
              <?php 
                if(isset($errors) && in_array('tieude',$errors)) 
                echo "
                  <div class='alert alert-danger' role='alert'>Chưa nhập tên tiêu đề</div>
                ";
              ?>
            </div>

            <div class="form-group">
              <label for="tags">Tên của bạn</label>
              <input type="text" class="form-control form-control-lg" id="tags" name="cauchuyen_tacgia" placeholder="Nhập tên của bạn" value="<?php if(isset($_POST['cauchuyen_tacgia'])) echo strip_tags($_POST['cauchuyen_tacgia']); ?>">
              <?php 
                if(isset($errors) && in_array('tacgia',$errors)) 
                echo "
                  <div class='alert alert-danger' role='alert'>Chưa nhập tên</div>
                ";
              ?>
            </div>

            <div class="form-group">
              <label for="title">Câu chuyện</label>
              <textarea class="form-control" name="cauchuyen_noidung"><?php if(isset($_POST['cauchuyen_noidung'])) echo htmlentities($_POST['cauchuyen_noidung'], ENT_COMPAT, 'UTF-8'); ?></textarea>
              <?php 
                if(isset($errors) && in_array('noidung',$errors)) 
                echo "
                  <div class='alert alert-danger' role='alert'>Chưa nhập nội dung câu chuyện</div>
                ";
              ?>
            </div>

            <button type="submit" class="btn btn-success">Chia sẻ</button>
          </form>
        </div>
      </div>
    </div>
  </main>
<?php include('includes/section-instagram.php');?>
<?php include('includes/footer.php');?>