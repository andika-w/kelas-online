<aside class="main-sidebar sidebar-light elevation-4">
    <!-- Brand Logo -->
    <a href="<?=$url?>" class="brand-link">
      <!-- <img src="<?= $url?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <i class="fa-brands fa-korvue brand-image mt-1" style="font-size: 28px;";"></i>
      <span class="brand-text font-weight-light">Kelas Online</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">User</a>
        </div>
      </div>
      <a class="breadcrumb-item" href="<?= $url ?>pages/autentikasi/logout.php">Logout</a>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- kelas -->
          <li class="nav-item">
            <a href="<?= $url ?>pages/kelas" class="nav-link">
            <i class="fa-solid fa-school" style="font-size: 19px;"></i>
              <p>
                Kelas
              </p>
            </a>
          </li>
          <!-- kelas -->
          <!-- Pembayaran -->
          <li class="nav-item">
            <a href="<?= $url ?>pembayaran/bayar.php" class="nav-link">
            <i class="fa-solid fa-money-bill" style="font-size: 19px;"></i>  
              <p>
                Pembayaran
              </p>
            </a>
          </li>
          <!-- Pembayaran -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>