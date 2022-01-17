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
                            <b>Master Shift</b>
                        </div>
                        <div class="card-body">
                            <?php
                            include("../core/security/admin-akses.php");
                            if($count_admin >0){
                                // include('modal/add-pasien.php');
                                // include('aksi/add-pasien.php');
                            }
                            ?>
                            <table class="table table-hover table-sm">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Shift</th>
                                    <th>Kode Shift</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                    <th>Jam Kerja</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php
                                    $no     = 1;
                                    $sql    = mysqli_query($host,"SELECT * FROM shift_perawat ORDER BY id");
                                    while($data = mysqli_fetch_array($sql)){
                                ?>
                                <tr>
                                    <td><?= $no ++; ?></td>
                                    <td><?= $data['nama_shift']?></td>
                                    <td><?= $data['kode']?></td>
                                    <td><?= $data['jam_mulai']?></td>
                                    <td><?= $data['jam_selesai']?></td>
                                    <td></td>
                                    <td>
                                        <?php
                                            include('modal/edit.php');
                                            include('aksi/edit.php');
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
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