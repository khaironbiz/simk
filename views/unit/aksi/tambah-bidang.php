<?php
if(isset($_POST['nama_bidang'])){
    $nama_bidang        = $_POST['nama_bidang'];
    $has_rs_direktorat  = $_POST['key'];
    $sql_rs_direktorat  = mysqli_query($host, "SELECT * FROM rs_direktorat WHERE has_rs_direktorat='$has_rs_direktorat'");
    $data_rs_direktorat = mysqli_fetch_array($sql_rs_direktorat);
    $id_rs              = $data_rs_direktorat['id_rs'];
    $id_direktorat      = $data_rs_direktorat['id_rs_direktorat'];
    $time               = date('Y-m-d H:i:s');
    $has_rs_bidang      = md5(uniqid());
    $tambah_data        = mysqli_query($host, "INSERT INTO rs_bidang SET
                            id_rs           = '$id_rs',
                            id_direktorat   = '$id_direktorat',
                            nama_bidang     = '$nama_bidang',
                            created_by      = '$user_check',
                            created_at      = '$time',
                            has_rs_bidang   = '$has_rs_bidang'");
    if($tambah_data){
        $_SESSION['status']="Data berhasil disimpan";
        $_SESSION['status_info']="success";
            echo "<script>document.location=\"$site_url/unit/sub-detail.php?id=$has_rs_direktorat\"</script>";
    }else{
        
        $_SESSION['status']="Data gagal disimpan";
        $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/unit/sub-detail.php?id=$has_rs_direktorat\"</script>";
    }

}

?>