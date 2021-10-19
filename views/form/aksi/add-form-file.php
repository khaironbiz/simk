<?php
if(isset($_POST['id_form'])){
    $hari_ini           = date('Y-m-d H:i:s');
    $id_form            = $_POST['id_form'];
    $has_form           = $_POST['has_form'];
    $no_dokumen         = $_POST['no_dokumen'];
    $tgl_dokumen        = $_POST['tgl_dokumen'];
    $revisi_ke          = $_POST['revisi_ke'];
    //file konfigurasi
    $allowed_ext	    = array('pdf', 'jpg', 'jpeg');
    $file_size_allowed  = 10000000;
	$file_name		    = $_FILES['form_file']['name'];
	$file_ext		    = strtolower(end(explode('.', $file_name)));
	$file_size		    = $_FILES['form_file']['size'];
	$file_tmp		    = $_FILES['form_file']['tmp_name'];
    //end file konfigurasi
    $has_form_detail    = md5(uniqid());
    $form_file          = $has_form_detail.".".$file_ext;
    $sql_form_detail    = mysqli_query($host, "SELECT * FROM form_detail WHERE 
                                no_dokumen          = '$no_dokumen' and 
                                tgl_dokumen         = '$tgl_dokumen' and 
                                id_form             = '$id_form'");
    $count              = mysqli_num_rows($sql_form_detail);
    
    if($count < 1){
        if(in_array($file_ext, $allowed_ext) === true){
            if($file_size < $file_size_allowed){
                $lokasi = "../assets/files/form/".$form_file;
				$simpan_file    = move_uploaded_file($file_tmp, $lokasi);
                $input_data     = mysqli_query($host, "INSERT INTO form_detail SET 
                                    id_form             = '$id_form',
                                    form_file           = '$form_file',
                                    no_dokumen          = '$no_dokumen',
                                    tgl_dokumen         = '$tgl_dokumen',
                                    revisi_ke           = '$revisi_ke',
                                    created_at          = '$hari_ini',
                                    created_by          = '$user_check',
                                    has_form_detail     = '$has_form_detail'");
                if($input_data){
                    $_SESSION['status']="Data berhasil disimpan";
                    $_SESSION['status_info']="success";
                    echo "<script>document.location=\"$site_url/form/detail.php?id=$has_form\"</script>";
                }else{
                    $_SESSION['status']="Data berhasil disimpan";
                    $_SESSION['status_info']="success";
                    echo "<script>document.location=\"$site_url/form/detail.php?id=$has_form\"</script>";
                }
        }else{
            $_SESSION['status']="Data gagal disimpan karena file data terlalu besar";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/form/detail.php?id=$has_form\"</script>";
        }
        }else{
            $_SESSION['status']="Data gagal disimpan karena ekstensi file tidak diizinkan";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/form/detail.php?id=$has_form\"</script>";
        }
        
    }else{
        $_SESSION['status']="Data gagal disimpan karena data sudah terdaftar di sistem kami";
        $_SESSION['status_info']="danger"; 
        echo "<script>document.location=\"$site_url/form/detail.php?id=$has_form\"</script>";
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
