<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
    add transaction
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Test Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="row">
                    <label class="col-sm-2 col-form-label">Transaksi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" name="nama_barang" value="Ujicoba Transaksi">
                        <input type="text" class="form-control form-control-sm" name="add_transaction" value="<?= round(microtime(true) * 1000); ?>">
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control form-control-sm" name="harga" value="<?= time()?>">
                    </div>
                </div>
                </div>
                <div class="modal-footer">                    
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if(isset($_POST['add_transaction'])){
    $nama_barang    = $_POST['nama_barang'];
    $qty            = 1;
    $harga          = $_POST['harga'];
    $total          = $qty*$harga;
    $today          = date('Y-m-d H:i:s');
    $has            = md5(uniqid());
    $add_transaction= mysqli_query($host,"INSERT INTO invoice_detail SET
                        id_customer     = '$user_check',
                        nama_barang     = '$nama_barang',
                        qty             = '$qty',
                        h_satuan        = '$harga',
                        total           = '$total',
                        date_request    = '$today',
                        has             = '$has'
                        ");
    if($add_transaction){
        $_SESSION['status']="Data success disimpan";
        $_SESSION['status_info']="success";
        echo "<script>document.location=\"$site_url/payment/checkout.php\"</script>";    
    }else{
        echo "<script>document.location=\"$site_url/payment/transaksi.php\"</script>";
    }
}

?>