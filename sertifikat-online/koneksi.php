<?php
	
	$host = "localhost";
	$user = "u539662686_user";
	$pass = "@Sql250909#";
	$db   = "u539662686_db";
	//buat koneksi dan ambil database		
	$koneksi = mysql_connect($host, $user, $pass) or die("Koneksi error");
	$db = mysql_select_db($db) or die("database tidak ditemukan");

	

?>
