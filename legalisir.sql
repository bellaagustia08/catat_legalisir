-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Okt 2021 pada 13.15
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `legalisir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(11) UNSIGNED NOT NULL,
  `id_kelola` int(11) UNSIGNED DEFAULT NULL,
  `berkas` varchar(200) NOT NULL,
  `nama_berkas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `id_kelola`, `berkas`, `nama_berkas`) VALUES
(1, 1, 'Sistem_Pakar_Diagnosa_Penyakit_Gigi_Menggunakan_Me.pdf', 'SK'),
(5, 2, '1454-3867-1-PB.pdf', 'aaa'),
(6, 1, '180513211-Annethe Lufhanschia Wersemetawar-Proposal Skripsi.pdf', 'Tes Tambah Berkas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelola`
--

CREATE TABLE `kelola` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `tanggal_legalisir` datetime DEFAULT NULL,
  `keterangan` varchar(256) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kelola`
--

INSERT INTO `kelola` (`id`, `nama_pegawai`, `tanggal_legalisir`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'qqqqq', '2021-10-20 00:00:00', 'pengangkatan jabatan', '2021-10-14 12:23:07', '2021-10-14 18:09:38'),
(2, 'aaa', '2021-10-30 00:00:00', 'aaa', '2021-10-14 14:16:42', '2021-10-14 18:13:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$kbVG3QeMQWj/UAaJ2Ftp9O5d7TNDdkASEu4Mj4w7Bj2DE39ml/.Du', 'admin', '2021-10-11 08:05:21', '2021-10-11 08:05:21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`),
  ADD KEY `id_kelola` (`id_kelola`);

--
-- Indeks untuk tabel `kelola`
--
ALTER TABLE `kelola`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kelola`
--
ALTER TABLE `kelola`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD CONSTRAINT `gambar_data_id_foreign` FOREIGN KEY (`id_kelola`) REFERENCES `kelola` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
