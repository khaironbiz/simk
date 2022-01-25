<?php
function perawat($nira){
    include('../auth/koneksi.php');
    $sql        = mysqli_query($host,"SELECT * FROM nira WHERE nira = '$nira'");
    if(mysqli_num_rows($sql)>0){
        $data   = mysqli_fetch_array($sql);
        $master = $data['nama'];
    }else{
        $master = "NULL";
    }
    return $master;
}

?>