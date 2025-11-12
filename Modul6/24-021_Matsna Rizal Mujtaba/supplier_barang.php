<?php include 'koneksi.php'; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Form Master - Detail Supplier & Barang</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>

<form method="POST">
  <h2>Data Supplier (Master)</h2>
  <label>Nama Supplier:</label>
  <input type="text" name="nama" required>

  <label>Telepon:</label>
  <input type="text" name="telp" required>

  <label>Alamat:</label>
  <input type="text" name="alamat" required>

  <h2>Data Barang (Detail)</h2>
  <table>
    <tr>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Harga</th>
      <th>Stok</th>
      <th>Aksi</th>
    </tr>

    <?php
    if (!isset($_SESSION['barang'])) {
      $_SESSION['barang'] = [];
    }

    if (isset($_POST['tambah_barang'])) {
      $_SESSION['barang'][] = [
        'kode' => $_POST['kode_barang'],
        'nama' => $_POST['nama_barang'],
        'harga' => $_POST['harga'],
        'stok' => $_POST['stok']
      ];
    }

    if (isset($_POST['hapus_index'])) {
      $i = $_POST['hapus_index'];
      unset($_SESSION['barang'][$i]);
      $_SESSION['barang'] = array_values($_SESSION['barang']);
    }

    foreach ($_SESSION['barang'] as $i => $b) {
      echo "<tr>
              <td>{$b['kode']}</td>
              <td>{$b['nama']}</td>
              <td>{$b['harga']}</td>
              <td>{$b['stok']}</td>
              <td>
                <form method='POST' style='display:inline'>
                  <input type='hidden' name='hapus_index' value='$i'>
                  <button class='btn btn-delete' type='submit'>Hapus</button>
                </form>
              </td>
            </tr>";
    }
    ?>
  </table>

  <h3>Tambah Barang Baru</h3>
  <label>Kode Barang:</label>
  <input type="text" name="kode_barang" required>

  <label>Nama Barang:</label>
  <input type="text" name="nama_barang" required>

  <label>Harga:</label>
  <input type="number" name="harga" required>

  <label>Stok:</label>
  <input type="number" name="stok" required>

  <button class="btn btn-add" type="submit" name="tambah_barang">+ Tambah Barang</button>
  <button class="btn btn-save" type="submit" name="simpan_data">Simpan Data</button>
</form>

<?php
if (isset($_POST['simpan_data'])) {
  $nama = $_POST['nama'];
  $telp = $_POST['telp'];
  $alamat = $_POST['alamat'];

  $query_supplier = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";
  mysqli_query($koneksi, $query_supplier);
  $supplier_id = mysqli_insert_id($koneksi);

  foreach ($_SESSION['barang'] as $b) {
    $query_barang = "INSERT INTO barang (kode_barang, nama_barang, harga, stok, supplier_id)
                     VALUES ('{$b['kode']}', '{$b['nama']}', {$b['harga']}, {$b['stok']}, $supplier_id)";
    mysqli_query($koneksi, $query_barang);
  }

  $_SESSION['barang'] = [];
  echo "<p class='success'>Data supplier dan barang berhasil disimpan!</p>";
}
?>

</body>
</html>
