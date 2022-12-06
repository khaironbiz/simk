<?php
if(isset($_POST['mutasi_master'])){
    $tanggal            = $_POST['tanggal'];
    $penempatan_baru    = $_POST['penempatan_baru'];
    $mutasi             = $_POST['mutasi'];
    $keluar             = $_POST['keluar'];
    $kode               = random_int(1000,9999);
    $has                = md5(uniqid());
    $query              = mysqli_query($host, "SELECT * FROM penempatan_tanggal WHERE tanggal='$tanggal'");
    $mutasi             = mysqli_num_rows($query);
    if($mutasi<1){
        $query          = "INSERT INTO penempatan_tanggal SET 
                                tanggal         = '$tanggal',
                                penempatan_baru = '$penempatan_baru',
                                mutasi          = '$mutasi',
                                keluar          = '$keluar',
                                kode            = '$kode',
                                has             = '$has'";
        $input_data     = mysqli_query($host, $query);
        if($input_data){
            $_SESSION['status']="Data berhasil disimpan";
            $_SESSION['status_info']="success";
            echo "<script>document.location=\"$site_url/perawat/mutasi.php\"</script>";
        }else{
            $_SESSION['status']="Data gagal disimpan";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/perawat/mutasi.php\"</script>";
        }
    }else{
        $_SESSION['status']="TANGGAL SUDAH TERDAFTAR DI DATABASE";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/perawat/mutasi.php\"</script>";
    }
}
?>