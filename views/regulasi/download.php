<?php 
    if (isset($_GET['id'])) {
        $has        = $_GET['id'];
        $sql_data   = mysqli_query($host,"SELECT * FROM regulasi_detail WHERE has_regulasi_detail='$has'");
        $data       = mysqli_fetch_array($sql_data);
        $filename   = $data['regulasi_file'];
        $back_dir   = "../assets/files/";
        $file       = $back_dir.$filename;
            if (file_exists($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($file));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: private');
                header('Pragma: private');
                header('Content-Length: ' . filesize($file));
                ob_clean();
                flush();
                readfile($file);
                exit;
            } 
            else {
                $_SESSION['pesan'] = "Oops! File - $filename - not found ...";
                header("location:index.php");
            }
    }
?>