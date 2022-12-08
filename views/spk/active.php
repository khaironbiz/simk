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
                <!-- Modal -->
                <table id="example1" class="table table-sm table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>NIRA</th>
                        <th>Tanggal SPK</th>
                        <th>Tanggal Exp</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $date_now           = date('Y-m-d');
                        $no                 = 1;
                        $sql_data           = mysqli_query($host, "SELECT * FROM spk_perawat 
                                                            JOIN nira on nira.nira=spk_perawat.id_perawat 
                                                            
                                                            WHERE spk_perawat.tgl_exp > '$date_now' AND spk_perawat.validator ='' ORDER BY nira.nama ASC");
                        while($data_ini     = mysqli_fetch_array($sql_data)){
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data_ini['nama'];?></td>
                            <td><?= $data_ini['nira'];?></td>
                            <td><?= $data_ini['tgl_surat'];?></td>
                            <td><?= $data_ini['tgl_exp'];?></td>
                            <td><a href="<?= $site_url ?>/spk/validasi.php?key=<?= $data_ini['has']; ?>" class="btn btn-sm btn-info">Detail</a></td>
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