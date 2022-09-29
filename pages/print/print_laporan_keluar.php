<?php

include './../../koneksi.php';

$start = $_GET['start'];
$end = $_GET['end'];

$queryBarang = mysqli_query($conn, "SELECT 
barang_keluar.id as id,
tanggal,
montir.nama as montir,
barang.nama as barang,
kategori.nama as kategori,
catatan,
barang_keluar.qty as qty
FROM barang_keluar
INNER JOIN montir
ON montir.id = barang_keluar.montir_id 
INNER JOIN barang
ON barang.id = barang_keluar.barang_id 
INNER JOIN kategori
ON barang.kategori_id = kategori.id
ORDER BY tanggal DESC");



if ($start != '' || $end != '') {
    $queryBarang = mysqli_query($conn, "SELECT 
    barang_keluar.id as id,
    tanggal,
    montir.nama as montir,
    barang.nama as barang,
    kategori.nama as kategori,
    catatan,
    barang_keluar.qty as qty
    FROM barang_keluar
    INNER JOIN montir
    ON montir.id = barang_keluar.montir_id 
    INNER JOIN barang
    ON barang.id = barang_keluar.barang_id 
    INNER JOIN kategori
    ON barang.kategori_id = kategori.id
    WHERE tanggal BETWEEN '$start' AND '$end'");
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>.</title>
    <style>

    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row ">
            <h5 class="text-center mb-0 pb-0">Detail Barang Keluar</h5>
            <p class="text-center mt-2 " style="font-size: 10px;">Bengkel LBS Auto Service Jl. Lintas Sumatera No.KM 123,
                <br> Lubuk Seberuk, Lempuing Jaya, Kabupaten Ogan Komering Ilir, Sumatera Selatan
            </p>
            <hr>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <table class="" style="width: 400px">
                    <!-- <tr>
                        <td style="width: 120px;">Tanggal </td>
                        <td> : <?= 22    ?></td>
                    </tr> -->
                </table>
            </div>

        </div>

        <div class="row">
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Barang</th>
                    <th>Kategori</th>
                    <th>Montir</th>
                    <th>Qty</td>
                </tr>
                <?php
                $i = 1;
                while ($data = mysqli_fetch_assoc($queryBarang)) :
                    $id = $data['id'];
                ?>
                    <tr>
                        <th scope="row"><?= $i++ ?></th>
                        <td><?= $data['tanggal'] ?></td>
                        <td><?= $data['barang'] ?></td>
                        <td><?= $data['kategori'] ?></td>
                        <td><?= $data['montir'] ?></td>
                        <td><?= $data['qty'] ?></td>
                    </tr>
                <?php
                endwhile;
                ?>
            </table>
        </div>
    </div>
    <script>
        // window.print()
    </script>

</body>

</html>

<script>

</script>
<!-- pages/print/print_barang_masuk.php -->