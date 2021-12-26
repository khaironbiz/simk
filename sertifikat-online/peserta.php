<!DOCTYPE html>
<html>
<head>
	<title>Absensi Peserta</title>
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
	  			<div class="panel-heading"><h4>Webinar The Role of Stroke Nurse in Optimizing Stroke Care</h4></div>
	 				<div class="panel-body">
						<div class="konten">
						    <div class="table-responsive">
                            <table class="table table-striped">
                            <tr>
                            	        <td>No</td>
                            	        <td>Email</td>
                            	        <td>Nama</td>
                            	        <td>Hadir(Menit)</td>
                            	        <td>Sertifikat</td>
                            	        <td>Kirim</td>
                            </tr>	    
                            
                            <?php
                                $getid = $_POST["id"];
                            	$host = "localhost";
                            	$user = "u539662686_user";
                            	$pass = "@Sql250909#";
                            	$db   = "u539662686_db";
                                $webinar    ="Webinar 1";
                            	//buat koneksi dan ambil database		
                            	$koneksi = mysql_connect($host, $user, $pass) or die("Koneksi error");
                            	$db = mysql_select_db($db) or die("database tidak ditemukan");
                            
                            	//ambil POST dan sesuaikan dengan database
                            	$ambildb = mysql_query("SELECT * FROM pelatihan_absen WHERE nama_webinar ='$webinar' and status='Yes' and has ='' order by hadir DESC LIMIT 15");
                            
                            	while ($row = mysql_fetch_array($ambildb)){
                            		$no++;
                            		$email          = $row['email'];
                            		$nilai          = mysql_fetch_assoc(mysql_query(
                            		                    "SELECT sum(hadir) as nilai FROM pelatihan_absen WHERE email ='$email'"
                            		                    ));
                            		$nilai_hadir    = $row['hadir'];
                            		$lulus          = "1:00:00";
                            ?>
                            
                                <tr>
                                    <td><? echo $no ?></td>
                                    <td><? echo  $row['email'];?></td>
                                    <td><? echo  $row['nama'];?></td>
                                    <td><? echo  $row['hadir'];?></td>
                                    <td><? if($nilai_hadir>$lulus){?><a href="certificate.php?has=<? echo  $row['has'];?>">Print</a><? } ?></td>
                                    <td>
                                        <? 
                                        if($nilai_hadir>$lulus){
                                        ?>
                                        <a href="email-kirim.php?id=<? echo  $row['id'];?>">Kirim</a>
                                        <?
                                        } 
                                        ?>
                                    </td>
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
