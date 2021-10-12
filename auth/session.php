<?php
date_default_timezone_set("Asia/Jakarta");
include("koneksi.php");
include("site.php");
session_start();
$user_check     = $_SESSION['login_user'];
$sql_pengguna   = mysqli_query($host,"SELECT * FROM nira WHERE nira = '$user_check'");
$data_pengguna  = mysqli_fetch_array($sql_pengguna);
if(!$user_check){
    echo "<script>document.location=\"$site_url\"</script>";
}
?>