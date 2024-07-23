<?php
function get_data_kategori($koneksi)
{
  $query = "SELECT  * FROM kategori";
  $data = mysqli_query($koneksi, $query);
  return mysqli_fetch_all($data, MYSQLI_ASSOC);
}

function get_data($koneksi)
{
  $query = "SELECT kategori.*, buku.* FROM buku INNER JOIN kategori ON kategori.id_kategori = buku.id_kategori";
  $data = mysqli_query($koneksi, $query);
  return mysqli_fetch_all($data, MYSQLI_ASSOC);
}

function get_user($koneksi)
{
  $query = "SELECT * FROM user";
  $data = mysqli_query($koneksi, $query);
  return mysqli_fetch_all($data, MYSQLI_ASSOC);
}

function get_book($koneksi)
{
  $query = "SELECT * FROM buku";
  $data = mysqli_query($koneksi, $query);
  return mysqli_fetch_all($data, MYSQLI_ASSOC);
}

function get_peminjaman($koneksi)
{
  $query = "SELECT user.*, buku.*, peminjaman.* FROM peminjaman INNER JOIN user ON user.id_user = peminjaman.id_anggota INNER JOIN buku ON buku.id_buku = peminjaman.id_buku";
  $data = mysqli_query($koneksi, $query);
  return mysqli_fetch_all($data, MYSQLI_ASSOC);
}

function get_search($koneksi, $search)
{
  $query = "SELECT user.*, buku.*, peminjaman.* 
          FROM peminjaman 
          INNER JOIN user ON user.id_user = peminjaman.id_anggota 
          INNER JOIN buku ON buku.id_buku = peminjaman.id_buku 
          WHERE buku.judul LIKE '%$search%' 
          OR user.nama LIKE '%$search%'
          OR peminjaman.denda LIKE '%$search%'";
  $data = mysqli_query($koneksi, $query);
  return mysqli_fetch_all($data, MYSQLI_ASSOC);
}
?>