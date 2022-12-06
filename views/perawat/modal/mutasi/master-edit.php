<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal<?= $data['has']?>">
    Edit
</button>
<!-- Modal -->
<div class="modal fade" id="modal<?= $data['has']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action='' method='POST'>
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="staticBackdropLabel">Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" value="<?= $data['tanggal']?>" name="tanggal">
                                <input type="hidden" class="form-control" value="<?= $data['has']?>" name="has">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Baru</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?= $data['penempatan_baru']?>" name="penempatan_baru">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Antar Ruang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?= $data['mutasi']?>" name="mutasi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Keluar</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?= $data['keluar']?>" name="keluar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input type="checkbox" required value="<?= uniqid()?>" name="mutasi_master_edit"> Yakin Update Data Ini?
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>

            </div>
        </form>
    </div>
</div>
