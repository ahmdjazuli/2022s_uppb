-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 01:01 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2022s_uppb`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `iddetail` int(5) NOT NULL,
  `notransaksi` varchar(15) NOT NULL,
  `idinventori` int(2) NOT NULL,
  `namainvenny` varchar(50) NOT NULL,
  `satuanny` varchar(50) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `hargany` float NOT NULL,
  `subharga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`iddetail`, `notransaksi`, `idinventori`, `namainvenny`, `satuanny`, `jumlah`, `hargany`, `subharga`) VALUES
(21, '2021120132', 2, 'Getah Karet Cair - A', '250Liter', 3, 20000, 60000),
(22, '2021120159', 4, 'Getah Karet Mentah - B', '300Liter', 1, 35000, 35000),
(23, '2021120144', 2, 'Getah Karet Cair - A', '250Liter', 1, 0, 0),
(24, '2021120144', 4, 'Getah Karet Mentah - B', '300Liter', 1, 0, 0),
(25, '2022052926', 4, 'Getah Karet Mentah - B', '300Liter', 5, 35000, 175000),
(26, '2022052926', 2, 'Getah Karet Cair - A', '250Liter', 2, 20000, 40000),
(27, '2022053100', 2, 'Getah Karet Cair - A', '250Liter', 1, 20000, 20000),
(28, '2022060154', 2, 'Getah Karet Cair - A', '250Liter', 5, 20000, 100000),
(29, '2022060154', 4, 'Getah Karet Mentah - B', '300Liter', 3, 35000, 105000);

--
-- Triggers `detail`
--
DELIMITER $$
CREATE TRIGGER `saatBeli` AFTER INSERT ON `detail` FOR EACH ROW BEGIN 
	UPDATE inventori SET stok = stok - NEW.jumlah
    WHERE idinventori = NEW.idinventori;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `saatCancel` AFTER DELETE ON `detail` FOR EACH ROW BEGIN 
	UPDATE inventori SET stok = stok + OLD.jumlah
    WHERE idinventori = OLD.idinventori;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `inventori`
--

