-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Mei 2017 pada 12.27
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_keuangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dana`
--

CREATE TABLE `dana` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `jumlah` float DEFAULT NULL,
  `penerima` varchar(100) DEFAULT NULL,
  `bukti` varchar(225) DEFAULT NULL,
  `sisa` float DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dana`
--

INSERT INTO `dana` (`id`, `user_id`, `tgl_keluar`, `jumlah`, `penerima`, `bukti`, `sisa`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-05-05', 1000000, 'Wayan Murjana', '32f6b6b0a0dd32efaa93095ed03aab47.jpg', 0, 1, 'Untuk belanja kantor bulanan', '2017-05-05 00:28:38', '2017-05-05 00:28:38'),
(2, 1, '2017-05-05', 2000000, 'Nyoman Bedebah', '94c8c4ceec2510678fa7f11c5896b2a8.jpg', 100000, 1, 'Untuk sevice mobil kantor', '2017-05-05 00:29:10', '2017-05-05 00:29:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `telp`, `password`, `remember_token`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@mail.com', '084738473837', '$2y$10$23NOhkckD/V7P/Qe1ruED.P89vCo5w.XLM1h8l7x0pbAlV73pHmCm', 'l4H6lz2QzaFo8Rw68vJ9tEJAsGi0atTOZTAxrBBWHi7S5GtUQY6D16rXf0zZ', 1, 1, '2017-05-03 22:55:02', '2017-05-03 22:55:02'),
(2, 'Kabag', 'kabag@mail.com', '084738473837', '$2y$10$2jf.dLV3YEIwWMBgQF9gv.XMk8.lIcGMgodpA0fuIx7udP/YoLxrG', 'd08DhtwQuYhWNO4ImGjpsgt5IDSzkenuY6AJ2p2nKoaOl4xBBheYbSfBRd5l', 2, 1, '2017-05-03 23:16:15', '2017-05-03 23:16:15'),
(3, 'Nyoman Bledor', 'beldor@mail.com', '084738473869', '$2y$10$5NvMSB1WbYeFp916KzdP0.SH6cRtEymEyPpXUIfQqe8.aa/7CUxk6', NULL, 1, 1, '2017-05-05 21:22:30', '2017-05-05 21:32:33'),
(4, 'Kabag Bedebah', 'bedebah@mail.com', '0857384747', '$2y$10$cUY8gQNesJalXLsi12QwjOfzxzDBxLrxt.5UMM7OyOr57qaqIEtQu', NULL, 2, 1, '2017-05-05 21:38:17', '2017-05-05 21:38:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dana`
--
ALTER TABLE `dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dana`
--
ALTER TABLE `dana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
