<?php
error_reporting(0);
include "koneksi.php";
if (isset ($_POST['action'])) $action = $_POST['action']; else $action = "";



switch ($action){
	case 'tambah' :
		$no_lab					= $_POST ['txtkd_lab'];
		$rekam					= $_POST ['rekam'];
		$hasil 					= $_POST ['txthasil_lab'];
		$keterangan 			= $_POST ['txtket'];
		
		$a = "INSERT INTO laboratorium VALUES ('$no_lab','$rekam', '$hasil', '$keterangan')";
		$b = mysql_query($a) or die (mysql_error());
		if ($b==true){
		echo "<script>alert('tambah sukses')</script>";
		}else{
		echo "<script>alert('tambah sukses')</script>";
		}
		break;
	case 'update' :
		$kd_lab = $_POST['txtkd_lab'];
		$kd_labx = $_POST ['txtkd_labx'];
		$rekam					= $_POST ['rekam'];
		$hasil 					= $_POST ['txthasil_lab'];
		$keterangan 			= $_POST ['txtket'];
	$a = "UPDATE laboratorium SET kd_lab = '$kd_lab',no_rm = '$rekam', hasil_lab = '$hasil', ket = '$keterangan' WHERE kd_lab = '$kd_labx'";
	$b = mysql_query($a) or die (mysql_error());
if ($b == true){
	echo "<script>alert('UPDATE BERHASIL')</script>";
		}else{
		echo "<script>alert('UPDATE GAK BERHASIL')</script>";
		}

break;
default :
$kd_lab = $_GET['kd_lab'];
$a = "DELETE FROM laboratorium WHERE kd_lab = '$kd_lab'";
$b = mysql_query($a) or die (mysql_error());
if ($b == true){
	echo "<script>alert('DELETE BERHASIL')</script>";
		}else{
		echo "<script>alert('DELETE TIDAK BERHASIL')</script>";
		} 
break;
}
?>

<meta http-equiv="refresh" content="0;URL=index.php?hal=laboratorium" />