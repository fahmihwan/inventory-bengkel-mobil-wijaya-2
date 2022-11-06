<?php

include './koneksi.php';


$id = $_GET['id'];
$queryAllBarang = mysqli_query($conn, "SELECT 
barang.id as id,
barang.nama as nama,
kategori.id as kategori_id,
kategori.nama as kategori,
rak.id as rak_id,
rak.nama as rak,
qty
FROM barang 
INNER JOIN rak
ON barang.rak_id = rak.id
INNER JOIN kategori
ON barang.kategori_id = kategori.id
WHERE barang.id ='$id'");
$fetchBarang = mysqli_fetch_assoc($queryAllBarang);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];

    $kategori_id = $_POST['kategori_id'];
    $rak_id = $_POST['rak_id'];
    $qty = $_POST['qty'];


    if (!ctype_digit($qty)) {
        echo "<script>
        alert('qty harus angka');   
        window.location.href ='index.php?menu=data-barang';
        </script>";
        die;
    }

    $queryUpdate = mysqli_query($conn, "UPDATE barang
    SET nama='$nama',
    kategori_id='$kategori_id',
    rak_id='$rak_id',
    qty='$qty'
    WHERE id='$id'");


    if ($queryUpdate) {
        echo "<script>
        alert('success');   
        window.location.href = 'index.php?menu=data-barang  '
        </script>";
    } else {
        echo "<script>
        alert('success');   
        window.location.href = 'index.php?menu=data-barang  '       
        </script>";
    }
}

$rak = mysqli_query($conn, "SELECT * FROM rak");
$kategori = mysqli_query($conn, "SELECT * FROM kategori");
?>

<div class="container-fluid px-4 ">
    <ol class="breadcrumb pt-2">
        <li class="breadcrumb-item ">Barang</li>
        <li class="breadcrumb-item"><a href="index.php?menu=montir">List Data</a></li>
        <li class="breadcrumb-item active">Input Data Barang</li>
    </ol>
    <div class="mb-4">
        <div class="card-header clearfix mb-3" style="border-radius: 20px ;background-color: white; border:0px;">
            <i class="fa-solid fa-users"></i>
            <span class="ms-2 fw-bolder"> Form Input Barang</span>
            <a href="index.php?menu=data-barang" class="btn btn-sm btn-primary float-end rounded-pill ">
                <i class="fa-solid fa-arrow-left"></i> kembali
            </a>
        </div>
    </div>
    <div class="row ">
        <div class="mb-4 col-md-6">
            <div class="card border-none" style="box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;">
                <div class="rounded-bottom mx-4  py-3 px-2  text-light" style="background-color: #1a1c2f;">
                    <span class="p-2 rounded-pill flex" style="background-color: #343549;"> Form Barang</span>
                </div>
                <div class="card-body px-4">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label py-0 m-0">nama</label>
                            <input type="text" value="<?= $fetchBarang['nama'] ?>" class="form-control rounded-pill border-none" id="nama" name="nama" placeholder="nama" required style="box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;">
                        </div>


                        <div class="mb-3">
                            <label for="">kategori</label>
                            <select name="kategori_id" class="js-example-basic-single-kategori form-control rounded-pill border-none py-2" style=" box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;">
                                <?php if ($fetchBarang['kategori']) { ?>
                                    <option selected value="<?= $fetchBarang['kategori_id'] ?>"><?= $fetchBarang['kategori'] ?></option>
                                <?php } ?>
                                <?php while ($fetch_kategori = mysqli_fetch_assoc($kategori)) : ?>
                                    <option value="<?= $fetch_kategori['id'] ?>"><?= $fetch_kategori['nama'] ?></option>
                                <?php
                                endwhile;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">rak</label>
                            <select name="rak_id" class="js-example-basic-single-rak form-control rounded-pill border-none py-2" style=" box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;">
                                <?php if ($fetchBarang['rak']) { ?>
                                    <option selected value="<?= $fetchBarang['rak_id'] ?>"><?= $fetchBarang['rak'] ?></option>
                                <?php } ?>
                                <?php while ($fetch_rak = mysqli_fetch_assoc($rak)) : ?>
                                    <option value="<?= $fetch_rak['id'] ?>"><?= $fetch_rak['nama'] ?></option>
                                <?php
                                endwhile;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="qty" class="form-label py-0 m-0">qty</label>
                            <input type="number" min="0" value="<?= $fetchBarang['qty'] ?>" class="form-control rounded-pill border-none" id="qty" name="qty" placeholder="qty" required style="box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;">
                        </div>
                        <button name="submit" class="btn btn-primary rounded-pill">submit</button>
                        <button class="btn btn-secondary rounded-pill">clear</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single-merek').select2();
        $('.js-example-basic-single-kategori').select2();
        $('.js-example-basic-single-rak').select2();
    })
</script>