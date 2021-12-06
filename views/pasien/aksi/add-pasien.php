<?php
if(isset($_POST['add-pasien'])){
    $hari_ini       = date('Y-m-d H:i:s');
    $nama_pasien    = $_POST['nama_pasien'];
    $nrm            = $_POST['nrm'];
    $sex            = $_POST['sex'];
    $tgl_lahir      = $_POST['th']."-".$_POST['bln']."-".$_POST['tgl'];
    $status_nikah   = $_POST['status_nikah'];
    $nik            = $_POST['nik'];
    $agama          = $_POST['agama'];
    $has_pasien     = md5(uniqid());
    $sql_pasien     = mysqli_query($host, "SELECT * FROM pasien_db WHERE nrm = '$nrm'");
    $count          = mysqli_num_rows($sql_pasien);
    if($count < 1 ){
        $input_data     = mysqli_query($host, "INSERT INTO pasien_db SET 
                                    
                                    nama_pasien         = '$nama_pasien',
                                    nrm                 = '$nrm',
                                    tgl_lahir           = '$tgl_lahir',
                                    sex                 = '$sex',
                                    status_nikah        = '$status_nikah',
                                    agama               = '$agama',
                                    created_at          = '$hari_ini',
                                    created_by          = '$user_check',
                                    has_pasien_db       = '$has_pasien'");
        if($input_data){
            echo "<script>document.location=\"$site_url/pasien/\"</script>";
        }
    }
}
?>