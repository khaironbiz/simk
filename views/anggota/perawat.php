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
            <div class="card">
              <div class="card-header">
                
                <button type="button" class="btn btn-primary">Tambah Anggota</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>NIRA</th>
                    <th>KTP</th>
                    <th>NPWP</th>
                    <th>NIP</th>
                    <th>Pendidikan</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no           = 1;
                    $sql_perawat  = mysqli_query($host, "SELECT * FROM nira WHERE blokir='N' ORDER BY nama ASC");
                    while($data   = mysqli_fetch_array($sql_perawat)){
                    ?>
                    <tr>
                      <td width="10px"><?= $no++; ?></td>
                      <td><?= $data['nama'];?></td>
                      <td><?= $data['nira'];?></td>
                      <td>'<?= $data['ktp'];?></td>
                      <td>#<?= $data['npwp'];?></td>
                      <td>#<?= $data['nip'];?></td>
                      <td><?= $data['pendidikan'];?></td>
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