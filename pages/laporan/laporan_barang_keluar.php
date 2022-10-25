<?php
include './koneksi.php';

$sessionId = $_SESSION['hak_akses'];

$queryBarang = mysqli_query($conn, "SELECT 
barang_keluar.id as id,
tanggal,
montir.nama as montir,
barang.nama as barang,
kategori.nama as kategori,
users.nama as user,
catatan,
barang_keluar.qty as qty
FROM barang_keluar
INNER JOIN montir
ON montir.id = barang_keluar.montir_id 
INNER JOIN barang
ON barang.id = barang_keluar.barang_id 
INNER JOIN kategori
ON barang.kategori_id = kategori.id
INNER JOIN users
ON users.id = barang_keluar.users_id
ORDER BY tanggal DESC");

if (isset($_POST['search'])) {
    $start = $_POST['start'];
    $end = $_POST['end'];
    $queryBarang = mysqli_query($conn, "SELECT 
    barang_keluar.id as id,
    tanggal,
    montir.nama as montir,
    barang.nama as barang,
    kategori.nama as kategori,
    users.nama as user,
    catatan,
    barang_keluar.qty as qty
    FROM barang_keluar
    INNER JOIN montir
    ON montir.id = barang_keluar.montir_id 
    INNER JOIN barang
    ON barang.id = barang_keluar.barang_id 
    INNER JOIN kategori
    ON barang.kategori_id = kategori.id
    INNER JOIN users
    ON users.id = barang_keluar.users_id
    WHERE tanggal BETWEEN '$start' AND '$end'");
}
?>
<div class="container-fluid px-4 ">
    <ol class="breadcrumb pt-2">
        <li class="breadcrumb-item ">Laporan Barang Keluar</li>
    </ol>
    <div class="mb-4">
        <div class="card-header clearfix mb-3" style="border-radius: 20px ;background-color: white; border:0px;">
            <div class="float-start pt-1">
                <i class="fa-solid fa-box"></i>
                <span class="ms-2 fw-bolder"> Laporan Barang Keluar</span>
            </div>
        </div>
        <div class="card-header mb-3" style="border-radius: 20px ;background-color: white; border:0px;">
            <form action="" method="POST">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="me-4 mb-2 mb-md-0 d-flex align-items-center  ">
                        <label for="" class="me-0" style="width: 110px;">start date</label>
                        <input type="date" id="start" name="start" value="<?= $start ?>" class="form-control">
                    </div>
                    <div class="me-4  d-flex align-items-center ">
                        <label for="" class="me-0 pe-0" style="width: 110px;">start date</label>
                        <input type="date" id="end" name="end" value="<?= $end ?>" class="form-control">
                    </div>
                    <div class="me-2 d-flex align-items-center ">
                        <button type="submit" name="search" class="btn btn-primary">Search</button>
                    </div>
                    <div class="me-4 d-flex align-items-center ">
                        <a href="" class="btn btn-warning">
                            <i class="fa-solid fa-repeat"></i>
                        </a>
                    </div>
                    <div class="me-4 d-flex align-items-center ">
                        <a id="print-laporan" href="pages/print/print_laporan_keluar.php?start=<?= isset($start) != '0' ? $start : null ?>&end=<?= isset($end) != null ? $end : null ?>" class="btn btn-info">
                            <i class="fa-solid fa-print"></i>
                        </a>
                    </div>
                </div>
            </form>
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
                        <th>Petugas</th>
                        <th>Catatan</th>
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
                            <td><?= $data['user'] ?></td>
                        </tr>
                    <?php
                    endwhile;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>