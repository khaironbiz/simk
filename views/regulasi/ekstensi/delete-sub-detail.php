<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal<?= $data_ini['has_regulasi_detail']?>">Delete</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $data_ini['has_regulasi_detail']?>" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Menghapus File Regulasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Regulasi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?= $data['nama_regulasi']?>" name="nama_regulasi" readonly>
                            <input type="hidden" class="form-control" value="<?= $data_ini['has_regulasi_detail']?>" name="has_regulasi_detail">
                            <input type="hidden" class="form-control" value="<?= $data['has_regulasi']?>" name="has_regulasi_hapus">
                        </div>
                        <label class="col-sm-3 col-form-label">Nomor Dokumen</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?= $data_ini['no_dokumen'];?>">
                        </div>
                        <label class="col-sm-3 col-form-label">Tanggal Dokumen</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?= $data_ini['tgl_dokumen'];?>">
                        </div>
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <input type="checkbox" name="setuju" required> Dengan memasukkan password anda setuju menghapus data diatas
                        </div>
                        <label class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" required>
                        </div>         
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>