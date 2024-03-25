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
    <link rel="stylesheet" type="text/css" href="style_tampilan.css">
    <link rel="stylesheet" type="text/css" href="../css/style_tanamanlengkap.css">
    <link rel="stylesheet" type="text/css" href="style_kegiatan.css">
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
                <li class="active"><a href="tanaman_admin.php">TANAMAN</a></li>
				<li><a href="kegiatan_admin.php">KEGIATAN</a></li>
				<li><a href="video_admin.php">VIDEO</a></li>
				<li class="dropdown">
                    <a href="adminlogout.php" class="dropbtn"><?= $admin['username'];?> </a>
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
			<p>Beranda / Tanaman</p>
		</div>
	</section>
    
    

	
    <div class="tanaman_all">
		<div class="container_tnm">
			<h2>TANAMAN P2L</h2>
			<div class="konten_tnm">
                <a href="input_tanaman.php" title="TAMBAH TANAMAN"> <i class="fa-solid fa-plus"></i> TAMBAH TANAMAN</a>
				<?php
				$tanaman = mysqli_query($connect, "select * from tb_tanaman, tb_admin where tb_tanaman.id_admin=tb_admin.id_admin
				order by id_tanaman desc");
				while($row = mysqli_fetch_array($tanaman)){
					?>
				<div class="feedtanaman_all">
                    
                <h3><?= $row['nama_tanaman'];?></h3>
                <h4>(<?= $row['nama_latin'];?>)</h4>
				<img src="../img/kegiatan/<?= $row['gambar_tanaman']?>" alt="<?= $row['nama_tanaman'];?>"></img>
				<a href="edit_tanaman.php?id=<?= $row['id_tanaman'];?>" title="EDIT"> <i class="fa-solid fa-pen-to-square"></i> EDIT</a>
                <a href="hapus_tanaman.php?id=<?= $row['id_tanaman'];?>" title="HAPUS"> <i class="fa-solid fa-trash-can"></i> HAPUS</a>
				<p><?= $row['deskripsi'];?></p>
                <h5><i class="fa-solid fa-user"></i> <?= $row['username'];?>
				<i class="fa-solid fa-clock"></i>  <?= $row['tgl_posting'];?></h5>
                <hr>
				</div>
				<?php } ?>
				</div>
				<div style="clear:both;"></div>
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