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
                        include('modal/realisasi-shift.php');
                        include('aksi/realisasi-shift.php');
                    }
                    $hari_ini = date('Y-m-d');
                    echo $hari_ini
                    ?>
                    <table id="example1" class="table table-sm table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Shift</th>
                            <th>Count</th>
                            <th>Mulai Laporan</th>
                            <th>Ahir Laporan</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id_ruangan = id_ruangan($data_pengguna['ruangan']);
                            $no=1;
                            $sql        = mysqli_query($host,"SELECT DISTINCT(shift) FROM laporan_shift_perawat WHERE tgl = '$hari_ini' AND hadir='Y' AND id_ruangan ='$id_ruangan'");
                            while($data = mysqli_fetch_array($sql)){
                              $shift    = $data['shift'];
                              $masuk    = $hari_ini." ". masuk_shift($shift);
                              $sql_shift= mysqli_query($host,"SELECT * FROM laporan_shift_perawat WHERE shift ='$shift' and tgl='$hari_ini' AND id_ruangan ='$id_ruangan'");
                              $count_shift= mysqli_num_rows($sql_shift);
                              $time_masuk = strtotime($masuk);
                              $time_keluar= $time_masuk+(60*60*12);
                              $jam_selesai = date('Y-m-d H:i:s',$time_keluar)
                            ?>
                            <tr>
                                <td width="10px"><?= $no++; ?></td>
                                <td><?= $data['shift']?></td>
                                <td><?= $count_shift; ?></td>
                                <td><?= $masuk ?></td>
                                <td><?= $jam_selesai ?></td>
                                <td>
                                  <a href="index.php?admisi=<?= $data['has']?>" class="btn btn-danger btn-sm">Daftar</a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>#</th>
                            <th>Shift</th>
                            <th>Count</th>
                            <th>Mulai Laporan</th>
                            <th>Ahir Laporan</th>
                            <th>Aksi</th>
                          </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-header bg-black">
                <b>Perawat Libur/Tidak Hadir</b>
              </div>
              <div class="card-body">
                <table class="table table-sm table-hover">
                  <tr>
                    <th>No</th>
                    <th>Jenis Tidak Hadir</th>
                    <th>Count</th>
                    <th>Aksi</th>
                  </tr>
                  <?php
                    $sql_tidak_hadir    =  mysqli_query($host,"SELECT DISTINCT(shift) FROM laporan_shift_perawat WHERE tgl = '$hari_ini' AND hadir='N' AND id_ruangan ='$id_ruangan'");
                    $y                  = 1;
                    while ($tidak_hadir = mysqli_fetch_array($sql_tidak_hadir)){
                      $kode_shift       = $tidak_hadir['shift'];
                      $sql_shift        = mysqli_query($host,"SELECT * FROM laporan_shift_perawat WHERE shift ='$kode_shift' and tgl='$hari_ini' AND id_ruangan ='$id_ruangan'");
                      $count_shift      = mysqli_num_rows($sql_shift);
                      $count_tidak_hadir= count_shift($tidak_hadir['shift'])
                  ?>
                  <tr>
                    <td><?= $y++?></td>
                    <td><?= $tidak_hadir['shift']?></td>
                    <td><?= $count_shift ?></td>
                    <td></td>
                  </tr>
                  <?php
                    }
                  ?>
                </table>
              </div>
            </div>
            <div class="card">
              <div class="card-header bg-danger">
                <b>Belum Diinput</b>
              </div>
              <div class="card-body">
              </div>
            </div>
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