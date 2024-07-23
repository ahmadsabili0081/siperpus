<?php
include ('../config/koneksi.php');
include ('../config/config.php');


$id_anggota = $_POST['id_anggota'];
$id_buku = $_POST['id_buku'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_batas_kembali = $_POST['tgl_batas_kembali'];
$tgl_kembali = $_POST['tgl_kembali'];
$denda = $_POST['denda'];


if (empty($tgl_pinjam) || empty($tgl_kembali)) {
  header('Location:' . BASE_URL . "add_load_details.php?notif=required");
} else {
  mysqli_query($koneksi, "INSERT INTO peminjaman (id_anggota, id_buku, tgl_pinjam, tgl_batas_kembali, tgl_kembali, denda) VALUES ($id_anggota, $id_buku, '$tgl_pinjam', '$tgl_batas_kembali', '$tgl_kembali', $denda)");
  header("Location:" . BASE_URL . "loan_details.php?notif=success");
}

?>