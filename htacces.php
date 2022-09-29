<?php

$varSession = $_SESSION;

if (!$varSession) {
    header('Location:authentication/login.php');
}


if (isset($_GET['menu'])) {
    $sidebar = $_GET['menu'];           //menu
    switch ($sidebar) {
        case 'dashboard':
            break;
        case 'supplier':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
        case 'montir':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
        case 'merek':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
        case 'kategori':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
        case 'rak':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
        case 'data-barang':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
        case 'barang-keluar':
            if ($varSession['hak_akses'] != 'operator' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
        case 'barang-masuk':
            if ($varSession['hak_akses'] != 'operator' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
        case 'akun':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
    }
} elseif (isset($_GET['kategori'])) {
    $kategori = $_GET['kategori'];     //kategori
    switch ($kategori) {
        case 'update':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }

            break;
        case 'delete':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }

            break;
    }
} elseif (isset($_GET['merek'])) {
    $merek = $_GET['merek'];     //merek
    switch ($merek) {
        case 'update':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }

            break;
        case 'delete':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }

            break;
    }
} elseif (isset($_GET['rak'])) {
    $merek = $_GET['rak'];     //merek
    switch ($merek) {
        case 'update':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
        case 'delete':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }

            break;
    }
} elseif (isset($_GET['supplier'])) {
    $supplier = $_GET['supplier'];     //supplier
    switch ($supplier) {
        case 'add':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }

            break;
        case 'update':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }

            break;
        case 'delete':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }

            break;
    }
} elseif (isset($_GET['montir'])) {
    $montir = $_GET['montir'];
    switch ($montir) {
        case 'add':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
        case 'update':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
        case 'delete':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
    }
} elseif (isset($_GET['data-barang'])) {
    $barang = $_GET['data-barang'];
    switch ($barang) {
        case 'add':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }

            break;
        case 'update':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }

            break;
        case 'delete':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }

            break;
    }
} elseif (isset($_GET['barang-masuk'])) {
    $barang_masuk = $_GET['barang-masuk'];
    switch ($barang_masuk) {
        case 'add':
            if ($varSession['hak_akses'] != 'operator' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
        case 'detail':
            if ($varSession['hak_akses'] != 'operator' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
        case 'update':
            if ($varSession['hak_akses'] != 'operator' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
        case 'delete':
            if ($varSession['hak_akses'] != 'operator' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
    }
} elseif (isset($_GET['barang-keluar'])) {
    $barang_masuk = $_GET['barang-keluar'];
    switch ($barang_masuk) {
        case 'add':
            if ($varSession['hak_akses'] != 'operator' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
        case 'detail':
            if ($varSession['hak_akses'] != 'operator' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }

            break;
        case 'update':
            if ($varSession['hak_akses'] != 'operator' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
        case 'delete':
            if ($varSession['hak_akses'] != 'operator' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }

            break;
    }
} elseif (isset($_GET['akun'])) {
    $barang_masuk = $_GET['akun'];
    switch ($barang_masuk) {
        case 'add':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }

            break;
        case 'delete':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
    }
} elseif (isset($_GET['laporan'])) {
    $barang_masuk = $_GET['laporan'];
    switch ($barang_masuk) {
        case 'barang-masuk':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
        case 'barang-keluar':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
        case 'detail-barang-masuk':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }

            break;
        case 'detail-barang-keluar':
            if ($varSession['hak_akses'] != 'admin' && $varSession['hak_akses'] != 'super admin') {
                header('Location:authentication/login.php');
            }
            break;
    }
}
