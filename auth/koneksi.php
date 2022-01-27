<?php 
//koneksi ke hostinger singapore
$host = mysqli_connect("194.163.35.184", "u487816097_ppni", "domain250909", "u487816097_data");
//koneksi ke PKR Riau
//$host = mysqli_connect("103.16.133.234", "phpmyadmin", "inifgrup", "khairon_ppni");


 if($host){
  
 } else{
  echo "Koneksi gagal!" . mysqli_connect_error();
  die();
 }
 ?>