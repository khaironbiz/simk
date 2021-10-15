<?php
include("../auth/session.php");
$time               = date('Y-m-d H:i:s');
$key                = $_GET['id'];
$sql_key            = mysqli_query($host,"SELECT * FROM form_detail WHERE has_form_detail='$key'");
$data               = mysqli_fetch_array($sql_key);
$id_form_detail     = $data['id_form_detail'];
$id_form            = $data['id_form'];
$ip                 = $_SERVER['REMOTE_ADDR'];
$url                = $site_url."/assets/files/form/".$data['form_file'];
$hit_num            = $data['count_hit']+1;
$has_form_downloader= md5(uniqid());
$update_data        = mysqli_query($host, "UPDATE form_detail SET 
                                count_hit           = '$hit_num',
                                last_hit            = '$time' WHERE
                                has_form_detail     = '$key'");
$downloader         = mysqli_query($host,"INSERT INTO form_downloader SET
                                id_form             = '$id_form',
                                id_form_detail      = '$id_form_detail',
                                id_perawat          = '$user_check',
                                waktu_download      = '$time',
                                ip                  = '$ip',
                                has_form_downloader = '$has_form_downloader'");
if($update_data){
header("location:$url");
}


?>