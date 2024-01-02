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
                ?>
              </div>
                <div class="card-body table-responsive">
                    <?php
                    include("../core/security/admin-akses.php");
                    if($count_admin >0){
                        // include('modal/add-pasien.php');
                        // include('aksi/add-pasien.php');
                    }

                    if(id_ruangan($data_pengguna['ruangan']) =='NULL'){
                        echo "Ganti Ruangan";
                        
                    }else{

                    ?>

                    <!-- Button trigger modal -->
                    <br>
                    <b>Penempatan Perawat Berdasarkan Ruangan dan PK</b>
                    <table id="example1" class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th rowspan="2">#</th>
                                <th rowspan="2" class="text-middle">Nama Ruangan</th>
                                <th colspan="6" class="text-center">Level PK</th>
                                <th rowspan="2" class="text-center">Count</th>
                                <th rowspan="2" class="text-center justify-content-center">Aksi</th>
                            </tr>
                            <tr>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                                <th>Pra PK</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            $sql_layanan        = mysqli_query($host,"SELECT * FROM ruangan ORDER BY id ");
                            while($data         = mysqli_fetch_array($sql_layanan)){
                                $id_ruangan     = $data['id'];
                                $sql_nira       = mysqli_query($host,"SELECT * FROM nira WHERE id_ruangan = '$id_ruangan'");
                                $count_ruangan_nira = mysqli_num_rows($sql_nira);
                            ?>
                            <tr>
                                <td width="10px"><?= $no++; ?></td>
                                <td><?= $data['ruangan'];?></td>
                                <?php
                                $sql_pk         = mysqli_query($host,"SELECT * FROM db_sub_master WHERE id_master = '14'");
                                while($data_pk  = mysqli_fetch_array($sql_pk)){
                                    $id_pk      = $data_pk['id'];
                                    $count_pk   = mysqli_num_rows(mysqli_query($host,"SELECT * FROM nira WHERE id_pk = '$id_pk' AND id_ruangan='$id_ruangan'"));
                                ?>
                                    <td><?= $count_pk ?></td>

                                <?php
                                }
                                $count_ruangan_nira = mysqli_num_rows(mysqli_query($host,"SELECT * FROM nira WHERE id_ruangan='$id_ruangan' AND id_pk !='0'"))
                                ?>
                                <td class="text-center"><?= $count_ruangan_nira ?></td>
                                <td></td>
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