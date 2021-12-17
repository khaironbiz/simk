<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
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
            include('aksi/registrasi.php');
            ?>
            <form action="" method="POST">
                <div class="card">
                    <div class="card-header text-center">
                        <label><?=$judul?></label>
                        <label><?= $data_lay['nama_submaster']; ?></label>
                        <input type="hidden" name="registrasi" value="<?= uniqid() ?>">
                        <input type="hidden" name="nrm" value="<?= $data_pasien['nrm']?>">
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <table class="table table-sm">
                                    <tr>
                                        <td>Nama</td><td>:</td><td><?= $data_pasien['nama_pasien']?></td>
                                    </tr>
                                    <tr>
                                        <td>NRM</td><td>:</td><td><?= $data_pasien['nrm']?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td><td>:</td>
                                        <?php
                                            $id_sex         = $data_pasien['sex'];
                                            $sql_sex        = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_sex'");
                                            $data_sex_ini   = mysqli_fetch_array($sql_sex);
                                        ?>
                                        <td><?= $data_sex_ini['nama_submaster']?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td><td>:</td><td><?= $data_pasien['tgl_lahir']?></td>
                                    </tr>
                                    <tr>
                                        <td>Diagnosa Utama</td><td>:</td>
                                        <td>
                                            <select class="form-control form-control-sm" required name="dx_medis">
                                                <option value="">Pilih Salah Satu</option>
                                                <?php
                                                $sql_dx_medis   = mysqli_query($host,"SELECT * FROM dx_medis ORDER BY dx_medis ASC");
                                                while($data_dx_medis    = mysqli_fetch_array($sql_dx_medis)){
                                                ?>
                                                <option value="<?= $data_dx_medis['id']?>"><?= $data_dx_medis['dx_medis']?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Jaminan</td><td>:</td>
                                        <td>
                                            <select class="form-control form-control-sm" required name="jaminan">
                                                <option value="">Pilih Salah Satu</option>
                                                <?php
                                                $sql_jaminan    = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id_master='30'");
                                                while($data_jaminan = mysqli_fetch_array($sql_jaminan)){
                                                ?>
                                                <option value="<?= $data_jaminan['id']?>"><?= $data_jaminan['nama_submaster']?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ruangan</td><td>:</td>
                                        <td>
                                            <select class="form-control form-control-sm" required name="ruangan">
                                                <option value="">Pilih Salah Satu</option>
                                                <?php
                                                $id_layanan     = $data_lay['id'];
                                                $sql_ruangan    = mysqli_query($host, "SELECT * FROM ruangan WHERE id_layanan='$id_layanan'");
                                                while($data_ruangan = mysqli_fetch_array($sql_ruangan)){
                                                ?>
                                                <option value="<?= $data_ruangan['id']?>"><?= $data_ruangan['ruangan']?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="index.php?admisi=<?= $_GET['admisi']?>" class="btn btn-danger btn-sm">Back</a>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </form>
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