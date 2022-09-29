<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'db_inventroy_wijaya');

$id = $_GET['id'];

$sql = "SELECT
barang_keluar.id as id, kode_referensi, tanggal, nama, catatan
FROM barang_keluar
INNER JOIN montir
ON montir.id = barang_keluar.montir_id
WHERE barang_keluar.id='$id'";

$queryBrgMasuk = mysqli_query($conn, $sql);
$brgMasuk = mysqli_fetch_assoc($queryBrgMasuk);

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
                    <tr>
                        <td style="width: 120px;">kode referensi </td>
                        <td> : <?= $brgMasuk['kode_referensi'] ?></td>
                    </tr>
                    <tr>
                        <td style="width: 100px;">montir</td>
                        <td> : <?= $brgMasuk['nama'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <div class="float-end ">
                    tanggal : <?= $brgMasuk['tanggal'] ?>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <p>
                <span class="mb-0 pb-0">Catatan :</span> <?= $brgMasuk['catatan'] ?>
            </p>
        </div>
        <div class="row">
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Barang</th>
                    <th>Merek</th>
                    <th>Kategori</th>
                    <th>Qty</td>
                </tr>
                <?php
                $sqll = "SELECT barang.nama as barang, merek.nama as merek, kategori.nama as kategori, transaksi_barang_keluar.qty as qty FROM transaksi_barang_keluar 
                        INNER JOIN barang 
                        ON barang.id = transaksi_barang_keluar.barang_id 
                        INNER JOIN merek 
                        ON merek.id = barang.merek_id
                        INNER JOIN kategori 
                        ON kategori.id = barang.kategori_id
                        WHERE barang_keluar_id='$id'";
                $dataBarang = mysqli_query($conn, $sqll);
                $i = 1;
                while ($data = mysqli_fetch_assoc($dataBarang)) :
                ?>
                    <tr>
                        <th scope="row"><?= $i++ ?></th>
                        <td><?= $data['barang']; ?></td>
                        <td><?= $data['merek']; ?></td>
                        <td><?= $data['kategori']; ?></td>
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

<!-- pages/print/print_barang_masuk.php -->