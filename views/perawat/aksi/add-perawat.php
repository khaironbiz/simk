<?php
if(isset($_POST['add_perawat'])){
    $hari_ini       = date('Y-m-d H:i:s');
    $nira_anggota   = $_POST['nira'];
    $ruangan        = $_POST['ruangan'];
    $sql_pasien     = mysqli_query($host, "SELECT * FROM nira WHERE nira = '$nira_anggota'");
    $count          = mysqli_num_rows($sql_pasien);
    if($count == 1 ){
        $input_data     = mysqli_query($host, "UPDATE nira SET 
                                    ruangan     = '$ruangan' WHERE
                                    nira        = '$nira_anggota'");
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