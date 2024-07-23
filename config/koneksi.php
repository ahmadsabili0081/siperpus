<?php 

$server = "localhost";
$username  = "root";
$password = "";
$databases = "db_siperpus";

$koneksi = mysqli_connect($server, $username, $password, $databases);
if(!$koneksi) die("Koneksi tidak tersambung");
return $koneksi;
?>