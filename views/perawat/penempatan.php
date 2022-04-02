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
                include('aksi/pindah-ruangan.php');
                include('aksi/add-perawat.php');
                ?>
              </div>
                <div class="card-body table-responsive">
                    <?php
                    include("../core/security/admin-akses.php");
                    if($count_admin >0){
                        // include('modal/add-pasien.php');
                        // include('aksi/add-pasien.php');
                    }

                    if(id_ruangan($data_pengguna['ruangan']) =='NULL'){
                        echo "Ganti Ruangan";
                        
                    }else{
                        include('modal/add-perawat.php');
                        $ruangan_ini = $data_pengguna['ruangan'];
                    ?>

                    <!-- Button trigger modal -->
                    <br>
                    
                    <table id="example1" class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Status</th>
                                <th>Pendidikan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            $sql_layanan        = mysqli_query($host,"SELECT * FROM nira WHERE blokir ='N' and ruangan ='$ruangan_ini' ORDER BY nama ");
                            while($data         = mysqli_fetch_array($sql_layanan)){
                                $id_ruangan     = id_ruangan($data['ruangan']);
                                $has_ruangan    = has_ruangan($id_ruangan);
                            ?>
                            <tr>
                                <td width="10px"><?= $no++; ?></td>
                                <td><?= $data['nama']?><br><?= $data['nip']?></td>
                                <td><?= $data['posisi'];?><br><?= $data['pk']?></td>
                                <td><?= $data['kategori'];?><br><?= $data['jabfung']?></td>
                                <td><?= $data['pendidikan'];?></td>
                                <td>
                                  <!-- Button trigger modal -->
                                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal<?= $data['nira']?>">
                                    DELETE
                                  </button>
                                  <!-- Modal -->
                                  <div class="modal fade" id="modal<?= $data['nira']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <form action='' method='POST'>
                                      <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                          <h5 class="modal-title" id="staticBackdropLabel">Hapus</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" value="<?= $data['nama']?>" name="nama">
                                              
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">NIRA</label>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" value="<?= $data['nira']?>" name="nira">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                              <input type="checkbox" required value="<?= uniqid()?>" name="pindah_anggota"> Yakin memindahkan anggota ini
                                            </div>
                                          </div>
                                          
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-danger">DELETE</button>
                                        </div>
                                      </div>
                                      </form>
                                    </div>
                                  </div>
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
                                <th>Has</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
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