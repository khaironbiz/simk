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
                <div class="card">
                    <div class="card-header">Logbook Tahunan Saya</div>
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#staticBackdrop">
                            Buat Logbook
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form>
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Pengajuan Logbook</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Tahun</label>
                                            <div class="col-sm-10">
                                                <select class="form-control form-control-sm">
                                                    <option value="">---pilih----</option>
                                                    <?php
                                                    $tahun      = date('Y');
                                                    $tahun_awal = $tahun-1;
                                                    $tahun_ahir = $tahun+1;
                                                    while($tahun_awal <= $tahun_ahir){
                                                    ?>
                                                    <option value="<?= $tahun?>"><?= $tahun?></option>
                                                    <?php
                                                    $tahun++;
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Jabfung</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Level PK</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Understood</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Tahun</th>
                                <th>Rencana</th>
                                <th>Realisasi</th>
                                <th>Aksi</th>
                            </tr>
                        </table>
                    </div>
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