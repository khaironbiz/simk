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

                            <form action="" method="post">
                                <did class="row">
                                    <div class="col-md-3">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" name="edit_spk" required>
                                            <option value="<?= $spk_detail['has']?>"><?= $spk_detail['nama']?></option>
                                        </select>
                                    </div>
                                </did>
                                <did class="row mt-1">
                                    <div class="col-md-3">
                                        <label>Level PK</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" name="level_pk" required>
                                            <option value="">----</option>
                                            <?php
                                            $sql_db_master= mysqli_query($host,"SELECT * FROM db_sub_master WHERE id_master = '14' ORDER BY grade ASC");
                                            while($data_sub_master = mysqli_fetch_array($sql_db_master)):
                                            ?>
                                            <option value="<?= $data_sub_master['id']?>" <?php if($spk_detail['spk_pk'] == $data_sub_master['id']): echo "selected"; endif;?> ><?= $data_sub_master['nama_submaster']?> </option>
                                            <?php
                                                endwhile;
                                            ?>
                                        </select>
                                    </div>

                                </did>
                                <did class="row mt-1">
                                    <div class="col-md-3">
                                        <label>Date SPK</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control" value="<?= $spk_detail['tgl_surat']?>" name="tgl_surat">

                                    </div>
                                </did>
                                <did class="row mt-1">
                                    <div class="col-md-3">
                                        <label>SPK Expired</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control" value="<?= $spk_detail['tgl_exp']?>" name="tgl_exp">
                                    </div>
                                </did>
                                <div class="row mt-2">
                                    <div class="col-md-8">
                                        <input type="checkbox" name="validasi_spk" value="1" required> Dengan ini saya setuju update data
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <a href="file.php" class="btn btn-danger">Back</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success">Update</button>
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