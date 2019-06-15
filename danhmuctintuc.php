<?php include('includes/mysqli_connect.php');?>
<?php include('includes/functions.php');?>
<?php include('includes/header.php');?>

<?php 
$type = 'tintuc';
if($id = validate_id($_GET['id'])) {
    $display = 4;
    $posts = fetch_categories_news($display, $id);
    $type = 'tintuc';
    $start = (isset($_GET['s']) && filter_var($_GET['s'], FILTER_VALIDATE_INT, array('min_range' => 1))) ? $_GET['s'] : 0;
} else {
    redirect_to();
}
             
 ?>
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
                <h2 class="title"> DANH MỤC </h2>
                <div class="row">
                  <div class="col-md-12">
                    <div class="box-content">
                      <div id="grid-wrapper" class="post-list clearfix">
                        
                        <div class="row">
                          <?php  
                          if(!empty($posts)){
                            foreach ($posts as $post) {
                              $countComment = countComment($type, $post['tintuc_id']);
                              if($countComment > 0) {
                                $count = $countComment;
                              } else {
                                $count = 0;
                              }
                             echo "
                                  <div class='col-md-6'>
                                    <article class='clearfix post'>
                                      <div class='post-inner post-hover'>
                                          <div class='post-thumbnail featured-img-thumb-large'>
                                              <a href='single.php?id={$post['tintuc_id']}' title=''>
                                                  <img src='".BASE_URL."/admin/uploads/images/{$post['tintuc_anh']}' class='img-fluid' alt=''>
                                              </a>
                                              <a class='post-comments' href='single.php?id={$post['tintuc_id']}#disscuss'><span><i class='fa fa-comments-o'></i>{$count}</span></a>
                                          </div>
                                          <div class='post-meta clearfix'>
                                              <p class='post-category'><a href='danhmuctintuc.php?id={$post['danhmuc_id']}'>{$post['danhmuc_ten']}</a></p>
                                              <p class='post-date'>
                                                  <time class='published'>{$post['date']}</time>
                                              </p>
                                          </div>
                                          <h2 class='post-title'>
                                            <a href='single.php?id={$post['tintuc_id']}' title='{$post['tintuc_ten']}'>{$post['tintuc_ten']}</a>
                                          </h2>
                                          <div class='excerpt'>
                                              <p>{$post['tintuc_mota']}</p>
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
                      <?php echo pagination_category($id ,$display , 'tintuc', 'danhmuc');  ?>
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