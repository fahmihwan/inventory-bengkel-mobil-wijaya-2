<?php
include './koneksi.php';


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


?>
<div class="container-fluid px-4 ">
    <ol class="breadcrumb pt-2">
        <li class="breadcrumb-item ">Data Barang Keluar</li>
        <li class="breadcrumb-item active">list Barang Keluar</li>
    </ol>
    <div class="mb-4">
        <div class="card-header clearfix mb-3" style="border-radius: 20px ;background-color: white; border:0px;">
            <i class="fa-solid fa-box"></i>
            <span class="ms-2 fw-bolder"> Data Barang Keluar</span>

            <!-- Button trigger modal -->
            <a href="index.php?barang-keluar=add" class=" btn btn-sm btn-primary float-end rounded-pill">
                tambah data
                <i class="fa-solid fa-box"></i>
            </a>
        </div>
        <div class="p-3  bg-white " style="border-radius: 20px; ">
            <table id="datatablesSimple" style="border-color: white;">
                <thead class="">
                    <tr>
                        <th>no</th>
                        <th>Tanggal</th>
                        <th>Barang</th>
                        <th>Kategori</th>
                        <th>Montir</th>
                        <th>Qty</th>
                        <th>Catatan</th>
                        <th>action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 1;
                    while ($data = mysqli_fetch_assoc($queryBarang)) :
                        $id = $data['id'];
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $data['tanggal'] ?></td>
                            <td><?= $data['barang'] ?></td>
                            <td><?= $data['kategori'] ?></td>
                            <td><?= $data['montir'] ?></td>
                            <td><?= $data['qty'] ?></td>
                            <td><?= $data['catatan'] ?></td>
                            <td class="text-center">
                                <a href="index.php?barang-keluar=delete&id= <?= $data['id'] ?>" class="btn btn-sm btn-danger text-white">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    endwhile;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>