<?php include('../includes/mysqli_connect.php');?>
<?php include('../includes/functions.php');?>
<?php session_start(); ?>
<?php 
    if(!isset($_SESSION['name'])) {
        // Neu nguoi dung chua dang nhap va khong co thong tin trong he thong
        redirect_to();
    } else {
        // Neu co thong tin nguoi dung, va da dang nhap, se logout nguoi dung.
        $_SESSION = array(); // Xoa het array cua SESSIOM
        session_destroy(); // Destroy session da tao
        setcookie(session_name(),'', time()-36000); // Xoa cookie cua trinh duyet
        redirect_to('admin/login.php');
    } 
?>


