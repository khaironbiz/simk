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
                    
                    <table id="example1" class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NIRA</th>
                                <th>No SIPP</th>
                                <th>Masa Berlaku</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no         = 1;
                            $hari_ini   = date('Y-m-d');
                            $sql        = mysqli_query($host,"SELECT * FROM nira WHERE sipp_ahir < '$hari_ini' AND blokir ='N'");
                            
                            while($data = mysqli_fetch_array($sql)){
                                
                            ?>
                            <tr>
                                <td><?= $no++;?></td>
                                <td><?= $data['nama']?></td>
                                <td><?= $data['nira']?></td>
                                <td><?= $data['sipp']?></td>
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