<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Supplier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_supplier = $_GET['id'];
    
    $id_bersih = mysqli_real_escape_string($koneksi, $id_supplier);

    $query_select = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id='$id_bersih'");
    
    if (mysqli_num_rows($query_select) > 0) {
        $data = mysqli_fetch_assoc($query_select);
        
        if (isset($_POST['update'])) {
            $nama_baru = $_POST['nama'];
            $telp_baru = $_POST['telp'];
            $alamat_baru = $_POST['alamat'];

            $query_update = "UPDATE supplier SET 
                             nama = '$nama_baru', 
                             telp = '$telp_baru', 
                             alamat = '$alamat_baru' 
                             WHERE id='$id_bersih'";

            if (mysqli_query($koneksi, $query_update)) {
                echo "<script>alert('Data supplier berhasil diubah.'); window.location='index.php';</script>";
            } else {
                echo "<script>alert('Gagal mengubah data: " . mysqli_error($koneksi) . "');</script>";
            }
        }
?>
<div class="container mt-5">
    <h3 class="text-primary mb-4">Edit Data Supplier</h3>

    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo htmlspecialchars($data['nama']); ?>" required>
        </div>
        <div class="mb-3">
            <label>Telp</label>
            <input type="text" name="telp" class="form-control" value="<?php echo htmlspecialchars($data['telp']); ?>" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo htmlspecialchars($data['alamat']); ?>" required>
        </div>
        
        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="index.php" class="btn btn-danger">Batal</a>
    </form>
</div>

<?php
    } else {
        echo "<script>alert('Data supplier tidak ditemukan.'); window.location='index.php';</script>";
    }
} else {
    echo "<script>window.location='index.php';</script>";
}
?>

</body>
</html>