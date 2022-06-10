<?php

$error = ''; // Variabel untuk menyimpan pesan error
if (isset($_POST['username'])) {
    if (empty($_POST['username'])) {
        $error = 'Username or Password is invalid';
    } else {
        // Variabel username dan password
        $username = $_POST['username'];
        $queryuser = mysqli_query($host, "SELECT * FROM nira WHERE email='$username'");
        $rows1 = mysqli_num_rows($queryuser);
        $data = mysqli_fetch_array($queryuser);
        if ($rows1 < 1) {
            echo "<script> alert(\"Maaf username $username tidak terdaftar\");</script>";
        }
        if ($rows1 > 0) {
            $url        = $site_url . '/auth/reset-password.php?id=' . $data['kode'];
            $kepada     = $username; //email tujuan
            $subject    = 'Reset Password'; //judul email
            $dari       = "From: admin@ppni.or.id \n";
            $dari       .= "Content-type: text/html \r\n";
            $pesan      = 'Silahkan klik tautan dibawah untuk reset password : '.$url;
            $kirim_email = mail($kepada, $subject, $pesan, $dari); //fungsi untuk kirim email
            if ($kirim_email) {
                header("location: $site_url"); // Mengarahkan ke halaman profil
            }
        }

        mysql_close($host); // Menutup koneksi
    }
}

?>
