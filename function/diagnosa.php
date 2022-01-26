<?php
function dx_medis($id){
    include('../auth/koneksi.php');
    $sql        = mysqli_query($host,"SELECT * FROM dx_medis WHERE id = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data   = mysqli_fetch_array($sql);
        $master = $data['dx_medis'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function dx_kep($id){
    include('../auth/koneksi.php');
    $sql        = mysqli_query($host,"SELECT * FROM dx_kep WHERE id = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data   = mysqli_fetch_array($sql);
        $master = $data['dx_kep'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function dokter($id){
    include('../auth/koneksi.php');
    $sql        = mysqli_query($host,"SELECT * FROM dokter WHERE id_dokter = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data   = mysqli_fetch_array($sql);
        $master = $data['nama_dokter'];
    }else{
        $master = "NULL";
    }
    return $master;
}
?>