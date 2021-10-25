<?php
if(isset($_POST['nama_area_pelaksana'])){
    $nama_area_pelaksana    = $_POST['nama_area_pelaksana'];
    $has_rs_sub_bidang      = $_POST['key'];
    $sql_rs_sub_bidang      = mysqli_query($host, "SELECT * FROM rs_sub_bidang WHERE has_rs_sub_bidang='$has_rs_sub_bidang'");
    $data_rs_sub_bidang     = mysqli_fetch_array($sql_rs_sub_bidang);
    $id_rs                  = $data_rs_sub_bidang['id_rs'];
    $id_direktorat          = $data_rs_sub_bidang['id_direktorat'];
    $id_bidang              = $data_rs_sub_bidang['id_bidang'];
    $id_sub_bidang          = $data_rs_sub_bidang['id_rs_sub_bidang'];
    $time                   = date('Y-m-d H:i:s');
    $has_rs_area_pelaksana  = md5(uniqid());
    $tambah_data            = mysqli_query($host, "INSERT INTO rs_area_pelaksana SET
                            id_rs                   = '$id_rs',
                            id_direktorat           = '$id_direktorat',
                            id_bidang               = '$id_bidang',
                            id_sub_bidang           = '$id_sub_bidang',
                            nama_area_pelaksana     = '$nama_area_pelaksana',
                            created_by              = '$user_check',
                            created_at              = '$time',
                            has_rs_area_pelaksana   = '$has_rs_area_pelaksana'");
    if($tambah_data){
        $_SESSION['status']="Data berhasil disimpan";
        $_SESSION['status_info']="success";
            echo "<script>document.location=\"$site_url/unit/pelaksana.php?id=$has_rs_sub_bidang\"</script>";
    }else{
        
        $_SESSION['status']="Data gagal disimpan";
        $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/unit/pelaksana.php?id=$has_rs_sub_bidang\"</script>";
    }

}

?>