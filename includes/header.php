<html lang="en"><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Responsive Bootstrap 4 Magazine/Blog Theme">
  <meta name="author" content="Bootlab">

  <title>Milo - Magazine/Blog Theme</title>
  <link href="css/app.css" rel="stylesheet">
  <script type="text/javascript" src="admin/assets/lib/tinymce/tinymce.min.js"></script>
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
<header role="banner">
  <nav class="navbar navbar-expand-md navbar-light bg-white absolute-top">
    <div class="container">
      <button class="navbar-toggler order-2 order-md-1" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3 order-md-2" id="navbar">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL ?>post-new.php">New story</a>
          </li>
        </ul>
      </div>
      <a class="navbar-brand mx-auto order-1 order-md-3" href="<?php echo BASE_URL ?>">Milø</a>
      <div class="collapse navbar-collapse order-4 order-md-4" id="navbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL ?>page-about.php">About</a>
          </li>
        </ul>
        <form class="form-inline" role="search">
          <input class="search js-search form-control form-control-rounded mr-sm-2" type="text" title="Enter search query here.." placeholder="Search.." aria-label="Search">
        </form>
      </div>
    </div>
  </nav>
</header>