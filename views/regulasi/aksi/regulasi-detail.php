<?php
if(isset($_POST['id_regulasi'])){
    $hari_ini           = date('Y-m-d H:i:s');
    $id_regulasi_jenis  = $_POST['id_regulasi_jenis'];
    $id_regulasi        = $_POST['id_regulasi'];
    $has_regulasi       = $_POST['has_regulasi'];
    $no_dokumen         = $_POST['no_dokumen'];
    $tgl_dokumen        = $_POST['tgl_dokumen'];
    $revisi_ke          = $_POST['revisi_ke'];
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
    echo "<script> alert(\"File $file_ext\");</script>"; 
    if($count < 1){
        if($file_size < $file_size_allowed){
                $lokasi = "../assets/files/regulasi/".$regulasi_file;
				move_uploaded_file($file_tmp, $lokasi);
                $input_data     = mysqli_query($host, "INSERT INTO regulasi_detail SET 
                                id_regulasi_jenis   = '$id_regulasi_jenis',
                                id_regulasi         = '$id_regulasi',
                                regulasi_file       = '$regulasi_file',
                                no_dokumen          = '$no_dokumen',
                                tgl_dokumen         = '$tgl_dokumen',
                                revisi_ke           = '$revisi_ke',
                                created_at          = '$hari_ini',
                                created_by          = '$user_check',
                                has_regulasi_detail = '$has_regulasi_detail'");
                if($input_data){
                    echo "<script>document.location=\"$site_url/regulasi\"</script>";
                }else{
                    echo "<script> alert(\"data gagal ditambahkan\");</script>"; 
                }
        }else{
            echo "<script> alert(\"File data terlalu besar\");</script>"; 
        }
    }else{
        echo "<script> alert(\"Data Sudah terdaftar\");</script>"; 
    }
}
?>
