<!DOCTYPE html>
<html>
<head>
	<title>Edit Nama</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <?
    include('koneksi.php');
    $has    = $_GET['key'];
    
    $ambildb = mysql_query("SELECT * FROM pelatihan_absen WHERE has ='$has'");

	$row = mysql_fetch_array($ambildb);
		$hasil  = $row['nama'];
		$email  = $row['email'];
		$id_ini = $row['id'];
		$count_hasil    = mysql_num_rows($ambildb);
    
    ?>
</head>
<body>
	<div class="container">
		<div class="col-md-8 col-md-offset-3">
			<div class="panel panel-primary">
	  			<div class="panel-heading"><h2>Nursing Care of Stroke Patient</h2></div>
	 				<div class="panel-body">
						<div class="konten">
						    <div class="table-responsive">

							<form action="" method="post">
								<strong>Email</strong><br>
								<input type="text" class="form-control" name="email" readonly value='<? echo $row['email'] ?>'></input>
								<strong>Nama Lama</strong><br>
								<input type="text" class="form-control" name="nama" readonly value='<? echo $row['nama'] ?>'></input>
								<strong>Revisi Nama</strong><br>
								<input type="text" class="form-control" name="nama_revisi" placeholder="Revisi Nama" required></input><br>
								<input type='checkbox' required> Revisi Nama Hanya bisa Sekali mohon pastikan nama sudah sesuai</input><br>
								<input type="submit" class="btn btn-primary" value="Revisi Nama" name="certificate"></input><br><br><br>
							</form>
<?
if($_POST['email']){
$email_post = $_POST['email'];
$nama_post  = $_POST['nama_revisi'];
$revisi     = mysql_fetch_array(mysql_query("SELECT * FROM pelatihan_absen WHERE email ='$email_post' and nama_webinar='Webinar 1'"));
$hadir_post = mysql_fetch_array(mysql_query(
            "SELECT sum(hadir) as hadir FROM pelatihan_absen WHERE email ='$email_post'"
            ));
$hadir_ini  = $revisi['hadir'];
$has_post   = $revisi['has'];
$time       = time();
$has_revisi = md5($time);
$update     = mysql_query("update pelatihan_absen set 
                nama            ='$nama_post',
                edit_nama       ='$time' where 
                email           ='$email_post' and
                edit_nama       ='' and
                nama_webinar    ='Webinar 1'");
$sertifikat = "https://hipeni.or.id/sertifikat-online/stroke-webinar/certificate.php?has=".$has_post;
$rubah      = "https://hipeni.or.id/sertifikat-online/stroke-webinar/index.php";
    if ($update)
          { 
           
			$kepada         = "$email_post";    //email tujuan 
			$subject        = "Revisi Nama Sertifikat Webinar The Role of Stroke Nurse in Optimizing Stroke Care";       //judul email 
            $dari	        = "From: admin@hipeni.or.id \n";
		        $dari	.= "Content-type: text/html \r\n";

			$pesan	= "<br>Revisi Nama Sertifikat Elektronik <br />";
		        $pesan	.= "<html>
		        <body with ='350'>
		        <table> 
		        <tr> 
		            <td colspan='3'>Permohonan Revisi Nama Telah Kami Terima, mohon cek kembali sertifikat anda, perhatikan besar kecil huruf dan tanda baca!!!!!! </td>
		        </tr>
		        <tr><td>Nama </td><td>: $nama_post </td></tr>
		        <tr><td>Email </td><td>: $email_post </td></tr>
		        <tr><td>Lama Mengikuti </td><td>: $hadir_ini</td></tr>
		        <tr><td>Link Sertifikat </td><td>:<a href='$sertifikat'>Klik Disini</a> </td></tr>
		        <tr><td>Link Manual </td><td>: $sertifikat</td></tr>
		        <tr><td>&nbsp;</td></tr>
		        <tr><td>&nbsp;</td></tr>
		        <tr><td>&nbsp;</td></tr>
		        </table>
		        <table>
		        <tr>
		        <td>Pastikan clear cache pada browser anda agar tampil sertifikat baru, atau ginakan komputer/hp lain untuk mengunduh sertifikat elektronik anda</td><br/></tr>
		        <tr>
		        <td>Pengurus Pusat Himpunan Perawat Neurosains Indonesia</td>
		        </tr>
		        </table>
		        </body>
		        </html>";

			mail($kepada, $subject, $pesan, $dari);    //fungsi untuk kirim email	
            echo "<script>document.location=\"index.php\"</script>"; 
    }	
}
?>
	
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>