<?php
error_reporting(0);
session_start();

unset($_SESSION['owner']);
unset($_SESSION['homep2l']);

session_destroy();

header('location:admin.php');
?>