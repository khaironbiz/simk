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
            <div class="card">
                <div class="card-header">
                    <?php
                    include('menu/pasien-detail.php')
                    ?>
                </div>
                <div class="card-body">
                    <h4>Data Dasar</h4>
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
                        <a href="edit.php?key=<?=$_GET['key']; ?>" class="btn btn-success btn-sm">Edit</a>
                        <a href="" class="btn btn-danger btn-sm">Blokir</a>
                    </div>
                    
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