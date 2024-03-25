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
	<link rel="stylesheet" type="text/css" href="../css/style_youtube.css">
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
			<h1><a href="index.php">PEKARANGAN PANGAN LESTARI (P2L)</a></h1>
			<ul>
				<li><a href="index_admin.php">BERANDA</a></li>
				<li><a href="tanaman_admin.php">TANAMAN</a></li>
				<li><a href="kegiatan_admin.php">KEGIATAN</a></li>
				<li class="active"><a href="video_admin.php">VIDEO</a></li>
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
	<section class="label">
		<div class="container">
			<p>Beranda / Video</p>
		</div>
	</section>


	<div class="kegiatan_all">
		<div class="container_all">
			<h2>VIDEO KEGIATAN P2L</h2>
			<div class="konten_all">
				<div class="feedkegiatan_all">
				<?php

				$query = 'SELECT id,nama,youtubeid,tgl_posting
					FROM tb_videoyoutube
					ORDER BY id';

				$result = mysqli_query($connect, $query);

				if (!$result)
				{
					echo 'Error Message: ' . mysqli_error($connect) . '<br>';
					exit;
				}

				

				while ($record = mysqli_fetch_assoc($result))
				{

					echo '<hr>';

					echo '<h3>'.$record['nama'].'</h3>';

					$url = 'https://www.youtube.com/watch?v='.$record['youtubeid'];

					

					echo '<br><br>';

					echo '<div class="iframe-container"><iframe src="https://www.youtube.com/embed/'.$record['youtubeid'].'?modestbranding=1" 
						frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
						allowfullscreen></iframe></div>';

					echo '<h4><i class="fa-solid fa-link"></i> LINK : <a href="'.$url.'">'.$url.'</a></h4>';

					echo '<hr>';
					echo '<h5>Diposting pada : '.$record['tgl_posting'];

				}

				?>        
				
				
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