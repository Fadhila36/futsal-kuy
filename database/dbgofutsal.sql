-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2019 at 04:20 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbgofutsal`
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
('JD', 2, '21:00:00', '23:00:00', 2, '2019-07-18', 'BO'),
('JD1', 5, '19:00:00', '20:00:00', 1, '2019-08-14', 'BO1'),
('JD3', 5, '22:00:00', '23:00:00', 1, '2019-08-13', 'BO2'),
('JD4', 1, '16:00:00', '17:00:00', 1, '2019-08-12', 'BO3'),
('JD5', 1, '08:00:00', '10:00:00', 2, '2019-08-24', 'BO5'),
('JD6', 1, '07:00:00', '08:00:00', 1, '2019-08-24', 'BO6');

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
(1, 1, 'Rinjani 1', 'Jl. Pangkalan Jati No. 17', 85000, 'rinjani1.jpg'),
(2, 7, 'H. Turoh', 'Gang Nangka KP Cakung, Kel. Jatimekar, Kec. Jatias', 65000, '11.jpg'),
(3, 3, 'Sentro', 'Jl. Raya Hayam Wuruk 89', 115000, '4.jpg'),
(4, 2, 'Exco', 'Jl. Jatiwaringin No. 27', 85000, 'profil.jpg'),
(5, 4, 'Alibaba', 'Jl. Raya Pekayon', 115000, '156005c5baf40ff51a327f1c34f2975b2.jpg');

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
(5, 'Willy Permana', 'Laki-Laki', 'Ponorogo', '081946097421', 'willy.permana21@gmail.com', 'user.jpg', 5),
(10, 'Fitria Ambarwati', 'Perempuan', 'Jatiwaringi, Jakarta Timur', '081234345656', 'f.ambar@gmail.com', '', 9),
(12, 'Putut Redianto', 'Perempuan', 'Madiun', '081234345656', 'robby.nelius@yahoo.com', '', 10),
(13, 'Willy Permanaa', 'Laki-Laki', 'Madiun', '081946097421', 'robby.nelius@yahoo.com', '', 11),
(14, 'MIO', 'Laki-Laki', 'Depok', '021212', 'mio@gmail.com', '', 12);

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
  `jam_pesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `id_sewa`, `totalbayar`, `tgl_bayar`, `status_bayar`, `bukti`, `jam_pesan`) VALUES
('IV', 'BO', 130000, '2019-07-21', 'Terkonfirmasi', 'gambar15582505086.jpg', '0000-00-00 00:00:00'),
('IV1', 'BO1', 115000, '0000-00-00', 'Menunggu Pembayaran', '', '0000-00-00 00:00:00'),
('IV2', 'BO2', 115000, '2019-08-12', 'Terkonfirmasi', 'gambar1558246424.jpg', '2019-08-25 11:38:49'),
('IV3', 'BO3', 85000, '2019-08-12', 'Menunggu Konfirmasi', 'gambar1558211779.jpg', '2019-09-23 04:18:19'),
('IV4', 'BO4', 340000, '0000-00-00', 'Menunggu Pembayaran', '', '0000-00-00 00:00:00'),
('IV5', 'BO5', 0, '0000-00-00', 'Menunggu Pembayaran', '', '0000-00-00 00:00:00'),
('IV6', 'BO6', 0, '0000-00-00', 'Menunggu Pembayaran', '', '0000-00-00 00:00:00'),
('IV7', 'BO5', 0, '0000-00-00', 'Menunggu Pembayaran', '', '0000-00-00 00:00:00'),
('IV8', 'BO6', 85000, '0000-00-00', 'Menunggu Pembayaran', '', '0000-00-00 00:00:00');

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
('BO', 2, 5, '2019-07-18', '2019-07-18', '21:00:00', 'Selesai'),
('BO1', 5, 10, '2019-08-10', '2019-08-10', '19:00:00', 'Selesai'),
('BO2', 5, 5, '2019-08-10', '2019-08-10', '22:00:00', 'Selesai'),
('BO3', 1, 5, '2019-08-10', '2019-08-11', '16:00:00', 'Batal'),
('BO4', 4, 5, '2019-08-14', '2019-08-14', '00:00:00', 'Selesai'),
('BO5', 1, 5, '2019-08-24', '2019-08-24', '08:00:00', 'Booking'),
('BO6', 1, 5, '2019-08-24', '2019-08-24', '07:00:00', 'Booking');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `status` enum('1','2','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `status`) VALUES
(4, 'adm', 'b09c600fddc573f117449b3723f23d64', '1'),
(5, 'willy', 'e7236697824fb37763235980f1061218', '2'),
(9, 'fitri', '534a0b7aa872ad1340d0071cbfa38697', '2'),
(10, 'putut', '5b26f09d8dc0cb4f9290ffabbd299806', '2'),
(11, 'willy2', 'da4e43aad927f384446a02c002760f02', '2'),
(12, 'mio', '78c925a3a4b36984d1bcbbb01457eec6', '2');

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
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
