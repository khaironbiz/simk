<?php 
//koneksi ke local
$host = mysqli_connect("153.92.7.151", "u487816097_ppni", "domain250909", "u487816097_data");
//koneksi ke hosting
//$host = mysqli_connect("localhost", "u853814933_uas", "Sql250909", "u853814933_uas");

 if($host){
  
 } else{
  echo "Koneksi gagal!" . mysqli_connect_error();
  die();
 }
 ?>