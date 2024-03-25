<?php include "koneksi.php";?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>P2L, Gedongan, Manguharjo, Madiun</title>
	<link rel="icon" href="img/logo4.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="admin/style_kegiatan.css">
	<link rel="stylesheet" type="text/css" href="admin/style_imgslide.css">
	<link rel="stylesheet" type="text/css" href="css/style_youtube.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
	<!-- loader -->
	<div class="bg-loader">
		<div class="loader"></div>
	</div>

	<!-- header -->
	<div class="medsos">
		<div class="container">
			<ul>
				<li><a href="https://www.facebook.com/gedongan.kb.5" target="_blank" title="Kampung KB Gedongan Prima">
					<i class="fab fa-facebook"></i></a></li>
				<li><a href="https://www.youtube.com/channel/UCCkg-ScHi6cEq-EWJBXmzFA" target="_blank" title="P2L Manguharjo Madiun">
					<i class="fab fa-youtube"></i></a></li>
				
					<li><a href="https://www.instagram.com/hadisuparno__/" target="_blank" title="P2L">
					<i class="fa-brands fa-instagram"></i></a></li>
			</ul>
		</div>
	</div>

    <header>
		<div class="container">
			<h1><a href="index.php">PEKARANGAN PANGAN LESTARI (P2L)</a></h1>
			<ul>
				<li><a href="index.php">BERANDA</a></li>
				<li class="active"><a href="kegiatan.php">KEGIATAN</a></li>
				<li><a href="tentang.php">TENTANG</a></li>
				<li><a href="admin/admin.php">ADMIN</a></li>
			</ul>
		</div>
	</header>

    <!-- label -->
	<section class="label_keg">
		<div class="container">
			<p>Beranda / Kegiatan</p>
		</div>
	</section>


    <div class="kegiatan_all">
		<div class="container_all">
			<h2>KEGIATAN P2L</h2>
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
						target="_blank" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
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