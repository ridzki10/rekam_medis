<?php
error_reporting(0);
include "koneksi.php";
if (isset ($_POST['action'])) $action = $_POST['action']; else $action = "";

switch ($action){
	case 'tambah' :

		$kd_dokter		= $_POST['txtkd_dokter'];
		$poli			= $_POST['txtpoliklinik'];
		$kunjungan 		= $_POST['txtkunjungan'];
		$petugas		= $_POST['txtpetugas'];
		$nm_dokter		= $_POST['txtnm_dokter'];
		$tujuan_sip     = $_POST['txtsip'];
		$tempat_lahir	= $_POST['txttmp_lahir'];
		$no_telp		= $_POST['txttelp'];
		$alamat			= $_POST['txtalamat']; 
		$password	= md5($_POST ['txtpass']);
		
		$a = "INSERT INTO dokter VALUES ('$kd_dokter','$poli','$kunjungan', '$petugas', '$nm_dokter','$tujuan_sip','$tempat_lahir','$no_telp','$alamat','$password')";
		$b = mysql_query($a) or die (mysql_error());
		if ($b==true){
		echo "<script>alert('Tambah Sukses')</script>";
		}else{
		echo "<script>alert('Tambah Tidak Sukses')</script>";
		}
		break;
	case 'update' :

	$kd_dokter		= $_POST['txtkd_dokter'];
	$kd_dokterx		= $_POST['txtkd_dokterx'];
	$poli			= $_POST['txtpoliklinik'];
	$kunjungan 		= $_POST['txtkunjungan'];
	$petugas		= $_POST['txtpetugas'];
	$nm_dokter		= $_POST['txtnm_dokter'];
	$tujuan_sip     = $_POST['txtsip'];
	$tempat_lahir	= $_POST['txttmp_lahir'];
	$no_telp		= $_POST['txttelp'];
	$alamat			= $_POST['txtalamat'];
	$password	= $_POST ['txtpass'];
	
	$a = "UPDATE dokter SET kd_dokter = '$kd_dokter',kd_poli = '$poli',kd_kunjungan = '$kunjungan', kd_user = '$petugas', nm_dokter = '$nm_dokter',SIP = '$tujuan_sip', tempat_lahir = '$tempat_lahir',no_telp = '$no_telp',alamat = '$alamat', password='$password' WHERE kd_dokter = '$kd_dokterx'";
	$b = mysql_query($a) or die (mysql_error());
if ($b == true){
	echo "<script>alert('UPDATE BERHASIL')</script>";
		}else{
		echo "<script>alert('UPDATE GAK BERHASIL')</script>";
		}

break;
default :
$kd_dokter = $_GET['kd_dokter'];
$a = "DELETE FROM dokter WHERE kd_dokter = '$kd_dokter'";
$b = mysql_query($a) or die (mysql_error());
if ($b == true){
	echo "<script>alert('DELETE BERHASIL')</script>";
		}else{
		echo "<script>alert('DELETE TIDAK BERHASIL')</script>";
		} 
break;
}
?>

<meta http-equiv="refresh" content="0;URL=index.php?hal=dokter" />