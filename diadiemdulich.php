<?php include('includes/mysqli_connect.php');?>
<?php include('includes/functions.php');?>
<?php include('includes/header_sub.php');?>
<main id="main">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="wrapper-main">
          <div class="row m-0">
            <div class="col-md-4 p-0">
              <?php include('includes/sidebar.php');?>
            </div>
            <div class="col-md-8 p-0">
              <div class="wrapper-main-content">
                <h2 class="title"> ĐỊA ĐIỂM </h2>
                <div class="row">
                  <div class="col-md-12">
                    <div class="box-content">
                      <div class='location-layout'>
                        <div class="row">
                          <?php  
                            $display = 5;
                            $posts = fetch_location($display);
                            $type = 'diadiem';
                            if(!empty($posts)){
                              foreach ($posts as $post) {
                                $countComment = countComment($type, $post['id']);
                                if($countComment > 0) {
                                  $count = $countComment;
                                } else {
                                  $count = 0;
                                }
                                echo "
                                  <div class='item_wrap clearfix'>
                                    <div class='image_wrap'>
                                      <a href='chitietdiadiem.php?id={$post['id']}'>
                                        <img src='".BASE_URL."/admin/uploads/images/{$post['baiviet_diadiem_anh']}' class='img-fluid' alt=''>
                                      </a>
                                      <a class='post-comments' href='chitietdiadiem.php?id={$post['id']}#disscuss'><span><i class='fa fa-comments-o'></i>{$count}</span></a>
                                      <a href='diadiem.php?id={$post['catid']}'><div class='location-icon'><i class='fa fa-map-marker' aria-hidden='true'></i> {$post['diadiem_ten']}</div></a>
                                    </div>
                                    <div class='details_wrap'>
                                      <div class='information_wrapper'>
                                          <h2 class='name'><a href='chitietdiadiem.php?id={$post['id']}'>{$post['baiviet_diadiem_ten']}</a></h2>
                                          <div class='description'>".the_excerpt($post['baiviet_diadiem_mota'], 250)."</div>
                                      </div>
                                    </div>
                                  </div>
                                ";
                              }
                            } else {
                              $messages = "<p>Không có bài viết nào</p>";
                            }
                          ?>
                          <?php if(isset($messages)) {echo $messages;} ?>
                        </div>
                      </div>
                      <?php echo pagination(NULL ,$display , 'baiviet_diadiem');  ?>
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