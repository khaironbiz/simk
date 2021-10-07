<?php

include '../layout/header.php';
include 'koneksi.php';
$error = ''; // Variabel untuk menyimpan pesan error
if (isset($_POST['username'])) {
    if (empty($_POST['username'])) {
        $error = 'Username or Password is invalid';
    } else {
        // Variabel username dan password
        $username = $_POST['username'];
        $queryuser = mysqli_query(
            $host,
            "SELECT * FROM nira WHERE email='$username'"
        );
        $rows1 = mysqli_num_rows($queryuser);
        $data = mysqli_fetch_array($queryuser);
        if ($rows1 < 1) {
            echo "<script> alert(\"Maaf username $username tidak terdaftar\");</script>";
        }
        if ($rows1 > 0) {
            $url = $site_url . '/auth/reset-password.php?id=' . $data['kode'];
            echo "<script> alert(\"$url tidak terdaftar\");</script>";
            $kepada = $username; //email tujuan
            $subject = 'Reset Password'; //judul email
            $dari = "From: admin@ppni.or.id \n";
            $dari .= "Content-type: text/html \r\n";
            $pesan = 'Silahkan klik tautan dibawah untuk reset password  <br>';
            $pesan .= "
     <html>
		<body with ='350'>
		     <p>
               $url
               <a href='$url'>Reset Password</a>
               </p>
		     <table>
		          <tr>
		               <td>DPK PPNI Rumah Sakit Pusat Otak Nasional</td>
                    </tr>
		          <tr>
                         <td><img src='https://ppni.or.id/ipaymu/image/ppni.png' class='img-rounded' alt='Cinque Terre' width='84' height='84'></td>
                    </tr>
		     </table>
		</body>
	</html>";
            $kirim_email = mail($kepada, $subject, $pesan, $dari); //fungsi untuk kirim email
            if ($kirim_email) {
                header('location: ../event'); // Mengarahkan ke halaman profil
            }
        }

        mysql_close($host); // Menutup koneksi
    }
}

?>
