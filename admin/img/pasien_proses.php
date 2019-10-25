<?php
include "koneksi.php";
if (isset ($_POST['action'])) $action = $_POST['action']; else $action = "";
error_reporting(0);
switch ($action){
	case 'tambah' :
	$no_pasien = $_POST['asdas'];
	$nm_pasien		= $_POST ['txtnm_pasien'];
		$jenis_kelamin 		= $_POST ['txtkelamin'];
		$agama 		= $_POST ['txtagama'];
		$alamat 		= $_POST ['txtalamat'];
		$tgl_lahir 		= $_POST ['txttgl_lahir'];
		$usia 		= $_POST ['txtusia'];
		$no_telp 		= $_POST ['txttelp'];
		$nm_kk 		= $_POST ['txtkk'];
		$hub_kel 		= $_POST ['txthub'];
		$pass 		= md5($_POST ['txtpass']);
		

		$a = "INSERT INTO pasien VALUES ('$no_pasien','$nm_pasien','$jenis_kelamin','$agama','$alamat','$tgl_lahir',year(now())- year('$tgl_lahir')','$no_telp','$nm_kk','$hub_kel','$pass')";
		$b = mysql_query($a) or die (mysql_error());
		if ($b==true){
		echo "<script>alert('tambah sukses')</script>";
		}else{
		echo "<script>alert('tambah sukses')</script>";
		}
		break;
	case 'update' :
	
	$no_pasienx = $_POST ['txtno_pasien'];
	$nm_pasien		= $_POST ['txtnm_pasien'];
	$jenis_kelamin 		= $_POST ['txtkelamin'];
	$agama 		= $_POST ['txtagama'];
	$alamat 		= $_POST ['txtalamat'];
	$tgl_lahir 		= $_POST ['txttgl_lahir'];
	$usia 		= $_POST ['txtusia'];
	$no_telp 		= $_POST ['txttelp'];
	$nm_kk 		= $_POST ['txtkk'];
	$hub_kel 		= $_POST ['txthub'];

	$a = "UPDATE pasien SET nm_pasien = '$nm_pasien', jenis_kelamin = '$jenis_kelamin',agama ='$agama',alamat = '$alamat',tgl_lahir = '$tgl_lahir',usia = '$usia', no_telp = '$no_telp', nm_kk = '$nm_kk', hub_kel = '$hub_kel' WHERE no_pasien = '$no_pasienx'";
	$b = mysql_query($a) or die (mysql_error());
if ($b == true){
	echo "<script>alert('UPDATE BERHASIL')</script>";
		}else{
		echo "<script>alert('UPDATE GAK BERHASIL')</script>";
		}

break;
default :
$no_pasien = $_GET['no_pasien'];
$a = "DELETE FROM pasien WHERE no_pasien = '$no_pasien'";
$b = mysql_query($a) or die (mysql_error());
if ($b == true){
	echo "<script>alert('DELETE BERHASIL')</script>";
		}else{
		echo "<script>alert('DELETE TIDAK BERHASIL')</script>";
		} 
break;
}
?>

<meta http-equiv="refresh" content="0;URL=index.php?hal=pasien" />