<?php
if(isset($_POST['nama_sub_bidang'])){
    $nama_sub_bidang    = $_POST['nama_sub_bidang'];
    $has_rs_bidang      = $_POST['key'];
    $sql_rs_bidang      = mysqli_query($host, "SELECT * FROM rs_bidang WHERE has_rs_bidang='$has_rs_bidang'");
    $data_rs_bidang     = mysqli_fetch_array($sql_rs_bidang);
    $id_rs              = $data_rs_bidang['id_rs'];
    $id_direktorat      = $data_rs_bidang['id_direktorat'];
    $id_bidang          = $data_rs_bidang['id_rs_bidang'];
    $time               = date('Y-m-d H:i:s');
    $has_rs_sub_bidang  = md5(uniqid());
    $tambah_data        = mysqli_query($host, "INSERT INTO rs_sub_bidang SET
                            id_rs               = '$id_rs',
                            id_direktorat       = '$id_direktorat',
                            id_bidang           = '$id_bidang',
                            nama_sub_bidang     = '$nama_sub_bidang',
                            created_by          = '$user_check',
                            created_at          = '$time',
                            has_rs_sub_bidang   = '$has_rs_sub_bidang'");
    if($tambah_data){
        $_SESSION['status']="Data berhasil disimpan";
        $_SESSION['status_info']="success";
            echo "<script>document.location=\"$site_url/unit/sub-sub-detail.php?id=$has_rs_bidang\"</script>";
    }else{
        
        $_SESSION['status']="Data gagal disimpan";
        $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/unit/sub-sub-detail.php?id=$has_rs_bidang\"</script>";
    }

}

?>