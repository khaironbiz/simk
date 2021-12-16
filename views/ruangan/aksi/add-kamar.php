<?php
if(isset($_POST['add_kamar'])){
    $hari_ini           = date('Y-m-d H:i:s');
    $kelas_perawatan    = $_POST['kelas_perawatan'];
    $no_kamar           = $_POST['no_kamar'];
    $nama_kamar         = $_POST['nama_kamar'];
    $id_ruangan         = $_POST['id_ruangan'];
    $has_ruangan        = $_POST['add_kamar'];
    $has_ruangan_kamar  = md5(uniqid());
    $sql_kelas          = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id = '$kelas_perawatan'");
    $count              = mysqli_num_rows($sql_kelas);
    if($count == 1 ){
        $input_data     = mysqli_query($host, "INSERT INTO ruangan_kamar SET 
                                    no_kamar            = '$no_kamar',
                                    nama_kamar          = '$nama_kamar',
                                    id_ruangan          = '$id_ruangan',
                                    blokir              = '0',
                                    id_kelas_perawatan  = '$kelas_perawatan',
                                    created_at          = '$hari_ini',
                                    created_by          = '$user_check',
                                    has_ruangan_kamar   = '$has_ruangan_kamar'");
        if($input_data){
            $_SESSION['status']="Data berhasil disimpan";
            $_SESSION['status_info']="success";
            echo "<script>document.location=\"$site_url/ruangan/detail.php?key=$has_ruangan\"</script>";
        }else{
            $_SESSION['status']="Data gagal disimpan";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/ruangan/detail.php?key=$has_ruangan\"</script>";
        }
    }else{
        $_SESSION['status']="Data gagal disimpan : AKSES TERLARANG";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/ruangan/detail.php?key=$has_ruangan\"</script>";
    }
}

?>