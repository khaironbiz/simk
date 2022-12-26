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
              <div class="card-header bg-dark">
                <?php
                  include('../layout/sub-menu/perawat/index.php');
                ?>
              </div>

                <div class="card-body">
                    <?php
                    include("../core/security/admin-akses.php");
                    if($count_admin >0){
                        // include('modal/add-perawat.php');
                        // include('aksi/add-perawat.php');
                    }
                    ?>
                    <div class="table-responsive">
                      <table id="example1" class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NIRA</th>
                                <th>Nama Bank</th>
                                <th>Nomor Rekening</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no           = 1;
                            $sql_perawat  = mysqli_query($host, "SELECT * FROM nira JOIN rekening_perawat on rekening_perawat.id_perawat=nira.nira WHERE blokir = 'N' ORDER BY nama ");
                            while($data   = mysqli_fetch_array($sql_perawat)){
                            ?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?= $data['nama']?></td>
                                <td><?= $data['nira']?></td>
                                <td><?= $data['nama_bank']?></td>
                                <td><?= $data['no_rek']?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>

                    </table>
                    </div>
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