<?php
// connect and login to FTP server
$ftp_server     = "ftp.ppni.or.id";
$ftp_username   = "u487816097.ftp";
$ftp_userpass   = "@Ftp250909#";
$ftp_conn       = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
$login          = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);

$file = "file.zip";

// upload file
if (ftp_put($ftp_conn, $file, $file, FTP_ASCII)){
    echo "Successfully uploaded $file.";
    }else{
    echo "Error uploading $file.";
    }

// close connection
ftp_close($ftp_conn);
?>
