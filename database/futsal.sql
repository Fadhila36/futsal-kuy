-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 11:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `foto_admin` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `foto_admin`, `id_user`) VALUES
(2, 'Administrator', 'user.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(10) NOT NULL,
  `id_lap` int(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `durasi` int(2) NOT NULL,
  `tgl_main` date NOT NULL,
  `id_sewa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_lap`, `jam_mulai`, `jam_selesai`, `durasi`, `tgl_main`, `id_sewa`) VALUES
('JD', 2, '07:00:00', '08:00:00', 1, '2021-04-23', 'BO');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Rumput Sintetis'),
(2, 'Taraflex'),
(4, 'Karpet Plastik'),
(6, 'Vinyl'),
(7, 'Semen');

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id_lap` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_lap` varchar(20) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `tarif` double NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id_lap`, `id_kategori`, `nama_lap`, `lokasi`, `tarif`, `gambar`) VALUES
(1, 1, 'Rinjani 1', 'Karawang Kota', 85000, 'rinjani1.jpg'),
(2, 7, 'H. Turoh', 'Resinda', 65000, '11.jpg'),
(3, 3, 'Sentro', 'Galuh', 115000, '4.jpg'),
(4, 2, 'Exco', 'Klari', 85000, 'profil.jpg'),
(5, 4, 'Alibaba', 'Teluk Jambe', 115000, '156005c5baf40ff51a327f1c34f2975b2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(25) NOT NULL,
  `gender` enum('Laki-Laki','Perempuan','') NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(35) NOT NULL,
  `foto_member` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `gender`, `alamat`, `no_hp`, `email`, `foto_member`, `id_user`) VALUES
(15, 'Muhammad Fadhila Abiyyu F', 'Laki-Laki', 'Jl. H.S. Ronggowaluyo, Teluk Jambe, Karawang', '02134005122', 'yuffa36@gmail.com', '', 13),
(16, 'Rizqi Alfadillah Saprudin', 'Laki-Laki', 'Dusun Sukatani Rt.010/004 Desa Pinayungan', '08976986615', 'rizqialfadil@gmail.com', '', 14);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` varchar(11) NOT NULL,
  `id_sewa` varchar(10) NOT NULL,
  `totalbayar` double NOT NULL,
  `tgl_bayar` date NOT NULL,
  `status_bayar` enum('Menunggu Pembayaran','Menunggu Konfirmasi','Terkonfirmasi') NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `jam_pesan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `id_sewa`, `totalbayar`, `tgl_bayar`, `status_bayar`, `bukti`, `jam_pesan`) VALUES
('IV', 'BO', 65000, '0000-00-00', 'Menunggu Pembayaran', '', '2021-04-22 13:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id_sewa` varchar(10) NOT NULL,
  `id_lap` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_sewa` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `status_sewa` enum('Booking','Batal','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyewaan`
--

INSERT INTO `penyewaan` (`id_sewa`, `id_lap`, `id_member`, `tgl_pesan`, `tgl_sewa`, `jam_mulai`, `status_sewa`) VALUES
('BO', 2, 16, '2021-04-22', '2021-04-23', '07:00:00', 'Booking');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `status` enum('1','2','3','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `status`) VALUES
(4, 'admin', '0192023a7bbd73250516f069df18b500', '1'),
(13, 'fadhila36', 'bb9aa282169bd729e0c8245b7edc7a15', '2'),
(14, 'fadil', 'bc86e7f23018b3b810743914b1cb4029', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_lap` (`id_lap`),
  ADD KEY `id_sewa` (`id_sewa`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id_lap`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `id_sewa` (`id_sewa`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_member` (`id_member`,`id_lap`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id_lap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
