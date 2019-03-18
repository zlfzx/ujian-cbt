-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 03:15 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbt`
--
CREATE DATABASE IF NOT EXISTS `cbt` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cbt`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'muhammad zulfi izzulhaq', 'zulfi', '$2y$10$VwZi.Rg5260KsgiRun.0f.e6/7gnnW7X5YiYLgAIedf6GF7vo1EPm'),
(2, 'Administrator', 'admin', '$2y$10$z3WqtOHwXPKKIaxcNAB.Zu1gpp8.nneTEHqtBEJ3zIcvZ9mKG02XO'),
(5, 'muhammad zulfi', 'izz', '$2y$10$zBIDIfZKbzNO5cPQcsTpK.NTqKG.24B2FIDFDbRjtphZ5HDchDBGy');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `mapel` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama`, `mapel`, `username`, `password`) VALUES
(1, 'Mamatika', 1, 'gurumtk', '1234'),
(2, 'Bu Indo', 2, 'guruindo', '1234');

--
-- Triggers `guru`
--
DELIMITER $$
CREATE TRIGGER `hapus_guru` BEFORE DELETE ON `guru` FOR EACH ROW BEGIN
	DELETE FROM soal WHERE soal.guru=OLD.id_guru;
	DELETE FROM ujian WHERE ujian.id_guru=OLD.id_guru;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ikut_ujian`
--

CREATE TABLE `ikut_ujian` (
  `id_tes` int(11) NOT NULL,
  `id_ujian` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `list_soal` longtext,
  `list_jawaban` longtext,
  `jml_benar` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `tgl_mulai` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  `status` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'Teknik Komputer dan Jaringan');

--
-- Triggers `jurusan`
--
DELIMITER $$
CREATE TRIGGER `hapus_jurusan` BEFORE DELETE ON `jurusan` FOR EACH ROW BEGIN
	DELETE FROM kelas WHERE kelas.jurusan=OLD.id_jurusan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `jurusan` int(11) NOT NULL,
  `rombel` int(11) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `jurusan`, `rombel`, `kode_kelas`) VALUES
(1, 12, 1, 2, '12 TKJ 2'),
(2, 12, 1, 1, '12 TKJ 1');

--
-- Triggers `kelas`
--
DELIMITER $$
CREATE TRIGGER `hapus_kelas` BEFORE DELETE ON `kelas` FOR EACH ROW BEGIN
	DELETE FROM siswa WHERE siswa.kelas=OLD.id_kelas;
	DELETE FROM soal WHERE soal.kelas=OLD.id_kelas;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `mapel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `mapel`) VALUES
(1, 'Matematika'),
(2, 'Bahasa Indonesia'),
(3, 'Bahasa Inggris');

--
-- Triggers `mapel`
--
DELIMITER $$
CREATE TRIGGER `hapus_mapel` BEFORE DELETE ON `mapel` FOR EACH ROW BEGIN
	DELETE FROM guru WHERE guru.mapel=OLD.id_mapel;
	DELETE FROM soal WHERE soal.mapel=OLD.id_mapel;
	DELETE FROM nilai WHERE nilai.id_mapel=OLD.id_mapel;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nis` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nohp` char(12) NOT NULL,
  `pertanyaan` varchar(50) NOT NULL,
  `jawaban` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `nis`, `kelas`, `password`, `nohp`, `pertanyaan`, `jawaban`) VALUES
(1, 'M. Afakhan Saifudin Alwi', 1610846, 1, '1610846', '', '', ''),
(2, 'Makhi', 1610847, 1, '1610847', '', '', ''),
(3, 'Mochammad Dani Setiardi', 1610848, 1, '1610848', '', '', ''),
(4, 'Moh Zidni Khakim', 1610849, 1, '1610849', '', '', ''),
(5, 'Muhammad Afifurrohman', 1610850, 1, '1610850', '', '', ''),
(6, 'Muhammad I\'zzudin', 1610851, 1, '1610851', '', '', ''),
(7, 'Muhammad Nafidzul Abror', 1610852, 1, '1610852', '', '', ''),
(8, 'Muhammad Zulfi Izzulhaq', 1610853, 1, 'zxcv', '', 'siapa nama kucing peliharaan?', 'meong'),
(9, 'Nastiti Indriasari', 1610854, 1, '1610854', '', '', ''),
(10, 'Nayavakda Risvia Salsabila', 1610855, 1, '1610855', '', '', ''),
(11, 'Owo', 1610802, 2, '1610802', '', '', ''),
(12, 'Owi', 1610801, 2, '1610801', '', '', '');

--
-- Triggers `siswa`
--
DELIMITER $$
CREATE TRIGGER `hapus_siswa` BEFORE DELETE ON `siswa` FOR EACH ROW BEGIN
	DELETE FROM nilai WHERE nilai.id_siswa=OLD.id_siswa;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `mapel` int(11) DEFAULT NULL,
  `kelas` int(11) DEFAULT NULL,
  `guru` int(11) DEFAULT NULL,
  `soal` text,
  `media` varchar(50) DEFAULT NULL,
  `opsi_a` text,
  `opsi_b` text,
  `opsi_c` text,
  `opsi_d` text,
  `opsi_e` text,
  `jawaban` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `mapel`, `kelas`, `guru`, `soal`, `media`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `jawaban`) VALUES
(1, 1, 1, 1, '<p>1+1=</p>\r\n', NULL, '3', '23', '1', '2', '34', 'C'),
(2, 1, 1, 1, '<p>2 x 4 =</p>\r\n', NULL, '45', '23', '23', '3', '8', 'E');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id_ujian` int(11) NOT NULL,
  `nama_ujian` varchar(100) NOT NULL DEFAULT '0',
  `id_kelas` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `waktu` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `ujian`
--
DELIMITER $$
CREATE TRIGGER `hapus_ujian` BEFORE DELETE ON `ujian` FOR EACH ROW BEGIN
	DELETE FROM ikut_ujian WHERE ikut_ujian.id_ujian=OLD.id_ujian;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `mapel` (`mapel`);

--
-- Indexes for table `ikut_ujian`
--
ALTER TABLE `ikut_ujian`
  ADD PRIMARY KEY (`id_tes`),
  ADD KEY `id_ujian` (`id_ujian`),
  ADD KEY `siswa` (`id_siswa`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `jurusan` (`jurusan`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `kelas` (`kelas`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `mapel` (`mapel`),
  ADD KEY `kelas` (`kelas`),
  ADD KEY `guru` (`guru`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id_ujian`),
  ADD KEY `nama_ujian` (`nama_ujian`),
  ADD KEY `FK1_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ikut_ujian`
--
ALTER TABLE `ikut_ujian`
  MODIFY `id_tes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`mapel`) REFERENCES `mapel` (`id_mapel`);

--
-- Constraints for table `ikut_ujian`
--
ALTER TABLE `ikut_ujian`
  ADD CONSTRAINT `FK1_ujian` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id_ujian`),
  ADD CONSTRAINT `FK2_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_guruFK3` FOREIGN KEY (`guru`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `soal_kelasFK2` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `soal_mapelFK1` FOREIGN KEY (`mapel`) REFERENCES `mapel` (`id_mapel`);

--
-- Constraints for table `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `FK1_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `FK2_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`),
  ADD CONSTRAINT `FK3_guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
