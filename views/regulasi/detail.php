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
            <div class="card">
              <div class="card-header">
                
              <div class="card-body">
                  <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                Tambah Data
                </button>

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
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Jenis Regulasi</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputPassword3" name="regulasi_jenis">
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
                include('aksi/jenis-regulasi.php');
                ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Jenis Regulasi</th>
                    <th>Jumlah Regulasi</th>
                    <th>Email</th>
                    <th>HP</th>
                    <th>Pendidikan</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no           = 1;
                    $sql_perawat  = mysqli_query($host, "SELECT * FROM regulasi_jenis ORDER BY jenis_regulasi");
                    while($data   = mysqli_fetch_array($sql_perawat)){
                    ?>
                    <tr>
                      <td width="10px"><?= $no++; ?></td>
                      <td><?= $data['jenis_regulasi'];?></td>
                      <td><?= $data['id_regulasi_jenis'];?></td>
                      <td></td>
                      <td></td>
                      <td><a href="<?= $site_url ?>/regulasi/detail.php?id=<?= $data['has_regulasi_jenis']?>" class="btn btn-primary btn-sm">Detail</a></td>
                    </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>NIRA</th>
                    <th>Email</th>
                    <th>HP</th>
                    <th>Pendidikan</th>
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