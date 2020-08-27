-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Agu 2020 pada 10.09
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid19`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `marker`
--

CREATE TABLE `marker` (
  `id_marker` int(11) NOT NULL,
  `longitude` float DEFAULT NULL,
  `latitude` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suspek`
--

CREATE TABLE `suspek` (
  `id` int(11) NOT NULL,
  `positif` int(11) DEFAULT NULL,
  `sembuh` int(11) DEFAULT NULL,
  `meninggal` int(11) DEFAULT NULL,
  `pdp` int(11) NOT NULL,
  `pdp_meninggal` int(11) NOT NULL,
  `pdp_sembuh` int(11) NOT NULL,
  `odp` int(11) NOT NULL,
  `odp_selesai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suspek`
--

INSERT INTO `suspek` (`id`, `positif`, `sembuh`, `meninggal`, `pdp`, `pdp_meninggal`, `pdp_sembuh`, `odp`, `odp_selesai`) VALUES
(1, 1, 1, 3, 4, 0, 5, 8, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'hasan', '$2y$10$gHIcyG70glHh/f63m3gli.q8w6eqy8EpNBBTY1BwdVt0iEHlP1Wey'),
(5, 'admin_root', '$2y$10$FxDyKq//Xz1/rQAa8gRzJe0REasP5OjgMsloj41qV4ovNfPA6ZSxi'),
(6, 'superadmin', '$2y$10$DNDlbApTipx0W2p3/O48bukMyQp2ap7Heu6B32plgF7nICPZl/mnG');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `marker`
--
ALTER TABLE `marker`
  ADD PRIMARY KEY (`id_marker`);

--
-- Indeks untuk tabel `suspek`
--
ALTER TABLE `suspek`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `marker`
--
ALTER TABLE `marker`
  MODIFY `id_marker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `suspek`
--
ALTER TABLE `suspek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
