<?php
if(isset($_GET['id'])){
    $hari_ini           = date('Y-m-d H:i:s');
    $has_admin_data     = $_GET['id'];
    $sql_admin_data     = mysqli_query($host, "SELECT * FROM admin_data WHERE has_admin_data='$has_admin_data'");
    $count              = mysqli_num_rows($sql_admin_data);
    if($count > 0 ){
        $delete_data    = mysqli_query($host, "DELETE FROM admin_data WHERE has_admin_data='$has_admin_data'");
        if($delete_data){
            $_SESSION['status']="Data berhasil dihapus";
            $_SESSION['status_info']="success";
            echo "<script>document.location=\"$site_url/admin-data/\"</script>";
        }else{
            $_SESSION['status']="Data gagal dihapus";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/admin-data/\"</script>";
        }
    }else{
        $_SESSION['status']="Data gagal dihapus karena data tidak ditemukan pada sistem";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/admin-data/\"</script>";

    }
}
?>