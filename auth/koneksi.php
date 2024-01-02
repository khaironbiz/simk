<?php 
//koneksi ke hostinger singapore
$host = mysqli_connect("194.163.35.151", "u487816097_ppni", "@Pentagon250909#", "u487816097_data");


 if($host){
  
 } else{
  echo "Koneksi gagal!" . mysqli_connect_error();
  die();
 }
 
 ?>