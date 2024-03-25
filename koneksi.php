<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "eduwisata_p2l";

$connect = mysqli_connect($server, $user, $password, $database) or die("Error Connection");
if(!$connect){
    echo "Koneksi Error";
}

?>