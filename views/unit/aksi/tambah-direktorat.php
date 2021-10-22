<?php
if(isset($_POST['nama_direktorat'])){
    $nama_direktorat    = $_POST['nama_direktorat'];
    $has_rs             = $_POST['key'];
    $sql_rs             = mysqli_query($host, "SELECT * FROM rs WHERE has_rs='$has_rs'");
    $data_rs            = mysqli_fetch_array($sql_rs);
    $id_rs              = $data_rs['id_rs'];
    $time               = date('Y-m-d H:i:s');
    $has_rs_direktorat  = md5(uniqid());
    $tambah_data        = mysqli_query($host, "INSERT INTO rs_direktorat SET
                            id_rs               = '$id_rs',
                            nama_direktorat     = '$nama_direktorat',
                            created_by          = '$user_check',
                            created_at          = '$time',
                            has_rs_direktorat   = '$has_rs_direktorat'");
    if($tambah_data){
        $_SESSION['status']="Data berhasil disimpan";
        $_SESSION['status_info']="success";
            echo "<script>document.location=\"$site_url/unit/detail.php?id=$has_rs\"</script>";
    }else{
        
        $_SESSION['status']="Data gagal disimpan";
        $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/unit/detail.php?id=$has_rs\"</script>";
    }

}

?>