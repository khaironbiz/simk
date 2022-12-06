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
                    if($count_admin > 0){
                        include('modal/mutasi/mutasi-antar-ruang.php');
                        include('aksi/mutasi/mutasi-antar-ruang.php');
                    }
                    ?>

                    <!-- Button trigger modal -->
                    <br>
                    <h4>Tanggal Penempatan : <?= $data_pemempatan['tanggal']?></h4>
                    <table id="example1" class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NIRA</th>
                                <th>Ruangan Asal</th>
                                <th>Ruangan Tujuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            $id_penempatan      = $data_pemempatan['id'];
                            $sql_penempatan     = mysqli_query($host,"SELECT * FROM penempatan_detail 
                                                        JOIN penempatan_tanggal on penempatan_detail.id_penempatan = penempatan_tanggal.id
                                                        JOIN nira on nira.nira=penempatan_detail.id_perawat         
                                                        JOIN ruangan on ruangan.id=penempatan_detail.ruangan_asal
                                                        WHERE penempatan_detail.id_penempatan='$id_penempatan'
                                                        ORDER BY penempatan_detail.id DESC ");
                            while($data_penempatan    = mysqli_fetch_array($sql_penempatan)){
                                $id_ruangan     = $data_penempatan['ruangan_baru'];
                                $ruangan_query  = mysqli_query($host,"SELECT * FROM ruangan WHERE id='$id_ruangan'");
                                $ruangan_data   = mysqli_fetch_array($ruangan_query);
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data_penempatan['nama']?></td>
                                <td><?= $data_penempatan['nira']?></td>
                                <td><?= $data_penempatan['ruangan']?></td>
                                <td><?= $ruangan_data['ruangan']?></td>
                                <td><a href="#" class="btn btn-info btn-sm">Detail</a></td>
                            </tr>
                            <?php
                                }
                                $count = mysqli_num_rows($sql_penempatan);
                            if($count <1){
                                echo "<tr><td class='text-center' colspan='6'>Data Not Found</td></tr>";
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