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
                <div class="card-body">
                    <?php
                    include("../core/security/admin-akses.php");
                    if($count_admin >0){
                        include('modal/add-dokter.php');
                        //include('aksi/add-pasien.php');
                    }
                    ?>
                    <table id="example1" class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Keahlian</th>
                                <th>Count Dokter</th>
                                <th>Pasien</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no             = 1;
                            $sql_master     = mysqli_query($host,"SELECT * FROM db_sub_master WHERE id_master = '32' ORDER BY nama_submaster ASC");
                            while($data_master    = mysqli_fetch_array($sql_master)){
                              $id_keahlian = $data_master['id'];
                              $sql_dokter = mysqli_query($host,"SELECT * FROM dokter WHERE keahlian='$id_keahlian' AND blokir ='0'");
                              $count_dokter= mysqli_num_rows($sql_dokter)
                            ?>
                            <tr>
                                <td><?= $no++;?></td>
                                <td><?= $data_master['nama_submaster']?></td>
                                <td><?= $count_dokter?></td>
                                <td></td>
                                <td><a href="#" class="btn btn-success btn-sm">Edit</a></td>
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