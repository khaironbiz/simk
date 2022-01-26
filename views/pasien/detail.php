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
                    <div class="card-header row mb-1 bg-black">
                        <div class="col-6">Data Dasar</div>
                        <div class="col-6 text-right">
                            <a href="edit.php?key=<?=$_GET['key']; ?>" class="btn btn-success btn-xs">Edit Data Dasar</a>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-sm">
                                <tr>
                                    <td width="20%">NRM</td>
                                    <td>: <?= $data_pasien['nrm'];?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>: <?= ucwords(strtolower($data_pasien['nama_pasien']));?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>: 
                                        <?php
                                            $id_sex     = $data_pasien['sex'];
                                            $sql_sex    = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_sex'");
                                            $sex        = mysqli_fetch_array($sql_sex);
                                            echo $sex['nama_submaster']
                                        ?>                 
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tgl Lahir</td>
                                    <td>: <?= $data_pasien['tgl_lahir'];?></td>           
                                </tr>
                                <tr>
                                    <td>No KTP</td>
                                    <td>: <?= $data_pasien['nik'];?></td>
                                </tr>
                                <tr>
                                    <td>Status Menikah</td>
                                    <td>: 
                                        <?php
                                            $id_status_nikah     = $data_pasien['status_nikah'];
                                            $sql_status_nikah    = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_status_nikah'");
                                            $status_nikah        = mysqli_fetch_array($sql_status_nikah);
                                            echo $status_nikah['nama_submaster']
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>: 
                                        <?php
                                            $id_agama     = $data_pasien['agama'];
                                            $sql_agama    = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_agama'");
                                            $agama        = mysqli_fetch_array($sql_agama);
                                            echo $agama['nama_submaster']
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-sm">
                                <tr>
                                    <td  width="20%">Pendidikan</td>
                                    <td  width="2%">: </td>
                                    <td  width="78%"></td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td  width="2%">:</td>
                                    <td  width="78%"><?= sub_master($data_pasien['pekerjaan']);?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td  width="2%">: </td>
                                    <td  width="78%"><?= $data_pasien['alamat'];?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td  width="2%">: </td>
                                    <td  width="78%"></td>
                                </tr>
                                <tr>
                                    <td>No Telfon</td>
                                    <td  width="2%">: </td>
                                    <td  width="78%"></td>
                                </tr>
                                <tr>
                                    <td>HP</td>
                                    <td  width="2%">:</td>
                                    <td  width="78%"><?= $data_pasien['hp'];?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td  width="2%">:</td>
                                    <td  width="78%"><?= $data_pasien['email'];?></td>
                                </tr>
                                
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-sm">
                                <tr>
                                    <div class="row">
                                        <div class="col-md-6"><b>Klinis</b></div>
                                        <div class="col-md-6 text-right"><a href="klinis.php?key=<?= $has_px_daftar; ?>&id=<?= $_GET['key']?>" class="btn btn-info btn-sm">Update</a></div>
                                    </div>
                                    
                                    
                                </tr>
                                <tr>
                                    <td  width="20%">Diagnosa</td>
                                    <td  width="2%">:</td>
                                    <td  width="78%"><?= dx_medis($pasien_daftar['dx_medis'])?></td>
                                    
                                </tr>
                                <tr>
                                    <td>DPJP</td>
                                    <td>:</td>
                                    <td><?= dokter($pasien_daftar['dpjp'])?></td>
                                </tr>
                                <tr>
                                    <td>Konsultasi</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <?php
                                $urut                   = 1;
                                $cari_konsultasi        = mysqli_query($host,"SELECT * FROM pasien_dokter WHERE key_trx = '$key_trx'");
                                while($data_konsultasi  = mysqli_fetch_array($cari_konsultasi)){
                                ?>
                                <tr>
                                    
                                    <td></td>
                                    <td><?= $urut++."."?></td>
                                    <td><?= dokter($data_konsultasi['id_dokter'])?></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-sm">
                                <tr>
                                    <div class="row">
                                        <div class="col-md-6"><b>Keperawatan</b></div>
                                        <div class="col-md-6 text-right"><a href="keperawatan.php?key=<?= $_GET['key']; ?>" class="btn btn-info btn-sm">Update</a></div>
                                    </div>
                                    
                                    
                                </tr>
                                <tr>
                                    <td width="20%">PP</td>
                                    <td  width="2%">:</td>
                                    <td  width="78%"><?= perawat($pasien_ruangan['pp'])?></td>
                                </tr>
                                <tr>
                                    <td>Barthel Index</td>
                                    <td>:</td>
                                    <?php
                                    $sql_bi     = mysqli_query($host,"SELECT * FROM pasien_bi WHERE key_trx='$key_trx_ruangan' ORDER BY id_pasien_bi DESC LIMIT 1");
                                    $count_bi   = mysqli_num_rows($sql_bi);
                                    if($count_bi>0){
                                        $data_bi    = mysqli_fetch_array($sql_bi);
                                        if($data_bi['total'] < 5){
                                            $keterangan = "Ketergantungan Total";
                                        }elseif($data_bi['total'] < 9){
                                            $keterangan = "Ketergantungan Berat";
                                        }elseif($data_bi['total'] < 12){
                                            $keterangan = "Ketergantungan Sedang";
                                        }elseif($data_bi['total'] < 20){
                                            $keterangan = "Ketergantungan Ringan";
                                        }else{
                                            $keterangan = "Mandiri";
                                            
                                        }
                                    }else{
                                        $keterangan = "NULL";
                                    }
                                    
                                    ?>
                                    <td><?= $keterangan; ?></td>
                                </tr>
                                <tr>
                                    <td>Label Risiko</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                            </table>

                        </div>
                        <div class="col-md-6">
                            <table class="table table-responsive-sm">
                                <tr>
                                    <th colspan="3">
                                        <div class="row">
                                            <div class="col-6">
                                                Kredit SKP PNS
                                            </div>
                                            <div class="col-6 text-right">
                                                <button class="btn btn-info btn-sm">Update</button>
                                            </div>
                                        </div>
                                        
                                    </th>
                                </tr>
                                <tr>
                                    <th>Tanggal</th><td>Kegiatan</td><td>SKP</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-responsive-sm">
                                <tr>
                                    <th colspan="3">
                                        <div class="row">
                                            <div class="col-6">
                                                Kredit PK Jenjang Karir
                                            </div>
                                            <div class="col-6 text-right">
                                                <button class="btn btn-info btn-sm">Update</button>
                                            </div>
                                        </div>
                                        
                                    </th>
                                </tr>
                                <tr>
                                    <th>Tanggal</th><td>Kegiatan</td><td>SKP</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                        
                    </div>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    
                    <a href="pasien-ruangan.php" class="btn btn-primary btn-sm">Back</a>
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