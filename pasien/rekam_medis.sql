-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2015 at 05:53 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rekam_medis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `kd_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(11) NOT NULL,
  PRIMARY KEY (`kd_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`kd_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'cakwo', 'cakwo'),
(4, 'slamat', 'slamat'),
(5, 'slamet1', 'slamet');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `kd_dokter` int(5) NOT NULL AUTO_INCREMENT,
  `kd_poli` char(5) NOT NULL,
  `kd_kunjungan` char(5) NOT NULL,
  `kd_user` char(5) NOT NULL,
  `nm_dokter` varchar(50) NOT NULL,
  `SIP` varchar(255) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_dokter`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21322 ;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`kd_dokter`, `kd_poli`, `kd_kunjungan`, `kd_user`, `nm_dokter`, `SIP`, `tempat_lahir`, `no_telp`, `alamat`) VALUES
(159, '', '01', '444', 'sda', '', 'y', 'asdsa', 'asdsa'),
(1231, '', '01', '2222', 'asda', '', 'asd', '', ''),
(21312, '0', '0', '0', '', '', '', '', ''),
(21313, '0', '', '', 'asdas', 'Water lilies.jpg', 'asdsa', '', ''),
(21314, '', '0', '0', '', '', '', '', ''),
(21315, '02', '01', '2222', 'zxz', '', '1231', '12312', 'asda'),
(21319, '', '5', '444', 'siplah', '', '', '', ''),
(21320, '6', '10', '1111', 'cakcak', 'malam', 'surabaya', '', 'jln.buntu'),
(21321, '6', '16', '2224', 'cakwo', 'malam', 'surabaya', '', 'jln.buntu');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE IF NOT EXISTS `kunjungan` (
  `kd_kunjungan` int(5) NOT NULL AUTO_INCREMENT,
  `tgl_kunjungan` date NOT NULL,
  `no_pasien` int(5) NOT NULL,
  `kd_poli` char(5) NOT NULL,
  `jam_kunjungan` time NOT NULL,
  PRIMARY KEY (`kd_kunjungan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`kd_kunjungan`, `tgl_kunjungan`, `no_pasien`, `kd_poli`, `jam_kunjungan`) VALUES
(5, '1999-10-12', 8, '3', '11:11:00'),
(6, '2014-02-22', 4, '3', '00:00:12'),
(7, '2012-12-12', 1, '4', '12:00:01'),
(8, '2013-10-12', 7, '2', '11:11:12'),
(9, '1999-10-10', 6, '3', '19:00:00'),
(10, '1991-10-12', 3, '1', '12:10:11'),
(11, '2014-10-13', 4, '4', '12:11:00'),
(12, '1999-10-10', 7, '5', '12:00:00'),
(14, '2015-02-25', 11, '2', '01:21:00'),
(15, '2015-02-25', 13, '2', '01:24:00'),
(16, '2015-02-25', 13, '8', '03:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium`
--

CREATE TABLE IF NOT EXISTS `laboratorium` (
  `kd_lab` int(5) NOT NULL AUTO_INCREMENT,
  `no_rm` char(5) NOT NULL,
  `hasil_lab` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_lab`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `laboratorium`
--

INSERT INTO `laboratorium` (`kd_lab`, `no_rm`, `hasil_lab`, `ket`) VALUES
(1, '02', 'positif', 'ok'),
(2, '01', 'negatif', 'sehat'),
(3, '1231', 'negatif', 'sip');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `kd_user` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2229 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`kd_user`, `username`, `password`) VALUES
(444, 'aliansyah', '21232f297a57a5a743894a0e4a801fc3'),
(1111, 'Ikko', '21232f297a57a5a743894a0e4a801fc3'),
(2222, 'Hantoro', '21232f297a57a5a743894a0e4a801fc3'),
(2223, 'shinoda', '642e92efb79421734881b53e1e1b18b6'),
(2224, 'slamet', 'c5a42d9667c760e1b7c064e25536e570'),
(2225, 'hery', '11357611cb1b43ff3138d1eba068644b'),
(2226, 'slamet2', '311639cc7dacce42808133b524a7585c'),
(2227, 'wong', '76f5d947149185d77a1fa1a114b3fb30'),
(2228, 'ikka', '6f055795657b80b7476a5edc9af58313');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `kd_obat` int(5) NOT NULL AUTO_INCREMENT,
  `nm_obat` varchar(50) NOT NULL,
  `jml_obat` int(12) NOT NULL,
  `ukuran` varchar(12) NOT NULL,
  `harga` double NOT NULL,
  PRIMARY KEY (`kd_obat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kd_obat`, `nm_obat`, `jml_obat`, `ukuran`, `harga`) VALUES
(1, 'kapsul', 21, 'besar', 2),
(2, 'generik', 10, 'besar', 1000),
(3, 'betadine', 1, '14 ml', 100000),
(4, 'kalpanax', 120, '12ml', 18800);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `no_pasien` int(5) NOT NULL AUTO_INCREMENT,
  `nm_pasien` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `usia` int(12) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `nm_kk` varchar(20) NOT NULL,
  `hub_kel` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`no_pasien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`no_pasien`, `nm_pasien`, `jenis_kelamin`, `agama`, `alamat`, `tgl_lahir`, `usia`, `no_telp`, `nm_kk`, `hub_kel`, `password`) VALUES
(3, 'sal', 'hode', 'ath', 'got', '1880-02-11', 134, '9912', 'Izal', 'sesepuh', 'e45ee7ce7e88149af8dd32b27f9512ce'),
(4, 'Ikko', 'Pria', 'Islam', 'baruk', '1996-07-28', 18, '031', 'muadi', 'anak', '2cec1dabcc6cad3796e9563a729f865b'),
(5, '5667da2ff3545d244af39297559ee21e', 'alter', 'peremuan', 'kristen', '0000-00-00', 1996, '12', '1286532', 'kiko', 'anak'),
(6, 'supercell', 'Perempuan', 'a', 'b', '0000-00-00', 0, 'e', 'f', 'g', '5acc659d13b5d175fd329861401eed6f'),
(7, 'rikka', 'Perempuan', 'atheis', 'gg sempit', '1995-12-12', 18, '1231313', 'takahashi', 'anak', 'd41d8cd98f00b204e9800998ecf8427e'),
(8, 'cakwo', 'Laki-Laki', '', 'jln.buntu', '1996-10-10', 19, '0315029771', 'ridzki', 'kandung', 'd41d8cd98f00b204e9800998ecf8427e'),
(9, 'cakwo', 'Laki-Laki', '', 'jln.buntu', '1996-10-10', 19, '0315029771', 'ridzki', 'kandung', 'd3d9446802a44259755d38e6d163e820'),
(11, 'cakri', 'Laki-Laki', 'Islam', 'jln.buntu', '1996-10-10', 19, '0315029771', 'ridzki', 'kandung', '448ce02caf00e1ff45c2efc7f4c803f3'),
(12, 'cakwow', 'Laki-Laki', 'Islam', 'jln.buntu', '1996-10-10', 19, '0315029771', 'ridzki', 'kandung', '448ce02caf00e1ff45c2efc7f4c803f3'),
(13, 'kirito', 'Laki-Laki', 'Buddha', 'akihabara', '1996-10-10', 19, '0315029771', 'kirigaya', 'angkat', '448ce02caf00e1ff45c2efc7f4c803f3'),
(14, 'Rock Lee', 'Laki-Laki', 'Buddha', 'Konoha Hagakure', '1996-11-10', 19, '0315029771', 'Lee', 'kandung', '448ce02caf00e1ff45c2efc7f4c803f3'),
(15, 'Tenten', 'Perempuan', 'Buddha', 'Konoha Hagakure', '1997-11-10', 18, '0315029771', 'tenten', 'kandung', 'd3d9446802a44259755d38e6d163e820'),
(16, 'Neji Hyuga', 'Laki-Laki', 'Buddha', 'Konoha Hagakure', '1997-11-10', 18, '', 'Hyuga', 'kandung', '<br /><b>Notice</b>:  Undefined index: password in'),
(17, 'Akimichi Choji', 'Laki-Laki', '', 'Konoha Hagakure', '1997-11-10', 18, '0315029771', 'Akimichi', 'kandung', 'd41d8cd98f00b204e9800998ecf8427e'),
(18, 'Nara Shikamaru', 'Laki-Laki', '04', 'Konoha Hagakure', '1997-11-10', 18, '0315029771', 'nara', 'kandung', 'bb8b20c99f94d079cbd72677168255b7'),
(19, 'Yamanaka Ino', 'Perempuan', '04', 'Konoha Hagakure', '1997-11-10', 18, '0315029771', 'yamanaka', 'kandung', '532fbc39e00a78cb8f42af0d7fba8371'),
(20, 'Aburame Shino', 'Laki-Laki', '04', 'Konoha Hagakure', '1997-11-10', 18, '0315029771', 'Aburame', 'kandung', '7d9b1be6fe58c125c9537e01a9e66d37'),
(21, 'coki', 'Laki-Laki', '01', 'jln.buntu', '1996-10-10', 19, '0315029771', 'coki', 'angkat', '8f3573b30b68a3648713b4d46232a10e'),
(22, 'Neji Hyuga', '', '01', 'Konoha Hagakure', '1997-11-10', 18, '0315029771', 'Hyuga', 'kandung', '77f33475e20fba89eb23ca0d16392a23'),
(23, 'Neji Hyuga', 'Laki-Laki', 'Buddha', 'Konoha Hagakure', '1997-11-10', 18, '0315029771', 'Hyuga', 'kandung', '77f33475e20fba89eb23ca0d16392a23'),
(24, 'Hinata Hyuga', 'Perempuan', 'Buddha', 'Konoha Hagakure', '1996-10-10', 19, '0315029771', 'Hyuga', 'kandung', 'c43b1293fc1130d5a77a67eb64828f27'),
(25, 'Yamato', 'Laki-Laki', 'Buddha', 'Konoha Hagakure', '1996-10-10', 19, '0315029771', 'Yamato', 'kandung', 'f33cbae2e024e9109b519f08f5bf361e');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `kd_petugas` char(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`kd_petugas`, `username`, `password`) VALUES
('', 'cakcak', 'fce63effcbf21cbd6470e9cf3'),
('', 'cicak', '1350ea97b605bee6e42f7e459');

-- --------------------------------------------------------

--
-- Table structure for table `poliklinik`
--

CREATE TABLE IF NOT EXISTS `poliklinik` (
  `kd_poli` int(5) NOT NULL AUTO_INCREMENT,
  `nm_poli` varchar(50) NOT NULL,
  `lantai` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_poli`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `poliklinik`
--

INSERT INTO `poliklinik` (`kd_poli`, `nm_poli`, `lantai`) VALUES
(6, 'Poli Hidung', '1'),
(7, 'Poli Perut', '1'),
(8, 'Poli Tenggorokkan', '1');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE IF NOT EXISTS `rekam_medis` (
  `no_rm` int(5) NOT NULL AUTO_INCREMENT,
  `kd_tindakan` char(5) NOT NULL,
  `kd_obat` char(5) NOT NULL,
  `kd_user` char(5) NOT NULL,
  `no_pasien` char(5) NOT NULL,
  `diagnosa` varchar(100) NOT NULL,
  `resep` varchar(100) NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `tgl_pemeriksaan` date NOT NULL,
  `tgl_kesembuhan` date NOT NULL,
  `ket` varchar(100) NOT NULL,
  PRIMARY KEY (`no_rm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1240 ;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`no_rm`, `kd_tindakan`, `kd_obat`, `kd_user`, `no_pasien`, `diagnosa`, `resep`, `keluhan`, `tgl_pemeriksaan`, `tgl_kesembuhan`, `ket`) VALUES
(1, '03', '02', '2222', '04', 'sakit', 'dokter', 'sakit', '2014-03-19', '0000-00-00', 'pusing'),
(2, '03', '02', '1111', '01', 'parah', 'tidak ada', 'hampir mati', '2014-03-19', '0000-00-00', 'dead'),
(3, '03', '02', '2222', '02', 'dia', 'as', 'dd', '2014-03-19', '0000-00-00', 'sad'),
(8, '03', '03', '2222', '07', 'live', 'betadine', 'lapar', '2012-10-30', '2013-10-20', 'sakit'),
(12, '0', '0', '0', '0', 'tipes', 'bodrex', 'sakit kepala', '2005-12-12', '0000-00-00', 'sembuh'),
(48, '03', '01', '444', '48', 'sakit tipes', 'betadin', 'perih', '1990-12-12', '0000-00-00', 'mantap'),
(1231, '04', '01', '0', '0', 'asdsa', 'asda', 'asdsa', '1990-12-12', '2015-10-00', ''),
(1232, '4', '3', '444', '5', 'sda', 'ada', 'asdad', '0000-00-00', '0000-00-00', 'adas'),
(1233, '4', '2', '2222', '7', 'babab', 'asbdabd', 'adabd', '0000-00-00', '0000-00-00', 'zzz'),
(1234, '5', '3', '444', '1', 'mati', 'bodrex', 'sakit', '1992-12-12', '2030-12-12', 'sembuh'),
(1235, '5', '3', '2223', '6', 'a', 'b', 'c', '0000-00-00', '0000-00-00', ''),
(1236, '4', '3', '2223', '11', 'gejala', '3x4 sebelum makan', 'mencret', '2015-02-24', '0000-00-00', 'mencret,murus'),
(1237, '4', '4', '2223', '13', 'Panu,Kadas Kurap', 'oleskan 3x1', 'Gatal-gatal', '2015-02-25', '2015-02-25', ''),
(1238, '1', '4', '2224', '16', 'Gejala', 'Dioles 3X1', 'Gatal-gatal', '2015-02-27', '2015-02-28', 'gatal akut'),
(1239, '1', '2', '2224', '14', 'Gejala', '3x4 sebelum makan', 'Gatal-gatal', '2015-02-27', '2015-02-28', 'dirawat jalan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_agama`
--

CREATE TABLE IF NOT EXISTS `tb_agama` (
  `kd_agama` char(10) NOT NULL,
  `agama` varchar(15) NOT NULL,
  PRIMARY KEY (`kd_agama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_agama`
--

INSERT INTO `tb_agama` (`kd_agama`, `agama`) VALUES
('01', 'Islam'),
('02', 'Kristen'),
('03', 'Hindu'),
('04', 'Buddha');

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE IF NOT EXISTS `tindakan` (
  `kd_tindakan` int(5) NOT NULL AUTO_INCREMENT,
  `nm_tindakan` varchar(50) NOT NULL,
  `ket` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_tindakan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`kd_tindakan`, `nm_tindakan`, `ket`) VALUES
(1, 'Rawat jalan', 'batuk'),
(2, 'tidur di rumah', 'mencret'),
(3, 'Lantarkan', 'Sudah diJemput'),
(4, 'rawat inap', 'ngutang rumah sakit'),
(5, 'kubur', 'menguburkan');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
