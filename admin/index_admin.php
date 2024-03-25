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
  <link rel="stylesheet" type="text/css" href="style_tanaman.css">
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
				<li class="active"><a href="index_admin.php">BERANDA</a></li>
        <li><a href="tanaman_admin.php">TANAMAN</a></li>
				<li><a href="kegiatan_admin.php">KEGIATAN</a></li>
				<li><a href="video_admin.php">VIDEO</a></li>
				<li><a href="adminlogout.php" class="dropbtn"><?= $admin['username'];?> </a>
			</ul>
		</div>
	</header>

    
	
	<!-- banner -->
	<section class="banner">
		<h2>SELAMAT DATANG</h2>
	</section>
	


	<!-- about -->
	<section class="about">
		<div class="container">
			<h3>APA ITU P2L?</h3>
			<p>P2L merupakan singkatan dari <strong>Pekarangan Pangan Lestari.</strong> P2L merupakan kegiatan pemberdayaan dari ibu-ibu Kelurahan Manguharjo dalam meningkatkan pendapatan keluarga. P2L berlokasi di Kampung Edu Wisata, Desa Gedongan, Kelurahan Manguharjo, Kecamatan Manguharjo, Kota Madiun.</p>
		</div>
	</section>




	


	<div class="kegiatan">
		<div class="container">
			<h2><a href="kegiatan_admin.php">KEGIATAN P2L</a></h2>
            <a href="input_kegiatan.php" title="TAMBAH KEGIATAN"> <i class="fa-solid fa-plus"></i> TAMBAH KEGIATAN</a>
			<div class="konten">
				<?php
				$data = mysqli_query($connect, "select * from tb_kegiatan, tb_admin where tb_kegiatan.id_admin=tb_admin.id_admin
				order by id_kegiatan desc");
				while($row = mysqli_fetch_array($data)){
					?>
				<div class="feedkegiatan">
				<img src="../img/kegiatan/<?= $row['gambar']?>" alt="<?= $row['judul'];?>">
				<h3><?= $row['judul'];?></h3>
				<hr>
				<p><?= $row['deskripsi_kegiatan'];?></p>
				<h5>Diposting pada : <?= $row['tgl_posting'];?></h5>
                <td><a href="edit_kegiatan.php?id=<?= $row['id_kegiatan'];?>" title="EDIT"> <i class="fa-solid fa-pen-to-square"></i> EDIT</a> 
                <a href="hapus_kegiatan.php?id=<?= $row['id_kegiatan'];?>" title="HAPUS"> <i class="fa-solid fa-trash-can"></i> HAPUS</a></td>
				</div>
				<?php } ?>
				</div>

				
				<div style="clear:both;"></div>


                


			</div>
		</div>
	</div>

    
	

	<div class="tanaman">
		<div class="container">
			<h2><a href="tanaman_admin.php">TANAMAN P2L</a></h2>
      <a href="input_tanaman.php" title="TAMBAH TANAMAN"> <i class="fa-solid fa-plus"></i> TAMBAH TANAMAN</a>
		</div>
	</div>


	<div class="slide-container swiper">
    <div class="slide-content">
      <div class="card-wrapper swiper-wrapper">
        <div class="card swiper-slide">
          <div class="image-content">
            <span class="overlay"></span>
							
            <div class="card-image">
              <img src="../img/kegiatan/29.jpg" alt="" class="card-img">
            </div>
          </div>

          <div class="card-content">
            <h2 class="name">PADI SERANG</h2>
						<h2 class="subname">(Oryza sativa L)</h2>
            <p class="description">Beberapa manfaat padi diantaranya mengandung energi yang tinggi, mengobati dan mencegah gangguan pencernaan, untuk obat dan kosmetik, dan masih banyak lagi. 
              Padi jenis Serang merupakan tipe padi varietas unggul yang biasa ditanam oleh petani Indonesia. Jenis padi Serang memiliki rasa yang gurih dan sedikit mengandung rasa manis.
            </p>
                            
          </div>
        </div>

        <div class="card swiper-slide">
          <div class="image-content">
            <span class="overlay"></span>

            <div class="card-image">
              <img src="../img/kegiatan/21.JPG" alt="" class="card-img">
            </div>
          </div>

          <div class="card-content">
            <h2 class="name">KACANG SACHA</h2>
            <h2 class="subname">(Plukenetia volubilis)</h2>
            <p class="description">Kacang sacha adalah jenis tanaman yang menghasilkan biji seperti kacang. Berbagai bagian dari tanaman ini dapat dimanfaatkan. Daunnya mengandung antioksidan dan dapat dimakan sebagai sayur ataupun diolah sebagai teh. 
              Bijinya biasa digunakan dalam campuran bubuk protein, sereal, dan makanan lainnya. Minyak hasil ekstraksi biji sacha inchi memiliki berbagai manfaat baik untuk kosmetik sebagai pelembab dan pencerah kulit. 
              Manfaat lain diantaranya adalah untuk menurunkan kolesterol, asam urat, menyehatkan pencernaan, menurunkan berat badan.
            </p>
                
          </div>
        </div>

        <div class="card swiper-slide">
          <div class="image-content">
            <span class="overlay"></span>

            <div class="card-image">
              <img src="../img/kegiatan/11.JPG" alt="" class="card-img">
            </div>
          </div>

          <div class="card-content">
            <h2 class="name">PISANG CAVENDISH</h2>
						<h2 class="subname">(Muca acuminata)</h2>
            <p class="description">Pisang Cavendish disebut pisang ambon putih di Indonesia. Manfaat dari pisang ini antara lain adalah untuk menyehatkan pencernaan, membuat ginjal lebih sehat, mengontrol tekanan darah,
              asupan energi, penguat gigi dan tulang, pencegah anemia, baik untuk mata, menyehatkan jantung, mengatasi asma, baik untuk kesehatan otak, menjaga bentuk badan, masker wajah untuk jerawat, baik untuk lambung, 
              membantu pertumbuhan janin, dan meningkatkan sistem imun tubuh.
            </p>
             
          </div>
        </div>

        <div class="card swiper-slide">
          <div class="image-content">
            <span class="overlay"></span>

            <div class="card-image">
              <img src="../img/kegiatan/18.JPG" alt="" class="card-img">
            </div>
          </div>

          <div class="card-content">
            <h2 class="name">SAWI</h2>
						<h2 class="subname">(Brassica)</h2>
            <p class="description">Sawi merupakan salah satu jenis sayuran hijau yang baik bagi tubuh karena memiliki kandungan vitamin dan mineral yang dibutuhkan tubuh. Manfaat sawi diantaranya adalah sebagai antioksidan, 
              detoksifikasi tubuh, mencegah kanker, menjaga sistem imun tubuh, mengontrol kadar kolesterol, baik untuk dikonsumsi ibu hamil, membantu menurunkan berat badan, dan lain sebagainya.
            </p>
             
          </div>
        </div>

        <div class="card swiper-slide">
          <div class="image-content">
            <span class="overlay"></span>

            <div class="card-image">
              <img src="../img/kegiatan/23.JPG" alt="" class="card-img">
            </div>
          </div>

          <div class="card-content">
            <h2 class="name">KANGKUNG</h2>
						<h2 class="subname">(Ipomea aquatic)</h2>
            <p class="description">Kangkung dapat dikonsumsi tidak hanya orang dewasa saja melainkan anak-anak juga sangat dianjurkan untuk mengkonsumsinya agar manfaat kangkung bagi tubuh dapat dirasakan. 
              Manfaat kangkung diantara lain adalah mencegah anemia, mengatasi penyakit kuning, mencegah dehidrasi, menurunkan kolesterol, mencegah radikal bebas, menjaga sistem kekebalan tubuh, melancarkan sistem pencernaan, 
              mencegah sariawan, menjaga kesehatan jantung, dan menjaga kesehatan mata.
            </p>
             
          </div>
        </div>

        <div class="card swiper-slide">
          <div class="image-content">
            <span class="overlay"></span>

            <div class="card-image">
              <img src="../img/kegiatan/24.JPG" alt="" class="card-img">
            </div>
          </div>

          <div class="card-content">
            <h2 class="name">BAYAM</h2>
						<h2 class="subname">(Amaranthus)</h2>
            <p class="description">Bayam adalah salah satu sayuran yang mengandung vitamin dan mineral yang cukup lengkap. Adapun manfaat bayam diantaranya yaitu dapat mengurangi radang, menjaga sistem kekebalan tubuh, 
              baik bagi penderita diabetes, mencegah kanker, mencegah anemia, menjaga kesehatan mata, menurunkan risiko penyakit kardiovaskular, mencegah asma, menyehatkan tulang, menjaga kesehatan kulit, memberikan manfaat neurologis, 
              menguatkan otot, meningkatkan metabolisme, mencegah aterosklerosis, dan membantu perkembangan janin.
            </p>
             
          </div>
        </div>

        <div class="card swiper-slide">
          <div class="image-content">
            <span class="overlay"></span>

            <div class="card-image">
              <img src="../img/kegiatan/14.JPG" alt="" class="card-img">
            </div>
          </div>

          <div class="card-content">
            <h2 class="name">KACANG PANJANG</h2>
						<h2 class="subname">(Vigna unguiculata)</h2>
            <p class="description">Kandungan nutrisi yang melimpah dalam kacang panjang akan memberikan berbagai manfaat jangka panjang untuk tubuh. Selain meringankan nyeri haid ada juga manfaat lainnya yaitu dapat meningkatkan kesuburan 
              dan peluang kehamilan, mengatasi depresi, meningkatkan kesehatan tulang, menyehatkan kulit, meningkatkan kesehatan jantung, menjaga imun tubuh, mencegah risiko penyakit stroke, mencegah anemia, mencegah terkena osteoporosis, mencegah sakit kepala, dan lainnya.
            </p>
             
          </div>
        </div>

        <div class="card swiper-slide">
          <div class="image-content">
            <span class="overlay"></span>

            <div class="card-image">
              <img src="../img/kegiatan/7.JPG" alt="" class="card-img">
            </div>
          </div>

          <div class="card-content">
            <h2 class="name">TOMAT</h2>
						<h2 class="subname">(Solanum lycopersicum)</h2>
            <p class="description">Dengan mengonsumsi buah tomat, dapat mendapatkan berbagai khasiat untuk kesehatan seperti menjaga kesehatan jantung, mencegah kanker, mengatasi diabetes, melancarkan pencernaan, 
              menjaga kesehatan mata, menjaga kesehatan kulit, meningkatkan kesehatan saat hamil, dan masih banyak lagi.
            </p>
             
          </div>
        </div>

        <div class="card swiper-slide">
          <div class="image-content">
            <span class="overlay"></span>

            <div class="card-image">
              <img src="../img/kegiatan/4.JPG" alt="" class="card-img">
            </div>
          </div>

          <div class="card-content">
            <h2 class="name">CABAI</h2>
						<h2 class="subname">(Capsicum annum)</h2>
            <p class="description">Cabai mengandung berbagai nutrisi, yaitu vitamin A, vitamin B, vitamin C dan vitamin E. Cabai juga mengandung vitamin C tujuh kali lebih banyak daripada buah jeruk. Manfaat cabai diantara lain adalah 
              dapat melindungi tubuh dari radikal bebas, menangkal racun, penghilang rasa sakit, sebagai antibiotik, mengurangi resiko kanker, mencegah serangan jantung, mengurangi resiko penyakit paru-paru, sebagai terapi dan relaksasi, 
              menurunkan tingkat gula darah, dan membantu membakar lemak.
            </p>
             
          </div>
        </div>

        <div class="card swiper-slide">
          <div class="image-content">
            <span class="overlay"></span>

            <div class="card-image">
              <img src="../img/kegiatan/28.jpg" alt="" class="card-img">
            </div>
          </div>

          <div class="card-content">
            <h2 class="name">SELADA</h2>
						<h2 class="subname">(Lactuca sativa)</h2>
            <p class="description">Daun selada adalah sumber vitamin yang baik, termasuk vitamin A dan vitamin K yang sangat tinggi. Macam-macam manfaat selada yaitu menjaga kesehatan jantung, merawat kecantikan kulit, menjaga kekebalan tubuh, 
              mencegah komplikasi kehamilan, menjaga kesehatan mata, mencegah tulang keropos, melawan infeksi mikroba, mengontrol tekanan darah, mencegah kanker, dan masih banyak lagi.
            </p>
             
          </div>
        </div>

      </div>
      <div class="swiper-button-next swiper-navBtn"></div>
      <div class="swiper-button-prev swiper-navBtn"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  

	
  <div class="moretnm">
    <h3><a href="tanaman_admin.php">TAMPILKAN TANAMAN LAINNYA  <i class="fa-solid fa-angles-right"></i></a></h3>
  </div>

  <div class="container1"></div>


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