<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1><?= $judul; ?></h1>
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
                      include('modal/tambah-pelaksana.php');
                      include('aksi/tambah-pelaksana.php');
                    }
                  ?>
                  
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Sub Bidang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no             = 1;
                        $id_sub_bidang  = $data_rs['id_rs_sub_bidang'];
                        $sql_data       = mysqli_query($host, "SELECT * FROM rs_area_pelaksana
                                        JOIN rs_sub_bidang on rs_sub_bidang.id_rs_sub_bidang=rs_area_pelaksana.id_sub_bidang 
                                        JOIN rs_bidang on rs_bidang.id_rs_bidang=rs_sub_bidang.id_bidang
                                        JOIN rs_direktorat on rs_direktorat.id_rs_direktorat=rs_sub_bidang.id_direktorat
                                        JOIN rs on rs.id_rs=rs_sub_bidang.id_rs
                                        WHERE rs_area_pelaksana.id_sub_bidang = '$id_sub_bidang' ORDER BY nama_area_pelaksana");
                        while($data = mysqli_fetch_array($sql_data)){
                        ?>
                        <tr>
                            <td width="10px"><?= $no++; ?></td>
                            <td><?= $data['nama_area_pelaksana'];?></td>
                            <td>
                                <a href="<?= $site_url ?>/unit/sub-sub-detail.php?id=<?= $data['has_rs_bidang']?>" class="btn btn-primary btn-sm">Detail</a>
                                <?php
                                    if($count_admin >0){
                                        include('modal/edit-sub-bidang.php');
                                        include('aksi/edit-sub-bidang.php');
                                        }
                                ?>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Sub Bidang</th>
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