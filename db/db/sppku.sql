-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 11:07 AM
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
-- Database: `sppku`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bayar`
--

CREATE TABLE `jenis_bayar` (
  `th_pelajaran` char(9) NOT NULL,
  `tingkat` varchar(3) NOT NULL,
  `jumlah` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_bayar`
--

INSERT INTO `jenis_bayar` (`th_pelajaran`, `tingkat`, `jumlah`) VALUES
('2018/2019', 'XI', 85000),
('2019/2020', 'X', 90000);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(8) NOT NULL DEFAULT '',
  `th_pelajaran` char(9) NOT NULL DEFAULT '',
  `nis` char(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `th_pelajaran`, `nis`) VALUES
('12', '2018/2019', '2014201516'),
('12', '2019/2020', '123123'),
('122', '2019/2020', '2014201501'),
('122', '2019/2020', '2014201508'),
('13', '2019/2020', '13'),
('13', '2019/2020', '2014201511'),
('14', '2018/2019', '2014201503'),
('X-MI', '2019/2020', '2019202004'),
('X-MI', '2019/2020', '2019202005'),
('X-MI', '2019/2020', '2019202006'),
('X-MI', '2019/2020', '2019202007'),
('X-MI', '2019/2020', '2019202008'),
('X-MI', '2019/2020', '2019202009'),
('X-MI', '2019/2020', '2019202010'),
('X-MI', '2019/2020', '2019202014'),
('X-MI', '2019/2020', '2019202015'),
('X-MI', '2019/2020', '2019202016'),
('X-MI', '2019/2020', '2019202017'),
('X-MI', '2019/2020', '2019202018'),
('X-MI', '2019/2020', '2019202019'),
('X-MI', '2019/2020', '2019202020'),
('X-MI', '2019/2020', '2019202021'),
('X-MI', '2019/2020', '2019202022'),
('X-MI', '2019/2020', '2019202023'),
('X-MI', '2019/2020', '2019202024'),
('X-MI', '2019/2020', '2019202025'),
('X-TI', '2019/2020', '2019202026'),
('X-TI', '2019/2020', '2019202027'),
('X-TI', '2019/2020', '2019202028'),
('X-TI', '2019/2020', '2019202029'),
('X-TI', '2019/2020', '2019202030'),
('X-TI', '2019/2020', '2019202031'),
('X-TI', '2019/2020', '2019202032'),
('X-TI', '2019/2020', '2019202033'),
('X-TI', '2019/2020', '2019202034'),
('X-TI', '2019/2020', '2019202035'),
('X-TI', '2019/2020', '2019202038'),
('X-TI', '2019/2020', '2019202039'),
('X-TI', '2019/2020', '2019202040'),
('X-TI', '2019/2020', '2019202041'),
('X-TI', '2019/2020', '2019202042'),
('X-TI', '2019/2020', '2019202043'),
('X-TI', '2019/2020', '2019202044'),
('X-TI', '2019/2020', '2019202045'),
('X-TKJ', '2019/2020', '2019202011'),
('X-TKJ', '2019/2020', '2019202012'),
('X-TKJ', '2019/2020', '2019202013'),
('X-TKJ', '2019/2020', '2019202036'),
('X-TKJ', '2019/2020', '2019202037'),
('XI-MI', '2019/2020', '2019202001'),
('XI-MI', '2019/2020', '2019202002'),
('XI-MI', '2019/2020', '2019202003');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kelas` varchar(8) NOT NULL,
  `nis` char(10) NOT NULL,
  `bulan` varchar(45) NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `jumlah` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`kelas`, `nis`, `bulan`, `tgl_bayar`, `jumlah`) VALUES
('', '12', 'February', '2023-01-18', 1000000),
('12', '2014201501', 'April', '2020-07-23', 85000),
('122', '2014201501', 'July', '2020-07-23', 85000),
('123', '2014201515', 'February', '2020-07-20', 90000),
('13', '13', 'February', '2023-01-18', 1000000),
('13', '13', 'January', '2023-01-18', 1000000),
('13', '2014201511', 'June', '2020-07-21', 90000),
('14', '2014201519', 'April', '2020-07-21', 85000),
('wewe', '2014201501', 'January', '2020-05-10', 85000),
('X-MI', '2014201504', 'December', '2019-12-27', 90000),
('X-MI', '2014201507', 'December', '2019-12-27', 90000),
('X-MI', '2014201508', 'December', '2019-12-27', 90000),
('X-TI', '2014201535', 'December', '2019-12-27', 90000),
('X-TI', '2014201535', 'June', '2020-06-11', 90000),
('X-TKJ', '2014201513', 'December', '2019-12-27', 90000),
('X-TKJ', '2014201536', 'December', '2019-12-27', 90000),
('XI-MI', '2014201501', 'April', '2020-05-08', 85000);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `idprodi` varchar(4) NOT NULL,
  `prodi` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`idprodi`, `prodi`) VALUES
('MI', 'Manajemen Informatika'),
('TI', 'Teknologi Informatika'),
('TKJ', 'Teknik Komputer Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` char(10) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `idprodi` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `idprodi`) VALUES
('12', 'Aldi lumban tobing', 'TI'),
('123123', 'Aldi sinaga', 'MI'),
('13', 'Aldi lumban tobing', 'MI'),
('2014201508', 'EKO SUHARTOYO', 'MI'),
('2014201511', 'RAHMADYAN AZHAR', 'TKJ'),
('2014201512', 'VINDRA ABBI BUANA', 'TKJ'),
('2014201513', 'CAHYA PRASETYA', 'TKJ'),
('2014201515', 'RENDRA ALFATHRIDHO', 'MI'),
('2014201516', 'AHMAD BADARRUDDIN', 'MI'),
('2014201517', 'DHIMAS SUNAR MULYONO', 'MI'),
('2014201519', 'RISTANTO ARYAN PRATAMA', 'MI'),
('2014201523', 'MOHAMAD IHSAN', 'MI'),
('2014201525', 'SULIS STYAWATI', 'MI'),
('2014201526', 'ALDA SATRIA SUMINAR', 'TI'),
('2014201527', 'ADIMAS SINTO DEWO', 'TI'),
('2014201528', 'ENIK SUHARTINI', 'TI'),
('2014201529', 'DEVI PUSPITASARI', 'TI'),
('2014201531', 'YAYUK MARIYANTI', 'TI'),
('2014201532', 'ELSA TANTRIANA YUNITA DEWI', 'TI'),
('2014201535', 'IDA ZUBAIDAH', 'TI'),
('2014201536', 'SILVIA MARIANA MUSTIKA', 'TKJ'),
('2014201540', 'NINE ANZULKARINA RAMADHANI', 'TI'),
('2014201541', 'SITI NUR HIMALAYA', 'TI'),
('2014201545', 'YUCKE PRAKOSO', 'TI');

-- --------------------------------------------------------

--
-- Table structure for table `tapel`
--

CREATE TABLE `tapel` (
  `id` int(11) NOT NULL,
  `tapel` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tapel`
--

INSERT INTO `tapel` (`id`, `tapel`) VALUES
(1, '2016/2017'),
(2, '2018/2019'),
(4, '2019/2020');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `fullname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `admin`, `fullname`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'Administrator'),
(2, 'dicky', 'ee0b6db238b075d0da86340048fb147a', 1, 'dicky nainggolan'),
(3, 'kasir', '4297f44b13955235245b2497399d7a93', 2, 'Kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_bayar`
--
ALTER TABLE `jenis_bayar`
  ADD PRIMARY KEY (`th_pelajaran`,`tingkat`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`,`th_pelajaran`,`nis`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kelas`,`nis`,`bulan`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`idprodi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tapel`
--
ALTER TABLE `tapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tapel`
--
ALTER TABLE `tapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
