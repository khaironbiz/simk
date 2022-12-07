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
                  <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah SPK Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <div class="form-group row">
                                  <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Perawat</label>
                                  <div class="col-sm-9">
                                      <select class="form-control" name="id_perawat" required>
                                          <option value="">---pilih---</option>
                                          <?php
                                          $sql_nira = mysqli_query($host, "SELECT * FROM nira WHERE blokir='N' ORDER BY nama ASC");
                                          while ($data_nira = mysqli_fetch_array($sql_nira)){
                                          ?>
                                              <option value="<?= $data_nira['nira']?>"><?= $data_nira['nama']?></option>
                                          <?php
                                          }
                                          ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="inputPassword3" class="col-sm-3 col-form-label">Level PK</label>
                                  <div class="col-sm-9">
                                      <select class="form-control" name="level_pk" required>
                                          <option value="">---pilih---</option>
                                          <?php
                                          $sql_nira = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id_master='14' ORDER BY grade ASC");
                                          while ($data_nira = mysqli_fetch_array($sql_nira)){
                                              ?>
                                              <option value="<?= $data_nira['id']?>"><?= $data_nira['grade']?>. <?= $data_nira['nama_submaster']?></option>
                                              <?php
                                          }
                                          ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="inputPassword3" class="col-sm-3 col-form-label">Tgl SPK</label>
                                  <div class="col-sm-9">
                                      <input type="date" name="tgl_surat" required class="form-control">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="inputPassword3" class="col-sm-3 col-form-label">Tgl SPK Exp</label>
                                  <div class="col-sm-9">
                                      <input type="date" name="tgl_exp" required class="form-control">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="inputPassword3" class="col-sm-3 col-form-label">File SPK</label>
                                  <div class="col-sm-9">
                                      <input type="file" name="file" required class="form-control">
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
                  include('aksi/add-spk-file.php');
                  ?>
                  <table id="example1" class="table table-sm table-bordered table-striped">
                    <thead>
                      <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>NIRA</th>
                          <th>Level PK</th>
                          <th>Tgl SPK</th>
                          <th>EXP SPK</th>
                          <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no         = 1;
                      $sql_spk    = mysqli_query($host, "SELECT * FROM spk_perawat 
                                            JOIN nira on nira.nira=spk_perawat.id_perawat 
                                            JOIN db_sub_master on db_sub_master.id=spk_perawat.level_pk
                                            ORDER BY spk_perawat.id DESC");
                      while($data = mysqli_fetch_array($sql_spk)){
                      ?>
                      <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $data['nama']; ?></td>
                          <td><?= $data['id_perawat']; ?></td>
                          <td><?= $data['nama_submaster']; ?></td>
                          <td><?= $data['tgl_surat']; ?></td>
                          <td><?= $data['tgl_exp']; ?></td>
                          <td><a href="<?= $site_url?>/../assets/files/spk/<?= $data['file']?>" class="btn btn-sm btn-info">View</a></td>
                      </tr>
                      <?php
                        }
                      ?>
                    </tbody>

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