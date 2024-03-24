-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 24, 2024 at 01:04 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_topsis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  `namalengkap` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `level`, `namalengkap`) VALUES
(1, 'admin', 'admin', 'admin', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` varchar(5) NOT NULL,
  `nm_alternatif` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nm_alternatif`) VALUES
('A1', 'Rumah Adat Sungai Bering'),
('A2', 'Alek Bakajang');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(5) NOT NULL,
  `nama_kriteria` varchar(45) NOT NULL,
  `bobot` double NOT NULL,
  `poin1` double NOT NULL,
  `poin2` double NOT NULL,
  `poin3` double NOT NULL,
  `poin4` double NOT NULL,
  `poin5` double NOT NULL,
  `poin6` double NOT NULL,
  `poin7` double NOT NULL,
  `poin8` double NOT NULL,
  `poin9` double NOT NULL,
  `poin10` double NOT NULL,
  `sifat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `poin1`, `poin2`, `poin3`, `poin4`, `poin5`, `poin6`, `poin7`, `poin8`, `poin9`, `poin10`, `sifat`) VALUES
('C1', 'Jarak', 5, 1, 2, 3, 4, 5, 0, 0, 0, 0, 0, 'benefit'),
('C2', 'Waktu', 4, 1, 2, 3, 4, 5, 0, 0, 0, 0, 0, 'benefit'),
('C3', 'Biaya', 3, 1, 2, 3, 4, 5, 0, 0, 0, 0, 0, 'benefit'),
('C4', 'Fasilitas', 2, 1, 2, 3, 4, 5, 0, 0, 0, 0, 0, 'benefit'),
('C5', 'Transportasi', 1, 1, 2, 3, 4, 5, 0, 0, 0, 0, 0, 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_matrik`
--

CREATE TABLE `nilai_matrik` (
  `id_matrik` int NOT NULL,
  `id_alternatif` varchar(7) NOT NULL,
  `id_kriteria` varchar(7) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_matrik`
--

INSERT INTO `nilai_matrik` (`id_matrik`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(13, 'A3', 'C1', 3),
(14, 'A3', 'C2', 4),
(15, 'A3', 'C3', 5),
(16, 'A3', 'C4', 1),
(17, 'A4', 'C1', 2),
(18, 'A4', 'C2', 1),
(19, 'A4', 'C3', 2),
(20, 'A4', 'C4', 4),
(21, 'A5', 'C1', 3),
(22, 'A5', 'C2', 5),
(23, 'A5', 'C3', 2),
(24, 'A5', 'C4', 4),
(25, 'A6', 'C1', 4),
(26, 'A6', 'C2', 2),
(27, 'A6', 'C3', 3),
(28, 'A6', 'C4', 5),
(29, 'A7', 'C1', 1),
(30, 'A7', 'C2', 3),
(31, 'A7', 'C3', 5),
(32, 'A7', 'C4', 2),
(33, 'A8', 'C1', 3),
(34, 'A8', 'C2', 4),
(35, 'A8', 'C3', 1),
(36, 'A8', 'C4', 2),
(37, 'A9', 'C1', 3),
(38, 'A9', 'C2', 3),
(39, 'A9', 'C3', 2),
(40, 'A9', 'C4', 1),
(129, 'A10', 'C1', 1),
(130, 'A10', 'C2', 0),
(131, 'A10', 'C3', 0),
(132, 'A10', 'C4', 0),
(170, 'A1', 'C1', 4),
(171, 'A1', 'C2', 4),
(172, 'A1', 'C3', 5),
(173, 'A1', 'C4', 2),
(174, 'A1', 'C5', 1),
(175, 'A2', 'C1', 4),
(176, 'A2', 'C2', 5),
(177, 'A2', 'C3', 1),
(178, 'A2', 'C4', 2),
(179, 'A2', 'C5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_preferensi`
--

CREATE TABLE `nilai_preferensi` (
  `nm_alternatif` varchar(35) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_matrik`
--
ALTER TABLE `nilai_matrik`
  ADD PRIMARY KEY (`id_matrik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai_matrik`
--
ALTER TABLE `nilai_matrik`
  MODIFY `id_matrik` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
