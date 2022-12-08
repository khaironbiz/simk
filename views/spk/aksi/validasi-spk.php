<?php

if(isset($_POST['validasi_spk'])){
    $time       = time();
    $nira       = $spk_detail['nira'];
    $level_pk   = $spk_detail['level_pk'];
    $tgl_spk    = $spk_detail['tgl_surat'];
    $spk_exp    = $spk_detail['tgl_exp'];
    if($_POST['validasi_spk'] = 1 ){
        $update_nira=mysqli_query($host,"UPDATE nira SET 
                            no_skk      = '',
                            spk_pk      = '$level_pk',
                            date_skk    = '$tgl_spk',
                            exp_skk     = '$spk_exp' WHERE nira = '$nira'");
        $update_spk= mysqli_query($host,"UPDATE spk_perawat SET 
                                        validator       = '$user_check',
                                        time_validasi   = '$time' WHERE has='$has_spk'");
        if($update_nira){
            $_SESSION['status']="Data berhasil dirubah ".$nira;
            $_SESSION['status_info']="success";
            echo "<script>document.location=\"$site_url/spk/active.php\"</script>";
        }else{
            $_SESSION['status']="Data gagal disimpan";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/form/\"</script>";
        }
    }else{
        $_SESSION['status']="Data gagal disimpan karena data sudah terdaftar di sistem";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/form/\"</script>";

    }
}
?>