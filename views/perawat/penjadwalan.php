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
                include('../layout/sub-menu/perawat/index.php');
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
                            <th>Hari Ini</th>
                            <th>Bulan Ini</th>
                            <th>Tahun Ini</th>
                            <th>Mulai Laporan</th>
                            <th>Ahir Laporan</th>
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
                                <td><?= nama_shift($data['shift'])?></td>
                                <td><?= $count_shift; ?></td>
                                <td></td>
                                <td></td>
                                <td><?= $masuk ?></td>
                                <td><?= $jam_selesai ?></td>
                                
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                        
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-header bg-black">
                <div class="row">
                  <div class="col-6">
                    <b>Perawat Libur/Tidak Hadir</b>
                  </div>
                  <div class="col-6 text-right">
                    
                  </div>
                </div>
              </div>
              <div class="card-body">
                <?php
                    include('aksi/tidak-hadir.php');
                    include('modal/tidak-hadir.php');
                ?>
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
                    <td><?= nama_shift($tidak_hadir['shift'])?></td>
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
              <div class="card-header bg-success">
                <b>Realisasi Hari Ini</b>
              </div>
              <div class="card-body">
                <table class="table table-sm table-hover table-bordered">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIRA</th>
                    <?php
                    $id_ruangan = id_ruangan($data_pengguna['ruangan']);
                    $sql        = mysqli_query($host,"SELECT DISTINCT(shift) FROM laporan_shift_perawat WHERE tgl = '$hari_ini' AND id_ruangan ='$id_ruangan'");
                    while($kode_shift = mysqli_fetch_array($sql)){
                      $kode_shift_ini = $kode_shift['shift'];
                    ?>
                    <th><?= $kode_shift_ini ?></th>
                    <?php
                    }
                    ?>
                    
                  </tr>
                  <?php
                  $ruanganku            = $data_pengguna['ruangan'];
                  $num                  = 1;
                  $sql_perawat_ruangan  = mysqli_query($host,"SELECT * FROM nira WHERE ruangan = '$ruanganku' and blokir='N' ORDER BY nama ASC");
                  while($data_perawat_ruangan = mysqli_fetch_array($sql_perawat_ruangan)){
                  $nira_perawat         = $data_perawat_ruangan['nira'];
                  ?>
                  <tr>
                    <td><?= $num++?></td>
                    <td><?= $data_perawat_ruangan['nama']?></td>
                    <td><?= $nira_perawat; ?></td>
                    <?php
                    $id_ruangan       = id_ruangan($data_pengguna['ruangan']);
                    $sql              = mysqli_query($host,"SELECT DISTINCT(shift) FROM laporan_shift_perawat WHERE tgl = '$hari_ini' AND id_ruangan ='$id_ruangan'");
                    while($data_ini   = mysqli_fetch_array($sql)){
                      $shift_ini      = $data_ini['shift'];
                      $sql_count_ini  = mysqli_query($host,"SELECT * FROM laporan_shift_perawat WHERE tgl='$hari_ini'  AND shift='$shift_ini' AND id_perawat ='$nira_perawat'");
                      $count_ini      = mysqli_num_rows($sql_count_ini);
                      $data_shift_ini = mysqli_fetch_array($sql_count_ini)
                    ?>
                    <td><?php if($count_ini>0){include('modal/edit-shift.php');} ?></td>
                    
                    <?php
                    }
                    ?>
                    
                  </tr>
                  <?php
                  }
                  ?>
                </table>
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