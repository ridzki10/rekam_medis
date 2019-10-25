<?php
include "koneksi.php";
if (isset ($_POST['action'])) $action = $_POST['action']; else $action = "";

error_reporting(0);

switch ($action){
	case 'tambah' :
		$kd_obat		= $_POST ['txtkd_obat'];
		$nm_obat		= $_POST ['txtnm_obat'];
		$jml_obat		= $_POST ['txtjml_obat'];
		$ukuran		= $_POST ['txtukuran'];
		$harga 		= $_POST ['txtharga'];

		$a = "INSERT INTO obat VALUES ('$kd_obat', '$nm_obat','$jml_obat','$ukuran','$harga')";
		$b = mysql_query($a) or die (mysql_error());
		if ($b==true){
		echo "<script>alert('tambah sukses')</script>";
		}else{
		echo "<script>alert('tambah sukses')</script>";
		}
		break;
	case 'update' :
	$kd_obat = $_POST['txtkd_obat'];
	$kd_obatx = $_POST ['txtkd_obatx'];
	$nm_obat		= $_POST ['txtnm_obat'];
	$jml_obat		= $_POST ['txtjml_obat'];
	$ukuran		= $_POST ['txtukuran'];
	$harga 		= $_POST ['txtharga'];
	$a = "UPDATE obat SET kd_obat = '$kd_obat', nm_obat = '$nm_obat', jml_obat = '$jml_obat',ukuran = '$ukuran', harga = '$harga' WHERE kd_obat = '$kd_obatx'";
	$b = mysql_query($a) or die (mysql_error());
if ($b == true){
	echo "<script>alert('UPDATE BERHASIL')</script>";
		}else{
		echo "<script>alert('UPDATE GAK BERHASIL')</script>";
		}

break;
default :
$kd_obat = $_GET['kd_obat'];
$a = "DELETE FROM obat WHERE kd_obat = '$kd_obat'";
$b = mysql_query($a) or die (mysql_error());
if ($b == true){
	echo "<script>alert('DELETE BERHASIL')</script>";
		}else{
		echo "<script>alert('DELETE TIDAK BERHASIL')</script>";
		} 
break;
}
?>

<meta http-equiv="refresh" content="0;URL=index.php?hal=obat" />