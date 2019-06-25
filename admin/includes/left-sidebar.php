<div class="be-left-sidebar">
  <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">Dashboard</a>
    <div class="left-sidebar-spacer">
      <div class="left-sidebar-scroll ps ps--active-y">
        <div class="left-sidebar-content">
          <ul class="sidebar-elements">
            <li class="divider">Menu</li>
            <li><a href="index.php"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
            </li>
            <li class="parent"><a href="#"><i class="icon mdi mdi-dns"></i><span>Danh mục</span></a>
              <ul class="sub-menu" style="">
                  <li><a href="danhmuc.php">Quản lý danh mục</a></li>
                  <li><a href="diadiem.php">Quản lý địa điểm</a></li>
              </ul>
            </li>
            <li class="parent"><a href="#"><i class="icon mdi mdi-collection-text"></i><span>Bài viết</span></a>
              <ul class="sub-menu" style="">
                  <li><a href="tintuc.php">Quản lý tin tức</a></li>
                  <li><a href="baivietdiadiem.php">Quản lý bài viết địa điểm</a></li>
              </ul>
            </li>
            <li><a href="cauchuyen.php"><i class="icon mdi mdi-book"></i><span>Câu chuyện</span></a>
            <li class="parent"><a href="#"><i class="icon mdi mdi-comments"></i><span>Bình luận</span></a>
              <ul class="sub-menu" style="">
                  <li><a href="binhluantintuc.php">Bình luận tin tức</a></li>
                  <li><a href="binhluandiadiem.php">Bình luận địa điểm</a></li>
                  <li><a href="binhluancauchuyen.php">Bình luận câu chuyện</a></li>
              </ul>
            </li>
            <?php if(is_admin()){ ?>
            <li><a href="thongke.php"><i class="icon mdi mdi-view-week"></i><span>Thống kê</span></a>
            <li><a href="user.php"><i class="icon mdi mdi-account"></i><span>User</span></a>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>