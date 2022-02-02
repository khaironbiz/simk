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
    $th                 = $_POST['th'];
    $bln                = $_POST['bln'];
    $tgl                = $_POST['tgl'];
    $dx_muncul          = $th."-".$bln."-".$tgl;
    $hari_ini           = date('Y-m-d H:i:s');
    $key_trx_ruangan    = key_trx_ruangan($has_px_ruangan);
    $nrm                = pasien_key_trx($key_trx_ruangan);
    $id_dx_kep          = $_POST['id_dx_kep'];
    $has_pasien_dx_kep  = md5(uniqid());
    $cari_dx            = mysqli_query($host,"SELECT * FROM pasien_dx_kep WHERE 
                            id_dx_kep   = '$id_dx_kep' AND 
                            key_trx     = '$key_trx_ruangan' AND 
                            dx_teratasi = '0000-00-00'");
    $count_dx_ini       = mysqli_num_rows($cari_dx);
    if($count_dx_ini<1){
        $tambah_diagnosa= mysqli_query($host,"INSERT INTO pasien_dx_kep SET 
                            id_dx_kep           = '$id_dx_kep',
                            dx_muncul           = '$dx_muncul',
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
    }else{
        $_SESSION['status']="Data gagal disimpan :<b>DX sudah ditegakkan</b>";
        $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/pasien/keperawatan.php?key=$has_px_ruangan\"</script>";
    }
    
}
if(isset($_POST['add_morse'])){
    $has_px_ruangan     = $_POST['add_morse'];
    $th                 = $_POST['th'];
    $bln                = $_POST['bln'];
    $tgl                = $_POST['tgl'];
    $jam                = $_POST['jam'];
    $waktu_periksa      = $th."-".$bln."-".$tgl."-".$jam;
    $hari_ini           = date('Y-m-d H:i:s');
    $key_trx_ruangan    = key_trx_ruangan($has_px_ruangan);
    $nrm                = pasien_key_trx($key_trx_ruangan);
    $total              = $_POST['total'];
    $has_pasien_morse   = md5(uniqid());
    $tambah_morse       = mysqli_query($host,"INSERT INTO pasien_morse SET 
                            total               = '$total',
                            waktu_periksa       = '$waktu_periksa',
                            key_trx             = '$key_trx_ruangan',
                            nrm                 = '$nrm',
                            created_by          = '$user_check',
                            created_at          = '$hari_ini',
                            has_pasien_morse    = '$has_pasien_morse'");
    if($tambah_morse){
        $_SESSION['status']="Data sukses disimpan";
        $_SESSION['status_info']="success";
        echo "<script>document.location=\"$site_url/pasien/keperawatan.php?key=$has_px_ruangan\"</script>";
    }else{
        $_SESSION['status']="Data gagal disimpan";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/pasien/keperawatan.php?key=$has_px_ruangan\"</script>";
    }
}
if(isset($_POST['add_bi'])){
    $has_px_ruangan     = $_POST['add_bi'];
    $th                 = $_POST['th'];
    $bln                = $_POST['bln'];
    $tgl                = $_POST['tgl'];
    $jam                = $_POST['jam'];
    $waktu_periksa      = $th."-".$bln."-".$tgl."-".$jam;
    $hari_ini           = date('Y-m-d H:i:s');
    $key_trx_ruangan    = key_trx_ruangan($has_px_ruangan);
    $nrm                = pasien_key_trx($key_trx_ruangan);
    $total              = $_POST['total'];
    $has_pasien_bi   = md5(uniqid());
    $tambah_bi       = mysqli_query($host,"INSERT INTO pasien_bi SET 
                            total               = '$total',
                            waktu_periksa       = '$waktu_periksa',
                            key_trx             = '$key_trx_ruangan',
                            nrm                 = '$nrm',
                            created_by          = '$user_check',
                            created_at          = '$hari_ini',
                            has_pasien_bi    = '$has_pasien_bi'");
    if($tambah_bi){
        $_SESSION['status']="Data sukses disimpan";
        $_SESSION['status_info']="success";
        echo "<script>document.location=\"$site_url/pasien/keperawatan.php?key=$has_px_ruangan\"</script>";
    }else{
        $_SESSION['status']="Data gagal disimpan";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/pasien/keperawatan.php?key=$has_px_ruangan\"</script>";
    }
}
if(isset($_POST['add_newss'])){
    $has_px_ruangan     = $_POST['add_newss'];
    $th                 = $_POST['th'];
    $bln                = $_POST['bln'];
    $tgl                = $_POST['tgl'];
    $jam                = $_POST['jam'];
    $waktu_periksa      = $th."-".$bln."-".$tgl."-".$jam;
    $hari_ini           = date('Y-m-d H:i:s');
    $key_trx_ruangan    = key_trx_ruangan($has_px_ruangan);
    $nrm                = pasien_key_trx($key_trx_ruangan);
    $suhu               = $_POST['suhu'];
    $nafas              = $_POST['nafas'];
    $nadi               = $_POST['nadi'];
    $sistolik           = $_POST['sistolik'];
    $diastolik          = $_POST['diastolik'];
    $apvu               = $_POST['apvu'];
    $has_pasien_newss   = md5(uniqid());
    $newss_score        = newss_nafas($nafas) + newss_nadi($nadi) + newss_sistolik($sistolik) + newss_suhu($suhu) + $apvu;
    $tambah_newss       = mysqli_query($host,"INSERT INTO pasien_newss SET 
                            nafas               = '$nafas',
                            nadi                = '$nadi',
                            suhu                = '$suhu',
                            apvu                = '$apvu',
                            sistolik            = '$sistolik',
                            diastolik           = '$diastolik',
                            newss_score         = '$newss_score',
                            waktu_periksa       = '$waktu_periksa',
                            key_trx             = '$key_trx_ruangan',
                            nrm                 = '$nrm',
                            created_at          = '$hari_ini',
                            created_by          = '$user_check',
                            has_pasien_newss    = '$has_pasien_newss'");
    if($tambah_newss){
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