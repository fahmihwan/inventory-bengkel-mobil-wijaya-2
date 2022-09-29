<?php
include './../koneksi.php';

$kategoriChart = mysqli_query($conn, "SELECT *  FROM kategori");
$ktgr = [];
while ($ktgr_id = mysqli_fetch_assoc($kategoriChart)) {
    $id = $ktgr_id['id'];
    $brgChart = mysqli_query($conn, "SELECT SUM(qty) as qty FROM barang WHERE kategori_id = '$id'");
    while ($ktgrChart = mysqli_fetch_assoc($brgChart)) {
        $ktgr[] = [
            'nama' => $ktgr_id['nama'],
            'qty' => $ktgrChart['qty'] == NULL ? 0 : $ktgrChart['qty'],
        ];
    }
}


$json = [
    "status" => 200,
    "data" => $ktgr,
];


echo json_encode($json);
