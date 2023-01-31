<?php 

session_start();
error_reporting(0);
include '../conn/koneksi.php';
if (!isset($_SESSION['username'])) {
    header('location:../index.php');
}
elseif ($_SESSION['level'] != "masyarakat") {
    header('location:../index.php');
}
?>
