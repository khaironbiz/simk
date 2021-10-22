<?php
if(isset($_POST['nama_bidang_edit'])){
    $nama_bidang        = $_POST['nama_bidang_edit'];
    $has_rs_bidang      = $_POST['key'];
    $sql_rs             = mysqli_query($host, "SELECT * FROM rs_bidang
                            JOIN rs_direktorat on rs_bidang.id_direktorat = rs_direktorat.id_rs_direktorat
                            JOIN rs on rs_bidang.id_rs = rs.id_rs WHERE rs_bidang.has_rs_bidang='$has_rs_bidang'");
    $data_rs            = mysqli_fetch_array($sql_rs);
    $has_rs_direktorat  = $data_rs['has_rs_direktorat'];
    $blokir             = $_POST['blokir'];
    $tambah_data        = mysqli_query($host, "UPDATE rs_bidang SET 
                            nama_bidang     = '$nama_bidang',
                            blokir          = '$blokir' WHERE has_rs_bidang = '$has_rs_bidang'");
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