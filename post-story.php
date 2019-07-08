<?php $title = "Chia sẻ câu chuyện"; ?>
<?php include('includes/mysqli_connect.php');?>
<?php include('includes/functions.php');?>
<?php include('includes/header_sub.php');?>

<?php 

  if($_SERVER['REQUEST_METHOD'] == "POST"){ //Giá trị tồn tại, xử lý form
    $errors = array();
    $trimmed = array_map('trim', $_POST);

    if($trimmed['cauchuyen_tieude']){
      $tieude = $trimmed['cauchuyen_tieude'];
    } else {
      $errors[] = "tieude";
    }

    $tacgia = $_SESSION['id'];

    if($trimmed['cauchuyen_noidung']){
      $noidung = $trimmed['cauchuyen_noidung'];
    } else {
      $errors[] = "noidung";
    }

    if(empty($errors)){ // kiểm tra nếu không có lỗi xảy ra, thì chèn dữ liệu vào database

      $query = "INSERT INTO cauchuyen (cauchuyen_tieude, user_id, cauchuyen_noidung, cauchuyen_ngay, cauchuyen_trangthai, cauchuyen_hot) VALUES ( ?, ?, ?,NOW(), 0 ,0)";
      $stmt = $dbc->prepare($query);

      //gan tham so cho cau lenh prepare
      $stmt->bind_param('sis', $tieude, $tacgia, $noidung);

      //cho chay cau lenh prepare
      $stmt->execute();

      if($stmt->affected_rows == 1){
        $messages = "<div class='alert alert-success alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Cám ơn bạn đã chia sẻ câu chuyện. Câu chuyện của bạn sẽ sớm được quản trị duyệt.</div></div>";
      } else {
        $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Lỗi khi thêm mới</div></div>";
      }
      
    } else {
      $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Nhập đầy đủ các thông tin</div></div>";
    }
  }

 ?>
<main id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="wrapper-main">
					<div class="row m-0">
						<div class="col-md-4 p-0">
							<?php include('includes/sidebar.php');?>
						</div>
						<div class="col-md-8 p-0">
							<div class="wrapper-main-content">
								<h2 class="title"> Nói về câu chuyện của bạn</h2>
								<div class="row">
									<div class="col-md-12">
										<div class="box-content">
											<?php if(isset($messages)) {echo $messages;} ?>
											<?php if(is_user()){ ?>

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

											<?php
											} else {
												$messages = "<p>Bạn phải <a style='color: red' href='". BASE_URL ."/admin/login.php'>đăng nhập tài khoản</a> mới có thể thực hiện chức năng này</p>";
												if(isset($messages)) {echo $messages;}
											}
											 ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php include('includes/footer.php');?>