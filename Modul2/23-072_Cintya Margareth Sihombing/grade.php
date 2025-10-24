<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Penilaian Mahasiswa - Percabangan Grade Nilai</title>
  <style>
    body { font-family: Arial, sans-serif; max-width:700px; margin:40px auto; padding:10px; }
    label { display:block; margin-top:10px; }
    input[type="text"], input[type="number"] { width:100%; padding:8px; box-sizing:border-box; }
    .result { margin-top:20px; padding:12px; border-radius:6px; background:#f2f2f2; }
    .error { color:#b00020; }
  </style>
</head>
<body>

  <h2>Form Penilaian Mahasiswa</h2>
  <form method="post" action="">
    <label>Nama:
      <input type="text" name="nama" required>
    </label>

    <label>NIM:
      <input type="text" name="nim" required>
    </label>

    <label>Nilai (0 - 100):
      <input type="number" name="nilai" min="0" max="100" required>
    </label>

    <button type="submit" style="margin-top:12px;">Hitung Grade</button>
  </form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama  = trim($_POST['nama']);
    $nim   = trim($_POST['nim']);
    $nilai = $_POST['nilai'];

    if (!is_numeric($nilai) || $nilai < 0 || $nilai > 100) {
        echo '<div class="result error">Masukkan nilai antara 0 sampai 100!</div>';
    } else {
        $nilai = (float)$nilai;

        // Percabangan berdasarkan nilai baru
        if ($nilai >= 90) {
            $grade = 'A';
            $keterangan = 'Sangat Baik';
        } elseif ($nilai >= 80) {
            $grade = 'B';
            $keterangan = 'Baik';
        } elseif ($nilai >= 70) {
            $grade = 'C';
            $keterangan = 'Cukup';
        } elseif ($nilai >= 60) {
            $grade = 'D';
            $keterangan = 'Kurang';
        } else {
            $grade = 'E';
            $keterangan = 'Gagal';
        }

        $safeNama = htmlspecialchars($nama);
        $safeNIM  = htmlspecialchars($nim);

        echo "<div class='result'>
                <strong>Hasil Penilaian</strong><br>
                Nama: {$safeNama}<br>
                NIM: {$safeNIM}<br>
                Nilai: {$nilai}<br>
                Grade: <strong>{$grade}</strong> — {$keterangan}
              </div>";
    }
}
?>

</body>
</html>
