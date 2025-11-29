<form action="form.php" method="POST">
        <label for="surname">Name</label>
        <input type="text" name="surname" id="surname"><br>
        
        <label for="email">Email</label>
        <input type="text" name="email"><br>

        <label for="password">Password</label>
        <input type="password" name="password"><br>

        <label for="address">Address</label><br>
        <textarea name="address" rows="3"></textarea><br>

        <label for="negara">Negara</label>
            <select name="negara">
              <option value="indonesia">Indonesia</option>
              <option value="malaysia">Malaysia</option>
              <option value="vietnam">Vietnam</option>
              <option value="singapura">Singapura</option>
              <option value="thailand">Thailand</option>
              <option value="philippines">Philippines</option>
              <option value="other">Other</option>
            </select>
        <div class="radio">
            <label for="gender">Gender</label><br>
            <input type="radio" name="gender" value="Pria"> Pria
            <input type="radio" name="gender" value="Wanita"> Wanita
        </div>

        <div class="checkbox">
            <label for="vegetarian">Vegetarian</label><br>
            <input type="checkbox" name="vegetarian" value="Ya"> Ya
        </div>

        <div class="button">
            <button type="reset">Reset</button>
            <button type="submit">Submit</button>
        </div>
</form>