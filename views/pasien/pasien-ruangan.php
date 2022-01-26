<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mb-5">
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
    <section class="content mb-5">
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
                            <div class="row">
                                <div class="col-6">
                                    <?php
                        include("../core/security/admin-akses.php");
                        if($count_admin >0){
                            include('modal/add-pasien.php');
                            include('aksi/add-pasien.php');
                        }
                      ?>
                                </div>
                                <div class="col-6 text-right">
                                    <?php
                      if(isset($_POST['edit_ruangan'])){
                        $id_ruangan = $_POST['id_ruangan'];
                        $update_ruangan= mysqli_query($host,"UPDATE nira SET id_ruangan='$id_ruangan' WHERE nira='$user_check'");
                        if($update_ruangan){
                          $_SESSION['status']="Data gagal disimpan";
                          $_SESSION['status_info']="danger";
                          echo "<script>document.location=\"$site_url/pasien/pasien-ruangan.php\"</script>";
                        }
                        
                      }
                      if($data_pengguna['id_ruangan'] < 1){
                      ?>
                                    <form action="pasien-ruangan.php" method="POST">
                                        <div class="form-check form-check-inline float-end">
                                            <input type="hidden" name="edit_ruangan" value="<?= uniqid()?>">
                                            <select class="form-control form-control-sm ms-auto" required
                                                name='id_ruangan'>
                                                <option value="">Pilih Satu</option>
                                                <?php
                              $sql_master   = mysqli_query($host,"SELECT * FROM ruangan WHERE pelayanan ='Y'");
                              while($data_master = mysqli_fetch_array($sql_master)){
                            ?>
                                                <option value="<?= $data_master['id']?>"><?= $data_master['ruangan']?>
                                                </option>
                                                <?php
                              }
                            ?>
                                            </select>
                                            <button type="submit"
                                                class="btn btn-success btn-sm form-check-input">Save</button>
                                        </div>
                                    </form>
                                    <?php
                      }
                      ?>

                                </div>
                            </div>
                            <div class="row table-responsive">
                                <?php
                      if($data_pengguna['id_ruangan'] < 1){
                      }else{
                    ?>
                                <table id="example1" class="table table-sm table-hover">
                                    <thead>
                                        <tr>
                                            <th width="2%">#</th>
                                            <th width="32%">Identitas</th>
                                            <th width="32%">Administrasi</th>
                                            <th width="31%">Klinis</th>
                                            <th width="3%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                            $id_ruangan_saya    = $data_pengguna['id_ruangan'];
                            $no                 = 1;
                            $sql_pasien         = mysqli_query($host, "SELECT * FROM pasien_daftar_ruangan 
                                                    JOIN pasien_daftar on pasien_daftar.key_trx= pasien_daftar_ruangan.key_trx
                                                    JOIN pasien_db on pasien_db.nrm = pasien_daftar_ruangan.nrm
                                                    JOIN ruangan on ruangan.id = pasien_daftar_ruangan.id_ruangan
                                                    WHERE pasien_daftar_ruangan.keluar = '0' and id_ruangan = '$id_ruangan_saya'
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
                                                        <td>DPJP</td>
                                                        <td>:</td>
                                                        <td><?= dokter($data['dpjp'])?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Konsultasi</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?php
                                                            $key_trx_ini    = $data['key_trx'];
                                                            $cari_konsultan = mysqli_query($host,"SELECT * FROM pasien_dokter WHERE key_trx='$key_trx_ini'");
                                                            while($data_dokter_ini = mysqli_fetch_array($cari_konsultan)){
                                                            ?>
                                                            <li><?= dokter($data_dokter_ini['id_dokter'])?></li>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td>PA</td>
                                                        <td>:</td>
                                                        <td><?= $data['pa']?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>PP</td>
                                                        <td>:</td>
                                                        <td><?= perawat($data['pp'])?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dx Medis</td>
                                                        <td>:</td>
                                                        <td><?= dx_medis($data['dx_medis'])?></td>
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
                                                <a href="detail.php?key=<?= $data['has_pasien_daftar_ruangan'];?>"
                                                    class="btn btn-info btn-sm mb-1">Detail</a>
                                            </td>
                                        </tr>
                                        <?php
                                }
                            ?>
                                    </tbody>

                                </table>
                                <?php
                      }
                    ?>
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