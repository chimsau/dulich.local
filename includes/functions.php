<?php 
	// Xac dinh hang so cho dia chi tuyet doi
    define('BASE_URL', 'http://dulich.local/');

    //Tái định hướng người dùng về trang mặc đinh là index
    function redirect_to($page = 'index.php') {
        $url = BASE_URL . $page;
        header("Location: $url");
        exit();
    }

    function the_excerpt($text, $string = 400) {
        if(strlen($text) > $string) {
            $cutString = substr($text,0,$string);
            $words = substr($text, 0, strrpos($cutString, ' '));
            return $words .'...';
        } else {
            return $text;
        }
       
    }
    // Ham tao ra de kiem tra xem co phai la admin hay khong
    function is_admin() {

        return isset($_SESSION['name']);
    }
    
    // Kiem tra xem nguoi dung co the vao trang admin hay khong?
    function admin_access() {
        if(!is_admin()) {
            redirect_to('admin/login.php');
        }
    }
?>