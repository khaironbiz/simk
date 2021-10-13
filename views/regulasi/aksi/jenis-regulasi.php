<?php
if(isset($_POST['regulasi_jenis'])){
    $hari_ini           = date('Y-m-d H:i:s');
    $regulasi_jenis     = $_POST['regulasi_jenis'];
    $has_regulasi_jenis = md5(uniqid());
    $sql_regulasi_jenis = mysqli_query($host, "SELECT * FROM regulasi_jenis WHERE jenis_regulasi='$regulasi_jenis'");
    $count              = mysqli_num_rows($sql_regulasi_jenis);
    if($count < 1 ){
        $input_data     = mysqli_query($host, "INSERT INTO regulasi_jenis SET 
                            jenis_regulasi      = '$regulasi_jenis',
                            created_at          = '$hari_ini',
                            created_by          = '$user_check',
                            has_regulasi_jenis  = '$has_regulasi_jenis'");
        if($input_data){
            $_SESSION['status']="Data berhasil disimpan";
            $_SESSION['status_info']="success";
            echo "<script>document.location=\"$site_url/regulasi/\"</script>";
        }else{
            $_SESSION['status']="Data gagal disimpan";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/regulasi/\"</script>";
        }
    }else{
        $_SESSION['status']="Data gagal disimpan karena data sudah terdaftar di sistem";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/regulasi/\"</script>";

    }
}
?>