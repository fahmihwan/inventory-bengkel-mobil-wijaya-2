<?php
include './koneksi.php';

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

<div class="container-fluid px-4 ">
    <ol class="breadcrumb pt-2">
        <li class="breadcrumb-item ">Laporan Stok</li>
    </ol>
    <div class="mb-4">
        <div class="card-header clearfix mb-3" style="border-radius: 20px ;background-color: white; border:0px;">
            <div class="float-start pt-1">
                <i class="fa-solid fa-box"></i>
                <span class="ms-2 fw-bolder"> Laporan Stok</span>
            </div>

            <a href="pages/print/print_stok.php" class="btn btn-primary float-end">
                <i class="fa-solid fa-print"></i>
            </a>
        </div>

        <div class="p-3  bg-white " style="border-radius: 20px; ">
            <table id="datatablesSimple" style="border-color: white;">
                <thead class="">
                    <tr>
                        <th>no</th>
                        <th>Barang</th>
                        <th>Kategori</th>
                        <th>Rak</th>
                        <th>Qty</th>
                    </tr>
                </thead>
                <tbody>
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
                </tbody>
            </table>
        </div>
    </div>
</div>