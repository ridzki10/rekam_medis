<?php
if (isset($_GET['hal'])) $hal = $_GET['hal']; else $hal = "";
switch ($hal){
// case 'petugas' 	:include "admin.php"; break;
// case 'dokter'	:include "dokter.php"; break;
case 'pasien'	:include "pasien.php"; break;
case 'laporan_pasien'	:include "laporan_pasien.php"; break;
// case 'rekam'	:include "rekam.php"; break;
// case 'pelanggan'	:include "pelanggan.php"; break;
case 'kunjungan'	:include "kunjungan.php"; break;
// case 'laboratorium'	:include "lab.php" ; break;
// case 'tindakan'	:include "tindakan.php" ; break;
// case 'obat'	:include "obat.php" ; break;
// case 'poliklinik'	:include "poliklinik.php" ; break;
default : include "home.php"; break;
}
?>