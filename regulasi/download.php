<?php
include("../auth/site.php");
include("../auth/koneksi.php");
$key        = $_GET['id'];
$sql_key    = mysqli_query($host,"SELECT * FROM regulasi_detail WHERE has_regulasi_detail='$key'");
$data       = mysqli_fetch_array($sql_key);
$url        = $site_url."/assets/files/".$data['regulasi_file'];

header("location:$url");

?>