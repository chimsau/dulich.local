<?php include('includes/functions.php');?>
<?php include('includes/header.php');?>
  <main class="main py-5 bg-light" role="main">

    <div class="container">

      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="text-center">
            <h2>Tell your story..</h2>
            <hr>
          </div>

          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control form-control-lg" id="title" placeholder="Enter a title">
          </div>

          <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" class="form-control form-control-lg" id="tags" placeholder="Enter tags">
          </div>

          <div class="form-group">
            <label for="title">Your story</label>
            <div class="editor">
              <div class="js-editable medium-editor-element" contenteditable="true" spellcheck="true" data-medium-editor-element="true" role="textbox" aria-multiline="true" data-medium-editor-editor-index="1" medium-editor-index="f2c449ff-94c7-8449-25fe-4562b7f6d349" data-placeholder="Type your text">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque <a href="#">penatibus</a> et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, <strong>pretium quis, sem.</strong></p>

                <p>Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>

                <p><strong>Aliquam lorem ante</strong>, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. <strong>Etiam rhoncus</strong>. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante <a href="#">tincidunt tempus</a>.</p>

                <blockquote>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                </blockquote>

                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, <a href="#">nascetur ridiculus</a> mus. Donec quam felis, ultricies nec, pellentesque eu, <strong>pretium quis, sem.</strong></p>
              </div>
            </div>
          </div>

          <a href="#" class="btn btn-success">Publish</a>
        </div>
      </div>
    </div>
  </main>
<?php include('includes/section-instagram.php');?>
<?php include('includes/footer.php');?>