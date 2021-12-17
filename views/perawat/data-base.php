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
                    <table id="example1" class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Identitas</th>
                                <th>Pendidikan</th>
                                <th>Jenjang Karir</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no                   = 1;
                            $sql_perawat          = mysqli_query($host, "SELECT * FROM nira ORDER BY nama LIMIT 10");
                            while($data           = mysqli_fetch_array($sql_perawat)){
                            ?>
                            <tr>
                                <td width="10px"><?= $no++; ?></td>
                                <td>
                                  <table>
                                    <tr>
                                      <td>Nama</td>
                                      <td>:</td>
                                      <td><?= ucwords(strtolower($data['nama']));?></td>
                                    </tr>
                                    <tr>
                                      <td>NIRA</td>
                                      <td>:</td>
                                      <td><?= $data['nira'];?></td>
                                    </tr>
                                    <tr>
                                      <td>Jenis Kelamin</td>
                                      <td>:</td>
                                      <td><?= $data['sex'];?></td>
                                    </tr>
                                  </table>
                                </td>
                                <td></td>
                                <td>
                                  <?php
                                    $id_ruangan   = $data['id_ruangan'];
                                    $sql_ruangan  = mysqli_query($host, "SELECT * FROM ruangan WHERE id='$id_ruangan'");
                                    $ruangan      = mysqli_fetch_array($sql_ruangan);
                                    //echo $ruangan['ruangan']
                                  ?>
                                </td>
                                <td><?= $data['ttl'];?></td>
                                <td>
                                  
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>NRM</th>
                                <th>Nama perawat</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
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