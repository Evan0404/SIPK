-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 25 Mar 2024 pada 06.51
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipk_hmja`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` text NOT NULL,
  `kelas_anggota` text NOT NULL,
  `nim_anggota` varchar(50) NOT NULL,
  `alamat_anggota` text NOT NULL,
  `wa` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `kelas_anggota`, `nim_anggota`, `alamat_anggota`, `wa`, `created_at`, `updated_at`) VALUES
(1, 'Syafa Auliya Nur Waqi’ah', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(2, 'Aini Nur Rahmawati', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(3, 'Sofia Rahmawati', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(4, 'Aris Slamet', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(5, 'Sintia Sari', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(6, 'Eni Lestanti Dewi', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(7, 'Illiyah Aprilita', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(8, 'Refi Mariska', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(9, 'Ferlia Esa Cahyani', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(10, 'Imelda Arifanda', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(11, 'Roni Hadi Saputri', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(12, 'Fila Rifatul Amalia', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(13, 'Jumia Oktavianti', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(14, 'Krisdyanti', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(15, 'Nofita Nuraini', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(16, 'Mariatul Maulaningsih', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(17, 'Mezaluna Putri Istifarah', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(18, 'Suci Rahmawati', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(19, 'Melinda Yulia Agatha', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(20, 'Nur Azizah Icha Susanti', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(21, 'Nabilla Zumrotul', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(22, 'Dinda Naulia Eka Purwanti', '', '223133981', '-', '-', '2024-01-10 20:22:39', '2024-01-10 21:02:55'),
(23, 'Bima Wahyu Gilang Ramadhan', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(24, 'Rafael Ayundra Hendriawan', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(25, 'Amanda Tri Octaviani', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(26, 'Fifin Alfiatur Rohmah', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(27, 'Ahmad Hardi Shofiul Anam', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(28, 'Sholehuddin', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(29, 'Farizka Eka Marthania', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(30, 'Dandi Calvianto', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(31, 'Syifaul Khoiriyah', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(32, 'Ulfatus Zahro', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05'),
(33, 'Sofiatun Nur Azizah', '-', '-', '-', '-', '2024-01-10 20:22:39', '2024-01-10 20:47:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas`
--

CREATE TABLE `kas` (
  `id_kas` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `tgl_kas` date NOT NULL,
  `keterangan_kas` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` text NOT NULL,
  `status` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `masuk_keluar`
--

CREATE TABLE `masuk_keluar` (
  `id_masuk_keluar` bigint(20) NOT NULL,
  `judul` text NOT NULL,
  `kategori` int(11) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `masuk_keluar`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `wa` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `tgl_lahir`, `alamat`, `wa`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'test@gmail.com', '12345678', '2004-04-04', '-', '081230674160', '2024-01-12 09:58:33', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id_kas`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `masuk_keluar`
--
ALTER TABLE `masuk_keluar`
  ADD PRIMARY KEY (`id_masuk_keluar`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `kas`
--
ALTER TABLE `kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `masuk_keluar`
--
ALTER TABLE `masuk_keluar`
  MODIFY `id_masuk_keluar` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
