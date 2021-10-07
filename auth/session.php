<?php
include('koneksi.php');
session_start();// Memulai Session
// Menyimpan Session
$user_check=$_SESSION['login_user'];
// Ambil nama karyawan berdasarkan username karyawan dengan mysql_fetch_assoc
$ses_sql    = mysqli_query($host,"select * from nira where nira='$user_check' and blokir='N'");
$row        = mysqli_fetch_assoc($ses_sql);
//$login_session =$row['nama'];

if(!isset($login_session)){
mysqli_close($host); // Menutup koneksi
header('Location: ../index.php'); // Mengarahkan ke Home Page
}

?>