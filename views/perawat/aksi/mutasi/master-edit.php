<?php
if(isset($_POST['mutasi_master_edit'])){
    $tanggal            = $_POST['tanggal'];
    $penempatan_baru    = $_POST['penempatan_baru'];
    $mutasi             = $_POST['mutasi'];
    $keluar             = $_POST['keluar'];
    $has_lama           = $_POST['has'];
    $has_baru           = md5(uniqid());
    $sql                = mysqli_query($host,"SELECT * FROM penempatan_tanggal WHERE has='$has_lama'");
    $count              = mysqli_num_rows($sql);


    if($count = 1 ){
        $update_data    = mysqli_query($host, "UPDATE penempatan_tanggal SET
                              tanggal           = '$tanggal',
                              penempatan_baru   = '$penempatan_baru',
                              mutasi            = '$mutasi',
                              keluar            = '$keluar',
                              has               = '$has_baru' WHERE has = '$has_lama'");
        if($update_data){
            $_SESSION['status']="Data berhasil disimpan";
            $_SESSION['status_info']="success";
            echo "<script>document.location=\"$site_url/perawat/mutasi.php\"</script>";
        }else{
            $_SESSION['status']="Data gagal disimpan";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/perawat/mutasi.php\"</script>";
        }
    }else{
        $_SESSION['status']="AKSES ILLEGAL";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/perawat/mutasi.php\"</script>";
    }
}
?>