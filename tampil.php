<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil data database</title>
</head>
<body>
    
<?php
include "koneksi.php";
?>

<table border="1" width="800px" align="center">
    <thead>
    <tr>
        <th colspan="5"><h3>Data User</h3></th>
    </tr>
        <tr>
            <th>ID</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Pekerjaan</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $data = mysqli_query($connect, "select * from tb_user");
    while($row = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?= $row['id_user'];?></td>
            <td><?= ucwords($row['nama']);?></td>
            <td><?= $row['jenis_kelamin'];?></td>
            <td><?= $row['pekerjaan'];?></td>
            <td><?= $row['alamat'];?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

</body>
</html>