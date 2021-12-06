<?php
if(isset($_POST['registrasi'])){
    $hari_ini       = date('Y-m-d H:i:s');
    $key_trx        = uniqid();
    $nrm            = $_POST['nrm'];
    $jaminan        = $_POST['jaminan'];
    $dx_medis       = $_POST['dx_medis'];
    $id_ruangan     = $_POST['ruangan'];
    $has_px_daftar  = md5(uniqid());
    $sql_pasien     = mysqli_query($host, "SELECT * FROM pasien_daftar WHERE nrm = '$nrm' and keluar='0'");
    $count          = mysqli_num_rows($sql_pasien);
    if($count < 1 ){
        $input_data     = mysqli_query($host, "INSERT INTO pasien_daftar SET 
                                    key_trx             = '$nama_pasien',
                                    nrm                 = '$nrm',
                                    jaminan             = '$jaminan',
                                    dx_medis            = '$dx_medis',
                                    id_ruangan          = '$id_ruangan',
                                    created_at          = '$hari_ini',
                                    created_by          = '$user_check',
                                    has_px_daftar       = '$has_pasien'");
        if($input_data){
            echo "<script>document.location=\"$site_url/pasien/register.php\"</script>";
        }else{
            echo "<script>document.location=\"$site_url/pasien/register.php\"</script>";
        }
    }else{
        echo "<script>document.location=\"$site_url/pasien/register.php\"</script>";
    }
}
?>