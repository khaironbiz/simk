<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content mt-2">
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
                include('aksi/add-perawat.php');
                ?>
              </div>
                <div class="card-body table-responsive">
                    <?php
                    include("../core/security/admin-akses.php");
                    if($count_admin >0){
                        include('modal/mutasi/master-create.php');
                        include('aksi/mutasi/master.php');
                    }
                    ?>

                    <!-- Button trigger modal -->
                    <br>
                    
                    <table id="example1" class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Penempatan Baru</th>
                                <th>Antar Ruang</th>
                                <th>Keluar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            $sql_layanan        = mysqli_query($host,"SELECT * FROM penempatan_tanggal ORDER BY tanggal DESC ");
                            while($data         = mysqli_fetch_array($sql_layanan)){
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['tanggal']?></td>
                                <td><?php if($data['penempatan_baru'] >0){ ?><a href="#" class="btn btn-sm btn-info"><?= $data['penempatan_baru'];?> Perawat</a><?php } ?></td>
                                <td><?php if($data['mutasi'] >0){ ?><a href="mutasi-antar-ruang.php?key=<?= $data['has'] ?>" class="btn btn-sm btn-warning"><?= $data['mutasi'];?> Perawat</a><?php } ?></td>
                                <td><?php if($data['keluar'] >0){ ?><a href="#" class="btn btn-sm btn-danger"><?= $data['keluar'];?> Perawat</a><?php } ?></td>
                                <td>
                                    <?php
                                    include('modal/mutasi/master-edit.php');
                                    include('aksi/mutasi/master-edit.php');
                                    ?>
                                </td>
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