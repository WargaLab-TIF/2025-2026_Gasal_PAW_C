<?php
session_start();
include'koneksi.php';
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=md5(string: $_POST['password']);
    $query="SELECT * FROM username WHERE username='$username'";
    $result=mysqli_query(mysql: $conn,query: $query);
    if(mysqli_num_rows(result: $result)>0){
        $data=mysqli_fetch_assoc(result: $result)
    }
}
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Registrasi</h3>
    <from action=""method="post"
        <input type="text" name="username" placeholder="Username" require><br></br>
        <input type="password" name="password" placeholder="pasword" require><br></br>
        <input type="text" name="nama" placeholder="Nama lengkap" require><br></br>
        <input type="text" name="Alamat" placeholder="Alamat" require><br></br>
        <input type="number" name="hp" placeholder="No Hp" require><br></br>
        <input type="submit" name="tombol_daftar" value="Daftar">
    </from>    
    <a href="login.php">Batal / Login </a>
</body>
</html>