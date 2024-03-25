<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>P2L, Gedongan, Manguharjo, Madiun</title>
	<link rel="icon" href="img/logo4.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="admin/style_imgslide.css">
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
				<li><a href="kegiatan.php">KEGIATAN</a></li>
				<li class="active"><a href="tentang.php">TENTANG</a></li>
				<li><a href="admin/admin.php">ADMIN</a></li>
			</ul>
		</div>
	</header>

	<!-- label -->
	<section class="label">
		<div class="container">
			<p>Beranda / Tentang</p>
		</div>
	</section>


	<!-- image slider -->
	<div class="slider">
		<div class="slides">
			
			<input type="radio" name="radio-btn" id="radio1">
			<input type="radio" name="radio-btn" id="radio2">
			<input type="radio" name="radio-btn" id="radio3">
			<input type="radio" name="radio-btn" id="radio4">
			<input type="radio" name="radio-btn" id="radio5">
			
		
			<div class="slide first">
				<img src="img/kegiatan/p2l(1).jpg" alt="">
			</div>
			<div class="slide">
				<img src="img/kegiatan/p2l(7).JPG" alt="">
			</div>
			<div class="slide">
				<img src="img/kegiatan/p2l(8).JPG" alt="">
			</div>
			<div class="slide">
				<img src="img/kegiatan/p2l(6).JPG" alt="">
			</div>
			<div class="slide">
				<img src="img/kegiatan/p2l(3).JPG" alt="">
			</div>
			
			
			<div class="navigation-auto">
				<div class="auto-btn1"></div>
				<div class="auto-btn2"></div>
				<div class="auto-btn3"></div>
				<div class="auto-btn4"></div>
				<div class="auto-btn5"></div>
				
			</div>
			
		</div>
		
		<div class="navigation-manual">
			<label for="radio1" class="manual-btn"></label>
			<label for="radio2" class="manual-btn"></label>
			<label for="radio3" class="manual-btn"></label>
			<label for="radio4" class="manual-btn"></label>
			<label for="radio5" class="manual-btn"></label>
			
		</div>
		
	</div>
	

	<script type="text/javascript">
	var counter = 1;
	setInterval(function(){
		document.getElementById('radio' + counter).checked = true;
		counter++;
		if(counter > 5){
			counter = 1;
		}
	}, 5000);
	</script>


	<!-- about -->
	<section class="about">
		<div class="container">
			<h3>TENTANG P2L</h3>
			<p>P2L merupakan singkatan dari <strong>Pekarangan Pangan Lestari.</strong> P2L merupakan kegiatan pemberdayaan dari ibu-ibu Kelurahan Manguharjo dalam meningkatkan pendapatan keluarga. P2L berlokasi di Kampung Edu Wisata, Desa Gedongan, Kelurahan Manguharjo, Kecamatan Manguharjo, Kota Madiun.</p>
			
		</div>
		<div class="visimisi">
			<h3>VISI MISI</h3>
			<p>P2L mendukung penurunan stunting di Kota Madiun.</p>
		</div>
	</section>

	<!-- service -->
	<section class="service">
		<div class="container">
			<h3>KONTAK KAMI</h3>
			<div class="box">
				<div class="col-4">
					<h4>Alamat</h4>
					<p>Jl. Sidomakmur, Kel. Manguharjo, Kec. Manguharjo, Kota Madiun</p>
				</div>
				<div class="col-4">
					<h4>Email</h4>
					<p>hadisuparno24@gmail.com</p>
				</div>
				<div class="col-4">
					<h4>Contact Person</h4>
					<p>082257269085 (Hadi Suparno)</p>
				</div>
			</div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.556620097197!2d111.50247341472486!3d-7.623125494503494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79bfc171e5c497%3A0xbb4981d73342469f!2sTaman%20Kampung%20KB%20Gedongan!5e0!3m2!1sid!2sid!4v1659798501713!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
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
</html>