<?php 
ini_set('session.use_only_cookies', true);
session_start(); ?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta property="og:url"                content="http://www.nytimes.com/2015/02/19/arts/international/when-great-minds-dont-think-alike.html" />
		<meta property="og:type"               content="article" />
		<meta property="og:title"              content="When Great Minds Don’t Think Alike" />
		<meta property="og:description"        content="How much does culture influence creative thinking?" />
		<meta property="og:image"              content="http://static01.nyt.com/images/2015/02/19/arts/international/19iht-btnumbers19A/19iht-btnumbers19A-facebookJumbo-v2.jpg" />

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
		<header id="header" class="sub-header">
			<div class="wrapper-nav">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="logo pull-left">
								<a href="index.php"><span>LA</span>-adventure</a>
							</div>

							<nav class="navbar navbar-expand-md navbar-dark nav-top">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>
								<div class="collapse navbar-collapse" id="navbarsExample04">
									<ul class="navbar-nav mr-auto">
										<li class="nav-item active">
											<a class="nav-link" href="index.php">Trang chủ</a>
										</li>						
										<li class="nav-item">
											<a class="nav-link" href="diadiemdulich.php">Địa điểm du lịch</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href='post-story.php'>Chia sẻ câu chuyện</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="cauchuyen.php">Câu chuyện</a>
										</li>
									</ul>
									
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
							<div class="clock fl">
							    <span id="digclock" style="font-weight: 700;"></span>
							</div>
							<div class="box-logo clearfix">
								<p class="site-title"><a class="buzz" href="index.php">Phượt</a></p>
								<p class="site-description">Một cuộc hành trình thực sự được tính không phải bằng dặm, mà bằng những người bạn!</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>