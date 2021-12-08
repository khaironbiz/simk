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
            ?>
            <form>
                <div class="card">
                <div class="card-header">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                        <a class="navbar-brand" href="#">Data Pasien</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Kunjungan</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                    Askep
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Perawat</a>
                                        <a class="dropdown-item" href="#">Diagnosa Keperawatan</a>
                                    <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </li>
                            </ul>
                            
                        </div>
                    </nav>
                <div class="card-body">
                    <h4>Pemutakhiran Data</h4>
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
                                    <td>
                                        <?php
                                            $id_status_nikah     = $data_pasien['status_nikah'];
                                            $sql_status_nikah    = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_status_nikah'");
                                            $status_nikah        = mysqli_fetch_array($sql_status_nikah);
                                        ?>
                                        <select class="form-control form-control-sm">
                                            <option value="<?= $id_status_nikah?>"><?= $status_nikah['nama_submaster']?></option>
                                            <?php
                                            $sql_nikah  = mysqli_query($host,"SELECT * FROM db_sub_master WHERE id_master='7'");
                                            while($data_nikah= mysqli_fetch_array($sql_nikah)){
                                            ?>
                                            <option value="<?= $data_nikah['id']?>"><?= $data_nikah['nama_submaster']?></option>
                                            <?php
                                            }
                                            ?>
                                        </select> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>
                                        <?php
                                            $id_agama     = $data_pasien['agama'];
                                            $sql_agama    = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_agama'");
                                            $agama        = mysqli_fetch_array($sql_agama);
                                            $agama['nama_submaster'];
                                        ?>
                                        <select class="form-control form-control-sm">
                                            <option value="<?= $id_agama?>"><?= $agama['nama_submaster'];?></option>
                                            <?php
                                            $sql_aqama  = mysqli_query($host,"SELECT * FROM db_sub_master WHERE id_master='3'");
                                            while($data_agama   = mysqli_fetch_array($sql_aqama)){
                                            ?>
                                            <option value="<?= $data_agama['id'];?>"><?= $data_agama['nama_submaster'];?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-sm">
                                <tr>
                                    <td width="150px">Pendidikan</td>
                                    <td>
                                        
                                        <select class="form-control form-control-sm">
                                            <?php
                                            $id_pendidikan     = $data_pasien['pendidikan'];
                                            $sql_pendidikan    = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_pendidikan'");
                                            $pendidikan        = mysqli_fetch_array($sql_pendidikan);
                                            $count_pendidikan  = mysqli_num_rows($sql_pendidikan);
                                            if($count_pendidikan>0){
                                            ?>
                                            <option value="<?= $id_pendidikan;?>"><?= $pendidikan['nama_submaster'];?></option>
                                            <?php
                                            }
                                            ?>
                                            <option value="">pilih pendidikan</option>
                                            <?php
                                            $sql_pendidikan  = mysqli_query($host,"SELECT * FROM db_sub_master WHERE id_master='26'");
                                            while($data_pendidikan   = mysqli_fetch_array($sql_pendidikan)){
                                            ?>
                                            <option value="<?= $data_pendidikan['id']?>"><?= $data_pendidikan['nama_submaster']?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td>
                                        <select class="form-control form-control-sm">
                                            <?php
                                            $id_pendidikan     = $data_pasien['pendidikan'];
                                            $sql_pendidikan    = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_pendidikan'");
                                            $pendidikan        = mysqli_fetch_array($sql_pendidikan);
                                            $count_pendidikan  = mysqli_num_rows($sql_pendidikan);
                                            if($count_pendidikan>0){
                                            ?>
                                            <option value="<?= $id_pendidikan;?>"><?= $pendidikan['nama_submaster'];?></option>
                                            <?php
                                            }else{
                                            ?>
                                            <option value="">pilih pekerjaan</option>
                                            <?php
                                            }
                                            $sql_pekerjaan  = mysqli_query($host,"SELECT * FROM db_sub_master WHERE id_master='31'");
                                            while($data_pekerjaan   = mysqli_fetch_array($sql_pekerjaan)){
                                            ?>
                                            <option value="<?= $data_pekerjaan['id']?>"><?= $data_pekerjaan['nama_submaster']?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
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
                        <a href="" class="btn btn-success btn-sm">Edit</a><a href="" class="btn btn-danger btn-sm">Blokir</a>
                    </div>
                    
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