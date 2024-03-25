<?php include "koneksi.php";?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>P2L, Gedongan, Manguharjo, Madiun</title>
	<link rel="icon" href="img/logo4.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    
    <link rel="stylesheet" type="text/css" href="css/style_tanamanlengkap.css">
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
				<li class="active"><a href="index.php">BERANDA</a></li>
				<li><a href="kegiatan.php">KEGIATAN</a></li>
				<li><a href="tentang.php">TENTANG</a></li>
				<li><a href="admin/admin.php">ADMIN</a></li>
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
				<?php
				$tanaman = mysqli_query($connect, "select * from tb_tanaman, tb_admin where tb_tanaman.id_admin=tb_admin.id_admin
				order by id_tanaman desc");
				while($row = mysqli_fetch_array($tanaman)){
					?>
				<div class="feedtanaman_all">
                    
                <h3><?= $row['nama_tanaman'];?></h3>
                <h4>(<?= $row['nama_latin'];?>)</h4>
				<img src="img/kegiatan/<?= $row['gambar_tanaman']?>" alt="<?= $row['nama_tanaman'];?>"
				controls>
				</video>
				
				<p><?= $row['deskripsi'];?></p>
                <h5><i class="fa-solid fa-clock"></i>  <?= $row['tgl_posting'];?></h5>
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