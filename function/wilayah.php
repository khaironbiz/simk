<?php
function provinsi($id){
    include('../auth/koneksi.php');
    $sql        = mysqli_query($host,"SELECT * FROM id_desa WHERE lokasi_propinsi = '$id' AND lokasi_kabupatenkota = '0'");
    if(mysqli_num_rows($sql)>0){
        $data   = mysqli_fetch_array($sql);
        $master = $data['lokasi_nama'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function kota($id){
    include('../auth/koneksi.php');
    $sql        = mysqli_query($host,"SELECT * FROM id_desa WHERE lokasi_kabupatenkota = '$id' AND lokasi_kecamatan = '0'");
    if(mysqli_num_rows($sql)>0){
        $data   = mysqli_fetch_array($sql);
        $master = $data['lokasi_nama'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function kecamatan($id){
    include('../auth/koneksi.php');
    $sql        = mysqli_query($host,"SELECT * FROM id_desa WHERE lokasi_kecamatan = '$id' AND lokasi_kelurahan = '0'");
    if(mysqli_num_rows($sql)>0){
        $data   = mysqli_fetch_array($sql);
        $master = $data['lokasi_nama'];
    }else{
        $master = "NULL";
    }
    return $master;
}

?>
