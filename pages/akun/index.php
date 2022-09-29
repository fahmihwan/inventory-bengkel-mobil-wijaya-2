<?php
include './koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM users")
?>

<div class="container-fluid px-4 ">
    <ol class="breadcrumb pt-2">
        <li class="breadcrumb-item ">Data Barang</li>
        <li class="breadcrumb-item active">list Barang</li>
    </ol>
    <div class="mb-4">
        <div class="card-header clearfix mb-3" style="border-radius: 20px ;background-color: white; border:0px;">
            <i class="fa-solid fa-boxes-stacked"></i>
            <span class="ms-2 fw-bolder"> Data Barang</span>

            <!-- Button trigger modal -->
            <a href="index.php?akun=add" class="btn btn-sm btn-primary float-end rounded-pill">
                tambah data <i class="fa-solid fa-boxes-stacked"></i>
            </a>
        </div>
        <div class="p-3  bg-white " style="border-radius: 20px; ">
            <table id="datatablesSimple" style="border-color: white;">
                <thead class="">
                    <tr>
                        <th>no</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Hak Akses</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($data = mysqli_fetch_assoc($query)) :
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $data['nama']  ?></td>
                            <td><?= $data['username']  ?></td>
                            <td><?= $data['hak_akses']  ?></td>
                            <td class="text-center">
                                <a href="index.php?data-barang=update&id=<?= $data['id']; ?>" class="btn btn-sm btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="index.php?data-barang=delete&id=<?= $data['id']; ?>" onclick="confirmDelete(event)" class="btn btn-sm btn-danger" id="delete-alert">
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