<?php
if(isset($_POST['update_kamar'])){
    $pp                 = $_POST['pp'];
    $has_px_ruangan     = $_POST['update_kamar'];
    $id_kamar           = $_POST['id_kamar'];
    $hari_ini           = date('Y-m-d H:i:s');
    $update_kamar       = mysqli_query($host,"UPDATE pasien_daftar_ruangan SET 
                            pp                          = '$pp',
                            id_kamar                    = '$id_kamar',
                            updated_at                  = '$hari_ini'  WHERE 
                            has_pasien_daftar_ruangan   = '$has_px_ruangan'
                        ");
    if($update_kamar){
        $_SESSION['status']="Data sukses disimpan";
        $_SESSION['status_info']="success";
        echo "<script>document.location=\"$site_url/pasien/keperawatan.php?key=$has_px_ruangan\"</script>";
    }else{
        $_SESSION['status']="Data gagal disimpan";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/pasien/keperawatan.php?key=$has_px_ruangan\"</script>";
    }

}
if(isset($_POST['add_dx_kep'])){
    $has_px_ruangan     = $_POST['add_dx_kep'];
    $hari_ini           = date('Y-m-d H:i:s');
    $key_trx_ruangan    = key_trx_ruangan($has_px_ruangan);
    $nrm                = pasien_key_trx($key_trx_ruangan);
    $id_dx_kep          = $_POST['id_dx_kep'];
    $has_pasien_dx_kep  = md5(uniqid());
    $tambah_diagnosa    = mysqli_query($host,"INSERT INTO pasien_dx_kep SET 
                            id_dx_kep           = '$id_dx_kep',
                            key_trx             = '$key_trx_ruangan',
                            nrm                 = '$nrm',
                            created_by          = '$user_check',
                            created_at          = '$hari_ini',
                            has_pasien_dx_kep   = '$has_pasien_dx_kep'");
    if($tambah_diagnosa){
        $_SESSION['status']="Data sukses disimpan";
        $_SESSION['status_info']="success";
        echo "<script>document.location=\"$site_url/pasien/keperawatan.php?key=$has_px_ruangan\"</script>";
    }else{
        $_SESSION['status']="Data gagal disimpan";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/pasien/keperawatan.php?key=$has_px_ruangan\"</script>";
    }
}

?>