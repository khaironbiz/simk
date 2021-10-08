<?php
if(isset($_POST['nama_regulasi'])){
    $hari_ini           = date('Y-m-d H:i:s');
    $id_regulasi_jenis  = $_POST['id_regulasi_jenis'];
    $has_regulasi_jenis = $_POST['has_regulasi_jenis'];
    $nama_regulasi      = $_POST['nama_regulasi'];
    $has_regulasi       = md5(uniqid());
    $sql_regulasi       = mysqli_query($host, "SELECT * FROM regulasi WHERE nama_regulasi = '$nama_regulasi'");
    $count              = mysqli_num_rows($sql_regulasi);
    if($count < 1 ){
        $input_data     = mysqli_query($host, "INSERT INTO regulasi SET 
                            id_regulasi_jenis   = '$id_regulasi_jenis',
                            nama_regulasi       = '$nama_regulasi',
                            created_at          = '$hari_ini',
                            created_by          = '$user_check',
                            has_regulasi        = '$has_regulasi'");
        if($input_data){
            echo "<script>document.location=\"$site_url/regulasi/detail.php?id=$has_regulasi_jenis\"</script>";
        }
    }
}
?>