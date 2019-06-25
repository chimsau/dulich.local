<?php 
  if($_SERVER['REQUEST_METHOD'] == "POST"){ //xử lý form
    $errors = array();
    $trimmed = array_map('trim', $_POST);

    $binhLuanTacGia = $_SESSION['id'];

    if($trimmed['binhluan_noidung']){
      $binhLuanNoiDung = $trimmed['binhluan_noidung'];
    } else {
      $errors[] = "binhLuanNoiDung";
    }

    if(empty($errors)){ // kiểm tra nếu không có lỗi xảy ra, thì chèn dữ liệu vào database

      $query = "INSERT INTO binhluan (foreign_id, binhluan_kieu, user_id, binhluan_noidung, binhluan_ngay) VALUES ( ?, ?, ?, ?,NOW())";
      $stmt = $dbc->prepare($query);
      confirm_query($stmt, $query);

      //gan tham so cho cau lenh prepare
      $stmt->bind_param('isis', $id, $type, $binhLuanTacGia, $binhLuanNoiDung);

      //cho chay cau lenh prepare
      $stmt->execute();

      if($stmt->affected_rows == 1){
        $messages = "<div class='alert alert-success alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Cám ơn bạn đã để lại bình luận</div></div>";
      } else {
        $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Lỗi hệ thống</div></div>";
      }
      
    } else {
      $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Nhập đầy đủ các thông tin</div></div>";
    }

  }


?>

<hr>
<div id="disscuss">
<?php 
  $countComment = countComment($type, $id);
  if($countComment > 0) {
      echo "<h3><strong style='text-decoration: underline;'>{$countComment} Bình luận</strong></h3>";
  } else {
    echo "<h3><strong style='text-decoration: underline;'>0 Bình luận</strong></h3>";
  }
?>
<?php 
//hien thi comment
  $query = "SELECT c.id, u.name AS name, c.binhluan_noidung, DATE_FORMAT(c.binhluan_ngay,  '%b %d, %y') AS date FROM binhluan AS c LEFT JOIN user AS u ON c.user_id = u.id WHERE c.binhluan_kieu = '{$type}' AND c.foreign_id = {$id}";
  if($stmt = $dbc->query($query)){
    if($stmt->num_rows > 0) {
      //neu co comment thi hien thi 
      while (list($id, $tacgia, $noidung, $ngay) = $stmt->fetch_array(MYSQLI_NUM)) {
        echo "
          <div class='media mb-3 comment-form'>
            <div class='media-body'>
              <h4 class='mt-1 mb-0 mr-3'>{$tacgia}</h4>
              <p class='mt-3 mb-2'>{$noidung}</p>
              <time class='timeago text-muted' datetime='{$ngay}'></time>
            </div>
          </div>
        ";
      }
      
    }
  }
 ?>
</div>
<div class="mt-5">
  <h5>Để lại bình luận</h5>
  <?php if(isset($messages)) {echo $messages;} ?>
  <?php if(is_user()){ ?>
  <form action="" method="post">
  <textarea class="form-control mt-3" rows="3" name="binhluan_noidung" placeholder="Viết bình luận"><?php if(isset($_POST['binhluan_noidung'])) echo htmlentities($_POST['binhluan_noidung'], ENT_COMPAT, 'UTF-8'); ?></textarea>
  <?php 
      if(isset($errors) && in_array('binhLuanNoiDung',$errors)) 
        echo "
          <div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Chưa nhập nội dung bình luận</div></div>
        ";
      ?>
  <button href="#" type="submit" name="submit" class="btn btn-success mt-3">Bình luận</button>
  </form>

  <?php
  } else {
    $messages = "<p>Bạn phải <a style='color: red' href='". BASE_URL ."/admin/login.php'>đăng nhập tài khoản</a> mới có thể thực hiện chức năng này</p>";
    if(isset($messages)) {echo $messages;}
  }
   ?>
</div>