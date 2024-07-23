<?php

include ('../config/koneksi.php');
include ('../config/config.php');

$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$isbn = $_POST['isbn'];
$tahun_terbit = $_POST['tahun_terbit'];
$jumlah_tersedia = $_POST['jumlah_tersedia'];
$id_kategori = $_POST['id_kategori'];

if (empty($judul) || empty($pengarang) || empty($penerbit) || empty($isbn) || empty($tahun_terbit) || empty($jumlah_tersedia) || empty($id_kategori)) {
  header('Location:' . BASE_URL . "add_book.php?notif=required");
} else {
  mysqli_query($koneksi, "INSERT INTO buku (judul, pengarang, penerbit, isbn, tahun_terbit, jumlah_tersedia, id_kategori) VALUES ('$judul','$pengarang','$penerbit','$isbn',$tahun_terbit,$jumlah_tersedia,$id_kategori)");

  header('Location:' . BASE_URL . "add_book.php?notif=success");
}
?>