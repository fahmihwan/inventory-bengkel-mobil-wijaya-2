<?php

include './../../koneksi.php';

$query = mysqli_query($conn, "SELECT 
barang.id as id,
barang.nama as nama,
kategori.nama as kategori,
rak.nama as rak,
qty
FROM barang 
INNER JOIN rak
ON barang.rak_id = rak.id
INNER JOIN kategori
ON barang.kategori_id = kategori.id");
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
            <h5 class="text-center mb-0 pb-0">Stok</h5>
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
                    <th>no</th>
                    <th>Barang</th>
                    <th>Kategori</th>
                    <th>Rak</th>
                    <th>Qty</th>
                </tr>
                <?php
                $i = 1;
                while ($data = mysqli_fetch_assoc($query)) :
                ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['kategori'] ?></td>
                        <td><?= $data['rak'] ?></td>
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