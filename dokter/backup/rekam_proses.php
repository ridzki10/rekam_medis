<?php
include "koneksi.php";
if (isset ($_POST['action'])) $action = $_POST['action']; else $action = "";



switch ($action){
	case 'tambah' :
		$no_rm						= $_POST ['txtno_rm'];
		$tindakan					= $_POST ['tindakan'];
		$obat 						= $_POST ['obat'];
		$petugas 					= $_POST ['petugas'];
		$pasien 					= $_POST ['pasien'];
		$diagnosa 					= $_POST ['txtdiagnosa'];
		$resep 						= $_POST ['txtresep'];
		$keluhan 					= $_POST ['txtkeluhan'];
		$tanggal_pemeriksaan 		= $_POST ['txttgl_pemeriksaan'];
		$tanggal_pulang 		= $_POST ['txttgl_pulang'];
		$keterangan 				= $_POST ['txtket'];
		$a = "INSERT INTO rekam_medis VALUES ('$no_rm','$tindakan', '$obat', '$petugas','$pasien','$diagnosa','$resep','$keluhan','$tanggal_pemeriksaan','$tanggal_pulang','$keterangan')";
		$b = mysql_query($a) or die (mysql_error());
		if ($b==true){
		echo "<script>alert('tambah sukses')</script>";
		}else{
		echo "<script>alert('tambah sukses')</script>";
		}
		break;
	case 'update' :
		$no_rm = $_POST['txtno_rm'];
		$no_rmx = $_POST ['txtno_rm'];
		$tindakan					= $_POST ['tindakan'];
		$obat 						= $_POST ['obat'];
		$petugas 					= $_POST ['petugas'];
		$pasien 					= $_POST ['pasien'];
		$diagnosa 					= $_POST ['txtdiagnosa'];
		$resep 						= $_POST ['txtresep'];
		$keluhan 					= $_POST ['txtkeluhan'];
		$tanggal_pemeriksaan 		= $_POST ['txttgl_pemeriksaan'];
		$tanggal_pulang 		= $_POST ['txttgl_pulang'];
		$keterangan 				= $_POST ['txtket'];
	$a = "UPDATE rekam_medis SET no_rm = '$no_rm',kd_tindakan = '$tindakan', kd_obat = '$obat', kd_user = '$petugas',no_pasien ='$pasien',diagnosa = '$diagnosa',resep ='$resep',keluhan='$keluhan',tgl_pemeriksaan='$tanggal_pemeriksaan',tgl_kesembuhan='$tanggal_pulang',ket='$keterangan' WHERE no_rm = '$no_rmx'";
	$b = mysql_query($a) or die (mysql_error());
if ($b == true){
	echo "<script>alert('UPDATE BERHASIL')</script>";
		}else{
		echo "<script>alert('UPDATE GAK BERHASIL')</script>";
		}

break;
default :
$no_rm = $_GET['no_rm'];
$a = "DELETE FROM rekam_medis WHERE no_rm = '$no_rm'";
$b = mysql_query($a) or die (mysql_error());
if ($b == true){
	echo "<script>alert('DELETE BERHASIL')</script>";
		}else{
		echo "<script>alert('DELETE TIDAK BERHASIL')</script>";
		} 
break;
}
?>

<meta http-equiv="refresh" content="0;URL=index.php?hal=rekam" />