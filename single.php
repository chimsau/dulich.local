<?php include('includes/mysqli_connect.php');?>
<?php include('includes/functions.php');?>
<?php include('includes/header.php');?>
  <main class="main pt-4" role="main">
    <div class="container">
      <div class="row">
        <div class="col-md-9">

          <article class="card mb-4">
            <header class="card-header text-center">
              <div class="card-meta">
                <a href="#"><time class="timeago" datetime="2017-10-26 20:00" data-tid="1">1 year ago</time></a> in <a href="page-category.html">Journey</a>
              </div>
              <a href="post-image.html">
                <h1 class="card-title">How can we sing about love?</h1>
              </a>
            </header>
            <a href="post-image.html">
              <img class="card-img" src="img/articles/1.jpg" alt="">
            </a>
            <div class="card-body">

              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque <a href="#">penatibus</a> et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, <strong>pretium quis, sem.</strong></p>

              <p>Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>

              <p><strong>Aliquam lorem ante</strong>, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. <strong>Etiam rhoncus</strong>. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante <a href="#">tincidunt tempus</a>.</p>

              <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
              </blockquote>

              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, <a href="#">nascetur ridiculus</a> mus. Donec quam felis, ultricies nec, pellentesque eu, <strong>pretium quis, sem.</strong></p>

              <div class="row">
                <div class="col-md-4">
                  <ul>
                    <li>Donec quam felis</li>
                    <li>Consectetuer adipiscing</li>
                  </ul>
                </div>
                <div class="col-md-4">
                  <ul>
                    <li>Donec quam felis</li>
                    <li>Consectetuer adipiscing</li>
                  </ul>
                </div>
                <div class="col-md-4">
                  <ul>
                    <li>Donec quam felis</li>
                    <li>Consectetuer adipiscing</li>
                  </ul>
                </div>
              </div>

              <p>Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. <strong>Etiam rhoncus</strong>. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante <a href="#">tincidunt tempus</a>.</p>

              <?php include('includes/comment_form.php');?>
              

            </div>
          </article><!-- /.card -->

        </div>
        <?php include('includes/sidebar.php');?>  
      </div>
    </div>

  </main>
<?php include('includes/section-instagram.php');?>
<?php include('includes/footer.php');?>