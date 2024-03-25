<?php
error_reporting(0);
session_start();
include "../koneksi.php";

$id = mysqli_real_escape_string($connect, $_GET['id']);
$ceknama = mysqli_fetch_array(mysqli_query($connect, "select * from tb_video where id_video='$id'"));
$namagambar = $ceknama['gambar'];

$sql = mysqli_query($connect, "delete from tb_video where id_video='$id'");
if($sql){
    echo "<script>alert('Hapus Berhasil');document.location='video_admin.php'</script>";
}else{
    echo "<script>alert('Hapus Gagal');document.location='video_admin.php'</script>";
}

?>