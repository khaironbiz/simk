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
function pasien_key_trx($key_trx){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM pasien_daftar WHERE key_trx = '$key_trx'");
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
function key_trx_ruangan($has_pasien_daftar_ruangan){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM pasien_daftar_ruangan WHERE has_pasien_daftar_ruangan = '$has_pasien_daftar_ruangan'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['key_trx'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function has_px_daftar($key_trx){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM pasien_daftar WHERE key_trx = '$key_trx'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['has_px_daftar'];
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