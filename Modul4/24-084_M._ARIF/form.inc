<form method="POST" action="">
    <fieldset>
        <legend>Person Details</legend>

        <!-- Surname -->
        <div class="field">
            <label for="surname">Surname:</label>
            <input type="text" name="surname" size="31"
                value="<?= isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : '' ?>">
        </div>
        <br>

        <!-- Email -->
        <div class="field">
            <label for="email">Email address:</label>
            <input type="text" name="email" size="31"
                value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
        </div>
        <br>

        <!-- Password -->
        <div class="field">
            <label for="password">Password:</label>
            <input type="password" name="password" size="31"
                value="<?= isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '' ?>">
        </div>
        <br>

        <!-- Street Address -->
        <div class="field">
            <label for="address">Street Address:</label>
            <textarea name="address" rows="3" cols="22"><?= isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '' ?></textarea>
        </div>
        <br>

        <!-- State -->
        <div class="field">
            <label for="state">State:</label>
            <select name="state">
                <option value="-1" <?= (isset($_POST['state']) && $_POST['state'] == "-1") ? "selected" : "" ?>>[choose your state]</option>
                <option value="QLD" <?= (isset($_POST['state']) && $_POST['state'] == "QLD") ? "selected" : "" ?>>Queensland</option>
                <option value="ACT" <?= (isset($_POST['state']) && $_POST['state'] == "ACT") ? "selected" : "" ?>>Australian Capital Territory</option>
                <option value="NSW" <?= (isset($_POST['state']) && $_POST['state'] == "NSW") ? "selected" : "" ?>>New South Wales</option>
                <option value="VIC" <?= (isset($_POST['state']) && $_POST['state'] == "VIC") ? "selected" : "" ?>>Victoria</option>
                <option value="SA"  <?= (isset($_POST['state']) && $_POST['state'] == "SA")  ? "selected" : "" ?>>South Australia</option>
                <option value="WA"  <?= (isset($_POST['state']) && $_POST['state'] == "WA")  ? "selected" : "" ?>>Western Australia</option>
                <option value="TAS" <?= (isset($_POST['state']) && $_POST['state'] == "TAS") ? "selected" : "" ?>>Tasmania</option>
                <option value="NT"  <?= (isset($_POST['state']) && $_POST['state'] == "NT")  ? "selected" : "" ?>>Northern Territory</option>
            </select>
        </div>
        <br>

        <!-- Hidden country -->
        <input type="hidden" name="country" value="Australia">

        <!-- Gender -->
        <div class="field">
            <label for="gender">Gender:</label>
            <input type="radio" name="gender" value="male" 
                <?= (isset($_POST['gender']) && $_POST['gender'] == "male") ? "checked" : "" ?>> Male
            <input type="radio" name="gender" value="female" 
                <?= (isset($_POST['gender']) && $_POST['gender'] == "female") ? "checked" : "" ?>> Female
        </div>
        <br>

        <!-- Age -->
        <div>
            <label for="age">Age:</label>
            <input type="text" name="age" size="10"
                value="<?= isset($_POST['age']) ? htmlspecialchars($_POST['age']) : '' ?>">
        </div><br>

        <!-- Date of Birth -->
        <div>
            <label for="date_of_birth">Date of Birth (YYYY-MM-DD):</label>
            <input type="text" name="date_of_birth" size="15"
                value="<?= isset($_POST['date_of_birth']) ? htmlspecialchars($_POST['date_of_birth']) : '' ?>">
        </div><br>

        <!-- Vegetarian -->
        <div class="field">
            <label for="vegetarian">Vegetarian:</label>
            <input type="checkbox" name="vegetarian" 
                <?= isset($_POST['vegetarian']) ? "checked" : "" ?>>
        </div>
        <br>

        <!-- Submit & Reset -->
        <div class="field">
            <input type="submit" value="Submit" name="submit">
            <input type="reset" value="Reset" name="reset">
        </div>
    </fieldset>
</form>