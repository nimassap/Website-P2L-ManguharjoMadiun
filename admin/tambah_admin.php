<?php 
error_reporting(0);
session_start();
include "../koneksi.php";

$sesiadmin = $_SESSION['owner'];
if(!isset($sesiadmin)){
    header('location:admin.php');
}
$admin = mysqli_fetch_array(mysqli_query($connect, "select * from tb_admin where id_admin='$sesiadmin'"));


    

if (isset($_POST['submit'])){
    $nama = mysqli_real_escape_string($connect, $_POST['namalengkap']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['pass']);
    $password2 = mysqli_real_escape_string($connect, $_POST['re-pass']);
    $passmd5 = md5($password);
    if($password == $password2){
        $cekemail = "SELECT email FROM tb_admin WHERE email='$email'";
        $cekemail_run = mysqli_query($connect, $cekemail);

        if(mysqli_num_rows($cekemail_run) > 0){
            echo "<script>alert('Email sudah ada');document.location='tambah_admin.php'</script>";
        }else{
            $user_query = "INSERT INTO tb_admin (nama_lengkap,email,username,password) VALUES ('$nama','$email','$username','$passmd5')";
            $user_query_run = mysqli_query($connect, $user_query);

            if($user_query_run){
                echo "<script>alert('Berhasil Menambah Admin');document.location='index_admin.php'</script>";
            }else{
                echo "<script>alert('Terjadi Kesalahan, Coba Lagi');document.location='tambah_admin.php'</script>";
            }
        }
    }else{
        echo "<script>alert('Password tidak cocok');document.location='tambah_admin.php'</script>";
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
	<link rel="stylesheet" type="text/css" href="style_imgslide.css">
    <link rel="stylesheet" type="text/css" href="../css/style_admin.css">
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
		<marquee>Silahkan Tambahkan Admin !</marquee>
	</div>

	
	<header>
		<div class="container">
			<h1><a href="index_admin.php">PEKARANGAN PANGAN LESTARI (P2L)</a></h1>
			<ul>
                <li><a href="index_admin.php">BERANDA</a></li>
                <li><a href="tanaman_admin.php">TANAMAN</a></li>
				<li><a href="kegiatan_admin.php">KEGIATAN</a></li>
				<li><a href="video_admin.php">VIDEO</a></li>
				<li class="dropdown">
					<li class="active"><a href="adminlogout.php" class="dropbtn"><?= $admin['username'];?> </a></li>
                    <div class="dropdown-content">
                        <a href="tambah_admin.php">TAMBAH ADMIN</a>
                        <a href="logout.php">LOGOUT</a>
                    </div>
                </li>
			</ul>
		</div>
	</header>
	


    <div class="login-box1">
        <?php include('message.php'); ?>
		<img src="../img/avatar.jpg" class="avatar">
		<h1>TAMBAH ADMIN BARU</h1>
		<form action="" method="post">
            <p>Nama Lengkap</p>
			<input type="text" name="namalengkap" placeholder="Masukkan Nama Lengkap">
			<?= $nama_error;?>
			<p>Email</p>
			<input type="text" name="email" placeholder="Masukkan Email">
			<?= $email_error;?>
            <p>Username</p>
			<input type="text" name="username" placeholder="Buat Username">
			<?= $username_error;?>
			<p>Password</p>
			<input type="password" name="pass" placeholder="Buat Password">
			<?= $pass_error;?>
            <p>Konfirmasi Password</p>
			<input type="password" name="re-pass" placeholder="Masukkan Ulang Password">
			<?= $pass_error;?>
			<button type="submit" name="submit">TAMBAH</a>
			
		</form>
	</div>


    


	<script type="text/javascript">
		$(document).ready(function(){
			$(".bg-loader").hide();
		})
	</script>


</body>
</html>