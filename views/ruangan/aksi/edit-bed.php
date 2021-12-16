<?php
if(isset($_POST['tutup_bed'])){
    $hari_ini           = date('Y-m-d H:i:s');
    $has_kamar_bed      = $_POST['id_bed'];
    $blokir             = $_POST['blokir'];;
    $password           = $_POST['password'];
    $has_ruangan_kamar  = $_POST['tutup_bed'];
    $sql_nira           = mysqli_query($host,"SELECT * FROM nira WHERE nira='$user_check' AND pass='$password'");
    $count_nira         = mysqli_num_rows($sql_nira);
    
    if($count_nira > 0 ){
        $input_data     = mysqli_query($host, "UPDATE ruangan_kamar_bed SET 
                                    blokir          = '$blokir',
                                    updated_at      = '$hari_ini' WHERE
                                    has_kamar_bed   = '$has_kamar_bed'");
        if($input_data){
            $_SESSION['status']="Data berhasil disimpan";
            $_SESSION['status_info']="success";
            echo "<script>document.location=\"$site_url/ruangan/edit-kamar.php?key=$has_ruangan_kamar\"</script>";
        }else{
            $_SESSION['status']="Data gagal disimpan";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/ruangan/edit-kamar.php?key=$has_ruangan_kamar\"</script>";
        }
    }else{
        $_SESSION['status']="Data gagal disimpan : <strong>WRONG PASSWORD</strong>";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/ruangan/edit-kamar.php?key=$has_ruangan_kamar\"</script>";
    }
}

?>