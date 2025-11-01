<?php
// Jika form dikirim (user menekan tombol submit)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama  = $_POST['nama'];
    $nilai = $_POST['nilai'];

    // Menentukan grade berdasarkan nilai
    if ($nilai >= 90) {
        $grade = "A";
    } elseif ($nilai >= 80) {
        $grade = "B";
    } elseif ($nilai >= 70) {
        $grade = "C";
    } elseif ($nilai >= 60) {
        $grade = "D";
    } else {
        $grade = "E";
    }

    // Menampilkan hasil
    echo "<h2>Hasil Penilaian Mahasiswa</h2>";
    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr><td>Nama</td><td>$nama</td></tr>";
    echo "<tr><td>Nilai</td><td>$nilai</td></tr>";
    echo "<tr><td>Grade</td><td>$grade</td></tr>";
    echo "</table><br>";
    echo "<a href='" . $_SERVER['PHP_SELF'] . "'><button>Input Lagi</button></a>";
} else {
    // Form input nilai
    ?>
    <h2>Form Penilaian Mahasiswa</h2>
    <form method="post" action="">
        <label>Nama Mahasiswa:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Nilai:</label><br>
        <input type="number" name="nilai" min="0" max="100" required><br><br>

        <input type="submit" value="Cek Grade">
    </form>
    <?php
}
?>