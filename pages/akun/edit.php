<?php
include './koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hak_akses = $_POST['hak_akses'];

    $query = mysqli_query($conn, "UPDATE users SET
        nama='$nama',
        username='$username',
        password='$password',
        hak_akses='$hak_akses'
        WHERE id='$id'");

    if ($query) {
        echo "<script>
        alert('success');   
        window.location.href = 'index.php?menu=akun'
        </script>";
    } else {
        echo "<script>
        alert('success');   
        window.location.href = 'index.php?menu=akun'
        </script>";
    }
}



?>
<div class="container-fluid px-4 ">
    <ol class="breadcrumb pt-2">
        <li class="breadcrumb-item ">setting</li>
        <li class="breadcrumb-item active">Input Data Akun</li>
    </ol>
    <div class="mb-4">
        <div class="card-header clearfix mb-3" style="border-radius: 20px ;background-color: white; border:0px;">
            <i class="fa-solid fa-users"></i>
            <span class="ms-2 fw-bolder"> Form Input Akun</span>
            <a href="index.php?menu=akun" class="btn btn-sm btn-primary float-end rounded-pill ">
                <i class="fa-solid fa-arrow-left"></i> kembali
            </a>
        </div>
    </div>
    <div class="row ">
        <div class="mb-4 col-md-6">
            <div class="card border-none" style="box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;">
                <div class="rounded-bottom mx-4  py-3 px-2  text-light" style="background-color: #1a1c2f;">
                    <span class="p-2 rounded-pill flex" style="background-color: #343549;"> Form Register</span>
                </div>
                <div class="card-body px-4">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label py-0 m-0">nama</label>
                            <input type="text" value="<?= $data['nama'] ?>" class=" form-control rounded-pill border-none" id="nama" name="nama" placeholder="nama" required style="box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label py-0 m-0">username</label>
                            <input type="text" value="<?= $data['username'] ?>" class=" form-control rounded-pill border-none" id="nama" name="username" placeholder="username" required style="box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label py-0 m-0">password</label>
                            <input type="text" value="<?= $data['password'] ?>" class=" form-control rounded-pill border-none" id="alamat" name="password" placeholder="password" required style="box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;">
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="form-label py-0 m-0">Hak akses</label>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="hak_akses" value="owner" <?= ($data['hak_akses'] == 'owner') ?  "checked" : "";  ?> id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Owner
                                </label>
                            </div>

                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="hak_akses" value="admin" <?= ($data['hak_akses'] == 'admin') ?  "checked" : "";  ?> id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Admin
                                </label>
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