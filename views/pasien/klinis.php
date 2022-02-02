<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
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
            <div class="card mt-2">
                <div class="card-header">
                    <?php
                    include('menu/pasien-detail.php');
                    include('aksi/klinis.php');
                    ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="POST">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Diagnosa</label>
                                    <div class="col-sm-6">
                                        <input type="hidden" name="update_dokter" class="form-control" value="<?= $_GET['key']?>">
                                        <select class="form-control form-control-sm" name="dx_medis">
                                            <option value="<?= $pasien_daftar['dx_medis']?>"><?= dx_medis($pasien_daftar['dx_medis'])?></option>
                                            <?php
                                            $cari_dx    = mysqli_query($host,"SELECT * FROM dx_medis ORDER BY dx_medis ASC ");
                                            while($data_dx  = mysqli_fetch_array($cari_dx)){
                                            ?>
                                            <option value="<?= $data_dx['id']?>"><?= $data_dx['dx_medis']?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">DPJP</label>
                                    <div class="col-sm-6">
                                        <select class="form-control form-control-sm" name="dpjp">
                                            <option value="<?=$pasien_daftar['dpjp'] ?>"><?= dokter($pasien_daftar['dpjp']); ?></option>
                                        <?php
                                            $cari_dokter    = mysqli_query($host,"SELECT * FROM dokter where blokir='0'");
                                            while($data_dokter    = mysqli_fetch_array($cari_dokter)){
                                        ?>
                                        <option value="<?= $data_dokter['id_dokter']?>"><?= $data_dokter['nama_dokter']?></option>
                                        <?php
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4"><button type="submit" class="btn btn-primary btn-sm">Save</button></div>
                                </div>
                                <div class="row">
                                    
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 table-responsive">
                            <form action="" method="POST">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Konsultasi</label>
                                    <div class="col-sm-8">
                                        <select class="form-control form-control-sm" name="id_dokter" required>
                                            <option value="">---pilih---</option>
                                            <?php
                                                $cari_dokter    = mysqli_query($host,"SELECT * FROM dokter where blokir='0'");
                                                while($data_dokter    = mysqli_fetch_array($cari_dokter)){
                                            ?>
                                            <option value="<?= $data_dokter['id_dokter']?>"><?= $data_dokter['nama_dokter']?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        <input type="hidden" class="form-control" name="add_konsultasi" value="<?= $_GET['key']?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-sm btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-hover">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Dokter</th>
                                </tr>
                                <?php
                                $urut                   = 1;
                                $cari_konsultasi        = mysqli_query($host,"SELECT * FROM pasien_dokter WHERE key_trx = '$key_trx'");
                                while($data_konsultasi  = mysqli_fetch_array($cari_konsultasi)){
                                ?>
                                <tr>
                                    <td><?= $urut++?></td>
                                    <td><?= dokter($data_konsultasi['id_dokter'])?></td>
                                    <td></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    
                    <a href="detail.php?key=<?= $_GET['id']?>" class="btn btn-primary btn-sm">Back</a>
                </div>
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