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
                <h2 class="title"> CÂU CHUYỆN </h2>
                <div class="row">
                  <div class="col-md-12">
                    <div class="box-content">
                      <div id="grid-wrapper" class="post-list clearfix">
                        <div class="row">
                          <?php  
                          $display = 6;
                          $start = (isset($_GET['s']) && filter_var($_GET['s'], FILTER_VALIDATE_INT, array('min_range' => 1))) ? $_GET['s'] : 0;
                          $posts = fetch_story($display);
                          $type = 'cauchuyen';
                          if(!empty($posts)){
                            foreach ($posts as $post) {
                              echo "
                                <div class='col-md-6'>
                                  <article class='clearfix post'>
                                    <div class='post-inner post-hover'>
                                      <div class='post-meta clearfix'>
                                        <p class='post-category'><a>{$post['cauchuyen_tacgia']}</a></p>
                                        <p class='post-date'>
                                            <time class='published'>{$post['date']}</time>
                                        </p>
                                      </div>
                                      <h2 class='post-title'>
                                        <a href='chitietcauchuyen.php?id={$post['cauchuyen_id']}' title='{$post['cauchuyen_tieude']}'>{$post['cauchuyen_tieude']}</a>
                                      </h2>
                                      <div class='excerpt'>
                                          <p>".the_excerpt($post['cauchuyen_noidung'], 200)."</p>
                                      </div>
                                    </div>
                                  </article>
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
                      <?php echo pagination_story(NULL ,$display , 'cauchuyen');  ?>
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