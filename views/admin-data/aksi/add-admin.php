<?php
if(isset($_POST['nira'])){
    $hari_ini           = date('Y-m-d H:i:s');
    $id_perawat         = $_POST['nira'];
    $has_admin_data     = md5(uniqid());
    $sql_admin_data     = mysqli_query($host, "SELECT * FROM admin_data WHERE id_perawat='$id_perawat'");
    $count              = mysqli_num_rows($sql_admin_data);
    if($count < 1 ){
        $input_data     = mysqli_query($host, "INSERT INTO admin_data SET 
                            id_perawat          = '$id_perawat',
                            created_at          = '$hari_ini',
                            created_by          = '$user_check',
                            has_admin_data      = '$has_admin_data'");
        if($input_data){
            $_SESSION['status']="Data berhasil disimpan";
            $_SESSION['status_info']="success";
            echo "<script>document.location=\"$site_url/admin-data/\"</script>";
        }else{
            $_SESSION['status']="Data gagal disimpan";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/admin-data/\"</script>";
        }
    }else{
        $_SESSION['status']="Data gagal disimpan karena data sudah terdaftar di sistem";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/admin-data/\"</script>";

    }
}
?>