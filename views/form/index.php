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
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Formulir</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-3 col-form-label">Formulir</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputPassword3" name="nama_form">
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
                  include('aksi/add-form.php');
                  ?>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama Formulir</th>
                        <th>Jumlah Formulir</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no                = 1;
                      $sql_form          = mysqli_query($host, "SELECT * FROM form ORDER BY nama_form");
                      while($data        = mysqli_fetch_array($sql_form)){
                        $id_form         = $data['id_form'];
                        $sql_count       = mysqli_query($host, "SELECT * FROM form_detail WHERE id_form='$id_form'");
                        $count_data      = mysqli_num_rows($sql_count);
                      ?>
                      <tr>
                        <td width="10px"><?= $no++; ?></td>
                        <td><?= htmlspecialchars($data['nama_form']);?></td>
                        <td><?= $count_data;?></td>
                        <td><a href="<?= $site_url ?>/form/detail.php?id=<?= $data['has_form']?>" class="btn btn-primary btn-sm">Detail</a></td>
                      </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Jenis Regulasi</th>
                        <th>Jumlah Regulasi</th>
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