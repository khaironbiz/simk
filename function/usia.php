<?php
function usia($tgl){
    $tgl_now        = date('Y-m-d');
    $tgl_awal       = new DateTime($tgl);
    $today          = new DateTime();
    $umur           = $today->diff($tgl_awal);
    return $umur;
}
    // $tgl    = "1984-11-12";
    // echo usia($tgl)->y;
?>
