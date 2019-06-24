<aside id="aside">
  <div class="sidebar-sticky">
    <div class="wrapper-post-hot">
      <h3 class="title-side">
        <span>Bài viết hot</span>
      </h3>
      <ul class="list-post-hot">
        <?php 
          $query = "SELECT tintuc_id, tintuc_ten FROM tintuc WHERE tintuc_hot = 1 ORDER BY tintuc_id ASC LIMIT 0, 10";
          $result = $dbc->query($query);
          confirm_query($result,$query);
          while ($news = $result->fetch_array(MYSQLI_ASSOC)) {
              echo "<li><a href='single.php?id={$news['tintuc_id']}'";
              echo ">".$news['tintuc_ten']. "</a></li>";
          }
         ?>
      </ul>
    </div>
    <hr>
    <div class="wrapper-categories">
      <h3 class="title-side">
        <span>Chuyên mục</span>
      </h3>
      <ul>
        <?php 
          $query = "SELECT * FROM danhmuc ORDER BY danhmuc_id ASC";
          $result = $dbc->query($query);
          confirm_query($result,$query);

          while ($cats = $result->fetch_array(MYSQLI_ASSOC)) {
              echo "<li class='cat-item'><a href='danhmuctintuc.php?id={$cats['danhmuc_id']}'";
              echo ">".$cats['danhmuc_ten']. "</a></li>";
          }
         ?>
      </ul>
    </div>
    <div class="wrapper-categories">
      <h3 class="title-side">
        <span>Địa điểm</span>
      </h3>
      <ul>
        <?php 
          $query = "SELECT * FROM diadiem ORDER BY diadiem_id ASC";
          $result = $dbc->query($query);
          confirm_query($result,$query);

          while ($location = $result->fetch_array(MYSQLI_ASSOC)) {
              echo "<li class='cat-item'><a href='diadiem.php?id={$location['diadiem_id']}'";
              echo ">".$location['diadiem_ten']. "</a></li>";
          }
         ?>
      </ul>
    </div>
  </div>
</aside>