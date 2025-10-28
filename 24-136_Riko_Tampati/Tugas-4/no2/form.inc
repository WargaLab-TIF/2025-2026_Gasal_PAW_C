<form name="myForm" action="" method="POST">

  <div class="field">
    <label for="surname">Surname:</label>
    <input type="text" id="surname" name="surname" size="31" required
           value="<?php if (isset($_POST['surname'])) echo htmlspecialchars($_POST['surname']); ?>">
  </div>

  <div class="field">
    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" size="31" required
           value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
  </div>

  <div class="field">
    <label for="passwd">Password:</label>
    <input type="password" id="passwd" name="passwd" size="31" required>
  </div>

  <div class="field">
    <label for="address">Street Address:</label>
    <textarea id="address" name="address" rows="3" cols="27"><?php 
      if (isset($_POST['address'])) echo htmlspecialchars($_POST['address']); 
    ?></textarea>
  </div>

  <div class="field">
    <label for="state">State:</label>
    <select id="state" name="state" required>
      <option value="0">[Choose your state]</option>
      <option value="1" <?php if (isset($_POST['state']) && $_POST['state']=="1") echo "selected"; ?>>Australia</option>
      <option value="2" <?php if (isset($_POST['state']) && $_POST['state']=="2") echo "selected"; ?>>Amerika</option>
      <option value="3" <?php if (isset($_POST['state']) && $_POST['state']=="3") echo "selected"; ?>>Rusia</option>
      <option value="4" <?php if (isset($_POST['state']) && $_POST['state']=="4") echo "selected"; ?>>Indonesia</option>
      <option value="5" <?php if (isset($_POST['state']) && $_POST['state']=="5") echo "selected"; ?>>Malaysia</option>
      <option value="6" <?php if (isset($_POST['state']) && $_POST['state']=="6") echo "selected"; ?>>Singapura</option>
      <option value="7" <?php if (isset($_POST['state']) && $_POST['state']=="7") echo "selected"; ?>>Mexico</option>
      <option value="8" <?php if (isset($_POST['state']) && $_POST['state']=="8") echo "selected"; ?>>Jepang</option>
    </select>
  </div>

  <div class="field">
    <label>Gender:</label>
    <input type="radio" id="male" name="gender" value="male"
      <?php if (isset($_POST['gender']) && $_POST['gender']=="male") echo "checked"; ?>>
    <label for="male">Male</label>

    <input type="radio" id="female" name="gender" value="female"
      <?php if (isset($_POST['gender']) && $_POST['gender']=="female") echo "checked"; ?>>
    <label for="female">Female</label>
  </div>

  <div class="field">
    <label for="vegetarian">Vegetarian:</label>
    <input type="checkbox" id="vegetarian" name="vegetarian"
      <?php if (isset($_POST['vegetarian'])) echo "checked"; ?>>
  </div>

  <div class="field">
    <label>&nbsp;</label>
    <input type="submit" value="Submit" name="submit">
    <input type="reset" value="Reset" name="reset">
  </div>

</form>
