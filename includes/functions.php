<?php 
	// Xac dinh hang so cho dia chi tuyet doi
    define('BASE_URL', 'http://localhost/dulich/');

    //Tái định hướng người dùng về trang mặc đinh là index
    function redirect_to($page = 'index.php') {
        $url = BASE_URL . $page;
        header("Location: $url");
        exit();
    }

    function validate_id($id) {
        if(isset($id) && filter_var($id, FILTER_VALIDATE_INT, array('min_range' =>1))) {
            $val_id = $id;
            return $val_id;
        } else {
            return NULL;
        }
    } // End validate_id

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


    function fetch_news($display = 5) {
        global $dbc;
        $start = (isset($_GET['s']) && filter_var($_GET['s'], FILTER_VALIDATE_INT, array('min_range' => 1))) ? $_GET['s'] : 0;
        
        $query = "SELECT n.tintuc_id ,n.tintuc_ten, n.tintuc_mota, n.tintuc_noidung, n.tintuc_anh, DATE_FORMAT(n.tintuc_ngaytao, '%d Tháng %m, %y') AS date, c.danhmuc_ten, c.danhmuc_id ";
        $query .= " FROM tintuc AS n "; 
        $query .= " LEFT JOIN danhmuc AS c "; 
        $query .= " USING (danhmuc_id) ORDER BY n.tintuc_id ASC LIMIT {$start}, {$display}";
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

    // Truy van CSDL de lay post va thong tin nguoi dung.
    function get_news_by_id($id) {
        global $dbc;
        $query = " SELECT n.tintuc_ten, n.tintuc_mota, n.tintuc_noidung, n.tintuc_anh, n.tintuc_ngaytao, c.danhmuc_ten, c.danhmuc_id, "; 
        $query .= " DATE_FORMAT(n.tintuc_ngaytao, '%d Tháng %m, %y') AS date ";
        $query .= " FROM tintuc AS n ";
        $query .= " LEFT JOIN danhmuc AS c ";
        $query .= " USING (danhmuc_id) ";
        $query .= " WHERE n.tintuc_id = {$id}";
        $query .= " LIMIT 1";
        $result = $dbc->query($query);
        confirm_query($result, $query);
        return $result;
    } // End get_page_by_id

    // Phan trang
    function pagination_news($display = 5){
        global $dbc; global $start;
        if(isset($_GET['p']) && filter_var($_GET['p'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
            $page = $_GET['p'];
        } else {
          
            $query = "SELECT COUNT(tintuc_id) FROM tintuc";
            $result = $dbc->query($query);
            confirm_query($result, $query);
            list($record) = $result->fetch_array(MYSQLI_NUM);
            
            if($record > $display) {
                $page = ceil($record/$display);
            } else {
                $page = 1;
            }
        }
        
        $output = "<nav class='pagination clearfix'><div class='wp-pagenavi'>";
        if($page > 1) {
            $current_page = ($start/$display) + 1;
            
            // Nếu không phải ở trang đầu (hoặc 1) thì sẽ hiển thị Trang trước.
            if($current_page != 1) {
                $output .= "<a class='previouspostslink' rel='prev' href='index.php?s=".($start - $display)."&p={$page}'>«</a>";
            }
            
            // Hiển thị những phần số còn lại của trang
            for($i = 1; $i <= $page; $i++) {
                if($i != $current_page) {
                    $output .= "<a class='page larger' href='index.php?s=".($display * ($i - 1))."&p={$page}'>{$i}</a>";
                } else {
                    $output .= "<a class='page larger current'>{$i}</a>";
                }
            }// END FOR LOOP
            
            // Nếu không phải trang cuối, thì hiển thị trang kế.
            if($current_page != $page) {
                $output .= "<a class='nextpostslink ".$current_page."' rel='next' href='index.php?s=".($start + $display)."&p={$page}'>»</a>";
            }
        } // END pagination section
            $output .= "</div></nav>";
            
            return $output;
    } // END pagination  

?>

