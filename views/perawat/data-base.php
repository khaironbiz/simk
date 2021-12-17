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
                  include('menu/index.php');
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
                                <th>Identitas</th>
                                <th>Jenjang Karir</th>
                                <th>Pendidikan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no           = 1;
                            $sql_perawat  = mysqli_query($host, "SELECT * FROM nira WHERE blokir = 'N' ORDER BY nama ");
                            while($data   = mysqli_fetch_array($sql_perawat)){
                            ?>
                            <tr>
                                <td width="10px"><?= $no++; ?></td>
                                <td>
                                  <div class="row">
                                    <label class="col-sm-4">Nama</label>
                                    <div class="col-sm-8">
                                      <?= ucwords(strtolower($data['nama']));?>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <label class="col-sm-4">NIRA</label>
                                    <div class="col-sm-8">
                                      <?= $data['nira'];?>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <label class="col-sm-4">JK</label>
                                    <div class="col-sm-8">
                                      <?= $data['sex'];?>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <label class="col-sm-4">Tgl Lahir</label>
                                    <div class="col-sm-8">
                                      <?= $data['ttl'];?>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <div class="row">
                                    <label class="col-sm-3">Jabfung</label>
                                    <div class="col-sm-9">
                                      <?= $data['jabfung'];?>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <label class="col-sm-3">PK</label>
                                    <div class="col-sm-9">
                                      <?= $data['pk'];?>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <label class="col-sm-3">Posisi</label>
                                    <div class="col-sm-9">
                                      <?= $data['posisi'];?>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <label class="col-sm-3">Ruangan</label>
                                    <div class="col-sm-9">
                                      <?= $data['ruangan'];?>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <div class="row">
                                    <label class="col-sm-3">Pendidikan</label>
                                    <div class="col-sm-9">
                                      <?= ucwords(strtolower($data['pendidikan']));?>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <label class="col-sm-3">Institusi</label>
                                    <div class="col-sm-9 text-sm">
                                      <?= ucwords(strtolower($data['universitas']));?>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <label class="col-sm-3">Ijazah</label>
                                    <div class="col-sm-9">
                                      <?= $data['no_ijazah'];?>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <label class="col-sm-3">Tahun Lulus</label>
                                    <div class="col-sm-9">
                                      <?= $data['th_lulus'];?>
                                    </div>
                                  </div>
                                </td>
                                
                                <td>
                                  <a class="btn btn-success btn-sm" href="#">Update</a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Identitas</th>
                                <th>Jenjang Karir</th>
                                <th>Pendidikan</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
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