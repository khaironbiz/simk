<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $judul; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $judul; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <?php
            if(isset($_SESSION['status'])&& $_SESSION['status'] !=""){
            ?>
            <div class="alert alert-<?= $_SESSION['status_info']?> alert-dismissible fade show" role="alert">
              <strong>Hay</strong> <?= $_SESSION['status']?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
            unset($_SESSION['status']);
            }
            ?>
            <div class="card">
              <div class="card-header">
                <div class="card-body">
                  <?php
                    include("../core/security/admin-akses.php");
                    if($count_admin >0){
                      include('modal/tambah-direktorat.php');
                      include('aksi/tambah-direktorat.php');
                    }
                  ?>
                  
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-sm">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Level 2</th>
                              <th>Level 3</th>
                              <th>Level 4</th>
                              <th>Level 5</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          $no         = 1;
                          $id_rs      = $data_rs['id_rs'];
                          $sql_data   = mysqli_query($host, "SELECT * FROM rs_direktorat WHERE id_rs = '$id_rs' ORDER BY nama_direktorat");
                          while($data = mysqli_fetch_array($sql_data)){
                          ?>
                          <tr>
                              <td width="10px"><?= $no++; ?></td>
                              <td><?= $data['nama_direktorat'];?></td>
                              <?php
                                $id_direktorat            = $data['id_rs_direktorat'];
                                $sql_count_bidang         = mysqli_query($host, "SELECT * FROM rs_bidang WHERE id_direktorat='$id_direktorat'");
                                $count_bidang             = mysqli_num_rows($sql_count_bidang);
                                $sql_count_sub_bidang     = mysqli_query($host, "SELECT * FROM rs_sub_bidang WHERE id_direktorat='$id_direktorat'");
                                $count_sub_bidang         = mysqli_num_rows($sql_count_sub_bidang);
                                $sql_count_area_pelayanan = mysqli_query($host,"SELECT * FROM rs_area_pelaksana WHERE id_direktorat='$id_direktorat'");
                                $count_area_pelayanan     = mysqli_num_rows($sql_count_area_pelayanan);
                              ?>
                              <td><?= $count_bidang ?></td>
                              <td><?= $count_sub_bidang ?></td>
                              <td><?= $count_area_pelayanan ?></td>
                              <td>
                                  <a href="<?= $site_url ?>/unit/sub-detail.php?id=<?= $data['has_rs_direktorat']?>" class="btn btn-primary btn-sm">Detail</a>
                                  <?php
                                      if($count_admin >0){
                                          include('modal/edit-direktorat.php');
                                          include('aksi/edit-direktorat.php');
                                          }
                                  ?>
                              </td>
                          </tr>
                          <?php
                              }
                          ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>#</th>
                              <th>Level 2</th>
                              <th>Level 3</th>
                              <th>Level 4</th>
                              <th>Level 5</th>
                              <th>Aksi</th>
                          </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->