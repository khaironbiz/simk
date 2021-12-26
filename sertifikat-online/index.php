<!DOCTYPE html>
<html>
<head>
	<title>Certificate Online</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="container">
		<div class="col-md-12 ">
			<div class="panel panel-primary">
	  			<div class="panel-heading"><h4>The Role of Stroke Nurse in Optimizing Stroke Care</h4></div>
	 				<div class="panel-body">
						<div class="konten">
						    <div class="table-responsive">

							<form action="index.php" method="post">
								<strong>Masukkan Email</strong><br>
								<input type="text" class="form-control" name="id" placeholder="Email" ></input>
								<input type="submit" class="btn btn-primary" value="Check" name="certificate"></input><br><br><br>
							</form>
	
<table class="table table-striped">
<tr>
	        <td>Email</td>
	        <td>Nama</td>
	        <td>Masuk</td>
	        <td>Keluar</td>
	        <td>Sertifikat</td>
	        <td>Hadir</td>
	        <td>Edit Nama</td>
</tr>	    

<?php
    $getid = $_POST["id"];
	$host = "localhost";
	$user = "u539662686_user";
	$pass = "@Sql250909#";
	$db   = "u539662686_db";
if($_POST["id"]){
	//buat koneksi dan ambil database		
	$koneksi = mysql_connect($host, $user, $pass) or die("Koneksi error");
	$db = mysql_select_db($db) or die("database tidak ditemukan");
	$webinar    ="Webinar 1";

	//ambil POST dan sesuaikan dengan database
	$ambildb = mysql_query("SELECT * FROM pelatihan_absen WHERE nama_webinar='$webinar' and email ='$getid'");
}
	while ($row = mysql_fetch_array($ambildb)){
		$hasil  = $row['nama'];
		$email  = $row['email'];
		$id_ini = $row['id'];
		$count_hasil    = mysql_num_rows($ambildb);
		$hadir  = mysql_fetch_array(mysql_query(
            "SELECT sum(hadir) as hadir FROM pelatihan_absen WHERE email ='$email'"
            ));
?>

    <tr>
        <td><? echo  $row['email'];?></td>
        <td><? echo  $row['nama'];?></td>
        <td><? echo  $row['time_joint'];?></td>
        <td><? echo  $row['time_leave'];?></td>
        <td><? if($row['status'] !=''){ ?><a href="certificate.php?has=<? echo  $row['has'];?>">Print</a><? }?></td>
        <td><? if($row['status'] !=''){echo $row['hadir'];}?></td>
        <td><? if($row['status'] !=''){ ?><a href="nama-edit.php?key=<? echo  $row['has'];?>">Edit Nama</a><? }?></td>
    </tr>

<?
	}

?>
</table>	
	
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
