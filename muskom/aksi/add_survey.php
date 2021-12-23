<?php
if(isset($_POST['add_survey'])){
    $has_muskom_survey  = md5(uniqid());
    $today              = date('Y-m-d H:i:s');
    $calon_pertama      = $_POST['perawat1'];
    $calon_kedua        = $_POST['perawat2'];
    $calon_ketiga       = $_POST['perawat3'];
    $nilai1             = $_POST['nilai1'];
    $nilai2             = $_POST['nilai2'];
    $nilai3             = $_POST['nilai3'];
    if($calon_pertama == $calon_kedua || $calon_pertama ==  $calon_ketiga || $calon_kedua==$calon_ketiga){
        $error  = "Pilihan Tidak Boleh Sama";
    }else{
        $tambah_pertama     = mysqli_query($host,"INSERT INTO muskom_survey SET
                            nilai_calon         = '$nilai1',
                            sesi                = '1',
                            nama_calon          = '$calon_pertama',
                            created_at          = '$today',
                            has_muskom_survey   = '$has_muskom_survey'");
        $has_muskom_survey  = md5(uniqid());
        $today              = date('Y-m-d H:i:s');
        $tambah_kedua     = mysqli_query($host,"INSERT INTO muskom_survey SET
                            nilai_calon         = '$nilai2',
                            sesi                = '1',
                            nama_calon          = '$calon_kedua',
                            created_at          = '$today',
                            has_muskom_survey   = '$has_muskom_survey'");
        $has_muskom_survey  = md5(uniqid());
        $today              = date('Y-m-d H:i:s');
        $tambah_ketiga     = mysqli_query($host,"INSERT INTO muskom_survey SET
                            nilai_calon         = '$nilai3',
                            sesi                = '1',
                            nama_calon          = '$calon_ketiga',
                            created_at          = '$today',
                            has_muskom_survey   = '$has_muskom_survey'");
            
    }
}


?>