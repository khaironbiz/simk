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
                        include('aksi/edit-kamar.php');
                    }
                    ?>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <form method="POST" action="">
                                    <h5 class="card-header">Edit Kamar <?= $judul; ?></h5>
                                    <div class="card-body">
                                        <table class="table">
                                            <tr>
                                                <td>Ruangan</td><td>:</td><td><?= $ruangan['ruangan']?></td>
                                                <input type="hidden" value="<?=$_GET['key']?>" class="form-control" name="edit-kamar">
                                            </tr>
                                            <tr>
                                                <td>Kelas Perawatan</td>
                                                <td>:</td>
                                                <td>
                                                    <select class="form-control" name="kelas_perawatan" required>
                                                        <option value="<?= $ruangan['id_kelas_perawatan']?>"><?= $ruangan['nama_submaster']?></option>
                                                        <?php
                                                            $sql_kelas  = mysqli_query($host,"SELECT * FROM db_sub_master WHERE id_master='25'");
                                                            while($data_kelas=mysqli_fetch_array($sql_kelas)){
                                                        ?>
                                                        <option value="<?= $data_kelas['id']?>"><?= $data_kelas['nama_submaster']?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Kamar</td>
                                                <td>:</td>
                                                <td><input type="text" class="form-control" name="no_kamar" value="<?= $ruangan['no_kamar']?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Kamar</td>
                                                <td>:</td>
                                                <td><input type="text" class="form-control" name="nama_kamar" value="<?= $ruangan['nama_kamar']?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="radio" name="blokir" value="1" required>
                                                    <label for="css">Tutup</label><br>
                                                    <input type="radio" name="blokir" value="0" required>
                                                    <label for="css">Buka</label><br>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <h5 class="card-header">Tambah Tempat Tidur</h5>
                                <div class="card-body">
                                    <table class="table table-sm">
                                        <tr>
                                            <td>Tempat Tidur</td>
                                            <td>:</td>
                                            <form method="POST" action="">
                                                <td>
                                                    <select class="form-control" name="nama_bed" required>
                                                        <option value="">pilih bed</option>
                                                        <option value="a">Bed A</option>
                                                        <option value="b">Bed B</option>
                                                        <option value="c">Bed C</option>
                                                        <option value="d">Bed D</option>
                                                        <option value="e">Bed E</option>
                                                    </select>
                                                    <input type="hidden" value="<?=$_GET['key']?>" name="add-bed" class="form-control">
                                                </td>
                                                <td><button type="submit" class="btn btn-success btn-sm">Tambah</button></td>
                                            </form>
                                        </tr>
                                        <tr>
                                            <td>Bed</td><td>:</td><td></td><td>Aksi</td>
                                        </tr>
                                        <?php
                                        $urut       = 1;
                                        $id_kamar   = $ruangan['id_kamar'];
                                        $sql_bed    = mysqli_query($host,"SELECT * FROM ruangan_kamar_bed WHERE id_kamar='$id_kamar'");
                                        while($data_bed=mysqli_fetch_array($sql_bed)){
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $urut++?></td>
                                            <td><?= "Bed ".ucwords($data_bed['nama_bed'])?></td>
                                            <td>
                                                <?php
                                                    if($data_bed['blokir']==1){
                                                        $label_bed  = "btn-danger";
                                                        $status_bed = "Tutup";
                                                        include('modal/edit-bed.php');
                                                        include('aksi/edit-bed.php');
                                                    }elseif($data_bed['blokir']==0){
                                                        $label_bed  = "btn-success";
                                                        $status_bed = "Buka";
                                                        include('modal/edit-bed.php');
                                                        include('aksi/edit-bed.php');
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href=""><?= $user_check;?></a>
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