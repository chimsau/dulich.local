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
            <div class="card-header">Bài viết về địa điểm <span style="margin-left:10px"><a href="thembaivietdiadiem.php" class="btn btn-space btn-primary btn-lg"><i class="icon icon-left mdi mdi-plus-circle-o"></i>Thêm mới</a></span></div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover" style="font-size: 13px">
                    <thead>
                        <tr>
                            <th style="width:20%;"><a href="baivietdiadiem.php?sort=name">Tiêu đề</a></th>
                            <th style="width:10%;"><a href="baivietdiadiem.php?sort=cat">Địa điểm</a></th>
                            <th>Nội dung</th>
                            <th style="width:95px;" class="actions">Ảnh đại diện</th>
                            <th style="width:85px;" class="actions"><a href="baivietdiadiem.php?sort=hot">Tin nổi bật</a></th>
                            <th style="width:80px;" class="actions"><a href="baivietdiadiem.php?sort=by">Ngày tạo</a></th>
                            <th style="width:75px;" class="actions"></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                        //sap xep theo thu tu
                      if(isset($_GET['sort'])) {
                        switch ($_GET['sort']) {
                          case 'name':
                            $order_by = 'baiviet_diadiem_ten';
                            break;

                          case 'cat':
                            $order_by = 'diadiem_ten';
                            break;

                          case 'hot':
                            $order_by = 'baiviet_diadiem_hot';
                            break;

                          case 'by':
                            $order_by = 'date';
                            break;
                          
                          default:
                            $order_by = 'id';
                            break;
                        }
                      } else {
                        $order_by = 'id';
                      }

                        // truy vấn CSDL
                        $query = "SELECT b.id, b.baiviet_diadiem_ten, b.baiviet_diadiem_noidung, b.baiviet_diadiem_anh, DATE_FORMAT(b.baiviet_diadiem_ngaytao, '%d/%m/%y') AS date, b.baiviet_diadiem_hot, d.diadiem_ten ";
                        $query .= " FROM baiviet_diadiem AS b";
                        $query .= " JOIN diadiem AS d";
                        $query .= " ON b.diadiem_id = d.id";
                        $query .= " ORDER BY {$order_by} ASC";
                          if ($result = $dbc->query($query)) {
                            $status = array(0 => 'Không', 1 => 'có');
                            while ($baivietdiadiem = $result->fetch_array(MYSQLI_ASSOC)) {
                              echo "
                                <tr>
                                  <td>".the_excerpt($baivietdiadiem['baiviet_diadiem_ten'], 50)."</td>
                                  <td>".the_excerpt($baivietdiadiem['diadiem_ten'], 50)."</td>
                                  <td>".the_excerpt($baivietdiadiem['baiviet_diadiem_noidung'], 200)."</td>
                                  <td class='actions'><img src='uploads/images/{$baivietdiadiem['baiviet_diadiem_anh']}' alt='{$baivietdiadiem['baiviet_diadiem_ten']}' width='95px' height='95px'></td>
                                  <td class='actions'>".$status[($baivietdiadiem['baiviet_diadiem_hot'])]."</td>
                                  <td class='actions'>{$baivietdiadiem['date']}</td>
                                  <td class='actions'>
                                    <span style='padding:0 3px'>
                                    <a href='suabaivietdiadiem.php?id={$baivietdiadiem['id']}' class='icon' href='#'><i class='mdi mdi-edit'></i></a>
                                    </span>
                                    <span style='padding:0 3px'>
                                    <a id='{$baivietdiadiem['id']}' class='icon remove'><i class='mdi mdi-delete'></i>
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
    functions.remove_baivietdiadiem();
  });
</script>
<?php include('includes/right-sidebar.php');?>
<?php include('includes/footer.php');?>