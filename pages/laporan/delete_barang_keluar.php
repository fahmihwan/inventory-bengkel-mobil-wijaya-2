<?php

include './koneksi.php';

$id = $_GET['id'];

try {
    // Matikan autocommit 
    mysqli_autocommit($conn, FALSE);

    $brgMasuk = mysqli_query($conn, "SELECT * FROM barang_keluar WHERE id='$id'");
    $fetchBarang =  mysqli_fetch_assoc($brgMasuk);
    $barang_id = $fetchBarang['barang_id'];
    $qty = $fetchBarang['qty'];

    $barang = mysqli_query($conn, "SELECT * FROM barang WHERE id='$barang_id'");
    $currentQty = mysqli_fetch_assoc($barang)['qty'];
    $currentQty += $qty;

    mysqli_query($conn, "UPDATE barang SET qty='$currentQty' WHERE id='$barang_id'");

    mysqli_query($conn, "DELETE FROM barang_keluar WHERE id='$id'");

    mysqli_commit($conn);

    echo "<script>
     window.location.href = 'index.php?laporan=barang-keluar';
    </script>";
} catch (\Throwable $e) {
    mysqli_rollback($conn);
    throw $e;
}
