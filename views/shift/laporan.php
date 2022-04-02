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
                        include('../layout/sub-menu/perawat/index.php');
                        ?>
                        </div>
                        
                        <div class="card-body">
                            <?php
                            include("../core/security/admin-akses.php");
                            if($count_admin >0){
                                // include('modal/add-pasien.php');
                                // include('aksi/add-pasien.php');
                            }
                            ?>
                            
                            <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-2 col-4">
                                    <input type="date" class="form-control" name="tanggal_awal" value="<?php if(isset($_POST['tanggal_awal'])){echo $_POST['tanggal_awal']; }?>">
                                </div>
                                -
                                <div class="col-md-2 col-4">
                                    <input type="date" class="form-control" name="tanggal_ahir" value="<?php if(isset($_POST['tanggal_ahir'])){echo $_POST['tanggal_ahir']; }?>">
                                </div>
                                <div class="col-md-2 col-3">
                                    <button type="submit" class="btn btn-danger">Cari</button>
                                </div>
                                
                            </div>
                            </form>
                            <hr>
                            <b>Laporan Penjadwalan</b>
                            <div class="row table-responsive">
                                <table class="table table-hover table-bordered table-sm">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>NIRA</th>
                                        <?php
                                        $no     = 1;
                                        $sql    = mysqli_query($host,"SELECT * FROM shift_perawat ORDER BY id");
                                        while($data = mysqli_fetch_array($sql)){
                                        ?>
                                        <th><?= $data['kode']?></th>
                                        <?php
                                        }
                                        ?>
                                        
                                    </tr>
                                        <?php
                                        $number         = 1;
                                        $ruanganku      = $data_pengguna['ruangan'];
                                        $sql_anggota    = mysqli_query($host,"SELECT nira.nama, nira.nira, nira.ruangan FROM nira WHERE blokir='N' AND ruangan='$ruanganku'");
                                        while($data_anggota = mysqli_fetch_array($sql_anggota)){
                                        ?>
                                    <tr>
                                        <td><?= $number++; ?></td>
                                        <td><?= $data_anggota['nama']?></td>
                                        <td><?= $data_anggota['nira']?></td>
                                        <?php
                                        $no             = 1;
                                        $sql            = mysqli_query($host,"SELECT * FROM shift_perawat ORDER BY id");
                                        while($data     = mysqli_fetch_array($sql)){
                                        $kode_shift     = $data['kode'];
                                        $nira_anggota   = $data_anggota['nira'];
                                        if(isset($_POST['tanggal_awal'])){
                                            $tanggal_awal   = $_POST['tanggal_awal'];
                                            $tanggal_ahir   = $_POST['tanggal_ahir'];
                                            $sql_count      = mysqli_query($host,"SELECT * FROM laporan_shift_perawat WHERE 
                                            (tgl BETWEEN '$tanggal_awal' AND '$tanggal_ahir' ) AND
                                            id_perawat      = '$nira_anggota' AND
                                            shift           = '$kode_shift'");
                        
                                        }else{
                                            $sql_count      = mysqli_query($host,"SELECT * FROM laporan_shift_perawat WHERE 
                                                            id_perawat      = '$nira_anggota' AND
                                                            shift           = '$kode_shift'");
                                        }
                                        
                                        $count_shift    = mysqli_num_rows($sql_count);
                                        ?>
                                        <td><?php if($count_shift){echo $count_shift;} ?></td>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                        <?php
                                        }
                                        ?>
                                </table>
                            </div>
                            
                            
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