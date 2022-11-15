<?php
include './koneksi.php';



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
ORDER BY tanggal DESC");



?>

<div class="container-fluid px-4 ">
    <ol class="breadcrumb pt-2">
        <li class="breadcrumb-item ">Data Barang Masuk</li>
        <li class="breadcrumb-item active">list Barang Masuk</li>
    </ol>
    <div class="mb-4">
        <div class="card-header clearfix mb-3" style="border-radius: 20px ;background-color: white; border:0px;">
            <i class="fa-solid fa-box"></i>
            <span class="ms-2 fw-bolder"> Data Barang Masuk</span>

            <!-- Button trigger modal -->
            <a href="index.php?barang-masuk=add" class="btn btn-sm btn-primary float-end rounded-pill">
                tambah data <i class="fa-solid fa-box"></i>
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
                        <th>Supplier</th>
                        <th>Qty</th>
                        <th>Catatan</th>
                        <th>action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 0;
                    while ($data = mysqli_fetch_assoc($queryBarang)) :
                        $id = $data['id'];
                    ?>
                        <tr>
                            <td><?= $i += 1 ?></td>
                            <td><?= $data['tanggal'] ?></td>
                            <td><?= $data['barang'] ?></td>
                            <td><?= $data['kategori'] ?></td>
                            <td><?= $data['supplier'] ?></td>
                            <td><?= $data['qty'] ?></td>
                            <td><?= $data['catatan'] ?></td>
                            <td class="text-center">
                                <a href="index.php?barang-masuk=delete&id= <?= $data['id'] ?>" class="btn btn-sm btn-danger text-white">
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