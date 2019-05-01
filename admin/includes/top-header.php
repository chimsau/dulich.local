<nav class="navbar navbar-expand fixed-top be-top-header">
  <div class="container-fluid">
    <div class="be-navbar-header"><a class="navbar-brand" href="<?php echo BASE_URL ?>"></a>
    </div>
    <div class="page-title"><span>Dashboard</span></div>
    <div class="be-right-navbar">
      <ul class="nav navbar-nav float-right be-user-nav">
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false"><img src="assets/img/avatar.png" alt="Avatar"><span class="user-name"></span></a>
          <div class="dropdown-menu" role="menu">     
            <div class="user-info">
              <div class="user-name"><?php echo (isset($_SESSION['name'])) ? $_SESSION['name'] : "bạn hiền!"; ?></div>
            </div>
            <a class="dropdown-item" href="<?php echo BASE_URL."admin/logout.php" ?>"><span class="icon mdi mdi-power"></span>Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>