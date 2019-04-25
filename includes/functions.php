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
?>