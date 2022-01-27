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
                                        <div class="col-sm-2">
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
                                        <div class="col-sm-2">
                                            <select class="form-control form-control-sm" name="id_bed">
                                                <option value="<?=  $data_pasien_ruangan['id_bed']?>"><?=  $data_pasien_ruangan['id_bed']?></option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                        </div>
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
                                        <td><?= dx_kep($data_dx_kep['id_dx_kep'])?></td>
                                        <td><?= $data_dx_kep['dx_muncul']?></td>
                                        <td>
                                            <?php 
                                            if($data_dx_kep['dx_teratasi'] >0){
                                                echo $data_dx_kep['dx_teratasi'];
                                            }
                                            
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                            <div class="col-md-6 table-responsive">
                                <form action="" method="POST">
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Skor Jatuh</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control form-control-sm" name="total" max="25">
                                            <input type="hidden" class="form-control" name="add_morse" value="<?= $_GET['key']?>">
                                        </div>
                                        <label class="col-sm-2 col-form-label">Jam</label>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control form-control-sm" name="jam" value="<?= date('H:i')?>">
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Tanggal</label>
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
                                        <th>Waktu Periksa</th>
                                        <td>Skore</td>
                                        <td>Keterangan</td>
                                    </tr>
                                    <?php
                                    $urut              = 1;
                                    $cari_morse        = mysqli_query($host,"SELECT * FROM pasien_morse WHERE key_trx = '$key_trx_ruangan'");
                                    while($data_morse  = mysqli_fetch_array($cari_morse)){
                                    ?>
                                    <tr>
                                        <td><?= $urut++?></td>
                                        <td><?= $data_morse['waktu_periksa']?></td>
                                        <td><?= $data_morse['total']?></td>
                                        <td><?= risiko_jatuh($data_morse['total'])?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                            <div class="col-md-6 table-responsive">
                                <form action="" method="POST">
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Barthel Index</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control form-control-sm" name="total" max="20">
                                            <input type="hidden" class="form-control" name="add_bi" value="<?= $_GET['key']?>">
                                        </div>
                                        <label class="col-sm-2 col-form-label">Jam</label>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control form-control-sm" name="jam" value="<?= date('H:i')?>">
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Tanggal</label>
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
                                        <th>Waktu Periksa</th>
                                        <td>Skore</td>
                                        <td>Keterangan</td>
                                    </tr>
                                    <?php
                                    $norut          = 1;
                                    $cari_bi        = mysqli_query($host,"SELECT * FROM pasien_bi WHERE key_trx = '$key_trx_ruangan'");
                                    while($data_bi  = mysqli_fetch_array($cari_bi)){
                                    ?>
                                    <tr>
                                        <td><?= $norut++?></td>
                                        <td><?= $data_bi['waktu_periksa']?></td>
                                        <td><?= $data_bi['total']?></td>
                                        <td>
                                            <?php 
                                            if($data_bi['total'] < 5){
                                                echo "Ketergantungan Total";
                                            }elseif($data_bi['total'] < 9){
                                                echo "Ketergantungan Berat";
                                            }elseif($data_bi['total'] < 12){
                                                echo "Ketergantungan Sedang";
                                            }elseif($data_bi['total'] < 20){
                                                echo "Ketergantungan Ringan";
                                            }else{
                                                echo "Mandiri";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                            <div class="col-md-6 table-responsive">
                                <div class="card bg-info">
                                    <div class="card-header text-center"><b>NEWSS</b></div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Nafas</label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control form-control-sm" name="nafas" max="120">
                                                    <input type="hidden" class="form-control" name="add_newss" value="<?= $_GET['key']?>">
                                                </div>
                                                <label class="col-sm-2 col-form-label">Suhu</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control form-control-sm" name="suhu" required>
                                                </div>
                                            
                                                <label class="col-sm-2 col-form-label">APVU</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control form-control-sm" name="apvu" required>
                                                        <option value="">---</option>
                                                        <option value="3">Tidak Response</option>
                                                        <option value="2">Respons Nyeri</option>
                                                        <option value="1">Respons Suara</option>
                                                        <option value="0">Compos Mentis</option>
                                                    </select>
                                                </div>
                                                <label class="col-sm-2 col-form-label">Nadi</label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control form-control-sm" name="nadi" max="200" required>
                                                </div>
                                                <label class="col-sm-2 col-form-label">Sistolik</label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control form-control-sm" name="sistolik" max="250" required>
                                                </div>
                                                <label class="col-sm-2 col-form-label">Diastolik</label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control form-control-sm" name="diastolik" max="200" required>
                                                </div>
                                            
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Waktu Periksa</label>
                                                <div class="col-sm-2">
                                                    <input type="time" class="form-control form-control-sm" name="jam" value="<?= date('H:i')?>">
                                                </div>
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
                                        <table class="table table-hover table-sm">
                                            <tr>
                                                <th>#</th>
                                                <th>Waktu</th>
                                                <th>Nafas</th>
                                                <th>Suhu</th>
                                                <th>Nadi</th>
                                                <th>TD</th>
                                                <th>NEWSS</th>
                                            </tr>
                                            <?php
                                            $norut              = 1;
                                            $cari_newss         = mysqli_query($host,"SELECT * FROM pasien_newss WHERE key_trx = '$key_trx_ruangan'");
                                            while($data_newss   = mysqli_fetch_array($cari_newss)){
                                            ?>
                                            <tr>
                                                <td><?= $norut++?></td>
                                                <td><?= $data_newss['waktu_periksa']?></td>
                                                <td><?= $data_newss['nafas']?></td>
                                                <td><?= $data_newss['suhu']?></td>
                                                <td><?= $data_newss['nadi']?></td>
                                                <td><?= $data_newss['sistolik']." / ".$data_newss['diastolik']?></td>
                                                <td class="bg-<?= newss($data_newss['newss_score'])?>"><?= $data_newss['newss_score']?></td>
                                                <td>
                                                    
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-success">
                                    <div class="card-body">
                                        <table class="table table-sm table-hover">
                                            <tr>
                                                <th>#</th>
                                                <th>Waktu</th>
                                                <th>Nafas</th>
                                                <th>Suhu</th>
                                                <th>Nadi</th>
                                                <th>TD</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
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