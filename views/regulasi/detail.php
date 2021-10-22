
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
                  ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data
                    </button>
                  <?php
                    }
                  ?>
                  
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="POST">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Regulasi</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"  name="nama_regulasi">
                                            <input type="hidden" class="form-control" value="<?= $data['id_regulasi_jenis']?>" name="id_regulasi_jenis">
                                            <input type="hidden" class="form-control" value="<?= $data['has_regulasi_jenis']?>" name="has_regulasi_jenis">
                                        </div>
                                    </div>
                                </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                include('aksi/regulasi.php');
                ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Regulasi</th>
                      <th>Count</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $id_regulasi_jenis  = $data['id_regulasi_jenis'];
                    $no                 = 1;
                    $sql_perawat        = mysqli_query($host, "SELECT * FROM regulasi WHERE id_regulasi_jenis='$id_regulasi_jenis' ORDER BY nama_regulasi");
                    while($data_ini     = mysqli_fetch_array($sql_perawat)){
                      $id_regulasi      = $data_ini['id_regulasi'];
                      $sql_count        = mysqli_query($host, "SELECT * FROM regulasi_detail WHERE id_regulasi='$id_regulasi'");
                      $count_data       = mysqli_num_rows($sql_count);
                    ?>
                    <tr>
                      <td width="10px"><?= $no++; ?></td>
                      <td><?= $data_ini['nama_regulasi'];?></td>
                      <td><?= $count_data;?></td>
                      <td><a href="<?= $site_url ?>/regulasi/sub-detail.php?id=<?= $data_ini['has_regulasi']?>" class="btn btn-primary btn-sm">Detail</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Nama Regulasi</th>
                        <th>Count</th>
                        <th>Aksi</th>
                      </tr>
                  </tfoot>
                </table>
                <button onclick="goBack()" class="btn btn-danger btn-sm">Go Back</button>
                <script>
                function goBack() {
                window.history.back();
                }
                </script>
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