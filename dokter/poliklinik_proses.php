<?php
include "koneksi.php";
if (isset ($_POST['action'])) $action = $_POST['action']; else $action = "";
error_reporting(0);


switch ($action){
	case 'tambah' :
		$kd_poli		= $_POST ['txtkd_poli'];
		$nm_poli		= $_POST ['txtnm_poli'];
		$lantai 		= $_POST ['txtlantai'];

		$a = "INSERT INTO poliklinik VALUES ('$kd_poli', '$nm_poli','$lantai')";
		$b = mysql_query($a) or die (mysql_error());
		if ($b==true){
		echo "<script>alert('tambah sukses')</script>";
		}else{
		echo "<script>alert('tambah sukses')</script>";
		}
		break;
	case 'update' :
	$kd_poli = $_POST['txtkd_poli'];
	$kd_polix = $_POST ['txtkd_polix'];
	$nm_poli		= $_POST ['txtnm_poli'];
	$lantai 		= $_POST ['txtlantai'];
	$a = "UPDATE poliklinik SET kd_poli = '$kd_poli',nm_poli = '$nm_poli', lantai = '$lantai' WHERE kd_poli = '$kd_polix'";
	$b = mysql_query($a) or die (mysql_error());
if ($b == true){
	echo "<script>alert('UPDATE BERHASIL')</script>";
		}else{
		echo "<script>alert('UPDATE GAK BERHASIL')</script>";
		}

break;
default :
$kd_poli = $_GET['kd_poli'];
$a = "DELETE FROM poliklinik WHERE kd_poli = '$kd_poli'";
$b = mysql_query($a) or die (mysql_error());
if ($b == true){
	echo "<script>alert('DELETE BERHASIL')</script>";
		}else{
		echo "<script>alert('DELETE TIDAK BERHASIL')</script>";
		} 
break;
}
?>

<meta http-equiv="refresh" content="0;URL=index.php?hal=poliklinik" />