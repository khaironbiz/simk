<?php
if(isset($_POST['edit-kamar'])){
    $hari_ini           = date('Y-m-d H:i:s');
    $kelas_perawatan    = $_POST['kelas_perawatan'];
    $no_kamar           = $_POST['no_kamar'];
    $nama_kamar         = $_POST['nama_kamar'];
    $blokir             = $_POST['blokir'];
    $has_ruangan_kamar  = $_POST['edit-kamar'];
    $sql_kelas          = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id = '$kelas_perawatan'");
    $count              = mysqli_num_rows($sql_kelas);
    if($count == 1 ){
        $input_data     = mysqli_query($host, "UPDATE ruangan_kamar SET 
                                    blokir              = '$blokir',
                                    id_kelas_perawatan  = '$kelas_perawatan',
                                    no_kamar            = '$no_kamar',
                                    nama_kamar          = '$nama_kamar',
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
if(isset($_POST['add-bed'])){
    $hari_ini           = date('Y-m-d H:i:s');
    $has_ruangan_kamar  = $_POST['add-bed'];
    $sql_kamar          = mysqli_query($host,"SELECT * FROM ruangan_kamar WHERE has_ruangan_kamar='$has_ruangan_kamar'");
    $data_kamar         = mysqli_fetch_array($sql_kamar);
    $nama_bed           = $_POST['nama_bed'];
    $id_kamar           = $data_kamar['id_kamar'];
    $id_ruangan         = $data_kamar['id_ruangan'];
    $count_kamar        = mysqli_num_rows($sql_kamar);
    $has_kamar_bed      = md5(uniqid());
    if($count_kamar ==1){
        $tambah_bed     = mysqli_query($host,"INSERT INTO ruangan_kamar_bed SET 
                            id_ruangan      = '$id_ruangan',
                            id_kamar        = '$id_kamar',
                            nama_bed        = '$nama_bed',
                            created_at      = '$hari_ini',
                            created_by      = '$user_check',
                            has_kamar_bed   = '$has_kamar_bed'");
        if($tambah_bed){
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