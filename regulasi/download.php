<?php
include("../auth/session.php");
$time               = date('Y-m-d H:i:s');
$key                = $_GET['id'];
$sql_key            = mysqli_query($host,"SELECT * FROM regulasi_detail WHERE has_regulasi_detail='$key'");
$data               = mysqli_fetch_array($sql_key);
$id_regulasi_detail = $data['id_regulasi_detail'];
$id_regulasi        = $data['id_regulasi'];
$id_regulasi_jenis  = $data['id_regulasi_jenis'];
$url                = $site_url."/../ppni/assets/files/regulasi/".$data['regulasi_file'];
$hit_num            = $data['count_hit']+1;
$update_data        = mysqli_query($host, "UPDATE regulasi_detail SET 
                                count_hit           = '$hit_num',
                                last_hit            = '$time' WHERE
                                has_regulasi_detail = '$key'");
$downloader         = mysqli_query($host,"INSERT INTO regulasi_downloader SET
                                id_regulasi_jenis   = '$id_regulasi_jenis',
                                id_regulasi         = '$id_regulasi',
                                id_regulasi_detail  = '$id_regulasi_detail',
                                id_perawat          = '$user_check',
                                waktu_download      = '$time'");
if($update_data){
header("location:$url");
}


?>