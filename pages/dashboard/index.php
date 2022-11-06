<?php

include './koneksi.php';

$barang = mysqli_query($conn, "SELECT * FROM barang ");

$sisa_sedikit = mysqli_query($conn, "SELECT * FROM barang WHERE qty < 10");

$stokHabis = mysqli_query($conn, "SELECT * FROM barang WHERE qty = '0'");

$kategori = mysqli_query($conn, "SELECT * FROM kategori");

$sqlData = mysqli_query($conn, "SELECT nama, sum(barang_keluar.qty) as qty FROM barang_keluar 
INNER JOIN barang 
ON barang_keluar.barang_id = barang.id 
GROUP BY nama ORDER BY qty DESC");


?>
<div class="container-fluid px-4">
    <ol class="breadcrumb pt-2">
        <li class="breadcrumb-item  active"> Dashboard</li>
    </ol>
    <div class="mb-4">
        <div class="card-header clearfix mb-3" style="border-radius: 20px ;background-color: white; border:0px;">
            <i class="fa-solid fa-box"></i>
            <span class="ms-2 fw-bolder"> Data Dashboard</span>

        </div>
    </div>


    <div class="row">
        <div class="mb-3 col-6 col-xl-3 col-md-3 ">
            <div class="bg-white rounded p-3 " style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                <div class="d-flex">
                    <div class=" ">
                        <div class="bg-info rounded-pill align-items-center d-flex justify-content-center mb-2" style="width: 50px; height: 50px; padding: 5px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                            <i class="fa-solid fa-desktop"></i>
                        </div>
                    </div>
                    <div class="  ps-2">
                        <p class="py-0 m-0">Data Barang <span class="text-success"><i class="fa-solid fa-up-long"></i></span></p>
                        <p class="py-0 m-0 fw-bold"><?= mysqli_num_rows($barang)  ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-xl-3 col-md-3">
            <div class="bg-white rounded p-3" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                <div class="d-flex">
                    <div class=" ">
                        <div class="bg-warning rounded-pill align-items-center d-flex justify-content-center mb-2" style="width: 50px; height: 50px; padding: 5px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                        </div>
                    </div>
                    <div class=" ps-2">
                        <p class="py-0 m-0">Sisa Sedikit <span class="text-success"><i class="fa-solid fa-up-long"></i></span></p>
                        <p class="py-0 m-0 fw-bold"><?= mysqli_num_rows($sisa_sedikit) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-xl-3 col-md-3">
            <div class="bg-white rounded p-3" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                <div class="d-flex">
                    <div class=" ">
                        <div class="bg-danger text-white rounded-pill align-items-center d-flex justify-content-center mb-2" style="width: 50px; height: 50px; padding: 5px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                            <i class="fa-solid fa-circle-exclamation"></i>
                        </div>
                    </div>
                    <div class="  ps-2">
                        <p class="py-0 m-0">Stok Habis <span class="text-success"><i class="fa-solid fa-up-long"></i></span></p>
                        <p class="py-0 m-0 fw-bold"><?= mysqli_num_rows($stokHabis) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-xl-3 col-md-3">
            <div class="bg-white rounded p-3" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                <div class="d-flex">
                    <div class="">
                        <div class="bg-success text-white rounded-pill align-items-center d-flex justify-content-center mb-2" style="width: 50px; height: 50px; padding: 5px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                            <i class="fa-solid fa-sitemap"></i>
                        </div>
                    </div>
                    <div class="  ps-2">
                        <p class="py-0 m-0">Data Kategori <span class="text-success"><i class="fa-solid fa-up-long"></i></span></p>
                        <p class="py-0 m-0 fw-bold"><?= mysqli_num_rows($kategori) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-4">
        <?php include './grafik/jmlBarangKeluar.php' ?>

        <div class="col-xl-4 ">
            <div class="card">
                <div class="card-header">
                    Top 5 Barang Keluar
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">nama</th>
                                <th scope="col">qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            while ($data = mysqli_fetch_assoc($sqlData)) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['qty'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>


    </div>

    <div class="row mt-4">
        <?php include './grafik/stok.php'; ?>


    </div>
</div>