<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#add-dokter">
    Add Dokter
</button>

<!-- Modal -->
<div class="modal fade" id="add-dokter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nama Dokter</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_dokter">
                            <input type="hidden" name="add_dokter" value="<?= uniqid()?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Keahlian</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="keahlian">
                                <?php
                                $sql_keahlian = mysqli_query($host,"SELECT * FROM db_sub_master WHERE id_master='32'");
                                while($data_keahlian = mysqli_fetch_array($sql_keahlian)){
                                ?>
                                <option value="<?= $data_keahlian['id']?>"><?= $data_keahlian['nama_submaster']?></option>
                                <?php
                                }
                                ?>
                            </select>
                        
                        </div>
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if(isset($_POST['add_dokter'])){
    $nama_dokter    = $_POST['nama_dokter'];
    $keahlian       = $_POST['keahlian'];
    $today          = date('Y-m-d H:i:s');
    $has_dokter     = md5(uniqid());
    $tambah_dokter  = mysqli_query($host,"INSERT INTO dokter SET
                        nama_dokter     = '$nama_dokter',
                        keahlian        = '$keahlian',
                        created_by      = '$user_check',
                        created_at      = '$today',
                        has_dokter      = '$has_dokter'");
    if($tambah_dokter){
        $_SESSION['status']="Data berhasil disimpan";
        $_SESSION['status_info']="success";
            echo "<script>document.location=\"$site_url/dokter/\"</script>";
    }else{
        $_SESSION['status']="Data gagal disimpan";
        $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/dokter/\"</script>";
    }
}
?>