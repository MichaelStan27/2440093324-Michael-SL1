-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2022 at 05:50 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sl_dbserver`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(15) NOT NULL,
  `nama_tengah` varchar(15) NOT NULL,
  `nama_belakang` varchar(15) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `warga_negara` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_depan`, `nama_tengah`, `nama_belakang`, `tempat_lahir`, `tgl_lahir`, `nik`, `warga_negara`, `email`, `hp`, `alamat`, `kode_pos`, `foto`, `username`, `password`) VALUES
(2, 'Budi', 'Tio', 'Sulaiman', 'Krusty', '2013-02-04', '4876134576911189', 'Inggris', 'budi@gmail.com', '012345678975', 'Atlantis no 89', '12345', 'userImg.png', 'asd', '$2y$10$qbSd2q1/SReRIQeQf5CUJOrbZIZGUZDSzq2ApIuacV0E/FXyvzwfa'),
(3, 'Toti', 'Lesley', 'Sudirjo', 'Atlantis', '2022-02-09', '1234137813481279', 'Inggris', 'toti@gmail.com', '012345678975', 'TPJ', '12345', 'userimage2.png', 'admin', '$2y$10$66mwEtYDXjeuQPRI8Y0cy.piXAqIIczdvKeTNZ12AjLnPX7wGBWbK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
