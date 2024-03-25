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
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>P2L, Gedongan, Manguharjo, Madiun</title>
	<link rel="icon" href="../img/logo4.png">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/style_keg.css">
	<link rel="stylesheet" type="text/css" href="style_imgslide.css">
    <link rel="stylesheet" type="text/css" href="style_kegiatan.css">
	<link rel="stylesheet" type="text/css" href="style_tampilan.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<!-- Swiper CSS -->
	<link rel="stylesheet" href="../css/swiper-bundle.min.css">
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
				<li><a href="kegiatan_admin.php">KEGIATAN</a></li>
				<li><a href="video_admin.php">VIDEO</a></li>
				<li class="active">
                    <a href="adminlogout.php" class="dropbtn"><?= $admin['username'];?> </a>
                </li>
			</ul>
		</div>
	</header>



    <section class="banneradmin">
		<h2><a href="tambah_admin.php">TAMBAH ADMIN</a></h2>
        <h2><a href="logout.php">LOGOUT</a></h2>
	</section>



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

	<!-- Swiper JS -->
    <script src="../js/swiper-bundle.min.js"></script>

    <!-- JavaScript -->
    <script src="../js/script.js"></script>

</html>