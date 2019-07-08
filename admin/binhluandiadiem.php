<?php $title = "Bình luận về địa điểm"; ?>
<?php include('../includes/mysqli_connect.php');?>
<?php include('../includes/functions.php');?>
<?php include('includes/header.php');?>
<?php include('includes/top-header.php');?>
<?php include('includes/left-sidebar.php');?>
<?php editor_access();?>
<div class="be-content">
    <div class="main-content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-table">
            <div class="card-header">Bình luận về địa điểm</div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover" style="font-size: 13px">
                    <thead>
                        <tr>
                            <th style="width:20%;"><a href="binhluandiadiem.php?sort=title">Bài viết</a></th>
                            <th style="width:10%;"><a href="binhluandiadiem.php?sort=name">Tên tác giả</a></th>
                            <th>Nội dung</th>
                            <th style="width:80px;" class="actions"><a href="binhluandiadiem.php?sort=by">Ngày tạo</a></th>
                            <th style="width:75px;" class="actions"></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                        //sap xep theo thu tu
                      if(isset($_GET['sort'])) {
                        switch ($_GET['sort']) {
                          case 'title':
                            $order_by = 'baiviet_diadiem_ten';
                            break;

                          case 'name':
                            $order_by = 'uname';
                            break;

                          case 'by':
                            $order_by = 'date';
                            break;
                          
                          default:
                            $order_by = 'bid';
                            break;
                        }
                      } else {
                        $order_by = 'bid';
                      }

                      $query = "SELECT b.id AS bid, t.id AS tid, t.baiviet_diadiem_ten, u.name AS uname, b.binhluan_noidung, DATE_FORMAT(b.binhluan_ngay, '%d/%m/%y') AS date ";
                      $query .= " FROM binhluan AS b";
                      $query .= " INNER JOIN baiviet_diadiem AS t";
                      $query .= " ON b.foreign_id = t.id ";
                      $query .= " INNER JOIN user AS u ";
                      $query .= " ON (b.user_id = u.id) ";
                      $query .= " WHERE binhluan_kieu = 'diadiem'";
                      $query .= " ORDER BY {$order_by} ASC";
                          if ($result = $dbc->query($query)) {
                            while ($binhluan = $result->fetch_array(MYSQLI_ASSOC)) {
                              echo "
                                <tr>
                                  <td><a target='_blank' href='".BASE_URL."/chitietdiadiem.php?id={$binhluan['tid']}'>".the_excerpt($binhluan['baiviet_diadiem_ten'], 50)."</a></td>
                                  <td>".the_excerpt($binhluan['uname'], 100)."</td>
                                  <td>{$binhluan['binhluan_noidung']}</td>
                                  <td class='actions'>{$binhluan['date']}</td>
                                  <td class='actions'>
                                    <span style='padding:0 3px'>
                                    <a id='{$binhluan['bid']}' class='icon remove'><i class='mdi mdi-delete'></i>
                                    </a>
                                    </span>
                                  </td>
                              </tr>
                              ";
                            }
                          }
                       ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
      </div>
    </div>
</div>
<script>
  $(document).ready(function() {
    functions.remove_binhluan();
  });
</script>
<?php include('includes/right-sidebar.php');?>
<?php include('includes/footer.php');?>