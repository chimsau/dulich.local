<?php include('../includes/mysqli_connect.php');?>
<?php include('../includes/functions.php');?>
<?php include('includes/header.php');?>
<?php include('includes/top-header.php');?>
<?php include('includes/left-sidebar.php');?>

<?php 
  //xac nhan bien GET ton tai va thuoc loai du lieu cho phep
  if(isset($_GET['tid']) && filter_var($_GET['tid'], FILTER_VALIDATE_INT, array('min_range' =>1))){
    $tid = $_GET['tid'];

    if($_SERVER['REQUEST_METHOD'] == "POST"){ //Giá trị tồn tại, xử lý form
      if(isset($_POST['delete']) && $_POST['delete'] == 'yes') {
        $query = "DELETE FROM tintuc WHERE tintuc_id = ?";
        if($stmt = $dbc->prepare($query)){

          //Gan tham so cho prepare
          $stmt->bind_param('i', $tid);

          //Chay query
          $stmt->execute() or die("MYSQL Error: $query" . $stmt->error());

          if($stmt->affected_rows == 1) {
            $messages = "<div class='alert alert-success alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Xóa thành công</div></div>";
          } else {
            $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Lỗi khi xóa tin tức</div></div>";
          }
          $stmt->close();
        }
      } else {
        $messages = "<div class='alert alert-danger alert-icon alert-dismissible' role='alert'><div class='icon'><span class='mdi mdi-close-circle-o'></span></div><div class='message'>Bạn vẫn chưa xóa tin tức</div></div>";
      }
    }
    
  } else {
    redirect_to('admin/tintuc.php');
  }

 ?>
<div class="be-content">
    <div class="main-content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-border-color card-border-color-primary">
            <div class="card-header card-header-divider">Xóa danh mục: <?php if(isset($_GET['tintucten'])) echo $_GET['tintucten']; ?></div>
            <div class="card-body">
              <?php if(isset($messages)) {echo $messages;} ?>
              <form action="" method="post">
                <div class="form-group row pt-1 pb-1">
                  <label class="col-12 col-sm-3 col-form-label text-sm-right">Bạn có muốn xóa</label>
                  <div class="col-12 col-sm-8 col-lg-6 form-check mt-1">
                      <label class="custom-control custom-radio custom-control-inline">
                          <input class="custom-control-input" type="radio" name="delete" value="no" checked="checked"><span class="custom-control-label">No</span>
                      </label>
                      <label class="custom-control custom-radio custom-control-inline">
                          <input class="custom-control-input" type="radio" name="delete" value="yes"><span class="custom-control-label">Yes</span>
                      </label>
                  </div>
                </div>
                <div class="form-group row text-right">
                  <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                    <button class="btn btn-space btn-primary" tabindex="3" type="submit">Xóa</button>
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