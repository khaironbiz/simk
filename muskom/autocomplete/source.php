<?php
// Set header type konten.
header("Content-Type: application/json; charset=UTF-8");
include('auth/koneksi.php');
// Koneksi ke database.
$conn   = new mysqli($host, $username, $password, $database);
// Deklarasi variable keyword buah.
$buah   = $_GET["query"];
// Query ke database.
$query  = $conn->query("SELECT * FROM nira WHERE nama LIKE '%$buah%' and blokir='N' ORDER BY nama DESC");
// Fetch hasil query.
$result = $query->fetch_All(MYSQLI_ASSOC);
// Cek apakah ada yang cocok atau tidak.
if (count($result) > 0) {
    foreach($result as $data) {
        $output['suggestions'][] = [
            'value' => $data['nira']."-->".$data['nama'],
            'buah'  => $data['nira']
        ];
    }
    // Encode ke JSON.
    echo json_encode($output);
// Jika tidak ada yang cocok.
} else {
    $output['suggestions'][] = [
        'value' => '',
        'buah'  => ''
    ];
    // Encode ke JSON.
    echo json_encode($output);
}
