<?php 
error_reporting(0);
session_start();
include "../koneksi.php";

$sesiadmin = $_SESSION['owner'];
if(!isset($sesiadmin)){
    header('location:admin.php');
}
$admin = mysqli_fetch_array(mysqli_query($connect, "select * from tb_admin where id_admin='$sesiadmin'"));

$id = mysqli_real_escape_string($connect, $_GET['id']);
$vid = mysqli_fetch_array(mysqli_query($connect, "select * from tb_video where id_video='$id'"));

$judul = mysqli_real_escape_string($connect, $_POST['judul']);

$kategori = mysqli_real_escape_string($connect, $_POST['kategori']);
$videolama = mysqli_real_escape_string($connect, $_POST['videolama']);

$video = $_FILES['video']['tmp_name'];
$namavideo = $_FILES['video']['name'];
$tgl = date('Y-m-d H:i:s');
        



if(isset($_POST['submit'])){
	if($judul == ""){
		$judul_error = "<span style='color:red;'>Judul wajib diisi</span>";
	}elseif($kategori == ""){
		$kategori_error = "<span style='color:red;'>Kategori wajib diisi</span>";
	}else{
        if(empty($video)){ //tidak mengubah video
            $sql = mysqli_query($connect, "update tb_video set judul='$judul', id_kategori='$kategori' where id_video='$id'");
            if($sql){
                echo "<script>alert('Edit Berhasil');document.location='video_admin.php'</script>";
            }else{
                $video_error = "<span style='color:red;'>Terjadi kesalahan, silahkan coba lagi</span>";
            }
        }else{
            move_uploaded_file($video, '../vid/' . $namavideo);
            $sql = mysqli_query($connect, "update tb_video set judul='$judul', id_kategori='$kategori', video='$namavideo' where id_video='$id'");
            if($sql){
                echo "<script>alert('Edit Berhasil');document.location='video_admin.php'</script>";
            }else{
                $video_error = "<span style='color:red;'>Terjadi kesalahan, silahkan coba lagi</span>";
            }
        }
    }
}

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

    <header>
		<div class="container">
			<h1><a href="index_admin.php">PEKARANGAN PANGAN LESTARI (P2L)</a></h1>
			<ul>
				<li><a href="index_admin.php">BERANDA</a></li>
                <li><a href="tanaman_admin.php">TANAMAN</a></li>
				<li><a href="kegiatan_admin.php">KEGIATAN</a></li>
				<li class="active"><a href="video_admin.php">VIDEO</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn"><?= $admin['username'];?> <i class="fa-solid fa-caret-down"></i></a>
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
			<p>Beranda / Video</p>
		</div>
	</section>


    <div class="kegiatan_admin">
		<div class="container_admin">
			<h2>EDIT VIDEO</h2>
			<div class="konten_admin">
            <form action="" method="post" enctype="multipart/form-data">
            <table>
            <tr>
            <td>Judul Video</td>
            <td>
                <input type="text" name="judul" placeholder="Masukkan Judul" class="input" value="<?= $vid['judul'];?>">
                <?= $judul_error;?>
            </td>
            </tr>
            <tr>
            <td>Kategori Video</td>
            <td>
                <select name="kategori">
                <option value="">-- Pilih Kategori --</option>
                <?php
                $sql = mysqli_query($connect, "select * from tb_kategori");
                while($row= mysqli_fetch_array($sql)){
                    if($row['id_kategori'] == $keg['id_kategori']){
                    ?>
                <option value="<?= $row['id_kategori'];?>" selected="selected"><?= $row['kategori'];?></option>
                <?php }else{
                    ?>
                    <option value="<?= $row['id_kategori'];?>"><?= $row['kategori'];?></option>
                <?php
                } 
                } ?>
                </select>
                <?= $kategori_error;?>
            </td>
            </tr>
            
            <tr>
            <td>Video Kegiatan</td>
            <td>
                <input type="file" name="video" accept=".mp4, .MP4, .avi, .AVI, .mkv, .MKV, .3gp, .3GP, .dat, .DAT,
                .mpg, .MPG, .mpeg, .MPEG, .mov, .MOV, .gifv, .GIFV, .wmv, .WMV, .flv, .FLV, .webm, .WEBM"/>
                <?= $video_error;?>
            </td>
            </tr>
            <tr><td>&nbsp;</td><td>
                <input type="hidden" name="videolama" value="<?= $vid['video'];?>">
                <button type="submit" name="submit">SIMPAN</a>
            </td></tr>
            </table>
            </form>
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