<?php

function pasien_daftar_has($has_px_daftar){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM pasien_daftar WHERE has_px_daftar = '$has_px_daftar'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['nrm'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function key_trx($has_px_daftar){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM pasien_daftar WHERE has_px_daftar = '$has_px_daftar'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['key_trx'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function nama_pasien($nrm){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM pasien_db WHERE nrm = '$nrm'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['nama_pasien'];
    }else{
        $master = "NULL";
    }
    return $master;
}

?>