<?php 
	//Kết nối với CSDL
	$dbc = new mysqli('localhost', 'root', '', 'dulich_local');

	//nếu không kết nối thành công, thì báo lỗi
	if(!$dbc) {
		trigger_error("Không kết nối được với Database: " .mysqli_connect_error());
	} else {
		// đặt phương thức kết nối là utf-8
		mysqli_set_charset($dbc , 'utf8');
	}
 ?>