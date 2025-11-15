<form method="post" action="soal4-5.php">
    <label for="surname">Masukkan Surname:</label><br>
    <input 
        type="text" 
        name="surname" 
        id="surname"
        value="<?php
            // hanya tampilkan input lama jika TIDAK ada error
            if (isset($_POST['surname']) && empty($errors)) {
                echo htmlspecialchars($_POST['surname']);
            }
        ?>"
    >
    <br><br>
    <input type="submit" value="Kirim">
</form>
