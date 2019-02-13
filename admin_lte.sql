-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2019 at 07:23 AM
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
  `asal_waste` varchar(50) NOT NULL,
  `jml_balepress` int(11) NOT NULL,
  `jml_kg` double NOT NULL,
  `user` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `timestramp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyerahan_waste_produksi`
--

CREATE TABLE `penyerahan_waste_produksi` (
  `id` int(11) NOT NULL,
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
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyerahan_waste_produksi`
--

INSERT INTO `penyerahan_waste_produksi` (`id`, `tanggal`, `nama_waste`, `jenis_waste`, `bagian`, `no_karung`, `shift`, `jml_karung`, `jml_kg`, `tujuan`, `asal_waste`, `user`, `timestamp`) VALUES
(1, '2019-02-12', 'Amerika', 'Kering', 'Atas', 'F0022', 'B', 1, 15, '', 'Gradi', 'Baruna', '2019-02-12 13:00:44'),
(4, '2019-02-12', 'Amerika', 'Kering', 'Atas', 'F0022', 'B', 1, 15, '', 'Gradi', 'Baruna', '2019-02-12 13:00:44'),
(19, '0000-00-00', 'Amerika', 'Kering', 'Atas', '3', 'B', 1, 10, '', 'basah', 'Baruna', '2019-02-12 14:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `stock_gudang_waste`
--

CREATE TABLE `stock_gudang_waste` (
  `nama_waste` varchar(50) NOT NULL,
  `jenis_waste` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `jml_bale` int(11) NOT NULL,
  `jml_kg` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_waste_produksi`
--

CREATE TABLE `stock_waste_produksi` (
  `nama_waste` varchar(50) NOT NULL,
  `jenis_waste` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `jml_karung` int(11) NOT NULL,
  `jml_kg` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(42, '2019-02-12', 'Amerika', 'Kering', 'Atas', 'Gradi', 'F0022', 'B', 1, 15, 'Baruna', '2019-02-12 13:00:44', 1),
(44, '2019-02-08', 'Amerika', 'Kering', 'Atas', 'Indonesia', '001', 'A', 1, 12, 'Baruna', '2019-02-12 13:53:21', 1),
(45, '2019-02-28', 'Amerika', 'Kering', 'Atas', 'basah', '2', 'A', 1, 20, 'Baruna', '2019-02-12 14:00:36', 1),
(46, '2019-02-28', 'Amerika', 'Kering', 'Atas', 'basah', '3', 'B', 1, 10, 'Baruna', '2019-02-12 14:00:37', 1),
(47, '2019-02-13', 'Argentina', 'Basah', 'bawah', 'Lengkeng', 'F-990d', 'B', 1, 45, 'Marines', '2019-02-13 01:49:23', 1),
(48, '2019-02-14', 'Argentina', 'Basah', 'bawah', 'Gtx', 'D-134', 'A', 1, 12, 'Marines', '2019-02-13 02:11:10', 1),
(49, '2019-02-14', 'Argentina', 'Basah', 'bawah', 'Gtx', 'D-456', 'C', 1, 43, 'Marines', '2019-02-13 02:11:11', 1),
(50, '2019-02-28', 'Argentina', 'Basah', 'bawah', 'Padalarang', 'DD001', 'N', 1, 123, 'Marines', '2019-02-13 03:16:51', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penyerahan_waste_produksi`
--
ALTER TABLE `penyerahan_waste_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `waste_produksi`
--
ALTER TABLE `waste_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
