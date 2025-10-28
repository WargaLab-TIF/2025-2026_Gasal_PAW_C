<form name="mahasiswaForm" action="" method="POST">

  <div class="field">
    <label for="nama">Nama Mahasiswa:</label>
    <input type="text" id="nama" name="nama" size="40" required
      value="<?php if (isset($_POST['nama'])) echo htmlspecialchars($_POST['nama']); ?>">
  </div>

  <div class="field">
    <label for="nim">NIM:</label>
    <input type="text" id="nim" name="nim" size="20" required
      value="<?php if (isset($_POST['nim'])) echo htmlspecialchars($_POST['nim']); ?>">
  </div>

  <div class="field">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" size="40" required
      value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
  </div>

  <div class="field">
    <label for="jurusan">Jurusan:</label>
    <select id="jurusan" name="jurusan" required>
      <option value="">[Pilih Jurusan]</option>
      <option value="TI" <?php if(isset($_POST['jurusan']) && $_POST['jurusan']=="TI") echo "selected"; ?>>Teknik Informatika</option>
      <option value="SI" <?php if(isset($_POST['jurusan']) && $_POST['jurusan']=="SI") echo "selected"; ?>>Sistem Informasi</option>
      <option value="MI" <?php if(isset($_POST['jurusan']) && $_POST['jurusan']=="MI") echo "selected"; ?>>Manajemen Informatika</option>
    </select>
  </div>

  <div class="field">
    <label>&nbsp;</label>
    <input type="submit" value="Submit" name="submit">
    <input type="reset" value="Reset">
  </div>

</form>
