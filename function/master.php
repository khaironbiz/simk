<?php
function master($id){
   include('../auth/koneksi.php');
   $sql      = mysqli_query($host,"SELECT * FROM db_master WHERE id = '$id'");
   $data     = mysqli_fetch_array($sql);
   $master   = $data['nama_master'];
   return $master;
}
function sub_master($id){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM db_sub_master WHERE id = '$id'");
    $data     = mysqli_fetch_array($sql);
    $master   = $data['nama_submaster'];
    return $master;
}
?>
