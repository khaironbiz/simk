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
                    include('menu/pasien-detail.php')
                    ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Diagnosa</label>
                                    <div class="col-sm-10">
                                        <select class="form-control form-control-sm">
                                            <option><?= dx_medis($pasien_daftar['dx_medis'])?></option>
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
                                    <div class="col-sm-10">
                                        <select class="form-control form-control-sm">
                                            <option value="$pasien_daftar['dpjp']"><?= dokter($pasien_daftar['dpjp']); ?></option>
                                        </select>
                                        <?php
                                            $cari_dokter    = mysqli_query($host,"SELECT * FROM dokter where blokir='0'");
                                            $data_dokter    = mysqli_fetch_array($cari_dokter);
                                            while($data_dokter){
                                        ?>
                                        <option><?= $data_dokter['nama_dokter']?></option>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 table-responsive">
                            <label>Dokter Konsultasi</label>
                            <?php
                                include('modal/add-dokter.php')
                            ?>
                            <table class="table table-hover">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Dokter</th>
                                    <th>Tanggal Mulai</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    
                    <a href="detail.php?key=<?= $_GET['key']?>" class="btn btn-primary btn-sm">Back</a>
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