-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Agu 2023 pada 14.30
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelas_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kode`, `nama_kelas`, `harga`) VALUES
(1, 'MP001', 'inggris', '450000'),
(3, 'MP002', 'matematika', '500000'),
(4, 'MP004', 'sejarah', '400000'),
(5, 'MP005', 'kimia', '450000'),
(6, 'MP006', 'fisika', '450000'),
(7, 'MP007', 'geografi', '500000'),
(8, 'MP008', 'ekonomi', '450000'),
(9, 'MP009', 'seni', '400000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(5) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `paket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `id_kelas`, `kode`, `nama`, `paket`) VALUES
(1, 4, 'K001', 'eazel kulfik', '2 tahun'),
(3, 3, 'K003', 'aris bawahan', '2 tahun'),
(6, 6, 'K004', 'arif', '2 tahun'),
(9, 4, 'K009', 'acengas', '2 tahun'),
(10, 3, 'K0010', 'areasa utility', '2 tahun'),
(11, 7, 'K0011', 'zulkifi', '1 tahun'),
(12, 7, 'K0012', 'armagedon', '2 tahun'),
(13, 1, 'K0013', 'gru hulut', '2 tahun'),
(14, 3, 'K0014', 'iklim hujan', '1 tahun'),
(15, 8, 'K0015', 'alip', '2 tahun'),
(16, 5, 'K0016', 'sukiman', '1 tahun'),
(17, 4, 'K0017', 'tulisman ruftom', '3 tahun'),
(20, 4, 'K0020', 'yuna sasaki', '3 tahun'),
(24, 4, 'K0021', 'adolf filter', '3 tahun'),
(27, 5, 'K0025', 'sddsd', '2 tahun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trak` int(11) NOT NULL,
  `kode_siswa` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `paket` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `bayar` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_trak`, `kode_siswa`, `nama`, `kelas`, `paket`, `harga`, `bayar`, `status`) VALUES
(1, 'K001', 'eazel kulfik', 'sejarah', '2 tahun', '400000', '400000', 'lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(12, 'admin1', '698d51a19d8a121ce581499d7b701668', 'admin'),
(13, 'user1', '698d51a19d8a121ce581499d7b701668', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trak`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_trak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
