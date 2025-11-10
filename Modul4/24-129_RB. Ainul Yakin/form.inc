<link rel="stylesheet" href="style.css">
<form name="myForm" action="form.php" method="POST">
<div class="field">
        <label for="surname">Surname</label>
        <input type="text" name="surname" size="31">
</div>
<div class="field">
        <label for="nim">NIM</label>
        <input type="text" name="nim" size="31">
</div>
<div class="field">
        <label for="email">Email</label>
        <input type="text" name="email" size="31">
</div>
<div class="field">
        <label for="password">Password</label>
        <input type="password" name="password" size="31">
</div>
<div class="field">
        <label for="address">Street Address</label>
        <textarea name="address" rows="3" cols="22"></textarea>
</div>

<div class="field">
        <label for="kota">Kota Madura</label>
        <select name="kota" >
        <option value="-1" selected>[Madura Mana?]</option>
        <option value="1">Sumenep</option>
        <option value="2">Pamekasan</option>
        <option value="3">Sampang</option>
        <option value="4">Bangkalan</option>

        </select>
</div>
<div class="field">
        <input type="hidden" name="negara" value="Indonesia">
</div>
<div class="field">
        <label for="gender">Gender</label>
        <input type="radio" name="cowo" value="male" id="male">Cowo
        <input type="radio" name="cewe" value="female" id="female">Cewe
</div>
<div class="field">
        <label for="vegetarian">Vegetarian</label>
        <input type="checkbox" name="vegetarian">
</div>
<div class="field">
        <label></label>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Reset">
</div>