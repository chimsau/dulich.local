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
            <div class="card-header">User</div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover" style="font-size: 13px">
                    <thead>
                        <tr>
                            <th style="width:20%;"><a href="user.php?sort=name">Tên hiển thị</a></th>
                            <th style="width:20%;"><a href="user.php?sort=email">Email</a></th>
                            <th style="width:100px;" class="actions"><a href="user.php?sort=role">Quyền</a></th>
                            <th style="width:15%;" class="actions"><a href="user.php?sort=phone">Số điện thoại</a></th>
                            <th class="actions"><a href="user.php?sort=address">Địa chỉ</a></th>
                            <th style="width:150px;" class="actions"><a href="user.php?sort=active">Phê duyệt</a></th>
                            <th style="width:75px;" class="actions"></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                        //sap xep theo thu tu
                      if(isset($_GET['sort'])) {
                        switch ($_GET['sort']) {
                          case 'name':
                            $order_by = 'name';
                            break;

                          case 'email':
                            $order_by = 'email';
                            break;

                          case 'role':
                            $order_by = 'role';
                            break;

                          case 'phone':
                            $order_by = 'phone';
                            break;

                          case 'address':
                            $order_by = 'address';
                            break;

                          case 'active':
                            $order_by = 'active';
                            break;
                          
                          default:
                            $order_by = 'active';
                            break;
                        }
                      } else {
                        $order_by = 'active';
                      }

                        // truy vấn CSDL
                        $query = "SELECT * FROM user ORDER BY {$order_by} ASC";
                        if ($result = $dbc->query($query)) {
                          $role = array(0 => 'Người dùng', 1 => 'Biên tập', 2 => 'Root');
                          $active = array(NULL => 'đã phê duyệt', 0 => 'Chưa phê duyệt');
                          while ($users = $result->fetch_array(MYSQLI_ASSOC)) {
                            echo "
                              <tr>
                                <td>".the_excerpt($users['name'], 100)."</td>
                                <td>".the_excerpt($users['email'], 100)."</td>
                                <td>".$role[($users['role'])]."</td>
                                <td class='actions'>{$users['phone']}</td>
                                <td class='actions'>{$users['address']}</td>
                                <td class='actions'>".$active[($users['active'])]."</td>
                                <td class='actions'>
                                  <span style='padding:0 3px'>
                                  <a href='suauser.php?id={$users['id']}' class='icon' href='#'><i class='mdi mdi-edit'></i></a>
                                  </span>
                                  <span style='padding:0 3px'>
                                  <a id='{$users['id']}' class='icon remove'><i class='mdi mdi-delete'></i>
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
    functions.remove_user();
  });
</script>
<?php include('includes/right-sidebar.php');?>
<?php include('includes/footer.php');?>