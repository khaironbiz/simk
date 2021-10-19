<?php
if(isset($_POST['has_regulasi_detail'])){
    $hari_ini           = date('Y-m-d H:i:s');
    $has_regulasi_detail= $_POST['has_regulasi_detail'];
    $has_regulasi       = $_POST['has_regulasi_hapus'];
    $password           = $_POST['password'];
    $sql_nira           = mysqli_query($host,"SELECT * FROM nira WHERE nira='$user_check' and pass='$password'");
    $count_nira         = mysqli_num_rows($sql_nira);
    $sql_regulasi       = mysqli_query($host, "SELECT * FROM regulasi_detail WHERE has_regulasi_detail = '$has_regulasi_detail'");
    $count              = mysqli_num_rows($sql_regulasi);

    if($count_nira > 0){
        if($count > 0 ){
            //hapus file
            $target = "../assets/files/regulasi/".$has_regulasi_detail.".pdf";
            if(file_exists($target)){
                unlink($target);
            }
            
            $delete     = mysqli_query($host, "DELETE FROM regulasi_detail WHERE has_regulasi_detail = '$has_regulasi_detail'");
            if($delete){
                $_SESSION['status']="Data berhasil dihapus";
                $_SESSION['status_info']="success";
                echo "<script>document.location=\"$site_url/regulasi/sub-detail.php?id=$has_regulasi\"</script>";
            }else{
                $_SESSION['status']="Data gagal dihapus";
                $_SESSION['status_info']="danger";
                echo "<script>document.location=\"$site_url/regulasi/sub-detail.php?id=$has_regulasi\"</script>";
            }
        }
    }else{
        $_SESSION['status']="Data gagal dihapus karena anda tidak berhak menghapus, pastikan password yang anda masukan sesuai";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/regulasi/sub-detail.php?id=$has_regulasi\"</script>";
    }
}
?>