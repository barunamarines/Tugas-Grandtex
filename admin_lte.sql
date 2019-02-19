-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2019 at 08:46 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_lte`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil_balepress`
--

CREATE TABLE `hasil_balepress` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_waste` varchar(50) NOT NULL,
  `jenis_waste` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `no_bale` varchar(50) NOT NULL,
  `shift` varchar(50) NOT NULL,
  `jml_balepress` int(11) NOT NULL,
  `jml_kg` double NOT NULL,
  `user` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_balepress`
--

INSERT INTO `hasil_balepress` (`id`, `tanggal`, `nama_waste`, `jenis_waste`, `bagian`, `no_bale`, `shift`, `jml_balepress`, `jml_kg`, `user`, `timestamp`, `status`) VALUES
(1, '2019-02-16', 'Amerika', 'Kering', 'Atas', '001', 'A', 1, 65, '', '2019-02-18 14:24:00', 0),
(2, '2019-02-15', 'Amerika', 'Kering', 'Atas', 'H-012', 'B', 2, 65, '', '2019-02-19 01:34:59', 0),
(3, '2019-02-15', 'Amerika', 'Kering', 'Atas', 'P-918', 'M', 2, 65, '', '2019-02-19 01:34:59', 0),
(4, '2019-02-20', 'Amerika', 'Kering', 'Atas', 'Jk/12', 'C', 1, 65, '', '2019-02-19 01:41:41', 0),
(5, '2019-02-08', 'Amerika', 'Kering', 'Atas', '01', 'A', 2, 65, '', '2019-02-19 03:52:34', 0),
(6, '2019-02-08', 'Amerika', 'Kering', 'Atas', '02', 'B', 2, 65, '', '2019-02-19 03:52:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `departemen`, `password`) VALUES
(1, 'baruna', '', '12345'),
(21, 'ines', 'non-dept', '12'),
(22, 'sem', 'persiapan', '12345'),
(23, 'tirta', 'spinning', '2311d27654515097e1f23b3bf39adccd'),
(24, 'leka', 'persiapan', 'dc6114923405c3840363f74026b2bb51');

-- --------------------------------------------------------

--
-- Table structure for table `master_waste`
--

CREATE TABLE `master_waste` (
  `id` int(11) NOT NULL,
  `nama_waste` varchar(50) NOT NULL,
  `jenis_waste` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_waste`
--

INSERT INTO `master_waste` (`id`, `nama_waste`, `jenis_waste`, `bagian`, `user`, `timestamp`) VALUES
(1, 'Amerika', 'Kering', 'Atas', 'Baruna', '2019-02-06 21:12:09'),
(2, 'Argentina', 'Basah', 'bawah', 'Marines', '2019-02-07 06:20:14');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_waste` varchar(50) NOT NULL,
  `jenis_waste` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `no_bale` int(11) NOT NULL,
  `shift` varchar(50) NOT NULL,
  `jml_bale` int(11) NOT NULL,
  `jml_kg` double NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyerahan_hasil_balepress`
--

CREATE TABLE `penyerahan_hasil_balepress` (
  `id` int(11) NOT NULL,
  `id_stock` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_waste` varchar(50) NOT NULL,
  `jenis_waste` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `no_bale` varchar(50) NOT NULL,
  `shift` varchar(50) NOT NULL,
  `jml_bale` int(11) NOT NULL,
  `jml_kg` double NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyerahan_hasil_balepress`
--

INSERT INTO `penyerahan_hasil_balepress` (`id`, `id_stock`, `tanggal`, `nama_waste`, `jenis_waste`, `bagian`, `no_bale`, `shift`, `jml_bale`, `jml_kg`, `tujuan`, `user`, `timestamp`, `status`) VALUES
(1, '', '2019-01-01', 'Colombia', 'Celana', 'Produksi', '001', 'A', 1, 45, 'gudang', 'Tirta', '2019-02-18 14:12:39', 0),
(2, '', '2019-01-01', 'Colombia', 'Celana', 'Produksi', '001', 'A', 1, 45, 'gudang', 'Tirta', '2019-02-18 14:13:01', 0),
(3, '', '2019-02-16', 'Amerika', 'Kering', 'Atas', '001', 'A', 1, 65, 'Gudang', '', '2019-02-18 14:24:00', 0),
(4, 'Amerika Kering Atas', '2019-02-16', 'Amerika', 'Kering', 'Atas', '001', 'A', 1, 65, 'Cikadut', '', '2019-02-18 14:24:00', 0);

--
-- Triggers `penyerahan_hasil_balepress`
--
DELIMITER $$
CREATE TRIGGER `Input Nilai` AFTER INSERT ON `penyerahan_hasil_balepress` FOR EACH ROW BEGIN

INSERT INTO stock_waste_produksi SET id=NEW.id_stock,nama_waste=NEW.nama_waste,jenis_waste=NEW.jenis_waste,bagian=NEW.bagian,jml_karung=NEW.jml_bale,jml_kg=NEW.jml_kg ON DUPLICATE KEY UPDATE jml_karung=jml_karung-NEW.jml_bale, jml_kg=jml_kg-NEW.jml_kg;

INSERT INTO stock_gudang_waste SET id=NEW.id_stock,nama_waste=NEW.nama_waste,jenis_waste=NEW.jenis_waste,bagian=NEW.bagian,jml_bale=NEW.jml_bale,jml_kg=NEW.jml_kg ON DUPLICATE KEY UPDATE jml_bale=jml_bale+NEW.jml_bale, jml_kg=jml_kg+NEW.jml_kg;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penyerahan_waste_produksi`
--

CREATE TABLE `penyerahan_waste_produksi` (
  `id` int(11) NOT NULL,
  `id_stock` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_waste` varchar(50) NOT NULL,
  `jenis_waste` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `no_karung` varchar(50) NOT NULL,
  `shift` varchar(50) NOT NULL,
  `jml_karung` int(11) NOT NULL,
  `jml_kg` double NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `asal_waste` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyerahan_waste_produksi`
--

INSERT INTO `penyerahan_waste_produksi` (`id`, `id_stock`, `tanggal`, `nama_waste`, `jenis_waste`, `bagian`, `no_karung`, `shift`, `jml_karung`, `jml_kg`, `tujuan`, `asal_waste`, `user`, `timestamp`) VALUES
(3, 'Amerika Kering Atas', '2019-02-09', 'Amerika', 'Kering', 'Atas', '01', 'U', 1, 10, 'Gudang', 'Indonesia', 'Baruna', '2019-02-18 08:48:25'),
(4, 'Amerika Kering Atas', '2019-02-09', 'Amerika', 'Kering', 'Atas', '02', 'U', 1, 15, 'Gudang', 'Indonesia', 'Baruna', '2019-02-18 08:48:25'),
(5, 'Amerika Kering Atas', '2019-02-09', 'Amerika', 'Kering', 'Atas', '03', 'U', 1, 20, 'Gudang', 'Indonesia', 'Baruna', '2019-02-18 08:51:27'),
(6, 'Argentina Basah bawah', '2019-02-09', 'Argentina', 'Basah', 'bawah', '01', 'U', 1, 25, 'Gudang', 'Indonesia', 'Marines', '2019-02-18 08:51:27'),
(7, 'Argentina Basah bawah', '2019-02-09', 'Argentina', 'Basah', 'bawah', '02', 'U', 1, 30, 'Gudang', 'Indonesia', 'Marines', '2019-02-18 08:52:33'),
(8, 'Argentina Basah bawah', '2019-02-09', 'Argentina', 'Basah', 'bawah', '02', 'U', 1, 30, 'Gudang Gradi', 'Indonesia', 'Marines', '2019-02-18 08:52:33'),
(9, 'Amerika Kering Atas', '2019-02-16', 'Amerika', 'Kering', 'Atas', '03', 'U', 1, 20, 'Gudang Mamah', 'Indonesia', 'Baruna', '2019-02-18 13:22:36'),
(10, 'Amerika Kering Atas', '2019-02-16', 'Amerika', 'Kering', 'Atas', '01', 'U', 1, 10, 'Gudang', 'Indonesia', 'Baruna', '2019-02-18 08:48:25'),
(11, 'Amerika Kering Atas', '2019-02-16', 'Amerika', 'Kering', 'Atas', '01', 'U', 1, 10, 'Gudang', 'Indonesia', 'Baruna', '2019-02-18 08:48:25');

--
-- Triggers `penyerahan_waste_produksi`
--
DELIMITER $$
CREATE TRIGGER `Tambah nilai` AFTER INSERT ON `penyerahan_waste_produksi` FOR EACH ROW BEGIN

INSERT INTO stock_waste_produksi SET id=NEW.id_stock,nama_waste=NEW.nama_waste,jenis_waste=NEW.jenis_waste,bagian=NEW.bagian,jml_karung=NEW.jml_karung,jml_kg=NEW.jml_kg ON DUPLICATE KEY UPDATE jml_karung=jml_karung+NEW.jml_karung, jml_kg=jml_kg+NEW.jml_kg;

UPDATE waste_produksi SET status = 1 WHERE id=NEW.id;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stock_gudang_waste`
--

CREATE TABLE `stock_gudang_waste` (
  `id` varchar(100) NOT NULL,
  `nama_waste` varchar(50) NOT NULL,
  `jenis_waste` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `jml_bale` int(11) NOT NULL,
  `jml_kg` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_gudang_waste`
--

INSERT INTO `stock_gudang_waste` (`id`, `nama_waste`, `jenis_waste`, `bagian`, `jml_bale`, `jml_kg`) VALUES
('', 'Colombia', 'Celana', 'Produksi', 3, 155),
('Amerika Kering Atas', 'Amerika', 'Kering', 'Atas', 1, 65);

-- --------------------------------------------------------

--
-- Table structure for table `stock_waste_produksi`
--

CREATE TABLE `stock_waste_produksi` (
  `id` varchar(100) NOT NULL,
  `nama_waste` varchar(50) NOT NULL,
  `jenis_waste` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `jml_karung` int(11) NOT NULL,
  `jml_kg` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_waste_produksi`
--

INSERT INTO `stock_waste_produksi` (`id`, `nama_waste`, `jenis_waste`, `bagian`, `jml_karung`, `jml_kg`) VALUES
('', 'Amerika', 'Kering', 'Atas', 1, 65),
('Amerika Kering Atas', 'Amerika', 'Kering', 'Atas', 5, 20),
('Argentina Basah bawah', 'Argentina', 'Basah', 'bawah', 3, 85);

-- --------------------------------------------------------

--
-- Table structure for table `waste_produksi`
--

CREATE TABLE `waste_produksi` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_waste` varchar(50) NOT NULL,
  `jenis_waste` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `asal_waste` varchar(50) NOT NULL,
  `no_karung` varchar(50) NOT NULL,
  `shift` varchar(50) NOT NULL,
  `jml_karung` int(11) NOT NULL,
  `jml_kg` double NOT NULL,
  `user` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waste_produksi`
--

INSERT INTO `waste_produksi` (`id`, `tanggal`, `nama_waste`, `jenis_waste`, `bagian`, `asal_waste`, `no_karung`, `shift`, `jml_karung`, `jml_kg`, `user`, `timestamp`, `status`) VALUES
(1, '2019-02-09', 'Amerika', 'Kering', 'Atas', 'Indonesia', '01', 'U', 1, 10, 'Baruna', '2019-02-18 08:48:25', 0),
(2, '2019-02-09', 'Amerika', 'Kering', 'Atas', 'Indonesia', '02', 'U', 1, 15, 'Baruna', '2019-02-18 13:47:28', 1),
(3, '2019-02-11', 'Amerika', 'Kering', 'Atas', 'Indonesia', '03', 'U', 1, 20, 'Baruna', '2019-02-18 13:22:36', 1),
(4, '2019-02-09', 'Argentina', 'Basah', 'bawah', 'Indonesia', '01', 'U', 1, 25, 'Marines', '2019-02-18 08:51:27', 1),
(5, '2019-02-09', 'Argentina', 'Basah', 'bawah', 'Indonesia', '02', 'U', 1, 30, 'Marines', '2019-02-18 08:52:33', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil_balepress`
--
ALTER TABLE `hasil_balepress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_waste`
--
ALTER TABLE `master_waste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyerahan_hasil_balepress`
--
ALTER TABLE `penyerahan_hasil_balepress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyerahan_waste_produksi`
--
ALTER TABLE `penyerahan_waste_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_gudang_waste`
--
ALTER TABLE `stock_gudang_waste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_waste_produksi`
--
ALTER TABLE `stock_waste_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waste_produksi`
--
ALTER TABLE `waste_produksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_balepress`
--
ALTER TABLE `hasil_balepress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `master_waste`
--
ALTER TABLE `master_waste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penyerahan_hasil_balepress`
--
ALTER TABLE `penyerahan_hasil_balepress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penyerahan_waste_produksi`
--
ALTER TABLE `penyerahan_waste_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `waste_produksi`
--
ALTER TABLE `waste_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
