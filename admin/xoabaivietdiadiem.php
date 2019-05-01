<?php include('../includes/mysqli_connect.php');?>
<?php include('../includes/functions.php');?>
<?php admin_access();?>
<?php 
  //xac nhan bien GET ton tai va thuoc loai du lieu cho phep
  if(isset($_POST['baivietdiadiem_id']) && filter_var($_POST['baivietdiadiem_id'], FILTER_VALIDATE_INT, array('min_range' =>1))){
    $id = $_POST['baivietdiadiem_id'];
    $query = "DELETE FROM baiviet_diadiem WHERE baiviet_diadiem_id = ?";
    $stmt = $dbc->prepare($query);

    //Gan tham so cho prepare
    $stmt->bind_param('i', $id);

    //Chay query
    $stmt->execute();

    $stmt->close();

  }

?>

