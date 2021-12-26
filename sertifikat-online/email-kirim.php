<html>
<body>
<meta http-equiv="Page-Enter" content="blendTrans(Duration=1.0)">
<?php
include('koneksi.php');
$id         = $_GET['id'];
$peserta    = mysql_fetch_array(mysql_query("SELECT * FROM pelatihan_absen where id='$id'"));
$email      = $peserta['email'];
$nilai      = mysql_fetch_assoc(mysql_query(
                            	"SELECT sum(hadir) as nilai FROM pelatihan_absen WHERE email ='$email'"
                            	));
$hadir      = $peserta['hadir'];
$nama       = $peserta['nama'];
$time       = time();
$has        = md5($time);
$webinar    = "Webinar 1";
$update     = mysql_query("update pelatihan_absen set has='$has' where email='$email' and nama_webinar='$webinar'");
$sertifikat = "https://hipeni.or.id/sertifikat-online/stroke-webinar/certificate.php?has=".$has;
$rubah      = "https://hipeni.or.id/sertifikat-online/stroke-webinar/index.php";
        if ($update)
          { 
           
			$kepada         = "$email";    //email tujuan 
			$subject        = "Sertifikat Webinar The Role of Stroke Nurse in Optimizing Stroke Care";       //judul email 
            $dari	        = "From: admin@hipeni.or.id \n";
		    $dari	        .= "Content-type: text/html \r\n";

			$pesan	= "<br> Sertifikat Elektronik <br />";
		        $pesan	.= "<html>
		        <body with ='350'>
		        <table> 
		        <tr> 
		            <td colspan='3'>Terimakasih anda telah mengikuti Webinar The Role of Stroke Nurse in Optimizing Stroke Care yang diselenggarakan oleh Pengurus Pusat Himpunan Perawat Neurosains Indonesia pada tanggal 29 Juni 2020</td>
		        </tr>
		        <tr><td>Nama </td><td>: $nama </td></tr>
		        <tr><td>Email </td><td>: $email </td></tr>
		        <tr><td>Lama Mengikuti </td><td>: $hadir </td></tr>
		        <tr><td>Link Sertifikat </td><td>:<a href='$sertifikat'>Klik Disini</a> </td></tr>
		        <tr><td>Link Manual </td><td>: $sertifikat</td></tr>
		        <tr><td>Edit Nama </td><td>: <a href='$rubah'>Klik Disini</a> </td></tr>
		        <tr><td>&nbsp;</td></tr>
		        <tr><td>&nbsp;</td></tr>
		        <tr><td>&nbsp;</td></tr>
		        </table>
		        <table>
		        <tr>
		        <td>Pengurus Pusat Himpunan Perawat Neurosains Indonesia</td>
		        
		        </table>
		        </body>
		        </html>";

			mail($kepada, $subject, $pesan, $dari);    //fungsi untuk kirim email	
            echo "<script>document.location=\"peserta.php\"</script>"; 
			echo "<script>";
            echo "if (window.close())";
            echo "{";
            echo "window.write(";
            include"konek.php";
            mysql_close($conn);
            echo "); }";
            echo "else {";
            echo "history.back();";
            echo "}";
            echo "</script>";            
          }      			            
           else
              { 
                echo "<script> alert(\"Data Gagal Diupdate\");history.go(-1)</script>";      
              }
?>
</body>
</html>