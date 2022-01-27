<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
            
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
                    include('aksi/edit-data-dasar.php');
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
                    <form action="" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <?php
                                include('menu/pasien-detail.php');
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="card-header bg-success text-center">
                                    <b>Pemutakhiran Data Dasar</b>
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class="col-md-6">
                                        <table class="table table-sm">
                                            <tr>
                                                <td width="150px">NRM</td>
                                                <td>
                                                    <input type="number" class="form-control form-control-sm" readonly value="<?= $nrm;?>" name="nrm">
                                                    <input type="hidden" class="form-control form-control-sm" readonly value="<?= $_GET['key'];?>" name="edit_data_dasar">
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nama</td>
                                                <td><input type="text" class="form-control form-control-sm" value="<?= ucwords(strtolower($data_pasien['nama_pasien']));?>" name="nama_pasien"></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>
                                                    <select class="form-control form-control-sm" name="sex">
                                                        <option value="<?= $data_pasien['sex'] ?>"><?= sub_master($data_pasien['sex'])?></option>
                                                        <?php
                                                        if($data_pasien['sex']==53){
                                                        ?>
                                                        <option value="54"><?= sub_master(54)?></option>
                                                        <?php
                                                        }else{
                                                        ?>
                                                        <option value="53"><?= sub_master(53)?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tgl Lahir</td>
                                                <td><input type="date" class="form-control form-control-sm" name="tgl_lahir" value="<?= $data_pasien['tgl_lahir'];?>"> </td>           
                                            </tr>
                                            <tr>
                                                <td>No KTP</td>
                                                <td><input type="number" class="form-control form-control-sm" name="nik" value="<?= $data_pasien['nik'];?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Status Menikah</td>
                                                <td>
                                                    <?php
                                                        $id_status_nikah     = $data_pasien['status_nikah'];
                                                        $sql_status_nikah    = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_status_nikah'");
                                                        $status_nikah        = mysqli_fetch_array($sql_status_nikah);
                                                    ?>
                                                    <select class="form-control form-control-sm" name="status_nikah">
                                                        <option value="<?= $id_status_nikah?>"><?= $status_nikah['nama_submaster']?></option>
                                                        <?php
                                                        $sql_nikah  = mysqli_query($host,"SELECT * FROM db_sub_master WHERE id_master='7'");
                                                        while($data_nikah= mysqli_fetch_array($sql_nikah)){
                                                        ?>
                                                        <option value="<?= $data_nikah['id']?>"><?= $data_nikah['nama_submaster']?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Agama</td>
                                                <td>
                                                    <?php
                                                        $id_agama     = $data_pasien['agama'];
                                                        $sql_agama    = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_agama'");
                                                        $agama        = mysqli_fetch_array($sql_agama);
                                                        $agama['nama_submaster'];
                                                    ?>
                                                    <select class="form-control form-control-sm" name="agama">
                                                        <option value="<?= $id_agama?>"><?= $agama['nama_submaster'];?></option>
                                                        <?php
                                                        $sql_aqama  = mysqli_query($host,"SELECT * FROM db_sub_master WHERE id_master='3'");
                                                        while($data_agama   = mysqli_fetch_array($sql_aqama)){
                                                        ?>
                                                        <option value="<?= $data_agama['id'];?>"><?= $data_agama['nama_submaster'];?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="150px">Pendidikan</td>
                                                <td>
                                                    
                                                    <select class="form-control form-control-sm" name="pendidikan">
                                                        <option value="<?= $data_pasien['pendidikan']?>"><?= sub_master($data_pasien['pendidikan'])?></option>
                                                        <?php
                                                        $sql_pendidikan  = mysqli_query($host,"SELECT * FROM db_sub_master WHERE id_master='26'");
                                                        while($data_pendidikan   = mysqli_fetch_array($sql_pendidikan)){
                                                        ?>
                                                        <option value="<?= $data_pendidikan['id']?>"><?= $data_pendidikan['nama_submaster']?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Pekerjaan</td>
                                                <td>
                                                    <select class="form-control form-control-sm" name="pekerjaan">
                                                        <option value="<?= $data_pasien['pekerjaan']?>"><?= sub_master($data_pasien['pekerjaan'])?></option>
                                                        <?php
                                                        $sql_pekerjaan      = mysqli_query($host,"SELECT * FROM db_sub_master WHERE id_master='31'");
                                                        while($data_pekerjaan   = mysqli_fetch_array($sql_pekerjaan)){
                                                        ?>
                                                        <option value="<?= $data_pekerjaan['id']?>"><?= $data_pekerjaan['nama_submaster']?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>No Telfon</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="number" name="telp" value="" placeholder="PSTN" class="form-control form-control-sm">
                                                        </div>
                                                        <div class="col-6">
                                                            <input type="number" name="hp" value="<?= $data_pasien['hp'];?>" placeholder="hp" class="form-control form-control-sm">
                                                        </div>
                                                    </div>
                                                </td>           
                                            </tr>
                                            
                                            <tr>
                                                <td>Email</td>
                                                <td><input type="email" name="email" class="form-control form-control-sm" placeholder="email" value="<?= $data_pasien['email'];?>"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-success">SIMPAN</button>
                                <a href="detail.php?key=<?= $_GET['key']?>" class="btn btn-danger">Kembali</a>
                                
                            </div>
                        </div>
                        <!-- /.card -->
                    </form>
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