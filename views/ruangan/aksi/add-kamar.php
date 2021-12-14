<?php
if(isset($_POST['add-kamar'])){
    $hari_ini           = date('Y-m-d H:i:s');
    $kelas_perawatan    = $_POST['kelas_perawatan'];
    $no_kamar           = $_POST['no_kamar'];
    $nama_kamar         = $_POST['nama_kamar'];
    $id_ruangan         = $_POST['id_ruangan'];
    $blokir             = $_POST['blokir'];
    $has_ruangan_kamar  = $_POST['edit-kamar'];
    $sql_kelas          = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id = '$kelas_perawatan'");
    $count              = mysqli_num_rows($sql_kelas);
    if($count == 1 ){
        $input_data     = mysqli_query($host, "UPDATE ruangan_kamar SET 
                                    blokir              = '$blokir',
                                    id_kelas_perawatan  = '$kelas_perawatan',
                                    updated_at          = '$hari_ini' WHERE
                                    has_ruangan_kamar   = '$has_ruangan_kamar'");
        if($input_data){
            $_SESSION['status']="Data berhasil disimpan";
            $_SESSION['status_info']="success";
            echo "<script>document.location=\"$site_url/ruangan/edit-kamar.php?key=$has_ruangan_kamar\"</script>";
        }else{
            $_SESSION['status']="Data gagal disimpan";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/ruangan/edit-kamar.php?key=$has_ruangan_kamar\"</script>";
        }
    }else{
        $_SESSION['status']="Data gagal disimpan : AKSES TERLARANG";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/ruangan/edit-kamar.php?key=$has_ruangan_kamar\"</script>";
    }
}

?>