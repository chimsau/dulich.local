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
            <div class="card-header">Địa điểm</div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width:50%;"><a href="diadiem.php?sort=name">Tên địa điểm</a></th>
                            <th>Ảnh đại diện</th>
                            <th class="actions"><a href="diadiem.php?sort=pos">Vị trí</a></th>
                            <th class="actions"></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                        //sap xep theo thu tu
                      if(isset($_GET['sort'])) {
                        switch ($_GET['sort']) {
                          case 'name':
                            $order_by = 'diadiem_ten';
                            break;

                          case 'pos':
                            $order_by = 'diadiem_vitri';
                            break;
                          
                          default:
                            $order_by = 'diadiem_id';
                            break;
                        }
                      } else {
                        $order_by = 'diadiem_id';
                      }

                        // truy vấn CSDL
                        $query = "SELECT * FROM diadiem ORDER BY {$order_by} ASC";
                          if ($result = $dbc->query($query)) {
                              while ($diadiem = $result->fetch_array(MYSQLI_ASSOC)) {
                                echo "
                                  <tr>
                                    <td>{$diadiem['diadiem_ten']}</td>
                                    <td><img src='uploads/images/{$diadiem['diadiem_anh']}' alt='{$diadiem['diadiem_ten']}' width='100px' height='100px'></td>
                                    <td class='actions'>{$diadiem['diadiem_vitri']}</td>
                                    <td class='actions'>
                                      <span style='padding:0 3px'>
                                      <a href='suadiadiem.php?id={$diadiem['diadiem_id']}' class='icon' href='#'><i class='mdi mdi-edit'></i></a>
                                      </span>
                                      <span style='padding:0 3px'>
                                      <a id='{$diadiem['diadiem_id']}' class='icon remove'><i class='mdi mdi-delete'></i>
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
    functions.remove_diadiem();
  });
</script>
<?php include('includes/right-sidebar.php');?>
<?php include('includes/footer.php');?>