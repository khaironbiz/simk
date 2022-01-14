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
                                <th>Identitas</th>
                                <th>Administrasi</th>
                                <th>Klinis</th>
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
                                                    WHERE pasien_daftar_ruangan.keluar = '0'
                                                    ORDER BY pasien_daftar_ruangan.id_kamar ASC, pasien_daftar_ruangan.id_bed ASC");
                            while($data         = mysqli_fetch_array($sql_pasien)){
                              
                            ?>
                            <tr>
                                <td width="10px"><?= $no++; ?></td>
                                <td>
                                  <table>
                                    <tr>
                                      <td>NRM</td>
                                      <td>:</td>
                                      <td><?= $data['nrm'];?></td>
                                    </tr>
                                    <tr>
                                      <td>Nama</td>
                                      <td>:</td>
                                      <td><?= ucwords(strtolower($data['nama_pasien']));?></td>
                                    </tr>
                                    <tr>
                                      <td>JK</td>
                                      <td>:</td>
                                      <td><?= sub_master($data['sex']) ;?></td>
                                    </tr>
                                    <tr>
                                      <td>Tgl Lahir</td>
                                      <td>:</td>
                                      <td><?= $data['tgl_lahir']?></td>
                                    </tr>
                                    <tr>
                                      <td>Usia</td>
                                      <td>:</td>
                                      <td>
                                        <?= "(". usia($data['tgl_lahir'])->y." tahun ".usia($data['tgl_lahir'])->m." bulan ".usia($data['tgl_lahir'])->d." hari )"?>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                                <td>
                                  <table>
                                    <tr>
                                      <td>Masuk RS</td>
                                      <td>:</td>
                                      <td><?= $data['waktu_masuk'] ?></td>
                                    </tr>
                                    <tr>
                                      <td>LOS</td>
                                      <td>:</td>
                                      <td><?= usia($data['waktu_masuk'])->d ." Hari"?></td>
                                    </tr>
                                    <tr>
                                      <td>Kamar</td>
                                      <td>:</td>
                                      <td><?= $data['id_kamar']." . ".$data['id_bed']?></td>
                                    </tr>
                                    <tr>
                                      <td>Masuk Kamar</td>
                                      <td>:</td>
                                      <td><?= $data['waktu_masuk_bed'] ?></td>
                                    </tr>
                                    <tr>
                                      <td>LOS Ruangan</td>
                                      <td>:</td>
                                      <td><?= usia($data['waktu_masuk_bed'])->d ." Hari"?></td>
                                    </tr>
                                  </table>
                                </td>
                                <td>
                                  <table>
                                    <tr>
                                      <td>PA</td>
                                      <td>:</td>
                                      <td><?= $data['pa']?></td>
                                    </tr>
                                    <tr>
                                      <td>PP</td>
                                      <td>:</td>
                                      <td><?= $data['pp']?></td>
                                    </tr>
                                    <tr>
                                      <td>Dx Medis</td>
                                      <td>:</td>
                                      <td><?= $data['pp']?></td>
                                    </tr>
                                    <tr>
                                      <td>Label Risiko</td>
                                      <td>:</td>
                                      <td><?= $data['pp']?></td>
                                    </tr>
                                    <tr>
                                      <td>Barthel Index</td>
                                      <td>:</td>
                                      <td><?= $data['pp']?></td>
                                    </tr>
                                  </table>
                                </td>
                                
                                <td>
                                  <a href="detail.php?key=<?= $data['has_pasien_db'];?>" class="btn btn-info btn-sm">Detail</a>
                                  
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Identitas</th>
                                <th>Administrasi</th>
                                <th>Klinis</th>
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