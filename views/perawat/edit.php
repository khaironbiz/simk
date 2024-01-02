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
                    <form>
                        <div class="card">
                        <div class="card-header bg-dark">
                            <?php
                            include('../layout/sub-menu/perawat/index.php')
                            ?>
                        </div>
                        <div class="card-body">
                            <h4>Pemutakhiran Data</h4>
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-sm-2 col-4 col-form-label">Nama</label>
                                        <div class="col-sm-10 col-8">
                                            <input type="text" readonly class="form-control form-control-sm" value="<?= ucwords(strtolower($data_anggota['nama']));?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-4 col-form-label">NIRA</label>
                                        <div class="col-sm-10 col-8">
                                            <input type="number" readonly class="form-control form-control-sm" value="<?= $data_anggota['nira']?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-4 col-form-label">Tgl Lahir</label>
                                        <div class="col-sm-10 col-8">
                                            <input type="date" readonly class="form-control form-control-sm" value="<?= $data_anggota['ttl'];?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-4 col-form-label">NIK</label>
                                        <div class="col-sm-10 col-8">
                                            <input type="text" readonly class="form-control form-control-sm" value="<?= $data_anggota['ktp'];?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-4 col-form-label">Status </label>
                                        <div class="col-sm-10 col-8">
                                            <input type="text" readonly class="form-control form-control-sm" value="<?= $data_anggota['status'];?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-4 col-form-label">Agama </label>
                                        <div class="col-sm-10 col-8">
                                            <input type="text" readonly class="form-control form-control-sm" value="<?= $data_anggota['agama'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-sm-2 col-4 col-form-label">Pendidikan </label>
                                        <div class="col-sm-4 col-8">
                                            <input type="text" readonly class="form-control form-control-sm" value="<?= $data_anggota['pendidikan'];?>">
                                        </div>
                                        <label class="col-sm-2 col-4 col-form-label">PT </label>
                                        <div class="col-sm-4 col-8">
                                            <input type="text" readonly class="form-control form-control-sm" value="<?= $data_anggota['universitas'];?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-4 col-form-label">Pegawai </label>
                                        <div class="col-sm-4 col-8">
                                            <input type="text" readonly class="form-control form-control-sm" value="<?= $data_anggota['kategori'];?>">
                                        </div>
                                        <label class="col-sm-2 col-4 col-form-label">Jabfung </label>
                                        <div class="col-sm-4 col-8">
                                            <input type="text" readonly class="form-control form-control-sm" value="<?= $data_anggota['jabfung'];?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-4 col-form-label">Alamat </label>
                                        <div class="col-sm-10 col-8">
                                            <input type="text" readonly class="form-control form-control-sm" value="<?= $data_anggota['alamat'];?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-4 col-form-label">Provinsi </label>
                                        <div class="col-sm-4 col-8">
                                            <input type="text" readonly class="form-control form-control-sm" value="<?= provinsi($data_anggota['prop']);?>">
                                        </div>
                                        <label class="col-sm-2 col-4 col-form-label">Kota </label>
                                        <div class="col-sm-4 col-8">
                                            <input type="text" readonly class="form-control form-control-sm" value="<?= kota($data_anggota['kota']);?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-4 col-form-label">Kecamatan </label>
                                        <div class="col-sm-4 col-8">
                                            <input type="text" readonly class="form-control form-control-sm" value="<?= kecamatan($data_anggota['kec']);?>">
                                        </div>
                                        <label class="col-sm-2 col-4 col-form-label">Kelurahan </label>
                                        <div class="col-sm-4 col-8">
                                            <input type="text" readonly class="form-control form-control-sm" value="<?= kelurahan($data_anggota['kel']);?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-4 col-form-label">Email </label>
                                        <div class="col-sm-4 col-8">
                                            <input type="text" readonly class="form-control form-control-sm" value="<?= $data_anggota['email'];?>">
                                        </div>
                                        <label class="col-sm-2 col-4 col-form-label">HP </label>
                                        <div class="col-sm-4 col-8">
                                            <input type="text" readonly class="form-control form-control-sm" value="<?= $data_anggota['hp'];?>">
                                        </div>
                                    </div>
                                </div>
                                <a href="ruangan.php?nira=<?= $data_anggota['nira']?>" class="btn btn-success btn-sm mr-1">Edit</a>
                                <a href="" class="btn btn-danger btn-sm">Blokir</a>
                            </div>
                        </div>
                        <!-- /.card-body -->
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