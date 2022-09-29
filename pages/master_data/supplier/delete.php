<?php

include './koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM supplier WHERE id='$id'");

if (mysqli_affected_rows($conn) == 1) {
    echo "<script>
    alert('success');
    window.location.href = 'index.php?menu=supplier';
    </script>";
} else {
    echo "<script>
    alert('fail');
    window.location.href = 'index.php?menu=supplier';
    </script>";
}
