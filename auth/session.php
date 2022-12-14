<?php
date_default_timezone_set("Asia/Jakarta");
include("koneksi.php");
include("site.php");
session_start();
if(isset($_SESSION['login_user'])){
    $user_check     = $_SESSION['login_user'];
    $sql_pengguna   = mysqli_query($host,"SELECT * FROM nira WHERE nira = '$user_check'");
    $data_pengguna  = mysqli_fetch_array($sql_pengguna);

}else{
    echo "<script>document.location=\"$site_url\"</script>";
}

?>