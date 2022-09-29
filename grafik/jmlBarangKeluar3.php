<?php
include './../koneksi.php';

function average($bulan)
{
    global $conn;

    $tahun = date('Y');
    $sql = "SELECT  sum(qty) as qty FROM barang_keluar WHERE month(tanggal) = '$bulan' AND year(tanggal) = '$tahun'";
    $sqlData = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($sqlData)['qty'];
    return $data;
}

$data = [];

$average = [];
for ($i = 1; $i <= 12; $i++) {
    $average[] = average($i) != null ? average($i) : 0;
}

$json = [
    "status" => 200,
    "data" => $average,
];


echo json_encode($json);
