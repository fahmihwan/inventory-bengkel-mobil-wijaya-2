<?php
include './koneksi.php';


$queryAllBarang = mysqli_query($conn, "SELECT * FROM barang");
$queryAllSupplier = mysqli_query($conn, "SELECT * FROM supplier");

if (isset($_POST['submit'])) {
    $tanggal = $_POST['tanggal'];
    $barang_id = $_POST['barang_id'];
    $supplier_id = $_POST['supplier_id'];
    $qty = $_POST['qty'];

    if ($qty < 0) {
        echo "
        <script>
        alert('qty tidak boleh kurang dari 0');
        window.location.href ='index.php?barang-masuk=add  ';
        </script>
        ";
    }

    if (!ctype_digit($qty)) {
        echo "<script>
        alert('qty harus angka');   
        window.location.href ='index.php?barang-masuk=add  ';
        </script>";
        die;
    }


    $catatan = $_POST['catatan'];
    $session_id = $_SESSION['id'];

    if ($barang_id == 'default' || $supplier_id == 'default') {
        echo "
        <script>
        alert('harap isi semua form');
        window.location.href ='index.php?barang-masuk=add  ';
        </script>
        ";
    }


    try {
        // Matikan autocommit 
        mysqli_autocommit($conn, FALSE);

        $barang_masuk =  mysqli_query($conn, "INSERT INTO barang_masuk 
        (barang_id,supplier_id,tanggal,qty,catatan,users_id) 
        VALUES ('$barang_id','$supplier_id','$tanggal','$qty','$catatan','$session_id')");


        $query_barang = mysqli_query($conn, "SELECT * FROM barang WHERE id = '$barang_id'");
        $currentQty = mysqli_fetch_assoc($query_barang)['qty'];

        $currentQty += $qty;

        mysqli_query($conn, "UPDATE barang SET qty='$currentQty' WHERE id='$barang_id'");

        echo "<script>
        window.location.href ='index.php?menu=barang-masuk';
       </script>";

        mysqli_commit($conn);
    } catch (\Throwable $e) {
        mysqli_rollback($conn);
        throw $e;
    }
}


?>
<div class="container-fluid px-4 ">
    <ol class="breadcrumb pt-2">
        <li class="breadcrumb-item ">Barang Masuk </li>
        <li class="breadcrumb-item"><a href="index.php?menu=montir">List Data</a></li>
        <li class="breadcrumb-item active">Input Barang Masuk</li>
    </ol>
    <div class="mb-4">
        <div class="card-header clearfix mb-3" style="border-radius: 20px ;background-color: white; border:0px;">
            <i class="fa-solid fa-cart-plus"></i>
            <span class="ms-2 fw-bolder"> Form Barang Masuk</span>
            <a href="index.php?menu=barang-masuk" class="btn btn-sm btn-primary float-end rounded-pill ">
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
                            <label for="nama" class="form-label py-0 m-0">Tanggal</label>
                            <input type="date" required name="tanggal" class="form-control rounded-pill border-none">
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label py-0 m-0">Barang</label>
                            <select required name="barang_id" class="js-example-basic-barang form-control rounded-pill border-none py-2" style=" box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;">
                                <option selected required value="default"> -- pilih barang -- </option>
                                <?php while ($fetch_barang = mysqli_fetch_assoc($queryAllBarang)) : ?>
                                    <option value="<?= $fetch_barang['id']; ?>"><?= $fetch_barang['nama']; ?></option>
                                <?php
                                endwhile;
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label py-0 m-0">Supplier</label>
                            <select required name="supplier_id" class="js-example-basic-supplier form-control rounded-pill border-none py-2" style=" box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;">
                                <option selected value="default"> -- pilih supplier -- </option>
                                <?php while ($fetch_supplier = mysqli_fetch_assoc($queryAllSupplier)) : ?>
                                    <option value="<?= $fetch_supplier['id']; ?>"><?= $fetch_supplier['nama']; ?></option>
                                <?php
                                endwhile;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="qty" class="form-label py-0 m-0">qty</label>
                            <input type="number" min="1" required class="form-control rounded-pill border-none" id="qty" name="qty" placeholder="qty" required style="box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;">
                        </div>
                        <div class="mb-3">
                            <label for="qty" class="form-label py-0 m-0">catatan</label>
                            <div class="form-floating">
                                <textarea required class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Comments</label>
                            </div>
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
    $('document').ready(function() {
        $('.js-example-basic-barang').select2()
        $('.js-example-basic-supplier').select2()
    })
</script>