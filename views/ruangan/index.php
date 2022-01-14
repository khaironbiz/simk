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
                    <?php
                    include("../core/security/admin-akses.php");
                    if($count_admin >0){
                        // include('modal/add-pasien.php');
                        // include('aksi/add-pasien.php');
                    }
                    ?>
                    <table id="example1" class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Instalasi</th>
                                <th>Ruangan</th>
                                <th>Kapasitas</th>
                                <th>Terisi</th>
                                <th>Sisa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            $id_ini         = $data_master['id'];
                            $sql_ruangan    = mysqli_query($host,"SELECT * FROM ruangan WHERE id_layanan ='$id_ini' ORDER BY id_instalasi ASC, id ASC");
                            while($data = mysqli_fetch_array($sql_ruangan)){
                            ?>
                            <tr>
                                <td width="10px"><?= $no++; ?></td>
                                <td>
                                  <?php
                                    $id_instalasi   = $data['id_instalasi'];
                                    $sql_instalasi= mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_instalasi'");
                                    $instalasi      = mysqli_fetch_array($sql_instalasi);
                                    echo $instalasi['nama_submaster']." --".$instalasi['id']
                                  ?>
                                </td>
                                <td>
                                  <?= $data['ruangan'];?>
                                  
                                </td>
                                <td><?= $data['kapasitas'];?></td>
                                <td></td>
                                <td></td>
                                <td>
                                  <a href="detail.php?key=<?= $data['has_ruangan'];?>" class="btn btn-info btn-sm">Detail</a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Instalasi</th>
                                <th>Ruangan</th>
                                <th>Kapasitas</th>
                                <th>Terisi</th>
                                <th>Sisa</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <a href=""><?= $data_pengguna['id_ruangan']?></a>
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