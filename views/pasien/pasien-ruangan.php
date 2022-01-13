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
              <div class="card-header bg-dark">
                <?php
                  include('menu/index.php');
                ?>
              </div>
                <div class="card-body">
                    <?php
                    include("../core/security/admin-akses.php");
                    if($count_admin >0){
                        include('modal/add-pasien.php');
                        include('aksi/add-pasien.php');
                    }
                    ?>
                    <table id="example1" class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NRM</th>
                                <th>Nama Pasien</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no                 = 1;
                            $sql_pasien         = mysqli_query($host, "SELECT * FROM pasien_daftar_ruangan 
                                                    JOIN pasien_daftar on pasien_daftar.key_trx= pasien_daftar_ruangan.key_trx
                                                    JOIN pasien_db on pasien_db.nrm = pasien_daftar_ruangan.nrm
                                                    JOIN ruangan on ruangan.id = pasien_daftar_ruangan.id_ruangan
                                                    ORDER BY pasien_daftar_ruangan.id_kamar ASC, pasien_daftar_ruangan.id_bed ASC");
                            while($data         = mysqli_fetch_array($sql_pasien)){
                              
                            ?>
                            <tr>
                                <td width="10px"><?= $no++; ?></td>
                                <td><?= $data['nrm'];?></td>
                                <td><?= ucwords(strtolower($data['nama_pasien']));?></td>
                                <td>
                                  <?php
                                    $id_sex   = $data['sex'];
                                    $sql_sex  = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_sex'");
                                    $sex      = mysqli_fetch_array($sql_sex);
                                    echo $sex['nama_submaster']
                                  ?>
                                </td>
                                <td><?= $data['tgl_lahir'];?></td>
                                <td>
                                  <a href="detail.php?key=<?= $data['has_pasien_db'];?>" class="btn btn-info btn-sm">Detail</a>
                                  <?php
                                  if($count_pasien_ini>0){
                                    echo "pasien sedang dirawat";
                                  }elseif(isset($_GET['admisi'])){
                                  ?>
                                  <a href="registrasi.php?admisi=<?= $_GET['admisi']?>&key=<?= $data['has_pasien_db']?>" class="btn btn-success btn-sm">Daftar</a>
                                  <?php
                                  }
                                  ?>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>NRM</th>
                                <th>Nama Pasien</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
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