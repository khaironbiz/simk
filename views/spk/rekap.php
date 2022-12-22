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
                    include('../layout/sub-menu/perawat/kewenangan-klinis.php');
                    ?>
                </div>

                <div class="card-body">
                  <?php
                    include("../core/security/admin-akses.php");

                    if($count_admin >0){
                  ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <b>Status Kewenangan Klinis</b>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <label class="col-4">Aktif</label>
                                            <?php
                                            $today      = date('Y-m-d');
                                            $sql_nira   = mysqli_query($host,"SELECT * FROM nira WHERE blokir ='N' and exp_skk >= '$today'");
                                            $count      = mysqli_num_rows($sql_nira);
                                            ?>
                                            <div class="col-8">: <?= $count ?></div>
                                        </div>
                                        <div class="row">
                                            <label class="col-4">Non Aktif</label>
                                            <?php

                                            $sql_nira   = mysqli_query($host,"SELECT * FROM nira WHERE blokir ='N' and exp_skk < '$today'");
                                            $count      = mysqli_num_rows($sql_nira);
                                            ?>
                                            <div class="col-8">: <?= $count ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <b>Dokumen Legal</b>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <label class="col-4">Aktif</label>
                                            <?php
                                            $today      = date('Y-m-d');
                                            $sql_nira   = mysqli_query($host,"SELECT * FROM nira WHERE blokir ='N' and sipp_ahir >= '$today'");
                                            $count      = mysqli_num_rows($sql_nira);
                                            ?>
                                            <div class="col-8">: <?= $count ?></div>
                                        </div>
                                        <div class="row">
                                            <label class="col-4">Non Aktif</label>
                                            <?php

                                            $sql_nira   = mysqli_query($host,"SELECT * FROM nira WHERE blokir ='N' and sipp_ahir < '$today'");
                                            $count      = mysqli_num_rows($sql_nira);
                                            ?>
                                            <div class="col-8">: <?= $count ?></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <b>Level PK</b>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped table-sm">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Level</th>
                                                <th></th>
                                                <th>Count</th>
                                                <th>Detail</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no = 1;
                                            $sql_submaster  = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id_master = '14' ORDER BY grade ASC");
                                            while ($data    = mysqli_fetch_array($sql_submaster)){
                                                $id_pk      = $data['id'];
                                                $sql_nira   = mysqli_query($host,"SELECT * FROM nira WHERE spk_pk = '$id_pk' AND blokir ='N' ");
                                                $count_pk   = mysqli_num_rows($sql_nira);
                                            ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td class="w-50"><?= $data['nama_submaster']; ?></td>
                                                <td>:</td>
                                                <td><?= $count_pk; ?></td>
                                                <td>
                                                    <a href="?key=<?= $data['has'] ?>" class="btn btn-sm btn-primary">Detail</a>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php
                        if(isset($_GET['key'])){
                            $has_master     = $_GET['key'];
                            $sql_master     = mysqli_query($host,"SELECT * FROM db_sub_master WHERE has='$has_master'");
                            $data_master    = mysqli_fetch_array($sql_master);
                            $id_master      = $data_master['id'];
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-primary"><b><?= $data_master['nama_submaster'] ?></b></div>
                                    <div class="card-body table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>NIRA</th>
                                                <th>Ruangan</th>
                                                <th>Level</th>
                                                <th>Tgl SPK</th>
                                                <th>SPK Eksp</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                            $no     = 1;
                                            $sql    = mysqli_query($host,"SELECT * FROM nira WHERE spk_pk = '$id_master' ORDER BY nama ASC");
                                            while ($data_nira   = mysqli_fetch_array($sql)):
                                                ?>
                                                <tr>
                                                    <td><?= $no++?></td>
                                                    <td><?= $data_nira['nama']?></td>
                                                    <td><?= $data_nira['nira']?></td>
                                                    <td><?= $data_nira['ruangan']?></td>
                                                    <td><?= $data_master['nama_submaster']?></td>
                                                    <td><?= $data_nira['date_skk']?></td>
                                                    <td><?= $data_nira['exp_skk']?></td>
                                                </tr>
                                            <?php
                                            endwhile;
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                      <?php
                            }
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