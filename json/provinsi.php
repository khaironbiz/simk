<?php
include('../auth/session.php');
$sql    = "SELECT * FROM provinsi";
$data   = mysqli_query($host, $sql);
if(mysqli_num_rows($data) > 0 ){
    $response = array();
    while($x = mysqli_fetch_array($data)){
        $h['code'] = $x["id_prov"];
        $h['display'] = $x["nama"];
        array_push($response, $h);
    }
    $json = json_encode($response);
    file_put_contents("data.json", $json);
}else {
    $response["message"]="tidak ada data";
    echo json_encode($response);
}
