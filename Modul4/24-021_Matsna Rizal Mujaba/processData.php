<?php
require 'validate.inc';
$errors = array();

validateName($errors, $_POST, 'surname');

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Form Data Pribadi</title>
</head>
<body ALIGN="CENTER ">
  <h2>Formulir Data Pribadi</h2>
  <form action="processData.php" method="POST">
    
    <label>Surname:</label><br>
    <input type="text" name="surname" required><br><br>
    
    <label>Email Address:</label><br>
    <input type="email" name="email" required><br><br>
    
    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>
    
    <label>Street Address:</label><br>
    <textarea name="address" rows="3" cols="30" required></textarea><br><br>
    
    <label>State:</label><br>
    <select name="state" required>
      <option value="">-- Pilih State --</option>
      <option value="New South Wales">New South Wales</option>
      <option value="Victoria">Victoria</option>
      <option value="Queensland">Queensland</option>
      <option value="Western Australia">Western Australia</option>
      <option value="South Australia">South Australia</option>
    </select><br><br>

    <input type="hidden" name="country" value="Australia">

    <label>Gender:</label><br>
    <input type="radio" name="gender" value="Male" required> Male
    <input type="radio" name="gender" value="Female" required> Female<br><br>

    <label>Vegetarian?</label>
    <input type="checkbox" name="vegetarian" value="Yes"><br><br>

    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
  </form>
<?php
    if ($errors){
        echo "<h3>Error :<br></h3>";
        foreach ($errors as $field => $error)
            echo "$field: $error<br>";
    }
    else {
        echo "<h3>Data OK!</h3>";
    }
?>
</body>
</html>


