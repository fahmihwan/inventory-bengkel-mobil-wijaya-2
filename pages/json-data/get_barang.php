<?php


$conn = mysqli_connect('localhost', 'root', 'root', 'db_inventroy_wijaya');

$id = $_GET['id'];

$sql = "SELECT barang.id as id, barang.nama as nama, merek.id as merek_id, merek.nama as merek_nama, kategori.id as kategori_id, kategori.nama as kategori_nama, rak.id as rak_id, rak.nama as rak_nama,qty
FROM barang
INNER JOIN merek
ON barang.merek_id = merek.id
INNER JOIN kategori
ON barang.kategori_id = kategori.id
INNER JOIN rak
ON barang.rak_id = rak.id
WHERE barang.id='$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);
$json = [
    "status" => 200,
    "data" => $data,
];


echo json_encode($json);
