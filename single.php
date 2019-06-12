<?php include('includes/mysqli_connect.php');?>
<?php include('includes/functions.php');?>
<?php include('includes/header.php');?>
<?php 
if($nid = validate_id($_GET['nid'])) {
      $set = get_news_by_id($nid);
      $posts = array(); 
  if($set->num_rows > 0) {
    $news = mysqli_fetch_array($set, MYSQLI_ASSOC); 
    $title = $news['tintuc_ten'];
    $posts[] = array(
      'tintuc_ten' => $news['tintuc_ten'], 
      'tintuc_noidung' => $news['tintuc_noidung'], 
      'tintuc_mota' => $news['tintuc_mota'],
      'tintuc_anh' => $news['tintuc_anh'],
      'tintuc_ngaytao' => $news['tintuc_ngaytao'],
      'danhmuc_ten' => $news['danhmuc_ten'],
      'danhmuc_id' => $news['danhmuc_id'],
    );

  } else {
      echo "<p>Không có bài viết nào.</p>";
  }
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
              <?php include('includes/sidebar.php'); ?>
            </div>
            <div class="col-md-8 p-0">
              <div class="wrapper-main-content">
                <div class="page-title pad clearfix">
                  <ul class="meta-single clearfix">
                    <?php 
                      foreach($posts as $post){
                        echo "
                        <li class='category'><a href='danhmuc-tintuc.php?cid={$post['danhmuc_id']}' rel='category tag'>{$post['danhmuc_ten']}</a></li>
                        ";
                      }
                     ?>
                    <li class="comments"><a href=""><i class="fa fa-comments-o"></i>0</a></li>
                  </ul>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="box-content">
                      <div class="detail-content">
                        <?php
                            foreach($posts as $post) {
                            echo "
                              <h3>{$post['tintuc_ten']}</h3>
                              <p class='post-date'>
                                <time class='published'>{$post['tintuc_ngaytao']}</time>
                              </p>
                              <p class='entry-detail-description'>{$post['tintuc_mota']}</p>
                              <p class='entry-detail-content'>{$post['tintuc_noidung']}</p>
                            ";
                          } // End foreach.
                        ?>
                      </div>
                      <?php include('includes/comment_form.php'); ?>
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