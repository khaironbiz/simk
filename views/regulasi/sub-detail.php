
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
                <div class="modal fade" id="exampleModal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama Regulasi</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?= $data['nama_regulasi']?>" name="nama_regulasi" readonly>
                                            <input type="hidden" class="form-control" value="<?= $data['id_regulasi_jenis']?>" name="id_regulasi_jenis">
                                            <input type="hidden" class="form-control" value="<?= $data['id_regulasi']?>" name="id_regulasi">
                                            <input type="hidden" class="form-control" value="<?= $data['has_regulasi']?>" name="has_regulasi">
                                        </div>
                                        <label class="col-sm-3 col-form-label">Nomor Dokumen</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="no_dokumen">
                                        </div><label class="col-sm-3 col-form-label">Tanggal Dokumen</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="tgl_dokumen">
                                        </div>
                                        <label class="col-sm-3 col-form-label">Revisi Ke</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" required name="revisi_ke">
                                                <option value="" selected>Pilih</option>
                                                <?php
                                                    $n      = 0;
                                                    while($n <10){
                                                ?>
                                                <option value="<?= $n; ?>">Ke <?= $n; ?></option>
                                                <?php
                                                    $n++;
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <label class="col-sm-3 col-form-label">File Regulasi</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="file_regulasi">
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
                include('aksi/regulasi-detail.php');
                ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nomor Dokumen</th>
                        <th>Tanggal Dokumen</th>
                        <th>Tanggal Upload</th>
                        <th>HIT</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id_regulasi        = $data['id_regulasi'];
                        $no                 = 1;
                        $sql_data           = mysqli_query($host, "SELECT * FROM regulasi_detail WHERE id_regulasi='$id_regulasi' ORDER BY tgl_dokumen ASC");
                        while($data_ini     = mysqli_fetch_array($sql_data)){
                        ?>
                        <tr>
                            <td width="10px"><?= $no++; ?></td>
                            <td><?= $data_ini['no_dokumen'];?></td>
                            <td><?= $data_ini['tgl_dokumen'];?></td>
                            <td><?= $data_ini['created_at'];?></td>
                            <td><?= $data_ini['count_hit'];?></td>
                            <td><a href="<?= $site_url ?>/regulasi/download.php?id=<?= $data_ini['has_regulasi_detail']?>" class="btn btn-warning btn-sm" target=_bank>Download</a></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nomor Dokumen</th>
                            <th>Tanggal Dokumen</th>
                            <th>Tanggal Upload</th>
                            <th>HIT</th>
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