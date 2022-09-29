<?php

include './koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    $query_insert = mysqli_query($conn, "INSERT INTO montir (nama,telp,alamat,status) VALUES ('$nama','$telp','$alamat','$status')");

    if ($query_insert) {
        echo "<script>
        alert('success');   
        window.location.href = 'index.php?menu=montir'
        </script>";
    } else {
        echo "<script>
        alert('success');   
        window.location.href = 'index.php?menu=montir'       
        </script>";
    }
}
$query = mysqli_query($conn, "SELECT * FROM montir");
?>

<div class="container-fluid px-4 ">
    <ol class="breadcrumb pt-2">
        <li class="breadcrumb-item ">montir</li>
        <li class="breadcrumb-item"><a href="index.php?menu=montir">List Data</a></li>
        <li class="breadcrumb-item active">Input Data Montri</li>
    </ol>
    <div class="mb-4">
        <div class="card-header clearfix mb-3" style="border-radius: 20px ;background-color: white; border:0px;">
            <i class="fa-solid fa-users"></i>
            <span class="ms-2 fw-bolder"> Form Input Montir</span>
            <a href="index.php?menu=montir" class="btn btn-sm btn-primary float-end rounded-pill ">
                <i class="fa-solid fa-arrow-left"></i> kembali
            </a>
        </div>
    </div>
    <div class="row ">
        <div class="mb-4 col-md-6">
            <div class="card border-none" style="box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;">
                <div class="rounded-bottom mx-4  py-3 px-2  text-light" style="background-color: #1a1c2f;">
                    <span class="p-2 rounded-pill flex" style="background-color: #343549;"> Form Montir</span>
                </div>
                <div class="card-body px-4">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label py-0 m-0">nama</label>
                            <input type="text" class="form-control rounded-pill border-none" id="nama" name="nama" placeholder="nama" required style="box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;">
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="form-label py-0 m-0">telp</label>
                            <input type="text" class="form-control rounded-pill border-none" id="telp" name="telp" placeholder="ex: 08xxxxxxxxxx" required style="box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label py-0 m-0">alamat</label>
                            <input type="text" class="form-control rounded-pill border-none" id="alamat" name="alamat" placeholder="alamat" required style="box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label py-0 m-0">status</label>
                            <!-- <input type="number" class="form-control rounded-pill border-none" id="telp" name="telp" placeholder="telp" required style="box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;"> -->
                            <select name="status" id="status" class="form-control">
                                <option value="aktif">aktif</option>
                                <option value="non-aktif">non-aktif</option>
                            </select>
                        </div>

                        <button name="submit" class="btn btn-primary rounded-pill">submit</button>
                        <button class="btn btn-secondary rounded-pill">clear</button>

                    </form>
                </div>

            </div>
        </div>
    </div>

</div>