<?php 
	// Xac dinh hang so cho dia chi tuyet doi
    define('BASE_URL', 'http://localhost/dulich/');

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


    function confirm_query($result, $query) {
        global $dbc;
        if(!$result) {
            die("Query {$query} \n<br/> MySQL Error: " .$dbc->error);
        } 
    }


    function fetch_news() {
        global $dbc;
        
        $query = "SELECT n.tintuc_id ,n.tintuc_ten, n.tintuc_mota, n.tintuc_noidung, n.tintuc_anh, DATE_FORMAT(n.tintuc_ngaytao, '%d Tháng %m, %y') AS date, c.danhmuc_ten, c.danhmuc_id ";
        $query .= " FROM tintuc AS n "; 
        $query .= " INNER JOIN danhmuc AS c "; 
        $query .= " USING (danhmuc_id) ORDER BY date ASC ";
        $result = $dbc->query($query);
        confirm_query($result, $query);
        
        if($result->num_rows > 1) {
            $posts = array();
            while($results = $result->fetch_array(MYSQLI_ASSOC)) {
                $posts[] = $results;
            }
            return $posts;
        } else {
            return FALSE;
        }

    }

?>

