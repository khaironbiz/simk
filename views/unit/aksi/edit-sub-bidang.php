<?php
if(isset($_POST['nama_sub_bidang_edit'])){
    $nama_sub_bidang    = $_POST['nama_sub_bidang_edit'];
    $has_rs_sub_bidang  = $_POST['key'];
    $sql_rs_ini         = mysqli_query($host, "SELECT * FROM rs_sub_bidang
                            JOIN rs_bidang on rs_bidang.id_rs_bidang = rs_sub_bidang.id_bidang
                            WHERE rs_sub_bidang.has_rs_sub_bidang='$has_rs_sub_bidang'");
    $data_rs_ini        = mysqli_fetch_array($sql_rs_ini);
    $has_rs_bidang      = $data_rs_ini['has_rs_bidang'];
    $blokir             = $_POST['blokir'];
    $tambah_data        = mysqli_query($host, "UPDATE rs_sub_bidang SET 
                            nama_sub_bidang     = '$nama_sub_bidang', 
                            blokir              = '$blokir' WHERE 
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