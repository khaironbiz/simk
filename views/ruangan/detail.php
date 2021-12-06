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
                        
                        <tbody>
                            <?php
                            $no=1;
                            $id_ruangan = $ruangan['id'];
                            $sql_room   = mysqli_query($host,"SELECT * FROM room WHERE id_ruangan='$id_ruangan'");
                            while($data = mysqli_fetch_array($sql_room)){
                                $id_kelas   = $data['id_kelas'];
                                if($id_kelas >0){
                                    $sql_kelas  = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_kelas'");
                                    $data_kelas = mysqli_fetch_array($sql_kelas);
                                }
                            ?>
                            <tr>
                                <td width="10px"><?= $no++; ?></td>
                                <td>
                                    <?= $data['nama_kamar']." - ";?>
                                    <?php if($id_kelas>0){echo $data_kelas['nama_submaster'];}else{}?>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                  <a href="detail.php?key=<?= $data['has_ruangan'];?>" class="btn btn-info btn-sm">Detail</a>
                                </td>
                            </tr>
                            <?php
                                $id_kamar   = $data['id_kamar'];
                                $sql_bed    = mysqli_query($host,"SELECT * FROM room_bed WHERE id_kamar='$id_kamar'");
                                while($data_bed     = mysqli_fetch_array($sql_bed)){
                            ?>
                            <tr>
                                <td></td>
                                <td><?= $data_bed['nama_bed']?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                        
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