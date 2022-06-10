<?php
include 'site.php';
include 'koneksi.php';

session_start(); // Memulai Session
$error = ''; // Variabel untuk menyimpan pesan error
if (isset($_POST['username'])) {
    // Variabel username dan password
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $queryuser  = mysqli_query($host,"select * from nira where email='$username'");
    $rows1      = mysqli_num_rows($queryuser);
    $query      = mysqli_query($host,"select * from nira where pass='$password' AND email='$username' and blokir='N'");
    $rows       = mysqli_num_rows($query);
    $nira       = mysqli_fetch_array($query);
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = 'Username or Password is invalid';
        //echo "<script> alert(\"$error\");</script>";
        $_SESSION['status']     ="username or password is null";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url\"</script>";
    }elseif($rows1 < 1){
            $_SESSION['status']     = "Email tidak terdaftar";
            $_SESSION['status_info']= "danger";
            echo "<script>document.location=\"$site_url\"</script>";
        }elseif($rows == 1){
            $_SESSION['login_user'] = $nira['nira']; // Membuat Sesi/session
            $_SESSION['email']      = $nira['email']; // Membuat Sesi/session
            $_SESSION['status']     = "Login Suksess";
            $_SESSION['status_info']= "success";
            //send email
            // the message
            $email_penerima = $nira['email'];
            $nama_penerima  = $nira['nama'];
            $to             = $email_penerima;
            $subject        = "Notifikasi Login";
            $txt            = "Login Sukses";
            $headers        = "From: admin@ppni.or.id" . "\r\n" .
            "CC: khaironbiz@yahoo.com";
            mail($to,$subject,$txt,$headers);
                        
            header("location: $site_url/validasi/"); // Mengarahkan ke halaman profil
        }elseif ($rows < 1) {
            $_SESSION['status']     = "Password tidak sesuai";
            $_SESSION['status_info']= "danger";
            //echo "<script> alert(\"Maaf kombinasi username dan pasword tidak sesuai \");</script>";
            echo "<script>document.location=\"$site_url\"</script>";
        }
        mysql_close($host); // Menutup koneksi
    }


?>
