<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal<?= $data['has_rs_bidang']?>">
    Edit
</button>
<!-- Modal -->
<form action="" method="POST">
    <div class="modal fade" id="exampleModal<?= $data['has_rs_bidang']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Bidang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Rumah Sakit</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" readonly value="<?= $data_rs['nama_rs']?>">
                            <input type="text" class="form-control" readonly name="key" value="<?= $data['has_rs_bidang']?>">
                        </div>
                        <label class="col-sm-3 col-form-label">Nama Direktorat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?= $data['nama_direktorat'];?>">
                        </div>
                        <label class="col-sm-3 col-form-label">Nama bidang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_bidang_edit" value="<?= $data['nama_bidang'];?>">
                        </div>
                        <label class="col-sm-3 col-form-label">Blokir</label>
                        <div class="col-sm-9">
                            <select name="blokir" class="form-control" required>
                                <option value="<?= $data['blokir']; ?>"><?php if($data['blokir']==1){echo "Ya";}else{ echo "Tidak";} ?></option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            <select>
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