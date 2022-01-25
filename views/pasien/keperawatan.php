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
                    include('aksi/keperawatan.php');
                    ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php 
                        $id_ruangan = id_ruangan($data_pengguna['ruangan']);
                        $ruanganku  = $data_pengguna['ruangan'];
                        ?>
                        <div class="col-md-6">
                            <form action="" method="POST">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Perawat Primer</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="update_kamar" class="form-control" value="<?= $_GET['key']?>">
                                        <select class="form-control form-control-sm" name="pp" required>
                                            <option value="<?= $data_pasien_ruangan['pp']?>"><?= perawat($data_pasien_ruangan['pp'])?></option>
                                            <?php
                                            $cari_nira          = mysqli_query($host,"SELECT * FROM nira WHERE ruangan = '$ruanganku' ORDER BY nama ASC ");
                                            while($data_nira    = mysqli_fetch_array($cari_nira)){
                                            ?>
                                            <option value="<?= $data_nira['nira']?>"><?= $data_nira['nama']?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2">Kamar</label>
                                    <div class="col-sm-4">
                                        <select class="form-control form-control-sm" name="id_kamar">
                                            <option value="<?=  $data_pasien_ruangan['id_kamar']?>"><?=  $data_pasien_ruangan['id_kamar']?></option>
                                        <?php
                                            $id_ruangan         = $data_pasien_ruangan['id_ruangan'];
                                            $cari_kamar         = mysqli_query($host,"SELECT * FROM ruangan_kamar where id_ruangan='$id_ruangan'");
                                            while($data_kamar   = mysqli_fetch_array($cari_kamar)){
                                        ?>
                                        <option value="<?= $data_kamar['no_kamar']?>"><?= $data_kamar['no_kamar']?></option>
                                        <?php
                                            }
                                        ?>
                                        </select>
                                        
                                    </div>
                                    <label class="col-sm-2">Bed</label>
                                    <div class="col-sm-4">
                                        <select class="form-control form-control-sm" name="id_bed">
                                            <option value="<?=  $data_pasien_ruangan['id_bed']?>"><?=  $data_pasien_ruangan['id_bed']?></option>
                                        
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 table-responsive">
                            <form action="" method="POST">
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">Diagnosa Kep</label>
                                    <div class="col-sm-4">
                                        <select class="form-control form-control-sm" name="id_dx_kep" required>
                                            <option value="">---pilih---</option>
                                            <?php
                                                $cari_dokter    = mysqli_query($host,"SELECT * FROM dx_kep ORDER BY dx_kep ASC");
                                                while($data_dokter    = mysqli_fetch_array($cari_dokter)){
                                            ?>
                                            <option value="<?= $data_dokter['id']?>"><?= $data_dokter['dx_kep']?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        <input type="hidden" class="form-control" name="add_dx_kep" value="<?= $_GET['key']?>">
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">Tanggal Ditegakkan</label>
                                    <div class="col-2">
                                        <select class="form-control form-control-sm" required name="tgl">
                                            <option value='<?= date('d')?>'><?= date('d')?></option>
                                                <?php
                                                $a    =1;
                                                while($a <= 31){
                                                ?>
                                                <option value="<?= $a?>"><?= $a?></option>
                                                <?php
                                                $a++;
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <select class="form-control form-control-sm" required name="bln">
                                            <option value='<?= date('m')?>'><?= date('m')?></option>
                                            <?php
                                            $b    =1;
                                            while($b <= 12){
                                            ?>
                                            <option value="<?= $b?>"><?= $b?></option>
                                            <?php
                                            $b++;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <select class="form-control form-control-sm" required name="th">
                                            <option value='<?= date('Y')?>'><?= date('Y')?></option>
                                            <?php
                                            $c      =date('Y')-1;
                                            $d      = date('Y');
                                            while($c <= $d){
                                            ?>
                                            <option value="<?= $c?>"><?= $c?></option>
                                            <?php
                                            $c++;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-sm btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-hover">
                                <tr>
                                    <th>#</th>
                                    <th>DX Kep</th>
                                    <td>Ditegakkan</td>
                                    <td>Teratasi</td>
                                </tr>
                                <?php
                                $urut                   = 1;
                                $cari_dx_kep        = mysqli_query($host,"SELECT * FROM pasien_dx_kep WHERE key_trx = '$key_trx_ruangan'");
                                while($data_dx_kep  = mysqli_fetch_array($cari_dx_kep)){
                                ?>
                                <tr>
                                    <td><?= $urut++?></td>
                                    <td><?= $data_dx_kep['id_dx_kep']?></td>
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