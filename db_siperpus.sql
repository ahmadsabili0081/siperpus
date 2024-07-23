-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 23 Jul 2024 pada 05.50
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siperpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int UNSIGNED NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `pengarang` varchar(100) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `tahun_terbit` year DEFAULT NULL,
  `jumlah_tersedia` int DEFAULT NULL,
  `id_kategori` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `pengarang`, `penerbit`, `isbn`, `tahun_terbit`, `jumlah_tersedia`, `id_kategori`) VALUES
(1, 'Naruto Shippuden', 'Masashi Kishimoto', 'Jump Stand Festival', 'vol-23', '2014', 3, 5),
(2, 'Avatar The Last Air Bender', 'Masashi Kishimoto', 'Jump Stand Festival', 'vol-90', '2017', 3, 5),
(3, 'Boruto The Movie', 'Masashi Kishimoto', 'Jump Stand Festival', 'vol-26', '2018', 2, 5),
(4, 'Marvel', 'Marvel Studio', 'Marvel Studio', 'vol-23', '2017', 2, 3),
(5, 'Hulk', 'Marvel Studio', 'Marvel', 'vol-12', '2016', 1, 3),
(6, 'Spiderman Home Coming', 'Marvel Studio', 'Marvel', 'vol-21', '2017', 2, 3),
(7, 'Teknologi', 'Ahmad Baiq', 'Gramedia', 'vol-20', '2010', 2, 1),
(8, 'Bandung 19', 'Ahmad jiaz', 'Gramedia', 'vol-90', '2015', 2, 1),
(9, 'Belajar Javascript', 'Brandon Eich', 'Gramedia', 'vol-23', '2017', 11, 1),
(10, 'Front end dev', 'John doe', 'Gramedia', 'vol-29', '2014', 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int UNSIGNED NOT NULL,
  `nama_kategori` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Novel'),
(2, 'Biografi'),
(3, 'Komik'),
(4, 'Dongeng'),
(5, 'Manga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int UNSIGNED NOT NULL,
  `id_anggota` int UNSIGNED NOT NULL,
  `id_buku` int UNSIGNED NOT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_batas_kembali` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `denda` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_batas_kembali`, `tgl_kembali`, `denda`) VALUES
(1, 1, 1, '2024-07-01', '2024-07-15', '2024-07-09', 0),
(2, 1, 2, '2024-07-02', '2024-07-16', '2024-07-15', 0),
(3, 1, 3, '2024-07-03', '2024-07-17', '2024-07-16', 0),
(4, 2, 4, '2024-07-04', '2024-07-18', '2024-07-17', 0),
(5, 2, 5, '2024-07-09', '2024-07-23', '2024-07-22', 0),
(6, 2, 6, '2024-07-13', '2024-07-27', '2024-07-26', 0),
(7, 3, 7, '2024-07-19', '2024-08-02', '2024-07-31', 0),
(8, 3, 8, '2024-07-21', '2024-08-04', '2024-08-02', 0),
(9, 3, 9, '2024-07-14', '2024-07-28', '2024-08-02', 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int UNSIGNED NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text,
  `no_ktp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tanggal_terdaftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `no_ktp`, `email`, `tanggal_terdaftar`) VALUES
(1, 'Lionel Messi ', 'Jl.Kerta Jaya II No.2 RT.02/13 Kel.Uwung Jaya Kec.Cibodas Kota Tangerang - Banten', '367109281200008', 'lionelmessi@gmail.com', '2024-07-02'),
(2, 'Cristiano Ronaldo', 'Jl.Kerta Jaya III No.3 RT.02/13 Kel.Uwung Jaya Kec.Neglasari', '367109281200005', 'Cristianorenaldo@gmail.com', '2024-07-16'),
(3, 'Jaz Izdez', 'Jl.Kerta Jaya III No.3 RT.02/13 Kel.Uwung Jaya Kec.Neglasari', '367109281200002', 'jayizdez@gmail.com', '2024-07-17'),
(4, 'Muhamad Yusuf', 'Jl.Kerta Jaya III No.3 RT.02/13 Kel.Uwung Jaya Kec.Cipondoh', '367109281200003', 'muhamadyusuf@gmail.com', '2024-07-01'),
(5, 'Yasril', 'Jl.Kerta Jaya III No.3 RT.03/14 Kel.Uwung Jaya Kec.Cibodas Kota Tangerang', '36710928120023', 'yasril@gmail.com', '2024-07-31');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
