<?php 
error_reporting(0);
session_start();
include "../koneksi.php";

$sesiadmin = $_SESSION['owner'];
if(!isset($sesiadmin)){
    header('location:admin.php');
}
$admin = mysqli_fetch_array(mysqli_query($connect, "select * from tb_admin where id_admin='$sesiadmin'"));

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>P2L, Gedongan, Manguharjo, Madiun</title>
	<link rel="icon" href="../img/logo4.png">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="style_kegiatan.css">
	<link rel="stylesheet" type="text/css" href="style_imgslide.css">
    <link rel="stylesheet" type="text/css" href="style_tampilan.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
	<!-- loader -->
	<div class="bg-loader">
		<div class="loader"></div>
	</div>

	<!-- header -->
	<div class="welcome">
		<marquee>Selamat Datang <?= $admin['nama_lengkap'];?> di Ruang Admin !</marquee>
	</div>


    <header>
		<div class="container">
			<h1><a href="index_admin.php">PEKARANGAN PANGAN LESTARI (P2L)</a></h1>
			<ul>
				<li><a href="index_admin.php">BERANDA</a></li>
				<li><a href="tanaman_admin.php">TANAMAN</a></li>
				<li class="active"><a href="kegiatan_admin.php">KEGIATAN</a></li>
				<li><a href="video_admin.php">VIDEO</a></li>
                <li class="dropdown">
                    <a href="adminlogout.php" class="dropbtn"><?= $admin['username'];?> <i class="fa-solid fa-caret-down"></i></a>
                    <div class="dropdown-content">
                        <a href="tambah_admin.php">TAMBAH ADMIN</a>
                        <a href="logout.php">LOGOUT</a>
                    </div>
                </li>
			</ul>
		</div>
	</header>

    <!-- label -->
	<section class="label_keg">
		<div class="container">
			<p>Beranda / Kegiatan</p>
		</div>
	</section>


    <div class="kegiatan_admin">
		<div class="container_admin">
			<h2>KEGIATAN P2L</h2>
			<div class="konten_admin">
                <a href="input_kegiatan.php" title="TAMBAH KEGIATAN"> <i class="fa-solid fa-plus"></i> TAMBAH KEGIATAN</a>
				<table border="1" width="100%" min height="400px">
                <thead>
                    <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Tgl Posting</th>
					<th>Admin</th>
                    <th>Gambar</th>
                    <th>Edit</th>
					<th>Hapus</th>
                </thead>
                <tbody>
                <?php
                $sql = mysqli_query($connect, "select * from tb_kegiatan, tb_kategori, tb_admin
                where tb_kegiatan.id_kategori=tb_kategori.id_kategori and tb_kegiatan.id_admin=tb_admin.id_admin");
                while($row=mysqli_fetch_array($sql)){
                    ?>
                <tr>
                <td><?= $row['judul'];?></td>
                <td><?= $row['kategori'];?></td>
                <td><?= $row['deskripsi_kegiatan'];?></td>
                <td><?= $row['tgl_posting'];?></td>
				<td><?= $row['username'];?></td>
                <td><img src="../img/kegiatan/<?= $row['gambar'];?>" style="width:100px;height:100px;"></td>
                <td><a href="edit_kegiatan.php?id=<?= $row['id_kegiatan'];?>" title="EDIT"> <i class="fa-solid fa-pen-to-square"></i> EDIT</a></td>
                <td><a href="hapus_kegiatan.php?id=<?= $row['id_kegiatan'];?>" title="HAPUS"> <i class="fa-solid fa-trash-can"></i> HAPUS</a></td>
                </tr>
                <?php } ?>
                </tbody>
                </table>
			</div>
		</div> 
	</div>


    
                
    
    

    <!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2022 - P2L. All Rights Reserved.</small>
		</div>
	</footer>


    <script type="text/javascript">
		$(document).ready(function(){
			$(".bg-loader").hide();
		})
	</script>

</body>
</html>