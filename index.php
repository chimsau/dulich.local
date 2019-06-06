<?php include('includes/mysqli_connect.php');?>
<?php include('includes/functions.php');?>
<?php include('includes/header.php');?>
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
								<h2 class="title"> DÂN ĐI PHƯỢT <span class="post-subheading">Blog</span></h2>
								<div class="row">
									<div class="col-md-12">
										<div class="box-content">
											<div class="featured">
											    <article class="clearfix post">
											        <div class="post-inner post-hover">
											            <div class="post-thumbnail featured-img-thumb-large">
											                <a href="#" title="">
											                    <img src="assets/img/articles/du-lich-thai-lan-can-mang-theo-gi-thumb-720x340.jpg" class="img-fluid" alt="">
											                </a>
											                <a class="post-comments" href=""><span><i class="fa fa-comments-o"></i>0</span></a>
											            </div>
											            <!--/.post-thumbnail-->

											            <div class="post-meta clearfix">
											                <p class="post-category"><a href="">Cẩm nang phượt</a></p>
											                <p class="post-date">
											                    <time class="published" datetime="2019-05-13 15:37:10">13 Tháng Năm, 2019</time>
											                </p>
											            </div>
											            <!--/.post-meta-->

											            <h2 class="post-title">
        														<a href="" title="">Đi du lịch Thái Lan cần mang theo những gì – chia sẻ từ blogger Liên Phạm</a>
        													</h2>
											            <!--/.post-title-->
											            <div class="excerpt">
											                <p>Đối với những ai lần đầu tiên đi du lịch nước ngoài thì điểm đến đầu tiên và dễ nhất, phổ biến nhất có thể nói là Thái Lan. Tuy vậy vẫn có nhiều...</p>
											            </div>
											            <!--/.entry-->
											        </div>
											        <!--/.post-inner-->
											    </article>
											    <!--/.post-->
											</div>
											<div id="grid-wrapper" class="post-list clearfix">
												<div class="row">
                          <?php 
                          if(isset($_GET['cid']) && filter_var($_GET['cid'], FILTER_VALIDATE_INT, array('min_range' =>1))) {


                          } elseif (isset($_GET['nid']) && filter_var($_GET['nid'], FILTER_VALIDATE_INT, array('min_range' =>1))) {

                          } else{ 
                            $query = "SELECT n.tintuc_id ,n.tintuc_ten, n.tintuc_mota, n.tintuc_noidung, n.tintuc_anh, DATE_FORMAT(n.tintuc_ngaytao, '%d Tháng %m, %y') AS date, c.danhmuc_ten, c.danhmuc_id ";
                            $query .= " FROM tintuc AS n "; 
                            $query .= " INNER JOIN danhmuc AS c "; 
                            $query .= " USING (danhmuc_id) ORDER BY date ASC ";
                            if($result = $dbc->query($query)){
                              while ($tintucs = $result->fetch_array(MYSQLI_ASSOC)) {
                                echo "
                                  <div class='col-md-6'>
                                    <article class='clearfix post'>
                                      <div class='post-inner post-hover'>
                                          <div class='post-thumbnail featured-img-thumb-large'>
                                              <a href='single.php?nid={$tintucs['tintuc_id']}' title=''>
                                                  <img src='".BASE_URL."/admin/uploads/images/{$tintucs['tintuc_anh']}' class='img-fluid' alt=''>
                                              </a>
                                              <a class='post-comments' href=''><span><i class='fa fa-comments-o'></i>0</span></a>
                                          </div>
                                          <div class='post-meta clearfix'>
                                              <p class='post-category'><a href='single.php?cid={$tintucs['danhmuc_id']}'>{$tintucs['danhmuc_ten']}</a></p>
                                              <p class='post-date'>
                                                  <time class='published'>{$tintucs['date']}</time>
                                              </p>
                                          </div>
                                          <h2 class='post-title'>
                                            <a href='single.php?nid={$tintucs['tintuc_id']}' title='{$tintucs['tintuc_ten']}'>{$tintucs['tintuc_ten']}</a>
                                          </h2>
                                          <div class='excerpt'>
                                              <p>{$tintucs['tintuc_mota']}</p>
                                          </div>
                                      </div>
                                    </article>
                                  </div>
                                ";
                              }
                            }
                          }?>
												</div>
											</div>
											<nav class="pagination clearfix">
											    <div class="wp-pagenavi">
											        <span class="current">1</span>
											        <a class="page larger" href="">2</a>
											        <a class="page larger" href="">3</a>
											        <a class="page larger" href="">4</a>
											        <a class="page larger" href="">5</a>
											        <span class="extend">...</span>
											        <a class="larger page" href="">10</a>
											        <span class="extend">...</span>
											        <a class="nextpostslink" rel="next" href="http://dandiphuot.com/page/2">»</a>
											        <a class="last" href="http://dandiphuot.com/page/15">Trang cuối »</a>
											    </div>
											</nav>
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