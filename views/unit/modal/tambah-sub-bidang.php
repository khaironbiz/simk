<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Tambah Data
</button>
<!-- Modal -->
<form action="" method="POST">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Direktorat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Rumah Sakit</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" readonly value="<?= $data_rs['nama_rs']?>">
                            <input type="text" class="form-control" readonly name="key" value="<?= $data_rs['has_rs_bidang']?>">
                        </div>
                        <label class="col-sm-3 col-form-label">Nama Direktorat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" readonly value="<?= $data_rs['nama_direktorat']?>">
                        </div>
                        <label class="col-sm-3 col-form-label">Nama Bidang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_bidang" value="<?= $data_rs['nama_bidang']?>">
                        </div>
                        <label class="col-sm-3 col-form-label">Nama Sub Bidang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_sub_bidang">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>