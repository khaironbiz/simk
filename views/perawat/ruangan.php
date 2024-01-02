<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content mt-2">
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
                include('../layout/sub-menu/perawat/index.php');
                ?>
              </div>
                <div class="card-body table-responsive">
                    <?php
                    include("../core/security/admin-akses.php");
                    if($count_admin >0){

                    }

                    if(id_ruangan($data_pengguna['ruangan']) =='NULL'){
                        echo "Ganti Ruangan";
                    }elseif(isset($_GET['nira'])){?>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <form action="" method="post">
                                <div class="card">
                                    <div class="card-header">
                                        <b>Edit Data Ruangan dan PK</b>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <label class="col-sm-4">Nama</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="nira">
                                                    <option value="<?= $_GET['nira'] ?>"><?= $nira['nama']?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <label class="col-sm-4">Ruangan</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="ruangan">
                                                    <?php
                                                    while($data_ruangan = mysqli_fetch_array($ruangan)){
                                                    ?>
                                                    <option value="<?= $data_ruangan['id']?>" <?php if($data_ruangan['id'] == $nira['id_ruangan']) echo "selected" ?>><?= $data_ruangan['ruangan']?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <label class="col-sm-4">Level PK</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="level_pk">
                                                    <?php
                                                    while($data_pk = mysqli_fetch_array($level_pk)){
                                                    ?>
                                                    <option value="<?= $data_pk['id']?>" <?php if($data_pk['id'] == $nira['id_pk']) echo "selected" ?>><?= $data_pk['nama_submaster'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <input name = "update_ruangan" type="checkbox" required>  Saya setuju update data diatas
                                        </div>




                                    </div>
                                    <div class="card-footer">
                                        <a href="?key=<?= $nira['id_ruangan']?>" class="btn btn-danger">Back</a>
                                        <button type="submit"  class="btn btn-success">Save</button>
                                    </div>
                                </div>
                                </form>

                            </div>

                        </div>
                        <?php
                    }elseif(isset($_GET['key'])) {?>
                            <b>Penempatan perawat</b>
                        <table id="example1"  class="table table-sm table-striped">
                            <thead>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Pendidikan</th>
                            <th>Level PK</th>
                            <td>Aksi</td>
                            </thead>
                            <tbody>
                            <?php
                            $id_ruangan = $_GET['key'];
                            $numb       = 1;
                            $sql_nira   = mysqli_query($host,"SELECT * FROM nira WHERE id_ruangan ='$id_ruangan' AND blokir ='N' order by id_pk DESC, nama ASC");
                            while ($data_nira = mysqli_fetch_array($sql_nira)){
                            ?>
                            <tr>
                                <td><?= $numb++ ?></td>
                                <td><?= $data_nira['nama'] ?></td>
                                <td><?= $data_nira['pendidikan'] ?></td>
                                <td><?= $data_nira['id_pk']." -- ".$data_nira['pk']?></td>
                                <td>
                                    <a href="?nira=<?= $data_nira['nira']?>" class="btn btn-sm btn-success">Edit</a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                            </tbody>

                        </table>
                        <a href="ruangan.php" class="btn btn-danger mt-3">Back</a>
                        <?php
                    }else{

                    ?>

                    <!-- Button trigger modal -->
                    <br>
                    <b>Penempatan Perawat Berdasarkan Ruangan dan PK</b>
                    <table id="example1" class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th rowspan="2">#</th>
                                <th rowspan="2" class="text-middle">Nama Ruangan</th>
                                <th colspan="6" class="text-center">Level PK</th>
                                <th rowspan="2" class="text-center">Count</th>
                                <th rowspan="2" class="text-center justify-content-center">Aksi</th>
                            </tr>
                            <tr>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                                <th>Pra PK</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            $sql_layanan        = mysqli_query($host,"SELECT * FROM ruangan ORDER BY id ");
                            while($data         = mysqli_fetch_array($sql_layanan)){
                                $id_ruangan     = $data['id'];
                                $sql_nira       = mysqli_query($host,"SELECT * FROM nira WHERE id_ruangan = '$id_ruangan'");
                                $count_ruangan_nira = mysqli_num_rows($sql_nira);
                            ?>
                            <tr>
                                <td width="10px"><?= $no++; ?></td>
                                <td><?= $data['ruangan'];?></td>
                                <?php
                                $sql_pk         = mysqli_query($host,"SELECT * FROM db_sub_master WHERE id_master = '14'");
                                while($data_pk  = mysqli_fetch_array($sql_pk)){
                                    $id_pk      = $data_pk['id'];
                                    $count_pk   = mysqli_num_rows(mysqli_query($host,"SELECT * FROM nira WHERE id_pk = '$id_pk' AND id_ruangan='$id_ruangan'"));
                                ?>
                                    <td><?= $count_pk ?></td>

                                <?php
                                }
                                $count_ruangan_nira = mysqli_num_rows(mysqli_query($host,"SELECT * FROM nira WHERE id_ruangan='$id_ruangan' AND id_pk !='0'"))
                                ?>
                                <td class="text-center"><?= $count_ruangan_nira ?></td>
                                <td class="text-center">
                                    <a href="?key=<?= $data['id'] ?>" class="btn btn-sm btn-info">Detail</a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <?php
                    }
                    ?>
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