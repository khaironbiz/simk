<?php
if(isset($_POST['nama_rs'])){
    $nama_rs        = $_POST['nama_rs'];
    $nama_pimpinan  = $_POST['nama_pimpinan'];
    $prov           = $_POST['prop'];
    $kel            = $_POST['kel'];
    $kec            = substr($kel, 0, 7);
    $kota           = substr($kel, 0, 4);
    $alamat_rs      = $_POST['alamat'];
    $pemilik        = $_POST['pemilik'];
    $time           = date('Y-m-d H:i:s');
    $has_rs         = md5(uniqid());
    $tambah_data    = mysqli_query($host, "INSERT INTO rs SET
                        nama_rs         = '$nama_rs',
                        alamat_rs       = '$alamat_rs',
                        nama_pimpinan   = '$nama_pimpinan',
                        prov            = '$prov',
                        kota            = '$kota',
                        kec             = '$kec',
                        kel             = '$kel',
                        pemilik         = '$pemilik',
                        created_by      = '$user_check',
                        created_at      = '$time',
                        has_rs          = '$has_rs'");
    if($tambah_data){
        $_SESSION['status']="Data berhasil disimpan";
        $_SESSION['status_info']="success";
            echo "<script>document.location=\"$site_url/unit\"</script>";
            
    }else{
        
        $_SESSION['status']="Data gagal disimpan";
        $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/unit\"</script>";
            
    }

}

?>