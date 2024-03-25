<?php
error_reporting(0);
session_start();
include "../koneksi.php";

$sesiadmin = $_SESSION['owner'];
if(isset($sesiadmin)){
    header('location:index_admin.php');
}

$email = $_POST['email'];
$pass = $_POST['pass'];

$passmd5 = md5($pass);

if(isset($_POST['submit'])){
	if($email == ""){
		$email_error = "<span style='color:red;'>wajib diisi</span>";
	}elseif($pass == ""){
		$pass_error = "<span style='color:red;'>wajib diisi</span>";
	}else{
		$cekadmin = mysqli_query($connect, "SELECT * FROM tb_admin where email='$email' and password='$passmd5'");
		$row = mysqli_fetch_array($cekadmin);
		$idadmin = $row['id_admin'];
		$ada = mysqli_num_rows($cekadmin);
		if($ada > 0){
				$_SESSION['homep2l'] = $email;
				$_SESSION['owner'] = $idadmin;
				echo "<script>alert('Selamat datang !');document.location='index_admin.php'</script>";
		}else{
			$pass_error = "<span style='color:red;'>user atau password salah</span>";
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
	<link rel="stylesheet" type="text/css" href="../css/style_keg.css">
	<link rel="stylesheet" type="text/css" href="style_imgslide.css">
	<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
	
	<header>
		<div class="container">
			<h1><a href="../index.php">PEKARANGAN PANGAN LESTARI (P2L)</a></h1>
			<ul>
				<li><a href="../index.php">BERANDA</a></li>
				<li><a href="../kegiatan.php">KEGIATAN</a></li>
				<li><a href="../tentang.php">TENTANG</a></li>
				<li class="active"><a href="index.php">ADMIN</a></li>
			</ul>
		</div>
	</header>

	<div class="login-box">
		<img src="../img/avatar.jpg" class="avatar">
		<h1>ADMIN</h1>
		<form action="" method="post">
			<p>Email</p>
			<input type="text" name="email" placeholder="Masukkan Email">
			<?= $email_error;?>
			<p>Password</p>
			<input type="password" name="pass" placeholder="Masukkan Password">
			<?= $pass_error;?>
			<button type="submit" name="submit">LOGIN</a>
			
		</form>
	</div>

</body>
</html>