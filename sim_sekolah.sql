-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for sim_sekolah
CREATE DATABASE IF NOT EXISTS `sim_sekolah` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sim_sekolah`;

-- Dumping structure for table sim_sekolah.dokumen
CREATE TABLE IF NOT EXISTS `dokumen` (
  `id_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `file_dokumen` text NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `id_kategori` (`id_kategori`),
  KEY `id_guru` (`id_guru`),
  KEY `id_tahun` (`id_tahun`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sim_sekolah.dokumen: ~0 rows (approximately)
/*!40000 ALTER TABLE `dokumen` DISABLE KEYS */;
/*!40000 ALTER TABLE `dokumen` ENABLE KEYS */;

-- Dumping structure for table sim_sekolah.dokumen_nilai
CREATE TABLE IF NOT EXISTS `dokumen_nilai` (
  `id_dok_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `kategori` enum('UTS','UAS') NOT NULL,
  `file_dokumen` text NOT NULL,
  PRIMARY KEY (`id_dok_nilai`),
  KEY `id_mapel` (`id_mapel`),
  KEY `id_kelas` (`id_kelas`),
  KEY `id_tahun` (`id_tahun`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sim_sekolah.dokumen_nilai: ~0 rows (approximately)
/*!40000 ALTER TABLE `dokumen_nilai` DISABLE KEYS */;
/*!40000 ALTER TABLE `dokumen_nilai` ENABLE KEYS */;

-- Dumping structure for table sim_sekolah.format_administrasi
CREATE TABLE IF NOT EXISTS `format_administrasi` (
  `id_format` int(4) NOT NULL AUTO_INCREMENT,
  `id_unit` smallint(3) NOT NULL,
  `nama_format` varchar(40) NOT NULL,
  `file` text NOT NULL,
  PRIMARY KEY (`id_format`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sim_sekolah.format_administrasi: ~0 rows (approximately)
/*!40000 ALTER TABLE `format_administrasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `format_administrasi` ENABLE KEYS */;

-- Dumping structure for table sim_sekolah.kategori_dokumen
CREATE TABLE IF NOT EXISTS `kategori_dokumen` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sim_sekolah.kategori_dokumen: ~0 rows (approximately)
/*!40000 ALTER TABLE `kategori_dokumen` DISABLE KEYS */;
/*!40000 ALTER TABLE `kategori_dokumen` ENABLE KEYS */;

-- Dumping structure for table sim_sekolah.link
CREATE TABLE IF NOT EXISTS `link` (
  `id_link` int(11) NOT NULL AUTO_INCREMENT,
  `nama_link` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`id_link`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sim_sekolah.link: ~0 rows (approximately)
/*!40000 ALTER TABLE `link` DISABLE KEYS */;
INSERT INTO `link` (`id_link`, `nama_link`, `link`) VALUES
	(3, 'Dapodik', 'http://localhost:8000/sims/master/link/tambah'),
	(4, 'E-Master', 'http://localhost:8000/sims/master/link/tambah');
/*!40000 ALTER TABLE `link` ENABLE KEYS */;

-- Dumping structure for table sim_sekolah.mapel
CREATE TABLE IF NOT EXISTS `mapel` (
  `id_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(100) NOT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sim_sekolah.mapel: ~0 rows (approximately)
/*!40000 ALTER TABLE `mapel` DISABLE KEYS */;
/*!40000 ALTER TABLE `mapel` ENABLE KEYS */;

-- Dumping structure for table sim_sekolah.nilai_kelulusan
CREATE TABLE IF NOT EXISTS `nilai_kelulusan` (
  `id_skl` int(11) NOT NULL AUTO_INCREMENT,
  `id_tahun` int(11) NOT NULL,
  `file` text NOT NULL,
  `id_kelas` int(11) NOT NULL,
  PRIMARY KEY (`id_skl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sim_sekolah.nilai_kelulusan: ~0 rows (approximately)
/*!40000 ALTER TABLE `nilai_kelulusan` DISABLE KEYS */;
/*!40000 ALTER TABLE `nilai_kelulusan` ENABLE KEYS */;

-- Dumping structure for table sim_sekolah.nilai_uas
CREATE TABLE IF NOT EXISTS `nilai_uas` (
  `id_nilai_uas` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `file` text NOT NULL,
  PRIMARY KEY (`id_nilai_uas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sim_sekolah.nilai_uas: ~0 rows (approximately)
/*!40000 ALTER TABLE `nilai_uas` DISABLE KEYS */;
/*!40000 ALTER TABLE `nilai_uas` ENABLE KEYS */;

-- Dumping structure for table sim_sekolah.nilai_uts
CREATE TABLE IF NOT EXISTS `nilai_uts` (
  `id_nilai_uts` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `nilai_tugas` int(3) NOT NULL,
  `nilai_ulangan` int(3) NOT NULL,
  `nilai_uts` int(3) NOT NULL,
  PRIMARY KEY (`id_nilai_uts`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sim_sekolah.nilai_uts: ~0 rows (approximately)
/*!40000 ALTER TABLE `nilai_uts` DISABLE KEYS */;
/*!40000 ALTER TABLE `nilai_uts` ENABLE KEYS */;

-- Dumping structure for table sim_sekolah.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` smallint(5) NOT NULL AUTO_INCREMENT,
  `nik` char(16) NOT NULL,
  `nip` char(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nuptk` char(20) NOT NULL,
  `npwp` char(15) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('Islam','Katolik','Protestan','Hindu','Budha') NOT NULL,
  `id_status_pegawai` tinyint(2) NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tmt` varchar(20) NOT NULL,
  `id_user` int(6) NOT NULL,
  `statuspegawai` enum('Guru','Karyawan') NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sim_sekolah.pegawai: ~5 rows (approximately)
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` (`id_pegawai`, `nik`, `nip`, `nama`, `nuptk`, `npwp`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `id_status_pegawai`, `status`, `alamat`, `no_hp`, `email`, `tmt`, `id_user`, `statuspegawai`) VALUES
	(2, '43578', '8732', 'Matlubul Khairi, M.Kom.', '945837', '87584', 'L', 'Probolinggo', '2000-12-12', 'Islam', 2, 'Aktif', 'Alamat', '09859345348', 'mail@mail.com', 'Probolinggo', 1, 'Guru'),
	(3, '8537387', '-', 'Sofyan Zakaria, S.Kom.', '98987', '789', 'L', 'Probolinggo', '2000-12-12', 'Islam', 2, 'Aktif', 'Perumahan Kraksaan Land', '0984274346', 'mail@mail.com', 'Probolinggo', 1, 'Karyawan'),
	(4, '983429378', '-', 'Misri', '098', '878', 'L', 'Probolinggo', '2000-12-12', 'Islam', 2, 'Aktif', 'lamat', '93284209', 'mail@mail.com', 'Probolinggo', 1, 'Karyawan'),
	(5, '9876', '0', 'Gatot Suherman', '3398', '4', 'L', 'Probolinggo', '2000-11-11', 'Islam', 2, 'Aktif', 'Paiton', '0987', 'gtt@mail.com', 'P', 1, 'Guru'),
	(6, '7689', '0', 'Imam Khumaidi', '454', '2', 'L', 'Probolinggo', '2000-11-11', 'Islam', 2, 'Aktif', 'Paiton', '0987', 'imm@mail.com', 'P', 2, 'Guru');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;

-- Dumping structure for table sim_sekolah.pengaturan_guru_mapel
CREATE TABLE IF NOT EXISTS `pengaturan_guru_mapel` (
  `id_guru_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  PRIMARY KEY (`id_guru_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sim_sekolah.pengaturan_guru_mapel: ~0 rows (approximately)
/*!40000 ALTER TABLE `pengaturan_guru_mapel` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengaturan_guru_mapel` ENABLE KEYS */;

-- Dumping structure for table sim_sekolah.riwayat_diklat
CREATE TABLE IF NOT EXISTS `riwayat_diklat` (
  `id_diklat` int(6) NOT NULL AUTO_INCREMENT,
  `nama_diklat` text NOT NULL,
  `tingkat` varchar(20) NOT NULL,
  `penyelenggara` varchar(50) NOT NULL,
  `jumlah_jam` smallint(3) NOT NULL,
  `tanggal_pelaksanaan` date NOT NULL,
  `dokumen_diklat` text NOT NULL,
  `id_pegawai` smallint(5) NOT NULL,
  PRIMARY KEY (`id_diklat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sim_sekolah.riwayat_diklat: ~0 rows (approximately)
/*!40000 ALTER TABLE `riwayat_diklat` DISABLE KEYS */;
/*!40000 ALTER TABLE `riwayat_diklat` ENABLE KEYS */;

-- Dumping structure for table sim_sekolah.riwayat_pendidikan
CREATE TABLE IF NOT EXISTS `riwayat_pendidikan` (
  `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `jenjang` char(4) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `tahun_lulus` int(4) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `dokumen_ijazah` text NOT NULL,
  PRIMARY KEY (`id_pendidikan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sim_sekolah.riwayat_pendidikan: ~0 rows (approximately)
/*!40000 ALTER TABLE `riwayat_pendidikan` DISABLE KEYS */;
/*!40000 ALTER TABLE `riwayat_pendidikan` ENABLE KEYS */;

-- Dumping structure for table sim_sekolah.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(20) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nik` varchar(18) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Budha') NOT NULL,
  `alamat` text NOT NULL,
  `jenis_tinggal` varchar(20) DEFAULT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `pekerjaan_wali` varchar(50) DEFAULT NULL,
  `alamat_ortu_wali` text DEFAULT NULL,
  `anak_ke` int(1) DEFAULT NULL,
  `jumlah_saudara` int(1) DEFAULT NULL,
  `status_anak` enum('Kandung','Tiri') DEFAULT NULL,
  `jarak_rumah` int(3) DEFAULT NULL,
  `id_user` int(6) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sim_sekolah.siswa: ~7 rows (approximately)
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` (`id_siswa`, `nis`, `nisn`, `nik`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `jenis_tinggal`, `no_hp`, `email`, `asal_sekolah`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `nama_wali`, `pekerjaan_wali`, `alamat_ortu_wali`, `anak_ke`, `jumlah_saudara`, `status_anak`, `jarak_rumah`, `id_user`) VALUES
	(2, '23847', '784', '1294238748', 'Bayu Arba Saputra', 'L', 'Probolinggo', '2000-12-12', 'Katolik', 'Kraksaan', NULL, '08373565787', 'saputra@mail.com', 'SMPN 1 Pajarakan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, '8765', '8765', '3513125', 'Bobon', 'L', 'Probolinggo', '2000-11-11', 'Islam', 'Kraksaan', NULL, '09093', 'mail@mail.com', 'SMPN 1 Kraksaan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
	(4, '8766', '8766', '3513126', 'Ilham', 'L', 'Probolinggo', '2000-11-12', '', 'Kraksaan', NULL, '09094', 'mail@mail.com', 'SMPN 1 Kraksaan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
	(5, '8767', '8767', '3513127', 'Corbuzer', 'L', 'Probolinggo', '2000-11-13', 'Islam', 'Kraksaan', NULL, '09095', 'mail@mail.com', 'SMPN 1 Kraksaan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
	(6, '8768', '8768', '3513128', 'Dedi', 'L', 'Probolinggo', '2000-11-14', 'Hindu', 'Kraksaan', NULL, '09096', 'mail@mail.com', 'SMPN 1 Kraksaan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
	(7, '8769', '8769', '3513129', 'Nandar', 'L', 'Probolinggo', '2000-11-15', 'Budha', 'Kraksaan', NULL, '09097', 'mail@mail.com', 'SMPN 1 Kraksaan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
	(8, '8770', '8770', '3513130', 'Slamet', 'L', 'Probolinggo', '2000-11-16', 'Katolik', 'Kraksaan', NULL, '09098', 'mail@mail.com', 'SMPN 1 Kraksaan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8);
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;

-- Dumping structure for table sim_sekolah.status_pegawai
CREATE TABLE IF NOT EXISTS `status_pegawai` (
  `id_status_pegawai` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(30) NOT NULL,
  PRIMARY KEY (`id_status_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sim_sekolah.status_pegawai: ~0 rows (approximately)
/*!40000 ALTER TABLE `status_pegawai` DISABLE KEYS */;
INSERT INTO `status_pegawai` (`id_status_pegawai`, `nama_status`) VALUES
	(2, 'PNS');
/*!40000 ALTER TABLE `status_pegawai` ENABLE KEYS */;

-- Dumping structure for table sim_sekolah.surat
CREATE TABLE IF NOT EXISTS `surat` (
  `id_surat_masuk` int(6) NOT NULL AUTO_INCREMENT,
  `id_tahun` smallint(3) NOT NULL,
  `jenis_surat` enum('Masuk','Keluar','SK') NOT NULL,
  `file` text NOT NULL,
  `nama_surat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_surat_masuk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sim_sekolah.surat: ~0 rows (approximately)
/*!40000 ALTER TABLE `surat` DISABLE KEYS */;
/*!40000 ALTER TABLE `surat` ENABLE KEYS */;

-- Dumping structure for table sim_sekolah.tahun_pelajaran
CREATE TABLE IF NOT EXISTS `tahun_pelajaran` (
  `id_tahun` int(11) NOT NULL AUTO_INCREMENT,
  `status` enum('Aktif','No-Aktif') NOT NULL,
  `tahun` varchar(10) NOT NULL,
  PRIMARY KEY (`id_tahun`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sim_sekolah.tahun_pelajaran: ~2 rows (approximately)
/*!40000 ALTER TABLE `tahun_pelajaran` DISABLE KEYS */;
INSERT INTO `tahun_pelajaran` (`id_tahun`, `status`, `tahun`) VALUES
	(2, 'Aktif', '2020-2021');
/*!40000 ALTER TABLE `tahun_pelajaran` ENABLE KEYS */;

-- Dumping structure for table sim_sekolah.unit
CREATE TABLE IF NOT EXISTS `unit` (
  `id_unit` smallint(3) NOT NULL AUTO_INCREMENT,
  `nama_unit` varchar(40) NOT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sim_sekolah.unit: ~0 rows (approximately)
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `unit` ENABLE KEYS */;

-- Dumping structure for table sim_sekolah.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `level` enum('Guru','Siswa','Karyawan','Admin') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table sim_sekolah.user: ~8 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
	(1, '9876', '123', 'Guru'),
	(2, '7689', '123', 'Guru'),
	(3, '8765', '123', 'Siswa'),
	(4, '8766', '123', 'Siswa'),
	(5, '8767', '123', 'Siswa'),
	(6, '8768', '123', 'Siswa'),
	(7, '8769', '123', 'Siswa'),
	(8, '8770', '123', 'Siswa');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
