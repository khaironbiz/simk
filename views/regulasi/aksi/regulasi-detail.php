<?php
if(isset($_POST['id_regulasi'])){
    $hari_ini           = date('Y-m-d H:i:s');
    $id_regulasi_jenis  = $_POST['id_regulasi_jenis'];
    $id_regulasi        = $_POST['id_regulasi'];
    $has_regulasi       = $_POST['has_regulasi'];
    $no_dokumen         = $_POST['no_dokumen'];
    $tgl_dokumen        = $_POST['tgl_dokumen'];
    $revisi_ke          = $_POST['revisi_ke'];
    $pejabat            = $_POST['pejabat'];
    $jabatan            = $_POST['jabatan'];
    //file konfigurasi
    $allowed_ext	    = array('pdf', 'jpg', 'jpeg');
    $file_size_allowed  = 1000000;
	$file_name		    = $_FILES['file_regulasi']['name'];
	$file_ext		    = strtolower(end(explode('.', $file_name)));
	$file_size		    = $_FILES['file_regulasi']['size'];
	$file_tmp		    = $_FILES['file_regulasi']['tmp_name'];
    //end file konfigurasi
    $has_regulasi_detail= md5(uniqid());
    $regulasi_file      = $has_regulasi_detail.".".$file_ext;
    $sql_regulasi       = mysqli_query($host, "SELECT * FROM regulasi_detail WHERE 
                                no_dokumen          = '$no_dokumen' and 
                                tgl_dokumen         = '$tgl_dokumen' and 
                                id_regulasi         = '$id_regulasi'");
    $count              = mysqli_num_rows($sql_regulasi);
    
    if($count < 1){
        if(in_array($file_ext, $allowed_ext) === true){
            if($file_size < $file_size_allowed){
                $lokasi = "../assets/files/regulasi/".$regulasi_file;
				$simpan_file    = move_uploaded_file($file_tmp, $lokasi);
                $input_data     = mysqli_query($host, "INSERT INTO regulasi_detail SET 
                                    id_regulasi_jenis   = '$id_regulasi_jenis',
                                    id_regulasi         = '$id_regulasi',
                                    regulasi_file       = '$regulasi_file',
                                    no_dokumen          = '$no_dokumen',
                                    tgl_dokumen         = '$tgl_dokumen',
                                    revisi_ke           = '$revisi_ke',
                                    jabatan             = '$jabatan',
                                    pejabat             = '$pejabat',
                                    created_at          = '$hari_ini',
                                    created_by          = '$user_check',
                                    has_regulasi_detail = '$has_regulasi_detail'");
                if($input_data){
                    $_SESSION['status']="Data berhasil disimpan";
                    $_SESSION['status_info']="success";
                    echo "<script>document.location=\"$site_url/regulasi/sub-detail.php?id=$has_regulasi\"</script>";
                }else{
                    $_SESSION['status']="Data berhasil disimpan";
                    $_SESSION['status_info']="success";
                    echo "<script>document.location=\"$site_url/regulasi/sub-detail.php?id=$has_regulasi\"</script>";
                }
        }else{
            $_SESSION['status']="Data gagal disimpan karena file data terlalu besar";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/regulasi/sub-detail.php?id=$has_regulasi\"</script>";
        }
        }else{
            $_SESSION['status']="Data gagal disimpan karena ekstensi file tidak diizinkan";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/regulasi/sub-detail.php?id=$has_regulasi\"</script>";
        }
        
    }else{
        $_SESSION['status']="Data gagal disimpan karena data sudah terdaftar di sistem kami";
        $_SESSION['status_info']="danger"; 
        echo "<script>document.location=\"$site_url/regulasi/\"</script>";
    }
}
?>
