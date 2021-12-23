<?php
// Set header type konten.
header("Content-Type: application/json; charset=UTF-8");
include('auth/koneksi.php');
// Koneksi ke database.
$conn   = new mysqli($host, $username, $password, $database);
// Deklarasi variable keyword buah.
$nama   = $_GET["query2"];
// Query ke database.
$query2  = $conn->query("SELECT * FROM nira WHERE nama LIKE '%$nama%' and blokir='N' ORDER BY nama DESC");
// Fetch hasil query.
$result2 = $query2->fetch_All(MYSQLI_ASSOC);
// Cek apakah ada yang cocok atau tidak.
if (count($result2) > 0) {
    foreach($result2 as $data2) {
        $output2['suggestions2'][] = [
            'nama' => $data2['nira']."-->".$data2['nama'],
            'nama'  => $data2['nira']
        ];
    }
    // Encode ke JSON.
    echo json_encode($output2);
// Jika tidak ada yang cocok.
} else {
    $output2['suggestions2'][] = [
        'value' => '',
        'buah'  => ''
    ];
    // Encode ke JSON.
    echo json_encode($output2);
}
