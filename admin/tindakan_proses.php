<?php
error_reporting(0);
include "koneksi.php";
if (isset ($_POST['action'])) $action = $_POST['action']; else $action = "";
switch ($action){
	case 'tambah' :
		$kd_tindakan		= $_POST ['txtkd_tindakan'];
		$nm_tindakan		= $_POST ['txtnm_tindakan'];
		$ket 		= $_POST ['txtket'];

		$a = "INSERT INTO tindakan VALUES ('$kd_tindakan', '$nm_tindakan','$ket')";
		$b = mysql_query($a) or die (mysql_error());
		if ($b==true){
		echo "<script>alert('tambah sukses')</script>";
		}else{
		echo "<script>alert('tambah sukses')</script>";
		}
		break;
	case 'update' :
	$kd_tindakan = $_POST['txtkd_tindakan'];
	$kd_tindakanx = $_POST ['txtkd_tindakanx'];
	$nm_tindakan		= $_POST ['txtnm_tindakan'];
	$ket 		= $_POST ['txtket'];
	$a = "UPDATE tindakan SET kd_tindakan = '$kd_tindakan',nm_tindakan = '$nm_tindakan', ket = '$ket' WHERE kd_tindakan = '$kd_tindakanx'";
	$b = mysql_query($a) or die (mysql_error());
if ($b == true){
	echo "<script>alert('UPDATE BERHASIL')</script>";
		}else{
		echo "<script>alert('UPDATE GAK BERHASIL')</script>";
		}

break;
default :
$kd_tindakan = $_GET['kd_tindakan'];
$a = "DELETE FROM tindakan WHERE kd_tindakan = '$kd_tindakan'";
$b = mysql_query($a) or die (mysql_error());
if ($b == true){
	echo "<script>alert('DELETE BERHASIL')</script>";
		}else{
		echo "<script>alert('DELETE TIDAK BERHASIL')</script>";
		} 
break;
}
?>

<meta http-equiv="refresh" content="0;URL=index.php?hal=tindakan" />