<?php
if(isset($_POST['edit_data_dasar'])){
    $has_pasien_daftar_ruangan  = $_POST['edit_data_dasar'];
    $nrm                        = $_POST['nrm'];
    $nama_pasien                = $_POST['nama_pasien'];
    $nik                        = $_POST['nik'];
    $sex                        = $_POST['sex'];
    $tgl_lahir                  = $_POST['tgl_lahir'];
    $hp                         = $_POST['hp'];
    $email                      = $_POST['email'];
    $status_nikah               = $_POST['status_nikah'];
    $pekerjaan                  = $_POST['pekerjaan'];
    $pendidikan                 = $_POST['pendidikan'];
    
    $agama                      = $_POST['agama'];
    $prov                       = $_POST['prov'];
    $kota                       = $_POST['kota'];
    $kec                        = $_POST['kec'];
    $kel                        = $_POST['kel'];
    $alamat                     = $_POST['alamat'];
    $update_pasien              = mysqli_query($host,"UPDATE pasien_db SET 
                nama_pasien     = '$nama_pasien',
                nik             = '$nik',
                sex             = '$sex',
                tgl_lahir       = '$tgl_lahir',
                hp              = '$hp',
                email           = '$email',
                status_nikah    = '$status_nikah',
                pekerjaan       = '$pekerjaan',
                pendidikan      = '$pendidikan',
                agama           = '$agama',
                prov            = '$prov',  
                kota            = '$kota', 
                kec             = '$kec',             
                kel             = '$kel',  
                alamat          = '$alamat' WHERE
                nrm             = '$nrm'");
    if($update_pasien){
        $_SESSION['status']="Data berhasil disimpan";
        $_SESSION['status_info']="success";
        echo "<script>document.location=\"$site_url/pasien/detail.php?key=$has_pasien_daftar_ruangan\"</script>";
    }else{
        $_SESSION['status']="Data gagal disimpan";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/pasien/detail.php?key=$has_pasien_daftar_ruangan\"</script>";
    }
}

?>