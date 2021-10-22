<?php
if(isset($_POST['blokir'])){
    $nama_direktorat    = $_POST['nama_direktorat_edit'];
    $has_rs_direktorat  = $_POST['key'];
    $sql_rs             = mysqli_query($host, "SELECT * FROM rs_direktorat 
                            JOIN rs on rs.id_rs = rs_direktorat.id_rs WHERE has_rs_direktorat='$has_rs_direktorat'");
    $data_rs            = mysqli_fetch_array($sql_rs);
    $has_rs             = $data_rs['has_rs'];
    $blokir             = $_POST['blokir'];
    $tambah_data        = mysqli_query($host, "UPDATE rs_direktorat SET 
                            nama_direktorat = '$nama_direktorat',
                            blokir          = '$blokir' WHERE has_rs_direktorat = '$has_rs_direktorat'");
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