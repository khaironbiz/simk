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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            $sql        = mysqli_query($host,"SELECT DISTINCT(shift) FROM laporan_shift_perawat WHERE tgl = '$hari_ini'");
                            while($data = mysqli_fetch_array($sql)){
                              $shift    = $data['shift'];
                              $sql_shift= mysqli_query($host,"SELECT * FROM laporan_shift_perawat WHERE shift ='$shift' and tgl='$hari_ini'");
                              $count_shift= mysqli_num_rows($sql_shift);
                            ?>
                            <tr>
                                <td width="10px"><?= $no++; ?></td>
                                <td><?= $data['shift']?></td>
                                <td><?= $count_shift ?></td>
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