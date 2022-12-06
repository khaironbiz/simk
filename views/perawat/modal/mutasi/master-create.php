<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create">
    Buat Mutasi Baru
</button>
<!-- Modal -->
<div class="modal fade" id="create" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action='' method='POST'>
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="staticBackdropLabel">Membuat Master Mutasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Baru</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="penempatan_baru">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Antar Ruang</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="mutasi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Keluar</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="keluar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input type="checkbox" required value="<?= uniqid()?>" name="mutasi_master"> Saya setuju membuat master mutasi baru
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </form>
    </div>
</div>
