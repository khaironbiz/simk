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
                        // include('modal/add-pasien.php');
                        // include('aksi/add-pasien.php');
                    }

                    if(id_ruangan('Poliklinik Eksekutif') !=''){
                        echo id_ruangan('Poliklinik Eksekutif');
                    }
                    ?>
                    <table id="example1" class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Penempatan</th>
                                <th>ID</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            $sql_layanan        = mysqli_query($host,"SELECT * FROM nira WHERE blokir ='N' ORDER BY nama");
                            while($data         = mysqli_fetch_array($sql_layanan)){
                                if(id_ruangan($data['ruangan']) !='' | has_ruangan(id_ruangan($data['ruangan'])) !=''){
                                $id_ruangan     = id_ruangan($data['ruangan']);
                                $has_ruangan    = has_ruangan($id_ruangan);
                                }else{
                                    $id_ruangan = " error";
                                    $has_ruangan= "NULL";
                                }
                                
                            ?>
                            <tr>
                                <td width="10px"><?= $no++; ?></td>
                                <td><?= $data['nama']?></td>
                                <td><?= $data['ruangan'];?></td>
                                <td><?= $id_ruangan; ?></td>
                                <td><?= $has_ruangan; ?></td>
                                <td>
                                  <a href="index.php?admisi=<?= $data['has_ruangan']?>" class="btn btn-danger btn-sm">Daftar</a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Penempatan</th>
                                <th>ID</th>
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