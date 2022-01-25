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
                                    <td width="150px">NRM</td>
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
                                    <td width="150px">Pendidikan</td>
                                    <td>: </td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td>: </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>:</td>
                                </tr>
                                <tr>
                                    <td>No Telfon</td>
                                    <td></td>           
                                </tr>
                                <tr>
                                    <td>HP</td>
                                    <td>: <?= $data_pasien['nik'];?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                </tr>
                                
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-sm">
                                <tr>
                                    <div class="row">
                                        <div class="col-md-6"><b>Klinis</b></div>
                                        <div class="col-md-6 text-right"><a href="klinis.php?key=<?= $_GET['key']; ?>" class="btn btn-info btn-sm">Update</a></div>
                                    </div>
                                    
                                    
                                </tr>
                                <tr>
                                    <td>Diagnosa</td>
                                    <td>:</td>
                                    <td>CVD SI</td>
                                </tr>
                                <tr>
                                    <td>DPJP</td>
                                    <td>:</td>
                                    <td>DR. dr. Andi Basuki Prima Birawa Sp.S(K), MARS</td>
                                </tr>
                                <tr>
                                    <td>Konsultasi</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-sm">
                                <tr>
                                    <div class="row">
                                        <div class="col-md-6"><b>Keperawatan</b></div>
                                        <div class="col-md-6 text-right"><a href="" class="btn btn-info btn-sm">Update</a></div>
                                    </div>
                                    
                                    
                                </tr>
                                <tr>
                                    <td>PP</td>
                                    <td>:</td>
                                    <td>Asih Dwihayu Pangesti, S.Kep., Ners</td>
                                </tr>
                                <tr>
                                    <td>Barthel Index</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>NEWSS</td>
                                    <td>:</td>
                                    <td></td>
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
                    <a href="detail.php?key=<?= $data['has_pasien_db'];?>" class="btn btn-danger btn-sm">Keluar</a>
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