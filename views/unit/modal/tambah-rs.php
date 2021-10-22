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
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Rumah Sakit</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputPassword3" name="nama_rs">
                        </div>
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Pimpinan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputPassword3" name="nama_pimpinan">
                        </div>
                        <label for="inputPassword3" class="col-sm-9 col-form-label">Alamat Rumah Sakit</label>
                        <div class="col-sm-3">
                        </div>
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Provinsi</label>
                        <div class="col-sm-9">
                            <script src="<?= $site_url;?>/assets/js/ajax_kota.js"></script>
                            <select name="prop" id="prop" onchange="ajaxkota(this.value)" class="form-control" required>
                                <option value="<? echo $data['prop']; ?>"><? echo $kodeprovinsi; ?></option>
                                    <?php 
                                    $queryProvinsi=mysqli_query($host, "SELECT * FROM id_desa where lokasi_kabupatenkota=0 and lokasi_kecamatan=0 and lokasi_kelurahan=0 order by lokasi_nama");
                                        while ($dataProvinsi=mysqli_fetch_array($queryProvinsi)){
                                            echo '<option value="'.$dataProvinsi['lokasi_propinsi'].'">'.$dataProvinsi['lokasi_nama'].'</option>';
                                        }
                                    ?>
                            <select>
                        </div>
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Kabupaten</label>
                        <div class="col-sm-9">
                            <select name="kota" id="kota" onchange="ajaxkec(this.value)" class="form-control" required>
                                <option value="<? echo $data['kota']; ?>"><? echo $kodekota11; ?></option>
                            </select>
                        </div>
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Kecamatan</label>
                        <div class="col-sm-9">
                            <select name="kec" id="kec" onchange="ajaxkel(this.value)" class="form-control" required>
                                <option value="<? echo $data['kec']; ?>"><? echo $kodekecamatan; ?></option>
                            </select>
                        </div>
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Kelurahan</label>
                        <div class="col-sm-9">
                            <select name="kel" id="kel" class="form-control" required  >
                                <option value="<? echo $data['kel']; ?>"><? echo $desa; ?></option>
                            </select>
                        </div>
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Jalan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputPassword3" name="alamat">
                        </div>
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Kepemilikan</label>
                        <div class="col-sm-9">
                            
                            <select name="pemilik" class="form-control" required>
                                <option value="">---Pilih---</option>
                                <option value="swasta">Swasta</option>
                                <option value="bumn">BUMN</option>
                                <option value="bumd">BUMD</option>
                                <option value="pusat">Pemerintah Pusat</option>
                                <option value="provinsi">Provinsi</option>
                                <option value="kota">Kabupaten / Kota</option>
                            <select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" value="tambah_rs">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>