<?php
if(isset($_POST['pindah_anggota'])){
    $hari_ini       = date('Y-m-d H:i:s');
    $pindah_anggota = $_POST['nira'];
    $has_pasien     = md5(uniqid());
    $sql_pasien     = mysqli_query($host, "SELECT * FROM nira WHERE nira = '$pindah_anggota'");
    $count          = mysqli_num_rows($sql_pasien);
    if($count == 1 ){
        $input_data     = mysqli_query($host, "UPDATE nira SET 
                                    ruangan     = '' WHERE
                                    nira        = '$pindah_anggota'");
        if($input_data){
            $_SESSION['status']="Data berhasil disimpan";
            $_SESSION['status_info']="success";
            echo "<script>document.location=\"$site_url/perawat/penempatan.php\"</script>";
        }else{
            $_SESSION['status']="Data gagal disimpan";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/perawat/penempatan.php\"</script>";
        }
    }else{
        $_SESSION['status']="AKSES ILLEGAL";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/perawat/penempatan.php\"</script>";
    }
}
?>