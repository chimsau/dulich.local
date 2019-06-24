<?php include('includes/mysqli_connect.php');?>
<?php include('includes/functions.php');?>
<?php include('includes/header_sub.php');?>
<?php 
$type = 'tintuc';
if($id = validate_id($_GET['id'])) {
      $set = get_news_by_id($id);
      $posts = array(); 

  if($set->num_rows > 0) {
    $news = $set->fetch_array(MYSQLI_ASSOC);
    $title = isset($news['tintuc_ten']) ? $news['tintuc_ten'] : '' ;
    $danhMucTen = isset($news['danhmuc_ten']) ? $news['danhmuc_ten'] : '' ;
    $danhMucId =  isset($news['danhmuc_id']) ? $news['danhmuc_id'] : '' ;

    $posts[] = array(
      'tintuc_ten' => $news['tintuc_ten'], 
      'tintuc_noidung' => $news['tintuc_noidung'], 
      'tintuc_mota' => $news['tintuc_mota'],
      'tintuc_anh' => $news['tintuc_anh'],
      'date' => $news['date'],
      'danhmuc_ten' => $news['danhmuc_ten'],
      'danhmuc_id' => $news['danhmuc_id'],
    );

  } else {
      $messages = "<p>Không có bài viết nào.</p>";
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
                    echo "<li class='category'><a href='danhmuctintuc.php?id={$danhMucId}' rel='category tag'>{$danhMucTen}</a></li>"; ?>
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
                                <time class='published'>{$post['date']}</time>
                              </p>
                              <p class='entry-detail-description'>{$post['tintuc_mota']}</p>
                              <p class='entry-detail-content'>{$post['tintuc_noidung']}</p>
                            ";
                          } // End foreach.
                        ?>
                        <?php if(isset($messages)) {echo $messages;} ?>
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