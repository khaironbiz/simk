<?php
if(isset($_POST['update_dokter'])){
    $dpjp               = $_POST['dpjp'];
    $dx_medis           = $_POST['dx_medis'];
    $has_pasien_daftar  = $_POST['update_dokter'];
    $nrm                = pasien_daftar_has($has_pasien_daftar);
    $update_dokter      = mysqli_query($host,"UPDATE pasien_daftar SET 
                            dpjp            = '$dpjp',
                            dx_medis        = '$dx_medis' WHERE 
                            has_px_daftar   = '$has_pasien_daftar'
                        ");
    if($update_dokter){
        $_SESSION['status']="Data sukses disimpan";
        $_SESSION['status_info']="success";
        echo "<script>document.location=\"$site_url/pasien/klinis.php?key=$has_pasien_daftar\"</script>";
    }else{
        $_SESSION['status']="Data gagal disimpan";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/pasien/klinis.php?key=$has_pasien_daftar\"</script>";
    }

}
if(isset($_POST['add_konsultasi'])){
    $has_px_daftar      = $_POST['add_konsultasi'];
    $hari_ini           = date('Y-m-d H:i:s');
    $nrm                = pasien_daftar_has($has_px_daftar);
    $key_trx            = key_trx($has_px_daftar);
    $id_dokter          = $_POST['id_dokter'];
    $has_pasien_dokter  = md5(uniqid());
    $sql_dokter         = mysqli_query($host,"SELECT * FROM pasien_dokter WHERE id_dokter='$id_dokter' AND key_trx='$key_trx'");
    $count_dokter       = mysqli_num_rows($sql_dokter);
    if($count_dokter <1){
        $tambah_konsultasi  = mysqli_query($host,"INSERT INTO pasien_dokter SET 
                            id_dokter           = '$id_dokter',
                            key_trx             = '$key_trx',
                            nrm                 = '$nrm',
                            created_by          = '$user_check',
                            created_at          = '$hari_ini',
                            has_pasien_dokter   = '$has_pasien_dokter'");
        if($tambah_konsultasi){
            $_SESSION['status']="Data sukses disimpan";
            $_SESSION['status_info']="success";
            echo "<script>document.location=\"$site_url/pasien/klinis.php?key=$has_px_daftar\"</script>";
        }else{
            $_SESSION['status']="Data gagal disimpan";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/pasien/klinis.php?key=$has_px_daftar\"</script>";
        }
    }else{
        $_SESSION['status']="Data gagal disimpan karena sudah terdaftar";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/pasien/klinis.php?key=$has_px_daftar\"</script>";
    }
    
    
}

?>