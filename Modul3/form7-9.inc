<form method="post" action="soal7-9.php">
    <label for="surname">Masukkan Surname:</label><br>
    <input 
        type="text" 
        name="surname" 
        id="surname"
        value="<?php if (isset($_POST['surname'])) echo htmlspecialchars($_POST['surname']); ?>"
    >
    <br><br>

    <label for="email">Masukkan Email:</label><br>
    <input 
        type="text" 
        name="email" 
        id="email"
        value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>"
    >
    <br><br>

    <label for="password">Masukkan Password:</label><br>
    <input 
        type="password" 
        name="password" 
        id="password"
        value="<?php if (isset($_POST['password'])) echo htmlspecialchars($_POST['password']); ?>"
    >
    <br><br>

    <input type="submit" value="Kirim">
</form>
