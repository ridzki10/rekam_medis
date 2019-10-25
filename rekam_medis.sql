-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2015 at 05:01 AM
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
(0, 'slamatan', 'slamat'),
(1, 'admin', 'admin'),
(2, 'cakwow', 'cakwo'),
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
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_dokter`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21334 ;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`kd_dokter`, `kd_poli`, `kd_kunjungan`, `kd_user`, `nm_dokter`, `SIP`, `tempat_lahir`, `no_telp`, `alamat`, `password`) VALUES
(21332, '9', '0', '2226', 'Boyke', 'Malam', 'Jakarta', '0315029779', 'Jakarta Utara', '4aaf8db254d54ea4488deee78db29a5d'),
(21333, '7', '17', '2226', 'Haruno Sakura', 'Pagi', 'Konoha Hagakure', '0315029776', 'Konoha Hagakure', '05811b72560679ed3d24e81311d4f902');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`kd_kunjungan`, `tgl_kunjungan`, `no_pasien`, `kd_poli`, `jam_kunjungan`) VALUES
(0, '2015-09-30', 18, '8', '11:14:00'),
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
(16, '2015-02-25', 13, '8', '03:08:00'),
(17, '2015-09-30', 31, '7', '07:35:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `laboratorium`
--

INSERT INTO `laboratorium` (`kd_lab`, `no_rm`, `hasil_lab`, `ket`) VALUES
(0, '1240', 'Berhasil', 'Berhasil Uji Laborat'),
(1, '02', 'positif', 'ok'),
(2, '01', 'negatif', 'sehat'),
(3, '1231', 'negatif', 'sip'),
(5, '1242', 'Sukses', 'Berhasil Uji Laborat');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `kd_user` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2230 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`kd_user`, `username`, `password`) VALUES
(444, 'aliansyah', '21232f297a57a5a743894a0e4a801fc3'),
(1111, 'Ikko', '21232f297a57a5a743894a0e4a801fc3'),
(2222, 'Hantoro', '21232f297a57a5a743894a0e4a801fc3'),
(2223, 'shinoda', '642e92efb79421734881b53e1e1b18b6'),
(2224, 'slamet', 'c5a42d9667c760e1b7c064e25536e570'),
(2225, 'heri', '11357611cb1b43ff3138d1eba068644b'),
(2226, 'slamet2', '311639cc7dacce42808133b524a7585c'),
(2227, 'wong', '76f5d947149185d77a1fa1a114b3fb30'),
(2228, 'ikka', '6f055795657b80b7476a5edc9af58313'),
(2229, 'slamet3', 'c20ad4d76fe97759aa27a0c99bff6710');

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
(0, 'Paramex', 4, 'Sedang', 5000),
(1, 'kapsul', 21, 'besar', 200),
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
  `kd_agama` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `usia` int(12) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `nm_kk` varchar(20) NOT NULL,
  `hub_kel` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`no_pasien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`no_pasien`, `nm_pasien`, `jenis_kelamin`, `kd_agama`, `alamat`, `tgl_lahir`, `usia`, `no_telp`, `nm_kk`, `hub_kel`, `password`) VALUES
(18, 'Nara Shikamaru', 'Laki-Laki', '04', 'Konoha Hagakure', '1997-11-10', 18, '0315029771', 'nara', 'kandung', 'bb8b20c99f94d079cbd72677168255b7'),
(19, 'Yamanaka Ino', 'Perempuan', '04', 'Konoha Hagakure', '1997-11-10', 18, '0315029771', 'yamanaka', 'kandung', 'Yamanak'),
(20, 'Aburame Shino', 'Laki-Laki', '04', 'Konoha Hagakure', '1997-11-10', 18, '0315029773', 'Aburame', 'kandung', 'aburame'),
(22, 'Neji Hyuga', 'Laki-Laki', '04', 'Konoha Hagakure', '1997-11-10', 18, '0315029771', 'Hyuga', 'kandung', 'h'),
(24, 'Hinata Hyuga', 'Perempuan', 'Buddha', 'Konoha Hagakure', '1996-10-10', 19, '0315029771', 'Hyuga', 'kandung', 'Hyuga'),
(25, 'Yamato', 'Laki-Laki', 'Buddha', 'Konoha Hagakure', '1996-10-10', 19, '0315029771', 'Yamato', 'anak angkat', 'mokuton'),
(26, 'Uchiha Itachi', 'Laki-Laki', 'Buddha', 'Konoha Hagakure', '1992-10-16', 23, '0315029771', 'Uchiha', 'kandung', '50844c3646d6f9f33e6ced3ba897666c'),
(27, 'Conan Edogawa', 'Laki-Laki', 'Buddha', 'Akihabara', '1996-10-10', 19, '0315029779', 'Edogawa', 'kandung', 'e7197490367cf7ad4291f437793d1260'),
(29, 'Hatake Kakashi', 'Laki-Laki', '04', 'Konoha Hagakure', '1992-10-16', 23, '0315029779', 'Hatake', 'kandung', '2510c39011c5be704182423e3a695e91'),
(31, 'Naruto Uzumaki', 'Laki-Laki', '04', 'Konoha Hagakure', '1996-10-10', 19, '0315029772', 'Uzumaki', 'Kandung', 'c61245e6f227894e173605d029e40159');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `poliklinik`
--

INSERT INTO `poliklinik` (`kd_poli`, `nm_poli`, `lantai`) VALUES
(6, 'Poli Hidung', '1'),
(7, 'Poli Perut', '1'),
(8, 'Poli Tenggorokkan', '1'),
(9, 'Poli Kelamin', '1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1243 ;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`no_rm`, `kd_tindakan`, `kd_obat`, `kd_user`, `no_pasien`, `diagnosa`, `resep`, `keluhan`, `tgl_pemeriksaan`, `tgl_kesembuhan`, `ket`) VALUES
(1240, '3', '3', '2223', '18', 'Keracunan', 'ddd', 'ddd', '2015-09-30', '0000-00-00', 'ddd'),
(1242, '1', '1', '2226', '31', 'Terjangkit', 'ddd', 'ddd', '2015-09-30', '2015-10-01', 'ddd');

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
(0, 'Rawat jalan', 'batuk berdahak'),
(2, 'tidur di rumah', 'mencret'),
(3, 'Lantarkan', 'Sudah diJemput'),
(4, 'rawat inap', 'ngutang rumah sakit'),
(5, 'kubur', 'menguburkan');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
