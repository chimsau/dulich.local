<?php 
  if($_SERVER['REQUEST_METHOD'] == "POST"){ //xử lý form
    $errors = array();
    $trimmed = array_map('trim', $_POST);

    if($trimmed['binhluan_tacgia']) {
      $binhLuanTacGia = $trimmed['binhluan_tacgia'];
    } else {
      $errors[] = "binhLuanTacGia";
    }

    if(filter_var($trimmed['binhluan_email'], FILTER_VALIDATE_EMAIL)) {
      $binhLuanEmail = $trimmed['binhluan_email'];
    } else {
      $errors[] = "binhLuanEmail";
    }

    if($trimmed['binhluan_noidung']){
      $binhLuanNoiDung = $trimmed['binhluan_noidung'];
    } else {
      $errors[] = "binhLuanNoiDung";
    }

    if(empty($errors)){ // kiểm tra nếu không có lỗi xảy ra, thì chèn dữ liệu vào database

      $query = "INSERT INTO binhluan (tintuc_id, binhluan_tacgia, binhluan_email, binhluan_noidung, binhluan_ngay) VALUES ( ?, ?, ?, ?,NOW())";
      $stmt = $dbc->prepare($query);

      //gan tham so cho cau lenh prepare
      $stmt->bind_param('isss', $tid, $binhLuanTacGia, $binhLuanEmail, $binhLuanNoiDung);

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
<h3>4 comments</h3>

<div class="media mb-3">
  <div class="text-center">
    <img class="mr-3 rounded-circle" src="img/avatars/3.png" alt="Lucy" width="100" height="100">
    <h6 class="mt-1 mb-0 mr-3">Lucy</h6>
  </div>
  <div class="media-body">
    <p class="mt-3 mb-2">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
    <time class="timeago text-muted" datetime="2017-12-03 20:00" data-tid="2">1 year ago</time>
    <a class="float-right" href="#"><svg class="svg-inline--fa fa-reply fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="reply" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M8.309 189.836L184.313 37.851C199.719 24.546 224 35.347 224 56.015v80.053c160.629 1.839 288 34.032 288 186.258 0 61.441-39.581 122.309-83.333 154.132-13.653 9.931-33.111-2.533-28.077-18.631 45.344-145.012-21.507-183.51-176.59-185.742V360c0 20.7-24.3 31.453-39.687 18.164l-176.004-152c-11.071-9.562-11.086-26.753 0-36.328z"></path></svg><!-- <span class="fa fa-reply"></span> --> Reply</a>

    <div class="media mt-3">
      <div class="pr-3 text-center">
        <img class="mr-3 rounded-circle" src="img/avatars/2.png" alt="John" width="100" height="100">
        <h6 class="mt-1 mb-0 mr-3">John</h6>
      </div>
      <div class="media-body">
        <p class="mt-3 mb-2">Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
        <time class="timeago text-muted" datetime="2017-12-14 19:00" data-tid="3">1 year ago</time>
        <a class="float-right" href="#"><svg class="svg-inline--fa fa-reply fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="reply" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M8.309 189.836L184.313 37.851C199.719 24.546 224 35.347 224 56.015v80.053c160.629 1.839 288 34.032 288 186.258 0 61.441-39.581 122.309-83.333 154.132-13.653 9.931-33.111-2.533-28.077-18.631 45.344-145.012-21.507-183.51-176.59-185.742V360c0 20.7-24.3 31.453-39.687 18.164l-176.004-152c-11.071-9.562-11.086-26.753 0-36.328z"></path></svg><!-- <span class="fa fa-reply"></span> --> Reply</a>
      </div>
    </div>
  </div>
</div>
<div class="media mb-3">
  <div class="text-center">
    <img class="mr-3 rounded-circle" src="img/avatars/1.png" alt="Kim" width="100" height="100">
    <h6 class="mt-1 mb-0 mr-3">Kim</h6>
  </div>
  <div class="media-body">
    <p class="mt-3 mb-2">Vestibulum volutpat pretium libero. Cras id dui. Aenean ut eros et nisl sagittis vestibulum. Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede. Sed lectus. Donec mollis hendrerit risus. Phasellus nec sem in justo pellentesque facilisis.</p>
    <time class="timeago text-muted" datetime="2017-11-20 20:00" data-tid="4">1 year ago</time>
    <a class="float-right" href="#"><svg class="svg-inline--fa fa-reply fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="reply" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M8.309 189.836L184.313 37.851C199.719 24.546 224 35.347 224 56.015v80.053c160.629 1.839 288 34.032 288 186.258 0 61.441-39.581 122.309-83.333 154.132-13.653 9.931-33.111-2.533-28.077-18.631 45.344-145.012-21.507-183.51-176.59-185.742V360c0 20.7-24.3 31.453-39.687 18.164l-176.004-152c-11.071-9.562-11.086-26.753 0-36.328z"></path></svg><!-- <span class="fa fa-reply"></span> --> Reply</a>
  </div>
</div>
<div class="media mb-3">
  <div class="text-center">
    <img class="mr-3 rounded-circle" src="img/avatars/4.png" alt="Paula" width="100" height="100">
    <h6 class="mt-1 mb-0 mr-3">Paula</h6>
  </div>
  <div class="media-body">
    <p class="mt-3 mb-2">Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc. Nunc nonummy metus.</p>
    <time class="timeago text-muted" datetime="2017-11-05 20:00" data-tid="5">1 year ago</time>
    <a class="float-right" href="#"><svg class="svg-inline--fa fa-reply fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="reply" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M8.309 189.836L184.313 37.851C199.719 24.546 224 35.347 224 56.015v80.053c160.629 1.839 288 34.032 288 186.258 0 61.441-39.581 122.309-83.333 154.132-13.653 9.931-33.111-2.533-28.077-18.631 45.344-145.012-21.507-183.51-176.59-185.742V360c0 20.7-24.3 31.453-39.687 18.164l-176.004-152c-11.071-9.562-11.086-26.753 0-36.328z"></path></svg><!-- <span class="fa fa-reply"></span> --> Reply</a>
  </div>
</div>

<div class="mt-5">
  <h5>Write a response</h5>
  <?php if(isset($messages)) {echo $messages;} ?>
  <form action="" method="post">
  <div class="row">
    <div class="col-md-6">
      
      <input type="text" class="form-control" id="name" name="binhluan_tacgia" placeholder="Nhập tên ..." value="<?php if(isset($_POST['binhluan_tacgia'])) echo strip_tags($_POST['binhluan_tacgia']); ?>">
      <?php 
      if(isset($errors) && in_array('binhLuanTacGia',$errors)) 
        echo "
          <div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Chưa nhập tên</div></div>
        ";
      ?>
    </div>
    <div class="col-md-6">
      
      <input type="email" class="form-control" id="email" name="binhluan_email" placeholder="Nhập địa chỉ email ..." value="<?php if(isset($_POST['binhluan_email'])) echo strip_tags($_POST['binhluan_email']); ?>">
      <?php 
      if(isset($errors) && in_array('binhLuanEmail',$errors)) 
        echo "
          <div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Chưa nhập Email</div></div>
        ";
      ?>
    </div>
  </div>
  
  <textarea class="form-control mt-3" rows="3" name="binhluan_noidung" placeholder="Viết bình luận"><?php if(isset($_POST['binhluan_noidung'])) echo htmlentities($_POST['binhluan_noidung'], ENT_COMPAT, 'UTF-8'); ?></textarea>
  <?php 
      if(isset($errors) && in_array('binhLuanNoiDung',$errors)) 
        echo "
          <div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Chưa nhập nội dung bình luận</div></div>
        ";
      ?>
  <button href="#" type="submit" name="submit" class="btn btn-success mt-3">Bình luận</button>
  </form>
</div>