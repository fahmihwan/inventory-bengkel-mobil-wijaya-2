<?php
include './koneksi.php';

$id = $_GET['id'];
$query_select = mysqli_query($conn, "SELECT * FROM rak WHERE id='$id'");

$data = mysqli_fetch_assoc($query_select);

if (isset($_POST['submit'])) {

    $idd = $_POST['id'];
    $rak = $_POST['rak'];
    $query = mysqli_query($conn, "UPDATE rak SET nama='$rak' WHERE id='$idd'");

    if ($query) {
        echo "<script>
        alert('success')
        window.location.href='index.php?menu=rak';
        </script>";
    } else {
        echo "<script>
        alert('fail')
        window.location.href='index.php?menu=rak';
        </script>";
    }
}
?>

<div class="container-fluid px-4 ">
    <ol class="breadcrumb pt-2">
        <li class="breadcrumb-item ">rak</li>
        <li class="breadcrumb-item"><a href="index.php?menu=rak">List Data</a></li>
        <li class="breadcrumb-item active">Ubah rak</li>
    </ol>
    <div class="mb-4">
        <div class="card-header clearfix mb-3" style="border-radius: 20px ;background-color: white; border:0px;">
            <i class="fa-solid fa-users"></i>
            <span class="ms-2 fw-bolder"> Form Ubah rak</span>
            <a href="index.php?menu=rak" class="btn btn-sm btn-primary float-end rounded-pill ">
                <i class="fa-solid fa-arrow-left"></i> kembali
            </a>
        </div>
    </div>
    <div class="row ">
        <div class="mb-4 col-md-6">
            <div class="card border-none" style="box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;">
                <div class="rounded-bottom mx-4  py-3 px-2  text-light" style="background-color: #1a1c2f;">
                    <span class="p-2 rounded-pill flex" style="background-color: #343549;"> Form rak</span>
                </div>
                <div class="card-body px-4">
                    <form action="" method="POST">
                        <input type="hidden" value="<?= $data['id'] ?>" name="id">
                        <div class="mb-3">
                            <label for="nama" class="form-label py-0 m-0">rak</label>
                            <input type="text" value="<?= $data['nama']; ?>" class="form-control rounded-pill border-none" name="rak" placeholder="rak" required style="box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;">
                        </div>
                        <button name="submit" type="submit" class="btn btn-primary rounded-pill">ubah</button>
                        <button class="btn btn-secondary rounded-pill">clear</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>