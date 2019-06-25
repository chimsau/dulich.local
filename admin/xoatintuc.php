<?php include('../includes/mysqli_connect.php');?>
<?php include('../includes/functions.php');?>
<?php session_start(); ?>
<?php editor_access();?>
<?php 
  //xac nhan bien GET ton tai va thuoc loai du lieu cho phep
  if(isset($_POST['id']) && filter_var($_POST['id'], FILTER_VALIDATE_INT, array('min_range' =>1))){
    $id = $_POST['id'];
    $query = "DELETE FROM tintuc WHERE id = ?";
    $stmt = $dbc->prepare($query);

    //Gan tham so cho prepare
    $stmt->bind_param('i', $id);

    //Chay query
    $stmt->execute();

    $stmt->close();

  }

?>

