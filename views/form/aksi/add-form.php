<?php
if(isset($_POST['nama_form'])){
    $hari_ini       = date('Y-m-d H:i:s');
    $nama_form      = $_POST['nama_form'];
    $has_form       = md5(uniqid());
    $sql_form       = mysqli_query($host, "SELECT * FROM form WHERE nama_form='$nama_form'");
    $count          = mysqli_num_rows($sql_form);
    if($count < 1 ){
        $input_data     = mysqli_query($host, "INSERT INTO form SET 
                            nama_form       = '$nama_form',
                            created_at      = '$hari_ini',
                            created_by      = '$user_check',
                            has_form        = '$has_form'");
        if($input_data){
            $_SESSION['status']="Data berhasil disimpan";
            $_SESSION['status_info']="success";
            echo "<script>document.location=\"$site_url/form/\"</script>";
        }else{
            $_SESSION['status']="Data gagal disimpan";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/form/\"</script>";
        }
    }else{
        $_SESSION['status']="Data gagal disimpan karena data sudah terdaftar di sistem";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/form/\"</script>";

    }
}
?>