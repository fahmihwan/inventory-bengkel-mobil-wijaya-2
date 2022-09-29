<?php

include './../../koneksi.php';

$start = $_GET['start'];
$end = $_GET['end'];

$queryBarang = mysqli_query($conn, "SELECT 
barang_masuk.id as id,
tanggal,
supplier.nama as supplier,
barang.nama as barang,
kategori.nama as kategori,
catatan,
barang_masuk.qty as qty
FROM barang_masuk
INNER JOIN supplier
ON supplier.id = barang_masuk.supplier_id 
INNER JOIN barang
ON barang.id = barang_masuk.barang_id 
INNER JOIN kategori
ON barang.kategori_id = kategori.id
ORDER BY tanggal DESC

");



if ($start != '' || $end != '') {
    $queryBarang = mysqli_query($conn, "SELECT 
    barang_masuk.id as id,
    tanggal,
    supplier.nama as supplier,
    barang.nama as barang,
    kategori.nama as kategori,
    catatan,
    barang_masuk.qty as qty
    FROM barang_masuk
    INNER JOIN supplier
    ON supplier.id = barang_masuk.supplier_id 
    INNER JOIN barang
    ON barang.id = barang_masuk.barang_id 
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
    <title>print</title>
    <style>

    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row ">
            <h5 class="text-center mb-0 pb-0">Detail Barang Masuk</h5>
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
                    <th>Supplier</th>
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
                        <td><?= $data['supplier'] ?></td>
                        <td><?= $data['qty'] ?></td>
                    </tr>

                <?php
                endwhile;
                ?>
            </table>
        </div>
    </div>
    <script>
        window.print()
    </script>

</body>

</html>

<script>

</script>