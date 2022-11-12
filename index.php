<?php

session_start();
$varSession = $_SESSION;

if (!$varSession) {
    header('Location:authentication/login.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>LBS </title>

    <style>
        span.select2-container--default .select2-selection--single {
            box-shadow: "rgba(17, 17, 26, 0.1) 0px 1px 0px";
            height: 40px;
            border: 1px solid "rgba(17, 17, 26, 0.1) 0px 1px 0px";
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            font-size: 15px;
        }

        .logo {
            background-color: green;
            /* width: 100px; */
            border-radius: 60px;
            padding: 10px;
            position: fixed;
            right: 0;
            margin-bottom: 20px;
            margin-right: 20px;
            bottom: 0;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="sb-nav-fixed">

    <!-- nav -->
    <?php include("./templastes/topbar.php") ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <!-- sidebar -->
            <?php include("./templastes/sidebar.php") ?>
            <!-- endSidebar -->
        </div>
        <div id="layoutSidenav_content" style="background-color:#f5f6f8;">
            <main>
                <?php
                if (isset($_GET['menu'])) {
                    $sidebar = $_GET['menu'];           //menu
                    switch ($sidebar) {
                        case 'dashboard':
                            include "pages/dashboard/index.php";
                            break;
                        case 'supplier':
                            include "pages/master_data/supplier/index.php";
                            break;
                        case 'montir':
                            include "pages/master_data/montir/index.php";
                            break;
                        case 'merek':
                            include "pages/master_barang/merek/index.php";
                            break;
                        case 'kategori':
                            include "pages/master_barang/kategori/index.php";
                            break;
                        case 'rak':
                            include "pages/master_barang/rak/index.php";
                            break;
                        case 'data-barang':
                            include "pages/barang/index.php";
                            break;
                        case 'barang-keluar':
                            include "pages/barang_keluar/index.php";
                            break;
                        case 'barang-masuk':
                            include "pages/barang_masuk/index.php";
                            break;
                        case 'akun':
                            include "pages/akun/index.php";
                            break;
                        default:
                            echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
                            break;
                    }
                } elseif (isset($_GET['kategori'])) {
                    $kategori = $_GET['kategori'];     //kategori
                    switch ($kategori) {
                        case 'update':
                            include "pages/master_barang/kategori/update.php";
                            break;
                        case 'delete':
                            include "pages/master_barang/kategori/delete.php";
                            break;
                    }
                } elseif (isset($_GET['merek'])) {
                    $merek = $_GET['merek'];     //merek
                    switch ($merek) {
                        case 'update':
                            include "pages/master_barang/merek/update.php";
                            break;
                        case 'delete':
                            include "pages/master_barang/merek/delete.php";
                            break;
                    }
                } elseif (isset($_GET['rak'])) {
                    $merek = $_GET['rak'];     //merek
                    switch ($merek) {
                        case 'update':
                            include "pages/master_barang/rak/update.php";
                            break;
                        case 'delete':
                            include "pages/master_barang/rak/delete.php";
                            break;
                    }
                } elseif (isset($_GET['supplier'])) {
                    $supplier = $_GET['supplier'];     //supplier
                    switch ($supplier) {
                        case 'add':
                            include "pages/master_data/supplier/add.php";
                            break;
                        case 'update':
                            include "pages/master_data/supplier/update.php";
                            break;
                        case 'delete':
                            include "pages/master_data/supplier/delete.php";
                            break;
                    }
                } elseif (isset($_GET['montir'])) {
                    $montir = $_GET['montir'];
                    switch ($montir) {
                        case 'add':
                            include "pages/master_data/montir/add.php";
                            break;
                        case 'update':
                            include "pages/master_data/montir/update.php";
                            break;
                        case 'delete':
                            include "pages/master_data/montir/delete.php";
                            break;
                    }
                } elseif (isset($_GET['data-barang'])) {
                    $barang = $_GET['data-barang'];
                    switch ($barang) {
                        case 'add':
                            include "pages/barang/add.php";
                            break;
                        case 'update':
                            include "pages/barang/update.php";
                            break;
                        case 'delete':
                            include "pages/barang/delete.php";
                            break;
                    }
                } elseif (isset($_GET['barang-masuk'])) {
                    $barang_masuk = $_GET['barang-masuk'];
                    switch ($barang_masuk) {
                        case 'add':
                            include "pages/barang_masuk/add.php";
                            break;
                        case 'delete':
                            include "pages/barang_masuk/delete.php";
                            break;
                    }
                } elseif (isset($_GET['barang-keluar'])) {
                    $barang_masuk = $_GET['barang-keluar'];
                    switch ($barang_masuk) {
                        case 'add':
                            include "pages/barang_keluar/add.php";
                            break;
                        case 'delete':
                            include "pages/barang_keluar/delete.php";
                            break;
                    }
                } elseif (isset($_GET['akun'])) {
                    $barang_masuk = $_GET['akun'];
                    switch ($barang_masuk) {
                        case 'add':
                            include "pages/akun/add.php";
                            break;
                        case 'edit':
                            include "pages/akun/edit.php";
                            break;
                        case 'delete':
                            include "pages/akun/delete.php";
                            break;
                    }
                } elseif (isset($_GET['laporan'])) {
                    $barang_masuk = $_GET['laporan'];
                    switch ($barang_masuk) {
                        case 'barang-masuk':
                            include "pages/laporan/laporan_barang_masuk.php";
                            break;
                        case 'delete-barang-masuk':
                            include "pages/laporan/delete_barang_masuk.php";
                            break;
                        case 'barang-keluar':
                            include "pages/laporan/laporan_barang_keluar.php";
                            break;
                        case 'stok':
                            include "pages/laporan/laporan_stok.php";
                            break;
                        case 'delete-barang-keluar':
                            include "pages/laporan/delete_barang_keluar.php";
                            break;
                    }
                }
                ?>
            </main>
            <div class="logo">
                <img src="./wa-logo.png" style="width: 30px;" alt="">
            </div>
        </div>
    </div>


    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <!-- hapus -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>




    <?php
    include './grafik/stok2.php';
    ?>


    <?php
    include './grafik/jmlBarangKeluar2.php';
    ?>
</body>

</html>