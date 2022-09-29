<?php
$conn = mysqli_connect('localhost', 'root', 'root', 'db_inventroy_wijaya');

$id = $_GET['id'];

$sqll = "SELECT transaksi_barang_keluar.id as transaksi_keluar_id, barang.id as barang_id, barang.nama as barang, merek.nama as merek, kategori.nama as kategori, transaksi_barang_keluar.qty as qty 
FROM transaksi_barang_keluar 
INNER JOIN barang 
ON barang.id = transaksi_barang_keluar.barang_id 
INNER JOIN merek 
ON merek.id = barang.merek_id
INNER JOIN kategori 
ON kategori.id = barang.kategori_id
WHERE barang_keluar_id='$id'";
$query = mysqli_query($conn, $sqll);
$arr = [];
while ($data = mysqli_fetch_assoc($query)) {
    $arr[] = $data;
}
$json = [
    "status" => 200,
    "data" => $arr,
];



echo json_encode($json);