CREATE TABLE `inventori` (
  `idinventori` int(2) NOT NULL,
  `namainven` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `stok` int(3) NOT NULL,
  `harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventori`
--

INSERT INTO `inventori` (`idinventori`, `namainven`, `satuan`, `stok`, `harga`) VALUES
(2, 'Getah Karet Cair - A', '250Liter', 11, 20000),
(4, 'Getah Karet Mentah - B', '300Liter', 20, 35000),
(5, 'Getah Karet Cair - C', '150Liter', 10, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `inventorimasuk`
--

CREATE TABLE `inventorimasuk` (
  `idinventorimasuk` int(5) NOT NULL,
  `idinventori` int(2) NOT NULL,
  `id` int(5) NOT NULL,
  `tgl` datetime NOT NULL,
  `gambar` text NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventorimasuk`
--

INSERT INTO `inventorimasuk` (`idinventorimasuk`, `idinventori`, `id`, `tgl`, `gambar`, `jumlah`, `harga`, `total`) VALUES
(15, 4, 8, '2021-12-01 20:00:00', '139IMG.20200811.092721..2..jpg', 4, 15000, 60000),
(16, 5, 4, '2021-12-01 12:52:00', '581IMG.20191218.135559..2..jpg', 10, 10000, 100000);

--
-- Triggers `inventorimasuk`
--
DELIMITER $$
CREATE TRIGGER `gaJadiMasuk` AFTER DELETE ON `inventorimasuk` FOR EACH ROW BEGIN 
	UPDATE inventori SET stok = stok - OLD.jumlah
    WHERE idinventori = OLD.idinventori;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `saatBarangMasuk` AFTER INSERT ON `inventorimasuk` FOR EACH ROW BEGIN
	UPDATE inventori SET stok = stok + NEW.jumlah
    WHERE idinventori = NEW.idinventori;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ubahMasuk` AFTER UPDATE ON `inventorimasuk` FOR EACH ROW BEGIN
	UPDATE inventori SET stok = stok - OLD.jumlah, 
                     stok = stok + NEW.jumlah 
    WHERE idinventori = NEW.idinventori;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `monitoring`
--

CREATE TABLE `monitoring` (
  `idmonitoring` int(5) NOT NULL,
  `id` int(5) NOT NULL,
  `tgl` datetime NOT NULL,
  `lokasi` text NOT NULL,
  `ket` text NOT NULL,
  `total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monitoring`
--

INSERT INTO `monitoring` (`idmonitoring`, `id`, `tgl`, `lokasi`, `ket`, `total`) VALUES
(1, 6, '2022-05-29 21:32:00', 'Kabupaten Tapin', 'Pemantauan Daerah Kebun Getah Karet daerah sekitarnya', 5500),
(2, 9, '2022-05-31 15:56:00', 'Banjarbaru', 'Pemantauan Daerah Kebun Karet di Banjarbaru', 500);

-- --------------------------------------------------------

--
-- Table structure for table `rincian`
--

CREATE TABLE `rincian` (
  `idrincian` int(5) NOT NULL,
  `idmonitoring` int(5) NOT NULL,
  `jumlahpohon` int(5) NOT NULL,
  `usiapohon` int(2) NOT NULL,
  `pupuk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rincian`
--

INSERT INTO `rincian` (`idrincian`, `idmonitoring`, `jumlahpohon`, `usiapohon`, `pupuk`) VALUES
(1, 1, 1000, 1, 'Urea'),
(2, 1, 2000, 4, 'SP-36'),
(3, 2, 200, 7, 'Kieserit/Dolomit');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `notransaksi` varchar(15) NOT NULL,
  `id` int(5) NOT NULL,
  `tgl` datetime NOT NULL,
  `total` float NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `konfirmasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`notransaksi`, `id`, `tgl`, `total`, `catatan`, `konfirmasi`) VALUES
('2021120132', 5, '2021-12-01 11:00:00', 60000, '-', 'diterima'),
('2021120144', 9, '2021-12-01 12:42:00', 0, 'diserahkan oleh pegawai uppb sebagai perwakilan.', ''),
('2021120159', 7, '2021-12-01 12:38:00', 35000, '-', 'diterima'),
('2022052926', 3, '2022-05-29 21:03:00', 215000, '-', 'diterima'),
('2022053100', 3, '2022-05-31 09:20:00', 20000, '-', 'diterima'),
('2022060154', 3, '2022-06-01 09:28:00', 205000, '-', 'diterima');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `level` varchar(30) NOT NULL,
  `luaslahan` varchar(50) NOT NULL,
  `kelompok` varchar(50) NOT NULL,
  `file1` text NOT NULL,
  `file2` text NOT NULL,
  `file3` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `nik`, `telp`, `alamat`, `level`, `luaslahan`, `kelompok`, `file1`, `file2`, `file3`, `status`) VALUES
(1, 'Admin', 'admin', 'admin', '6303212827483313', 'mk', 'mk', 'Admin', '', '', '', '', '', 'Aktif'),
(3, 'Rendi', 'rendi', 'rendi', '6303012825482888', '6289172314213', 'BJM', 'Pelanggan', '', '', '', '', '', 'Aktif'),
(4, 'Tretan', 'tretan', 'tretan', '6530142321483727', '089666714255', 'hantu mariaban', 'Petani', '8 Hektar', 'Riam Pinang', '', '', '', ''),
(5, 'Firdaus Rifai', 'firdaus', 'firdaus', '6303012821483724', '6282172614255', '-', 'Pelanggan', '', '', '', '', '', 'Aktif'),
(6, 'Pakwin', 'ace', 'ace', '6303012827783775', '08888314764', '-', 'Petani', '10 Hektar', 'Suka Makmur', '', '', '', ''),
(7, 'Sharifah', 'sharifah', 'sharifah', '6303045821486829', '6288705020024', 'Martapura', 'Pelanggan', '', '', '', '', '', 'Aktif'),
(8, 'Amelia', 'amel', 'amel', '6303112621434724', '089896716733', 'Banjarbaru', 'Petani', '7.5 Hektar', 'Permata', '', '', '', ''),
(9, 'Yusuf Rifai', 'yusuf', 'yusuf', '6303062825662811', '6287582384935', 'Landasan Ulin', 'Petani', '5 Hektar', 'Permata', '', '', '', ''),
(11, 'tes1', 'tes1', 'tes1', '6303072032975199', '629768674155', 'banjarbaru', 'Pelanggan', '', '', '169casdas.jpg', '6221.jpg', '519Kartu.Keluarga.Fake.jpg', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`iddetail`),
  ADD KEY `notransaksi` (`notransaksi`),
  ADD KEY `idinventori` (`idinventori`);

--
-- Indexes for table `inventori`
--
ALTER TABLE `inventori`
  ADD PRIMARY KEY (`idinventori`);

--
-- Indexes for table `inventorimasuk`
--
ALTER TABLE `inventorimasuk`
  ADD PRIMARY KEY (`idinventorimasuk`),
  ADD KEY `idinventori` (`idinventori`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`idmonitoring`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `rincian`
--
ALTER TABLE `rincian`
  ADD PRIMARY KEY (`idrincian`),
  ADD KEY `idmonitoring` (`idmonitoring`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`notransaksi`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `iddetail` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `inventori`
--
ALTER TABLE `inventori`
  MODIFY `idinventori` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventorimasuk`
--
ALTER TABLE `inventorimasuk`
  MODIFY `idinventorimasuk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `idmonitoring` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rincian`
--
ALTER TABLE `rincian`
  MODIFY `idrincian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`notransaksi`) REFERENCES `transaksi` (`notransaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventorimasuk`
--
ALTER TABLE `inventorimasuk`
  ADD CONSTRAINT `inventorimasuk_ibfk_1` FOREIGN KEY (`idinventori`) REFERENCES `inventori` (`idinventori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventorimasuk_ibfk_2` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD CONSTRAINT `monitoring_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rincian`
--
ALTER TABLE `rincian`
  ADD CONSTRAINT `rincian_ibfk_1` FOREIGN KEY (`idmonitoring`) REFERENCES `monitoring` (`idmonitoring`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
