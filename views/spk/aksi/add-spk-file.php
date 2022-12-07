<?php
if(isset($_POST['id_perawat'])){
    $hari_ini           = time();
    $id_perawat         = $_POST['id_perawat'];
    $tgl_surat          = $_POST['tgl_surat'];
    $tgl_exp            = $_POST['tgl_exp'];
    $level_pk           = $_POST['level_pk'];
    //file konfigurasi
    $allowed_ext	    = array('pdf', 'jpg', 'jpeg');
    $file_size_allowed  = 10000000;
	$file_name		    = $_FILES['file']['name'];
	$file_ext		    = strtolower(end(explode('.', $file_name)));
	$file_size		    = $_FILES['file']['size'];
	$file_tmp		    = $_FILES['file']['tmp_name'];
    //end file konfigurasi
    $has                = md5(uniqid());
    $spk_file           = $has.".".$file_ext;
    $sql_spk            = mysqli_query($host, "SELECT * FROM spk_perawat WHERE 
                                id_perawat          = '$id_perawat' and 
                                tgl_surat           = '$tgl_surat'");
    $count              = mysqli_num_rows($sql_spk);
    
    if($count < 1){
        if(in_array($file_ext, $allowed_ext) === true){
            if($file_size < $file_size_allowed){
                $lokasi = "../../assets/files/spk/".$spk_file;
				$simpan_file    = move_uploaded_file($file_tmp, $lokasi);
                $input_data     = mysqli_query($host, "INSERT INTO spk_perawat SET 
                                    id_perawat      = '$id_perawat',
                                    tgl_surat       = '$tgl_surat',
                                    tgl_exp         = '$tgl_exp',
                                    file            = '$spk_file',
                                    level_pk        = '$level_pk',
                                    created_at      = '$hari_ini',
                                    created_by      = '$user_check',
                                    has             = '$has'");
                if($input_data){
                    $_SESSION['status']="Data berhasil disimpan";
                    $_SESSION['status_info']="success";
                    echo "<script>document.location=\"$site_url/spk\"</script>";
                }else{
                    $_SESSION['status']="Data berhasil disimpan";
                    $_SESSION['status_info']="success";
                    echo "<script>document.location=\"$site_url/spk\"</script>";
                }
        }else{
            $_SESSION['status']="Data gagal disimpan karena file data terlalu besar";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/spk\"</script>";
        }
        }else{
            $_SESSION['status']="Data gagal disimpan karena ekstensi file tidak diizinkan";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/spk\"</script>";
        }
        
    }else{
        $_SESSION['status']="Data gagal disimpan karena data sudah terdaftar di sistem kami";
        $_SESSION['status_info']="danger"; 
        echo "<script>document.location=\"$site_url/spk\"</script>";
    }
}
if(isset($_GET['key'])){
    $has_form_detail    = $_GET['key'];
    $has_form           = $_GET['id'];
    $status             = $_GET['status'];
    if($status=="blokir"){
        $status_baru    = 1;
    }if($status=="aktif"){
        $status_baru    = 0;
    }
    $update_form_detail = mysqli_query($host, "UPDATE form_detail SET status='$status_baru' WHERE has_form_detail='$has_form_detail'");
    if($update_form_detail){
        $_SESSION['status']="Data berhasil diupdate";
        $_SESSION['status_info']="success"; 
        echo "<script>document.location=\"$site_url/form/detail.php?id=$has_form\"</script>";
    }else{
        $_SESSION['status']="Data gagal diupdate, mohon periksa lagi";
        $_SESSION['status_info']="danger"; 
        echo "<script>document.location=\"$site_url/form/detail.php?id=$has_form\"</script>";
    }
}
?>
