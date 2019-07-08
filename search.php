<?php $title = "Tìm kiếm"; ?>
<?php include('includes/mysqli_connect.php');?>
<?php include('includes/functions.php');?>
<?php include('includes/header_sub.php');?>
<main id="main">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="wrapper-main">
            
            <div class="row">
              <div class="col-md-12">
                <h2 class="title" style="margin-left: 15px"> TÌM KIẾM </h2>
                <div class="box-content">
                  <div id="grid-wrapper" class="post-list clearfix">
                    
                    <div class="row">
                      <?php    
                        // Nếu người dùng submit form thì thực hiện
                        if (isset($_REQUEST['search-form'])) {
                           
                            $search = $_GET['search-form'];

                            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
                            if (empty($search)) {
                                $messages = "<p>Yêu cầu nhập dữ liệu để tìm kiếm</p>";
                            } else {
                                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                                $query = " SELECT id, tintuc_ten, tintuc_mota, tintuc_anh, "; 
                                $query .= " DATE_FORMAT(tintuc_ngaytao, '%d Tháng %m, %y') AS date ";
                                $query .= " FROM tintuc ";
                                $query .= " WHERE tintuc_ten like '%$search%' ";
                                $result = $dbc->query($query);
                                confirm_query($result, $query);
                                if($result->num_rows > 0 && $search != "") {
                                  while($results = $result->fetch_array(MYSQLI_ASSOC)) {
                                      echo "
                                        <div class='col-md-4'>
                                          <article class='clearfix post'>
                                            <div class='post-inner post-hover'>
                                                <div class='post-thumbnail featured-img-thumb-large'>
                                                  <a href='single.php?id={$results['id']}' title=''>
                                                      <img src='".BASE_URL."/admin/uploads/images/{$results['tintuc_anh']}' class='img-fluid' alt=''>
                                                  </a>
                                                </div>
                                                <h2 class='post-title'>
                                                  <a href='single.php?id={$results['id']}' title='{$results['tintuc_ten']}'>{$results['tintuc_ten']}</a>
                                                </h2>
                                                <div class='excerpt'>
                                                    <p>".the_excerpt($results['tintuc_mota'], 200)."</p>
                                                </div>
                                            </div>
                                          </article>
                                        </div>
                                      ";
                                  } 
                                } else {
                                  $messages = "<p>Không tìm thấy kết quả!</p>";
                                }
                            }
                        }
                         ?>
                         <div class="col-md-12">
                           <?php if(isset($messages)) {echo $messages;} ?>
                         </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
         
        </div>
      </div>
    </div>
  </div>
</main>
<?php include('includes/footer.php');?>