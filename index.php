<?php include('includes/mysqli_connect.php');?>
<?php include('includes/functions.php');?>
<?php include('includes/header.php');?>
<main id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="wrapper-main">
					<div class="row m-0">						
						<div class="col-md-12 p-0">
							<div class="service">
								<h2 class="title-home"><span class="post-subheading">Vi Vu</span> chung một niềm đam mê </h2>
								<div class="row m-0">
									<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="box-sv">
											<a href="diadiemdulich.php">
												<div class="image">
													<img src="<?php echo BASE_URL ?>admin/uploads/images/sev1.jpg" class="img-fluid" alt="">
												</div>
												<div class="des">
													<h2>Địa điểm</h2>
													<p>Vùng đất mới những cung đường đang còn xanh và chờ các bạn khám phá!</p>
												</div>
											</a>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="box-sv">
											<a href="post-story.php">
												<div class="image">
													<img src="<?php echo BASE_URL ?>admin/uploads/images/sev2.png" class="img-fluid" alt="">
												</div>
												<div class="des">
													<h2>Chia sẻ</h2>
													<p>Những cảm nhận tuyệt vời nhất những vùng miền mà bạn đã đi!</p>
												</div>
											</a>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="box-sv">
											<a href="cauchuyen.php">
												<div class="image">
													<img src="<?php echo BASE_URL ?>admin/uploads/images/sev3.jpg" class="img-fluid" alt="">
												</div>
												<div class="des">
													<h2>Câu chuyện</h2>
													<p>Hãy nói cho chúng tôi nghe những thứ tuyệt vời nhất mà bạn đã khám phá!</p>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
							
							<div class="wrapper-main-content m-0">
								<h2 class="title-home"><span class="post-subheading">Blog</span> dân đi phượt </h2>
								<div class="row">
									<div class="col-md-12">
										<div class="box-content">
											<div class="featured">
											    <article class="row clearfix post">
											    	<div class="col-md-3">
											    		<div class="image-ads img-fluid-left">
											        		<a target="_blank" href="https://www.google.com.vn/"><img  src="<?php echo BASE_URL ?>/admin/uploads/images/h7-banner-img-7.jpg"></a>
											        	</div>
											        </div>
											    	<?php 
											    		$posts = fetch_news_all();
											    		if(!empty($posts[0])) {
												    		$items = $posts[0];
												    		$type = 'tintuc';
															$countComment = countComment($type, $items['id']);
															if($countComment > 0) {
																$count = $countComment;
															} else {
																$count = 0;
															}
											    			echo"
											    			<div class='col-md-6'>
														        <div class='post-inner post-hover'>
														            <div class='post-thumbnail featured-img-thumb-large'>
														                <a href='single.php?id={$items['id']}'>
														                    <img src='".BASE_URL."/admin/uploads/images/{$items['tintuc_anh']}' class='img-fluid' alt=''>
														                </a>
														                <a class='post-comments' href='single.php?id={$items['id']}#disscuss'><span><i class='fa fa-comments-o'></i>{$count}</span></a>
														            </div>
														         

														            <div class='post-meta clearfix'>
														                <p class='post-category'><a href='danhmuctintuc.php?id={$items['catid']}'>{$items['danhmuc_ten']}</a></p>
														                <p class='post-date'>
														                    <time class='published' datetime=''>{$items['date']}</time>
														                </p>
														            </div>
														           

														            <h2 class='post-title'>
		        														<a href='single.php?id={$items['id']}' title='{$items['tintuc_ten']}'>{$items['tintuc_ten']}</a>
		        													</h2>
														           
														            <div class='excerpt'>
														                <p>".the_excerpt($items['tintuc_mota'], 350)."</p>
														            </div>
														            
														        </div>
													        </div>
													        ";
											    		}
											    	 ?>
											        <!--/.post-inner-->
											        <div class="col-md-3">
											        	<div class="image-ads img-fluid-right">
											        		<a target="_blank" href="https://www.google.com.vn/"><img  src="<?php echo BASE_URL ?>admin/uploads/images/h7-banner-img-6.jpg"></a>
											        	</div>
											        </div>
											    </article>
											    <!--/.post-->
											</div>
											<div id="grid-wrapper" class="post-list clearfix">
												<div class="row">
												<div class='owl-carousel owl-theme'>
												<?php  

						                        $posts = fetch_news_all();

						                        $type = 'tintuc';
												
						                        unset($posts[0]);
						                        if(!empty($posts[1])) {
							                        foreach ($posts as $post) {
							                        	$countComment = countComment($type, $post['id']);
														if($countComment > 0) {
															$count = $countComment;
														} else {
															$count = 0;
														}
											            echo "
											            <div class='item'>
											                <div class='col-md-12'>
							                                    <article class='clearfix post'>
							                                      <div class='post-inner post-hover'>
							                                          <div class='post-thumbnail featured-img-thumb-large'>
							                                              <a href='single.php?id={$post['id']}' title=''>
							                                                  <img src='".BASE_URL."/admin/uploads/images/{$post['tintuc_anh']}' class='img-fluid' alt=''>
							                                              </a>
							                                              <a class='post-comments' href='single.php?id={$post['id']}#disscuss'><span><i class='fa fa-comments-o'></i>{$count}</span></a>
							                                          </div>
							                                          <div class='post-meta clearfix'>
							                                              <p class='post-category'><a href='danhmuctintuc.php?id={$post['catid']}'>{$post['danhmuc_ten']}</a></p>
							                                              <p class='post-date'>
							                                                  <time class='published'>{$post['date']}</time>
							                                              </p>
							                                          </div>
							                                          <h2 class='post-title'>
							                                            <a href='single.php?id={$post['id']}' title='{$post['tintuc_ten']}'>".the_excerpt($post['tintuc_ten'], 70)."</a>
							                                          </h2>
							                                          <div class='excerpt'>
							                                              <p>".the_excerpt($post['tintuc_mota'], 150)."</p>
							                                          </div>
							                                      </div>
							                                    </article>
							                                </div>
							                            </div>
											            ";
											        }

						                        }
											    ?>
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
			</div>
		</div>
	</div>
</main>
<?php include('includes/footer.php');?>
<script type="text/javascript">
	$('.owl-carousel').owlCarousel({
    loop:true,
    nav:true,
    loop:true,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})
</script>