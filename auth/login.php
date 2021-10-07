<?php
include 'site.php';
include 'koneksi.php';
session_start(); // Memulai Session
$error = ''; // Variabel untuk menyimpan pesan error
if (isset($_POST['username'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = 'Username or Password is invalid';
        echo "<script> alert(\"Data tidak boleh kosong\");</script>";
        echo "<script>document.location=\"$site_url\"</script>";
    } else {
        // Variabel username dan password
        $username = $_POST['username'];
        $password = $_POST['password'];

        $queryuser = mysqli_query(
            $host,
            "select * from nira where email='$username'"
        );
        $rows1 = mysqli_num_rows($queryuser);

        if ($rows1 < 1) {
            echo "<script> alert(\"Maaf username $username tidak terdaftar\");</script>";
            echo "<script>document.location=\"$site_url\"</script>";
        }
        if ($rows = 1) {
            $query = mysqli_query(
                $host,
                "select * from nira where pass='$password' AND email='$username' and blokir='N'"
            );
            $rows = mysqli_num_rows($query);
            $nira = mysqli_fetch_array($query);
        }
        if ($rows == 1) {
            $_SESSION['login_user'] = $nira['nira']; // Membuat Sesi/session
            $_SESSION['email'] = $nira['email']; // Membuat Sesi/session

            header("location: $site_url/event"); // Mengarahkan ke halaman profil
        }

        if ($rows < 1) {
            echo "<script> alert(\"Maaf kombinasi username dan pasword tidak sesuai \");</script>";
            echo "<script>document.location=\"$site_url\"</script>";
        }

        mysql_close($host); // Menutup koneksi
    }
}

?>
