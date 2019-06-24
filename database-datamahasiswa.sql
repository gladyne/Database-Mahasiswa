-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2016 at 01:16 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `datamahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` text NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` varchar(30) NOT NULL,
  `alamat_asal` varchar(80) NOT NULL,
  `alamat_sekarang` varchar(80) NOT NULL,
  `no_telepon` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dosen_pembimbing` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat_asal`, `alamat_sekarang`, `no_telepon`, `email`, `dosen_pembimbing`, `jurusan`, `fakultas`, `username`, `password`) VALUES
('H1A008053', 'Firman Dwi Jayanto', 'Laki-Laki', 'Banyumas', '15-04-2016', 'Alamat Asal RT RW', 'Alamat Sekarang RT RW', '08567890', 'firmandije@gmail.com', 'Ari Asnani, Ph.D', 'Kimia', 'MIPA', 'firmandije', '89f60fadc53584f');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
