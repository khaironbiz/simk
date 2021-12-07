<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="https://ppni.or.id/simk/image/LOGO-PPNI.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?= $nama_web  ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://ppni.or.id/simk/id/image/foto/<?= $data_pengguna['foto']?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $data_pengguna['nama']?></a>
        </div>
      </div>

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
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= $site_url; ?>/dashboard/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="../widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          
          <li class="nav-header">EXAMPLES</li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Dokumen
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= $site_url ?>/regulasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Regulasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $site_url ?>/form" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Formulir Keperawatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Data Pasien
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= $site_url ?>/pasien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Base Pasien</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $site_url ?>/pasien/register.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pasien Dirawat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $site_url ?>/pasien/pembagian-pasien.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembagian Kelolaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $site_url ?>/pasien/register.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pasien Dirawat</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Ruangan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= $site_url ?>/ruangan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Base Ruangan</p>
                </a>
              </li>
              
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Logbook
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= $site_url ?>/regulasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pasien Ruangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $site_url ?>/form" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pasien Kelolaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan</p>
                </a>
              </li>
            </ul>
          </li>
          <?php
          $sql_list_admin = mysqli_query($host, "SELECT * FROM admin_data WHERE id_perawat ='$user_check'");
          $list_admin     = mysqli_num_rows($sql_list_admin);
          if($list_admin >0){
          ?>
          <li class="nav-header">Admin Area</li>
          <li class="nav-item">
            <a href="<?= $site_url ?>/home/perawat.php" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Data Anggota</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= $site_url ?>/regulasi" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Regulasi</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?= $site_url ?>/admin-data" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Admin Data</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= $site_url ?>/form" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Formulir Keperawatan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= $site_url ?>/unit/detail.php?id=349537bf357a6c8316213cfe2fc2319d" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Unit Kerja</p>
            </a>
          </li>
          <?php
          }
          ?>
          <li class="nav-item">
            <a href="<?= $site_url ?>/auth/logout.php" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
