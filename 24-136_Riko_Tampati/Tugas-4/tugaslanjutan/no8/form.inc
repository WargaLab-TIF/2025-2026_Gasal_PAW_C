<form name="mahasiswaForm" action="" method="POST">

  <div class="field">
    <label for="nama">Nama Mahasiswa:</label>
    <input type="text" id="nama" name="nama" size="40"
      value="<?php if(isset($_POST['nama'])) echo htmlspecialchars($_POST['nama']); ?>">
    <div style="color:red;">
      <?php if(isset($errors['nama'])) echo $errors['nama']; ?>
    </div>
  </div>

  <div class="field">
    <label for="nim">NIM:</label>
    <input type="text" id="nim" name="nim" size="20"
      value="<?php if(isset($_POST['nim'])) echo htmlspecialchars($_POST['nim']); ?>">
    <div style="color:red;">
      <?php if(isset($errors['nim'])) echo $errors['nim']; ?>
    </div>
  </div>

  <div class="field">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" size="40"
      value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
    <div style="color:red;">
      <?php if(isset($errors['email'])) echo $errors['email']; ?>
    </div>
  </div>

  <div class="field">
    <label for="passwd">Password:</label>
    <input type="password" id="passwd" name="passwd" size="30">
    <div style="color:red;">
      <?php if(isset($errors['passwd'])) echo $errors['passwd']; ?>
    </div>
  </div>

  <div class="field">
    <label for="jurusan">Jurusan:</label>
    <select id="jurusan" name="jurusan">
      <option value="">[Pilih Jurusan]</option>
      <option value="TI" <?php if(isset($_POST['jurusan']) && $_POST['jurusan']=="TI") echo "selected"; ?>>Teknik Informatika</option>
      <option value="SI" <?php if(isset($_POST['jurusan']) && $_POST['jurusan']=="SI") echo "selected"; ?>>Sistem Informasi</option>
      <option value="MI" <?php if(isset($_POST['jurusan']) && $_POST['jurusan']=="MI") echo "selected"; ?>>Manajemen Informatika</option>
    </select>
    <div style="color:red;">
      <?php if(isset($errors['jurusan'])) echo $errors['jurusan']; ?>
    </div>
  </div>

  <div class="field">
    <label>&nbsp;</label>
    <input type="submit" value="Submit" name="submit">
    <input type="reset" value="Reset">
  </div>

</form>
