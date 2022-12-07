<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create">
    Tambah Perawat
</button>
<!-- Modal -->
<div class="modal fade" id="create" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action='' method='POST'>
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="staticBackdropLabel">Mutasi Antar Ruang Perawat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tanggal</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="id_penempatan">
                                    <option value="<?= $data_pemempatan['id'] ?>"><?= $data_pemempatan['tanggal'] ?></option>
                                </select>
                                <input type="hidden" readonly class="form-control" name="mutasi_antar_ruang" value="<?= $data_pemempatan['has'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nomor Surat</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="nomor_surat" required placeholder="nomor surat yang akan dibuat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nama Perawat</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="id_perawat" required>
                                    <option value="">---pilih---</option>
                                    <?php
                                    $sql_perawat = mysqli_query($host,"SELECT * FROM nira WHERE blokir ='N' order by nama ASC");
                                    while($data_perawat = mysqli_fetch_array($sql_perawat)){
                                        ?>
                                        <option value="<?= $data_perawat['nira']?>"><?= $data_perawat['nama']?> ----<?= $data_perawat['nip']?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Ruangan Asal</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="ruangan_asal" required>
                                    <option value="">---pilih---</option>
                                    <?php
                                        $sql_ruangan = mysqli_query($host,"SELECT * FROM ruangan order by id ASC");
                                        while($data_ruangan = mysqli_fetch_array($sql_ruangan)){
                                    ?>
                                    <option value="<?= $data_ruangan['id']?>"><?= $data_ruangan['ruangan']?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Ruangan Baru</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="ruangan_baru" required>
                                    <option value="">---pilih---</option>
                                    <?php
                                    $sql_ruangan = mysqli_query($host,"SELECT * FROM ruangan order by id ASC");
                                    while($data_ruangan = mysqli_fetch_array($sql_ruangan)){
                                        ?>
                                        <option value="<?= $data_ruangan['id']?>"><?= $data_ruangan['ruangan']?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
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
