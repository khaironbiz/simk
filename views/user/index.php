<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-6">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle w-30"
                      src="https://ppni.or.id/simk/id/image/<?= $data_pengguna['foto']?>"
                      alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $data_pengguna['nama']?></h3>

                <p class="text-muted text-center"><?= $data_pengguna['posisi']?></p>

                <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Kadaluarsa SIPP</b> <a class="float-right text-success"><?= $data_pengguna['sipp_ahir']?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Kadaluarsa STR</b> <a class="float-right text-success"><?= $data_pengguna['str_ahir']?></a>
                  </li>
                  <li class="list-group-item">
                    <b>SKP Tahun Ini</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>SKP Periode Ini</b> <a class="float-right">13,287</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                <?= $data_pengguna['pendidikan']?> <br><?= $data_pengguna['universitas']?><br><?= $data_pengguna['th_lulus']?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Adderess</strong>

                <p class="text-muted">
                  <?= $data_pengguna['alamat']?><br>
                  <?= kelurahan($data_pengguna['kel']).", ".kecamatan($data_pengguna['kec']).", ".kota($data_pengguna['kota']).", ".provinsi($data_pengguna['prop'])?>
                </p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <?= $data_pengguna['pk']?><br>
                  <?= $data_pengguna['jabfung']?>
                </p>

                <hr>

                <strong><i class="fas fa-bed"></i> Ruangan</strong>
                <p class="text-muted"><?= $data_pengguna['ruangan']?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-lg-9 col-md-8 col-sm-6">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#logbook" data-toggle="tab">Logbbook</a></li>
                  <li class="nav-item"><a class="nav-link" href="#jadwal" data-toggle="tab">Jadwal</a></li>
                  <li class="nav-item"><a class="nav-link" href="#laporan" data-toggle="tab">Laporan</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="logbook">
                    <h5>Logbook</h5>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="jadwal">
                    <h5>Jadwal</h5>
                    <?php
                    $max_date   = 31;
                    $max_bulan  = 12;
                    ?>
                    <div class="table-responsive">
                      <table class="table table-sm table-bordered">
                        <tr>
                          
                          <th rowspan="2" class="text-midle">Bulan</th>
                          <td colspan="<?= $max_date?>" class="text-center">Tanggal</td>
                        </tr>
                        <tr>
                          <?php
                          $tanggal_urut = 1;
                          while($tanggal_urut <= $max_date){
                          ?>
                          <td><?= str_pad($tanggal_urut++, 2, '0', STR_PAD_LEFT)?></td>
                          <?php
                          }
                          ?>
                        </tr>
                        <?php
                        $bulan_urut = 1;
                          while($bulan_urut <= $max_bulan){
                        ?>
                        <tr>
                          <td><?= str_pad($bulan_urut++, 2, '0', STR_PAD_LEFT)?></td>
                          <?php
                          $tanggal_urut_2 = 1;
                          while($tanggal_urut_2 <= $max_date){
                          ?>
                          <td></td>
                          <?php
                          }
                          ?>
                        </tr>
                          <?php
                          }
                          ?>
                      </table>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="laporan">
                    <h5>Laporan</h5>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>