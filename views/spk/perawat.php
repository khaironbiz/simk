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
                  <table id="example1" class="table table-sm table-bordered table-striped">
                    <thead>
                      <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>NIRA</th>
                          <th>Level PK</th>
                          <th>Tgl SPK</th>
                          <th>EXP SPK</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no       = 1;
                      $now      = date('Y-m-d');
                      $sql_spk  = mysqli_query($host, "SELECT * FROM nira 
                                    LEFT JOIN db_sub_master on nira.spk_pk=db_sub_master.id
                                            
                                    WHERE nira.blokir ='N' ORDER BY nira.nama ASC");
                      while($data = mysqli_fetch_array($sql_spk)){
//
                      ?>
                      <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $data['nama']; ?></td>
                          <td><?= $data['nira']; ?></td>
                          <td><?= $data['nama_submaster']?></td>
                          <td><?= $data['date_skk']; ?></td>
                          <td>
                              <?php
                              if($data['exp_skk'] < $now){
                                  echo "<button class='btn btn-sm btn-danger'>Segera Kredensial</button>";
                              }else{
                                  echo $data['exp_skk'];
                              }
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