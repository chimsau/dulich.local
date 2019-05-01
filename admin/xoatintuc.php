<?php include('../includes/mysqli_connect.php');?>
<?php include('../includes/functions.php');?>
<?php session_start(); ?>
<?php admin_access();?>
<?php 
  //xac nhan bien GET ton tai va thuoc loai du lieu cho phep
  if(isset($_POST['tintuc_id']) && filter_var($_POST['tintuc_id'], FILTER_VALIDATE_INT, array('min_range' =>1))){
    $id = $_POST['tintuc_id'];
    $query = "DELETE FROM tintuc WHERE tintuc_id = ?";
    $stmt = $dbc->prepare($query);

    //Gan tham so cho prepare
    $stmt->bind_param('i', $id);

    //Chay query
    $stmt->execute();

    $stmt->close();

  }

?>

