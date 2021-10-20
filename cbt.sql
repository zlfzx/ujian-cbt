-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.6-MariaDB - Source distribution
-- Server OS:                    Linux
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for cbt
CREATE DATABASE IF NOT EXISTS `cbt` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cbt`;

-- Dumping structure for table cbt.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table cbt.admin: ~3 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
	(1, 'muhammad zulfi izzulhaq', 'zulfi', '$2y$10$U6l7It/QtUG2yo4GzkgtfOhhvzWBgVgAStraWFmNG7LvoybQqnMdK'),
	(2, 'Administrator', 'admin', '$2y$10$bWS1y9Hn0aMqcS1B3Sj8V.BFS4jF6btw1Qr0sv5ndirQyk2cs2sRG'),
	(5, 'muhammad zulfi', 'izz', '$2y$10$zBIDIfZKbzNO5cPQcsTpK.NTqKG.24B2FIDFDbRjtphZ5HDchDBGy');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table cbt.guru
CREATE TABLE IF NOT EXISTS `guru` (
  `id_guru` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `mapel` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id_guru`),
  KEY `mapel` (`mapel`),
  CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`mapel`) REFERENCES `mapel` (`id_mapel`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table cbt.guru: ~2 rows (approximately)
/*!40000 ALTER TABLE `guru` DISABLE KEYS */;
INSERT INTO `guru` (`id_guru`, `nama`, `mapel`, `username`, `password`) VALUES
	(1, 'Mamatika', 1, 'gurumtk', '1234'),
	(2, 'Bu Indo', 2, 'guruindo', '1234');
/*!40000 ALTER TABLE `guru` ENABLE KEYS */;

-- Dumping structure for table cbt.ikut_ujian
CREATE TABLE IF NOT EXISTS `ikut_ujian` (
  `id_tes` int(11) NOT NULL AUTO_INCREMENT,
  `id_ujian` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `list_soal` longtext DEFAULT NULL,
  `list_jawaban` longtext DEFAULT NULL,
  `jml_benar` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `tgl_mulai` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  `status` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id_tes`),
  KEY `id_ujian` (`id_ujian`),
  KEY `siswa` (`id_siswa`),
  CONSTRAINT `FK1_ujian` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id_ujian`),
  CONSTRAINT `FK2_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table cbt.ikut_ujian: ~1 rows (approximately)
/*!40000 ALTER TABLE `ikut_ujian` DISABLE KEYS */;
INSERT INTO `ikut_ujian` (`id_tes`, `id_ujian`, `id_siswa`, `list_soal`, `list_jawaban`, `jml_benar`, `nilai`, `tgl_mulai`, `tgl_selesai`, `status`) VALUES
	(1, 1, 8, '1,2,3,4', '1:D,2:E,3:B,4:D', 3, 75, '2020-04-01 13:42:21', '2020-04-01 14:12:21', 'N');
/*!40000 ALTER TABLE `ikut_ujian` ENABLE KEYS */;

-- Dumping structure for table cbt.jurusan
CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `jurusan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table cbt.jurusan: ~0 rows (approximately)
/*!40000 ALTER TABLE `jurusan` DISABLE KEYS */;
INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
	(1, 'Teknik Komputer dan Jaringan');
/*!40000 ALTER TABLE `jurusan` ENABLE KEYS */;

-- Dumping structure for table cbt.kelas
CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` int(11) NOT NULL,
  `jurusan` int(11) NOT NULL,
  `rombel` int(11) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  PRIMARY KEY (`id_kelas`),
  KEY `jurusan` (`jurusan`),
  CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`jurusan`) REFERENCES `jurusan` (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table cbt.kelas: ~2 rows (approximately)
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` (`id_kelas`, `kelas`, `jurusan`, `rombel`, `kode_kelas`) VALUES
	(1, 12, 1, 2, '12 TKJ 2'),
	(2, 12, 1, 1, '12 TKJ 1');
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;

-- Dumping structure for table cbt.mapel
CREATE TABLE IF NOT EXISTS `mapel` (
  `id_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `mapel` varchar(30) NOT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table cbt.mapel: ~3 rows (approximately)
/*!40000 ALTER TABLE `mapel` DISABLE KEYS */;
INSERT INTO `mapel` (`id_mapel`, `mapel`) VALUES
	(1, 'Matematika'),
	(2, 'Bahasa Indonesia'),
	(3, 'Bahasa Inggris');
/*!40000 ALTER TABLE `mapel` ENABLE KEYS */;

-- Dumping structure for table cbt.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nis` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nohp` char(12) NOT NULL,
  `pertanyaan` varchar(50) NOT NULL,
  `jawaban` varchar(50) NOT NULL,
  PRIMARY KEY (`id_siswa`),
  KEY `kelas` (`kelas`),
  CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table cbt.siswa: ~12 rows (approximately)
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
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
	(11, 'Owo', 1610802, 2, '1610802', '', '', '');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;

-- Dumping structure for table cbt.soal
CREATE TABLE IF NOT EXISTS `soal` (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `mapel` int(11) DEFAULT NULL,
  `kelas` int(11) DEFAULT NULL,
  `guru` int(11) DEFAULT NULL,
  `soal` text DEFAULT NULL,
  `media` varchar(50) DEFAULT NULL,
  `opsi_a` text DEFAULT NULL,
  `opsi_b` text DEFAULT NULL,
  `opsi_c` text DEFAULT NULL,
  `opsi_d` text DEFAULT NULL,
  `opsi_e` text DEFAULT NULL,
  `jawaban` text DEFAULT NULL,
  PRIMARY KEY (`id_soal`),
  KEY `mapel` (`mapel`),
  KEY `kelas` (`kelas`),
  KEY `guru` (`guru`),
  CONSTRAINT `soal_guruFK3` FOREIGN KEY (`guru`) REFERENCES `guru` (`id_guru`),
  CONSTRAINT `soal_kelasFK2` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`id_kelas`),
  CONSTRAINT `soal_mapelFK1` FOREIGN KEY (`mapel`) REFERENCES `mapel` (`id_mapel`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table cbt.soal: ~4 rows (approximately)
/*!40000 ALTER TABLE `soal` DISABLE KEYS */;
INSERT INTO `soal` (`id_soal`, `mapel`, `kelas`, `guru`, `soal`, `media`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `jawaban`) VALUES
	(1, 1, 1, 1, '<p>1+1=</p>\r\n', NULL, '3', '23', '1', '2', '34', 'C'),
	(2, 1, 1, 1, '<p>2 x 4 =</p>\r\n', NULL, '45', '23', '23', '3', '8', 'E'),
	(3, 1, 1, 1, '<p>1 + 1</p>\r\n', NULL, '1', '2', '3', '4', '5', 'B'),
	(4, 1, 1, 1, '<p>2 x 2</p>\r\n', NULL, '1', '3', '2', '4', '33', 'D');
/*!40000 ALTER TABLE `soal` ENABLE KEYS */;

-- Dumping structure for table cbt.ujian
CREATE TABLE IF NOT EXISTS `ujian` (
  `id_ujian` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ujian` varchar(100) NOT NULL DEFAULT '0',
  `id_kelas` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `waktu` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_ujian`),
  KEY `nama_ujian` (`nama_ujian`),
  KEY `FK1_kelas` (`id_kelas`),
  KEY `id_mapel` (`id_mapel`),
  KEY `id_guru` (`id_guru`),
  CONSTRAINT `FK1_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  CONSTRAINT `FK2_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`),
  CONSTRAINT `FK3_guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table cbt.ujian: ~1 rows (approximately)
/*!40000 ALTER TABLE `ujian` DISABLE KEYS */;
INSERT INTO `ujian` (`id_ujian`, `nama_ujian`, `id_kelas`, `id_mapel`, `id_guru`, `waktu`, `tanggal`) VALUES
	(1, 'kelas 12 TKJ 2', 1, 1, 1, 30, '2020-03-16');
/*!40000 ALTER TABLE `ujian` ENABLE KEYS */;

-- Dumping structure for trigger cbt.hapus_guru
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `hapus_guru` BEFORE DELETE ON `guru` FOR EACH ROW BEGIN
	DELETE FROM soal WHERE soal.guru=OLD.id_guru;
	DELETE FROM ujian WHERE ujian.id_guru=OLD.id_guru;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger cbt.hapus_jurusan
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `hapus_jurusan` BEFORE DELETE ON `jurusan` FOR EACH ROW BEGIN
	DELETE FROM kelas WHERE kelas.jurusan=OLD.id_jurusan;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger cbt.hapus_kelas
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `hapus_kelas` BEFORE DELETE ON `kelas` FOR EACH ROW BEGIN
	DELETE FROM siswa WHERE siswa.kelas=OLD.id_kelas;
	DELETE FROM soal WHERE soal.kelas=OLD.id_kelas;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger cbt.hapus_mapel
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `hapus_mapel` BEFORE DELETE ON `mapel` FOR EACH ROW BEGIN
	DELETE FROM guru WHERE guru.mapel=OLD.id_mapel;
	DELETE FROM soal WHERE soal.mapel=OLD.id_mapel;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger cbt.hapus_ujian
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `hapus_ujian` BEFORE DELETE ON `ujian` FOR EACH ROW BEGIN
	DELETE FROM ikut_ujian WHERE ikut_ujian.id_ujian=OLD.id_ujian;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
