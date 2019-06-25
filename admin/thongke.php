<?php include('../includes/functions.php');?>
<?php include('../includes/mysqli_connect.php');?>
<?php include('includes/header.php');?>
<?php include('includes/top-header.php');?>
<?php include('includes/left-sidebar.php');?>

<?php editor_access();?>
<div class="be-content">
  <div class="main-content container-fluid">
    <div class="row">
      <div class="col-12 col-lg-6 col-md-4 col-xl-3">
        <div class="widget widget-tile">
          <div class="chart sparkline" id="spark1" style="font-size: 38px;"><i class="icon mdi mdi-dns"></i></div>
          <div class="data-info">
            <div class="desc">Danh mục</div>
            <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span class="number" data-toggle="counter"><?php echo statistic('danhmuc') ?></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-md-4 col-xl-3">
        <div class="widget widget-tile">
          <div class="chart sparkline" id="spark1" style="font-size: 38px;"><i class="icon mdi mdi-dns"></i></div>
          <div class="data-info">
            <div class="desc">Địa điểm</div>
            <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span class="number" data-toggle="counter"><?php echo statistic('diadiem') ?></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-md-4 col-xl-3">
        <div class="widget widget-tile">
          <div class="chart sparkline" id="spark1" style="font-size: 38px;"><i class="icon mdi mdi-collection-text"></i></div>
          <div class="data-info">
            <div class="desc">Bài viết tin tức</div>
            <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span class="number" data-toggle="counter"><?php echo statistic('tintuc') ?></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-md-4 col-xl-3">
        <div class="widget widget-tile">
          <div class="chart sparkline" id="spark1" style="font-size: 38px;"><i class="icon mdi mdi-collection-text"></i></div>
          <div class="data-info">
            <div class="desc">Bài viết địa điểm</div>
            <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span class="number" data-toggle="counter"><?php echo statistic('baiviet_diadiem') ?></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-md-4 col-xl-3">
        <div class="widget widget-tile">
          <div class="chart sparkline" id="spark1" style="font-size: 38px;"><i class="icon mdi mdi-book"></i></div>
          <div class="data-info">
            <div class="desc">Câu chuyện</div>
            <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span class="number" data-toggle="counter"><?php echo statistic('cauchuyen') ?></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-md-4 col-xl-3">
        <div class="widget widget-tile">
          <div class="chart sparkline" id="spark1" style="font-size: 38px;"><i class="icon mdi mdi-comments"></i></div>
          <div class="data-info">
            <div class="desc">Bình luận tin tức</div>
            <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span class="number" data-toggle="counter"><?php echo statisticComment('tintuc') ?></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-md-4 col-xl-3">
        <div class="widget widget-tile">
          <div class="chart sparkline" id="spark1" style="font-size: 38px;"><i class="icon mdi mdi-comments"></i></div>
          <div class="data-info">
            <div class="desc">Bình luận địa điểm</div>
            <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span class="number" data-toggle="counter"><?php echo statisticComment('diadiem') ?></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-md-4 col-xl-3">
        <div class="widget widget-tile">
          <div class="chart sparkline" id="spark1" style="font-size: 38px;"><i class="icon mdi mdi-comments"></i></div>
          <div class="data-info">
            <div class="desc">Bình luận câu chuyện</div>
            <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span class="number" data-toggle="counter"><?php echo statisticComment('cauchuyen') ?></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-md-4 col-xl-3">
        <div class="widget widget-tile">
          <div class="chart sparkline" id="spark1" style="font-size: 38px;"><i class="icon mdi mdi-dns"></i></div>
          <div class="data-info">
            <div class="desc">Người dùng(Tổng số người dùng)</div>
            <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span class="number" data-toggle="counter"><?php echo statisticUser() ?></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-md-4 col-xl-3">
        <div class="widget widget-tile">
          <div class="chart sparkline" id="spark1" style="font-size: 38px;"><i class="icon mdi mdi-dns"></i></div>
          <div class="data-info">
            <div class="desc">Người dùng(Đã phê duyệt)</div>
            <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span class="number" data-toggle="counter"><?php echo statisticUserApproval() ?></span>
            </div>
          </div>
        </div>
      </div>
   </div>
  </div>
</div>
<?php include('includes/right-sidebar.php');?>
<?php include('includes/footer.php');?>