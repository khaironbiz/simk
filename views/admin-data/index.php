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
                  <form action="" method="POST">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Administrator</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-3 col-form-label">Administrator</label>
                              <div class="col-sm-9">
                                <select class="form-control" name="nira">
                                  <option value="">--Pilih Perawat--</option>
                                  <?php
                                    $sql_data = mysqli_query($host, "SELECT * FROM nira WHERE blokir ='N' ORDER BY nama");
                                    while($data_perawat= mysqli_fetch_array($sql_data)){
                                  ?>
                                  <option value="<?= $data_perawat['nira']?>"><?= $data_perawat['nama']?></option>
                                  <?php
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  <?php
                  include('aksi/add-admin.php');
                  ?>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Administrator</th>
                        <th>NIRA</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no              = 1;
                      $sql_perawat     = mysqli_query($host, "SELECT * FROM admin_data 
                                          JOIN nira on nira.nira=admin_data.id_perawat
                                          ORDER BY nira.nama");
                      while($data      = mysqli_fetch_array($sql_perawat)){
                      ?>
                      <tr>
                        <td width="10px"><?= $no++; ?></td>
                        <td><?= $data['nama'];?></td>
                        <td><?= $data['nira'];?></td>
                        <td><a href="<?= $site_url ?>/admin-data/delete-admin.php?id=<?= $data['has_admin_data']?>" class="btn btn-danger btn-sm">Delete</a></td>
                      </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Administrator</th>
                        <th>NIRA</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
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