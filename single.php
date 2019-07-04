<?php include('includes/mysqli_connect.php');?>
<?php include('includes/functions.php');?>
<?php 
$type = 'tintuc';
if($id = validate_id($_GET['id'])) {
      $set = get_news_by_id($id);
      $posts = array(); 

  if($set->num_rows > 0) {
    $news = $set->fetch_array(MYSQLI_ASSOC);
    $title = isset($news['tintuc_ten']) ? the_excerpt($news['tintuc_ten'], 80) : '' ;
    $description = isset($news['tintuc_mota']) ? the_excerpt($news['tintuc_mota'], 80) : '' ;
    $image = isset($news['tintuc_anh']) ? $news['tintuc_anh'] : '' ;
    $danhMucTen = isset($news['danhmuc_ten']) ? $news['danhmuc_ten'] : '' ;
    $danhMucId =  isset($news['danhmuc_id']) ? $news['danhmuc_id'] : '' ;

    $posts[] = array(
      'tintuc_ten' => $news['tintuc_ten'], 
      'tintuc_noidung' => $news['tintuc_noidung'], 
      'tintuc_mota' => $news['tintuc_mota'],
      'tintuc_anh' => $news['tintuc_anh'],
      'date' => $news['date'],
      'danhmuc_ten' => $news['danhmuc_ten'],
      'danhmuc_id' => $news['catid'],
    );

  } else {
      $messages = "<p>Không có bài viết nào.</p>";
  }
} else {
    redirect_to();
}
             
 ?>
 <?php include('includes/header_sub.php');?>
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
                        <script src="assets/lib/jssocials/jquery-1.10.1.min.js"></script>
                        <link rel="stylesheet" href="assets/lib/jssocials/jssocials.css" />
                        <link rel="stylesheet" href="assets/lib/jssocials/jssocials-theme-flat.css" />
                        <script type="text/javascript" src="assets/lib/jssocials/jssocials.min.js"></script>
                        <div id="share"></div>
                        <script type="text/javascript">
                          $("#share").jsSocials({
                              showLabel: false,
                              showCount: false,
                              shares: ["twitter", "facebook", "googleplus"]
                          });
                        </script>

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