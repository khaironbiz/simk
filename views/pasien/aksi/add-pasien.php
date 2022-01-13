<?php
if(isset($_POST['add-pasien'])){
    $hari_ini       = date('Y-m-d H:i:s');
    $nama_pasien    = $_POST['nama_pasien'];
    $nrm            = $_POST['nrm'];
    $sex            = $_POST['sex'];
    $tgl_lahir      = $_POST['th']."-".$_POST['bln']."-".$_POST['tgl'];
    $status_nikah   = $_POST['status_nikah'];
    $nik            = $_POST['nik'];
    $agama          = $_POST['agama'];
    $dx_medis       = $_POST['dx_medis'];
    $id_ruangan     = $_POST['ruangan'];
    $key_trx        = uniqid();
    $has_pasien     = md5(uniqid());
    $sql_pasien     = mysqli_query($host, "SELECT * FROM pasien_db WHERE nrm = '$nrm'");
    $count          = mysqli_num_rows($sql_pasien);
    $sql_daftar     = mysqli_query($host, "SELECT * FROM pasien_daftar WHERE nrm = '$nrm' and keluar ='0'");
    $count_daftar   = mysqli_num_rows($sql_daftar);
    $sql_ini        = mysqli_query($host, "SELECT * FROM pasien_daftar_ruangan WHERE nrm = '$nrm' and id_ruangan = '$id_ruangan' and keluar ='0'");
    $count_ini      = mysqli_num_rows($sql_ini);
    if($count < 1 ){
        $input_data     = mysqli_query($host, "INSERT INTO pasien_db SET 
                                    nama_pasien         = '$nama_pasien',
                                    nrm                 = '$nrm',
                                    tgl_lahir           = '$tgl_lahir',
                                    sex                 = '$sex',
                                    status_nikah        = '$status_nikah',
                                    agama               = '$agama',
                                    created_at          = '$hari_ini',
                                    created_by          = '$user_check',
                                    has_pasien_db       = '$has_pasien'");
        if($input_data){
            $daftarkan  = mysqli_query($host,"INSERT INTO pasien_daftar SET 
                            key_trx         = '$key_trx',
                            nrm             = '$nrm',
                            dx_medis        = '$dx_medis',
                            has_px_daftar   = '$has_pasien'
                        ");
            $masuk_ruangan = mysqli_query($host,"INSERT INTO pasien_daftar_ruangan SET 
                            key_trx                     = '$key_trx',
                            nrm                         = '$nrm',
                            dx_medis                    = '$dx_medis',
                            id_ruangan                  = '$id_ruangan',
                            has_pasien_daftar_ruangan   = '$has_pasien'
                        ");            
            $_SESSION['status']="Data berhasil disimpan";
            $_SESSION['status_info']="success";
            echo "<script>document.location=\"$site_url/pasien/pasien-ruangan.php\"</script>";
        }else{
            $_SESSION['status']="Data gagal disimpan";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/pasien/pasien-ruangan.php\"</script>";
        }
        
    }elseif($count_daftar < 1){
        $daftarkan  = mysqli_query($host,"INSERT INTO pasien_daftar SET 
                            key_trx             = '$key_trx',
                            nrm                 = '$nrm',
                            dx_medis            = '$dx_medis',
                            has_px_daftar   = '$has_pasien'
                        ");
        $masuk_ruangan = mysqli_query($host,"INSERT INTO pasien_daftar_ruangan SET 
                            key_trx                     = '$key_trx',
                            nrm                         = '$nrm',
                            id_ruangan                  = '$id_ruangan',
                            has_pasien_daftar_ruangan   = '$has_pasien'
                        ");      
        $_SESSION['status']="Data success disimpan";
        $_SESSION['status_info']="success";
        echo "<script>document.location=\"$site_url/pasien/pasien-ruangan.php\"</script>";
    }elseif($count_ini >0){
        $_SESSION['status']="Data gagal disimpan : NRM $nrm sudah terdaftar";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/pasien/pasien-ruangan.php\"</script>";
    }else{
        $trx_ini    = mysqli_fetch_array($sql_daftar);
        $key_trx    = $trx_ini['key_trx'];
        $masuk_ruangan = mysqli_query($host,"INSERT INTO pasien_daftar_ruangan SET 
                            key_trx                     = '$key_trx',
                            nrm                         = '$nrm',
                            id_ruangan                  = '$id_ruangan',
                            has_pasien_daftar_ruangan   = '$has_pasien'
                        ");  
        $_SESSION['status']="Data success disimpan";
        $_SESSION['status_info']="success";
        echo "<script>document.location=\"$site_url/pasien/pasien-ruangan.php\"</script>";    
    }
}
?>