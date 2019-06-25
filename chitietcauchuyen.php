<?php include('includes/mysqli_connect.php');?>
<?php include('includes/functions.php');?>
<?php include('includes/header_sub.php');?>
<?php 
$type = 'cauchuyen';
if($id = validate_id($_GET['id'])) {
      $set = get_story_by_id($id);
      $posts = array(); 

  if($set->num_rows > 0) {
    $story = mysqli_fetch_array($set, MYSQLI_ASSOC); 
    $title = isset($story['cauchuyen_tieude']) ? $story['cauchuyen_tieude'] : '' ;

    $posts[] = array(
      'cauchuyen_tieude' => $story['cauchuyen_tieude'], 
      'cauchuyen_noidung' => $story['cauchuyen_noidung'], 
      'date' => $story['date'],
      'uname' => $story['uname'],

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
                    <li class='category'><a rel='category tag'>CÂU CHUYỆN</a></li>
                  </ul>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="box-content">
                      <div class="detail-content">
                        <?php
                            foreach($posts as $post) {
                            echo "
                              <h3>{$post['cauchuyen_tieude']}</h3>
                              <div class='post-meta clearfix'>
                                <p class='post-category'><a>{$post['uname']}</a></p>
                                <p class='post-date'>
                                    <time class='published'>{$post['date']}</time>
                                </p>
                              </div>
                              <p class='entry-detail-content'>{$post['cauchuyen_noidung']}</p>
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