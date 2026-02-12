<?php
require '../koneksi.php'; // Koneksi ke database
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    // Tampilkan konfirmasi penghapusan
    echo "<script>
            if (confirm('Apakah Anda yakin ingin menghapus data user ini?')) {
                window.location = 'hapus_user.php?id_user=$id_user&confirm=yes';
            }
        </script>";
}

if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    $id_user = $_GET['id_user'];
    $query = "DELETE FROM user WHERE id_user = '$id_user'";

    if (mysqli_query($koneksi, $query)) {
        header("Location: data_user.php");
    } else {
        echo "Gagal menghapus data!";
    }
}
?>
