<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <?php
                include('aksi/add-rencana.php');
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
                <div class="card mt-2">
                    <form action="" method="POST">
                        <input type="hidden" name="add_perencanaan" value="<?= uniqid()?>">
                    <div class="card-header bg-dark">
                        <b>Jenjang Jabatan Fungsional</b>
                    </div>
                    <div class="card-body">
                        <?php
                        include("../core/security/admin-akses.php");
                        if($count_admin >0){
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Jabatan</label>
                                <table class="table table-sm">
                                    <tr>
                                        <th>#</th>
                                        <th>Jenjang</th>
                                        <th>Rumpun</th>
                                        <th>Detail</th>
                                    </tr>
                                    <?php
                                    $norut          = 1;
                                    $sql_jabfung    = mysqli_query($host,"SELECT * FROM jabfung_ak_master ORDER BY id");
                                    while($data_jabfung = mysqli_fetch_array($sql_jabfung)){
                                    ?>
                                    <tr>
                                        <td><?= $norut++?></td>
                                        <td><?= $data_jabfung['level']?></td>
                                        <td><?= $data_jabfung['rumpun']?></td>
                                        <td>
                                            <a href="?key=<?= $data_jabfung['nama_lain'] ?>" class="btn btn-info btn-sm">Detail</a>
                                        </td>
                                    </tr>
                                    
                                    <?php
                                    }
                                    ?>
                                </table>
                                
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                    if(isset($_GET['key'])){
                                ?>
                                <label><?= $_GET['key']?></label>
                                <table class="table table-sm table-hover"> 
                                    <tr>
                                        <th>#</th>
                                        <th>Kegiatan</th>
                                        <th>Kredit</th>
                                        <th>Detail</th>
                                    </tr>
                                    
                                    <?php
                                    $id                 = 1;
                                    $jabatan            = $_GET['key'];
                                    $sql_sub_unsur     = mysqli_query($host,"SELECT DISTINCT(sub_unsur) FROM jabfung_ak WHERE jabatan='$jabatan'");
                                    while($data_sub_unsur    = mysqli_fetch_array($sql_sub_unsur)){
                                        $sub_unsur=$data_sub_unsur['sub_unsur'];
                                        $sql_jenis      = mysqli_query($host,"SELECT DISTINCT(jenis) FROM jabfung_ak WHERE 
                                                            sub_unsur   ='$sub_unsur' AND jabatan='$jabatan'");
                                    ?>
                                    <tr>
                                        <td><?= $id++ ?></td>
                                        <td><b><?= $data_sub_unsur['sub_unsur']?></b></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                    while($data_jenis = mysqli_fetch_array($sql_jenis)){
                                        $jenis = $data_jenis['jenis'];
                                        $sql_uraian = mysqli_query($host,"SELECT * FROM jabfung_ak WHERE 
                                                            sub_unsur   ='$sub_unsur' AND 
                                                            jenis       = '$jenis' AND 
                                                            jabatan='$jabatan' ")
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <b><?= $data_jenis['jenis']?></b>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                    
                                        while($uraian = mysqli_fetch_array($sql_uraian)){
                                    ?>  
                                    <tr>
                                        <td></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="<?= $uraian['id']?>" name="id_jabfung[]">
                                                <label class="form-check-label">
                                                    <?= $uraian['uraian']?>
                                                </label>
                                            </div>
                                        </td>
                                        <td><?= $uraian['ak']?></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                        }
                                    }
                                    }
                                    ?>
                                </table>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="col-md-6">
                                <?php
                                if(isset($_GET['key'])){
                                    $key    = $_GET['key'];
                                    $cari_rumpun    = mysqli_query($host,"SELECT * FROM jabfung_ak_master WHERE nama_lain ='$key'");
                                    $data_rumpun    = mysqli_fetch_array($cari_rumpun);
                                ?>
                                <label>Semua Jenjang</label>
                                <table class="table table-sm table-hover">
                                    <tr>
                                        <th>#</th>
                                        <th>Kegiatan</th>
                                        <th>Kredit</th>
                                        <th>Detail</th>
                                    </tr>
                                    <?php
                                    $umum               = 1;
                                    $jabatan            = "Semua jenjang";
                                    $ranah              = $data_rumpun['rumpun'];
                                    $sql_sub_unsur      = mysqli_query($host,"SELECT DISTINCT(sub_unsur) FROM jabfung_ak WHERE jabatan='$jabatan' and ranah = '$ranah'");
                                    while($data_sub_unsur    = mysqli_fetch_array($sql_sub_unsur)){
                                        $sub_unsur=$data_sub_unsur['sub_unsur'];
                                        $sql_jenis      = mysqli_query($host,"SELECT DISTINCT(jenis) FROM jabfung_ak WHERE 
                                                            sub_unsur   ='$sub_unsur' AND jabatan='$jabatan' and ranah = '$ranah'");
                                    ?>
                                    <tr>
                                        <td><?= $umum++ ?></td>
                                        <td><b><?= $data_sub_unsur['sub_unsur']?></b></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                    while($data_jenis = mysqli_fetch_array($sql_jenis)){
                                        $jenis = $data_jenis['jenis'];
                                        $sql_uraian = mysqli_query($host,"SELECT * FROM jabfung_ak WHERE 
                                                            sub_unsur   ='$sub_unsur' AND 
                                                            jenis       = '$jenis' AND 
                                                            jabatan='$jabatan' and ranah = '$ranah' ")
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <b><?= $data_jenis['jenis']?></b>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                    
                                        while($uraian = mysqli_fetch_array($sql_uraian)){
                                    ?>  
                                    <tr>
                                        <td></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="<?= $uraian['id']?>" name="id_jabfung[]">
                                                <label class="form-check-label">
                                                    <?= $uraian['uraian']?>
                                                </label>
                                            </div>
                                        </td>
                                        <td><?= $uraian['ak']?></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                        }
                                    }
                                    }
                                    ?>
                                </table>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                    </div>
                    </form>
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