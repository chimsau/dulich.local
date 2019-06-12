<?php 
ini_set('session.use_only_cookies', true);
session_start(); ?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Du lịch</title>

		<!-- Bootstrap core CSS -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/style.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/roboto-condensed/roboto-condensed.css">
		<script type="text/javascript" src="assets/lib/tinymce/tinymce.min.js"></script>
	    <script type="text/javascript">
	        tinymce.init({
	          selector: 'textarea',
	          height: 300,
	          theme: 'modern',
	          plugins: [
	            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
	            'searchreplace wordcount visualblocks visualchars code fullscreen',
	            'insertdatetime media nonbreaking save table contextmenu directionality',
	            'emoticons template paste textcolor colorpicker textpattern imagetools'
	          ],
	          toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	          toolbar2: 'print preview media | forecolor backcolor emoticons',
	          image_advtab: true,
	          templates: [
	            { title: 'Test template 1', content: 'Test 1' },
	            { title: 'Test template 2', content: 'Test 2' }
	          ],
	          content_css: [
	            'assets/lib/tinymce/css/codepen.min.css'
	          ]
	            
	         });
	    </script>
	</head>

	<body>
		<header id="header">
			<div class="wrapper-nav">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<nav class="navbar navbar-expand-md navbar-dark nav-top">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>
								<div class="collapse navbar-collapse" id="navbarsExample04">
									<ul class="navbar-nav mr-auto">
										<li class="nav-item active">
											<a class="nav-link" href="#">Trang chủ</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#">Cẩm năng du lịch</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#">Blog du lịch</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#">Địa điểm du lịch</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href='post-story.php'>Chia Sẻ câu chuyện</a>
										</li>
									</ul>
									<form class="form-inline my-2 my-md-0">
										<input class="form-control" type="text" placeholder="Search">
									</form>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="wrapper-logo">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="box-logo clearfix">
								<p class="site-title"><a href="index.php">Du lịch</a></p>
								<p class="site-description">Cẩm nang phượt dành cho người Việt</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>