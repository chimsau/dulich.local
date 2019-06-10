<aside id="aside">
  <div class="wrapper-post-hot">
    <h3 class="title">
      Bài viết hot
    </h3>
    <ul class="list-post-hot">
      <?php 
        $query = "SELECT tintuc_id, tintuc_ten FROM tintuc WHERE tintuc_hot = 1 ORDER BY tintuc_id ASC LIMIT 0, 10";
        $result = $dbc->query($query);
        confirm_query($result,$query);

        while ($posts = $result->fetch_array(MYSQLI_ASSOC)) {
            echo "<li><a href='index.php?nid={$posts['tintuc_id']}'";
            echo ">".$posts['tintuc_ten']. "</a></li>";
        }
       ?>
    </ul>
  </div>
  <hr>
  <div class="wrapper-categories">
    <h3 class="title">
      Chuyên mục
    </h3>
    <ul>
      <?php 
        $query = "SELECT * FROM danhmuc ORDER BY danhmuc_id ASC";
        $result = $dbc->query($query);
        confirm_query($result,$query);

        while ($cats = $result->fetch_array(MYSQLI_ASSOC)) {
            echo "<li class='cat-item'><a href='index.php?cid={$cats['danhmuc_id']}'";
            echo ">".$cats['danhmuc_ten']. "</a></li>";
        }
       ?>
    </ul>
  </div>
</aside>