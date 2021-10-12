<?php
include("koneksi.php");
include("site.php");
session_start();
$user_check=$_SESSION['login_user'];
if(!$user_check){
    echo "<script>document.location=\"$site_url\"</script>";
}
?>