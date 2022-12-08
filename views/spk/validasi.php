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
                <div class="card-header"></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <did class="row">
                                <div class="col-md-3">
                                    <label>Nama</label>
                                </div>
                                <div class="col-md-8">
                                    <b><?= $spk_detail['nama']?></b>
                                </div>
                            </did>
                            <did class="row">
                                <div class="col-md-3">
                                    <label>Level PK</label>
                                </div>
                                <div class="col-md-8">
                                    <b><?= $spk_detail['nama_submaster']?></b>
                                </div>
                            </did>
                            <did class="row">
                                <div class="col-md-3">
                                    <label>Date SPK</label>
                                </div>
                                <div class="col-md-8">
                                    <b><?= $spk_detail['tgl_surat']?></b>
                                </div>
                            </did>
                            <did class="row">
                                <div class="col-md-3">
                                    <label>SPK Expired</label>
                                </div>
                                <div class="col-md-8">
                                    <b><?= $spk_detail['tgl_exp']?></b>
                                </div>
                            </did>

                            <did class="row">
                                <div class="col-md-3">
                                    <label>STR</label>
                                </div>
                                <div class="col-md-8">
                                    <?= $spk_detail['str']?>
                                </div>
                            </did>
                            <did class="row">
                                <div class="col-md-3">
                                    <label>SIPP</label>
                                </div>
                                <div class="col-md-8">
                                    <?= $spk_detail['sipp']?>
                                </div>
                            </did>

                            <did class="row">
                                <div class="col-md-3">
                                    <label>SIPP Expired</label>
                                </div>
                                <div class="col-md-8">
                                    <?= $spk_detail['sipp_ahir']?>
                                </div>
                            </did>
                            <did class="row">
                                <div class="col-md-3">
                                    <label>ERROR</label>
                                </div>
                                <div class="col-md-8">
                                    <?php
                                    if($spk_detail['sipp_ahir'] < $spk_detail['tgl_exp']){
                                    ?>
                                    <h6>Tanggal SIPP lebih rendah dari tanggal spk</h6>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </did>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="checkbox" name="validasi_spk" value="1" required> Data Valid
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="active.php" class="btn btn-danger">Back</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">Valid</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="col-md-8">
                            <iframe src="https://rspon.net/ppni/assets/files/spk/<?= $spk_detail['file']?>" width="100%" height="1500px">
                        </div>
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