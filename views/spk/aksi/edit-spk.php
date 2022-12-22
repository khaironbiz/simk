<?php

if(isset($_POST['edit_spk'])){
    $time       = time();
    if($_POST['edit_spk'] != '' ){
        $has_spk        = $_POST['edit_spk'];
        $tgl_surat      = $_POST['tgl_surat'];
        $tgl_exp        = $_POST['tgl_exp'];
        $level_pk       = $_POST['level_pk'];
        $update_nira    = mysqli_query($host,"UPDATE spk_perawat SET 
                            tgl_surat       = '$tgl_surat',
                            tgl_exp         = '$tgl_exp',
                            level_pk        = '$level_pk',
                            validator       = '',
                            time_validasi   = '0' WHERE has = '$has_spk'");

        if($update_nira){
            $_SESSION['status']="Data berhasil dirubah ".$nira;
            $_SESSION['status_info']="success";
            echo "<script>document.location=\"file.php\"</script>";
        }else{
            $_SESSION['status']="Data gagal disimpan";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"file.php\"</script>";
        }
    }else{
        $_SESSION['status']="Data gagal disimpan karena data sudah terdaftar di sistem";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"file.php\"</script>";

    }
}
?>