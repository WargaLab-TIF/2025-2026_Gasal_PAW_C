<!DOCTYPE html>
<html>
<head>
    <title>Biodata</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Biodata Diri</h2>
    
    <?php
    // Data biodata
    $nama = "Ferdiansyah";
    $umur = 24;
    $alamat = "Jl. Contoh No. 99";
    $email = "Ferdi@mail.com";
    $pekerjaan = "Web Developer";
    ?>
    
    <table>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?php echo $nama; ?></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td><?php echo $umur; ?> tahun</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?php echo $alamat; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td><?php echo $pekerjaan; ?></td>
        </tr>
    </table>
</body>
</html>