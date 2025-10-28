<!DOCTYPE html>
<html>
<head>
    <title>Form Validasi Self-Submission</title>
</head>
<body>
    <h2>Form Input Surname (Self Submission)</h2>

    <!-- Form dikirim ke file ini sendiri -->
    <form method="post" action="soal2.php">
        <label>Masukkan Surname:</label><br>
        <input type="text" name="surname" required>
        <input type="submit" value="Kirim">
    </form>

    <?php
    // Cek apakah tombol submit ditekan
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $surname = $_POST['surname'];

        // Tampilkan hasil input
        echo "<br><strong>Hasil Input:</strong><br>";
        echo "Surname yang dimasukkan: <b>" . htmlspecialchars($surname) . "</b>";
    }
    ?>
</body>
</html>
