<?php
include "koneksi.php";
error_reporting(0);
if (isset ($_POST['action'])) $action = $_POST['action']; else $action = "";



switch ($action){
	case 'tambah' :
		$kd_kunjung		= $_POST ['txtkd_kunjung'];
		$tgl_kunjung		= $_POST ['txttgl_kunjung'];
		$pasien 		= $_POST ['pasien'];
		$poli 		= $_POST ['poliklinik'];
		$jam 		= $_POST ['jam_kunjung'];

		$a = "INSERT INTO kunjungan VALUES ('$kd_kunjung','$tgl_kunjung', '$pasien', '$poli','$jam')";
		$b = mysql_query($a) or die (mysql_error());
		if ($b==true){
		echo "<script>alert('tambah sukses')</script>";
		}else{
		echo "<script>alert('tambah sukses')</script>";
		}
		break;
	case 'update' :
	$kd_kunjung = $_POST['txtkd_kunjung'];
	$kd_kunjungx = $_POST ['txtkd_kunjungx'];
	$tgl_kunjung		= $_POST ['txttgl_kunjung'];
	$pasien 		= $_POST ['pasien'];
	$poli 		= $_POST ['poliklinik'];
	$jam 		= $_POST ['jam_kunjung'];
	$a = "UPDATE kunjungan SET kd_kunjungan = '$kd_kunjung',tgl_kunjungan = '$tgl_kunjung', no_pasien = '$pasien', kd_poli = '$poli' WHERE kd_kunjungan = '$kd_kunjungx'";
	$b = mysql_query($a) or die (mysql_error());
if ($b == true){
	echo "<script>alert('UPDATE BERHASIL')</script>";
		}else{
		echo "<script>alert('UPDATE GAK BERHASIL')</script>";
		}

break;
default :
$kd_kunjung = $_GET['kd_kunjungan'];
$a = "DELETE FROM kunjungan WHERE kd_kunjungan = '$kd_kunjung'";
$b = mysql_query($a) or die (mysql_error());
if ($b == true){
	echo "<script>alert('DELETE BERHASIL')</script>";
		}else{
		echo "<script>alert('DELETE TIDAK BERHASIL')</script>";
		} 
break;
}
?>

<meta http-equiv="refresh" content="0;URL=index.php?hal=kunjungan" />