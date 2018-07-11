-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2018 at 04:18 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ormawa`
--

-- --------------------------------------------------------

--
-- Table structure for table `dpm`
--

CREATE TABLE `dpm` (
  `nim` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(2) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dpm`
--

INSERT INTO `dpm` (`nim`, `nama`, `jenis_kelamin`, `jabatan`, `password`, `status`, `telp`, `role_id`) VALUES
(5345346, 'admin', 'Laki-laki', 'admin', 'admin', 0, '45346337', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kemahasiswaan`
--

CREATE TABLE `kemahasiswaan` (
  `niy` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` int(2) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kemahasiswaan`
--

INSERT INTO `kemahasiswaan` (`niy`, `nama`, `jenis_kelamin`, `password`, `status`, `telp`, `role_id`) VALUES
(353645675, 'Percil', 'Laki-laki', 'admin', 0, '093673982', 0),
(2147483647, 'admin', 'Laki-laki', 'admin', 0, '53546475', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ormawa`
--

CREATE TABLE `ormawa` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ormawa`
--

INSERT INTO `ormawa` (`id`, `nama`) VALUES
(1531133283, 'Pramuka'),
(1531133298, 'Nahkoda');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_kegiatan`
--

CREATE TABLE `pengajuan_kegiatan` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tema_kegiatan` varchar(255) NOT NULL,
  `tujuan` text NOT NULL,
  `sasaran` text NOT NULL,
  `bentuk_kegiatan` varchar(255) NOT NULL,
  `tgl1` date NOT NULL,
  `jam1` time NOT NULL,
  `tgl2` date NOT NULL,
  `jam2` time NOT NULL,
  `rencana_dana` text NOT NULL,
  `id_tempat_kegiatan` int(11) NOT NULL,
  `id_ormawa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_dpm` int(2) NOT NULL,
  `keterangan_dpm` text NOT NULL,
  `status_kemahasiswaan` int(2) NOT NULL,
  `keterangan_kemahasiswaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pengajuan_kegiatan`
--

INSERT INTO `pengajuan_kegiatan` (`id`, `nama_kegiatan`, `tema_kegiatan`, `tujuan`, `sasaran`, `bentuk_kegiatan`, `tgl1`, `jam1`, `tgl2`, `jam2`, `rencana_dana`, `id_tempat_kegiatan`, `id_ormawa`, `id_user`, `status_dpm`, `keterangan_dpm`, `status_kemahasiswaan`, `keterangan_kemahasiswaan`) VALUES
(1531210834, 'Pengajian', 'Religi', 'Emboh ', 'Wong Akeh', 'Seminar', '2020-03-02', '00:03:00', '2019-02-02', '01:05:00', 'Rp.1325', 0, 0, 0, 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `pertanggung_jawab`
--

CREATE TABLE `pertanggung_jawab` (
  `id` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `realisasi_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempat_kegiatan`
--

CREATE TABLE `tempat_kegiatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempat_kegiatan`
--

INSERT INTO `tempat_kegiatan` (`id`, `nama`) VALUES
(1531132916, 'Gor Hasubullah Said');

-- --------------------------------------------------------

--
-- Table structure for table `user_ormawa`
--

CREATE TABLE `user_ormawa` (
  `nim` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(12) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `id_ormawa` int(11) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` int(2) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_ormawa`
--

INSERT INTO `user_ormawa` (`nim`, `nama`, `jenis_kelamin`, `jabatan`, `id_ormawa`, `password`, `status`, `telp`, `id_role`) VALUES
(544, 'Perciel', 'Laki-laki', 'admin', 1531133298, 'admin', 0, '34253466', 1),
(435345, 'ismail', 'Laki-laki', 'admin', 1531133298, 'admin', 0, '986394632', 0),
(23423523, 'aaa', 'Laki-laki', 'admin', 1531133283, 'admin', 0, '45346337', 0),
(44353453, 'coba', 'Laki-laki', 'admin', 1, 'admin', 0, '45346337', 0),
(65756758, 'dvdfvdf', 'Laki-laki', 'admin', 1531129633, 'admin', 0, '767879', 0),
(2147483647, 'fgbfbfgbfn', 'Laki-laki', 'admin', 1531129621, 'admin', 0, '53546475', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dpm`
--
ALTER TABLE `dpm`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `kemahasiswaan`
--
ALTER TABLE `kemahasiswaan`
  ADD PRIMARY KEY (`niy`);

--
-- Indexes for table `ormawa`
--
ALTER TABLE `ormawa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_kegiatan`
--
ALTER TABLE `pengajuan_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertanggung_jawab`
--
ALTER TABLE `pertanggung_jawab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempat_kegiatan`
--
ALTER TABLE `tempat_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_ormawa`
--
ALTER TABLE `user_ormawa`
  ADD PRIMARY KEY (`nim`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
