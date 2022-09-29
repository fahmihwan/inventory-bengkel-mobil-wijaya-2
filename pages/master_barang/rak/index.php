<?php

include './koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    mysqli_query($conn, "INSERT INTO rak (nama) VALUES ('$nama')");
}
$query = mysqli_query($conn, "SELECT * FROM rak");

?>

<div class="container-fluid px-4 ">
    <ol class="breadcrumb pt-2">
        <li class="breadcrumb-item ">Rak</li>
        <li class="breadcrumb-item active">list Rak</li>
    </ol>
    <div class="mb-4">
        <div class="card-header clearfix mb-3" style="border-radius: 20px ;background-color: white; border:0px;">
            <i class="fa-solid fa-boxes-stacked"></i>
            <span class="ms-2 fw-bolder"> Data Rak</span>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-primary float-end rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal">
                tambah data <i class="fa-solid fa-boxes-stacked"></i>
            </button>

        </div>

        <div class="p-3  bg-white " style="border-radius: 20px; ">
            <table id="datatablesSimple" style="border-color: white;">
                <thead class="">
                    <tr>
                        <th>no</th>
                        <th>Nama Rak</th>
                        <th>action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 1;
                    while ($data = mysqli_fetch_assoc($query)) :
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td class="text-center">
                                <a href="index.php?rak=update&id=<?= $data['id']; ?>" class="btn btn-sm btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="index.php?rak=delete&id=<?= $data['id']; ?>" onclick="confirmDelete(event)" class="btn btn-sm btn-danger" id="delete-alert">
                                    <i class="fa-sharp fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    endwhile;
                    ?>


                </tbody>
            </table>
        </div>
    </div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header ">
                <p class="modal-title fw-bold">Form Master Data Rak</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Rak</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Rak">
                    </div>
                    <div class="clearfix">
                        <div class="float-start">
                            <button type="submit" name="submit" class="btn btn-outline-primary"><i class="fa-solid fa-floppy-disk"></i> Save </button>
                            <button type="reset" class="btn btn-outline-warning"> <i class="fa-solid fa-rotate-right"></i> reset</button>
                        </div>
                        <button type="reset" class="btn btn-secondary float-end" data-bs-dismiss="modal" aria-label="Close">cancel</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<script>
    function confirmDelete(event) {
        event.preventDefault()
        const linkHref = event.currentTarget.getAttribute('href')
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "apakah anda yakin ingin menghapus?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = linkHref
            }
        })
    }
</script>