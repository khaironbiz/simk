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
              <div class="card-header">
                <div class="card-body">
                  <?php
                    include("../core/security/admin-akses.php");
                    if($count_admin >0){
                  ?>
                    <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                  Tambah Data
                  </button>
                  <?php
                    }
                  ?>
                  <!-- Modal -->
                  <form action="" method="POST">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-3 col-form-label">Jenis Regulasi</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputPassword3" name="regulasi_jenis">
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  <?php
                  //include('aksi/jenis-regulasi.php');
                  ?>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Rentang Usia</th>
                        <th>Count </th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
                      $th_20      = date('Y-m-d', strtotime('-20 year', strtotime(date('Y-m-d'))));
                      $th_25      = date('Y-m-d', strtotime('-25 year', strtotime(date('Y-m-d'))));
                      $th_30      = date('Y-m-d', strtotime('-30 year', strtotime(date('Y-m-d'))));
                      $th_35      = date('Y-m-d', strtotime('-35 year', strtotime(date('Y-m-d'))));
                      $th_40      = date('Y-m-d', strtotime('-40 year', strtotime(date('Y-m-d'))));
                      $th_50      = date('Y-m-d', strtotime('-50 year', strtotime(date('Y-m-d'))));
                      $th_60      = date('Y-m-d', strtotime('-60 year', strtotime(date('Y-m-d'))));
                      $no         = 1;
                      $sql_20_25  = mysqli_query($host, "SELECT * FROM nira where blokir ='N' and ttl between '$th_25' and '$th_20' ");
                      $sql_25_30  = mysqli_query($host, "SELECT * FROM nira where blokir ='N' and ttl between '$th_30' and '$th_25' ");
                      $sql_30_40  = mysqli_query($host, "SELECT * FROM nira where blokir ='N' and ttl between '$th_40' and '$th_30'");
                      $sql_40_50  = mysqli_query($host, "SELECT * FROM nira where blokir ='N' and ttl between '$th_50' and '$th_40'");
                      $sql_50_60  = mysqli_query($host, "SELECT * FROM nira where blokir ='N' and ttl between '$th_60' and '$th_50'  ");
                      $sql_30_35  = mysqli_query($host, "SELECT * FROM nira where blokir ='N' and ttl between '$th_35' and  '$th_30'");
                      //$count_20_30  = mysqli_num_rows($sql_20_30);
                      ?>
                      <tr>
                        <td width="10px">1</td>
                        <td> Usia 20-25 Tahun</td>
                        <td><?= mysqli_num_rows($sql_20_25);?></td>
                        <td><a href="detail.php?has=<?= $th_25 ?>&key=<?= $th_20 ?>" class="btn btn-success btn-sm"><?= $th_25 ?></a></td>
                      </tr>
                      <tr>
                        <td width="10px">1</td>
                        <td> Usia 25-30 Tahun</td>
                        <td><?= mysqli_num_rows($sql_25_30);?></td>
                        <td><a href="detail.php?has=<?= $th_30 ?>&key=<?= $th_25 ?>" class="btn btn-success btn-sm"><?= $th_30 ?></a></td>
                      </tr>
                      <tr>
                        <td width="10px">2</td>
                        <td> Usia 30-40 Tahun</td>
                        <td><?= mysqli_num_rows($sql_30_40)?></td>
                        <td><a href="detail.php?has=<?= $th_40 ?>&key=<?= $th_30 ?>" class="btn btn-success btn-sm"><?= $th_40 ?></a></td>
                      </tr>
                      <tr>
                        <td width="10px">3</td>
                        <td> Usia 40-50 Tahun</td>
                        <td><?= mysqli_num_rows($sql_40_50)?></td>
                        <td><a href="detail.php?has=<?= $th_50 ?>&key=<?= $th_40 ?>" class="btn btn-success btn-sm"><?= $th_50 ?></a></td>
                      </tr>
                      <tr>
                        <td width="10px">4</td>
                        <td> Usia 50-60 Tahun</td>
                        <td><?= mysqli_num_rows($sql_50_60)?></td>
                        <td><a href="detail.php?has=<?= $th_60 ?>&key=<?= $th_50 ?>" class="btn btn-success btn-sm"><?= $th_60 ?></a></td>
                      </tr>
                      <?php
                        // }
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