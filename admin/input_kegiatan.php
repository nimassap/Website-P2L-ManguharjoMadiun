<?php 
error_reporting(0);
session_start();
include "../koneksi.php";

$sesiadmin = $_SESSION['owner'];
if(!isset($sesiadmin)){
    header('location:admin.php');
}
$admin = mysqli_fetch_array(mysqli_query($connect, "select * from tb_admin where id_admin='$sesiadmin'"));


$judul = mysqli_real_escape_string($connect, $_POST['judul']);
$deskripsi = mysqli_real_escape_string($connect, $_POST['deskripsi']);
$kategori = mysqli_real_escape_string($connect, $_POST['kategori']);

$foto = $_FILES['gambar']['tmp_name'];
$namafoto = $_FILES['gambar']['name'];

        



if(isset($_POST['submit'])){
	if($judul == ""){
		$judul_error = "<span style='color:red;'>Judul wajib diisi</span>";
	}elseif($kategori == ""){
		$kategori_error = "<span style='color:red;'>Kategori wajib diisi</span>";
	}elseif($deskripsi == ""){
		$deskripsi_error = "<span style='color:red;'>Deskripsi wajib diisi</span>";
	}elseif(empty($foto)){
		$gambar_error = "<span style='color:red;'>Gambar wajib diisi</span>";
	}else{
        move_uploaded_file($foto, '../img/kegiatan/' . $namafoto);
        $tgl = date('Y-m-d H:i:s');
        $sql = mysqli_query($connect, "insert into tb_kegiatan (judul,deskripsi_kegiatan,id_admin,id_kategori,tgl_posting,dilihat,gambar)
        values ('$judul','$deskripsi','$sesiadmin','$kategori','$tgl','1','$namafoto')");
        if($sql){
            echo "<script>alert('Input Berhasil');document.location='kegiatan_admin.php'</script>";
        }else{
            $gambar_error = "<span style='color:red;'>Terjadi kesalahan, silahkan coba lagi</span>";
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
				<li class="active"><a href="kegiatan_admin.php">KEGIATAN</a></li>
				<li><a href="video_admin.php">VIDEO</a></li>
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
			<p>Beranda / Kegiatan</p>
		</div>
	</section>


    <div class="kegiatan_admin">
		<div class="container_admin">
			<h2>TAMBAH KEGIATAN</h2>
			<div class="konten_admin">
            <form action="" method="post" enctype="multipart/form-data">
            <table>
            <tr>
            <td>Judul Kegiatan</td>
            <td>
                <input type="text" name="judul" placeholder="Masukkan Judul" class="input" value="<?= $judul;?>">
                <?= $judul_error;?>
            </td>
            </tr>
            <tr>
            <td>Kategori Kegiatan</td>
            <td>
                <select name="kategori">
                <option value="">-- Pilih Kategori --</option>
                <?php
                $sql = mysqli_query($connect, "select * from tb_kategori");
                while($row= mysqli_fetch_array($sql)){
                    if($row['id_kategori'] == $kategori){
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
            <td>Deskripsi Kegiatan</td>
            <td>
                <textarea name="deskripsi" rows="4" cols="40" placeholder="Deskripsi Kegiatan"><?= $deskripsi;?></textarea>
                <?= $deskripsi_error;?>
            </td>
            </tr>
            <tr>
            <td>Gambar Kegiatan</td>
            <td>
                <input type="file" name="gambar" accept=".jpg, .png, .jpeg, .JPG, .PNG, .JPEG">
                <?= $gambar_error;?>
            </td>
            </tr>
            <tr><td>&nbsp;</td><td>
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