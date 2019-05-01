<?php include('../includes/mysqli_connect.php');?>
<?php include('../includes/functions.php');?>
<?php include('includes/header.php');?>
<?php include('includes/top-header.php');?>
<?php include('includes/left-sidebar.php');?>
<?php admin_access();?>
<div class="be-content">
    <div class="main-content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-table">
            <div class="card-header">Bình luận về tin tức</div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover" style="font-size: 13px">
                    <thead>
                        <tr>
                            <th style="width:20%;"><a href="binhluancauchuyen.php?sort=title">Bài viết</a></th>
                            <th style="width:10%;"><a href="binhluancauchuyen.php?sort=name">Tên tác giả</a></th>
                            <th style="width:10%;"><a href="binhluancauchuyen.php?sort=email">Email</a></th>
                            <th>Nội dung</th>
                            <th style="width:80px;" class="actions"><a href="binhluancauchuyen.php?sort=by">Ngày tạo</a></th>
                            <th style="width:75px;" class="actions"></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                        //sap xep theo thu tu
                      if(isset($_GET['sort'])) {
                        switch ($_GET['sort']) {
                          case 'title':
                            $order_by = 'cauchuyen_ten';
                            break;

                          case 'name':
                            $order_by = 'binhluan_tacgia';
                            break;

                          case 'email':
                            $order_by = 'binhluan_email';
                            break;

                          case 'by':
                            $order_by = 'date';
                            break;
                          
                          default:
                            $order_by = 'binhluan_id';
                            break;
                        }
                      } else {
                        $order_by = 'binhluan_id';
                      }

                      $query = "SELECT b.binhluan_id, t.cauchuyen_id, t.cauchuyen_tieude, b.binhluan_tacgia, b.binhluan_email, b.binhluan_noidung, DATE_FORMAT(b.binhluan_ngay, '%d/%m/%y') AS date ";
                      $query .= " FROM binhluan AS b";
                      $query .= " INNER JOIN cauchuyen AS t";
                      $query .= " ON (foreign_id = cauchuyen_id)";
                      $query .= " WHERE binhluan_kieu = 'cauchuyen'";
                      $query .= " ORDER BY {$order_by} ASC";
                          if ($result = $dbc->query($query)) {
                            while ($binhluan = $result->fetch_array(MYSQLI_ASSOC)) {
                              echo "
                                <tr>
                                  <td>".the_excerpt($binhluan['cauchuyen_tieude'], 50)."</td>
                                  <td>".the_excerpt($binhluan['binhluan_tacgia'], 100)."</td>
                                  <td>".the_excerpt($binhluan['binhluan_email'], 100)."</td>
                                  <td>{$binhluan['binhluan_noidung']}</td>
                                  <td class='actions'>{$binhluan['date']}</td>
                                  <td class='actions'>
                                    <span style='padding:0 3px'>
                                    <a id='{$binhluan['binhluan_id']}' class='icon remove'><i class='mdi mdi-delete'></i>
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